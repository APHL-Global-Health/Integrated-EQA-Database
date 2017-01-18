<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Providerscontact {
	
	public function getAllProviderscontact($params){
		$adminDb = new Application_Model_DbTable_Providerscontact();
		return $adminDb->getAllProviderscontact($params);
	}
        public function addProviderscontact($params){
		$adminDb = new Application_Model_DbTable_Providerscontact();
		return $adminDb->addProviderscontact($params);		
	}
	public function updateProviderscontact($params){
		$adminDb = new Application_Model_DbTable_Providerscontact();
		return $adminDb->updateProviderscontact($params);		
	}
	public function getProvidercontactDetails($adminId){
		$adminDb = new Application_Model_DbTable_Providerscontact();
		return $adminDb->getProvidercontactDetails($adminId);		
	}
        public function getProviders() {
        $providerListDb = new Application_Model_DbTable_Providers();
        return $providerListDb->getProviders();
    }

}