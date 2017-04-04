<?php


class Reports_RepositoryController extends Zend_Controller_Action
{
    protected $homeDir;

    public function init()
    {
        /* Initialize action controller here */

        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
            ->addActionContext('report', 'html')
            ->initContext();
        $this->_helper->layout()->pageName = 'report';
        $this->homeDir = dirname($_SERVER['DOCUMENT_ROOT']);
        if (!class_exists('databases'. DIRECTORY_SEPARATOR .'core'. DIRECTORY_SEPARATOR .'mysql'. DIRECTORY_SEPARATOR .'DatabaseUtils')) {
            require_once $this->homeDir . DIRECTORY_SEPARATOR . 'database'. DIRECTORY_SEPARATOR .'core-apis'. DIRECTORY_SEPARATOR .'DatabaseUtils.php';
        }
        if (!class_exists('database'. DIRECTORY_SEPARATOR .'crud'. DIRECTORY_SEPARATOR .'SystemAdmin')) {
            require_once $this->homeDir . DIRECTORY_SEPARATOR . 'database'. DIRECTORY_SEPARATOR .'crud'. DIRECTORY_SEPARATOR .'SystemAdmin.php';
        }
        if (!class_exists('database'. DIRECTORY_SEPARATOR .'crud'. DIRECTORY_SEPARATOR .'RepRepository')) {
            require_once $this->homeDir . DIRECTORY_SEPARATOR . 'database'. DIRECTORY_SEPARATOR .'crud'. DIRECTORY_SEPARATOR .'RepRepository.php';
        }
    }

    public function indexAction()
    {
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

    public function reportAction()
    {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $reportService = new Application_Service_Importcsv();
            $reportService->getAllProviderDetailedReport($params);
        }
    }


