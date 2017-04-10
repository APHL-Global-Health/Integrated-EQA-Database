<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_ProviderscontactController extends Zend_Controller_Action
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
            $clientsServices = new Application_Service_Providerscontact();
            $clientsServices->getAllProviderscontact($params);
        }
    }
    
    public function addAction()
    {
        $adminService = new Application_Service_Providerscontact();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addProviderscontact($params);
            $this->_redirect("/admin/providerscontact");
        }
         $this->view->providerList = $commonService->getproviderList();
    }
    public function editAction()
    {
        $adminService = new Application_Service_Providerscontact();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->updateProviderscontact($params);
            $this->_redirect("/admin/providerscontact");
        }else{
            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->getProvidercontactDetails($adminId);
                $this->view->providerList = $commonService->getproviderList();
            }
        }
    }
    
}
