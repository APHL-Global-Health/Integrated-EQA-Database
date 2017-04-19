<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_ProvidersController extends Zend_Controller_Action {

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'repository';
    }

    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $clientsServices = new Application_Service_Providers();
            $clientsServices->getAllProviders($params);
        }
    }

    public function listcontactsAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $clientsServices = new Application_Service_Providers();
            $clientsServices->getAllProviderscontacts($params);
        }
    }

    public function addAction() {
        $adminService = new Application_Service_Providers();
        $programService = new Application_Service_Programs();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addProviders($params);
            $this->_redirect("/admin/providers");
        }
        $this->view->enrolledPrograms = $programService->getEnrolledProgramsList();
    }

    public function editAction() {
        $adminService = new Application_Service_Providers();
        $programService = new Application_Service_Programs();
        $whereID = (int) $this->_getParam('id');
        if ($this->getRequest()->isPost()) {

            $params = $this->getRequest()->getPost();
            $adminService->updateProviders($params, $whereID);
            $this->_redirect("/admin/providers");
        } else {
            if ($this->_hasParam('id')) {
                $adminId = (int) $this->_getParam('id');
                $this->view->admin = $adminService->getProviderDetails($adminId);
                $this->view->editId = $adminId;
                $this->view->enrolledPrograms = $programService->getEnrolledProgramsList();
            }
        }
    }

}
