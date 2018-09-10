<?php


class Application_Model_DbTable_ReadinessChecklistParticipantPlatform extends Zend_Db_Table_Abstract {

    protected $_name = 'readiness_checklist_participant_platforms';
    protected $_primary = 'id';

    protected $_referenceMap    = array(
        'ReadinessSurvey' => array(
            'columns'           => array('readiness_checklist_survey_id'),
            'refTableClass'     => 'Application_Model_DbTable_ReadinessChecklistSurvey',
            'refColumns'        => array('id')
        ),
        'Platform' => array(
            'columns'           => array('platform_id'),
            'refTableClass'     => 'Application_Model_DbTable_Platforms',
            'refColumns'        => array('ID')
        )
    );

}
