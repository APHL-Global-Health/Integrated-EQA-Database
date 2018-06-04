<?php

class Admin_PlatformsController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                    ->initContext();
        $this->_helper->layout()->pageName = 'configMenu';
    }

    public function indexAction(){
        if ($this->getRequest()->isPost()) {
            $parameters = $this->_getAllParams();
            $partnerService = new Application_Service_Platform();
            $partnerService->getAllPlatform($parameters);
        }
    }
    
    public function addAction(){
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $partnerService = new Application_Service_Platform();
            $partnerService->addPlatform($params);
            $this->_redirect("/admin/platforms");
        }
    }
    
    public function editAction(){
        $partnerService = new Application_Service_Platform();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $partnerService->updatePlatform($params);
            $this->_redirect("/admin/platforms");
        }
        if($this->_hasParam('id')){
            $partnerId = (int)$this->_getParam('id');
            $this->view->partner = $partnerService->getPlatform($partnerId);
        }else{
            $this->_redirect("/admin/platforms");
        }
    }

    public function deleteAction(){
        $partnerService = new Application_Service_Platform();

        if($this->_hasParam('id')){
            $partnerId = (int)$this->_getParam('id');
            $partnerService->deletePlatform($partnerId);
        }else{
            $this->_redirect("/admin/platforms");
        }
    }
}