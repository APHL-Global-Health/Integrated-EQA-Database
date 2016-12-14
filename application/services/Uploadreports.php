<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Uploadreports {
	
	public function getAllData($params){
		$adminDb = new Application_Model_DbTable_Uploadreports();
		return $adminDb->getAllData($params);
	}
	public function addData($provider,$program,$period,$names,$size,$type,$url){
		$adminDb = new Application_Model_DbTable_Uploadreports();
		return $adminDb->addData($provider,$program,$period,$names,$size,$type,$url);		
	}
        public function getFileDetails($adminId){
		$adminDb = new Application_Model_DbTable_Uploadreports();
		return $adminDb->getFileDetails($adminId);		
	}

}