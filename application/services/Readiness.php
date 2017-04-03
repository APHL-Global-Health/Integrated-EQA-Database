<?php

class Application_Service_Readiness {
    
    public function addReadiness($params){
        $partnersDb = new Application_Model_DbTable_Readiness();
	return $partnersDb->addReadiness($params);
    }
    
    public function getAllReadiness($parameters){
        $partnersDb = new Application_Model_DbTable_Readiness();
	return $partnersDb->getAllReadiness($parameters);
    }
    
    public function getReadiness($partnerId){
        $partnersDb = new Application_Model_DbTable_Readiness();
	return $partnersDb->getReadiness($partnerId);
    }
    
    public function updateReadiness($params){
        $partnersDb = new Application_Model_DbTable_Readiness();
	return $partnersDb->updateReadiness($params);
    }
    public function getReadinessDetails($adminId){
		$adminDb = new Application_Model_DbTable_Readiness();
		return $adminDb->getReadinessDetails($adminId);		
	}
//    public function getAllActivePartners(){
//        $partnersDb = new Application_Model_DbTable_Readiness();
//	return $partnersDb->fetchAllActivePartners();
//    }
}