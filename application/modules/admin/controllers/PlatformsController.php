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
            $platformService = new Application_Service_Platform();
            $platformService->getAllPlatform($parameters);
        }
    }
    
    public function addAction(){
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $platformService = new Application_Service_Platform();
            $platformService->addPlatform($params);
            $this->_redirect("/admin/platforms");
        }
        $assaysModel = new Application_Model_DbTable_Assay();
        $this->view->assays = $assaysModel->getAssays();
    }
    
    public function editAction(){
        $platformService = new Application_Service_Platform();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $platformService->updatePlatform($params);
            $this->_redirect("/admin/platforms");
        }
        if($this->_hasParam('id')){
            $platformId = (int)$this->_getParam('id');
            $platform = $platformService->getPlatform($platformId);
            $this->view->platform = $platform;
            $assaysModel = new Application_Model_DbTable_Assay();
            $this->view->assays = $assaysModel->getAssays();
            $this->view->myAssays = $platform->findManyToManyRowset('Application_Model_DbTable_Assay', 'Application_Model_DbTable_AssayPlatform')->toArray();
        }else{
            $this->_redirect("/admin/platforms");
        }
    }

    public function deleteAction(){
        $platformService = new Application_Service_Platform();

        if($this->_hasParam('id')){
            $platformId = (int)$this->_getParam('id');
            $platformService->deletePlatform($platformId);
            $this->_redirect("/admin/platforms");
        }else{
            $this->_redirect("/admin/platforms");
        }
        exit;
    }
}