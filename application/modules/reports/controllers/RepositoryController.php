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

    public function testAction() {

        $where['dateRange'] = $_POST['dateRange'];


        $dates = explode(" - ", $_POST['dateRange']);
        $columns = array();
        $records = array();
        if (!empty($_POST)) {

            foreach ($_POST as $key => $value) {
                if ($key == 'ProviderID') {
                    array_push($columns, $key);
                    array_push($records, $value);
                }
            }
        }


        if (!class_exists('database\core\mysql\DatabaseUtils')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\core-apis\DatabaseUtils.php';
        } if (!class_exists('database\crud\SystemAdmin')) {
            require_once 'C:\xampp\htdocs\ePT-Repository\database\crud\SystemAdmin.php';
        }
        $table = 'rep_repository';
        $databaseUtils = new \database\core\mysql\DatabaseUtils();
        $jsonData = json_encode($databaseUtils->query($table, array(), array()));

//        $sytemAdmin = new \database\crud\SystemAdmin($databaseUtils);
//
//         $jsonData = json_encode(($sytemAdmin->query_from_system_admin(array(),array())));
//
        echo $jsonData;
        exit;
    }

}
