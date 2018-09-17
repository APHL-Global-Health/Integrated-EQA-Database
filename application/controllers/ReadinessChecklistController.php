<?php

class ReadinessChecklistController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
            ->addActionContext('defaulted-schemes', 'html')
            ->addActionContext('current-schemes', 'html')
            ->addActionContext('all-schemes', 'html')
            ->addActionContext('report', 'html')
            ->addActionContext('summary-report', 'html')
            ->addActionContext('shipment-report', 'html')
            ->addActionContext('add-qc', 'html')
            ->addActionContext('scheme', 'html')
            ->initContext();
        $messages = $this->_helper->flashMessenger->getMessages();
        if (!empty($messages))
            $this->_helper->layout->getView()->message = $messages[0];
    }

    public function indexAction()
    {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $email = $authNameSpace->UserID;

        $participantService = new Application_Service_Participants();
        $t = $participantService->getParticipantDetailByUserEmail($email);
        foreach ($t as $k) {
            $id = $k["participant_id"];
        }

        $params = $this->_getAllParams();
        $rService = new Application_Service_ReadinessChecklist();
        $this->view->surveys = $rService->listReadinessChecklistSurveys($id);

    }

    public function getreadinessAction()
    {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $rService = new Application_Model_DbTable_ReadinessChecklists();
            $rService->getAllReadinessChecklists($params);
        }
    }

    public function addAction()
    {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $pID = $authNameSpace->UserID;
        $participantService = new Application_Service_Participants();
        $t = $participantService->getParticipantDetailByUserEmail($pID);

        foreach ($t as $k) {
            $id = $k["participant_id"];
        }

        $this->view->participantId = $id;

        $surveyID = $this->getRequest()->getParam('id');

        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        $this->view->survey = $readinessChecklistService->getReadinessChecklistSurveyResponses($surveyID, $id);
        $this->view->platforms = (new Application_Service_Platform())->getPlatforms();
    }

    public function replyAction(){

        $params = $this->getRequest()->getPost();
        $surveyResponseModel = new Application_Model_DbTable_ReadinessChecklistResponse();
        $response = $surveyResponseModel->addReadinessChecklistResponse($params);
        if ($response) {
            $this->_helper->flashMessenger("Your readiness checklist has been submitted successfully.");
        } else {
            $this->_helper->flashMessenger("Sorry, you have already submitted the readiness checklist for the selected test event.");
        }
        $this->_redirect("/readiness-checklist/");
    }

    public function correctiveAction()
    {
        if ($this->getRequest()->isPost()) {


        }
        $rService = new Application_Model_DbTable_Distribution();

        $this->view->surveys = $rService->getFinalizedDistributions();
    }

    public function savecorrectiveAction()
    {

        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $params = $params['data'];

            $authNameSpace = new Zend_Session_Namespace('datamanagers');

            $rService = new Application_Model_DbTable_Capa();
            $params['dmId'] = $authNameSpace->dm_id;
            $params['participantId'] = $rService->getParticipantId($authNameSpace->dm_id);

            echo $rService->saveCorrectiveAction($params);

        }
        exit;
    }
}
