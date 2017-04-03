<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_TestkitsController extends Zend_Controller_Action
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
            $clientsServices = new Application_Service_Testkits();
            $clientsServices->getAllTestkits($params);
        }
    }
    public function addAction()
    {
        $adminService = new Application_Service_Testkits();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addTestkits($params);
            $this->_redirect("/admin/testkits");
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
    }
    public function editAction()
    {
        $adminService = new Application_Service_Testkits();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->updateTestkits($params);
            $this->_redirect("/admin/testkits");
        }else{
            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->getTestkitDetails($adminId);
            }
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
    }
}
