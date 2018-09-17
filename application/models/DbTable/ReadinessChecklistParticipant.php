<?php

class Application_Model_DbTable_ReadinessChecklistParticipant extends Zend_Db_Table_Abstract {

    protected $_name = 'readiness_checklist_participants';
    protected $_primary = 'id';

    protected $_dependentTables = array('Application_Model_DbTable_ReadinessChecklistParticipantPlatform', 'Application_Model_DbTable_ReadinessChecklistResponse');

    protected $_referenceMap    = array(
        'ReadinessChecklistSurvey' => array(
            'columns'           => array('readiness_checklist_survey_id'),
            'refTableClass'     => 'Application_Model_DbTable_ReadinessChecklistSurvey',
            'refColumns'        => array('id')
        ),
        'Participant' => array(
            'columns'           => array('participant_id'),
            'refTableClass'     => 'Application_Model_DbTable_Participants',
            'refColumns'        => array('participant_id')
        ),
        'DataManager' => array(
            'columns'           => array('submitted_by'),
            'refTableClass'     => 'Application_Model_DbTable_DataManagers',
            'refColumns'        => array('dm_id')
        ),
        'Administrator' => array(
            'columns'           => array('sanctioned_by'),
            'refTableClass'     => 'Application_Model_DbTable_SystemAdmin',
            'refColumns'        => array('admin_id')
        )
    );

    public function addChecklistSurveyParticipants($checklistSurveyID, $participantIDs){
        $authNameSpace = new Zend_Session_Namespace('administrators');
        foreach ($participantIDs as $participantID) {
            $data  = [
                'readiness_checklist_survey_id' => $checklistSurveyID, 
                'participant_id' => $participantID, 
                'created_by' => $authNameSpace->admin_id, 
                'created_at' => new Zend_Db_Expr('now()')
            ];

            $this->insert($data);
        }
    }

    public function updateChecklistSurveyParticipationStatus($participationID, $status){
        $adminNameSpace = new Zend_Session_Namespace('administrators');
        $managerNameSpace = new Zend_Session_Namespace('datamanagers');

        $data  = [];
        $data['status'] = $status;

        if($status == 1){ //Submitted
            $data['submitted_by'] = $managerNameSpace->dm_id;
            $data['submitted_at'] = new Zend_Db_Expr('now()');
        }else{
            $data['sanctioned_by'] = $adminNameSpace->admin_id;
            $data['sanctioned_at'] = new Zend_Db_Expr('now()');
        }

        return $this->update($data, "id = $participationID");
    }

    public function getChecklistSurveyParticipationID($surveyID, $participantID){
        $participant = $this->fetchRow(
            $this->select()->where('readiness_checklist_survey_id = ?', $surveyID)
                        ->where('participant_id = ?', $participantID));
        
        return $participant->id;
    }
}