    public function testgraphAction()
    {

        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }
        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select DISTINCT ProgramID as name,count(DISTINCT LabID) as data"
            . "  from rep_repository";
        //if(isset())
        $query .= " GROUP BY ProgramID;";
        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int)$query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }
        echo json_encode($query);
        exit();
    }

    public function programsvslabsAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
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
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }
        //if(isset())
        $query .= " GROUP BY ProgramID;";
        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int)$query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }
        echo json_encode($query);
        exit();
    }

    public function labagainstsamplesAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
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
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }
        //if(isset())
        $query .= " GROUP BY labID  order by data desc;";

        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int)$query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }
        echo json_encode($query);
        exit();
    }

    public function providervslabsAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
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
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }
        //if(isset())
        $query .= " GROUP BY ProviderID;";
        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int)$query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }
        echo json_encode($query);
        exit();
    }

    public function getcountiesAction()
    {

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "Select*from rep_counties";
        echo json_encode($databaseUtils->rawQuery($query));
        exit();
    }

    public function getprogramsAction()
    {

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "Select*from rep_programs";
        echo json_encode($databaseUtils->rawQuery($query));
        exit();
    }

    public function samplesAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
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
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }
        //if(isset())
        $query .= " GROUP BY RoundID;";
        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int)$query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }
        echo json_encode($query);
        exit();
    }

    public function roundagainstresultsAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select RoundID as title,Grade as name, count(Grade) as data "
            . "from rep_repository ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= "and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= "and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }
        $query .= " GROUP BY RoundID,Grade ORDER BY title";
        $query = ($databaseUtils->rawQuery($query));
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
                "data" => array((int)$gradeCount));
            array_push($labGrades, $labGrade);
        }
        $labGradeResults = array("category" => $titles, "data" => $labGrades);
        echo json_encode($labGradeResults);
        exit();
    }


    public function labagainstresultsAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select LabID as title,Grade as name, count(Grade) as data "
            . "from rep_repository ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramID']) && !empty($whereArray['ProgramID'])) {
            $query .= "and ProgramID ='" . $whereArray['ProgramID'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= "and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }

        $query .= " GROUP BY LabID,Grade ORDER BY title";
        $query = ($databaseUtils->rawQuery($query));
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
                "data" => array((int)$gradeCount));
            array_push($labGrades, $labGrade);
        }
        $labGradeResults = array("category" => $titles, "data" => $labGrades);
        echo json_encode($labGradeResults);
        exit();
    }

    public function dumpAction()
    {

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $repRepository = new database\crud\RepRepository($databaseUtils);
        $tests = array('Malaria', 'HIV', 'Bacteriology', 'Bio-Chemisty');
        $providers = array('HuQas Provider', 'Hiv PT', 'Amref Provider');
        $labs = array('Lab-001', 'Lab-002', 'Lab-003', 'Lab-004', 'Lab-005',);
        $testEvents = array('1st Test Event 2016', '2nd Test Event 2016', '3rd Test Event 2016', '4th Test Event 2016',);
        $grades = array('A', 'B', 'C', 'D', 'E');
        $results = array('NOT ACCEPTABLE', 'ACCEPTABLE', 'NOT VALID', 'VALID', 'TAMPERED');
        for ($i = 1684; $i < 4001; $i++) {
            $test = $tests[rand(0, count($tests) - 1)];
            $provider = $providers[rand(0, count($providers) - 1)];
            $lab = $labs[rand(0, count($labs) - 1)];
            $testEvent = $testEvents[rand(0, count($testEvents) - 1)];
            $grade = $grades[rand(0, count($grades) - 1)];
            $result = $results[rand(0, count($results) - 1)];
            echo $query = "INSERT INTO `rep_repository` (`ImpID`, `ProviderID`, `LabID`, `RoundID`, `ProgramID`, `ReleaseDate`, `SampleCode`, `AnalyteID`, `SampleCondition`, `DateSampleReceived`, `Result`, `ResultCode`, `Grade`, `TestKitID`, `DateSampleShipped`, `FailReasonCode`, `Frequency`, `StCount`, `TragetValue`, `UpperLimit`, `LowerLimit`, `OverallScore`) VALUES (NULL, '$provider', '$lab', '$testEvent', '$test', '0000-00-00 00:00:00', '$grade', 'Malaria Parasite Detection and Identification ', NULL, NULL, 'No Parasite Seen', 'OK', '$result', NULL, NULL, NULL, 'A', '', '', '', '', NULL);";
            echo "<br /><br />";
        }
        echo "Done dumping";
        exit();
    }

    public function progranvsresultsAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select ProgramID as title,Grade as name, count(Grade) as data "
            . "from rep_repository ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= "and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= "and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }
        $query .= " GROUP BY ProgramID,Grade ";
        $query = ($databaseUtils->rawQuery($query));
        if (count($query) > 0) {
            for ($i = 0; $i < sizeof($query); $i++) {
                $tempData = array();
                array_push($tempData, (int)$query[$i]['data']);
                $query[$i]['data'] = $tempData;
                $tempData = array();
            }
        }
        echo json_encode($query);
        exit();
    }

    public function resultsAction()
    {
        $whereArray = file_get_contents("php://input");
        $whereArray = (array)json_decode($whereArray);
        if (isset($whereArray['dateRange'])) {
            $whereArray['dateFrom'] = $this->convertdate(substr($whereArray['dateRange'], 0, 11));
            $whereArray['dateTo'] = $this->convertdate(substr($whereArray['dateRange'], 13));
        }

        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $query = "select * "
            . "from rep_repository ";
        if (isset($whereArray['dateFrom'])) {
            $query .= "where ReleaseDate  between '" . $whereArray['dateFrom'] . "' and '" . $whereArray['dateTo'] . "'";
        }
        if (isset($whereArray['ProgramId']) && !empty($whereArray['ProgramId'])) {
            $query .= "and ProgramID ='" . $whereArray['ProgramId'] . "'";
        }
        if (isset($whereArray['ProviderId']) && !empty($whereArray['ProviderId'])) {
            $query .= "and ProviderId ='" . $whereArray['ProviderId'] . "'";
        }
        if (isset($whereArray['county']) && !empty($whereArray['county'])) {
            $query .= "and labID in (select labName from rep_labs where  County ='" . $whereArray['county'] . "')";
        }
        $sytemAdmin = new \database\crud\SystemAdmin($databaseUtils);

        $jsonData = json_encode(($sytemAdmin->query_from_system_admin(array(), array())));

        $jsonData = ($databaseUtils->rawQuery($query));
        $_SESSION['currentRepoData'] = $jsonData;
        $_SESSION['filterData'] = $whereArray;
        echo json_encode($jsonData);

        exit;
    }

    public function generatecsvAction()
    {
        $data = $_SESSION['currentRepoData'];

        $name = 'EPT Repository Data' . date("d-m-Y H:j", time());
        header("Content-Type: text/csv");

        header("Content-Disposition: attachment; filename=" . $name . ".csv");

        $headers = array('ImpID',
            'ProviderID', 'LabID',
            'RoundID', 'ProgramID',
            'ReleaseDate', 'SampleCode',
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


    public function convertdate($dateString)
    {

        $dateString = date_format(date_create($dateString), "Y-m-d");

        return $dateString;

    }


}

?>