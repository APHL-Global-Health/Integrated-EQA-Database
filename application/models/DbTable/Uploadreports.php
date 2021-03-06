<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_DbTable_Uploadreports extends Zend_Db_Table_Abstract {

    protected $_name = 'rep_providerfiles';
    protected $_primary = 'ID';

    public function getAllData($parameters) {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $pname = $auth->getIdentity()->ProviderName;
        }

        $aColumns = array('ID', 'ProviderID', 'ProgramID', 'PeriodID', 'FileName', 'FileType', 'FileSize', 'Url');

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


        if ($_SESSION['loggedInDetails']["IsVl"] == 2 && $_SESSION['loggedInDetails']["IsProvider"] == 1) {
            $sQuery = $this->getAdapter()->select()->from(array('a' => $this->_name), array('pfid' => 'a.ID', 'ps.ProviderName', 'pr.ProgramCode', 'ro.PeriodDescription', 'a.FileName'))
                    ->joinLeft(array('ps' => 'rep_providers'), 'ps.ProviderID=a.ProviderID')
                    ->joinLeft(array('pr' => 'rep_programs'), 'pr.ProgramID=a.ProgramID')
                    ->joinLeft(array('ro' => 'rep_providerrounds'), 'ro.ID=a.PeriodID');
        } else {
            $sQuery = $this->getAdapter()->select()->from(array('a' => $this->_name), array('pfid' => 'a.ID', 'ps.ProviderName', 'pr.ProgramCode', 'ro.PeriodDescription', 'a.FileName'))
                    ->joinLeft(array('ps' => 'rep_providers'), 'ps.ProviderID=a.ProviderID')
                    ->joinLeft(array('pr' => 'rep_programs'), 'pr.ProgramID=a.ProgramID')
                    ->joinLeft(array('ro' => 'rep_providerrounds'), 'ro.ID=a.PeriodID')
                    ->where("ps.ProviderName='$pname'")
                    ->group("a.ID");
        }

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

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
            $row[] = $aRow['ProviderName'];
            $row[] = $aRow['ProgramCode'];
            $row[] = $aRow['PeriodDescription'];
            $row[] = $aRow['FileName'];
            $filename = "" . $aRow['FileName'] . "";
            $row[] = '<a href="/files/' . $filename . '" class="btn btn-warning btn-xs" style="margin-right: 2px;" target="_blank"><i class="icon-download"></i> Download</a>';
            $filename = "'" . $filename . "'";
            $row[] = '<button  class="btn btn-success btn-xs" ng-controller="PdfInfileDisplay"'
                    . ' onclick="displayPdfInline(' . $filename . ')" '
                    . 'style="margin-right: 2px;" target="_self"><i class="icon-eye"></i> Preview</button>';
            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function addData($provider, $program, $period, $names, $size, $type, $url) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'ProviderID' => $provider,
            'PeriodID' => $period,
            'ProgramID' => $program,
            'FileName' => $names,
            'FileSize' => $size,
            'FileType' => $type,
            'Url' => $url,
            'CreatedBy' => $authNameSpace->admin_id,
            'CreatedDate' => new Zend_Db_Expr('now()')
        );
        return $this->insert($data);
    }

    public function getFileDetails($adminId) {
        return $this->fetchRow($this->select()->where("ID = ? ", $adminId));
    }

}
