<?php

class Admin_SystemAdminsController extends Zend_Controller_Action {

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'configMenu';
    }

    public function indexAction() {
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();
            $clientsServices = new Application_Service_SystemAdmin();

            $clientsServices->getAllAdmin($params);
        }
    }

    public function saAction() {
        $clientsServices = new Application_Service_SystemAdmin();
        $clientsServices->getAllAdmin($params);
        var_dump($clientsServices);
        exit;
    }

    public function addAction() {
        $commonService = new Application_Service_Common();
        $adminService = new Application_Service_SystemAdmin();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->addSystemAdmin($params);

            $this->_redirect("/admin/system-admins");
        }
        $this->view->countyList = $commonService->getCountiesList();
    }

    public function editAction() {
        $commonService = new Application_Service_Common();
        $adminService = new Application_Service_SystemAdmin();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $adminService->updateSystemAdmin($params);
            if (in_array($_SESSION['loggedInDetails']["IsProvider"], array(2, 3))) {
                $this->_redirect("/admin/system-admins/edit/id/" . $_SESSION['loggedInDetails']['admin_id'] . "?status=success");
            } else {
                $this->_redirect("/admin/system-admins");
            }
        } else {
            if ($this->_hasParam('id')) {
                if (in_array($_SESSION['loggedInDetails']["IsProvider"], array(2, 3))) {
                    $adminId =(int) $_SESSION['loggedInDetails']['admin_id'];
                } else {
                    $adminId = (int) $this->_getParam('id');
                }
                $this->view->admin = $adminService->getSystemAdminDetails($adminId);
                $this->view->adminCounties = $adminService->getSystemAdminCounties($adminId);
            }
        }
        $this->view->countyList = $commonService->getCountiesList();
    }

}
