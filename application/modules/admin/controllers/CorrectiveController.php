<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_CorrectiveController extends Zend_Controller_Action
{
    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
            ->initContext();
        $this->_helper->layout()->pageName = 'repository';
    }

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $clientsServices = new Application_Service_Labs();
            $clientsServices->getAllLabs($params);
        }


    }

    public function addAction()
    {
        $commonService = new Application_Service_Common();
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
        $this->view->periodList = $commonService->getperiodList();
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $partnerService = new Application_Model_DbTable_Readiness();
            $ca = $partnerService->addReadiness($params);

            if ($ca) {
                $this->_helper->flashMessenger("Your readiness checklist has been submitted successfully.");
                $this->_redirect("/corrective/index");
            } else {
                $this->_helper->flashMessenger("Sorry, you have already submitted the readiness checklist for the selected test event.");
                $this->_redirect("/readiness/index");
            }
        }
    }
}

