<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Importcsv {
	
	public function getAllData($params,$pname){
		$adminDb = new Application_Model_DbTable_Importcsv();
		return $adminDb->getAllData($params,$pname);
	}
	public function addData($params,$provider,$program,$period){
		$adminDb = new Application_Model_DbTable_Importcsv();
		return $adminDb->addData($params,$provider,$program,$period);		
	}

}
