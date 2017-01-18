<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Labcontact {
	
	public function getAllLabcontact($params){
		$adminDb = new Application_Model_DbTable_Labcontact();
		return $adminDb->getAllLabcontact($params);
	}
        public function addLabcontact($params){
		$adminDb = new Application_Model_DbTable_Labcontact();
		return $adminDb->addLabcontact($params);		
	}
	public function updateLabcontact($params){
		$adminDb = new Application_Model_DbTable_Labcontact();
		return $adminDb->updateLabcontact($params);		
	}
	public function getLabcontactDetails($adminId){
		$adminDb = new Application_Model_DbTable_Labcontact();
		return $adminDb->getLabcontactDetails($adminId);		
	}
        public function getProviders() {
        $providerListDb = new Application_Model_DbTable_Providers();
        return $providerListDb->getProviders();
    }

}