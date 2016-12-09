<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Resultcodes {
	
	public function getAllResultcodes($params){
		$adminDb = new Application_Model_DbTable_Resultcodes();
		return $adminDb->getAllResultcodes($params);
	}
	public function addResultcodes($params){
		$adminDb = new Application_Model_DbTable_Resultcodes();
		return $adminDb->addResultcodes($params);		
	}
	public function updateResultcodes($params){
		$adminDb = new Application_Model_DbTable_Resultcodes();
		return $adminDb->updateResultcodes($params);		
	}
	public function getResultcodeDetails($adminId){
		$adminDb = new Application_Model_DbTable_Resultcodes();
		return $adminDb->getResultcodeDetails($adminId);		
	}

}