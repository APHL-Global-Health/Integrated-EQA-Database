<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Model_DbTable_Counties extends Zend_Db_Table_Abstract
{

    protected $_name = 'rep_counties';
    
    public function getAllCounties(){
		$sql = $this->select();
		return $this->fetchAll($sql);
	}


}

