<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_ReadinessChecklist {
	
	public function getAllReadinessChecklists($params){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->getAllReadinessChecklists($params);
	}
	public function listReadinessChecklists(){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->list();
	}
	public function getReadinessChecklistDetails($checklistID){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->getReadinessChecklistDetails($checklistID);		
	}
	public function addReadinessChecklist($params){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->addReadinessChecklist($params);		
	}
	public function updateReadinessChecklist($params){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->updateReadinessChecklist($params);		
	}
}