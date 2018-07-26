<?php

class Admin_ReadinessChecklistQuestionController extends Zend_Controller_Action
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
            $checklistQuestionService = new Application_Service_ReadinessChecklistQuestion();
            $checklistQuestionService->getAllReadinessChecklistQuestions($parameters);
        }
    }
    
    public function viewAction(){
        $checklistQuestionService = new Application_Service_ReadinessChecklistQuestion();
        if($this->_hasParam('id')){
            $questionID = (int)$this->_getParam('id');
            $this->view->readinessChecklist = $checklistQuestionService->getReadinessChecklistQuestionDetails($questionID);
        }else{
            $this->_redirect("/admin/readiness-checklist");
        }
    }

    public function addAction(){
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $checklistQuestionService = new Application_Service_ReadinessChecklistQuestion();
            $checklistQuestionService->addReadinessChecklistQuestion($params);
            $this->_redirect("/admin/readiness-checklist/view/id/".$params['readiness_checklist_id']);
        }
        if($this->_hasParam('id')){
            error_log((int)$this->_getParam('id'));
            $this->view->readinessChecklistQuestionID = (int)$this->_getParam('id');
        }
    }
    
    public function editAction(){
        $checklistQuestionService = new Application_Service_ReadinessChecklistQuestion();
        if($this->_hasParam('id')){
            $questionID = (int)$this->_getParam('id');
            $this->view->readinessChecklistQuestion = $checklistQuestionService->getReadinessChecklistQuestionDetails($questionID);
        }else{
            $this->_redirect("/admin/readiness-checklist");
        }
    }

    public function updateAction(){
        $checklistQuestionService = new Application_Service_ReadinessChecklistQuestion();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $checklistQuestionService->updateReadinessChecklistQuestion($params);
            $this->_redirect("/admin/readiness-checklist");
        }
    }

    public function deleteAction(){

    }

}