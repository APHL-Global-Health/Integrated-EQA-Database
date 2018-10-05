<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_ReadinessChecklist {
	
	public function getAllReadinessChecklists($params){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->getAllReadinessChecklists($params);
	}
	public function listReadinessChecklists(){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->list();
	}
	public function getReadinessChecklistDetails($checklistID){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->getReadinessChecklistDetails($checklistID);		
	}
	public function listReadinessChecklistSurveys($participantID){
		$participantModel = new Application_Model_DbTable_Participants();
		$participant = $participantModel->fetchRow($participantModel->select()->where("participant_id = ? ", $participantID));
		$response['participant'] = $participant->toArray();

		$response['surveys'] = [];

		$checklistParticipantRowset = $participant->findDependentRowset('Application_Model_DbTable_ReadinessChecklistParticipant');
		
		foreach ($checklistParticipantRowset as $checklistParticipant) {
			$dataManager = $checklistParticipant->findParentRow('Application_Model_DbTable_DataManagers');
			$respondent = isset($dataManager)?$dataManager->first_name." ".$dataManager->last_name:"";
			$survey = $checklistParticipant->findParentRow('Application_Model_DbTable_ReadinessChecklistSurvey');
			$response['surveys'][] = [
				'survey' => $survey->toArray(), 
				'checklistParticipant' => $checklistParticipant->toArray(),
				'dataManager' => $respondent
			];
		}

		return $response;
	}
	public function getReadinessChecklistSurvey($checklistSurveyID){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklistSurvey();
		
		return $checklistDB->getReadinessChecklistSurveyDetails($checklistSurveyID);		
	}
	public function getReadinessChecklistSurveyResponses($checklistSurveyID, $participantID){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklistSurvey();
		
		return $checklistDB->getReadinessChecklistSurveyResponses($checklistSurveyID, $participantID);		
	}
	public function sendReadinessChecklist($params){
		// $checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		$sentChecklistModel = new Application_Model_DbTable_ReadinessChecklistSurvey();
		return $sentChecklistModel->addReadinessChecklistSurvey($params);		
	}
	public function addReadinessChecklist($params){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->addReadinessChecklist($params);		
	}
	public function updateReadinessChecklist($params){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->updateReadinessChecklist($params);		
	}
	public function deleteReadinessChecklist($params){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklist();
		
		return $checklistDB->deleteReadinessChecklist($params);		
	}
	public function updateChecklistParticipationStatus($participationID, $status){
		$checklistDB = new Application_Model_DbTable_ReadinessChecklistParticipant();
		
		return $checklistDB->updateChecklistSurveyParticipationStatus($participationID, $status);		
	}
}