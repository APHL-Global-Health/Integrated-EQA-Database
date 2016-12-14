<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Testkits {
	
	public function getAllTestkits($params){
		$adminDb = new Application_Model_DbTable_Testkits();
		return $adminDb->getAllTestkits($params);
	}
	public function addTestkits($params){
		$adminDb = new Application_Model_DbTable_Testkits();
		return $adminDb->addTestkits($params);		
	}
	public function updateTestkits($params){
		$adminDb = new Application_Model_DbTable_Testkits();
		return $adminDb->updateTestkits($params);		
	}
	public function getTestkitDetails($adminId){
		$adminDb = new Application_Model_DbTable_Testkits();
		return $adminDb->getTestkitDetails($adminId);		
	}

}