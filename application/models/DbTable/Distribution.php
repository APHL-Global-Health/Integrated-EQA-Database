<?php

class Application_Model_DbTable_Distribution extends Zend_Db_Table_Abstract
{

    protected $_name = 'distributions';
    protected $_primary = 'distribution_id';

    protected $_dependentTables = array('Application_Model_DbTable_Shipments');

    protected $_referenceMap    = array(
        'ReadinessChecklist' => array(
            'columns'           => array('readiness_checklist_survey_id'),
            'refTableClass'     => 'Application_Model_DbTable_ReadinessChecklistSurvey',
            'refColumns'        => array('id')
        )
    );

    public function getAllDistributions($parameters)
    {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('d.distribution_id', "DATE_FORMAT(distribution_date,'%d-%b-%Y')", 'distribution_code', 's.shipment_code', 'd.status');
        $orderColumns = array('d.distribution_id', 'distribution_date', 'distribution_code', 's.shipment_code', 'd.status');

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
                    if ($aColumns[$i] == "" || $aColumns[$i] == null) {
                        continue;
                    }
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

        $sQuery = $this->getAdapter()->select()->from(array('d' => $this->_name))
            ->joinLeft(array('s' => 'shipment'), 's.distribution_id=d.distribution_id', array('shipments' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT s.shipment_code SEPARATOR ', ')"), 'lastdate_response'))
            ->group('d.distribution_id');

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
            $row[] = Pt_Commons_General::humanDateFormat($aRow['distribution_date']);
            $row[] = $aRow['distribution_code'];
            $row[] = '<a href="/admin/shipment/index/searchString/' . $aRow['distribution_code'] . '">' . $aRow['shipments'] . '</a>';
            $row[] = '<span class="label label-info">'.ucwords($aRow['status']) . '</span>';

            $viewParticipants = '<a class="btn btn-primary btn-xs" href="/admin/readiness-checklist/participants/id/'.$aRow['readiness_checklist_survey_id'].'">View Participants</a> ';

            $edit = '<a class="btn btn-primary btn-xs" href="/admin/distributions/edit/d8s5_8d/' . base64_encode($aRow['distribution_id']) . '"><span><i class="icon-pencil"></i> Edit</span></a> ';

            $shipNow = '<a class="btn btn-primary btn-xs" href="javascript:void(0);" onclick="shipDistribution(\'' . base64_encode($aRow['distribution_id']) . '\')"><span><i class="icon-ambulance"></i> Ship Now</span></a>';

            $shippedEdit = '<a class="btn btn-primary btn-xs" href="/admin/distributions/edit/d8s5_8d/' . base64_encode($aRow['distribution_id']) . '/5h8pp3t/shipped"><span><i class="icon-pencil"></i> Edit</span></a> ';

            $finalize = '<a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="finalizeDistribution(\'' . base64_encode($aRow['distribution_id']) . '\')"><span>Finalize</span></a>';

            if ($this->getParticipantCount($aRow['distribution_id'], 2) > 0 && 
                $this->getShipmentCount($aRow['distribution_id']) > 0  && 
                ($aRow['status'] == 'configured' || $aRow['status'] == 'pending')) {

                $row[] = $edit . $viewParticipants . $shipNow;

            } else if (isset($aRow['status']) && $aRow['status'] == 'shipped') {

                if (isset($aRow['lastdate_response']) && (new DateTime($aRow['lastdate_response'])) < (new DateTime())) {
                    $row[] = $viewParticipants . $shippedEdit . $finalize;
                }else{
                    $row[] = $viewParticipants . $shippedEdit;
                }
            }else if(isset($aRow['status']) && $aRow['status'] == 'finalized') {
                $row[] = $viewParticipants;
            } else {
                $row[] = $viewParticipants . $edit . ' ' . '<a class="btn btn-primary btn-xs" href="/admin/shipment/index/did/' . base64_encode($aRow['distribution_id']) . '"><span><i class="icon-plus"></i> Add Scheme</span></a>';
            }


            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function getDistributions($parameters)
    {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('d.distribution_id', "DATE_FORMAT(distribution_date,'%d-%b-%Y')", 'distribution_code', 'd.status');
        $orderColumns = array('d.distribution_id', 'distribution_date', 'distribution_code', 'd.status');

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
                    if ($aColumns[$i] == "" || $aColumns[$i] == null) {
                        continue;
                    }
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

        $sQuery = $this->getAdapter()->select()->from(array('d' => $this->_name));

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

        //die($sQuery);

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
            $row[] = $aRow['distribution_code'];
            $row[] = Pt_Commons_General::humanDateFormat($aRow['distribution_date']);
            $row[] = ucwords($aRow['status']);
            if (isset($aRow['status']) && $aRow['status'] == 'created' || $aRow['status'] == 'configured' || $aRow['status'] == 'pending') {
                $row[] = '<a href="/readiness-checklist/add/roundId/' . $aRow['distribution_id'] . '/code/' . str_replace('/', "*", $aRow['distribution_code']) . '" class="btn btn-warning btn-xs" style="margin-right: 2px;">'
                    . '<i class="icon-pencil"></i> Readiness Checklist</a>';
            } else if (isset($aRow['status']) && $aRow['status'] == 'shipped') {
                $row[] = '<a href="/readiness-checklist/add" class="btn btn-warning btn-xs disabled" style="margin-right: 2px;">'
                    . '<i class="icon-pencil"></i> Readiness Checklist'
                    . '</a>';
            } else {
                $row[] = '<a href="/readiness-checklist/add" class="btn btn-danger btn-xs disabled" style="margin-right: 2px;">'
                    . '<i class="icon-pencil"></i> Not Allowed'
                    . '</a>';
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

    public function returnFilledForm()
    {

    }

    public function returnYearQuarter()
    {
        $month = date('m', time());
        switch ($month) {
            case $month >= 1 && $month <= 3:
                return 'A';
                break;
            case $month >= 4 && $month <= 6:
                return 'B';
                break;
            case $month >= 7 && $month <= 9:
                return 'C';
                break;
            case $month >= 10 && $month <= 12:
                return 'D';
                break;

            default:
                break;
        }
    }

    public function generateroundcode($id = null)
    {
        $roundName = '';
        $year = date('Y', time());
        $yearQuearter = $this->returnYearQuarter();
        if (isset($id)) {
            if ($id > 0) {
                $roundName .= '000' . $id;
            }
        } else {
            $roundName .= '00' . '1';
        }
        $roundName .= "/" . $year;
        $roundName = $yearQuearter . "/" . $roundName;
        return $roundName;
    }

    public function addDistribution($params, $labEmail = null)
    {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $common = new Application_Service_Common();
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $data = array('distribution_code' => "",
            'distribution_date' => Pt_Commons_General::dateFormat($params['distributionDate']),
            'readiness_checklist_survey_id' => $params['readiness_checklist_survey_id'],
            'status' => 'created',
            'created_by' => $authNameSpace->admin_id,
            'created_on' => new Zend_Db_Expr('now()'));

        //get participant emails

        $insertId = $this->insert($data);
        $updateInfo['distribution_code'] = $this->generateroundcode($insertId);

        $db->update('distributions', $updateInfo, "distribution_id ='" . $insertId . "' ");

    }

    public function sendReadinessEmailNotification($labEmail, $readinessDate = null){

        if(is_null($readinessDate))$readinessDate = date('YY-m-d');

        if (isset($labEmail)) {

            $subject = "New Round Readiness Checklist  " . $this->distribution_code;
            if (count($labEmail) > 0) {
                $common->sendReadinessEmail($labEmail, $subject, $readinessDate);
            }
            return $insertId;
        }
    }

    public function shipDistribution($params)
    {

    }

    public function getDistributionDates()
    {
        return $this->getAdapter()->fetchCol($this->select()->from($this->_name, new Zend_Db_Expr("DATE_FORMAT(distribution_date,'%d-%b-%Y')")));
    }

    public function getDistribution($did)
    {
        return $this->getAdapter()->fetchRow($this->select()->from($this->_name)->where("distribution_id = $did"));
    }

    public function updateDistribution($params)
    {
        error_log(json_encode($params));
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array('distribution_code' => $params['distributionCode'],
            'distribution_date' => Pt_Commons_General::dateFormat($params['distributionDate']),
            'readiness_checklist_survey_id' => $params['readiness_checklist_survey_id'],
            'updated_by' => $authNameSpace->admin_id,
            'updated_on' => new Zend_Db_Expr('now()'));
        return $this->update($data, "distribution_id=" . base64_decode($params['distributionId']));
    }

    public function getUnshippedDistributions()
    {
        return $this->fetchAll($this->select()->where("status != 'shipped'")->where("status != 'finalized'"));
    }

    public function getFinalizedDistributions()
    {
        return $this
            ->fetchAll($this->select()
                ->where("status = 'shipped'"));
    }

    public function updateDistributionStatus($distributionId, $status)
    {
        if (isset($status) && $status != null && $status != "") {
            return $this->update(array('status' => $status), "distribution_id=" . $distributionId);
        } else {
            return 0;
        }
    }

    public function getAllDistributionReports($parameters)
    {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array("DATE_FORMAT(distribution_date,'%d-%b-%Y')", 'distribution_code', 's.shipment_code', 'd.status');
        $orderColumns = array('distribution_date', 'distribution_code', 's.shipment_code', 'd.status');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = 'distribution_id';

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
                    if ($aColumns[$i] == "" || $aColumns[$i] == null) {
                        continue;
                    }
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

        $dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sQuery = $dbAdapter->select()->from(array('d' => 'distributions'))
            ->joinLeft(array('s' => 'shipment'), 's.distribution_id=d.distribution_id', array('shipments' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT s.shipment_code SEPARATOR ', ')"), 'not_finalized_count' => new Zend_Db_Expr("SUM(IF(s.status!='finalized',1,0))")))
            ->where("d.status='shipped'")
            ->group('d.distribution_id');

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

        $sQuery = $dbAdapter->select()->from(array('temp' => $sQuery))->where("not_finalized_count>0");

        $rResult = $dbAdapter->fetchAll($sQuery);

        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $dbAdapter->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */
        $aResultTotal = $dbAdapter->fetchAll($sQuery);
        $iTotal = count($aResultTotal);

        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($parameters['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        $shipmentDb = new Application_Model_DbTable_Shipments();
        foreach ($rResult as $aRow) {

            $shipmentResults = $shipmentDb->getPendingShipmentsByDistribution($aRow['distribution_id']);

            $row = array();
            $row['DT_RowId'] = "dist" . $aRow['distribution_id'];
            $row[] = Pt_Commons_General::humanDateFormat($aRow['distribution_date']);
            $row[] = $aRow['distribution_code'];
            $row[] = $aRow['shipments'];
            $row[] = ucwords($aRow['status']);
            $row[] = '<a class="btn btn-primary btn-xs" href="javascript:void(0);" onclick="getShipmentInReports(\'' . ($aRow['distribution_id']) . '\')"><span><i class="icon-search"></i> View</span></a>';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function getAllDistributionStatusDetails()
    {

        return $this->fetchAll($this->select());
    }

    public function getParticipantCount($distributionID, $status=-1)
    {
        $distribution = $this->find($distributionID)->current();
        $survey = $distribution->findParentRow('Application_Model_DbTable_ReadinessChecklistSurvey');
        $participants = $survey->findDependentRowset('Application_Model_DbTable_ReadinessChecklistParticipant')->toArray();

        $count = 0;
        if($status == -1){
            $count = count($participants);
        }else{
            foreach ($participants as $participant) {
                if($participant['status'] == $status) $count++;
            }
        }
        return $count;
    }

    public function getShipmentCount($distributionID, $status=-1)
    {
        $distribution = $this->find($distributionID)->current();
        $shipments = $distribution->findDependentRowset('Application_Model_DbTable_Shipments')->toArray();

        $count = 0;
        if($status == -1){ 
            $count = count($shipments);
        }else{
            foreach ($shipments as $shipment) {
                if($shipment['status'] == $status) $count++;
            }
        }
        return $count;
    }
}
