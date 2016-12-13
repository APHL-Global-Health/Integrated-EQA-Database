<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:47  09/12/2016
	* 
	*
	* DATABASE CRUD GENERATOR IS AN OPEN SOURCE PROJECT. TO IMPROVE ON THIS PROJECT BY
	* ADDING MODULES, FIXING BUGS e.t.c GET THE SOURCE CODE FROM GIT (https://github.com/marviktintor/dbcrudgen/)
	* 
	* DATABASE CRUD GENERATOR INFO:
	* 
	* DEVELOPER : VICTOR MWENDA
	* VERSION : DEVELOPER PREVIEW 0.1
	* SUPPORTED LANGUAGES : PHP
	* DEVELOPER EMAIL : vmwenda.vm@gmail.com
	* 
	*/


/**
*  
* ShipmentParticipantMap
*  
* Low level class for manipulating the data in the table shipment_participant_map
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ShipmentParticipantMap {

	private $databaseUtils;
	private $action;
	private $client;
	
	public function __construct($databaseUtils, $action = "", $client = "") {
		$this->init($databaseUtils);
	}
	
	//Initializes
	public function init($databaseUtils) {
		
		//Init
		$this->databaseUtils = $databaseUtils;
		
	}
	
		
	/**
	* private class variable $_mapId
	*/
	private $_mapId;
	
	/**
	* returns the value of $mapId
	*
	* @return object(int|string) mapId
	*/
	public function _getMapId() {
		return $this->_mapId;
	}
	
	/**
	* sets the value of $_mapId
	*
	* @param mapId
	*/
	public function _setMapId($mapId) {
		$this->_mapId = $mapId;
	}
	/**
	* sets the value of $_mapId
	*
	* @param mapId
	* @return object ( this class)
	*/
	public function setMapId($mapId) {
		$this->_setMapId($mapId);
		return $this;
	}
	
	
	/**
	* private class variable $_shipmentId
	*/
	private $_shipmentId;
	
	/**
	* returns the value of $shipmentId
	*
	* @return object(int|string) shipmentId
	*/
	public function _getShipmentId() {
		return $this->_shipmentId;
	}
	
	/**
	* sets the value of $_shipmentId
	*
	* @param shipmentId
	*/
	public function _setShipmentId($shipmentId) {
		$this->_shipmentId = $shipmentId;
	}
	/**
	* sets the value of $_shipmentId
	*
	* @param shipmentId
	* @return object ( this class)
	*/
	public function setShipmentId($shipmentId) {
		$this->_setShipmentId($shipmentId);
		return $this;
	}
	
	
	/**
	* private class variable $_participantId
	*/
	private $_participantId;
	
	/**
	* returns the value of $participantId
	*
	* @return object(int|string) participantId
	*/
	public function _getParticipantId() {
		return $this->_participantId;
	}
	
	/**
	* sets the value of $_participantId
	*
	* @param participantId
	*/
	public function _setParticipantId($participantId) {
		$this->_participantId = $participantId;
	}
	/**
	* sets the value of $_participantId
	*
	* @param participantId
	* @return object ( this class)
	*/
	public function setParticipantId($participantId) {
		$this->_setParticipantId($participantId);
		return $this;
	}
	
	
	/**
	* private class variable $_attributes
	*/
	private $_attributes;
	
	/**
	* returns the value of $attributes
	*
	* @return object(int|string) attributes
	*/
	public function _getAttributes() {
		return $this->_attributes;
	}
	
	/**
	* sets the value of $_attributes
	*
	* @param attributes
	*/
	public function _setAttributes($attributes) {
		$this->_attributes = $attributes;
	}
	/**
	* sets the value of $_attributes
	*
	* @param attributes
	* @return object ( this class)
	*/
	public function setAttributes($attributes) {
		$this->_setAttributes($attributes);
		return $this;
	}
	
	
	/**
	* private class variable $_evaluationStatus
	*/
	private $_evaluationStatus;
	
	/**
	* returns the value of $evaluationStatus
	*
	* @return object(int|string) evaluationStatus
	*/
	public function _getEvaluationStatus() {
		return $this->_evaluationStatus;
	}
	
	/**
	* sets the value of $_evaluationStatus
	*
	* @param evaluationStatus
	*/
	public function _setEvaluationStatus($evaluationStatus) {
		$this->_evaluationStatus = $evaluationStatus;
	}
	/**
	* sets the value of $_evaluationStatus
	*
	* @param evaluationStatus
	* @return object ( this class)
	*/
	public function setEvaluationStatus($evaluationStatus) {
		$this->_setEvaluationStatus($evaluationStatus);
		return $this;
	}
	
	
	/**
	* private class variable $_shipmentScore
	*/
	private $_shipmentScore;
	
	/**
	* returns the value of $shipmentScore
	*
	* @return object(int|string) shipmentScore
	*/
	public function _getShipmentScore() {
		return $this->_shipmentScore;
	}
	
	/**
	* sets the value of $_shipmentScore
	*
	* @param shipmentScore
	*/
	public function _setShipmentScore($shipmentScore) {
		$this->_shipmentScore = $shipmentScore;
	}
	/**
	* sets the value of $_shipmentScore
	*
	* @param shipmentScore
	* @return object ( this class)
	*/
	public function setShipmentScore($shipmentScore) {
		$this->_setShipmentScore($shipmentScore);
		return $this;
	}
	
	
	/**
	* private class variable $_documentationScore
	*/
	private $_documentationScore;
	
	/**
	* returns the value of $documentationScore
	*
	* @return object(int|string) documentationScore
	*/
	public function _getDocumentationScore() {
		return $this->_documentationScore;
	}
	
	/**
	* sets the value of $_documentationScore
	*
	* @param documentationScore
	*/
	public function _setDocumentationScore($documentationScore) {
		$this->_documentationScore = $documentationScore;
	}
	/**
	* sets the value of $_documentationScore
	*
	* @param documentationScore
	* @return object ( this class)
	*/
	public function setDocumentationScore($documentationScore) {
		$this->_setDocumentationScore($documentationScore);
		return $this;
	}
	
	
	/**
	* private class variable $_shipmentTestDate
	*/
	private $_shipmentTestDate;
	
	/**
	* returns the value of $shipmentTestDate
	*
	* @return object(int|string) shipmentTestDate
	*/
	public function _getShipmentTestDate() {
		return $this->_shipmentTestDate;
	}
	
	/**
	* sets the value of $_shipmentTestDate
	*
	* @param shipmentTestDate
	*/
	public function _setShipmentTestDate($shipmentTestDate) {
		$this->_shipmentTestDate = $shipmentTestDate;
	}
	/**
	* sets the value of $_shipmentTestDate
	*
	* @param shipmentTestDate
	* @return object ( this class)
	*/
	public function setShipmentTestDate($shipmentTestDate) {
		$this->_setShipmentTestDate($shipmentTestDate);
		return $this;
	}
	
	
	/**
	* private class variable $_shipmentReceiptDate
	*/
	private $_shipmentReceiptDate;
	
	/**
	* returns the value of $shipmentReceiptDate
	*
	* @return object(int|string) shipmentReceiptDate
	*/
	public function _getShipmentReceiptDate() {
		return $this->_shipmentReceiptDate;
	}
	
	/**
	* sets the value of $_shipmentReceiptDate
	*
	* @param shipmentReceiptDate
	*/
	public function _setShipmentReceiptDate($shipmentReceiptDate) {
		$this->_shipmentReceiptDate = $shipmentReceiptDate;
	}
	/**
	* sets the value of $_shipmentReceiptDate
	*
	* @param shipmentReceiptDate
	* @return object ( this class)
	*/
	public function setShipmentReceiptDate($shipmentReceiptDate) {
		$this->_setShipmentReceiptDate($shipmentReceiptDate);
		return $this;
	}
	
	
	/**
	* private class variable $_shipmentTestReportDate
	*/
	private $_shipmentTestReportDate;
	
	/**
	* returns the value of $shipmentTestReportDate
	*
	* @return object(int|string) shipmentTestReportDate
	*/
	public function _getShipmentTestReportDate() {
		return $this->_shipmentTestReportDate;
	}
	
	/**
	* sets the value of $_shipmentTestReportDate
	*
	* @param shipmentTestReportDate
	*/
	public function _setShipmentTestReportDate($shipmentTestReportDate) {
		$this->_shipmentTestReportDate = $shipmentTestReportDate;
	}
	/**
	* sets the value of $_shipmentTestReportDate
	*
	* @param shipmentTestReportDate
	* @return object ( this class)
	*/
	public function setShipmentTestReportDate($shipmentTestReportDate) {
		$this->_setShipmentTestReportDate($shipmentTestReportDate);
		return $this;
	}
	
	
	/**
	* private class variable $_participantSupervisor
	*/
	private $_participantSupervisor;
	
	/**
	* returns the value of $participantSupervisor
	*
	* @return object(int|string) participantSupervisor
	*/
	public function _getParticipantSupervisor() {
		return $this->_participantSupervisor;
	}
	
	/**
	* sets the value of $_participantSupervisor
	*
	* @param participantSupervisor
	*/
	public function _setParticipantSupervisor($participantSupervisor) {
		$this->_participantSupervisor = $participantSupervisor;
	}
	/**
	* sets the value of $_participantSupervisor
	*
	* @param participantSupervisor
	* @return object ( this class)
	*/
	public function setParticipantSupervisor($participantSupervisor) {
		$this->_setParticipantSupervisor($participantSupervisor);
		return $this;
	}
	
	
	/**
	* private class variable $_supervisorApproval
	*/
	private $_supervisorApproval;
	
	/**
	* returns the value of $supervisorApproval
	*
	* @return object(int|string) supervisorApproval
	*/
	public function _getSupervisorApproval() {
		return $this->_supervisorApproval;
	}
	
	/**
	* sets the value of $_supervisorApproval
	*
	* @param supervisorApproval
	*/
	public function _setSupervisorApproval($supervisorApproval) {
		$this->_supervisorApproval = $supervisorApproval;
	}
	/**
	* sets the value of $_supervisorApproval
	*
	* @param supervisorApproval
	* @return object ( this class)
	*/
	public function setSupervisorApproval($supervisorApproval) {
		$this->_setSupervisorApproval($supervisorApproval);
		return $this;
	}
	
	
	/**
	* private class variable $_reviewDate
	*/
	private $_reviewDate;
	
	/**
	* returns the value of $reviewDate
	*
	* @return object(int|string) reviewDate
	*/
	public function _getReviewDate() {
		return $this->_reviewDate;
	}
	
	/**
	* sets the value of $_reviewDate
	*
	* @param reviewDate
	*/
	public function _setReviewDate($reviewDate) {
		$this->_reviewDate = $reviewDate;
	}
	/**
	* sets the value of $_reviewDate
	*
	* @param reviewDate
	* @return object ( this class)
	*/
	public function setReviewDate($reviewDate) {
		$this->_setReviewDate($reviewDate);
		return $this;
	}
	
	
	/**
	* private class variable $_finalResult
	*/
	private $_finalResult;
	
	/**
	* returns the value of $finalResult
	*
	* @return object(int|string) finalResult
	*/
	public function _getFinalResult() {
		return $this->_finalResult;
	}
	
	/**
	* sets the value of $_finalResult
	*
	* @param finalResult
	*/
	public function _setFinalResult($finalResult) {
		$this->_finalResult = $finalResult;
	}
	/**
	* sets the value of $_finalResult
	*
	* @param finalResult
	* @return object ( this class)
	*/
	public function setFinalResult($finalResult) {
		$this->_setFinalResult($finalResult);
		return $this;
	}
	
	
	/**
	* private class variable $_failureReason
	*/
	private $_failureReason;
	
	/**
	* returns the value of $failureReason
	*
	* @return object(int|string) failureReason
	*/
	public function _getFailureReason() {
		return $this->_failureReason;
	}
	
	/**
	* sets the value of $_failureReason
	*
	* @param failureReason
	*/
	public function _setFailureReason($failureReason) {
		$this->_failureReason = $failureReason;
	}
	/**
	* sets the value of $_failureReason
	*
	* @param failureReason
	* @return object ( this class)
	*/
	public function setFailureReason($failureReason) {
		$this->_setFailureReason($failureReason);
		return $this;
	}
	
	
	/**
	* private class variable $_evaluationComment
	*/
	private $_evaluationComment;
	
	/**
	* returns the value of $evaluationComment
	*
	* @return object(int|string) evaluationComment
	*/
	public function _getEvaluationComment() {
		return $this->_evaluationComment;
	}
	
	/**
	* sets the value of $_evaluationComment
	*
	* @param evaluationComment
	*/
	public function _setEvaluationComment($evaluationComment) {
		$this->_evaluationComment = $evaluationComment;
	}
	/**
	* sets the value of $_evaluationComment
	*
	* @param evaluationComment
	* @return object ( this class)
	*/
	public function setEvaluationComment($evaluationComment) {
		$this->_setEvaluationComment($evaluationComment);
		return $this;
	}
	
	
	/**
	* private class variable $_optionalEvalComment
	*/
	private $_optionalEvalComment;
	
	/**
	* returns the value of $optionalEvalComment
	*
	* @return object(int|string) optionalEvalComment
	*/
	public function _getOptionalEvalComment() {
		return $this->_optionalEvalComment;
	}
	
	/**
	* sets the value of $_optionalEvalComment
	*
	* @param optionalEvalComment
	*/
	public function _setOptionalEvalComment($optionalEvalComment) {
		$this->_optionalEvalComment = $optionalEvalComment;
	}
	/**
	* sets the value of $_optionalEvalComment
	*
	* @param optionalEvalComment
	* @return object ( this class)
	*/
	public function setOptionalEvalComment($optionalEvalComment) {
		$this->_setOptionalEvalComment($optionalEvalComment);
		return $this;
	}
	
	
	/**
	* private class variable $_isFollowup
	*/
	private $_isFollowup;
	
	/**
	* returns the value of $isFollowup
	*
	* @return object(int|string) isFollowup
	*/
	public function _getIsFollowup() {
		return $this->_isFollowup;
	}
	
	/**
	* sets the value of $_isFollowup
	*
	* @param isFollowup
	*/
	public function _setIsFollowup($isFollowup) {
		$this->_isFollowup = $isFollowup;
	}
	/**
	* sets the value of $_isFollowup
	*
	* @param isFollowup
	* @return object ( this class)
	*/
	public function setIsFollowup($isFollowup) {
		$this->_setIsFollowup($isFollowup);
		return $this;
	}
	
	
	/**
	* private class variable $_isExcluded
	*/
	private $_isExcluded;
	
	/**
	* returns the value of $isExcluded
	*
	* @return object(int|string) isExcluded
	*/
	public function _getIsExcluded() {
		return $this->_isExcluded;
	}
	
	/**
	* sets the value of $_isExcluded
	*
	* @param isExcluded
	*/
	public function _setIsExcluded($isExcluded) {
		$this->_isExcluded = $isExcluded;
	}
	/**
	* sets the value of $_isExcluded
	*
	* @param isExcluded
	* @return object ( this class)
	*/
	public function setIsExcluded($isExcluded) {
		$this->_setIsExcluded($isExcluded);
		return $this;
	}
	
	
	/**
	* private class variable $_userComment
	*/
	private $_userComment;
	
	/**
	* returns the value of $userComment
	*
	* @return object(int|string) userComment
	*/
	public function _getUserComment() {
		return $this->_userComment;
	}
	
	/**
	* sets the value of $_userComment
	*
	* @param userComment
	*/
	public function _setUserComment($userComment) {
		$this->_userComment = $userComment;
	}
	/**
	* sets the value of $_userComment
	*
	* @param userComment
	* @return object ( this class)
	*/
	public function setUserComment($userComment) {
		$this->_setUserComment($userComment);
		return $this;
	}
	
	
	/**
	* private class variable $_customField1
	*/
	private $_customField1;
	
	/**
	* returns the value of $customField1
	*
	* @return object(int|string) customField1
	*/
	public function _getCustomField1() {
		return $this->_customField1;
	}
	
	/**
	* sets the value of $_customField1
	*
	* @param customField1
	*/
	public function _setCustomField1($customField1) {
		$this->_customField1 = $customField1;
	}
	/**
	* sets the value of $_customField1
	*
	* @param customField1
	* @return object ( this class)
	*/
	public function setCustomField1($customField1) {
		$this->_setCustomField1($customField1);
		return $this;
	}
	
	
	/**
	* private class variable $_customField2
	*/
	private $_customField2;
	
	/**
	* returns the value of $customField2
	*
	* @return object(int|string) customField2
	*/
	public function _getCustomField2() {
		return $this->_customField2;
	}
	
	/**
	* sets the value of $_customField2
	*
	* @param customField2
	*/
	public function _setCustomField2($customField2) {
		$this->_customField2 = $customField2;
	}
	/**
	* sets the value of $_customField2
	*
	* @param customField2
	* @return object ( this class)
	*/
	public function setCustomField2($customField2) {
		$this->_setCustomField2($customField2);
		return $this;
	}
	
	
	/**
	* private class variable $_createdOnAdmin
	*/
	private $_createdOnAdmin;
	
	/**
	* returns the value of $createdOnAdmin
	*
	* @return object(int|string) createdOnAdmin
	*/
	public function _getCreatedOnAdmin() {
		return $this->_createdOnAdmin;
	}
	
	/**
	* sets the value of $_createdOnAdmin
	*
	* @param createdOnAdmin
	*/
	public function _setCreatedOnAdmin($createdOnAdmin) {
		$this->_createdOnAdmin = $createdOnAdmin;
	}
	/**
	* sets the value of $_createdOnAdmin
	*
	* @param createdOnAdmin
	* @return object ( this class)
	*/
	public function setCreatedOnAdmin($createdOnAdmin) {
		$this->_setCreatedOnAdmin($createdOnAdmin);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedOnAdmin
	*/
	private $_updatedOnAdmin;
	
	/**
	* returns the value of $updatedOnAdmin
	*
	* @return object(int|string) updatedOnAdmin
	*/
	public function _getUpdatedOnAdmin() {
		return $this->_updatedOnAdmin;
	}
	
	/**
	* sets the value of $_updatedOnAdmin
	*
	* @param updatedOnAdmin
	*/
	public function _setUpdatedOnAdmin($updatedOnAdmin) {
		$this->_updatedOnAdmin = $updatedOnAdmin;
	}
	/**
	* sets the value of $_updatedOnAdmin
	*
	* @param updatedOnAdmin
	* @return object ( this class)
	*/
	public function setUpdatedOnAdmin($updatedOnAdmin) {
		$this->_setUpdatedOnAdmin($updatedOnAdmin);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedByAdmin
	*/
	private $_updatedByAdmin;
	
	/**
	* returns the value of $updatedByAdmin
	*
	* @return object(int|string) updatedByAdmin
	*/
	public function _getUpdatedByAdmin() {
		return $this->_updatedByAdmin;
	}
	
	/**
	* sets the value of $_updatedByAdmin
	*
	* @param updatedByAdmin
	*/
	public function _setUpdatedByAdmin($updatedByAdmin) {
		$this->_updatedByAdmin = $updatedByAdmin;
	}
	/**
	* sets the value of $_updatedByAdmin
	*
	* @param updatedByAdmin
	* @return object ( this class)
	*/
	public function setUpdatedByAdmin($updatedByAdmin) {
		$this->_setUpdatedByAdmin($updatedByAdmin);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedOnUser
	*/
	private $_updatedOnUser;
	
	/**
	* returns the value of $updatedOnUser
	*
	* @return object(int|string) updatedOnUser
	*/
	public function _getUpdatedOnUser() {
		return $this->_updatedOnUser;
	}
	
	/**
	* sets the value of $_updatedOnUser
	*
	* @param updatedOnUser
	*/
	public function _setUpdatedOnUser($updatedOnUser) {
		$this->_updatedOnUser = $updatedOnUser;
	}
	/**
	* sets the value of $_updatedOnUser
	*
	* @param updatedOnUser
	* @return object ( this class)
	*/
	public function setUpdatedOnUser($updatedOnUser) {
		$this->_setUpdatedOnUser($updatedOnUser);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedByUser
	*/
	private $_updatedByUser;
	
	/**
	* returns the value of $updatedByUser
	*
	* @return object(int|string) updatedByUser
	*/
	public function _getUpdatedByUser() {
		return $this->_updatedByUser;
	}
	
	/**
	* sets the value of $_updatedByUser
	*
	* @param updatedByUser
	*/
	public function _setUpdatedByUser($updatedByUser) {
		$this->_updatedByUser = $updatedByUser;
	}
	/**
	* sets the value of $_updatedByUser
	*
	* @param updatedByUser
	* @return object ( this class)
	*/
	public function setUpdatedByUser($updatedByUser) {
		$this->_setUpdatedByUser($updatedByUser);
		return $this;
	}
	
	
	/**
	* private class variable $_createdByAdmin
	*/
	private $_createdByAdmin;
	
	/**
	* returns the value of $createdByAdmin
	*
	* @return object(int|string) createdByAdmin
	*/
	public function _getCreatedByAdmin() {
		return $this->_createdByAdmin;
	}
	
	/**
	* sets the value of $_createdByAdmin
	*
	* @param createdByAdmin
	*/
	public function _setCreatedByAdmin($createdByAdmin) {
		$this->_createdByAdmin = $createdByAdmin;
	}
	/**
	* sets the value of $_createdByAdmin
	*
	* @param createdByAdmin
	* @return object ( this class)
	*/
	public function setCreatedByAdmin($createdByAdmin) {
		$this->_setCreatedByAdmin($createdByAdmin);
		return $this;
	}
	
	
	/**
	* private class variable $_createdOnUser
	*/
	private $_createdOnUser;
	
	/**
	* returns the value of $createdOnUser
	*
	* @return object(int|string) createdOnUser
	*/
	public function _getCreatedOnUser() {
		return $this->_createdOnUser;
	}
	
	/**
	* sets the value of $_createdOnUser
	*
	* @param createdOnUser
	*/
	public function _setCreatedOnUser($createdOnUser) {
		$this->_createdOnUser = $createdOnUser;
	}
	/**
	* sets the value of $_createdOnUser
	*
	* @param createdOnUser
	* @return object ( this class)
	*/
	public function setCreatedOnUser($createdOnUser) {
		$this->_setCreatedOnUser($createdOnUser);
		return $this;
	}
	
	
	/**
	* private class variable $_reportGenerated
	*/
	private $_reportGenerated;
	
	/**
	* returns the value of $reportGenerated
	*
	* @return object(int|string) reportGenerated
	*/
	public function _getReportGenerated() {
		return $this->_reportGenerated;
	}
	
	/**
	* sets the value of $_reportGenerated
	*
	* @param reportGenerated
	*/
	public function _setReportGenerated($reportGenerated) {
		$this->_reportGenerated = $reportGenerated;
	}
	/**
	* sets the value of $_reportGenerated
	*
	* @param reportGenerated
	* @return object ( this class)
	*/
	public function setReportGenerated($reportGenerated) {
		$this->_setReportGenerated($reportGenerated);
		return $this;
	}
	
	
	/**
	* private class variable $_lastNewShipmentMailedOn
	*/
	private $_lastNewShipmentMailedOn;
	
	/**
	* returns the value of $lastNewShipmentMailedOn
	*
	* @return object(int|string) lastNewShipmentMailedOn
	*/
	public function _getLastNewShipmentMailedOn() {
		return $this->_lastNewShipmentMailedOn;
	}
	
	/**
	* sets the value of $_lastNewShipmentMailedOn
	*
	* @param lastNewShipmentMailedOn
	*/
	public function _setLastNewShipmentMailedOn($lastNewShipmentMailedOn) {
		$this->_lastNewShipmentMailedOn = $lastNewShipmentMailedOn;
	}
	/**
	* sets the value of $_lastNewShipmentMailedOn
	*
	* @param lastNewShipmentMailedOn
	* @return object ( this class)
	*/
	public function setLastNewShipmentMailedOn($lastNewShipmentMailedOn) {
		$this->_setLastNewShipmentMailedOn($lastNewShipmentMailedOn);
		return $this;
	}
	
	
	/**
	* private class variable $_newShipmentMailCount
	*/
	private $_newShipmentMailCount;
	
	/**
	* returns the value of $newShipmentMailCount
	*
	* @return object(int|string) newShipmentMailCount
	*/
	public function _getNewShipmentMailCount() {
		return $this->_newShipmentMailCount;
	}
	
	/**
	* sets the value of $_newShipmentMailCount
	*
	* @param newShipmentMailCount
	*/
	public function _setNewShipmentMailCount($newShipmentMailCount) {
		$this->_newShipmentMailCount = $newShipmentMailCount;
	}
	/**
	* sets the value of $_newShipmentMailCount
	*
	* @param newShipmentMailCount
	* @return object ( this class)
	*/
	public function setNewShipmentMailCount($newShipmentMailCount) {
		$this->_setNewShipmentMailCount($newShipmentMailCount);
		return $this;
	}
	
	
	/**
	* private class variable $_lastNotParticipatedMailedOn
	*/
	private $_lastNotParticipatedMailedOn;
	
	/**
	* returns the value of $lastNotParticipatedMailedOn
	*
	* @return object(int|string) lastNotParticipatedMailedOn
	*/
	public function _getLastNotParticipatedMailedOn() {
		return $this->_lastNotParticipatedMailedOn;
	}
	
	/**
	* sets the value of $_lastNotParticipatedMailedOn
	*
	* @param lastNotParticipatedMailedOn
	*/
	public function _setLastNotParticipatedMailedOn($lastNotParticipatedMailedOn) {
		$this->_lastNotParticipatedMailedOn = $lastNotParticipatedMailedOn;
	}
	/**
	* sets the value of $_lastNotParticipatedMailedOn
	*
	* @param lastNotParticipatedMailedOn
	* @return object ( this class)
	*/
	public function setLastNotParticipatedMailedOn($lastNotParticipatedMailedOn) {
		$this->_setLastNotParticipatedMailedOn($lastNotParticipatedMailedOn);
		return $this;
	}
	
	
	/**
	* private class variable $_lastNotParticipatedMailCount
	*/
	private $_lastNotParticipatedMailCount;
	
	/**
	* returns the value of $lastNotParticipatedMailCount
	*
	* @return object(int|string) lastNotParticipatedMailCount
	*/
	public function _getLastNotParticipatedMailCount() {
		return $this->_lastNotParticipatedMailCount;
	}
	
	/**
	* sets the value of $_lastNotParticipatedMailCount
	*
	* @param lastNotParticipatedMailCount
	*/
	public function _setLastNotParticipatedMailCount($lastNotParticipatedMailCount) {
		$this->_lastNotParticipatedMailCount = $lastNotParticipatedMailCount;
	}
	/**
	* sets the value of $_lastNotParticipatedMailCount
	*
	* @param lastNotParticipatedMailCount
	* @return object ( this class)
	*/
	public function setLastNotParticipatedMailCount($lastNotParticipatedMailCount) {
		$this->_setLastNotParticipatedMailCount($lastNotParticipatedMailCount);
		return $this;
	}
	
	
	/**
	* private class variable $_qcDate
	*/
	private $_qcDate;
	
	/**
	* returns the value of $qcDate
	*
	* @return object(int|string) qcDate
	*/
	public function _getQcDate() {
		return $this->_qcDate;
	}
	
	/**
	* sets the value of $_qcDate
	*
	* @param qcDate
	*/
	public function _setQcDate($qcDate) {
		$this->_qcDate = $qcDate;
	}
	/**
	* sets the value of $_qcDate
	*
	* @param qcDate
	* @return object ( this class)
	*/
	public function setQcDate($qcDate) {
		$this->_setQcDate($qcDate);
		return $this;
	}
	
	
	/**
	* private class variable $_qcDoneBy
	*/
	private $_qcDoneBy;
	
	/**
	* returns the value of $qcDoneBy
	*
	* @return object(int|string) qcDoneBy
	*/
	public function _getQcDoneBy() {
		return $this->_qcDoneBy;
	}
	
	/**
	* sets the value of $_qcDoneBy
	*
	* @param qcDoneBy
	*/
	public function _setQcDoneBy($qcDoneBy) {
		$this->_qcDoneBy = $qcDoneBy;
	}
	/**
	* sets the value of $_qcDoneBy
	*
	* @param qcDoneBy
	* @return object ( this class)
	*/
	public function setQcDoneBy($qcDoneBy) {
		$this->_setQcDoneBy($qcDoneBy);
		return $this;
	}
	
	
	/**
	* private class variable $_qcCreatedOn
	*/
	private $_qcCreatedOn;
	
	/**
	* returns the value of $qcCreatedOn
	*
	* @return object(int|string) qcCreatedOn
	*/
	public function _getQcCreatedOn() {
		return $this->_qcCreatedOn;
	}
	
	/**
	* sets the value of $_qcCreatedOn
	*
	* @param qcCreatedOn
	*/
	public function _setQcCreatedOn($qcCreatedOn) {
		$this->_qcCreatedOn = $qcCreatedOn;
	}
	/**
	* sets the value of $_qcCreatedOn
	*
	* @param qcCreatedOn
	* @return object ( this class)
	*/
	public function setQcCreatedOn($qcCreatedOn) {
		$this->_setQcCreatedOn($qcCreatedOn);
		return $this;
	}
	
	
	/**
	* private class variable $_modeId
	*/
	private $_modeId;
	
	/**
	* returns the value of $modeId
	*
	* @return object(int|string) modeId
	*/
	public function _getModeId() {
		return $this->_modeId;
	}
	
	/**
	* sets the value of $_modeId
	*
	* @param modeId
	*/
	public function _setModeId($modeId) {
		$this->_modeId = $modeId;
	}
	/**
	* sets the value of $_modeId
	*
	* @param modeId
	* @return object ( this class)
	*/
	public function setModeId($modeId) {
		$this->_setModeId($modeId);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of map_id 
     * based on the value of $map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id passed to the function
     *
     * @param $map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id
     * @return object (map_id)| null
     */
	public function getMapId($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id) {
		$columns = array ('map_id','shipment_id','participant_id','attributes','evaluation_status','shipment_score','documentation_score','shipment_test_date','shipment_receipt_date','shipment_test_report_date','participant_supervisor','supervisor_approval','review_date','final_result','failure_reason','evaluation_comment','optional_eval_comment','is_followup','is_excluded','user_comment','custom_field_1','custom_field_2','created_on_admin','updated_on_admin','updated_by_admin','updated_on_user','updated_by_user','created_by_admin','created_on_user','report_generated','last_new_shipment_mailed_on','new_shipment_mail_count','last_not_participated_mailed_on','last_not_participated_mail_count','qc_date','qc_done_by','qc_created_on','mode_id');
		$records = array ($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id);
		$map_id_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($map_id_)>0 ? $map_id_ [0] ['map_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_id 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (shipment_id)| null
     */
	public function getShipmentId($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$shipment_id_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($shipment_id_)>0 ? $shipment_id_ [0] ['shipment_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of participant_id 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (participant_id)| null
     */
	public function getParticipantId($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$participant_id_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($participant_id_)>0 ? $participant_id_ [0] ['participant_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of attributes 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (attributes)| null
     */
	public function getAttributes($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$attributes_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($attributes_)>0 ? $attributes_ [0] ['attributes'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of evaluation_status 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (evaluation_status)| null
     */
	public function getEvaluationStatus($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$evaluation_status_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($evaluation_status_)>0 ? $evaluation_status_ [0] ['evaluation_status'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_score 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (shipment_score)| null
     */
	public function getShipmentScore($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$shipment_score_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($shipment_score_)>0 ? $shipment_score_ [0] ['shipment_score'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of documentation_score 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (documentation_score)| null
     */
	public function getDocumentationScore($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$documentation_score_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($documentation_score_)>0 ? $documentation_score_ [0] ['documentation_score'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_test_date 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (shipment_test_date)| null
     */
	public function getShipmentTestDate($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$shipment_test_date_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($shipment_test_date_)>0 ? $shipment_test_date_ [0] ['shipment_test_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_receipt_date 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (shipment_receipt_date)| null
     */
	public function getShipmentReceiptDate($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$shipment_receipt_date_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($shipment_receipt_date_)>0 ? $shipment_receipt_date_ [0] ['shipment_receipt_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_test_report_date 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (shipment_test_report_date)| null
     */
	public function getShipmentTestReportDate($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$shipment_test_report_date_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($shipment_test_report_date_)>0 ? $shipment_test_report_date_ [0] ['shipment_test_report_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of participant_supervisor 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (participant_supervisor)| null
     */
	public function getParticipantSupervisor($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$participant_supervisor_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($participant_supervisor_)>0 ? $participant_supervisor_ [0] ['participant_supervisor'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of supervisor_approval 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (supervisor_approval)| null
     */
	public function getSupervisorApproval($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$supervisor_approval_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($supervisor_approval_)>0 ? $supervisor_approval_ [0] ['supervisor_approval'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of review_date 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (review_date)| null
     */
	public function getReviewDate($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$review_date_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($review_date_)>0 ? $review_date_ [0] ['review_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of final_result 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (final_result)| null
     */
	public function getFinalResult($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$final_result_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($final_result_)>0 ? $final_result_ [0] ['final_result'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of failure_reason 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (failure_reason)| null
     */
	public function getFailureReason($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$failure_reason_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($failure_reason_)>0 ? $failure_reason_ [0] ['failure_reason'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of evaluation_comment 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (evaluation_comment)| null
     */
	public function getEvaluationComment($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$evaluation_comment_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($evaluation_comment_)>0 ? $evaluation_comment_ [0] ['evaluation_comment'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of optional_eval_comment 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (optional_eval_comment)| null
     */
	public function getOptionalEvalComment($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$optional_eval_comment_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($optional_eval_comment_)>0 ? $optional_eval_comment_ [0] ['optional_eval_comment'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of is_followup 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (is_followup)| null
     */
	public function getIsFollowup($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$is_followup_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($is_followup_)>0 ? $is_followup_ [0] ['is_followup'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of is_excluded 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (is_excluded)| null
     */
	public function getIsExcluded($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$is_excluded_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($is_excluded_)>0 ? $is_excluded_ [0] ['is_excluded'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of user_comment 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (user_comment)| null
     */
	public function getUserComment($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$user_comment_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($user_comment_)>0 ? $user_comment_ [0] ['user_comment'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of custom_field_1 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (custom_field_1)| null
     */
	public function getCustomField1($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$custom_field_1_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($custom_field_1_)>0 ? $custom_field_1_ [0] ['custom_field_1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of custom_field_2 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (custom_field_2)| null
     */
	public function getCustomField2($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$custom_field_2_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($custom_field_2_)>0 ? $custom_field_2_ [0] ['custom_field_2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on_admin 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (created_on_admin)| null
     */
	public function getCreatedOnAdmin($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$created_on_admin_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($created_on_admin_)>0 ? $created_on_admin_ [0] ['created_on_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on_admin 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (updated_on_admin)| null
     */
	public function getUpdatedOnAdmin($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$updated_on_admin_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($updated_on_admin_)>0 ? $updated_on_admin_ [0] ['updated_on_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by_admin 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (updated_by_admin)| null
     */
	public function getUpdatedByAdmin($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$updated_by_admin_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($updated_by_admin_)>0 ? $updated_by_admin_ [0] ['updated_by_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on_user 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (updated_on_user)| null
     */
	public function getUpdatedOnUser($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$updated_on_user_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($updated_on_user_)>0 ? $updated_on_user_ [0] ['updated_on_user'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by_user 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (updated_by_user)| null
     */
	public function getUpdatedByUser($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$updated_by_user_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($updated_by_user_)>0 ? $updated_by_user_ [0] ['updated_by_user'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_by_admin 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (created_by_admin)| null
     */
	public function getCreatedByAdmin($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$created_by_admin_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($created_by_admin_)>0 ? $created_by_admin_ [0] ['created_by_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on_user 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (created_on_user)| null
     */
	public function getCreatedOnUser($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$created_on_user_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($created_on_user_)>0 ? $created_on_user_ [0] ['created_on_user'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of report_generated 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (report_generated)| null
     */
	public function getReportGenerated($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$report_generated_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($report_generated_)>0 ? $report_generated_ [0] ['report_generated'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of last_new_shipment_mailed_on 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (last_new_shipment_mailed_on)| null
     */
	public function getLastNewShipmentMailedOn($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$last_new_shipment_mailed_on_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($last_new_shipment_mailed_on_)>0 ? $last_new_shipment_mailed_on_ [0] ['last_new_shipment_mailed_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of new_shipment_mail_count 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (new_shipment_mail_count)| null
     */
	public function getNewShipmentMailCount($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$new_shipment_mail_count_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($new_shipment_mail_count_)>0 ? $new_shipment_mail_count_ [0] ['new_shipment_mail_count'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of last_not_participated_mailed_on 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (last_not_participated_mailed_on)| null
     */
	public function getLastNotParticipatedMailedOn($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$last_not_participated_mailed_on_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($last_not_participated_mailed_on_)>0 ? $last_not_participated_mailed_on_ [0] ['last_not_participated_mailed_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of last_not_participated_mail_count 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (last_not_participated_mail_count)| null
     */
	public function getLastNotParticipatedMailCount($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$last_not_participated_mail_count_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($last_not_participated_mail_count_)>0 ? $last_not_participated_mail_count_ [0] ['last_not_participated_mail_count'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of qc_date 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (qc_date)| null
     */
	public function getQcDate($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$qc_date_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($qc_date_)>0 ? $qc_date_ [0] ['qc_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of qc_done_by 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (qc_done_by)| null
     */
	public function getQcDoneBy($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$qc_done_by_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($qc_done_by_)>0 ? $qc_done_by_ [0] ['qc_done_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of qc_created_on 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (qc_created_on)| null
     */
	public function getQcCreatedOn($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$qc_created_on_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($qc_created_on_)>0 ? $qc_created_on_ [0] ['qc_created_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mode_id 
     * based on the value of $map_id passed to the function
     *
     * @param $map_id
     * @return object (mode_id)| null
     */
	public function getModeId($map_id) {
		$columns = array ('map_id');
		$records = array ($map_id);
		$mode_id_ = $this->query_from_shipment_participant_map ( $columns, $records );
		return sizeof($mode_id_)>0 ? $mode_id_ [0] ['mode_id'] : null;
	}
	

	
	   /**
	* Inserts data into the table[shipment_participant_map] in the order below
	* array ('map_id','shipment_id','participant_id','attributes','evaluation_status','shipment_score','documentation_score','shipment_test_date','shipment_receipt_date','shipment_test_report_date','participant_supervisor','supervisor_approval','review_date','final_result','failure_reason','evaluation_comment','optional_eval_comment','is_followup','is_excluded','user_comment','custom_field_1','custom_field_2','created_on_admin','updated_on_admin','updated_by_admin','updated_on_user','updated_by_user','created_by_admin','created_on_user','report_generated','last_new_shipment_mailed_on','new_shipment_mail_count','last_not_participated_mailed_on','last_not_participated_mail_count','qc_date','qc_done_by','qc_created_on','mode_id')
	* is mapped into
	* array ($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id,$redundancy_check= false, $printSQL = false) {
		$columns = array('map_id','shipment_id','participant_id','attributes','evaluation_status','shipment_score','documentation_score','shipment_test_date','shipment_receipt_date','shipment_test_report_date','participant_supervisor','supervisor_approval','review_date','final_result','failure_reason','evaluation_comment','optional_eval_comment','is_followup','is_excluded','user_comment','custom_field_1','custom_field_2','created_on_admin','updated_on_admin','updated_by_admin','updated_on_user','updated_by_user','created_by_admin','created_on_user','report_generated','last_new_shipment_mailed_on','new_shipment_mail_count','last_not_participated_mailed_on','last_not_participated_mail_count','qc_date','qc_done_by','qc_created_on','mode_id');
		$records = array($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id);
		return $this->insert_records_to_shipment_participant_map ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[shipment_participant_map] in the order below
    * array ('map_id','shipment_id','participant_id','attributes','evaluation_status','shipment_score','documentation_score','shipment_test_date','shipment_receipt_date','shipment_test_report_date','participant_supervisor','supervisor_approval','review_date','final_result','failure_reason','evaluation_comment','optional_eval_comment','is_followup','is_excluded','user_comment','custom_field_1','custom_field_2','created_on_admin','updated_on_admin','updated_by_admin','updated_on_user','updated_by_user','created_by_admin','created_on_user','report_generated','last_new_shipment_mailed_on','new_shipment_mail_count','last_not_participated_mailed_on','last_not_participated_mail_count','qc_date','qc_done_by','qc_created_on','mode_id')
    * is mapped into
    * array ($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id, $printSQL = false) {
    	$columns = array('map_id','shipment_id','participant_id','attributes','evaluation_status','shipment_score','documentation_score','shipment_test_date','shipment_receipt_date','shipment_test_report_date','participant_supervisor','supervisor_approval','review_date','final_result','failure_reason','evaluation_comment','optional_eval_comment','is_followup','is_excluded','user_comment','custom_field_1','custom_field_2','created_on_admin','updated_on_admin','updated_by_admin','updated_on_user','updated_by_user','created_by_admin','created_on_user','report_generated','last_new_shipment_mailed_on','new_shipment_mail_count','last_not_participated_mailed_on','last_not_participated_mail_count','qc_date','qc_done_by','qc_created_on','mode_id');
    	$records = array($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id);
    	return $this->delete_record_from_shipment_participant_map( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'shipment_participant_map' 
	*/
	public static function get_table() {
		return 'shipment_participant_map';
	}
	
	/**
	* This action represents the intended database transaction
	*
	* @return string the set action.
	*/
	private function get_action() {
		return $this->action;
	}
	
	/**
	* Returns the client doing transactions
	*
	* @return string the client
	*/
	private function get_client() {
		return $this->client;
	}
	
	/**
     * Used  to calculate the number of times a record exists in the table shipment_participant_map
     * It returns the number of times a record exists exists in the table shipment_participant_map
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table shipment_participant_map
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_shipment_participant_map(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
		return $this->insert_records ( $this->get_table (), $columns, $records,$redundancy_check, $printSQL );
	}
	/**
         * Inserts records in a relation
         * The records are inserted in the relation columns in the order they are arranged in the array
         *
         * @param $records
         * @param bool $printSQL
         * @return bool|mysqli_result
         * @throws NullabilityException
         */
        public function insert_raw($records, $printSQL = false)
        {
            return $this->get_database_utils()->insert_raw_records($this->get_table(), $records, $printSQL);
        }
	/**
	 * Deletes all the records that meets the passed criteria from the table shipment_participant_map
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_shipment_participant_map(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table shipment_participant_map
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_shipment_participant_map(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'shipment_participant_map' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_shipment_participant_map($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table shipment_participant_map that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_shipment_participant_map(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table shipment_participant_map that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_shipment_participant_map(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table shipment_participant_map that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_shipment_participant_map(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
		return $this->search ( $this->get_table (), $columns, $records,$extraSQL, $printSQL );
	}
	
	/**
	* Get Database Utils
	*  
	* @return DatabaseUtils $this->databaseUtils
	*/
	public function get_database_utils() {
		return $this->databaseUtils;
	}
	
	
	/**
	 * Deletes all the records that meets the passed criteria from the table [shipment_participant_map]
	 *
	 * @param $table
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return bool|int|\mysqli_result number of deleted rows
	* @throws InvalidColumnValueMatchException
    * @throws NullabilityException
	 */
	private function delete_record($table, Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->delete_record ( $table, $columns, $records, $printSQL );
	}
	
	
	/**
     * Inserts data into the table shipment_participant_map
     *
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     * @param $table
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return bool|mixed|\mysqli_result the number of times the record exists
   * @throws NullabilityException
     */
	private function insert_records($table, Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
		if($redundancy_check){
			if($this->is_exists($columns, $records) == 0){
				return $this->get_database_utils ()->insert_records ( $table, $columns, $records, $printSQL );
			} else return $this->is_exists($columns, $records);
		}else{
			return $this->get_database_utils ()->insert_records ( $table, $columns, $records, $printSQL );
		}
		
	}
	
	/**
     * Updates all the records that meets the passed criteria from the table shipment_participant_map
     * @param $table
     * @param array $columns
     * @param array $records
     * @param array $where_columns
     * @param array $where_records
     * @param bool $printSQL
     * @return bool|\mysqli_result number of updated rows
   * @throws NullabilityException
     */
	private function update_record($table, Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->get_database_utils ()->update_record ( $table, $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
     * Gets an Associative array of the records in the table shipment_participant_map that meets the passed criteria
     * associative array of the records that are found after performing the query
     * @param $distinct
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array|null
    * @throws InvalidColumnValueMatchException
   * @throws NullabilityException
     */
	private function fetch_assoc($distinct, $table, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->get_database_utils ()->fetch_assoc ( $distinct, $table, $columns, $records,$extraSQL, $printSQL );
	}
	
	 /**
     * Gets an Associative array of the records in the table shipment_participant_map  that meets the passed criteria
     *
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array
     */
	private function query($table, Array $columns, Array $records,$extraSQL="",$printSQL = false) {
		return $this->get_database_utils ()->query ( $table, $columns, $records,$extraSQL, $printSQL );
	}
	/**
     * Gets an Associative array of the records in the table shipment_participant_map that meets the distinct passed criteria
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array
     */
	private function query_distinct($table, Array $columns, Array $records,$extraSQL="",$printSQL = false) {
		return $this->get_database_utils ()->query_distinct ( $table, $columns, $records,$extraSQL, $printSQL );
	}
	
	 /**
     * Performs a search and returns an associative array of the records in the table shipment_participant_map  that meets the passed criteria
     * 
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array|null
    * @throws InvalidColumnValueMatchException
   * @throws NullabilityException
     */
	private function search($table, Array $columns, Array $records,$extraSQL="", $printSQL = false) {
		return $this->get_database_utils ()->search ( $table, $columns, $records, $extraSQL, $printSQL );
	}
}
?>
