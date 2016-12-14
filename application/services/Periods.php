<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Periods {
	
	public function getAllPeriods($params){
		$adminDb = new Application_Model_DbTable_Periods();
		return $adminDb->getAllPeriods($params);
	}
	public function addPeriods($params){
		$adminDb = new Application_Model_DbTable_Periods();
		return $adminDb->addPeriods($params);		
	}
	public function updatePeriods($params){
		$adminDb = new Application_Model_DbTable_Periods();
		return $adminDb->updatePeriods($params);		
	}
	public function getPeriodDetails($adminId){
		$adminDb = new Application_Model_DbTable_Periods();
		return $adminDb->getPeriodDetails($adminId);		
	}

}