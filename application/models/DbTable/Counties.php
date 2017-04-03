<?php

class Application_Model_DbTable_Counties extends Zend_Db_Table_Abstract
{

    protected $_name = 'rep_counties';
    
    public function getAllCounties(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

