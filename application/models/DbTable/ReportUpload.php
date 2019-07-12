<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_DbTable_ReportUpload extends Zend_Db_Table_Abstract {

    protected $_name = 'report_uploads';
    protected $_primary = 'id';

    protected $_referenceMap    = array(
        'ReadinessChecklist' => array(
            'columns'           => array('participant_id'),
            'refTableClass'     => 'Application_Model_DbTable_Participant',
            'refColumns'        => array('participant_id')
        ),
        'DataManager' => array(
            'columns'           => array('created_by'),
            'refTableClass'     => 'Application_Model_DbTable_DataManager',
            'refColumns'        => array('dm_id')
        )
    );

    // Access types
    // 0 = 'NONE';
    // 1 = 'PARTICIPANT';
    // 2 = 'PUBLIC';
    protected $_access = array('NONE', 'PARTICIPANT', 'PUBLIC');

    public function getAllReportUploads($parameters) {

        $admin = new Zend_Session_Namespace('administrators');
        $datamanager = new Zend_Session_Namespace('datamanagers');

        $output = [];
        $query = $this->getAdapter()->select()->from(array('r' => 'report_uploads'))
                ->joinLeft(array('p' => 'participant'), 'r.participant_id=p.participant_id', array('participant_name' => 'p.institute_name'))
                ->join(array('s' => 'system_admin'), 'r.created_by = s.admin_id', array('first_name', 'last_name'));

        if (isset($parameters['d']) && intval($parameters['d']) > 0) {
            $query = $query->where("d.distribution_id = ? ", $parameters['d']);
        }

        if (isset($parameters['pf']) && intval($parameters['pf']) > 0) {
            $query = $query->where("spm.platform_id = ? ", $parameters['pf']);
        }

        if (isset($parameters['pt']) && intval($parameters['pt']) > 0) {
            $query = $query->where("p.participant_id = ? ", $parameters['pt']);
        }

        if (isset($datamanager->dm_id)){
            $dm = new Application_Model_DbTable_DataManagers();
            $parts = $dm->getParticipants($datamanager->dm_id);
            if(is_array($parts))$parts = implode(",", $parts);
            $query = $query->where("(r.access = 1 AND r.participant_id IN ($parts)) OR r.access = 2");
        }

        $rResult = $this->getAdapter()->fetchAll($query);

        foreach ($rResult as $aRow) {
            $row = array();

            $row['report_id'] = $aRow['id'];
            $row['participant_name'] = $aRow['participant_name'];
            $row['file_path'] = $aRow['file_path_hash'];
            $row['title'] = $aRow['title'];
            $row['access'] = $this->_access[$aRow['access']];
            $row['status'] = $aRow['status'];
            $row['participant_id'] = $aRow['participant_id'];
            $row['created_by'] = $aRow['first_name'] . " " . $aRow['last_name'];
            $row['created_at'] = $aRow['created_at'];

            if (isset($admin->admin_id)) {
                $row['action'] = '<a href="/admin/report-upload/edit/id/' . $aRow['id'] . '" class="btn btn-primary btn-xs" style="margin:3px;padding:10px;"> Edit</a>';
                $row['action'] .= '<a href="/admin/report-upload/download/file/' . $aRow['file_path_hash'];
            }else if (isset($datamanager->dm_id)){
                $row['action'] = '<a href="/participant/report-download/file/' . $aRow['file_path_hash'];
            }
            $row['action'] .= '" class="btn btn-default btn-xs" style="margin:3px;padding:10px;"> Download</a>';

            $output['aaData'][] = $row;
        }

        return $output;
    }
    
    public function getReportUpload($reportID) {

        $admin = new Zend_Session_Namespace('administrators');

        $output = [];
        $query = $this->getAdapter()->select()->from(array('r' => 'report_uploads'))
                    ->where("r.id = ? ", $reportID);

        $rResult = $this->getAdapter()->fetchAll($query);

        foreach ($rResult as $aRow) {
            $row = array();

            $row['report_id'] = $aRow['id'];
            $row['title'] = $aRow['title'];
            $row['access'] = $aRow['access'];
            $row['participant_id'] = $aRow['participant_id'];

            $output = $row;
        }

        return $output;
    }
    
    public function addReportUpload($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $db = Zend_Db_Table_Abstract::getAdapter();
        $data = array(
            'participant_id' => $params['participant_id'],
            'title' => $params['title'],
            'file_path' => $params['file_path'],
            'file_path_hash' => md5($params['file_path']),
            'access' => $params['access'],
            'created_by' => $authNameSpace->admin_id,
            'created_at' => 'now()'
        );
        $saved = $this->insert($data);
        return $saved;
    }

    public function updateReportUpload($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'participant_id' => $params['participant_id'],
            'title' => $params['title'],
            'access' => $params['access']
        );
        return $this->update($data, "id = " . $params['report_id']);
    }

    public function downloadReport($file){

        $allowDownload = false;
        $admin = new Zend_Session_Namespace('administrators');
        $datamanager = new Zend_Session_Namespace('datamanagers');

        $query = $this->getAdapter()->select()->from(array('r' => 'report_uploads'))->where("r.file_path_hash = ? ", $file);

        error_log($query);
        $rResult = $this->getAdapter()->fetchAll($query);

        $fileName = "";

        foreach ($rResult as $aRow) {
            if ($aRow['access'] == 2 || isset($admin->admin_id)){
                $allowDownload = true;
                $fileName = $aRow['file_path'];
            }

            if (isset($datamanager->dm_id) && $aRow['access'] == 1){

                $dm = new Application_Model_DbTable_DataManagers();

                if(strcmp($aRow['participant_id'], $dm->getParticipants($datamanager->dm_id)) == 0) {
                    $allowDownload = true;
                    $fileName = $aRow['file_path'];
                }
                
            }
        }

        error_log("File name: ".$fileName);
        if ($allowDownload) {
            if(file_exists($fileName)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($fileName));
                flush();
                readfile($fileName);
            }
        }
        exit;
    }

}
