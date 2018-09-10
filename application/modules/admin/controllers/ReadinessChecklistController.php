<?php

class Admin_ReadinessChecklistController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')->initContext();
        $this->_helper->layout()->pageName = 'configMenu';
    }

    public function indexAction(){
        if ($this->getRequest()->isPost()) {
            $parameters = $this->_getAllParams();
            $readinessChecklistService = new Application_Service_ReadinessChecklist();
            $readinessChecklistService->getAllReadinessChecklists($parameters);
        }
    }
    
    public function viewAction(){
        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        if($this->_hasParam('id')){
            $readinessChecklistId = (int)$this->_getParam('id');
            $this->view->readinessChecklist = $readinessChecklistService->getReadinessChecklistDetails($readinessChecklistId);
        }else{
            $this->_redirect("/admin/readiness-checklist");
        }
    }

    public function sentAction(){
        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        if($this->_hasParam('id')){
            $readinessChecklistId = (int)$this->_getParam('id');
            $this->view->readinessChecklist = $readinessChecklistService->getReadinessChecklistDetails($readinessChecklistId);
        }else{
            $this->_redirect("/admin/readiness-checklist");
        }
    }

    public function sendchecklistAction(){
        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $readinessChecklistService->sendReadinessChecklist($params);
            error_log(json_encode($params));
            $this->_redirect("/admin/readiness-checklist/sent/id/".$params['readinessChecklistId']);
        }else{
            $this->view->readinessChecklist = $readinessChecklistService->getReadinessChecklistDetails((int)$this->_getParam('id'));
            $participantService = new Application_Service_Participants();
            $this->view->participants = $participantService->getAllActiveParticipants();
        }
    }
    
    public function addAction(){
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $readinessChecklistService = new Application_Service_ReadinessChecklist();
            $readinessChecklistService->addReadinessChecklist($params);
            $this->_redirect("/admin/readiness-checklist");
        }
    }
    
    public function editAction(){
        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        if($this->_hasParam('id')){
            $readinessChecklistId = (int)$this->_getParam('id');
            $this->view->readinessChecklist = $readinessChecklistService->getReadinessChecklistDetails($readinessChecklistId);
        }else{
            $this->_redirect("/admin/readiness-checklist");
        }
    }

    public function updateAction(){
        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $readinessChecklistService->updateReadinessChecklist($params);
            $this->_redirect("/admin/readiness-checklist");
        }
    }

    public function deleteAction(){
        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $rowsUpdated = $readinessChecklistService->deleteReadinessChecklist($params);
            if ($rowsUpdated == 1) {
                $reply = "The checklist was successfully deleted!";
            }else{
                $reply = "The checklist could not be deleted!";
            }
            return $reply;
        }
    }

}