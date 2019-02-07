<?php

class ContactUsController extends Zend_Controller_Action {

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->initContext();
    }

    public function indexAction() {
        $participantService = new Application_Service_Participants();
        $commonService = new Application_Service_Common();
        $dataManagerService = new Application_Service_DataManagers();
        $this->_helper->layout()->activeMenu = 'contact-us';
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $common = new Application_Service_Common();
            $this->view->message = $common->contactForm($params);
        } else {
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            $common = new Application_Service_Common();
            if (!isset($authNameSpace->dm_id)) {
                $this->_helper->layout()->setLayout('home');
            }
            $this->view->affiliates = $participantService->getAffiliateList();
            $this->view->networks = $participantService->getNetworkTierList();
            $this->view->dataManagers = $dataManagerService->getDataManagerList();
            $this->view->countriesList = $commonService->getcountriesList();
            $this->view->siteType = $participantService->getSiteTypeList();
            $this->view->countriesList = $common->getCountriesList();
            $this->view->countiesList = $common->getCountiesList();
            $this->view->mflList = $common->getFacilities();
            $this->view->deptList = $common->getDepartmentList();
            $this->view->schemeList = $common->getSchemesList();
            $this->view->platformList = $common->getPlatformList();
            $this->view->PartnersList = $common->getPartnersList();
        }
    }

    public function getallsysadmins() {
        $sysAdmin = new Application_Model_DbTable_SystemAdmin();

        $systemAdmins = $sysAdmin->getAllSystemAdmins(1);
        $emails = array();
        foreach ($systemAdmins as $key => $value) {
            array_push($emails, $value['primary_email']);
        }
        return $emails;
    }

    public function addAction() {
        $participantService = new Application_Model_DbTable_Participants();
        $commonService = new Application_Service_Common();
        $dataManagerService = new Application_Service_DataManagers();
        $this->_helper->layout()->activeMenu = 'contact-us';
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();

            $participantService->selfRegistration($params, $this->getallsysadmins());


            $status = "Account created successfully. Check your email for login credentials.";
            $this->_redirect("/auth/login?status=$status");
        }

        $this->view->affiliates = $participantService->getAffiliateList();
        $this->view->networks = $participantService->getNetworkTierList();
        $this->view->dataManagers = $dataManagerService->getDataManagerList();
        $this->view->countriesList = $commonService->getcountriesList();
        $this->view->siteType = $participantService->getSiteTypeList();
        $this->view->countriesList = $common->getCountriesList();
        $this->view->countiesList = $common->getCountiesList();
        $this->view->mflList = $common->getFacilities();
        $this->view->deptList = $common->getDepartmentList();
        $this->view->schemeList = $common->getSchemesList();
        $this->view->platformList = $common->getPlatformList();
        $this->view->PartnersList = $common->getPartnersList();
    }

    public function contactAction(){

    }

}
