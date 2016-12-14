<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Samples {
	
	public function getAllSamples($params){
		$adminDb = new Application_Model_DbTable_Samples();
		return $adminDb->getAllSamples($params);
	}
	public function addSamples($params){
		$adminDb = new Application_Model_DbTable_Samples();
		return $adminDb->addSamples($params);		
	}
	public function updateSamples($params){
		$adminDb = new Application_Model_DbTable_Samples();
		return $adminDb->updateSamples($params);		
	}
	public function getSampleDetails($adminId){
		$adminDb = new Application_Model_DbTable_Samples();
		return $adminDb->getSampleDetails($adminId);		
	}

}