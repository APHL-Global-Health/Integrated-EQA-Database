<?php

require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
        . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'Bacteriology' . DIRECTORY_SEPARATOR . 'application'
        . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'main.php';

class Reports_GraphsController extends Zend_Controller_Action {

    protected $homeDir;
    protected $dbConnection;
    protected $dbLimit;

    public function init() {
        /* Initialize action controller here */

        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->addActionContext('report', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'report';
        $this->homeDir = dirname($_SERVER['DOCUMENT_ROOT']);

        $this->dbConnection = new Main();
        $this->dbLimit = 1000;
    }

    public function validateAction() {
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

    public function indexAction() {
        

    }

    public function reportAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $reportService = new Application_Service_Importcsv();
            $reportService->getAllProviderDetailedReport($params);
        }
    }

    public function testgraphAction() {

        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }

        $query = "select DISTINCT ProgramID as name,count(DISTINCT LabID) as data"
                . "  from rep_repository";
        //if(isset())
        $query .= " GROUP BY ProgramID ";
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
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

    public function programsvslabsAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select DISTINCT ProgramID as name,count(DISTINCT rep_repository.MflCode) as data"
                . "  from rep_repository  left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= " where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }

        $query .= $this->returnUserCountStatement($whereArray['county']);
        //if(isset())
        $query .= " GROUP BY ProgramID ";
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
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
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select mfl_facility_codes.Name as name,rep_repository.MflCode,count(SampleCode) as data"
                . "  from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= " where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
        //if(isset())
        $query .= $this->returnUserCountStatement($whereArray['county']);
        $query .= " GROUP BY rep_repository.MflCode  order by data desc ";
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
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

    public function getlabperformanceAction() {

        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "";

        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['sample']) && !empty($whereArray['sample'])) {
            $query .= " and SampleCode ='" . $whereArray['sample'] . "'";
        }

//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {

        $query .= $this->returnUserCountStatement($whereArray['county']); //" and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
//        echo $query;
//        exit;
//        $sytemAdmin = new \database\crud\SystemAdmin($databaseUtils);
//
//        $jsonData = json_encode(($sytemAdmin->query_from_system_admin(array(), array())));
        $innerWhere = str_replace('where', ' and ', $query);
        $select = "select rep_repository.MflCode as LID,Name,RoundID as RoundID,SampleCode,EventDate,County,count(if(grade='acceptable',1,null))
            as acceptable,
            count(if(grade='not acceptable',1,null))  as unacceptable 
            from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode  $query ";
        $select .= " GROUP BY rep_repository.MflCode,RoundID order by LID asc ";
//        echo $select;
//        exit;
        $query .= "  LIMIT " . $this->dbLimit;
        $jsonData = $this->dbConnection->doQuery($select); //$databaseUtils->rawQuery($query);
        $_SESSION['currentRepoData'] = $jsonData;
        $_SESSION['filterData'] = $whereArray;

        if (count($jsonData) > 0) {
            for ($i = 0; $i < sizeof($jsonData); $i++) {

                $jsonData[$i]['percent'] = round(($jsonData[$i]['acceptable'] / ($jsonData[$i]['acceptable'] + $jsonData[$i]['unacceptable']) * 100), 2);
//                $where['LabName'] = $jsonData[$i]['LID'];
//
//                $labDetails = $this->returnValueWhere($where, 'rep_labs');
//
//                $whereCounty['CountyID'] = isset($labDetails['County']) ? $labDetails['County'] : '';
//
//                $countyDetails = $this->returnValueWhere($whereCounty, 'rep_counties');

                $jsonData[$i]['county'] = $jsonData[$i]['County']; // isset($countyDetails['Description']) ? $countyDetails['Description'] : "NOT SET";
            }
        }


        echo json_encode($jsonData);

        exit;
    }

    public function countyagainstlabsAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }

        $query = "select County as name,count(DISTINCT rep_repository.MflCode) as data"
                . "  from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= " where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and rep_repository.labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
        $query .= $this->returnUserCountStatement($whereArray['county']);
        //if(isset())
        $query .= " GROUP BY County ";
