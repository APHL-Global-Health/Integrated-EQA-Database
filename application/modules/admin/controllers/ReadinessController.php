<?php

class Admin_ReadinessController extends Zend_Controller_Action {

    private $noOfItems = 10;

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->addActionContext('defaulted-schemes', 'html')
                ->addActionContext('current-schemes', 'html')
                ->addActionContext('all-schemes', 'html')
                ->addActionContext('report', 'html')
                ->addActionContext('summary-report', 'html')
                ->addActionContext('shipment-report', 'html')
                ->addActionContext('add-qc', 'html')
                ->addActionContext('scheme', 'html')
                ->initContext();
    }

    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $shipmentService = new Application_Model_DbTable_Readiness();
            $shipmentService->getReadiness($params);
        }
        
    }

    public function addAction(){
        
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $partnerService = new Application_Model_DbTable_Readiness();
            $partnerService->addReadiness($params);
            $this->_redirect("/participant/readiness");
        }
    }
     public function editAction()
    {
        $adminService = new Application_Service_Readiness();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            
            $adminService->updateReadiness($params);
            $this->_redirect("/admin/readiness");
        }else{
            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->getReadinessDetails($adminId);
                //$this->view->countyList = $commonService->getCountiesList();
            }
        }
    }
}
