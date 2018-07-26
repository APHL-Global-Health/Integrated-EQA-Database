<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_ReadinessChecklistQuestion {
	
	public function getAllReadinessChecklistQuestions($params){
		$questions = new Application_Model_DbTable_ReadinessChecklistQuestion();
		return $questions->getAllReadinessChecklistQuestions($params);
	}
	public function addReadinessChecklistQuestion($params){
		$question = new Application_Model_DbTable_ReadinessChecklistQuestion();
		return $question->addReadinessChecklistQuestion($params);		
	}
	public function updateReadinessChecklistQuestion($params){
		$question = new Application_Model_DbTable_ReadinessChecklistQuestion();
		return $question->updateReadinessChecklistQuestion($params);		
	}
	public function getReadinessChecklistQuestionDetails($questionID){
		$question = new Application_Model_DbTable_ReadinessChecklistQuestion();
		return $question->getReadinessChecklistQuestionDetails($questionID);		
	}
}