<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_ImportcsvController extends Zend_Controller_Action {

    public function init() {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
                ->initContext();
        $this->_helper->layout()->pageName = 'repository';
    }

    public function indexAction() {
        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $pname = $auth->getIdentity()->ProviderName;
        }
        if ($this->getRequest()->isPost()) {
            $params = $this->_getAllParams();

            $clientsServices = new Application_Service_Importcsv();
            $clientsServices->getAllData($params, $pname);
        }
    }

    public function addAction() {

        $program = $this->getRequest()->getPost('ProgramID');
        $provider = $this->getRequest()->getPost('ProviderID');
        $period = $this->getRequest()->getPost('RoundID');
        $adminService = new Application_Service_Importcsv();
        $commonService = new Application_Service_Common();
        $request = $this->getRequest();
        $headers = [];
        if ($request->isPost()) {
            $adapter = new Zend_File_Transfer();
            // Returns all known internal file information
            $files = $adapter->getFileInfo();
            chdir(APPLICATION_PATH);
            $dirpath = realpath("../public/files");
            $adapter->setDestination("'$dirpath'");
            foreach ($files as $file => $info) {
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
            if (!$adapter->receive()) {
                $messages = $adapter->getMessages();
                echo implode("\n", $messages);
            }
            $names = $adapter->getFileName();
            $file_handle = NULL;
            $data = NULL;
            $keys = NULL;
            $record = NULL;
            //Get the filename
            $filename = $names;
            if (file_exists($filename)) {
                $file_handle = fopen($filename, "r");
            } else {
                throw new Exception("File not found: " . $filename, null);
            }
            $row = 0;
            //$headers = [];
            if ($file_handle) {
                while (($data = fgetcsv($file_handle, 1024, ",")) !== FALSE) {
                    $num = count($data);
                    for ($c = 0; $c < $num; $c++) {
                        $params = explode(",", $data[$c]);
                    }
                    if ($row == 0) {
                        $headers = $data;
                    }
                    $row++;

                    //$adminService->addData($data,$provider,$program,$period);
                }

                fclose($file_handle);
            }
            //$this->_redirect("/admin/mapcolumns");
        }
        $this->view->repColumnList = $commonService->getRepositoryColumns();
        $this->view->importHeadersList = $headers;
        $this->view->providerList = $commonService->getproviderList();
        $this->view->programList = $commonService->getprogramList();
        $this->view->periodList = $commonService->getperiodList();
    }

    public function mapcolumnsAction() {
        $program = $this->getRequest()->getPost('ProgramID');
        $provider = $this->getRequest()->getPost('ProviderID');
        $period = $this->getRequest()->getPost('RoundID');

        $adminService = new Application_Service_Importcsv();
        $commonService = new Application_Service_Common();
        $request = $this->getRequest();
        $headers = array();

        if ($request->isPost()) {
            $adapter = new Zend_File_Transfer();
            // Returns all known internal file information
            $files = $adapter->getFileInfo();
            $names = $adapter->getFileName();
            
            $extensionArray = explode('.', $names);
            $lastElement = count($extensionArray) - 1;
            $sxt = $extensionArray[$lastElement];
            $newname = $provider.'-'.$program.'.'.$sxt;
            
            $adapter->addFilter('rename', $newname);
            $adapter->setDestination('../public/files');
            foreach ($files as $file => $info) {
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
            if (!$adapter->receive()) {
                $messages = $adapter->getMessages();
                echo implode("\n", $messages);
            }

            $file_handle = NULL;
            $data = NULL;
            $keys = NULL;
            $record = NULL;
            //Get the filename
            $filename = '../public/files/' . $newname;
            $filedetails = new Zend_Session_Namespace('filename');
            $filedetails->filename = $filename;
            if (file_exists($filename)) {
                $file_handle = fopen($filename, "r");
            } else {
                throw new Exception("File not found: " . $filename, null);
            }
            $row = 0;
            //$headers = [];
            if ($file_handle) {
                while (($data = fgetcsv($file_handle, 1024, ",")) !== FALSE) {
                    $num = count($data);
                    for ($c = 0; $c < $num; $c++) {
                        $params = explode(",", $data[$c]);
                    }
                    if ($row == 0) {
                        $headers = $data;
                    }
                    $row++;

                    //$adminService->addData($data,$provider,$program,$period);
                }

                fclose($file_handle);
            }
            //$this->_redirect("/admin/mapcolumns");
        }
        $repColumnList = $commonService->getRepositoryColumns();
        return $this->_helper->json->sendJson(array('excel-headers' => $headers, 'schemas-headers' => $repColumnList));
        //return $this->_helper->json->sendJson($headers);
    }

    public function getUploadedExcelFileHeaders() {
        $filedetails = new Zend_Session_Namespace('filename');
        $filename = $filedetails->filename;
        //$filename = 'C:\\temp\\data upload.csv';
        if (file_exists($filename)) {
            $file_handle = fopen($filename, "r");
        } else {
            throw new Exception("File not found: " . $filename, null);
        }
        $row = 0;
        //$headers = [];
        if ($file_handle) {
            while (($data = fgetcsv($file_handle, 1024, ",")) !== FALSE) {
                $num = count($data);
                for ($c = 0; $c < $num; $c++) {
                    $params = explode(",", $data[$c]);
                }
                if ($row == 0) {
                    $headers = $data;
                }
                $row++;
            }

            fclose($file_handle);
        }
        return $headers;
    }

    public function getUploadedExcelFileData() {
        $filedetails = new Zend_Session_Namespace('filename');
        $filename = $filedetails->filename;
        //$filename = 'C:\\temp\\data upload.csv';
        if (file_exists($filename)) {
            $file_handle = fopen($filename, "r");
        } else {
            throw new Exception("File not found: " . $filename, null);
        }
        $row = 0;
        $excelData = [];
        if ($file_handle) {
            while (($data = fgetcsv($file_handle, 1024, ",")) !== FALSE) {
                $num = count($data);
                for ($c = 0; $c < $num; $c++) {
                    $params = explode(",", $data[$c]);
                }
                if ($row == 0) {
                    // continue;
                }
                $excelData[count($excelData)] = $data;
                $row++;
            }

            fclose($file_handle);
        }
        return $excelData;
    }

    public function saveAction() {
        $data = file_get_contents('php://input');
        $data = json_decode($data, true);
        $adminService = new Application_Service_Savecsv();
        $db = Zend_Db_Table::getDefaultAdapter();
//
//        $program = $this->getRequest()->getPost('ProgramID');
//        $provider = $this->getRequest()->getPost('ProviderID');
//        $period = $this->getRequest()->getPost('RoundID');
//        $excelmapping = $this->getRequest()->getPost('excelMapping');
//        $filetoupload = $this->getRequest()->getPost('fileToUpload');
        //$filename = strrpos($filetoupload, DIRECTORY_SEPARATOR);

        $mappedColumn = array();
        $mappedColumnNames = array();
        $excelHeaders = $this->getUploadedExcelFileHeaders();
        $extraInfo = end($data);
        //$name=  explode($delimiter, $string);
        foreach ($data as $item) {
            if (isset($item['value'])) {
                $mappedColumn[count($mappedColumn)] = $item['key'];
                $mappedColumnNames[count($mappedColumnNames)] = $item['value'];
            }
        }

        $newColumns = $this->getNewExcelColumns($mappedColumn, $excelHeaders);

        $newTableColumn = $adminService->saveData($newColumns, $extraInfo);

        $finalTableColumns = array_merge($mappedColumnNames, $newTableColumn);

        $excelData = $this->getUploadedExcelFileData();

        $insertStatement = $this->createBulkInsert('rep_repository', $finalTableColumns, $excelData, $extraInfo);
        $db->query($insertStatement);
        $filedetails = new Zend_Session_Namespace('filename');
        $filedetails->filename = '';
        $this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        return "yes";
    }

    public function createBulkInsert($table, Array $columns, Array $records, $extraInfo) {
        $query = " INSERT INTO `" . $table . "` (";
        $query .= " `ProviderID`,`ProgramID`,`RoundID`,";
        for ($x = 0; $x < count($columns); $x++) {

            $query .= " `" . $columns [$x] . "` ";

            if (($x != count($columns) - 1)) {
                $query .= ",";
            }
        }

        $query .= ") VALUES  ";

        for ($x = 0; $x < count($records); $x ++) {

            if ($x == 0) {
                continue;
            }

            $query .= " ('";
            $query .= $extraInfo['ProviderID'] . "','";
            $query .= $extraInfo['ProgramID'] . "','";
            $query .= $extraInfo['RoundID'] . "',";

            for ($i = 0; $i < count($columns); $i++) {
                $query .= " '" . $records [$x][$i] . "' ";
                if (($i != count($columns) - 1)) {
                    $query .= ",";
                }
            }
            $query .= ")";

            if ($x != count($records) - 1) {
                $query .= ",";
            }
        }

        $query .= ";";

        return $query;
    }

    public function getNewExcelColumns($mappedColumn, $excelHeaders) {
        $newColumnsIndexes = array();
        for ($i = 0; $i < count($excelHeaders); $i++) {
            array_push($newColumnsIndexes, $i);
        }

        $newColumnsIndexes = array_diff($newColumnsIndexes, $mappedColumn);
        $newColumns = array();
        foreach ($newColumnsIndexes as $newColumnsIndex) {
            $newColumns[count($newColumns)] = $excelHeaders[$newColumnsIndex];
        }
        return array_unique($newColumns);
    }

}
