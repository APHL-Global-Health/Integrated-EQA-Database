<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_FailreasonsController extends Zend_Controller_Action
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
            $clientsServices = new Application_Service_Failreasons();
            $clientsServices->getAllFailreasons($params);
        }
    }
    public function addAction()
    {
        $adminService = new Application_Service_Failreasons();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addFailreasons($params);
            $this->_redirect("/admin/failreasons");
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
    }
    public function editAction()
    {
        $adminService = new Application_Service_Failreasons();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->updateFailreasons($params);
            $this->_redirect("/admin/failreasons");
        }else{
            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->getFailreasonDetails($adminId);
            }
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
    }
}