//        echo $query;
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {

//                $where['CountyID'] = $query[$i]['name'];
//                $countyDetails = $this->returnValueWhere($where, 'rep_counties');
                $query[$i]['name'] = $query[$i]['name']; // isset($countyDetails['Description']) ? $countyDetails['Description'] : "NOT SET";
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
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select ProviderID as name,count(DISTINCT rep_repository.MflCode) as data"
                . "  from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= " where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
        $query .= $this->returnUserCountStatement($whereArray['county']);
        //if(isset())
        $query .= " GROUP BY ProviderID ";
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
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

    public function getcountiesAction() {


        $query = "Select*from rep_counties";
        echo json_encode($this->dbConnection->doQuery($query));
        exit();
    }

    public function getprogramsAction() {


        $query = "Select*from rep_programs";
        echo json_encode($this->dbConnection->doQuery($query));
        exit();
    }

    public function samplesAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select DISTINCT RoundID as name,count(SampleCode)  as data";
        $query .= "";
        $query .= "  from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
        $query .= $this->returnUserCountStatement($whereArray['county']);
        //if(isset())
        $query .= " GROUP BY RoundID ";
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
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

    public function roundagainstresultsAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select RoundID as title,Grade as name, count(Grade) as data "
                . "from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
        $query .= $this->returnUserCountStatement($whereArray['county']);
        $query .= " GROUP BY RoundID,Grade ORDER BY title ";
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
        $titles = array();
        $labGrades = array();
        for ($i = 0; $i < count($query); $i++) {
            if (!in_array($query[$i]['title'], $titles)) {
                array_push($titles, $query[$i]['title']);
            }
            $labName = $query[$i]['title'];
            $gradeName = $query[$i]['name'];
            $gradeCount = $query[$i]['data'];
            $labGrade = array(
                "name" => $labName . ':' . $gradeName,
                "data" => array((int) $gradeCount));
            array_push($labGrades, $labGrade);
        }
        $labGradeResults = array("category" => $titles, "data" => $labGrades);
        echo json_encode($labGradeResults);
        exit();
    }

    public function labagainstresultsAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select mfl_facility_codes.Name as title,rep_repository.MflCode,Grade as name, count(Grade) as data "
                . "from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
        $query .= $this->returnUserCountStatement($whereArray['county']);
        $query .= " GROUP BY rep_repository.MflCode,Grade ORDER BY title ";
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
        $titles = array();
        $labGrades = array();
        for ($i = 0; $i < count($query); $i++) {
            if (!in_array($query[$i]['title'], $titles)) {
                array_push($titles, $query[$i]['title']);
            }
            $labName = $query[$i]['title'];
            $gradeName = $query[$i]['name'];
            $gradeCount = $query[$i]['data'];
            $labGrade = array(
                "name" => $labName . ':' . $gradeName,
                "data" => array((int) $gradeCount));
            array_push($labGrades, $labGrade);
        }
        $labGradeResults = array("category" => $titles, "data" => $labGrades);
        echo json_encode($labGradeResults);
        exit();
    }



    public function progranvsresultsAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select ProgramID as title,Grade as name, count(Grade) as data "
                . "from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
//            $query .= " and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
        $query .= $this->returnUserCountStatement($whereArray['county']);
        $query .= " GROUP BY ProgramID,Grade ";
//        $query = $this->dbConnection->doQuery($query);
        $query .= "  LIMIT " . $this->dbLimit;
        $query = $this->dbConnection->doQuery($query);
//         print_r($query);
//         exit;
//         
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int) $query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }
//        if(sizeof($query) > 0){
        echo json_encode($query);
