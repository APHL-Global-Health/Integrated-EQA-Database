<?php

class Application_Model_DbTable_Readiness extends Zend_Db_Table_Abstract
{

    protected $_name = 'ReadinessChecklist';
    protected $_primary = 'ID';

    
    public function addReadinessDetails($params){
        $partnerId = 0;
        $authNameSpace = new Zend_Session_Namespace('administrators');
        
        if(isset($params['ParticipantID']) && trim($params['ParticipantID'])!= ''){
            $data = array(
                          'ParticipantID'=>$params['ParticipantID'],
                          'q1'=>$params['q1'],
                          'q2'=>$params['q2'],
                          'q3'=>$params['q3'],
                          'q4'=>$params['q4'],
                          'q5'=>$params['q5'],
                          'q6'=>$params['q6'],
                          'added_by' => $authNameSpace->admin_id,
                          'added_on' => new Zend_Db_Expr('now()'),
                          'status' => 'In review'
                          );
            //$partnerId = $this->insert($data);
//	    if($partnerId >0){
//		$sortOrder = 1;
//		$partnerQuery = $this->getAdapter()->select()->from(array('pt' => $this->_name), array('pt.sort_order'))
//				     ->order("pt.sort_order DESC");
//		$partnerResult = $this->getAdapter()->fetchRow($partnerQuery);
//		if($partnerResult){
//		    $sortOrder = $partnerResult['sort_order']+1;
//		}
//		$this->update(array('sort_order'=>$sortOrder),"partner_id = ".$partnerId);
//	    }
        }
      return $partnerId;
    }
    public function addReadiness($params){
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $data = array(
                          'ParticipantID'=>$params['ParticipantID'],
                          'q1'=>$params['q1'],
                          'q2'=>$params['q2'],
                          'q3'=>$params['q3'],
                          'q4'=>$params['q4'],
                          'q5'=>$params['q5'],
                          'q6'=>$params['q6'],
                          'added_by' => $authNameSpace->admin_id,
                          'added_on' => new Zend_Db_Expr('now()'),
                          'status' => 'In review'
                          );
        return $this->insert($data);
    }
    public function fetchAllReadiness($parameters){
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('ID','participantName','verdict','DATE_FORMAT(added_on,"%d-%b-%Y")','status');
        $orderColumns = array('ID','participantName','verdict','added_on','status');

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

        $sQuery = $this->getAdapter()->select()->from(array('pt' => $this->_name),array('participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT pmm.first_name,\" \",pmm.last_name ORDER BY pmm.first_name SEPARATOR ', ')"),'pt.verdict','pt.status','pt.added_on','pt.ID'))
                ->joinLeft(array('pmm' => 'participant'), 'pmm.participant_id=pt.ParticipantID');
	
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

        $general = new Pt_Commons_General();
        foreach ($rResult as $aRow) {
            $link = '';
            $addedDateTime = explode(" ",$aRow['added_on']);
            if(isset($aRow['link']) && trim($aRow['link'])!= ''){
                $link = '<a href="'.$aRow['link'].'" target="_blank">'.$aRow['link'].'<a>';
            }
            $row = array();
            $row[] = ucwords($aRow['participantName']);
            $row[] = ucwords($aRow['verdict']);
            $row[] = $general->humanDateFormat($addedDateTime[0]);
            $row[] = $aRow['status'];
            $row[] = '<a href="/admin/readiness/edit/id/' . $aRow['ID'] . '" class="btn btn-warning btn-xs" style="margin-right: 2px;"><i class="icon-pencil"></i> Edit</a>';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
    
    public function fetchPartner($partnerId){
       return $this->fetchRow("partner_id = ".$partnerId); 
    }
    
    public function fetchAllActivePartners(){
        $sql = $this->select()->where("status = ? ","active")->order("sort_order ASC");
	return $this->fetchAll($sql);
    }
    public function updateReadiness($params){
	$authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
                          'verdict'=>$params['verdict'],
                          'comment'=>$params['comment'],
                          'status' => $params['status'],
                          );
        return $this->update($data,"ParticipantID=".$params['ParticipantID']);
    }
    public function getReadinessDetails($adminId){
        return $this->fetchRow($this->select()->where("ParticipantID = ? ",$adminId));
    }
}