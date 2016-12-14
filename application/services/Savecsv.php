<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Service_Savecsv {
	
	public function getAllData($params){
		$adminDb = new Application_Model_DbTable_Importcsv();
		return $adminDb->getAllData($params);
	}
	public function saveData($params,$extraInfo){
		$adminDb = new Application_Model_DbTable_Importcsv();
		return $adminDb->saveData($params,$extraInfo);		
	}

}
