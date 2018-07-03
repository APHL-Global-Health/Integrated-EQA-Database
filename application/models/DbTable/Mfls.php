<?php

class Application_Model_DbTable_Mfls extends Zend_Db_Table_Abstract
{

    protected $_name = 'mfl_facility_codes';
    
    public function getAllMfls(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

