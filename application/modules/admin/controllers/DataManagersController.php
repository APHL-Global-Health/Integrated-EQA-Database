<?php

class Admin_DataManagersController extends Zend_Controller_Action {

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'configMenu';
    }

    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $clientsServices = new Application_Service_DataManagers();
            $clientsServices->getAllUsers($params);
        }
    }

    public function testAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $clientsServices = new Application_Service_DataManagers();
            $clientsServices->getAllUsers($params);
        }
        exit;
    }

    public function addAction() {
        $userService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->_request->getPost();
            $userService->addUser($params);
            $this->_redirect("/admin/data-managers");
        }


        if ($this->_hasParam('contact')) {
            $contact = new Application_Model_DbTable_ContactUs();
            $this->view->contact = $contact->getContact($this->_getParam('contact'));
        }
    }
public function testEmailAction(){
    $common = new Application_Service_Common();
    echo $common->sendPasswordEmailToUser("osoromichael@gmail.com",'1232456','test');
        exit;
}
    public function addmicrouserAction() {
        $userService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->_request->getPost();
            $userService->addUser($params);
            $this->_redirect("/admin/data-managers");
        }


        if ($this->_hasParam('contact')) {
            $contact = new Application_Model_DbTable_ContactUs();
            $this->view->contact = $contact->getContact($this->_getParam('contact'));
        }
    }

    public function editAction() {
        $userService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->_request->getPost();
            $userService->updateUser($params);
            $this->_redirect("/admin/data-managers");
        } else {
            if ($this->_hasParam('id')) {
                $userId = (int) $this->_getParam('id');
                $this->view->rsUser = $userService->getUserInfoBySystemId($userId);
            }
        }
    }

    public function changelaboratoryAction() {
        $userService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->_request->getPost();
            $userService->updateUserLaboratory($params);
            $this->_redirect("/admin/data-managers");
        } else {
            if ($this->_hasParam('id')) {
                $userId = (int) $this->_getParam('id');
                $participant = new Application_Model_DbTable_Participants();

                $this->view->rsUser = $userService->getUserInfoBySystemId($userId);
                $this->view->participants = $participant->getAllModuleParticipants();
            }
        }
    }

    public function editmicrouserAction() {
        $userService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->_request->getPost();
            $userService->updateUser($params);
            $this->_redirect("/admin/data-managers");
        } else {
            if ($this->_hasParam('id')) {
                $userId = (int) $this->_getParam('id');
                $this->view->rsUser = $userService->getUserInfoBySystemId($userId);
            }
        }
    }

}
