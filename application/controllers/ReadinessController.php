<?php

class ReadinessController extends Zend_Controller_Action {

    private $noOfItems = 10;

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
        if ($this->getRequest()->isPost()) {
            //SHIPMENT_OVERVIEW
            $params = $this->_getAllParams();
            $shipmentService = new Application_Service_Shipments();
            $shipmentService->getShipmentOverview($params);
        } else {
            $this->_redirect("/participant/dashboard");
        }
    }

    public function readinessAction(){
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $pID = $authNameSpace->UserID;
        $participantService = new Application_Service_Participants();
        $t = $participantService->getParticipantDetail($pID);
        foreach ($t as $k){
            $id=$k["participant_id"];
        }
        $this->view->participantId = $id;
    }
    public function addAction(){
        
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $partnerService = new Application_Model_DbTable_Readiness();
            $partnerService->addReadiness($params);
            $this->_redirect("/participant/readiness");
        }
    }
}
