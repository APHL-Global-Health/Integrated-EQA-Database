<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_DbTable_ReadinessChecklistResponse extends Zend_Db_Table_Abstract {

    protected $_name = 'readiness_checklist_responses';
    protected $_primary = 'id';

    protected $_referenceMap    = array(
        'ReadinessChecklist' => array(
            'columns'           => array('readiness_checklist_id'),
            'refTableClass'     => 'Application_Model_DbTable_ReadinessChecklist',
            'refColumns'        => array('id')
        )
    );

    public function getAllReadinessChecklistResponses($parameters) {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        error_log(implode("--", $parameters));

        $aColumns = array('readiness_checklist_id', 'start_date', 'end_date', 'created_at', 'created_by');

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

        $sQuery = $this->getAdapter()->select()->from(array('a' => $this->_name));

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
            $row[] = $aRow['readiness_checklist_id'];
            $row[] = $aRow['start_date'];
            $row[] = $aRow['end_date'];
            $row[] = $aRow['created_at'];
            $creator = new Application_Service_SystemAdmin();
            $creatorDetails = $creator->getSystemAdminDetails($aRow['created_by']);
            $row[] = $creatorDetails['first_name'] . " " . $creatorDetails['last_name'];
            $row[] = '<a href="/admin/readiness-checklist/viewresponse/id/' . $aRow['id'] 
                    . '" class="btn btn-warning btn-xs" style="margin-right: 2px;">'
                    .'<i class="icon-pencil"></i> View Response</a> ';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
    
    public function getReadinessChecklistResponseDetails($responseID) {
        $response = $this->fetchRow($this->select()->where("id = ? ", $responseID))->toArray();
        $creator = new Application_Service_SystemAdmin();
        $creatorDetails = $creator->getSystemAdminDetails($response['created_by']);
        $response['creator'] = $creatorDetails['first_name'] . " " . $creatorDetails['last_name'];
        return $response;
    }

    public function addReadinessChecklistResponse($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $db = Zend_Db_Table_Abstract::getAdapter();
        $data = array(
            'readiness_checklist_id' => $params['readiness_checklist_id'],
            'start_date' => $params['start_date'],
            'end_date' => $params['end_date'],
            'created_by' => $authNameSpace->admin_id,
            'created_at' => date("Y-m-d H:i:s")
        );
        $saved = $this->insert($data);
        // Insert participants into readiness_checklist_responses
        return $saved;
    }

    public function updateReadinessChecklistResponse($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'readiness_checklist_id' => $params['readiness_checklist_id'],
            'start_date' => $params['start_date'],
            'end_date' => $params['end_date'],
            'created_by' => $authNameSpace->admin_id
        );
        return $this->update($data, "id=" . $params['readinessChecklistResponseId']);
    }

}
