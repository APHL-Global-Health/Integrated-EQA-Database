<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_PeriodsController extends Zend_Controller_Action
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
            $clientsServices = new Application_Service_Periods();
            $clientsServices->getAllPeriods($params);
        }
    }
    public function addAction()
    {
        $adminService = new Application_Service_Periods();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addPeriods($params);
            $this->_redirect("/admin/periods");
        }
        $this->view->providerList = $commonService->getproviderList();
    }
    public function editAction()
    {
        $adminService = new Application_Service_Periods();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->updatePeriods($params);
            $this->_redirect("/admin/periods");
        }else{
            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->getPeriodDetails($adminId);
            }
        }
        $this->view->providerList = $commonService->getproviderList();
    }

    public function deleteAction() {
        $adminService = new Application_Service_Periods();


        if ($this->_hasParam('id')) {
            $adminId = (int) $this->_getParam('id');
            $adminService->deletePeriod($adminId);
            $this->_redirect("/admin/periods");
        }

    }


}

