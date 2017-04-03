<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_SamplesController extends Zend_Controller_Action
{
    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'repository';
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();            
            $clientsServices = new Application_Service_Samples();
            $clientsServices->getAllSamples($params);
        }
    }
    public function addAction()
    {
        $adminService = new Application_Service_Samples();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addSamples($params);
            $this->_redirect("/admin/samples");
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
        $this->view->periodList = $commonService->getperiodList();
        $this->view->labList = $commonService->getlabList();
    }
    public function editAction()
    {
        $adminService = new Application_Service_Samples();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->updateSamples($params);
            $this->_redirect("/admin/samples");
        }else{
            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->getSampleDetails($adminId);
            }
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
        $this->view->periodList = $commonService->getperiodList();
        $this->view->labList = $commonService->getlabList();
    }
}
