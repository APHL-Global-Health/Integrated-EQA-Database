<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_ReceiveShipment {
	
	public function getAllReceipts($params){
		$adminDb = new Application_Model_DbTable_ReceiveShipment();
		return $adminDb->getAllReceipts($params);
	}
	public function addReceiveShipment($params){
		$adminDb = new Application_Model_DbTable_ReceiveShipment();
		return $adminDb->addReceiveShipment($params);		
	}
	public function updateReceiveShipment($params){
		$adminDb = new Application_Model_DbTable_ReceiveShipment();
		return $adminDb->updateReceiveShipment($params);		
	}
	public function getReceiptDetails($adminId){
		$adminDb = new Application_Model_DbTable_ReceiveShipment();
		return $adminDb->getReceiptDetails($adminId);		
	}

}
