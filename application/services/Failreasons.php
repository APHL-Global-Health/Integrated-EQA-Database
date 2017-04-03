<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Failreasons {
	
	public function getAllFailReasons($params){
		$adminDb = new Application_Model_DbTable_Failreasons();
		return $adminDb->getAllFailReasons($params);
	}
	public function addFailreasons($params){
		$adminDb = new Application_Model_DbTable_Failreasons();
		return $adminDb->addFailreasons($params);		
	}
	public function updateFailreasons($params){
		$adminDb = new Application_Model_DbTable_Failreasons();
		return $adminDb->updateFailreasons($params);		
	}
	public function getFailreasonDetails($adminId){
		$adminDb = new Application_Model_DbTable_Failreasons();
		return $adminDb->getFailreasonDetails($adminId);		
	}

}
