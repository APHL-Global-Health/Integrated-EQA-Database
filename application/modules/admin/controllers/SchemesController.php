<?php

class Admin_SchemesController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')->initContext();
        $this->_helper->layout()->pageName = 'configMenu';
    }

    public function indexAction(){
        $schemesService = new Application_Service_Schemes();
        if ($this->getRequest()->isPost()) {
            $parameters = $this->_getAllParams();
            $schemesService->getAllSchemes($parameters);
        }
        $this->view->schemes = $schemesService->getAllSchemes();
    }
    
    public function addAction(){
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $schemesService = new Application_Service_Schemes();
            $schemesService->addScheme($params);
            $this->_redirect("/admin/schemes");
        }

        $assaysModel = new Application_Model_DbTable_Assay();
        $this->view->assays = $assaysModel->getAssays();
    }   
    
    public function editAction(){
        $schemesService = new Application_Service_Schemes();
        if($this->_hasParam('id')){
            $schemeID = $this->_getParam('id');
            $scheme = $schemesService->getScheme($schemeID);
            $this->view->scheme = $scheme;
            $this->view->assay = $scheme->findParentRow('Application_Model_DbTable_Assay');

            $assaysModel = new Application_Model_DbTable_Assay();
            $this->view->assays = $assaysModel->getAssays();
        }else{
            $this->_redirect("/admin/schemes");
        }
    }

    public function updateAction(){
        $schemesService = new Application_Service_Schemes();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $schemesService->updateScheme($params);
            $this->_redirect("/admin/schemes");
        }
    }

    public function deleteAction(){

    }

}