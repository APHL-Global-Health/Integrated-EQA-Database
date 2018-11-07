<?php


class Application_Model_DbTable_ReadinessChecklistParticipantPlatform extends Zend_Db_Table_Abstract {

    protected $_name = 'readiness_checklist_participant_platforms';
    protected $_primary = array('readiness_checklist_participant_id', 'platform_id');

    protected $_referenceMap    = array(
        'ReadinessParticipants' => array(
            'columns'           => array('readiness_checklist_participant_id'),
            'refTableClass'     => 'Application_Model_DbTable_ReadinessChecklistParticipant',
            'refColumns'        => array('id')
        ),
        'Platforms' => array(
            'columns'           => array('platform_id'),
            'refTableClass'     => 'Application_Model_DbTable_Platforms',
            'refColumns'        => array('ID')
        )
    );

}
