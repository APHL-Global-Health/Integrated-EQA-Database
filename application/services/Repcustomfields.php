<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Repcustomfields {
	
	public function getAllFields($params){
		$adminDb = new Application_Model_DbTable_Repcustomfields();
		return $adminDb->getAllFields($params);
	}
	public function addFields($params){
		$adminDb = new Application_Model_DbTable_Repcustomfields();
		return $adminDb->addFields($params);		
	}
	
	public function getFieldDetails($adminId){
		$adminDb = new Application_Model_DbTable_Repcustomfields();
		return $adminDb->getFieldDetails($adminId);		
	}

}
