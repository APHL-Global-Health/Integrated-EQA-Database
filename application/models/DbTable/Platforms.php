<?php

class Application_Model_DbTable_Platforms extends Zend_Db_Table_Abstract
{

    protected $_name = 'vl_platform';
    
    public function getAllPlatforms(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

