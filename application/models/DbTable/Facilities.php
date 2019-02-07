<?php

class Application_Model_DbTable_Facilities extends Zend_Db_Table_Abstract
{

    protected $_name = 'facilities';
    
    public function getAllFacilities(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

