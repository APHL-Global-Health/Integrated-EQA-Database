<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Grading {
	
	public function getAllGrading($params){
		$adminDb = new Application_Model_DbTable_Grading();
		return $adminDb->getAllGrading($params);
	}
	public function addGrading($params){
		$adminDb = new Application_Model_DbTable_Grading();
		return $adminDb->addGrading($params);		
	}
	public function updateGrading($params){
		$adminDb = new Application_Model_DbTable_Grading();
		return $adminDb->updateGrading($params);		
	}
	public function getGradingDetails($adminId){
		$adminDb = new Application_Model_DbTable_Grading();
		return $adminDb->getGradingDetails($adminId);		
	}

}