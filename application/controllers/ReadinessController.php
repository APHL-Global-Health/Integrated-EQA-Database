<?php

class ReadinessController extends Zend_Controller_Action {

    public function init() {
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

    public function indexAction() {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $pID = $authNameSpace->UserID;
        $participantService = new Application_Service_Participants();
        $t = $participantService->getParticipantDetail($pID);

        foreach ($t as $k) {
            $id = $k["participant_id"];
        }
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $rService = new Application_Model_DbTable_Readiness();
            $rService->getAllReadiness($params,$id);
        }
    }

    public function getreadinessAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $rService = new Application_Model_DbTable_Readiness();
            $rService->getAllReadiness($params);
        }
    }

    public function addAction() {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $pID = $authNameSpace->UserID;
        $participantService = new Application_Service_Participants();
        $t = $participantService->getParticipantDetail($pID);

        foreach ($t as $k) {
            $id = $k["participant_id"];
        }

        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $partnerService = new Application_Model_DbTable_Readiness();
            $v = $partnerService->addReadiness($params);
            if ($v) {
                $this->_helper->flashMessenger("Your readiness checklist has been submitted successfully.");
                $this->_redirect("/readiness/index");
            } else {
                $this->_helper->flashMessenger("Sorry, you have already submitted the readiness checklist for the selected test event.");
                $this->_redirect("/readiness/index");
            }
        }
        $this->view->participantId = $id;
        $roundInfo['distribution_Id'] = $this->getRequest()->getParam('roundId');
        $roundInfo['distribution_code'] = str_replace('*', "/", $this->getRequest()->getParam('code'));


        $commonService = new Application_Service_Common();
        $this->view->roundsList = $commonService->getUnshippedDistributions();
        $this->view->roundInfo = $roundInfo;
    }

}
