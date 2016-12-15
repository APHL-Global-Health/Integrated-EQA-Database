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
            $reportService = new Application_Service_Repository();
            $response=$reportService->getAllProviderDetailedReport($params);
            $this->view->response = $response;
            $this->view->type= $params['reportType'];
        }
        $provider = new Application_Service_Providers();
        $this->view->providers = $provider->getProviders();
    }

    public function reportAction()
    {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            print_r($params);
            exit;
            $reportService = new Application_Service_Repository();
            $reportService->getAllProviderDetailedReport($params);
        }
        
    }


}



