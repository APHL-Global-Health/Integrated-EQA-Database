<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_RepcustomfieldsController extends Zend_Controller_Action
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
            $clientsServices = new Application_Service_Repcustomfields();
            $clientsServices->getAllFields($params);
        }
    }
    public function addAction()
    {
        $adminService = new Application_Service_Repcustomfields();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            
            $adminService->addFields($params);
            $this->_redirect("/admin/repcustomfields");
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
    }

    public function editAction()
    {
        $adminService = new Application_Service_Repcustomfields();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();

            $adminService->addFields($params);
            $this->_redirect("/admin/repcustomfields");
        }else{

            if ($this->_hasParam('id')) {
                $id = (int)$this->_getParam('id');

                $this->view->customDetails =$adminService->getCustomFieldDetails($id);
            }
            $this->view->providerList = $commonService->getproviderList();
            $this->view->programList = $commonService->getprogramList();
        }



    }

    public function deleteAction()
    {
        $adminService = new Application_Service_Repcustomfields();
        $commonService = new Application_Service_Common();
        if ($this->_hasParam('id')) {
            $id = (int)$this->_getParam('id');

            $adminService->deleteCustomField($id);
            $this->_redirect("/admin/repcustomfields");
        }

    }



}

