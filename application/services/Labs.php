<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Labs {
	
	public function getAllLabs($params){
		$adminDb = new Application_Model_DbTable_Labs();
		return $adminDb->getAllLabs($params);
	}
	public function addLabs($params){
		$adminDb = new Application_Model_DbTable_Labs();
		return $adminDb->addLabs($params);		
	}
	public function updateLabs($params){
		$adminDb = new Application_Model_DbTable_Labs();
		return $adminDb->updateLabs($params);		
	}
	public function getLabDetails($adminId){
		$adminDb = new Application_Model_DbTable_Labs();
		return $adminDb->getLabDetails($adminId);		
	}

}