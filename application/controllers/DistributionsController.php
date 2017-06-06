<?php

class DistributionsController extends Zend_Controller_Action {

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
            $rService = new Application_Model_DbTable_Distribution();
            $rService->getDistributions($params);
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
            $partnerService->addReadiness($params);
            $this->_redirect("/readiness/index");
        }
        $this->view->participantId = $id;
        $commonService = new Application_Service_Common();
        $this->view->roundsList = $commonService->getUnshippedDistributions();
    }

}