//        }else{
//            echo json_encode(array());
//        }
        exit();
    }

    public function getparticipantionresultcodeAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select rep_repository.MflCode,Name,County,Constituency ,ResultCode,count(ResultCode) as Count "
                . "from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode  ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['AnalyteID']) && !empty($whereArray['AnalyteID'])) {
            $query .= " and AnalyteID ='" . $whereArray['AnalyteID'] . "'";
        }
        if (isset($whereArray['ResultCode']) && !empty($whereArray['ResultCode'])) {
            $query .= " and ResultCode ='" . $whereArray['ResultCode'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {

        $query .= $this->returnUserCountStatement($whereArray['county']); //" and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
//        $sytemAdmin = new \database\crud\SystemAdmin($databaseUtils);
//
//        $jsonData = json_encode(($sytemAdmin->query_from_system_admin(array(), array())));

        $query .= " GROUP BY rep_repository.MflCode,ResultCode order by Name ";
// echo $query;
//        exit;
        $query .= "  LIMIT " . $this->dbLimit;
        $jsonData = $this->dbConnection->doQuery($query); //$databaseUtils->rawQuery($query);
        $_SESSION['currentRepoData'] = $jsonData;
        $_SESSION['filterData'] = $whereArray;

        echo json_encode($jsonData);

        exit;
    }

    public function participantlabsresultsAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select mfl_facility_codes.MflCode,Name,Constituency,County,Approved,AnalyteID "
                . "from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode  ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['AnalyteID']) && !empty($whereArray['AnalyteID'])) {
            $query .= " and AnalyteID ='" . $whereArray['AnalyteID'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {

        $query .= $this->returnUserCountStatement($whereArray['county']); //" and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
//        echo $query;
//        exit;
//        $sytemAdmin = new \database\crud\SystemAdmin($databaseUtils);
//
//        $jsonData = json_encode(($sytemAdmin->query_from_system_admin(array(), array())));

        $query .= " GROUP BY mfl_facility_codes.MflCode order by mfl_facility_codes.MflCode";
        $query .= "  LIMIT " . $this->dbLimit;
        $jsonData = $this->dbConnection->doQuery($query); //$databaseUtils->rawQuery($query);
        $_SESSION['currentRepoData'] = $jsonData;
        $_SESSION['filterData'] = $whereArray;
        echo json_encode($jsonData);

        exit;
    }

    public function returnValueWhere($id, $tableName) {
        $returnArray = array();
        if (!is_array($id)) {
            if ($tableName == 'data_manager') {
                $whereId['dm_id'] = $id;
            } else if ($tableName == 'participant') {
                $whereId['participant_id'] = $id;
            } else if ($tableName == 'rep_labs') {
                $whereId['labID'] = $id;
            } else if ($tableName == 'participant_manager_map') {
                $whereId['dm_id'] = $id;
            } else {
                $whereId['id'] = $id;
            }
        } else {
            $whereId = $id;
        }
        if (is_array($whereId)) {
            $dataDB = $this->dbConnection->selectFromTable($tableName, $whereId);
//            echo($dataDB);
//            exit;
            if ($dataDB != false) {
                try {

                    foreach ($dataDB as $key => $value) {
                        // array_push($returnArray,$value);
                        $returnArray = $value;
                    }
                } catch (Exception $e) {
                    return '';
                }
            } else {
                
            }
        }
        return (array) $returnArray;
        exit();
    }

    public function resultsAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select * "
                . "from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
//        if (isset($whereArray['county']) && !empty($whereArray['county'])) {

        $query .= $this->returnUserCountStatement($whereArray['county']); //" and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
//        }
//        echo $query;
//        exit;
//        $sytemAdmin = new \database\crud\SystemAdmin($databaseUtils);
//
//        $jsonData = json_encode(($sytemAdmin->query_from_system_admin(array(), array())));
        $query .= "  LIMIT " . $this->dbLimit;
        $jsonData = $this->dbConnection->doQuery($query); //$databaseUtils->rawQuery($query);
        $_SESSION['currentRepoData'] = $jsonData;
        $_SESSION['filterData'] = $whereArray;
        echo json_encode($jsonData);

        exit;
    }

    public function getvalidationdataAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }


        $query = "select * "
                . "from rep_repository left join mfl_facility_codes on mfl_facility_codes.MflCode= rep_repository.MflCode ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where EventDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= " and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= " and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['MflCode']) && !empty($whereArray['MflCode'])) {
            $query .= " and rep_repository.MflCode ='" . $whereArray['MflCode'] . "'";
        }

        $query .= " and rep_repository.valid ='1' and Status = '1' ";

        $query .= $this->returnUserCountStatement($whereArray['county']);
        $query .= "  LIMIT " . $this->dbLimit;
        $jsonData = $this->dbConnection->doQuery($query); //$databaseUtils->rawQuery($query);
        $_SESSION['currentRepoData'] = $jsonData;
        $_SESSION['filterData'] = $whereArray;
        echo json_encode($jsonData);

        exit;
    }

    public function generatecsvAction() {
        $data = $_SESSION['currentRepoData'];

        $name = 'EPT Repository Data' . date("d-m-Y H:j", time());
        header("Content-Type: text/csv");

        header("Content-Disposition: attachment; filename=" . $name . ".csv");

        $headers = array('ImpID',
            'ProviderID', 'LabID',
            'RoundID', 'ProgramID',
            'EventDate', 'SampleCode',
            'AnalyteID', 'SampleCondition',
            'DateSampleReceived', 'Result',
            'ResultCode', 'Grade',
            'TestKitID', 'DateSampleShipped',
            'FailReasonCode', 'Frequency',
            'StCount', 'TragetValue',
            'UpperLimit', 'LowerLimit',
            'OverallScore');
        //  array_merge($data, $headers);
        $output = fopen("php://output", "w");
        $searchArray = $_SESSION['filterData'];

        $dateArray['dateFrom'] = 'Date From :' . $searchArray['dateFrom'];
        $dateTo['dateTo'] = 'Date To :' . $searchArray['dateTo'];

        $provider['provider'] = 'Provider : ' . strtoupper($searchArray['ProviderId']);
        $county['county'] = 'County : ' . strtoupper($searchArray['county']);
        $prog['provider'] = 'Program : ' . strtoupper($searchArray['ProgramId']);
        fputcsv($output, $dateArray);
        fputcsv($output, $dateTo);
        fputcsv($output, $provider);
        fputcsv($output, $prog);
        fputcsv($output, $county);
        fputcsv($output, $headers);
        foreach ($data as $row) {
            fputcsv($output, $row); // here you can change delimiter/enclosure
        }

        fclose($output);
        exit();
    }

    public function deleteinvalidAction() {
        $data = $params = $this->_getAllParams();


        $where['ImpId'] = $data['id'];
        $deleteStatus = $this->dbConnection->deleteFromWhere('rep_repository', $where);

        if ($deleteStatus['status'] == 1) {
            echo json_encode(array('status' => 1, 'message' => 'success'));
        } else {
            echo json_encode(array('status' => 0, 'message' => 'Record could not be deleted'));
        }

        exit;
    }

    public function deletebatchAction() {
        $data = $params = $this->_getAllParams();
        $where['BatchID'] = $data['BatchID'];
        $deleteStatus = $this->dbConnection->deleteFromWhere('rep_repository', $where);

        if ($deleteStatus['status'] == 1) {
            echo json_encode(array('status' => 1, 'message' => 'success'));
        } else {
            echo json_encode(array('status' => 0, 'message' => 'Record could not be deleted'));
        }
        exit;
    }

    public function updatebatchAction() {
        $data = $params = $this->_getAllParams();
        $batchID = $data['BatchID'];
        $whereCount['BatchID'] = $batchID;
        $whereCount['valid'] = 0;
        $col = 'valid';
        $getCount = $this->dbConnection->selectCount('rep_repository', $whereCount, $col);

//doQuery("select count(valid) as VCount from rep_repository where valid = 0 and BatchID = '" . $batchID . "'");
        if ($getCount == 0) {

            $updateData['Status'] = 1;
            $where['BatchID'] = $batchID;
            $where['valid'] = 1;
            $update = $this->dbConnection->updateTable('rep_repository', $where, $updateData);

            echo json_encode(array('status' => 1, 'message' => 'success'));
        } else {
            echo json_encode(array('status' => 0, 'message' => 'The batch has invalid records,please corrent'));
        }


        exit;
    }

    public function qaapprovevalidationdataAction() {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array) json_decode($whereArray);

        if (isset($whereArray['Status'])) {
            $updateData['Status'] = $whereArray['Status'];
        } else {
            $updateData['AdminApproved'] = 1;
        }
        $where['BatchID'] = $whereArray['BatchID'];
        $where['valid'] = 1;

        $where['Status'] = 1;
        $update = $this->dbConnection->updateTable('rep_repository', $where, $updateData);

        echo json_encode(array('status' => 1, 'message' => 'success'));
        exit;
    }

    public function returnUserCountStatement($county) {
        $sql = '';
        if (isset($county) && !empty($county)) {
            $sql = " and  mfl_facility_codes.County ='" . $county . "' ";
        }
        if (isset($_SESSION['loggedInDetails'])) {
            $ses = $_SESSION['loggedInDetails'];
            if ($ses['IsVl'] == 2) {
                if ($ses['IsProvider'] == 3) {
//                    $where['CountyID'] = $ses['County'];
//                    $countyDetails = $this->returnValueWhere($where, 'rep_counties');
//                    $county = $countyDetails['Description'];
                    $sql = " and  mfl_facility_codes.County  ='" . $county . "' ";
                }
            }
        }
        $sql .= " and rep_repository.Status ='1' ";
        return $sql;
    }

    public function convertdate($dateString) {

        $dateString = date_format(date_create($dateString), "Y-m-d");

        return $dateString;
    }

}

?>