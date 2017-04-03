<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Programs {
	
	public function getAllPrograms($params){
		$adminDb = new Application_Model_DbTable_Programs();
		return $adminDb->getAllPrograms($params);
	}
	public function addPrograms($params){
		$adminDb = new Application_Model_DbTable_Programs();
		return $adminDb->addPrograms($params);		
	}
	public function updatePrograms($params){
		$adminDb = new Application_Model_DbTable_Programs();
		return $adminDb->updatePrograms($params);		
	}
	public function getProgramDetails($adminId){
		$adminDb = new Application_Model_DbTable_Programs();
		return $adminDb->getProgramDetails($adminId);		
	}
        public function getEnrolledProgramsList(){
		$db = Zend_Db_Table_Abstract::getDefaultAdapter();
		return $db->fetchAll($db->select()->from(array('p'=>'rep_programs'),array('ProgramID','Description'))->order('ProgramID ASC'));
	}

}