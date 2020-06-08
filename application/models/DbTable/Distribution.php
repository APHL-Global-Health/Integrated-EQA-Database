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

        Pt_Commons_General::log2File("Adding new distribution:".PHP_EOL.json_encode($data));

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

        Pt_Commons_General::log2File("Updating distribution:".PHP_EOL.json_encode($data));

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

            $authNameSpace = new Zend_Session_Namespace('administrators');
            $updateArray = array('status' => $status);
            if(strcmp($status, "finalized") == 0){
                $updateArray["finalized_at"] = new Zend_Db_Expr('now()');
                $updateArray["finalized_by"] = $authNameSpace->admin_id;
            }else{
                $updateArray["updated_on"] = new Zend_Db_Expr('now()');
                $updateArray["updated_by"] = $authNameSpace->admin_id;
            }
            
            Pt_Commons_General::log2File("Updating distribution status:".PHP_EOL.json_encode($updateArray));

            return $this->update($updateArray, "distribution_id=" . $distributionId);
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

    public function getDistributionResponseSummary($parameters) {

        $authNameSpace = new Zend_Session_Namespace('administrators');
        $assayID = 1; //VL=1, EID=2
        $assay = "";
        $whereDistribution = "";
        $wherePlatform = "";

        /*
         * SQL queries
         * Get data to display
         */

        if (isset($parameters['pt_survey']) && intval($parameters['pt_survey']) > 0) {
            $whereDistribution = "AND d.distribution_id = ". $parameters['pt_survey'];
        }

        if (isset($parameters['pt_platform']) && intval($parameters['pt_platform']) > 0) {
            $wherePlatform = "AND pl.ID = ". $parameters['pt_platform'];
        }

        if (isset($parameters['pt_assay']) && intval($parameters['pt_assay']) > 0) {
            $assayID = intval($parameters['pt_assay']);
        }

        $consensusVLQuery = "SELECT s.shipment_id, spm.platform_id, refvl.sample_id, s.shipment_code, pl.PlatformName, ".
                "refvl.sample_label, ROUND(AVG(IF(ISNULL(refvl.reference_result) OR refvl.reference_result = '', rrv.reported_viral_load, refvl.reference_result)),1) reference_result, ROUND(AVG(rrv.reported_viral_load),1) consensus, ROUND(stddev_pop(rrv.reported_viral_load),1) sdevp ".
                "FROM reference_result_vl refvl ".
                "INNER JOIN shipment s ON refvl.shipment_id = s.shipment_id ".
                "INNER JOIN shipment_participant_map spm ON s.shipment_id = spm.shipment_id AND spm.is_pt_test_not_performed IS NULL ".
                "INNER JOIN response_result_vl rrv ON rrv.shipment_map_id = spm.map_id AND refvl.sample_id = rrv.sample_id ".
                "INNER JOIN platforms pl ON spm.platform_id = pl.ID $wherePlatform ".
                "WHERE refvl.control = 0 AND spm.assay_id = $assayID ".
                "GROUP BY s.shipment_id, spm.platform_id, refvl.sample_id";

        $responsesVLQuery = "SELECT spm.shipment_id, spm.platform_id, spm.participant_id, p.MflCode AS lab_code, p.institute_name, ".
                "d.distribution_name, results.PlatformName AS platform_name, results.sample_label, results.reference_result, ".
                "ROUND(rrv.reported_viral_load,1) reported_viral_load, results.consensus, results.sdevp, ".
                "ROUND(ABS(ROUND(rrv.reported_viral_load,1) - results.reference_result) /results.sdevp, 1) zscore,".
                "IF(ABS(ROUND(rrv.reported_viral_load,1) - results.reference_result) /results.sdevp <= 2, 1, IF(ABS(ROUND(rrv.reported_viral_load,1) - results.reference_result)/results.sdevp <= 3,0.8,0)) AS score ".
                "FROM shipment_participant_map spm ".
                "INNER JOIN shipment s ON spm.shipment_id = s.shipment_id ".
                "INNER JOIN distributions d ON s.distribution_id = d.distribution_id $whereDistribution ".
                "INNER JOIN participant p ON spm.participant_id = p.participant_id ".
                "INNER JOIN ($consensusVLQuery) AS results ON spm.shipment_id = results.shipment_id ".
                    "AND spm.platform_id = results.platform_id AND spm.assay_id = $assayID ".
                "INNER JOIN response_result_vl rrv ON spm.map_id = rrv.shipment_map_id AND results.sample_id = rrv.sample_id ".
                "WHERE spm.is_pt_test_not_performed IS NULL";


        $sQuery = "SELECT x.distribution_name, x.platform_name, x.lab_code, SUM(score)/COUNT(*)*100 AS pass_fail, ".
                    "GROUP_CONCAT(IF(score=0,sample_label,NULL)) AS samples FROM".
                    "($responsesVLQuery) AS x GROUP BY x.shipment_id, x.platform_id, x.participant_id";
        $assay = "Viral Load";

        $rResult = $this->getAdapter()->fetchAll($sQuery);

        /*
         * Output
         */
        $output = array(
            "sEcho" => 1,
            "iTotalRecords" => count($rResult),
            "iTotalDisplayRecords" => count($rResult),
            "aaData" => array(),
            "rawResults" => array()
        );

        $passMark = 80;

        foreach ($rResult as $aRow) {
            $row = array();

            $row['distribution_name'] = $aRow['distribution_name'];
            $row['platform_name'] = $aRow['platform_name'];
            $row['lab_code'] = $aRow['lab_code'];
            $row['pass_fail'] = round($aRow['pass_fail'], 2);
            $row['score'] = $aRow['pass_fail']>=$passMark?"Acceptable":"Unacceptable";
            $row['samples'] = $aRow['samples'];
            $row['assay_name'] = $assay;

            $output['aaData'][] = $row;
        }

        $rResult = $this->getAdapter()->fetchAll($responsesVLQuery);
        $output['rawResults'] = $rResult;

        return $output;
    }

    public function evaluate($parameters) {

        $authNameSpace = new Zend_Session_Namespace('administrators');
        $assayID = 1; //VL=1
        $assay = "";
        $whereDistribution = "";
        $wherePlatform = "";

        /*
         * SQL queries
         * Get data to display
         */

        if (isset($parameters['pt_survey']) && intval($parameters['pt_survey']) > 0) {
            $whereDistribution = "AND d.distribution_id = ". $parameters['pt_survey'];
        }

        if (isset($parameters['pt_platform']) && intval($parameters['pt_platform']) > 0) {
            $wherePlatform = "AND pl.ID = ". $parameters['pt_platform'];
        }

        if (isset($parameters['pt_assay']) && intval($parameters['pt_assay']) > 0) {
            $assayID = intval($parameters['pt_assay']);
        }

        $consensusVLQuery = "SELECT s.shipment_id, spm.platform_id, refvl.sample_id, s.shipment_code, pl.PlatformName, ".
                "refvl.sample_label, ROUND(AVG(IF(ISNULL(refvl.reference_result) OR refvl.reference_result = '', rrv.reported_viral_load, refvl.reference_result)),1) reference_result, ROUND(AVG(rrv.reported_viral_load),1) consensus, ROUND(stddev_pop(rrv.reported_viral_load),1) sdevp ".
                "FROM reference_result_vl refvl ".
                "INNER JOIN shipment s ON refvl.shipment_id = s.shipment_id ".
                "INNER JOIN shipment_participant_map spm ON s.shipment_id = spm.shipment_id AND spm.is_pt_test_not_performed IS NULL ".
                "INNER JOIN response_result_vl rrv ON rrv.shipment_map_id = spm.map_id AND refvl.sample_id = rrv.sample_id ".
                "INNER JOIN platforms pl ON spm.platform_id = pl.ID $wherePlatform ".
                "WHERE refvl.control = 0 AND spm.assay_id = $assayID ".
                "GROUP BY s.shipment_id, spm.platform_id, refvl.sample_id";

        $responsesVLQuery = "SELECT spm.map_id, results.sample_id, ".
                "ROUND(rrv.reported_viral_load,1) reported_viral_load, results.consensus, results.sdevp, ".
                "IF(ABS(ROUND(rrv.reported_viral_load,1) - results.reference_result) /results.sdevp <= 2, 1, IF(ABS(ROUND(rrv.reported_viral_load,1) - results.reference_result)/results.sdevp <= 3,0.8,0)) AS score ".
                "FROM shipment_participant_map spm ".
                "INNER JOIN shipment s ON spm.shipment_id = s.shipment_id ".
                "INNER JOIN distributions d ON s.distribution_id = d.distribution_id $whereDistribution ".
                "INNER JOIN participant p ON spm.participant_id = p.participant_id ".
                "INNER JOIN ($consensusVLQuery) AS results ON spm.shipment_id = results.shipment_id ".
                    "AND spm.platform_id = results.platform_id AND spm.assay_id = $assayID ".
                "INNER JOIN response_result_vl rrv ON spm.map_id = rrv.shipment_map_id AND results.sample_id = rrv.sample_id ".
                "WHERE spm.is_pt_test_not_performed IS NULL";

        $rResult = $this->getAdapter()->fetchAll($responsesVLQuery);
        $responseResultVL = new Application_Model_DbTable_ResponseVl();
        foreach ($rResult as $aRow) {
            Pt_Commons_General::log2File(
                "Evaluation performed by ".$authNameSpace->admin_id."\n".
                json_encode(array("calculated_score" => $aRow['score']))." WHERE ".
                json_encode(
                    array("shipment_map_id" => $aRow['map_id'],
                        "sample_id" => $aRow['sample_id']))
            );

            $responseResultVL->update(
                array("calculated_score" => $aRow['score']),
                "shipment_map_id = ".$aRow['map_id']." AND sample_id = ".$aRow['sample_id']
            );
        }


        $sQuery = "SELECT x.map_id, ROUND(SUM(score)/COUNT(*)*100) AS pass_fail FROM".
                    "($responsesVLQuery) AS x GROUP BY x.map_id";

        $passMark = 80;

        $shipmentPartipantMap = new Application_Model_DbTable_ShipmentParticipantMap();
        $rResult = $this->getAdapter()->fetchAll($sQuery);
        foreach ($rResult as $aRow) {
            Pt_Commons_General::log2File(
                "Evaluation result: ".
                json_encode(
                    array(
                        "shipment_score" => $aRow['pass_fail'],
                        "final_result" => ($aRow['pass_fail'] >= $passMark),
                        "report_generated" => "yes"
                    )).
                " WHERE " . json_encode(array("map_id" => $aRow['map_id'])));

            $shipmentPartipantMap->update(
                array("shipment_score" => $aRow['pass_fail'], "final_result" => intval($aRow['pass_fail'] >= $passMark), "report_generated" => "yes"),
                "map_id = ". $aRow['map_id']);
        }
    }

}
