<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/19/2018
 * Time: 08:30
 */


class Application_Model_DbTable_Corrective extends Zend_Db_Table_Abstract
{

    protected $_name = 'rep_corrective_action';
    protected $_primary = 'ID';
    protected $_db;

    public function init()
    {
        $this->_db = Zend_Db_Table_Abstract::getDefaultAdapter();
    }

    public function addCorrectiveAction($params)
    {


        try {
            unset($params['module'], $params['controller'],$params['action']);

            $params['createdBy'] = $_SESSION['loggedInDetails']["admin_id"];
            $insert_id = $this->_db->insert($this->_name, $params);
            if ($insert_id > 0) {

                return json_encode(array('status' => 1, 'message' => 'Corrective action submitted successfully'));
            } else {
                return json_encode(array('status' => 0, 'message' => 'Error,could not save data'));
            }
        } catch (Exception $e) {
            return json_encode(array('status' => 0, 'message' => 'Database error occured,please try again' . $e->getMessage()));
        }

    }

    public function getCorrective($parameters)
    {

        $aColumns = array('pt.ID', 'action', 'DATE_FORMAT(dateCreated,"%d-%b-%Y")',
            'pt.createdBy', 'Description', 'PeriodDescription', 'p.ProviderName', 'primary_email',
        "mflCode","datePerformed","elementCaptured");
        $orderColumns = array('pt.ID');

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
                    $sOrder .= $orderColumns[intval($parameters['iSortCol_' . $i])] . "
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

        $sQuery = $this->getAdapter()->select()
            ->from(array('pt' => $this->_name))
            ->joinLeft(array('pmm' => 'rep_programs'), 'pmm.ProgramID=pt.ProgramID', 'Description')
            ->joinLeft(array('r' => 'rep_providerrounds'), 'r.Id=pt.RoundID', 'PeriodDescription')
            ->joinLeft(array('p' => 'rep_providers'), 'p.ProviderId=pt.ProviderID', 'ProviderName')
            ->joinLeft(array('m' => 'mfl_facility_codes'), 'm.MflCode=pt.mflCode', 'Name')
            ->joinLeft(array('d' => 'system_admin'), 'd.admin_id=pt.createdBy', array('primary_email', 'first_name'));

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (in_array($_SESSION['loggedInDetails']["IsProvider"], array(2, 3))) {
            $sQuery = $sQuery->where("pt.createdBy = ".$_SESSION['loggedInDetails']["admin_id"]);;
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

        $general = new Pt_Commons_General();
        $count=0;
        foreach ($rResult as $aRow) {
            $link = '';
            $addedDateTime = explode(" ", $aRow['dateCreated']);
            if (isset($aRow['link']) && trim($aRow['link']) != '') {
                $link = '<a href="' . $aRow['link'] . '" target="_blank">' . $aRow['link'] . '<a>';
            }
            $row = array();
            $row[] = ++$count;//ucwords($aRow['ID']);
            $row[] = $aRow['Description'];
            $row[] = $aRow['ProviderName'];
            $row[] = $aRow['PeriodDescription'];
            $row[] = $aRow['actionDone'];

            $row[] = $aRow['datePerformed'];
            $row[] = $aRow['elementCaptured'];
            $row[] = $aRow['mflCode'] ."(".$aRow['Name'].")";



            $row[] = $aRow['primary_email'] . "(" . $aRow['first_name'] . ")";
            $row[] = $aRow['dateCreated'];
            $dis='';

            if (in_array($_SESSION['loggedInDetails']["IsProvider"], array(3))) {
                $dis='disabled';
            }

            $row[] = '<a href="/admin/corrective/delete/id/' . $aRow['ID'] . '" class="btn btn-danger btn-xs '.$dis.' style="margin-right: 2px;"><i class="icon-remove"></i> Delete</a>';

            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

    public function deleteCorrectiveAction($id)
    {

        $this->_db->delete($this->_name, "ID = ".$id);

    }

}