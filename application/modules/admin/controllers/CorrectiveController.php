<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_CorrectiveController extends Zend_Controller_Action
{
protected $_corrective;
    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
            ->initContext();
        $this->_helper->layout()->pageName = 'repository';
        $this->_corrective = new Application_Model_DbTable_Corrective();
    }

    public function indexAction()
    {

        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();


            $this->_corrective->getCorrective($params);
        }


    }
    public function deleteAction(){
        $correctiveId = (int)$this->_getParam('id');
        if(is_numeric($correctiveId)){
            $this->_corrective->deleteCorrectiveAction($correctiveId);
        }
        $this->_redirect("admin/corrective/");
    }

    public function addAction()
    {
        $commonService = new Application_Service_Common();
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
        $this->view->periodList = $commonService->getperiodList();


    }

    public function savecorrectionAction()
    {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $correctiveAction = new Application_Model_DbTable_Corrective();

            echo json_encode($correctiveAction->addCorrectiveAction($params));
        }

        exit;
    }


}

