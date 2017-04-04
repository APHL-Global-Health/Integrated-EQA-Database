<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:46  09/12/2016
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
* RepRepository
*  
* Low level class for manipulating the data in the table rep_repository
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RepRepository {

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
	* private class variable $_impID
	*/
	private $_impID;
	
	/**
	* returns the value of $impID
	*
	* @return object(int|string) impID
	*/
	public function _getImpID() {
		return $this->_impID;
	}
	
	/**
	* sets the value of $_impID
	*
	* @param impID
	*/
	public function _setImpID($impID) {
		$this->_impID = $impID;
	}
	/**
	* sets the value of $_impID
	*
	* @param impID
	* @return object ( this class)
	*/
	public function setImpID($impID) {
		$this->_setImpID($impID);
		return $this;
	}
	
	
	/**
	* private class variable $_providerID
	*/
	private $_providerID;
	
	/**
	* returns the value of $providerID
	*
	* @return object(int|string) providerID
	*/
	public function _getProviderID() {
		return $this->_providerID;
	}
	
	/**
	* sets the value of $_providerID
	*
	* @param providerID
	*/
	public function _setProviderID($providerID) {
		$this->_providerID = $providerID;
	}
	/**
	* sets the value of $_providerID
	*
	* @param providerID
	* @return object ( this class)
	*/
	public function setProviderID($providerID) {
		$this->_setProviderID($providerID);
		return $this;
	}
	
	
	/**
	* private class variable $_labID
	*/
	private $_labID;
	
	/**
	* returns the value of $labID
	*
	* @return object(int|string) labID
	*/
	public function _getLabID() {
		return $this->_labID;
	}
	
	/**
	* sets the value of $_labID
	*
	* @param labID
	*/
	public function _setLabID($labID) {
		$this->_labID = $labID;
	}
	/**
	* sets the value of $_labID
	*
	* @param labID
	* @return object ( this class)
	*/
	public function setLabID($labID) {
		$this->_setLabID($labID);
		return $this;
	}
	
	
	/**
	* private class variable $_roundID
	*/
	private $_roundID;
	
	/**
	* returns the value of $roundID
	*
	* @return object(int|string) roundID
	*/
	public function _getRoundID() {
		return $this->_roundID;
	}
	
	/**
	* sets the value of $_roundID
	*
	* @param roundID
	*/
	public function _setRoundID($roundID) {
		$this->_roundID = $roundID;
	}
	/**
	* sets the value of $_roundID
	*
	* @param roundID
	* @return object ( this class)
	*/
	public function setRoundID($roundID) {
		$this->_setRoundID($roundID);
		return $this;
	}
	
	
	/**
	* private class variable $_programID
	*/
	private $_programID;
	
	/**
	* returns the value of $programID
	*
	* @return object(int|string) programID
	*/
	public function _getProgramID() {
		return $this->_programID;
	}
	
	/**
	* sets the value of $_programID
	*
	* @param programID
	*/
	public function _setProgramID($programID) {
		$this->_programID = $programID;
	}
	/**
	* sets the value of $_programID
	*
	* @param programID
	* @return object ( this class)
	*/
	public function setProgramID($programID) {
		$this->_setProgramID($programID);
		return $this;
	}
	
	
	/**
	* private class variable $_releaseDate
	*/
	private $_releaseDate;
	
	/**
	* returns the value of $releaseDate
	*
	* @return object(int|string) releaseDate
	*/
	public function _getReleaseDate() {
		return $this->_releaseDate;
	}
	
	/**
	* sets the value of $_releaseDate
	*
	* @param releaseDate
	*/
	public function _setReleaseDate($releaseDate) {
		$this->_releaseDate = $releaseDate;
	}
	/**
	* sets the value of $_releaseDate
	*
	* @param releaseDate
	* @return object ( this class)
	*/
	public function setReleaseDate($releaseDate) {
		$this->_setReleaseDate($releaseDate);
		return $this;
	}
	
	
	/**
	* private class variable $_sampleCode
	*/
	private $_sampleCode;
	
	/**
	* returns the value of $sampleCode
	*
	* @return object(int|string) sampleCode
	*/
	public function _getSampleCode() {
		return $this->_sampleCode;
	}
	
	/**
	* sets the value of $_sampleCode
	*
	* @param sampleCode
	*/
	public function _setSampleCode($sampleCode) {
		$this->_sampleCode = $sampleCode;
	}
	/**
	* sets the value of $_sampleCode
	*
	* @param sampleCode
	* @return object ( this class)
	*/
	public function setSampleCode($sampleCode) {
		$this->_setSampleCode($sampleCode);
		return $this;
	}
	
	
	/**
	* private class variable $_analyteID
	*/
	private $_analyteID;
	
	/**
	* returns the value of $analyteID
	*
	* @return object(int|string) analyteID
	*/
	public function _getAnalyteID() {
		return $this->_analyteID;
	}
	
	/**
	* sets the value of $_analyteID
	*
	* @param analyteID
	*/
	public function _setAnalyteID($analyteID) {
		$this->_analyteID = $analyteID;
	}
	/**
	* sets the value of $_analyteID
	*
	* @param analyteID
	* @return object ( this class)
	*/
	public function setAnalyteID($analyteID) {
		$this->_setAnalyteID($analyteID);
		return $this;
	}
	
	
	/**
	* private class variable $_sampleCondition
	*/
	private $_sampleCondition;
	
	/**
	* returns the value of $sampleCondition
	*
	* @return object(int|string) sampleCondition
	*/
	public function _getSampleCondition() {
		return $this->_sampleCondition;
	}
	
	/**
	* sets the value of $_sampleCondition
	*
	* @param sampleCondition
	*/
	public function _setSampleCondition($sampleCondition) {
		$this->_sampleCondition = $sampleCondition;
	}
	/**
	* sets the value of $_sampleCondition
	*
	* @param sampleCondition
	* @return object ( this class)
	*/
	public function setSampleCondition($sampleCondition) {
		$this->_setSampleCondition($sampleCondition);
		return $this;
	}
	
	
	/**
	* private class variable $_dateSampleReceived
	*/
	private $_dateSampleReceived;
	
	/**
	* returns the value of $dateSampleReceived
	*
	* @return object(int|string) dateSampleReceived
	*/
	public function _getDateSampleReceived() {
		return $this->_dateSampleReceived;
	}
	
	/**
	* sets the value of $_dateSampleReceived
	*
	* @param dateSampleReceived
	*/
	public function _setDateSampleReceived($dateSampleReceived) {
		$this->_dateSampleReceived = $dateSampleReceived;
	}
	/**
	* sets the value of $_dateSampleReceived
	*
	* @param dateSampleReceived
	* @return object ( this class)
	*/
	public function setDateSampleReceived($dateSampleReceived) {
		$this->_setDateSampleReceived($dateSampleReceived);
		return $this;
	}
	
	
	/**
	* private class variable $_result
	*/
	private $_result;
	
	/**
	* returns the value of $result
	*
	* @return object(int|string) result
	*/
	public function _getResult() {
		return $this->_result;
	}
	
	/**
	* sets the value of $_result
	*
	* @param result
	*/
	public function _setResult($result) {
		$this->_result = $result;
	}
	/**
	* sets the value of $_result
	*
	* @param result
	* @return object ( this class)
	*/
	public function setResult($result) {
		$this->_setResult($result);
		return $this;
	}
	
	
	/**
	* private class variable $_resultCode
	*/
	private $_resultCode;
	
	/**
	* returns the value of $resultCode
	*
	* @return object(int|string) resultCode
	*/
	public function _getResultCode() {
		return $this->_resultCode;
	}
	
	/**
	* sets the value of $_resultCode
	*
	* @param resultCode
	*/
	public function _setResultCode($resultCode) {
		$this->_resultCode = $resultCode;
	}
	/**
	* sets the value of $_resultCode
	*
	* @param resultCode
	* @return object ( this class)
	*/
	public function setResultCode($resultCode) {
		$this->_setResultCode($resultCode);
		return $this;
	}
	
	
	/**
	* private class variable $_grade
	*/
	private $_grade;
	
	/**
	* returns the value of $grade
	*
	* @return object(int|string) grade
	*/
	public function _getGrade() {
		return $this->_grade;
	}
	
	/**
	* sets the value of $_grade
	*
	* @param grade
	*/
	public function _setGrade($grade) {
		$this->_grade = $grade;
	}
	/**
	* sets the value of $_grade
	*
	* @param grade
	* @return object ( this class)
	*/
	public function setGrade($grade) {
		$this->_setGrade($grade);
		return $this;
	}
	
	
	/**
	* private class variable $_testKitID
	*/
	private $_testKitID;
	
	/**
	* returns the value of $testKitID
	*
	* @return object(int|string) testKitID
	*/
	public function _getTestKitID() {
		return $this->_testKitID;
	}
	
	/**
	* sets the value of $_testKitID
	*
	* @param testKitID
	*/
	public function _setTestKitID($testKitID) {
		$this->_testKitID = $testKitID;
	}
	/**
	* sets the value of $_testKitID
	*
	* @param testKitID
	* @return object ( this class)
	*/
	public function setTestKitID($testKitID) {
		$this->_setTestKitID($testKitID);
		return $this;
	}
	
	
	/**
	* private class variable $_dateSampleShipped
	*/
	private $_dateSampleShipped;
	
	/**
	* returns the value of $dateSampleShipped
	*
	* @return object(int|string) dateSampleShipped
	*/
	public function _getDateSampleShipped() {
		return $this->_dateSampleShipped;
	}
	
	/**
	* sets the value of $_dateSampleShipped
	*
	* @param dateSampleShipped
	*/
	public function _setDateSampleShipped($dateSampleShipped) {
		$this->_dateSampleShipped = $dateSampleShipped;
	}
	/**
	* sets the value of $_dateSampleShipped
	*
	* @param dateSampleShipped
	* @return object ( this class)
	*/
	public function setDateSampleShipped($dateSampleShipped) {
		$this->_setDateSampleShipped($dateSampleShipped);
		return $this;
	}
	
	
	/**
	* private class variable $_failReasonCode
	*/
	private $_failReasonCode;
	
	/**
	* returns the value of $failReasonCode
	*
	* @return object(int|string) failReasonCode
	*/
	public function _getFailReasonCode() {
		return $this->_failReasonCode;
	}
	
	/**
	* sets the value of $_failReasonCode
	*
	* @param failReasonCode
	*/
	public function _setFailReasonCode($failReasonCode) {
		$this->_failReasonCode = $failReasonCode;
	}
	/**
	* sets the value of $_failReasonCode
	*
	* @param failReasonCode
	* @return object ( this class)
	*/
	public function setFailReasonCode($failReasonCode) {
		$this->_setFailReasonCode($failReasonCode);
		return $this;
	}
	
	
	/**
	* private class variable $_frequency
	*/
	private $_frequency;
	
	/**
	* returns the value of $frequency
	*
	* @return object(int|string) frequency
	*/
	public function _getFrequency() {
		return $this->_frequency;
	}
	
	/**
	* sets the value of $_frequency
	*
	* @param frequency
	*/
	public function _setFrequency($frequency) {
		$this->_frequency = $frequency;
	}
	/**
	* sets the value of $_frequency
	*
	* @param frequency
	* @return object ( this class)
	*/
	public function setFrequency($frequency) {
		$this->_setFrequency($frequency);
		return $this;
	}
	
	
	/**
	* private class variable $_stCount
	*/
	private $_stCount;
	
	/**
	* returns the value of $stCount
	*
	* @return object(int|string) stCount
	*/
	public function _getStCount() {
		return $this->_stCount;
	}
	
	/**
	* sets the value of $_stCount
	*
	* @param stCount
	*/
	public function _setStCount($stCount) {
		$this->_stCount = $stCount;
	}
	/**
	* sets the value of $_stCount
	*
	* @param stCount
	* @return object ( this class)
	*/
	public function setStCount($stCount) {
		$this->_setStCount($stCount);
		return $this;
	}
	
	
	/**
	* private class variable $_tragetValue
	*/
	private $_tragetValue;
	
	/**
	* returns the value of $tragetValue
	*
	* @return object(int|string) tragetValue
	*/
	public function _getTragetValue() {
		return $this->_tragetValue;
	}
	
	/**
	* sets the value of $_tragetValue
	*
	* @param tragetValue
	*/
	public function _setTragetValue($tragetValue) {
		$this->_tragetValue = $tragetValue;
	}
	/**
	* sets the value of $_tragetValue
	*
	* @param tragetValue
	* @return object ( this class)
	*/
	public function setTragetValue($tragetValue) {
		$this->_setTragetValue($tragetValue);
		return $this;
	}
	
	
	/**
	* private class variable $_upperLimit
	*/
	private $_upperLimit;
	
	/**
	* returns the value of $upperLimit
	*
	* @return object(int|string) upperLimit
	*/
	public function _getUpperLimit() {
		return $this->_upperLimit;
	}
	
	/**
	* sets the value of $_upperLimit
	*
	* @param upperLimit
	*/
	public function _setUpperLimit($upperLimit) {
		$this->_upperLimit = $upperLimit;
	}
	/**
	* sets the value of $_upperLimit
	*
	* @param upperLimit
	* @return object ( this class)
	*/
	public function setUpperLimit($upperLimit) {
		$this->_setUpperLimit($upperLimit);
		return $this;
	}
	
	
	/**
	* private class variable $_lowerLimit
	*/
	private $_lowerLimit;
	
	/**
	* returns the value of $lowerLimit
	*
	* @return object(int|string) lowerLimit
	*/
	public function _getLowerLimit() {
		return $this->_lowerLimit;
	}
	
	/**
	* sets the value of $_lowerLimit
	*
	* @param lowerLimit
	*/
	public function _setLowerLimit($lowerLimit) {
		$this->_lowerLimit = $lowerLimit;
	}
	/**
	* sets the value of $_lowerLimit
	*
	* @param lowerLimit
	* @return object ( this class)
	*/
	public function setLowerLimit($lowerLimit) {
		$this->_setLowerLimit($lowerLimit);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of ImpID 
     * based on the value of $ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit passed to the function
     *
     * @param $ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit
     * @return object (ImpID)| null
     */
	public function getImpID($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit) {
		$columns = array ('ImpID','ProviderID','LabID','RoundID','ProgramID','ReleaseDate','SampleCode','AnalyteID','SampleCondition','DateSampleReceived','Result','ResultCode','Grade','TestKitID','DateSampleShipped','FailReasonCode','Frequency','StCount','TragetValue','UpperLimit','LowerLimit');
		$records = array ($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit);
		$ImpID_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($ImpID_)>0 ? $ImpID_ [0] ['ImpID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ProviderID 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (ProviderID)| null
     */
	public function getProviderID($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$ProviderID_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($ProviderID_)>0 ? $ProviderID_ [0] ['ProviderID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of LabID 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (LabID)| null
     */
	public function getLabID($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$LabID_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($LabID_)>0 ? $LabID_ [0] ['LabID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of RoundID 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (RoundID)| null
     */
	public function getRoundID($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$RoundID_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($RoundID_)>0 ? $RoundID_ [0] ['RoundID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ProgramID 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (ProgramID)| null
     */
	public function getProgramID($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$ProgramID_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($ProgramID_)>0 ? $ProgramID_ [0] ['ProgramID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ReleaseDate 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (ReleaseDate)| null
     */
	public function getReleaseDate($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$ReleaseDate_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($ReleaseDate_)>0 ? $ReleaseDate_ [0] ['ReleaseDate'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of SampleCode 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (SampleCode)| null
     */
	public function getSampleCode($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$SampleCode_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($SampleCode_)>0 ? $SampleCode_ [0] ['SampleCode'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of AnalyteID 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (AnalyteID)| null
     */
	public function getAnalyteID($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$AnalyteID_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($AnalyteID_)>0 ? $AnalyteID_ [0] ['AnalyteID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of SampleCondition 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (SampleCondition)| null
     */
	public function getSampleCondition($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$SampleCondition_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($SampleCondition_)>0 ? $SampleCondition_ [0] ['SampleCondition'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of DateSampleReceived 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (DateSampleReceived)| null
     */
	public function getDateSampleReceived($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$DateSampleReceived_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($DateSampleReceived_)>0 ? $DateSampleReceived_ [0] ['DateSampleReceived'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Result 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (Result)| null
     */
	public function getResult($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$Result_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($Result_)>0 ? $Result_ [0] ['Result'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ResultCode 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (ResultCode)| null
     */
	public function getResultCode($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$ResultCode_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($ResultCode_)>0 ? $ResultCode_ [0] ['ResultCode'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Grade 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (Grade)| null
     */
	public function getGrade($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$Grade_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($Grade_)>0 ? $Grade_ [0] ['Grade'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of TestKitID 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (TestKitID)| null
     */
	public function getTestKitID($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$TestKitID_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($TestKitID_)>0 ? $TestKitID_ [0] ['TestKitID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of DateSampleShipped 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (DateSampleShipped)| null
     */
	public function getDateSampleShipped($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$DateSampleShipped_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($DateSampleShipped_)>0 ? $DateSampleShipped_ [0] ['DateSampleShipped'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of FailReasonCode 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (FailReasonCode)| null
     */
	public function getFailReasonCode($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$FailReasonCode_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($FailReasonCode_)>0 ? $FailReasonCode_ [0] ['FailReasonCode'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Frequency 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (Frequency)| null
     */
	public function getFrequency($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$Frequency_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($Frequency_)>0 ? $Frequency_ [0] ['Frequency'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of StCount 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (StCount)| null
     */
	public function getStCount($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$StCount_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($StCount_)>0 ? $StCount_ [0] ['StCount'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of TragetValue 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (TragetValue)| null
     */
	public function getTragetValue($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$TragetValue_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($TragetValue_)>0 ? $TragetValue_ [0] ['TragetValue'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of UpperLimit 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (UpperLimit)| null
     */
	public function getUpperLimit($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$UpperLimit_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($UpperLimit_)>0 ? $UpperLimit_ [0] ['UpperLimit'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of LowerLimit 
     * based on the value of $ImpID passed to the function
     *
     * @param $ImpID
     * @return object (LowerLimit)| null
     */
	public function getLowerLimit($ImpID) {
		$columns = array ('ImpID');
		$records = array ($ImpID);
		$LowerLimit_ = $this->query_from_rep_repository ( $columns, $records );
		return sizeof($LowerLimit_)>0 ? $LowerLimit_ [0] ['LowerLimit'] : null;
	}
	

	
	   /**
	* Inserts data into the table[rep_repository] in the order below
	* array ('ImpID','ProviderID','LabID','RoundID','ProgramID','ReleaseDate','SampleCode','AnalyteID','SampleCondition','DateSampleReceived','Result','ResultCode','Grade','TestKitID','DateSampleShipped','FailReasonCode','Frequency','StCount','TragetValue','UpperLimit','LowerLimit')
	* is mapped into
	* array ($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit,$redundancy_check= false, $printSQL = false) {
		$columns = array('ImpID','ProviderID','LabID','RoundID','ProgramID','ReleaseDate','SampleCode','AnalyteID','SampleCondition','DateSampleReceived','Result','ResultCode','Grade','TestKitID','DateSampleShipped','FailReasonCode','Frequency','StCount','TragetValue','UpperLimit','LowerLimit');
		$records = array($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,'2016-12-01 00:00:00',$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit);
		return $this->insert_records_to_rep_repository ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[rep_repository] in the order below
    * array ('ImpID','ProviderID','LabID','RoundID','ProgramID','ReleaseDate','SampleCode','AnalyteID','SampleCondition','DateSampleReceived','Result','ResultCode','Grade','TestKitID','DateSampleShipped','FailReasonCode','Frequency','StCount','TragetValue','UpperLimit','LowerLimit')
    * is mapped into
    * array ($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit, $printSQL = false) {
    	$columns = array('ImpID','ProviderID','LabID','RoundID','ProgramID','ReleaseDate','SampleCode','AnalyteID','SampleCondition','DateSampleReceived','Result','ResultCode','Grade','TestKitID','DateSampleShipped','FailReasonCode','Frequency','StCount','TragetValue','UpperLimit','LowerLimit');
    	$records = array($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit);
    	return $this->delete_record_from_rep_repository( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'rep_repository' 
	*/
	public static function get_table() {
		return 'rep_repository';
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
     * Used  to calculate the number of times a record exists in the table rep_repository
     * It returns the number of times a record exists exists in the table rep_repository
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table rep_repository
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_rep_repository(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table rep_repository
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_rep_repository(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table rep_repository
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_rep_repository(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'rep_repository' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_rep_repository($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_repository that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_rep_repository(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_repository that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_rep_repository(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table rep_repository that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_rep_repository(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [rep_repository]
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
     * Inserts data into the table rep_repository
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
     * Updates all the records that meets the passed criteria from the table rep_repository
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
     * Gets an Associative array of the records in the table rep_repository that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_repository  that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_repository that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table rep_repository  that meets the passed criteria
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
