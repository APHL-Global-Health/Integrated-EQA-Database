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
        $pID = $authNameSpace->UserID;
        $participantService = new Application_Service_Participants();
        $t = $participantService->getParticipantDetailByUserEmail($pID);

        foreach ($t as $k) {
            $id = $k["participant_id"];
        }
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $rService = new Application_Model_DbTable_ReadinessChecklists();
            $rService->getAllReadinessChecklists($params, $id);
        }
        error_log("ReadinessChecklistController");
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

error_log("ReadinessChecklistController");
        foreach ($t as $k) {
            $id = $k["participant_id"];
        }

        $this->view->participantId = $id;
        $roundID = $this->getRequest()->getParam('roundId');

        $distributionService = new Application_Service_Distribution();
        $this->view->round = $round = $distributionService->getDistribution($roundID);

        $checklistID = $round['readiness_checklist_id'];

        $readinessChecklistService = new Application_Service_ReadinessChecklist();
        $this->view->readinessChecklist = $clist = $readinessChecklistService->getReadinessChecklistDetails($checklistID);
    }

    public function replyAction(){

        $params = $this->getRequest()->getPost();
        $partnerService = new Application_Model_DbTable_ReadinessChecklists();
        $v = $partnerService->addReadinessChecklists($params);
        if ($v) {
            $this->_helper->flashMessenger("Your readiness checklist has been submitted successfully.");
            $this->_redirect("/readiness/index");
        } else {
            $this->_helper->flashMessenger("Sorry, you have already submitted the readiness checklist for the selected test event.");
            $this->_redirect("/readiness/index");
        }
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
