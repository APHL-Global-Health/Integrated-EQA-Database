<?php

class Admin_ParticipantsController extends Zend_Controller_Action {

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->addActionContext('view-participants', 'html')
                ->addActionContext('get-datamanager', 'html')
                ->addActionContext('get-participant', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'configMenu';
    }

    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $clientsServices = new Application_Service_Participants();
            $clientsServices->getAllParticipants($params);
        }
    }

    public function addAction() {
        $participantService = new Application_Model_DbTable_Participants();
        $commonService = new Application_Service_Common();
        $dataManagerService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $participantService->addParticipants($params);
            $this->_redirect("/admin/participants");
        }

        $this->view->affiliates = $participantService->getAffiliateList();
        $this->view->networks = $participantService->getNetworkTierList();
        $this->view->dataManagers = $dataManagerService->getDataManagerList();
        $this->view->countriesList = $commonService->getcountriesList();
        $this->view->siteType = $participantService->getSiteTypeList();
        $this->view->counties = $participantService->getCounties();
    }

    public function editAction() {
        $participantService = new Application_Service_Participants();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $participantService->updateParticipant($params);
            $this->_redirect("/admin/participants");
        } else {
            if ($this->_hasParam('id')) {
                $userId = (int) $this->_getParam('id');
                $this->view->participant = $participantService->getParticipantDetails($userId);
            }
            $this->view->affiliates = $participantService->getAffiliateList();
            $dataManagerService = new Application_Service_DataManagers();
            $this->view->networks = $participantService->getNetworkTierList();
            $this->view->siteType = $participantService->getSiteTypeList();
            $this->view->dataManagers = $dataManagerService->getDataManagerList();
            $this->view->countriesList = $commonService->getcountriesList();
            $this->view->counties = $participantService->getCounties();
        }
        $scheme = new Application_Service_Schemes();
        $this->view->schemes = $scheme->getAllSchemes();
        $this->view->participantSchemes = []; //$participantService->getSchemesByParticipantId($userId);
    }

    public function pendingAction() {
        // action body
    }

    public function viewAction() {
        $participantService = new Application_Service_Participants();
        $commonService = new Application_Service_Common();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $participantService->updateParticipant($params);
            $this->_redirect("/admin/participants");
        } else {
            if ($this->_hasParam('id')) {
                $userId = (int) $this->_getParam('id');
                $this->view->participant = $participantService->getParticipantDetails($userId);
            }
            $this->view->affiliates = $participantService->getAffiliateList();
            $dataManagerService = new Application_Service_DataManagers();
            $this->view->networks = $participantService->getNetworkTierList();
            $this->view->siteType = $participantService->getSiteTypeList();
            $this->view->dataManagers = $dataManagerService->getDataManagerList();
            $this->view->countriesList = $commonService->getcountriesList();
            $this->view->counties = $participantService->getCounties();
        }
        $scheme = new Application_Service_Schemes();
        $this->view->schemes = $scheme->getAllSchemes();
        $this->view->participantSchemes = []; //$participantService->getSchemesByParticipantId($userId);
    }

    public function viewParticipantsAction() {
        $this->_helper->layout()->setLayout('modal');
        $participantService = new Application_Service_Participants();
        if ($this->_hasParam('id')) {
            $dmId = (int) $this->_getParam('id');
            $this->view->participant = $participantService->getAllParticipantDetails($dmId);
        }
    }

    public function labmappingAction() {
        $participantService = new Application_Service_Participants();
        $dataManagerService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $participantService->addParticipantManagerMap($params);
            $this->_redirect("/admin/participants/participant-manager-map");
        }
        $this->view->participants = $participantService->getAllActiveParticipants();
        $this->view->dataManagers = $dataManagerService->getDataManagerList();
    }

    public function participantManagerMapAction() {
        $participantService = new Application_Service_Participants();
        $dataManagerService = new Application_Service_DataManagers();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $participantService->addParticipantManagerMap($params);
            $this->_redirect("/admin/participants/participant-manager-map");
        }
        $this->view->participants = $participantService->getAllActiveParticipants();
        $this->view->dataManagers = $dataManagerService->getDataManagerList();
    }

    public function getDatamanagerAction() {
        $dataManagerService = new Application_Service_DataManagers();
        if ($this->_hasParam('participantId')) {
            $participantId = $this->_getParam('participantId');
            $this->view->paticipantManagers = $dataManagerService->getParticipantDatamanagerList($participantId);
        }
        $this->view->dataManagers = $dataManagerService->getDataManagerList();
    }

    public function getParticipantAction() {
        $participantService = new Application_Service_Participants();
        $dataManagerService = new Application_Service_DataManagers();
        if ($this->_hasParam('datamanagerId')) {
            $datamanagerId = $this->_getParam('datamanagerId');
            $this->view->mappedParticipant = $dataManagerService->getDatamanagerParticipantList($datamanagerId);
        }
        $this->view->participants = $participantService->getAllActiveParticipants();
    }

    public function cycleResponsesAction(){

        $this->_helper->layout()->pageName = 'report';

        $parameters = $this->_getAllParams();
        $participantService = new Application_Service_Participants();
        
        $this->view->responses = $participantService->getParticipantCycleResponses($parameters);

        $platformService = new Application_Service_Platform();
        $this->view->platforms = $platformService->getPlatforms();

        $surveyService = new Application_Service_Distribution();
        $this->view->surveys = $surveyService->getDistributions();

        $this->view->participants = $participantService->getAllActiveParticipants();

        if ($this->_hasParam('d'))$this->view->chosenSurvey = $this->_getParam('d');
        if ($this->_hasParam('pf'))$this->view->chosenPlatform = $this->_getParam('pf');
        if ($this->_hasParam('pt'))$this->view->chosenParticipant = $this->_getParam('pt');
    }

    public function cycleSummaryAction(){

        $this->_helper->layout()->pageName = 'report';

        $parameters = $this->_getAllParams();

        $distributionService = new Application_Service_Distribution();

        if (isset($parameters['pt_evaluate'])) {
            $distributionService->evaluate($parameters);
        }

        $assayService = new Application_Service_VlAssay();
        
        $platformService = new Application_Service_Platform();
        $this->view->platforms = $platformService->getPlatforms();

        $this->view->surveys = $distributionService->getDistributions();

        $this->view->responses = $distributionService->getDistributionSummary($parameters);

        $this->view->assays = $assayService->getAllVlAssays();

        if ($this->_hasParam('pt_survey'))$this->view->chosenSurvey = $this->_getParam('pt_survey');
        if ($this->_hasParam('pt_platform'))$this->view->chosenPlatform = $this->_getParam('pt_platform');
        if ($this->_hasParam('pt_assay'))$this->view->chosenAssay = $this->_getParam('pt_assay');
    }

    public function editEvaluationAction(){

        $this->_helper->layout()->pageName = 'report';

        $mapID = $this->getRequest()->getParam('mid');

        $spmDb = new Application_Model_DbTable_ShipmentParticipantMap();
        $spm = $spmDb->fetchRow($spmDb->select()->from('shipment_participant_map')->where("map_id=$mapID"));

        $participantID = $spm['participant_id'];
        $shipmentID = $spm['shipment_id'];
        $platformID = $spm['platform_id'];
        $assayID = $spm['assay_id'];

        $shipmentService = new Application_Service_Shipments();
        $this->view->shipment = $shipmentService->getShipment($shipmentID);

        $surveyID = $this->view->shipment['distribution_id'];

        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->getPost();

            $vlResponse = new Application_Model_DbTable_ResponseVl();
            $vlResponse->updateEvaluation($data);
            
            $this->_redirect("/admin/participants/cycle-summary/pt_survey/$surveyID/pt_platform/$platformID/pt_assay/$assayID");
        }else{

            $participantService = new Application_Service_Participants();
            $this->view->participant = $participantService->getParticipantDetails($participantID);

            $distributionService = new Application_Service_Distribution();
            $this->view->distribution = $distributionService->getDistribution($this->view->shipment['distribution_id']);

            $platformService = new Application_Service_Platform();
            $this->view->platform = $platformService->getPlatform($platformID);

            $schemeService = new Application_Service_Schemes();
            $this->view->samples = $schemeService->getSamples($mapID);
            $this->view->mapID = $mapID;
        }
    }

    public function individualResponseAction(){

        $this->_helper->layout()->pageName = 'report';
  
        $parameters = $this->_getAllParams();
        $sID= $this->getRequest()->getParam('sid');
        $pID= $this->getRequest()->getParam('pid');
        $eID =$this->getRequest()->getParam('eid');
        $platformID =$this->getRequest()->getParam('pfid');
        $assayID =$this->getRequest()->getParam('aid');

        $participantService = new Application_Service_Participants();
        $this->view->participant = $participantService->getParticipantDetails($pID);

        $schemeService = new Application_Service_Schemes();
        $this->view->allSamples = $schemeService->getVlSamples($sID,$pID, $platformID, $assayID);
        $this->view->allNotTestedReason =$schemeService->getVlNotTestedReasons();

        $shipment = $schemeService->getShipmentData($sID, $pID, $platformID, $assayID);
        $shipment['attributes'] = json_decode($shipment['attributes'],true);
        $this->view->shipment = $shipment;

        $platformService = new Application_Service_Platform();
        $this->view->platform = $platformService->getPlatform($platformID);

        $this->view->shipId = $sID;
        $this->view->participantId = $pID;
        $this->view->eID = $eID;
        $this->view->platformID = $platformID;
    }

    public function enterResponseAction(){

        $this->_helper->layout()->pageName = 'report';
  
        $shipmentService = new Application_Service_Shipments();
        
        if($this->getRequest()->isPost())
        {

            $data = $this->getRequest()->getPost();
            $data['uploadedFilePath'] = "";
            if((!empty($_FILES["uploadedFile"])) && ($_FILES['uploadedFile']['error'] == 0)) {
                
                $filename = basename($_FILES['uploadedFile']['name']);
                $ext = substr($filename, strrpos($filename, '.') + 1);
                if (($_FILES["uploadedFile"]["size"] < 5000000)) {
                    $dirpath = "vl-eid".DIRECTORY_SEPARATOR.$data['schemeCode'].DIRECTORY_SEPARATOR.$data['participantId'];
                    $uploadDir = UPLOAD_PATH.DIRECTORY_SEPARATOR.$dirpath;
                    if(!is_dir($uploadDir)){
                        mkdir($uploadDir,0777,true);
                    }
                    
                    // Let us clear the folder before uploading the file
                    $files = glob($uploadDir.'/*{,.}*', GLOB_BRACE); // get all file names
                    foreach($files as $file){ // iterate files
                      if(is_file($file))
                        unlink($file); // delete file
                    }
                    
                    //Determine the path to which we want to save this file
                    $data['uploadedFilePath'] = $dirpath.DIRECTORY_SEPARATOR.$filename;
                    $newname = $uploadDir.DIRECTORY_SEPARATOR.$filename;
                    
                    move_uploaded_file($_FILES['uploadedFile']['tmp_name'],$newname);
                }
            }
            
            $shipmentService->updateVlResults($data);
            
            $this->_redirect("/admin/participants/cycle-responses");
            
        }else{
            $parameters = $this->_getAllParams();
            $sID= $this->getRequest()->getParam('sid');
            $pID= $this->getRequest()->getParam('pid');
            $eID =$this->getRequest()->getParam('eid');
            $platformID =$this->getRequest()->getParam('pfid');
            $assayID =$this->getRequest()->getParam('aid');

            $participantService = new Application_Service_Participants();
            $this->view->participant = $participantService->getParticipantDetails($pID);

            $schemeService = new Application_Service_Schemes();
            $this->view->allSamples = $schemeService->getVlSamples($sID, $pID, $platformID, $assayID);
            $this->view->allNotTestedReason =$schemeService->getVlNotTestedReasons();

            $shipment = $schemeService->getShipmentData($sID, $pID, $platformID, $assayID);
            $shipment['attributes'] = json_decode($shipment['attributes'],true);
            $this->view->shipment = $shipment;

            $platformService = new Application_Service_Platform();
            $this->view->platform = $platformService->getPlatform($platformID);

            $this->view->shipmentId = $sID;
            $this->view->participantId = $pID;
            $this->view->eID = $eID;
            $this->view->platformID = $platformID;
        
            $this->view->isEditable = true;
        }
    }

    public function individualPerformanceAction(){

        $this->_helper->layout()->pageName = 'report';
  
        $parameters = $this->_getAllParams();
        $mapID= $this->getRequest()->getParam('mid');

        $shipmentParticipantMapDb = new Application_Model_DbTable_ShipmentParticipantMap();
        $spm = $shipmentParticipantMapDb->fetchRow($shipmentParticipantMapDb->select()->from('shipment_participant_map')->where("map_id=$mapID"));

        $participantID = $spm['participant_id'];
        $shipmentID = $spm['shipment_id'];
        $assayID = $spm['assay_id'];
        $platformID = $spm['platform_id'];

        $participantService = new Application_Service_Participants();
        $this->view->participant = $participantService->getParticipantDetails($participantID);

        $schemeService = new Application_Service_Schemes();
        $this->view->allSamples = $schemeService->getSamples($mapID);
        
        $this->view->allNotTestedReason =$schemeService->getVlNotTestedReasons();

        $shipment = $schemeService->getShipmentData($shipmentID, $participantID, $platformID, $assayID);
        $shipment['attributes'] = json_decode($shipment['attributes'],true);
        $this->view->shipment = $shipment;

        $platformService = new Application_Service_Platform();
        $this->view->platform = $platformService->getPlatform($platformID);

        $this->view->shipmentID = $shipmentID;
        $this->view->participantId = $participantID;
        $this->view->platformID = $platformID;
    
    }

}
