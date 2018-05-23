<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_DbTable_Labcontact extends Zend_Db_Table_Abstract
{

    protected $_name = 'rep_labcontacts';
    protected $_primary = 'ContactID';

    public function getAllLabcontact($parameters)
    {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('ContactID', 'LabID', 'LabName', 'a.ContactName', 'a.ContactEmail', 'a.ContactTelephone', 'Status');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = $this->_primary;


        /*
         * Paging
         */
        $sLimit = "";
        if (isset($parameters['iDisplayStart']) && $parameters['iDisplayLength'] != '-1') {
            $sOffset = $parameters['iDisplayStart'];
            $sLimit = $parameters['iDisplayLength'];
        }

        /*
         * Ordering
         */
        $sOrder = "";
        if (isset($parameters['iSortCol_0'])) {
            $sOrder = "";
            for ($i = 0; $i < intval($parameters['iSortingCols']); $i++) {
                if ($parameters['bSortable_' . intval($parameters['iSortCol_' . $i])] == "true") {
                    $sOrder .= $aColumns[intval($parameters['iSortCol_' . $i])] . "
				 	" . ($parameters['sSortDir_' . $i]) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = "";
        if (isset($parameters['sSearch']) && $parameters['sSearch'] != "") {
            $searchArray = explode(" ", $parameters['sSearch']);
            $sWhereSub = "";
            foreach ($searchArray as $search) {
                if ($sWhereSub == "") {
                    $sWhereSub .= "(";
                } else {
                    $sWhereSub .= " AND (";
                }
                $colSize = count($aColumns);

                for ($i = 0; $i < $colSize; $i++) {
                    if ($i < $colSize - 1) {
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search) . "%' OR ";
                    } else {
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search) . "%' ";
                    }
                }
                $sWhereSub .= ")";
            }
            $sWhere .= $sWhereSub;
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($parameters['bSearchable_' . $i]) && $parameters['bSearchable_' . $i] == "true" && $parameters['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere .= $aColumns[$i] . " LIKE '%" . ($parameters['sSearch_' . $i]) . "%' ";
                } else {
                    $sWhere .= " AND " . $aColumns[$i] . " LIKE '%" . ($parameters['sSearch_' . $i]) . "%' ";
                }
            }
        }


        /*
         * SQL queries
         * Get data to display
         */

        $sQuery = $this->getAdapter()
            ->select()
            ->from(array('a' => $this->_name), array('c.LabName', 'a.ContactID', 'a.ContactName', 'a.ContactEmail','a.Status', 'a.ContactTelephone'))
            ->join(array('c' => 'rep_labs'), 'c.LabID=a.LabID',array('LabName'));
           // ->group("a.LabID");

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

        //error_log($sQuery);

        $rResult = $this->getAdapter()->fetchAll($sQuery);


        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $this->getAdapter()->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */
        $sQuery = $this->getAdapter()->select()->from($this->_name, new Zend_Db_Expr("COUNT('" . $sIndexColumn . "')"));
        $aResultTotal = $this->getAdapter()->fetchCol($sQuery);
        $iTotal = $aResultTotal[0];

        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($parameters['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );


        foreach ($rResult as $aRow) {
            $row = array();
            $row[] = $aRow['LabName'];
            $row[] = $aRow['ContactName'];
            $row[] = $aRow['ContactEmail'];
            $row[] = $aRow['ContactTelephone'];
            $row[] = $aRow['Status'];
            $row[] = '<a href="/admin/labscontact/edit/id/' . $aRow['ContactID'] . '" class="btn btn-warning btn-xs" style="margin-right: 2px;"><i class="icon-pencil"></i> Edit</a>';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function getProviders()
    {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $pname = $auth->getIdentity()->ProviderName;
        }
        if ($pname) {
            return $this->fetchAll($this->select()->where("Status='active'")->where("ProviderName='$pname'")->order("ProviderName"));
        } else {
            return $this->fetchAll($this->select()->where("Status='active'")->order("ProviderName"));
        }
    }

    public function getProvider($partSysId)
    {
        return $this->getAdapter()->fetchRow($this->getAdapter()->select()->from(array('p' => $this->_name))
            ->joinLeft(array('pr' => 'rep_providerprograms'), 'pr.ProviderID=p.ProviderID')
            ->joinLeft(array('rp' => 'rep_programs'), 'rp.ProgramID=pr.ProgramID', array('ProgramID' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT rp.Description SEPARATOR ', ')")))
            ->where("p.ProviderID = ?", $partSysId)
            ->group('p.ProviderID'));

    }

    public function addLabcontact($params)
    {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $db = Zend_Db_Table_Abstract::getAdapter();
        $data = array(
            'LabID' => $params['LabID'],
            'ContactName' => $params['ContactName'],
            'ContactTelephone' => $params['ContactTelephone'],
            'ContactEmail' => $params['ContactEmail'],
            'Status' => $params['Status']
        );
        $saved = $this->insert($data);
        return $saved;
    }

    public function getLabcontactDetails($adminId)
    {
        return $this->fetchRow($this->select()->where("ContactID = ? ", $adminId));
    }

    public function updateLabcontact($params)
    {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'LabID' => $params['LabID'],
            'ContactName' => $params['ContactName'],
            'ContactTelephone' => $params['ContactTelephone'],
            'ContactEmail' => $params['ContactEmail'],
            'Status' => $params['Status']
        );

        return $this->update($data, "ContactID=" . $params['ContactID']);
    }

}
