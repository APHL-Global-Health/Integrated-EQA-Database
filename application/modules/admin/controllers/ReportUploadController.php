<?php

class Admin_ReportUploadController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')->initContext();
        $this->_helper->layout()->pageName = 'report';
    }

    public function indexAction(){

        $parameters = $this->_getAllParams();
        $participantService = new Application_Service_Participants();
        
        $this->view->responses = $participantService->getUploadedReports($parameters);

        $this->view->participants = $participantService->getAllActiveParticipants();

        if ($this->_hasParam('pt'))$this->view->chosenParticipant = $this->_getParam('pt');
    }
    
    public function viewAction(){
        $reportUploadModel = new Application_Model_DbTable_ReportUpload();
        if($this->_hasParam('id')){
            $reportID = (int)$this->_getParam('id');
            $this->view->readinessChecklist = $reportUploadModel->getReportUpload($reportID);
        }else{
            $this->_redirect("/admin/report-upload");
        }
    }

    public function addAction(){

        $participantService = new Application_Service_Participants();
        $this->view->participants = $participantService->getAllActiveParticipants();

        if ($this->getRequest()->isPost()) {
            if((!empty($_FILES["upload_report_file"])) && ($_FILES['upload_report_file']['error'] == 0)) {
                
                $filename = basename($_FILES['upload_report_file']['name']);

                $ext = substr($filename, strrpos($filename, '.') + 1);

                if (($_FILES["upload_report_file"]["size"] < 5000000)) {

                    $uploadDir = UPLOAD_PATH.DIRECTORY_SEPARATOR."general";

                    if(!is_dir($uploadDir)){
                        mkdir($uploadDir,0777,true);
                    }
                    $date = date('_Ymd_Gms');
                    //Determine the path to which we want to save this file
                    $newName = $uploadDir.DIRECTORY_SEPARATOR.$date.md5($filename).".$ext";
                    
                    move_uploaded_file($_FILES['upload_report_file']['tmp_name'], $newName);

                    $participantService->uploadReport(
                        ['participant_id' => $this->_getParam('participant_id'),
                        'title' => $this->_getParam('title'),
                        'file_path' => $newName,
                        'file_path_hash' => md5($newName),
                        'access' => $this->_getParam('access')]);

                    $this->_redirect("/admin/report-upload");
                }
            }else{
                error_log("No file uploaded!");
                error_log(implode("\n", $_FILES));
            }
        }
    }
    
    public function editAction(){
        $reportUploadModel = new Application_Model_DbTable_ReportUpload();
        $participantService = new Application_Service_Participants();
        
        if($this->_hasParam('id')){
            $reportID = (int)$this->_getParam('id');
            $this->view->reportUpload = $reportUploadModel->getReportUpload($reportID);
            $this->view->participants = $participantService->getAllActiveParticipants();
        }else{
            $this->_redirect("/admin/report-upload");
        }
    }

    public function updateAction(){
        $reportUploadModel = new Application_Model_DbTable_ReportUpload();
        if ($this->getRequest()->isPost()) {
            $params = $this->getRequest()->getPost();
            $reportUploadModel->updateReportUpload($params);
            $this->_redirect("/admin/report-upload");
        }
    }

    public function deleteAction(){

    }

    public function downloadAction(){

        $reportUploadModel = new Application_Model_DbTable_ReportUpload();
        if($this->_hasParam('file')){
            $reportUploadModel->downloadReport($this->_getParam('file'));
        }
    }

}