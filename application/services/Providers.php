<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Providers {
	
	public function getAllProviders($params){
		$adminDb = new Application_Model_DbTable_Providers();
		return $adminDb->getAllProviders($params);
	}
	public function addProviders($params){
		$adminDb = new Application_Model_DbTable_Providers();
		return $adminDb->addProviders($params);		
	}
	public function updateProviders($params){
		$adminDb = new Application_Model_DbTable_Providers();
		return $adminDb->updateProviders($params);		
	}
	public function getProviderDetails($adminId){
		$adminDb = new Application_Model_DbTable_Providers();
		return $adminDb->getProviderDetails($adminId);		
	}
        public function getProviders() {
        $providerListDb = new Application_Model_DbTable_Providers();
        return $providerListDb->getProviders();
    }

}