<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_ProgramsController extends Zend_Controller_Action
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
            $clientsServices = new Application_Service_Programs();
            $clientsServices->getAllPrograms($params);
        }
    }
    public function addAction()
    {
        $adminService = new Application_Service_Programs();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addPrograms($params);
            $this->_redirect("/admin/programs");
        }
    }
    public function editAction()
    {
        $adminService = new Application_Service_Programs();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->updatePrograms($params);
            $this->_redirect("/admin/programs");
        }else{
            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->getProgramDetails($adminId);
            }
        }
    }

    public function deleteAction()
    {
        $adminService = new Application_Service_Programs();

            if($this->_hasParam('id')){
                $adminId = (int)$this->_getParam('id');
                $this->view->admin = $adminService->deleteProgramDetails($adminId);
                $this->_redirect("/admin/programs");
            }

    }
}

