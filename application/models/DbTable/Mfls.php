<?php

class Application_Model_DbTable_Mfls extends Zend_Db_Table_Abstract
{

    protected $_name = 'vl_mfl';
    
    public function getAllMfls(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

