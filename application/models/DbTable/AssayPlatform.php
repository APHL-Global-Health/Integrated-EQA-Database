<?php

class Application_Model_DbTable_AssayPlatform extends Zend_Db_Table_Abstract
{
    protected $_name = 'assay_platform';
 
    protected $_referenceMap    = array(
        'Assay' => array(
            'columns'           => array('assay_id'),
            'refTableClass'     => 'Application_Model_DbTable_Assay',
            'refColumns'        => array('id')
        ),
        'Platforms' => array(
            'columns'           => array('platform_id'),
            'refTableClass'     => 'Application_Model_DbTable_Platforms',
            'refColumns'        => array('ID')
        )
    );
}