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
* Shipment
*  
* Low level class for manipulating the data in the table shipment
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class Shipment {

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
	* private class variable $_shipmentCode
	*/
	private $_shipmentCode;
	
	/**
	* returns the value of $shipmentCode
	*
	* @return object(int|string) shipmentCode
	*/
	public function _getShipmentCode() {
		return $this->_shipmentCode;
	}
	
	/**
	* sets the value of $_shipmentCode
	*
	* @param shipmentCode
	*/
	public function _setShipmentCode($shipmentCode) {
		$this->_shipmentCode = $shipmentCode;
	}
	/**
	* sets the value of $_shipmentCode
	*
	* @param shipmentCode
	* @return object ( this class)
	*/
	public function setShipmentCode($shipmentCode) {
		$this->_setShipmentCode($shipmentCode);
		return $this;
	}
	
	
	/**
	* private class variable $_schemeType
	*/
	private $_schemeType;
	
	/**
	* returns the value of $schemeType
	*
	* @return object(int|string) schemeType
	*/
	public function _getSchemeType() {
		return $this->_schemeType;
	}
	
	/**
	* sets the value of $_schemeType
	*
	* @param schemeType
	*/
	public function _setSchemeType($schemeType) {
		$this->_schemeType = $schemeType;
	}
	/**
	* sets the value of $_schemeType
	*
	* @param schemeType
	* @return object ( this class)
	*/
	public function setSchemeType($schemeType) {
		$this->_setSchemeType($schemeType);
		return $this;
	}
	
	
	/**
	* private class variable $_shipmentDate
	*/
	private $_shipmentDate;
	
	/**
	* returns the value of $shipmentDate
	*
	* @return object(int|string) shipmentDate
	*/
	public function _getShipmentDate() {
		return $this->_shipmentDate;
	}
	
	/**
	* sets the value of $_shipmentDate
	*
	* @param shipmentDate
	*/
	public function _setShipmentDate($shipmentDate) {
		$this->_shipmentDate = $shipmentDate;
	}
	/**
	* sets the value of $_shipmentDate
	*
	* @param shipmentDate
	* @return object ( this class)
	*/
	public function setShipmentDate($shipmentDate) {
		$this->_setShipmentDate($shipmentDate);
		return $this;
	}
	
	
	/**
	* private class variable $_lastdateResponse
	*/
	private $_lastdateResponse;
	
	/**
	* returns the value of $lastdateResponse
	*
	* @return object(int|string) lastdateResponse
	*/
	public function _getLastdateResponse() {
		return $this->_lastdateResponse;
	}
	
	/**
	* sets the value of $_lastdateResponse
	*
	* @param lastdateResponse
	*/
	public function _setLastdateResponse($lastdateResponse) {
		$this->_lastdateResponse = $lastdateResponse;
	}
	/**
	* sets the value of $_lastdateResponse
	*
	* @param lastdateResponse
	* @return object ( this class)
	*/
	public function setLastdateResponse($lastdateResponse) {
		$this->_setLastdateResponse($lastdateResponse);
		return $this;
	}
	
	
	/**
	* private class variable $_distributionId
	*/
	private $_distributionId;
	
	/**
	* returns the value of $distributionId
	*
	* @return object(int|string) distributionId
	*/
	public function _getDistributionId() {
		return $this->_distributionId;
	}
	
	/**
	* sets the value of $_distributionId
	*
	* @param distributionId
	*/
	public function _setDistributionId($distributionId) {
		$this->_distributionId = $distributionId;
	}
	/**
	* sets the value of $_distributionId
	*
	* @param distributionId
	* @return object ( this class)
	*/
	public function setDistributionId($distributionId) {
		$this->_setDistributionId($distributionId);
		return $this;
	}
	
	
	/**
	* private class variable $_numberOfSamples
	*/
	private $_numberOfSamples;
	
	/**
	* returns the value of $numberOfSamples
	*
	* @return object(int|string) numberOfSamples
	*/
	public function _getNumberOfSamples() {
		return $this->_numberOfSamples;
	}
	
	/**
	* sets the value of $_numberOfSamples
	*
	* @param numberOfSamples
	*/
	public function _setNumberOfSamples($numberOfSamples) {
		$this->_numberOfSamples = $numberOfSamples;
	}
	/**
	* sets the value of $_numberOfSamples
	*
	* @param numberOfSamples
	* @return object ( this class)
	*/
	public function setNumberOfSamples($numberOfSamples) {
		$this->_setNumberOfSamples($numberOfSamples);
		return $this;
	}
	
	
	/**
	* private class variable $_numberOfControls
	*/
	private $_numberOfControls;
	
	/**
	* returns the value of $numberOfControls
	*
	* @return object(int|string) numberOfControls
	*/
	public function _getNumberOfControls() {
		return $this->_numberOfControls;
	}
	
	/**
	* sets the value of $_numberOfControls
	*
	* @param numberOfControls
	*/
	public function _setNumberOfControls($numberOfControls) {
		$this->_numberOfControls = $numberOfControls;
	}
	/**
	* sets the value of $_numberOfControls
	*
	* @param numberOfControls
	* @return object ( this class)
	*/
	public function setNumberOfControls($numberOfControls) {
		$this->_setNumberOfControls($numberOfControls);
		return $this;
	}
	
	
	/**
	* private class variable $_responseSwitch
	*/
	private $_responseSwitch;
	
	/**
	* returns the value of $responseSwitch
	*
	* @return object(int|string) responseSwitch
	*/
	public function _getResponseSwitch() {
		return $this->_responseSwitch;
	}
	
	/**
	* sets the value of $_responseSwitch
	*
	* @param responseSwitch
	*/
	public function _setResponseSwitch($responseSwitch) {
		$this->_responseSwitch = $responseSwitch;
	}
	/**
	* sets the value of $_responseSwitch
	*
	* @param responseSwitch
	* @return object ( this class)
	*/
	public function setResponseSwitch($responseSwitch) {
		$this->_setResponseSwitch($responseSwitch);
		return $this;
	}
	
	
	/**
	* private class variable $_maxScore
	*/
	private $_maxScore;
	
	/**
	* returns the value of $maxScore
	*
	* @return object(int|string) maxScore
	*/
	public function _getMaxScore() {
		return $this->_maxScore;
	}
	
	/**
	* sets the value of $_maxScore
	*
	* @param maxScore
	*/
	public function _setMaxScore($maxScore) {
		$this->_maxScore = $maxScore;
	}
	/**
	* sets the value of $_maxScore
	*
	* @param maxScore
	* @return object ( this class)
	*/
	public function setMaxScore($maxScore) {
		$this->_setMaxScore($maxScore);
		return $this;
	}
	
	
	/**
	* private class variable $_averageScore
	*/
	private $_averageScore;
	
	/**
	* returns the value of $averageScore
	*
	* @return object(int|string) averageScore
	*/
	public function _getAverageScore() {
		return $this->_averageScore;
	}
	
	/**
	* sets the value of $_averageScore
	*
	* @param averageScore
	*/
	public function _setAverageScore($averageScore) {
		$this->_averageScore = $averageScore;
	}
	/**
	* sets the value of $_averageScore
	*
	* @param averageScore
	* @return object ( this class)
	*/
	public function setAverageScore($averageScore) {
		$this->_setAverageScore($averageScore);
		return $this;
	}
	
	
	/**
	* private class variable $_shipmentComment
	*/
	private $_shipmentComment;
	
	/**
	* returns the value of $shipmentComment
	*
	* @return object(int|string) shipmentComment
	*/
	public function _getShipmentComment() {
		return $this->_shipmentComment;
	}
	
	/**
	* sets the value of $_shipmentComment
	*
	* @param shipmentComment
	*/
	public function _setShipmentComment($shipmentComment) {
		$this->_shipmentComment = $shipmentComment;
	}
	/**
	* sets the value of $_shipmentComment
	*
	* @param shipmentComment
	* @return object ( this class)
	*/
	public function setShipmentComment($shipmentComment) {
		$this->_setShipmentComment($shipmentComment);
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
	* private class variable $_status
	*/
	private $_status;
	
	/**
	* returns the value of $status
	*
	* @return object(int|string) status
	*/
	public function _getStatus() {
		return $this->_status;
	}
	
	/**
	* sets the value of $_status
	*
	* @param status
	*/
	public function _setStatus($status) {
		$this->_status = $status;
	}
	/**
	* sets the value of $_status
	*
	* @param status
	* @return object ( this class)
	*/
	public function setStatus($status) {
		$this->_setStatus($status);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of shipment_id 
     * based on the value of $shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status passed to the function
     *
     * @param $shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status
     * @return object (shipment_id)| null
     */
	public function getShipmentId($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status) {
		$columns = array ('shipment_id','shipment_code','scheme_type','shipment_date','lastdate_response','distribution_id','number_of_samples','number_of_controls','response_switch','max_score','average_score','shipment_comment','created_by_admin','created_on_admin','updated_by_admin','updated_on_admin','status');
		$records = array ($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status);
		$shipment_id_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($shipment_id_)>0 ? $shipment_id_ [0] ['shipment_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_code 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (shipment_code)| null
     */
	public function getShipmentCode($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$shipment_code_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($shipment_code_)>0 ? $shipment_code_ [0] ['shipment_code'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of scheme_type 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (scheme_type)| null
     */
	public function getSchemeType($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$scheme_type_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($scheme_type_)>0 ? $scheme_type_ [0] ['scheme_type'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_date 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (shipment_date)| null
     */
	public function getShipmentDate($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$shipment_date_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($shipment_date_)>0 ? $shipment_date_ [0] ['shipment_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lastdate_response 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (lastdate_response)| null
     */
	public function getLastdateResponse($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$lastdate_response_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($lastdate_response_)>0 ? $lastdate_response_ [0] ['lastdate_response'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of distribution_id 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (distribution_id)| null
     */
	public function getDistributionId($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$distribution_id_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($distribution_id_)>0 ? $distribution_id_ [0] ['distribution_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of number_of_samples 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (number_of_samples)| null
     */
	public function getNumberOfSamples($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$number_of_samples_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($number_of_samples_)>0 ? $number_of_samples_ [0] ['number_of_samples'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of number_of_controls 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (number_of_controls)| null
     */
	public function getNumberOfControls($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$number_of_controls_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($number_of_controls_)>0 ? $number_of_controls_ [0] ['number_of_controls'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of response_switch 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (response_switch)| null
     */
	public function getResponseSwitch($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$response_switch_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($response_switch_)>0 ? $response_switch_ [0] ['response_switch'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of max_score 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (max_score)| null
     */
	public function getMaxScore($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$max_score_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($max_score_)>0 ? $max_score_ [0] ['max_score'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of average_score 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (average_score)| null
     */
	public function getAverageScore($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$average_score_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($average_score_)>0 ? $average_score_ [0] ['average_score'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_comment 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (shipment_comment)| null
     */
	public function getShipmentComment($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$shipment_comment_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($shipment_comment_)>0 ? $shipment_comment_ [0] ['shipment_comment'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_by_admin 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (created_by_admin)| null
     */
	public function getCreatedByAdmin($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$created_by_admin_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($created_by_admin_)>0 ? $created_by_admin_ [0] ['created_by_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on_admin 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (created_on_admin)| null
     */
	public function getCreatedOnAdmin($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$created_on_admin_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($created_on_admin_)>0 ? $created_on_admin_ [0] ['created_on_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by_admin 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (updated_by_admin)| null
     */
	public function getUpdatedByAdmin($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$updated_by_admin_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($updated_by_admin_)>0 ? $updated_by_admin_ [0] ['updated_by_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on_admin 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (updated_on_admin)| null
     */
	public function getUpdatedOnAdmin($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$updated_on_admin_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($updated_on_admin_)>0 ? $updated_on_admin_ [0] ['updated_on_admin'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of status 
     * based on the value of $shipment_id passed to the function
     *
     * @param $shipment_id
     * @return object (status)| null
     */
	public function getStatus($shipment_id) {
		$columns = array ('shipment_id');
		$records = array ($shipment_id);
		$status_ = $this->query_from_shipment ( $columns, $records );
		return sizeof($status_)>0 ? $status_ [0] ['status'] : null;
	}
	

	
	   /**
	* Inserts data into the table[shipment] in the order below
	* array ('shipment_id','shipment_code','scheme_type','shipment_date','lastdate_response','distribution_id','number_of_samples','number_of_controls','response_switch','max_score','average_score','shipment_comment','created_by_admin','created_on_admin','updated_by_admin','updated_on_admin','status')
	* is mapped into
	* array ($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('shipment_id','shipment_code','scheme_type','shipment_date','lastdate_response','distribution_id','number_of_samples','number_of_controls','response_switch','max_score','average_score','shipment_comment','created_by_admin','created_on_admin','updated_by_admin','updated_on_admin','status');
		$records = array($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status);
		return $this->insert_records_to_shipment ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[shipment] in the order below
    * array ('shipment_id','shipment_code','scheme_type','shipment_date','lastdate_response','distribution_id','number_of_samples','number_of_controls','response_switch','max_score','average_score','shipment_comment','created_by_admin','created_on_admin','updated_by_admin','updated_on_admin','status')
    * is mapped into
    * array ($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status, $printSQL = false) {
    	$columns = array('shipment_id','shipment_code','scheme_type','shipment_date','lastdate_response','distribution_id','number_of_samples','number_of_controls','response_switch','max_score','average_score','shipment_comment','created_by_admin','created_on_admin','updated_by_admin','updated_on_admin','status');
    	$records = array($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status);
    	return $this->delete_record_from_shipment( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'shipment' 
	*/
	public static function get_table() {
		return 'shipment';
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
     * Used  to calculate the number of times a record exists in the table shipment
     * It returns the number of times a record exists exists in the table shipment
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table shipment
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_shipment(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table shipment
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_shipment(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table shipment
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_shipment(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'shipment' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_shipment($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table shipment that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_shipment(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table shipment that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_shipment(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table shipment that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_shipment(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [shipment]
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
     * Inserts data into the table shipment
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
     * Updates all the records that meets the passed criteria from the table shipment
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
     * Gets an Associative array of the records in the table shipment that meets the passed criteria
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
     * Gets an Associative array of the records in the table shipment  that meets the passed criteria
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
     * Gets an Associative array of the records in the table shipment that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table shipment  that meets the passed criteria
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
