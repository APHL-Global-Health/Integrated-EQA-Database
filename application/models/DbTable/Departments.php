<?php

class Application_Model_DbTable_Departments extends Zend_Db_Table_Abstract
{

    protected $_name = 'vl_department';
    
    public function getAllDepartments(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

