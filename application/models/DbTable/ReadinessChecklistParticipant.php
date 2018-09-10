<?php

class Application_Model_DbTable_ReadinessChecklistParticipant extends Zend_Db_Table_Abstract {

    protected $_name = 'readiness_checklist_participants';
    protected $_primary = 'id';

    protected $_dependentTables = array('Application_Model_DbTable_ReadinessChecklistParticipantPlatform');

    protected $_referenceMap    = array(
        'ReadinessChecklistSurvey' => array(
            'columns'           => array('readiness_checklist_send_id'),
            'refTableClass'     => 'Application_Model_DbTable_ReadinessChecklistSurvey',
            'refColumns'        => array('id')
        ),
        'Participant' => array(
            'columns'           => array('participant_id'),
            'refTableClass'     => 'Application_Model_DbTable_Participants',
            'refColumns'        => array('participant_id')
        )
    );


}
