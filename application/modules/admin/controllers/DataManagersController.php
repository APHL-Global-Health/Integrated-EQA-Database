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
            $dmID = $userService->addUser($params);
            $userService->updateUserLaboratory(['dm_id' => $dmID, 'participant_id' => $params['participant_id']], false);
            $this->_redirect("/admin/data-managers");
        }

        $participantService = new Application_Service_Participants();
        $this->view->participants = $participantService->getAllActiveParticipants();

        if ($this->_hasParam('contact')) {
            $contact = new Application_Model_DbTable_ContactUs();
            $this->view->contact = $contact->getContact($this->_getParam('contact'));
        }
    }

    public function editAction() {
        $participantService = new Application_Service_Participants();
        $this->view->participants = $participantService->getAllActiveParticipants();
        $userService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->_request->getPost();
            $userService->updateUser($params);
            error_log("participant_id: ".$params['participant_id']." dm_id: ".$params['userSystemId']);
            $userService->updateUserLaboratory(['dm_id' => $params['userSystemId'], 'participant_id' => $params['participant_id']], false);
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
}
