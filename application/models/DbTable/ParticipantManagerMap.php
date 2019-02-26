<?php


class Application_Model_DbTable_ParticipantManagerMap extends Zend_Db_Table_Abstract {

    protected $_name = 'participant_manager_map';

    protected $_referenceMap    = array(
        'DataManager' => array(
            'columns'           => array('dm_id'),
            'refTableClass'     => 'Application_Model_DbTable_DataManagers',
            'refColumns'        => array('dm_id')
        ),
        'Participant' => array(
            'columns'           => array('participant_id'),
            'refTableClass'     => 'Application_Model_DbTable_Participants',
            'refColumns'        => array('participant_id')
        )
    );

}
