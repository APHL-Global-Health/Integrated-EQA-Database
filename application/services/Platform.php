<?php

class Application_Service_Platform {
    
    public function addPlatform($params){
        $partnersDb = new Application_Model_DbTable_Platforms();
	return $partnersDb->addPlatforms($params);
    }
    
    public function getAllPlatform($parameters){
        $partnersDb = new Application_Model_DbTable_Platforms();
	return $partnersDb->fetchAllPlatformAdmin($parameters);
    }
    
    public function getPlatform($partnerId){
        $partnersDb = new Application_Model_DbTable_Platforms();
	return $partnersDb->getPlatformDetails($partnerId);
    }

    public function deletePlatform($partnerId){
        $partnersDb = new Application_Model_DbTable_Platforms();
        return $partnersDb->deletePlatformDetails($partnerId);
    }
    
    public function updatePlatform($params){
        $partnersDb = new Application_Model_DbTable_Platforms();
	return $partnersDb->updatePlatforms($params);
    }
    
    public function getAllActivePlatforms(){
        $partnersDb = new Application_Model_DbTable_Platforms();
	return $partnersDb->fetchAllActivePlatforms();
    }
}