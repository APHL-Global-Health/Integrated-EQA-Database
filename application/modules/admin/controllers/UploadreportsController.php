<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_UploadreportsController extends Zend_Controller_Action {

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'repository';
    }

    public function indexAction() {
        
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            
            $clientsServices = new Application_Service_Uploadreports();
            $clientsServices->getAllData($params);
        }
    }

    public function addAction() {
        $program = $this->getRequest()->getPost('ProgramID');
        $provider = $this->getRequest()->getPost('ProviderID');
        $period = $this->getRequest()->getPost('RoundID');
        $adminService = new Application_Service_Uploadreports();
        $commonService = new Application_Service_Common();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $adapter = new Zend_File_Transfer();
            // Returns all known internal file information
            $files = $adapter->getFileInfo();
            
            $adapter->setDestination(realpath("../public/files"));
            
            foreach ($files as $file => $info) {
                $type = $info['type'];
                $name = $info['name'];
                // file uploaded ?
                if (!$adapter->isUploaded($file)) {
                    print "Why havn't you uploaded the file ?";
                    continue;
                }
                // validators are ok ?
                if (!$adapter->isValid($file)) {
                    print "Sorry but $file is not what we wanted";
                    continue;
                }
            }
            $adapter->receive();
            
            // Returns the file names from all files
            $names = $adapter->getFileName();
            $url = $names;
            // Switches of the SI notation to return plain numbers
            $adapter->setOptions(array('useByteString' => false));
            $size = $adapter->getFileSize();

            $adminService->addData($provider, $program, $period, $name, $size, $type, $url);
            if (!$adapter->receive()) {
                $messages = $adapter->getMessages();
                echo implode("\n", $messages);
            }

            $this->_redirect("/admin/uploadreports");
        }
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
        $this->view->periodList = $commonService->getperiodList();
    }

    public function downloadAction() {
        $adminService = new Application_Service_Uploadreports();
        if($this->_hasParam('id')){
                $id = (int)$this->_getParam('id');
                
            }
        $details = $adminService->getFileDetails($id);
        $filename = $details['FileName'];
        $url = $details['Url'];
        
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        readfile("'$url'");
        
        // disable layout and view
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }

}
