<?php

class Application_Model_DbTable_Counties extends Zend_Db_Table_Abstract
{

    protected $_name = 'counties';
    
    public function getAllCounties(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

