<?php

class Reports_RepositoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
            ->addActionContext('report', 'html')
            ->initContext();
        $this->_helper->layout()->pageName = 'report';
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


    public function programsAction()
    {
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
        $query = "select DISTINCT ProgramID,count(DISTINCT LabID) as labcount,count(*)  from rep_repository GROUP BY ProgramID;";
        echo json_encode($databaseUtils->rawQuery($query));
        exit();
    }

    public function samplesAction()
    {
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
        $query = "select DISTINCT RoundID,count(SampleCode) as samples,count(DISTINCT SampleCode) as uniquecount  from rep_repository GROUP BY RoundID;";
        echo json_encode($databaseUtils->rawQuery($query));
        exit();
    }

    public function resultsAction()
    {
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
        $query = "select ProgramID,Grade, count(Grade) as grading from rep_repository GROUP BY ProgramID,Grade";
        echo json_encode($databaseUtils->rawQuery($query));
        exit();
    }

}
