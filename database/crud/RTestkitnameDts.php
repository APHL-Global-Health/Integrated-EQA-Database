<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:44  09/12/2016
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
* RTestkitnameDts
*  
* Low level class for manipulating the data in the table r_testkitname_dts
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RTestkitnameDts {

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
	* private class variable $_testKitNameID
	*/
	private $_testKitNameID;
	
	/**
	* returns the value of $testKitNameID
	*
	* @return object(int|string) testKitNameID
	*/
	public function _getTestKitNameID() {
		return $this->_testKitNameID;
	}
	
	/**
	* sets the value of $_testKitNameID
	*
	* @param testKitNameID
	*/
	public function _setTestKitNameID($testKitNameID) {
		$this->_testKitNameID = $testKitNameID;
	}
	/**
	* sets the value of $_testKitNameID
	*
	* @param testKitNameID
	* @return object ( this class)
	*/
	public function setTestKitNameID($testKitNameID) {
		$this->_setTestKitNameID($testKitNameID);
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
	* private class variable $_testKitName
	*/
	private $_testKitName;
	
	/**
	* returns the value of $testKitName
	*
	* @return object(int|string) testKitName
	*/
	public function _getTestKitName() {
		return $this->_testKitName;
	}
	
	/**
	* sets the value of $_testKitName
	*
	* @param testKitName
	*/
	public function _setTestKitName($testKitName) {
		$this->_testKitName = $testKitName;
	}
	/**
	* sets the value of $_testKitName
	*
	* @param testKitName
	* @return object ( this class)
	*/
	public function setTestKitName($testKitName) {
		$this->_setTestKitName($testKitName);
		return $this;
	}
	
	
	/**
	* private class variable $_testKitNameShort
	*/
	private $_testKitNameShort;
	
	/**
	* returns the value of $testKitNameShort
	*
	* @return object(int|string) testKitNameShort
	*/
	public function _getTestKitNameShort() {
		return $this->_testKitNameShort;
	}
	
	/**
	* sets the value of $_testKitNameShort
	*
	* @param testKitNameShort
	*/
	public function _setTestKitNameShort($testKitNameShort) {
		$this->_testKitNameShort = $testKitNameShort;
	}
	/**
	* sets the value of $_testKitNameShort
	*
	* @param testKitNameShort
	* @return object ( this class)
	*/
	public function setTestKitNameShort($testKitNameShort) {
		$this->_setTestKitNameShort($testKitNameShort);
		return $this;
	}
	
	
	/**
	* private class variable $_testKitComments
	*/
	private $_testKitComments;
	
	/**
	* returns the value of $testKitComments
	*
	* @return object(int|string) testKitComments
	*/
	public function _getTestKitComments() {
		return $this->_testKitComments;
	}
	
	/**
	* sets the value of $_testKitComments
	*
	* @param testKitComments
	*/
	public function _setTestKitComments($testKitComments) {
		$this->_testKitComments = $testKitComments;
	}
	/**
	* sets the value of $_testKitComments
	*
	* @param testKitComments
	* @return object ( this class)
	*/
	public function setTestKitComments($testKitComments) {
		$this->_setTestKitComments($testKitComments);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedOn
	*/
	private $_updatedOn;
	
	/**
	* returns the value of $updatedOn
	*
	* @return object(int|string) updatedOn
	*/
	public function _getUpdatedOn() {
		return $this->_updatedOn;
	}
	
	/**
	* sets the value of $_updatedOn
	*
	* @param updatedOn
	*/
	public function _setUpdatedOn($updatedOn) {
		$this->_updatedOn = $updatedOn;
	}
	/**
	* sets the value of $_updatedOn
	*
	* @param updatedOn
	* @return object ( this class)
	*/
	public function setUpdatedOn($updatedOn) {
		$this->_setUpdatedOn($updatedOn);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedBy
	*/
	private $_updatedBy;
	
	/**
	* returns the value of $updatedBy
	*
	* @return object(int|string) updatedBy
	*/
	public function _getUpdatedBy() {
		return $this->_updatedBy;
	}
	
	/**
	* sets the value of $_updatedBy
	*
	* @param updatedBy
	*/
	public function _setUpdatedBy($updatedBy) {
		$this->_updatedBy = $updatedBy;
	}
	/**
	* sets the value of $_updatedBy
	*
	* @param updatedBy
	* @return object ( this class)
	*/
	public function setUpdatedBy($updatedBy) {
		$this->_setUpdatedBy($updatedBy);
		return $this;
	}
	
	
	/**
	* private class variable $_installationId
	*/
	private $_installationId;
	
	/**
	* returns the value of $installationId
	*
	* @return object(int|string) installationId
	*/
	public function _getInstallationId() {
		return $this->_installationId;
	}
	
	/**
	* sets the value of $_installationId
	*
	* @param installationId
	*/
	public function _setInstallationId($installationId) {
		$this->_installationId = $installationId;
	}
	/**
	* sets the value of $_installationId
	*
	* @param installationId
	* @return object ( this class)
	*/
	public function setInstallationId($installationId) {
		$this->_setInstallationId($installationId);
		return $this;
	}
	
	
	/**
	* private class variable $_testKitManufacturer
	*/
	private $_testKitManufacturer;
	
	/**
	* returns the value of $testKitManufacturer
	*
	* @return object(int|string) testKitManufacturer
	*/
	public function _getTestKitManufacturer() {
		return $this->_testKitManufacturer;
	}
	
	/**
	* sets the value of $_testKitManufacturer
	*
	* @param testKitManufacturer
	*/
	public function _setTestKitManufacturer($testKitManufacturer) {
		$this->_testKitManufacturer = $testKitManufacturer;
	}
	/**
	* sets the value of $_testKitManufacturer
	*
	* @param testKitManufacturer
	* @return object ( this class)
	*/
	public function setTestKitManufacturer($testKitManufacturer) {
		$this->_setTestKitManufacturer($testKitManufacturer);
		return $this;
	}
	
	
	/**
	* private class variable $_createdOn
	*/
	private $_createdOn;
	
	/**
	* returns the value of $createdOn
	*
	* @return object(int|string) createdOn
	*/
	public function _getCreatedOn() {
		return $this->_createdOn;
	}
	
	/**
	* sets the value of $_createdOn
	*
	* @param createdOn
	*/
	public function _setCreatedOn($createdOn) {
		$this->_createdOn = $createdOn;
	}
	/**
	* sets the value of $_createdOn
	*
	* @param createdOn
	* @return object ( this class)
	*/
	public function setCreatedOn($createdOn) {
		$this->_setCreatedOn($createdOn);
		return $this;
	}
	
	
	/**
	* private class variable $_createdBy
	*/
	private $_createdBy;
	
	/**
	* returns the value of $createdBy
	*
	* @return object(int|string) createdBy
	*/
	public function _getCreatedBy() {
		return $this->_createdBy;
	}
	
	/**
	* sets the value of $_createdBy
	*
	* @param createdBy
	*/
	public function _setCreatedBy($createdBy) {
		$this->_createdBy = $createdBy;
	}
	/**
	* sets the value of $_createdBy
	*
	* @param createdBy
	* @return object ( this class)
	*/
	public function setCreatedBy($createdBy) {
		$this->_setCreatedBy($createdBy);
		return $this;
	}
	
	
	/**
	* private class variable $_approval
	*/
	private $_approval;
	
	/**
	* returns the value of $approval
	*
	* @return object(int|string) approval
	*/
	public function _getApproval() {
		return $this->_approval;
	}
	
	/**
	* sets the value of $_approval
	*
	* @param approval
	*/
	public function _setApproval($approval) {
		$this->_approval = $approval;
	}
	/**
	* sets the value of $_approval
	*
	* @param approval
	* @return object ( this class)
	*/
	public function setApproval($approval) {
		$this->_setApproval($approval);
		return $this;
	}
	
	
	/**
	* private class variable $_testKitApprovalAgency
	*/
	private $_testKitApprovalAgency;
	
	/**
	* returns the value of $testKitApprovalAgency
	*
	* @return object(int|string) testKitApprovalAgency
	*/
	public function _getTestKitApprovalAgency() {
		return $this->_testKitApprovalAgency;
	}
	
	/**
	* sets the value of $_testKitApprovalAgency
	*
	* @param testKitApprovalAgency
	*/
	public function _setTestKitApprovalAgency($testKitApprovalAgency) {
		$this->_testKitApprovalAgency = $testKitApprovalAgency;
	}
	/**
	* sets the value of $_testKitApprovalAgency
	*
	* @param testKitApprovalAgency
	* @return object ( this class)
	*/
	public function setTestKitApprovalAgency($testKitApprovalAgency) {
		$this->_setTestKitApprovalAgency($testKitApprovalAgency);
		return $this;
	}
	
	
	/**
	* private class variable $_sourceReference
	*/
	private $_sourceReference;
	
	/**
	* returns the value of $sourceReference
	*
	* @return object(int|string) sourceReference
	*/
	public function _getSourceReference() {
		return $this->_sourceReference;
	}
	
	/**
	* sets the value of $_sourceReference
	*
	* @param sourceReference
	*/
	public function _setSourceReference($sourceReference) {
		$this->_sourceReference = $sourceReference;
	}
	/**
	* sets the value of $_sourceReference
	*
	* @param sourceReference
	* @return object ( this class)
	*/
	public function setSourceReference($sourceReference) {
		$this->_setSourceReference($sourceReference);
		return $this;
	}
	
	
	/**
	* private class variable $_countryAdapted
	*/
	private $_countryAdapted;
	
	/**
	* returns the value of $countryAdapted
	*
	* @return object(int|string) countryAdapted
	*/
	public function _getCountryAdapted() {
		return $this->_countryAdapted;
	}
	
	/**
	* sets the value of $_countryAdapted
	*
	* @param countryAdapted
	*/
	public function _setCountryAdapted($countryAdapted) {
		$this->_countryAdapted = $countryAdapted;
	}
	/**
	* sets the value of $_countryAdapted
	*
	* @param countryAdapted
	* @return object ( this class)
	*/
	public function setCountryAdapted($countryAdapted) {
		$this->_setCountryAdapted($countryAdapted);
		return $this;
	}
	
	
	/**
	* private class variable $_testkit1
	*/
	private $_testkit1;
	
	/**
	* returns the value of $testkit1
	*
	* @return object(int|string) testkit1
	*/
	public function _getTestkit1() {
		return $this->_testkit1;
	}
	
	/**
	* sets the value of $_testkit1
	*
	* @param testkit1
	*/
	public function _setTestkit1($testkit1) {
		$this->_testkit1 = $testkit1;
	}
	/**
	* sets the value of $_testkit1
	*
	* @param testkit1
	* @return object ( this class)
	*/
	public function setTestkit1($testkit1) {
		$this->_setTestkit1($testkit1);
		return $this;
	}
	
	
	/**
	* private class variable $_testkit2
	*/
	private $_testkit2;
	
	/**
	* returns the value of $testkit2
	*
	* @return object(int|string) testkit2
	*/
	public function _getTestkit2() {
		return $this->_testkit2;
	}
	
	/**
	* sets the value of $_testkit2
	*
	* @param testkit2
	*/
	public function _setTestkit2($testkit2) {
		$this->_testkit2 = $testkit2;
	}
	/**
	* sets the value of $_testkit2
	*
	* @param testkit2
	* @return object ( this class)
	*/
	public function setTestkit2($testkit2) {
		$this->_setTestkit2($testkit2);
		return $this;
	}
	
	
	/**
	* private class variable $_testkit3
	*/
	private $_testkit3;
	
	/**
	* returns the value of $testkit3
	*
	* @return object(int|string) testkit3
	*/
	public function _getTestkit3() {
		return $this->_testkit3;
	}
	
	/**
	* sets the value of $_testkit3
	*
	* @param testkit3
	*/
	public function _setTestkit3($testkit3) {
		$this->_testkit3 = $testkit3;
	}
	/**
	* sets the value of $_testkit3
	*
	* @param testkit3
	* @return object ( this class)
	*/
	public function setTestkit3($testkit3) {
		$this->_setTestkit3($testkit3);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of TestKitName_ID 
     * based on the value of $TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3 passed to the function
     *
     * @param $TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3
     * @return object (TestKitName_ID)| null
     */
	public function getTestKitNameID($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3) {
		$columns = array ('TestKitName_ID','scheme_type','TestKit_Name','TestKit_Name_Short','TestKit_Comments','Updated_On','Updated_By','Installation_id','TestKit_Manufacturer','Created_On','Created_By','Approval','TestKit_ApprovalAgency','source_reference','CountryAdapted','testkit_1','testkit_2','testkit_3');
		$records = array ($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3);
		$TestKitName_ID_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($TestKitName_ID_)>0 ? $TestKitName_ID_ [0] ['TestKitName_ID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of scheme_type 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (scheme_type)| null
     */
	public function getSchemeType($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$scheme_type_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($scheme_type_)>0 ? $scheme_type_ [0] ['scheme_type'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of TestKit_Name 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (TestKit_Name)| null
     */
	public function getTestKitName($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$TestKit_Name_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($TestKit_Name_)>0 ? $TestKit_Name_ [0] ['TestKit_Name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of TestKit_Name_Short 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (TestKit_Name_Short)| null
     */
	public function getTestKitNameShort($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$TestKit_Name_Short_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($TestKit_Name_Short_)>0 ? $TestKit_Name_Short_ [0] ['TestKit_Name_Short'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of TestKit_Comments 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (TestKit_Comments)| null
     */
	public function getTestKitComments($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$TestKit_Comments_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($TestKit_Comments_)>0 ? $TestKit_Comments_ [0] ['TestKit_Comments'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Updated_On 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (Updated_On)| null
     */
	public function getUpdatedOn($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$Updated_On_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($Updated_On_)>0 ? $Updated_On_ [0] ['Updated_On'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Updated_By 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (Updated_By)| null
     */
	public function getUpdatedBy($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$Updated_By_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($Updated_By_)>0 ? $Updated_By_ [0] ['Updated_By'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Installation_id 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (Installation_id)| null
     */
	public function getInstallationId($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$Installation_id_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($Installation_id_)>0 ? $Installation_id_ [0] ['Installation_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of TestKit_Manufacturer 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (TestKit_Manufacturer)| null
     */
	public function getTestKitManufacturer($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$TestKit_Manufacturer_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($TestKit_Manufacturer_)>0 ? $TestKit_Manufacturer_ [0] ['TestKit_Manufacturer'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Created_On 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (Created_On)| null
     */
	public function getCreatedOn($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$Created_On_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($Created_On_)>0 ? $Created_On_ [0] ['Created_On'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Created_By 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (Created_By)| null
     */
	public function getCreatedBy($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$Created_By_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($Created_By_)>0 ? $Created_By_ [0] ['Created_By'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Approval 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (Approval)| null
     */
	public function getApproval($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$Approval_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($Approval_)>0 ? $Approval_ [0] ['Approval'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of TestKit_ApprovalAgency 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (TestKit_ApprovalAgency)| null
     */
	public function getTestKitApprovalAgency($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$TestKit_ApprovalAgency_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($TestKit_ApprovalAgency_)>0 ? $TestKit_ApprovalAgency_ [0] ['TestKit_ApprovalAgency'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of source_reference 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (source_reference)| null
     */
	public function getSourceReference($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$source_reference_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($source_reference_)>0 ? $source_reference_ [0] ['source_reference'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of CountryAdapted 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (CountryAdapted)| null
     */
	public function getCountryAdapted($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$CountryAdapted_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($CountryAdapted_)>0 ? $CountryAdapted_ [0] ['CountryAdapted'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of testkit_1 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (testkit_1)| null
     */
	public function getTestkit1($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$testkit_1_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($testkit_1_)>0 ? $testkit_1_ [0] ['testkit_1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of testkit_2 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (testkit_2)| null
     */
	public function getTestkit2($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$testkit_2_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($testkit_2_)>0 ? $testkit_2_ [0] ['testkit_2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of testkit_3 
     * based on the value of $TestKitName_ID passed to the function
     *
     * @param $TestKitName_ID
     * @return object (testkit_3)| null
     */
	public function getTestkit3($TestKitName_ID) {
		$columns = array ('TestKitName_ID');
		$records = array ($TestKitName_ID);
		$testkit_3_ = $this->query_from_r_testkitname_dts ( $columns, $records );
		return sizeof($testkit_3_)>0 ? $testkit_3_ [0] ['testkit_3'] : null;
	}
	

	
	   /**
	* Inserts data into the table[r_testkitname_dts] in the order below
	* array ('TestKitName_ID','scheme_type','TestKit_Name','TestKit_Name_Short','TestKit_Comments','Updated_On','Updated_By','Installation_id','TestKit_Manufacturer','Created_On','Created_By','Approval','TestKit_ApprovalAgency','source_reference','CountryAdapted','testkit_1','testkit_2','testkit_3')
	* is mapped into
	* array ($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3,$redundancy_check= false, $printSQL = false) {
		$columns = array('TestKitName_ID','scheme_type','TestKit_Name','TestKit_Name_Short','TestKit_Comments','Updated_On','Updated_By','Installation_id','TestKit_Manufacturer','Created_On','Created_By','Approval','TestKit_ApprovalAgency','source_reference','CountryAdapted','testkit_1','testkit_2','testkit_3');
		$records = array($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3);
		return $this->insert_records_to_r_testkitname_dts ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[r_testkitname_dts] in the order below
    * array ('TestKitName_ID','scheme_type','TestKit_Name','TestKit_Name_Short','TestKit_Comments','Updated_On','Updated_By','Installation_id','TestKit_Manufacturer','Created_On','Created_By','Approval','TestKit_ApprovalAgency','source_reference','CountryAdapted','testkit_1','testkit_2','testkit_3')
    * is mapped into
    * array ($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3, $printSQL = false) {
    	$columns = array('TestKitName_ID','scheme_type','TestKit_Name','TestKit_Name_Short','TestKit_Comments','Updated_On','Updated_By','Installation_id','TestKit_Manufacturer','Created_On','Created_By','Approval','TestKit_ApprovalAgency','source_reference','CountryAdapted','testkit_1','testkit_2','testkit_3');
    	$records = array($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3);
    	return $this->delete_record_from_r_testkitname_dts( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'r_testkitname_dts' 
	*/
	public static function get_table() {
		return 'r_testkitname_dts';
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
     * Used  to calculate the number of times a record exists in the table r_testkitname_dts
     * It returns the number of times a record exists exists in the table r_testkitname_dts
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table r_testkitname_dts
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_r_testkitname_dts(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table r_testkitname_dts
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_r_testkitname_dts(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table r_testkitname_dts
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_r_testkitname_dts(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'r_testkitname_dts' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_r_testkitname_dts($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_testkitname_dts that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_r_testkitname_dts(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_testkitname_dts that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_r_testkitname_dts(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table r_testkitname_dts that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_r_testkitname_dts(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [r_testkitname_dts]
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
     * Inserts data into the table r_testkitname_dts
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
     * Updates all the records that meets the passed criteria from the table r_testkitname_dts
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
     * Gets an Associative array of the records in the table r_testkitname_dts that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_testkitname_dts  that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_testkitname_dts that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table r_testkitname_dts  that meets the passed criteria
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
