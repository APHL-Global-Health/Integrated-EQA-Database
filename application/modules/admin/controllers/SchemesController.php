<?php

class Admin_SchemeController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')->initContext();
        $this->_helper->layout()->pageName = 'configMenu';
    }

    public function indexAction(){
        if ($this->getRequest()->isPost()) {
            $parameters = $this->_getAllParams();
            $schemesService = new Application_Service_Scheme();
            $schemesService->getAllSchemes($parameters);
        }
    }
    
    public function viewAction(){
        $schemesService = new Application_Service_Scheme();
        if($this->_hasParam('id')){
            $schemeID = (int)$this->_getParam('id');
            $this->view->scheme = $schemesService->getSchemeDetails($schemeID);
        }else{
            $this->_redirect("/admin/scheme");
        }
    }

    public function addAction(){
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $schemesService = new Application_Service_Scheme();
            $schemesService->addScheme($params);
            $this->_redirect("/admin/scheme/view/id/".$params['scheme_id']);
        }
        if($this->_hasParam('id')){
            error_log((int)$this->_getParam('id'));
            $this->view->schemeID = (int)$this->_getParam('id');
        }
    }
    
    public function editAction(){
        $schemesService = new Application_Service_Scheme();
        if($this->_hasParam('id')){
            $schemeID = (int)$this->_getParam('id');
            $this->view->scheme = $schemesService->getSchemeDetails($schemeID);
        }else{
            $this->_redirect("/admin/scheme");
        }
    }

    public function updateAction(){
        $schemesService = new Application_Service_Scheme();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $schemesService->updateScheme($params);
            $this->_redirect("/admin/scheme");
        }
    }

    public function deleteAction(){

    }

}