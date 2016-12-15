<?php

class Reports_RepositoryController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->addActionContext('report', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'report';
    }

    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $reportService = new Application_Service_Reports();
            $response = $reportService->getParticipantDetailedReport($params);
            $this->view->response = $response;
            $this->view->type = $params['reportType'];
        }
        $provider = new Application_Service_Providers();
        $this->view->providers = $provider->getProviders();
    }

    public function reportAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $reportService = new Application_Service_Importcsv();
            $reportService->getAllProviderDetailedReport($params);
        }
    }

    public function programsvslabsAction() {

        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);

        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = substr($whereArray['dateRange'], 0, 11);
            $whereArray['dateTo'] = substr($whereArray['dateRange'], 13);
        }


        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        }
        if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        if (!class_exists('database\crud\RepRepository')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\RepRepository.php';
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select DISTINCT ProgramID as name,count(DISTINCT LabID) as data"
                . "  from rep_repository";

        if (isset($whereArray['dateFrom'])) {
            $query .= " where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }

        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }

        //if(isset())
        $query .= " GROUP BY ProgramID;";

        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int) $query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }


        echo json_encode($query);
        exit();
    }

    public function labagainstsamplesAction() {

//        $whereArray = file_get_contents("php://input");
//        $whereArray = (array) json_decode($whereArray);

        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = substr($whereArray['dateRange'], 0, 11);
            $whereArray['dateTo'] = substr($whereArray['dateRange'], 13);
        }


        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        }
        if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        if (!class_exists('database\crud\RepRepository')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\RepRepository.php';
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select labID as name,count(SampleCode) as data"
                . "  from rep_repository";

        if (isset($whereArray['dateFrom'])) {
            $query .= " where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }

        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }

        //if(isset())
        $query .= " GROUP BY labID;";

        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int) $query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }


        echo json_encode($query);
        exit();
    }

    public function providervslabsAction() {

        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);

        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = substr($whereArray['dateRange'], 0, 11);
            $whereArray['dateTo'] = substr($whereArray['dateRange'], 13);
        }


        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        }
        if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        if (!class_exists('database\crud\RepRepository')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\RepRepository.php';
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select ProviderID as name,count(DISTINCT LabID) as data"
                . "  from rep_repository";

        if (isset($whereArray['dateFrom'])) {
            $query .= " where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }

        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }

        //if(isset())
        $query .= " GROUP BY ProviderID;";

        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int) $query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }


        echo json_encode($query);
        exit();
    }

    public function getprogramsAction() {
        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        }
        if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        if (!class_exists('database\crud\RepRepository')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\RepRepository.php';
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "Select*from rep_programs";
        echo json_encode($databaseUtils->rawQuery($query));
        exit();
    }

    public function samplesAction() {

        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);

        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = substr($whereArray['dateRange'], 0, 11);
            $whereArray['dateTo'] = substr($whereArray['dateRange'], 13);
        }


        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        }
        if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        if (!class_exists('database\crud\RepRepository')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\RepRepository.php';
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select DISTINCT RoundID as name,count(SampleCode)  as data";
        $query .= "";
        $query .= "  from rep_repository ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= "and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }

        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= "and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }

        //if(isset())
        $query .= " GROUP BY RoundID;";

        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int) $query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }


        echo json_encode($query);
        exit();
    }

    public function resultsAction() {

        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);

        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = substr($whereArray['dateRange'], 0, 11);
            $whereArray['dateTo'] = substr($whereArray['dateRange'], 13);
        }

        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        }
        if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        if (!class_exists('database\crud\RepRepository')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\RepRepository.php';
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select ProgramID as title,Grade as name, count(Grade) as data "
                . "from rep_repository ";

        if (isset($whereArray['dateFrom'])) {
            $query .= "where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= "and ProgramId ='" . $whereArray['ProgramId'] . "'";
        }

        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= "and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        $query .= " GROUP BY ProgramID,Grade ";

        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int) $query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }

        echo json_encode($query);
        exit();
    }

    public function testAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);

        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = substr($whereArray['dateRange'], 0, 11);
            $whereArray['dateTo'] = substr($whereArray['dateRange'], 13);
        }

        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        }
        if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        if (!class_exists('database\crud\RepRepository')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\RepRepository.php';
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select * "
                . "from rep_repository ";

//        if (isset($whereArray['dateFrom'])) {
//            $query .= "where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
//        }
//        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
//            $query .= "and ProgramId ='" . $whereArray['ProgramId'] . "'";
//        }
//
//        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
//            $query .= "and ProviderId ='" . $whereArray['ProviderId'] . "'";
//        }
//        $sytemAdmin = new \database\crud\SystemAdmin($databaseUtils);
//
//         $jsonData = json_encode(($sytemAdmin->query_from_system_admin(array(),array())));
//         
//
        $jsonData = ($databaseUtils->rawQuery($query));
        echo json_encode($jsonData);
        exit;
    }

}
