<?php

class Application_Model_DbTable_Schemes extends Zend_Db_Table_Abstract
{

    protected $_name = 'vl_scheme';
    
    public function getAllSchemes(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

