<?php

class Application_Service_Platform {
    
    public function addPlatform($params){
        $platformModel = new Application_Model_DbTable_Platforms();
    	return $platformModel->addPlatforms($params);
    }
    
    public function getAllPlatform($parameters){
        $platformModel = new Application_Model_DbTable_Platforms();
    	return $platformModel->fetchAllPlatformAdmin($parameters);
    }
    
    public function getPlatform($platformId){
        $platformModel = new Application_Model_DbTable_Platforms();
    	return $platformModel->getPlatformDetails($platformId);
    }

    public function deletePlatform($platformId){
        $platformModel = new Application_Model_DbTable_Platforms();
        return $platformModel->deletePlatformDetails($platformId);
    }
    
    public function updatePlatform($params){
        $platformModel = new Application_Model_DbTable_Platforms();
    	return $platformModel->updatePlatforms($params);
    }
    
    public function getPlatforms(){
        $platformModel = new Application_Model_DbTable_Platforms();
    	return $platformModel->fetchAll($platformModel->select()->where("status = ? ", 1));
    }
}