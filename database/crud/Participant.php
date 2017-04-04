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
* Participant
*  
* Low level class for manipulating the data in the table participant
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class Participant {

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
	* private class variable $_uniqueIdentifier
	*/
	private $_uniqueIdentifier;
	
	/**
	* returns the value of $uniqueIdentifier
	*
	* @return object(int|string) uniqueIdentifier
	*/
	public function _getUniqueIdentifier() {
		return $this->_uniqueIdentifier;
	}
	
	/**
	* sets the value of $_uniqueIdentifier
	*
	* @param uniqueIdentifier
	*/
	public function _setUniqueIdentifier($uniqueIdentifier) {
		$this->_uniqueIdentifier = $uniqueIdentifier;
	}
	/**
	* sets the value of $_uniqueIdentifier
	*
	* @param uniqueIdentifier
	* @return object ( this class)
	*/
	public function setUniqueIdentifier($uniqueIdentifier) {
		$this->_setUniqueIdentifier($uniqueIdentifier);
		return $this;
	}
	
	
	/**
	* private class variable $_individual
	*/
	private $_individual;
	
	/**
	* returns the value of $individual
	*
	* @return object(int|string) individual
	*/
	public function _getIndividual() {
		return $this->_individual;
	}
	
	/**
	* sets the value of $_individual
	*
	* @param individual
	*/
	public function _setIndividual($individual) {
		$this->_individual = $individual;
	}
	/**
	* sets the value of $_individual
	*
	* @param individual
	* @return object ( this class)
	*/
	public function setIndividual($individual) {
		$this->_setIndividual($individual);
		return $this;
	}
	
	
	/**
	* private class variable $_labName
	*/
	private $_labName;
	
	/**
	* returns the value of $labName
	*
	* @return object(int|string) labName
	*/
	public function _getLabName() {
		return $this->_labName;
	}
	
	/**
	* sets the value of $_labName
	*
	* @param labName
	*/
	public function _setLabName($labName) {
		$this->_labName = $labName;
	}
	/**
	* sets the value of $_labName
	*
	* @param labName
	* @return object ( this class)
	*/
	public function setLabName($labName) {
		$this->_setLabName($labName);
		return $this;
	}
	
	
	/**
	* private class variable $_instituteName
	*/
	private $_instituteName;
	
	/**
	* returns the value of $instituteName
	*
	* @return object(int|string) instituteName
	*/
	public function _getInstituteName() {
		return $this->_instituteName;
	}
	
	/**
	* sets the value of $_instituteName
	*
	* @param instituteName
	*/
	public function _setInstituteName($instituteName) {
		$this->_instituteName = $instituteName;
	}
	/**
	* sets the value of $_instituteName
	*
	* @param instituteName
	* @return object ( this class)
	*/
	public function setInstituteName($instituteName) {
		$this->_setInstituteName($instituteName);
		return $this;
	}
	
	
	/**
	* private class variable $_departmentName
	*/
	private $_departmentName;
	
	/**
	* returns the value of $departmentName
	*
	* @return object(int|string) departmentName
	*/
	public function _getDepartmentName() {
		return $this->_departmentName;
	}
	
	/**
	* sets the value of $_departmentName
	*
	* @param departmentName
	*/
	public function _setDepartmentName($departmentName) {
		$this->_departmentName = $departmentName;
	}
	/**
	* sets the value of $_departmentName
	*
	* @param departmentName
	* @return object ( this class)
	*/
	public function setDepartmentName($departmentName) {
		$this->_setDepartmentName($departmentName);
		return $this;
	}
	
	
	/**
	* private class variable $_address
	*/
	private $_address;
	
	/**
	* returns the value of $address
	*
	* @return object(int|string) address
	*/
	public function _getAddress() {
		return $this->_address;
	}
	
	/**
	* sets the value of $_address
	*
	* @param address
	*/
	public function _setAddress($address) {
		$this->_address = $address;
	}
	/**
	* sets the value of $_address
	*
	* @param address
	* @return object ( this class)
	*/
	public function setAddress($address) {
		$this->_setAddress($address);
		return $this;
	}
	
	
	/**
	* private class variable $_city
	*/
	private $_city;
	
	/**
	* returns the value of $city
	*
	* @return object(int|string) city
	*/
	public function _getCity() {
		return $this->_city;
	}
	
	/**
	* sets the value of $_city
	*
	* @param city
	*/
	public function _setCity($city) {
		$this->_city = $city;
	}
	/**
	* sets the value of $_city
	*
	* @param city
	* @return object ( this class)
	*/
	public function setCity($city) {
		$this->_setCity($city);
		return $this;
	}
	
	
	/**
	* private class variable $_state
	*/
	private $_state;
	
	/**
	* returns the value of $state
	*
	* @return object(int|string) state
	*/
	public function _getState() {
		return $this->_state;
	}
	
	/**
	* sets the value of $_state
	*
	* @param state
	*/
	public function _setState($state) {
		$this->_state = $state;
	}
	/**
	* sets the value of $_state
	*
	* @param state
	* @return object ( this class)
	*/
	public function setState($state) {
		$this->_setState($state);
		return $this;
	}
	
	
	/**
	* private class variable $_country
	*/
	private $_country;
	
	/**
	* returns the value of $country
	*
	* @return object(int|string) country
	*/
	public function _getCountry() {
		return $this->_country;
	}
	
	/**
	* sets the value of $_country
	*
	* @param country
	*/
	public function _setCountry($country) {
		$this->_country = $country;
	}
	/**
	* sets the value of $_country
	*
	* @param country
	* @return object ( this class)
	*/
	public function setCountry($country) {
		$this->_setCountry($country);
		return $this;
	}
	
	
	/**
	* private class variable $_zip
	*/
	private $_zip;
	
	/**
	* returns the value of $zip
	*
	* @return object(int|string) zip
	*/
	public function _getZip() {
		return $this->_zip;
	}
	
	/**
	* sets the value of $_zip
	*
	* @param zip
	*/
	public function _setZip($zip) {
		$this->_zip = $zip;
	}
	/**
	* sets the value of $_zip
	*
	* @param zip
	* @return object ( this class)
	*/
	public function setZip($zip) {
		$this->_setZip($zip);
		return $this;
	}
	
	
	/**
	* private class variable $_long
	*/
	private $_long;
	
	/**
	* returns the value of $long
	*
	* @return object(int|string) long
	*/
	public function _getLong() {
		return $this->_long;
	}
	
	/**
	* sets the value of $_long
	*
	* @param long
	*/
	public function _setLong($long) {
		$this->_long = $long;
	}
	/**
	* sets the value of $_long
	*
	* @param long
	* @return object ( this class)
	*/
	public function setLong($long) {
		$this->_setLong($long);
		return $this;
	}
	
	
	/**
	* private class variable $_lat
	*/
	private $_lat;
	
	/**
	* returns the value of $lat
	*
	* @return object(int|string) lat
	*/
	public function _getLat() {
		return $this->_lat;
	}
	
	/**
	* sets the value of $_lat
	*
	* @param lat
	*/
	public function _setLat($lat) {
		$this->_lat = $lat;
	}
	/**
	* sets the value of $_lat
	*
	* @param lat
	* @return object ( this class)
	*/
	public function setLat($lat) {
		$this->_setLat($lat);
		return $this;
	}
	
	
	/**
	* private class variable $_shippingAddress
	*/
	private $_shippingAddress;
	
	/**
	* returns the value of $shippingAddress
	*
	* @return object(int|string) shippingAddress
	*/
	public function _getShippingAddress() {
		return $this->_shippingAddress;
	}
	
	/**
	* sets the value of $_shippingAddress
	*
	* @param shippingAddress
	*/
	public function _setShippingAddress($shippingAddress) {
		$this->_shippingAddress = $shippingAddress;
	}
	/**
	* sets the value of $_shippingAddress
	*
	* @param shippingAddress
	* @return object ( this class)
	*/
	public function setShippingAddress($shippingAddress) {
		$this->_setShippingAddress($shippingAddress);
		return $this;
	}
	
	
	/**
	* private class variable $_fundingSource
	*/
	private $_fundingSource;
	
	/**
	* returns the value of $fundingSource
	*
	* @return object(int|string) fundingSource
	*/
	public function _getFundingSource() {
		return $this->_fundingSource;
	}
	
	/**
	* sets the value of $_fundingSource
	*
	* @param fundingSource
	*/
	public function _setFundingSource($fundingSource) {
		$this->_fundingSource = $fundingSource;
	}
	/**
	* sets the value of $_fundingSource
	*
	* @param fundingSource
	* @return object ( this class)
	*/
	public function setFundingSource($fundingSource) {
		$this->_setFundingSource($fundingSource);
		return $this;
	}
	
	
	/**
	* private class variable $_testingVolume
	*/
	private $_testingVolume;
	
	/**
	* returns the value of $testingVolume
	*
	* @return object(int|string) testingVolume
	*/
	public function _getTestingVolume() {
		return $this->_testingVolume;
	}
	
	/**
	* sets the value of $_testingVolume
	*
	* @param testingVolume
	*/
	public function _setTestingVolume($testingVolume) {
		$this->_testingVolume = $testingVolume;
	}
	/**
	* sets the value of $_testingVolume
	*
	* @param testingVolume
	* @return object ( this class)
	*/
	public function setTestingVolume($testingVolume) {
		$this->_setTestingVolume($testingVolume);
		return $this;
	}
	
	
	/**
	* private class variable $_enrolledPrograms
	*/
	private $_enrolledPrograms;
	
	/**
	* returns the value of $enrolledPrograms
	*
	* @return object(int|string) enrolledPrograms
	*/
	public function _getEnrolledPrograms() {
		return $this->_enrolledPrograms;
	}
	
	/**
	* sets the value of $_enrolledPrograms
	*
	* @param enrolledPrograms
	*/
	public function _setEnrolledPrograms($enrolledPrograms) {
		$this->_enrolledPrograms = $enrolledPrograms;
	}
	/**
	* sets the value of $_enrolledPrograms
	*
	* @param enrolledPrograms
	* @return object ( this class)
	*/
	public function setEnrolledPrograms($enrolledPrograms) {
		$this->_setEnrolledPrograms($enrolledPrograms);
		return $this;
	}
	
	
	/**
	* private class variable $_siteType
	*/
	private $_siteType;
	
	/**
	* returns the value of $siteType
	*
	* @return object(int|string) siteType
	*/
	public function _getSiteType() {
		return $this->_siteType;
	}
	
	/**
	* sets the value of $_siteType
	*
	* @param siteType
	*/
	public function _setSiteType($siteType) {
		$this->_siteType = $siteType;
	}
	/**
	* sets the value of $_siteType
	*
	* @param siteType
	* @return object ( this class)
	*/
	public function setSiteType($siteType) {
		$this->_setSiteType($siteType);
		return $this;
	}
	
	
	/**
	* private class variable $_region
	*/
	private $_region;
	
	/**
	* returns the value of $region
	*
	* @return object(int|string) region
	*/
	public function _getRegion() {
		return $this->_region;
	}
	
	/**
	* sets the value of $_region
	*
	* @param region
	*/
	public function _setRegion($region) {
		$this->_region = $region;
	}
	/**
	* sets the value of $_region
	*
	* @param region
	* @return object ( this class)
	*/
	public function setRegion($region) {
		$this->_setRegion($region);
		return $this;
	}
	
	
	/**
	* private class variable $_firstName
	*/
	private $_firstName;
	
	/**
	* returns the value of $firstName
	*
	* @return object(int|string) firstName
	*/
	public function _getFirstName() {
		return $this->_firstName;
	}
	
	/**
	* sets the value of $_firstName
	*
	* @param firstName
	*/
	public function _setFirstName($firstName) {
		$this->_firstName = $firstName;
	}
	/**
	* sets the value of $_firstName
	*
	* @param firstName
	* @return object ( this class)
	*/
	public function setFirstName($firstName) {
		$this->_setFirstName($firstName);
		return $this;
	}
	
	
	/**
	* private class variable $_lastName
	*/
	private $_lastName;
	
	/**
	* returns the value of $lastName
	*
	* @return object(int|string) lastName
	*/
	public function _getLastName() {
		return $this->_lastName;
	}
	
	/**
	* sets the value of $_lastName
	*
	* @param lastName
	*/
	public function _setLastName($lastName) {
		$this->_lastName = $lastName;
	}
	/**
	* sets the value of $_lastName
	*
	* @param lastName
	* @return object ( this class)
	*/
	public function setLastName($lastName) {
		$this->_setLastName($lastName);
		return $this;
	}
	
	
	/**
	* private class variable $_mobile
	*/
	private $_mobile;
	
	/**
	* returns the value of $mobile
	*
	* @return object(int|string) mobile
	*/
	public function _getMobile() {
		return $this->_mobile;
	}
	
	/**
	* sets the value of $_mobile
	*
	* @param mobile
	*/
	public function _setMobile($mobile) {
		$this->_mobile = $mobile;
	}
	/**
	* sets the value of $_mobile
	*
	* @param mobile
	* @return object ( this class)
	*/
	public function setMobile($mobile) {
		$this->_setMobile($mobile);
		return $this;
	}
	
	
	/**
	* private class variable $_phone
	*/
	private $_phone;
	
	/**
	* returns the value of $phone
	*
	* @return object(int|string) phone
	*/
	public function _getPhone() {
		return $this->_phone;
	}
	
	/**
	* sets the value of $_phone
	*
	* @param phone
	*/
	public function _setPhone($phone) {
		$this->_phone = $phone;
	}
	/**
	* sets the value of $_phone
	*
	* @param phone
	* @return object ( this class)
	*/
	public function setPhone($phone) {
		$this->_setPhone($phone);
		return $this;
	}
	
	
	/**
	* private class variable $_contactName
	*/
	private $_contactName;
	
	/**
	* returns the value of $contactName
	*
	* @return object(int|string) contactName
	*/
	public function _getContactName() {
		return $this->_contactName;
	}
	
	/**
	* sets the value of $_contactName
	*
	* @param contactName
	*/
	public function _setContactName($contactName) {
		$this->_contactName = $contactName;
	}
	/**
	* sets the value of $_contactName
	*
	* @param contactName
	* @return object ( this class)
	*/
	public function setContactName($contactName) {
		$this->_setContactName($contactName);
		return $this;
	}
	
	
	/**
	* private class variable $_email
	*/
	private $_email;
	
	/**
	* returns the value of $email
	*
	* @return object(int|string) email
	*/
	public function _getEmail() {
		return $this->_email;
	}
	
	/**
	* sets the value of $_email
	*
	* @param email
	*/
	public function _setEmail($email) {
		$this->_email = $email;
	}
	/**
	* sets the value of $_email
	*
	* @param email
	* @return object ( this class)
	*/
	public function setEmail($email) {
		$this->_setEmail($email);
		return $this;
	}
	
	
	/**
	* private class variable $_affiliation
	*/
	private $_affiliation;
	
	/**
	* returns the value of $affiliation
	*
	* @return object(int|string) affiliation
	*/
	public function _getAffiliation() {
		return $this->_affiliation;
	}
	
	/**
	* sets the value of $_affiliation
	*
	* @param affiliation
	*/
	public function _setAffiliation($affiliation) {
		$this->_affiliation = $affiliation;
	}
	/**
	* sets the value of $_affiliation
	*
	* @param affiliation
	* @return object ( this class)
	*/
	public function setAffiliation($affiliation) {
		$this->_setAffiliation($affiliation);
		return $this;
	}
	
	
	/**
	* private class variable $_networkTier
	*/
	private $_networkTier;
	
	/**
	* returns the value of $networkTier
	*
	* @return object(int|string) networkTier
	*/
	public function _getNetworkTier() {
		return $this->_networkTier;
	}
	
	/**
	* sets the value of $_networkTier
	*
	* @param networkTier
	*/
	public function _setNetworkTier($networkTier) {
		$this->_networkTier = $networkTier;
	}
	/**
	* sets the value of $_networkTier
	*
	* @param networkTier
	* @return object ( this class)
	*/
	public function setNetworkTier($networkTier) {
		$this->_setNetworkTier($networkTier);
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
     * Performs a database query and returns the value of participant_id 
     * based on the value of $participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status passed to the function
     *
     * @param $participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status
     * @return object (participant_id)| null
     */
	public function getParticipantId($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status) {
		$columns = array ('participant_id','unique_identifier','individual','lab_name','institute_name','department_name','address','city','state','country','zip','long','lat','shipping_address','funding_source','testing_volume','enrolled_programs','site_type','region','first_name','last_name','mobile','phone','contact_name','email','affiliation','network_tier','created_on','created_by','updated_on','updated_by','status');
		$records = array ($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status);
		$participant_id_ = $this->query_from_participant ( $columns, $records );
		return sizeof($participant_id_)>0 ? $participant_id_ [0] ['participant_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of unique_identifier 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (unique_identifier)| null
     */
	public function getUniqueIdentifier($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$unique_identifier_ = $this->query_from_participant ( $columns, $records );
		return sizeof($unique_identifier_)>0 ? $unique_identifier_ [0] ['unique_identifier'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of individual 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (individual)| null
     */
	public function getIndividual($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$individual_ = $this->query_from_participant ( $columns, $records );
		return sizeof($individual_)>0 ? $individual_ [0] ['individual'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lab_name 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (lab_name)| null
     */
	public function getLabName($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$lab_name_ = $this->query_from_participant ( $columns, $records );
		return sizeof($lab_name_)>0 ? $lab_name_ [0] ['lab_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of institute_name 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (institute_name)| null
     */
	public function getInstituteName($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$institute_name_ = $this->query_from_participant ( $columns, $records );
		return sizeof($institute_name_)>0 ? $institute_name_ [0] ['institute_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of department_name 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (department_name)| null
     */
	public function getDepartmentName($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$department_name_ = $this->query_from_participant ( $columns, $records );
		return sizeof($department_name_)>0 ? $department_name_ [0] ['department_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of address 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (address)| null
     */
	public function getAddress($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$address_ = $this->query_from_participant ( $columns, $records );
		return sizeof($address_)>0 ? $address_ [0] ['address'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of city 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (city)| null
     */
	public function getCity($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$city_ = $this->query_from_participant ( $columns, $records );
		return sizeof($city_)>0 ? $city_ [0] ['city'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of state 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (state)| null
     */
	public function getState($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$state_ = $this->query_from_participant ( $columns, $records );
		return sizeof($state_)>0 ? $state_ [0] ['state'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of country 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (country)| null
     */
	public function getCountry($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$country_ = $this->query_from_participant ( $columns, $records );
		return sizeof($country_)>0 ? $country_ [0] ['country'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of zip 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (zip)| null
     */
	public function getZip($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$zip_ = $this->query_from_participant ( $columns, $records );
		return sizeof($zip_)>0 ? $zip_ [0] ['zip'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of long 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (long)| null
     */
	public function getLong($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$long_ = $this->query_from_participant ( $columns, $records );
		return sizeof($long_)>0 ? $long_ [0] ['long'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lat 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (lat)| null
     */
	public function getLat($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$lat_ = $this->query_from_participant ( $columns, $records );
		return sizeof($lat_)>0 ? $lat_ [0] ['lat'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipping_address 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (shipping_address)| null
     */
	public function getShippingAddress($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$shipping_address_ = $this->query_from_participant ( $columns, $records );
		return sizeof($shipping_address_)>0 ? $shipping_address_ [0] ['shipping_address'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of funding_source 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (funding_source)| null
     */
	public function getFundingSource($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$funding_source_ = $this->query_from_participant ( $columns, $records );
		return sizeof($funding_source_)>0 ? $funding_source_ [0] ['funding_source'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of testing_volume 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (testing_volume)| null
     */
	public function getTestingVolume($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$testing_volume_ = $this->query_from_participant ( $columns, $records );
		return sizeof($testing_volume_)>0 ? $testing_volume_ [0] ['testing_volume'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of enrolled_programs 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (enrolled_programs)| null
     */
	public function getEnrolledPrograms($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$enrolled_programs_ = $this->query_from_participant ( $columns, $records );
		return sizeof($enrolled_programs_)>0 ? $enrolled_programs_ [0] ['enrolled_programs'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of site_type 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (site_type)| null
     */
	public function getSiteType($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$site_type_ = $this->query_from_participant ( $columns, $records );
		return sizeof($site_type_)>0 ? $site_type_ [0] ['site_type'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of region 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (region)| null
     */
	public function getRegion($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$region_ = $this->query_from_participant ( $columns, $records );
		return sizeof($region_)>0 ? $region_ [0] ['region'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of first_name 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (first_name)| null
     */
	public function getFirstName($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$first_name_ = $this->query_from_participant ( $columns, $records );
		return sizeof($first_name_)>0 ? $first_name_ [0] ['first_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of last_name 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (last_name)| null
     */
	public function getLastName($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$last_name_ = $this->query_from_participant ( $columns, $records );
		return sizeof($last_name_)>0 ? $last_name_ [0] ['last_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mobile 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (mobile)| null
     */
	public function getMobile($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$mobile_ = $this->query_from_participant ( $columns, $records );
		return sizeof($mobile_)>0 ? $mobile_ [0] ['mobile'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of phone 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (phone)| null
     */
	public function getPhone($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$phone_ = $this->query_from_participant ( $columns, $records );
		return sizeof($phone_)>0 ? $phone_ [0] ['phone'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of contact_name 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (contact_name)| null
     */
	public function getContactName($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$contact_name_ = $this->query_from_participant ( $columns, $records );
		return sizeof($contact_name_)>0 ? $contact_name_ [0] ['contact_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of email 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (email)| null
     */
	public function getEmail($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$email_ = $this->query_from_participant ( $columns, $records );
		return sizeof($email_)>0 ? $email_ [0] ['email'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of affiliation 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (affiliation)| null
     */
	public function getAffiliation($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$affiliation_ = $this->query_from_participant ( $columns, $records );
		return sizeof($affiliation_)>0 ? $affiliation_ [0] ['affiliation'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of network_tier 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (network_tier)| null
     */
	public function getNetworkTier($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$network_tier_ = $this->query_from_participant ( $columns, $records );
		return sizeof($network_tier_)>0 ? $network_tier_ [0] ['network_tier'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (created_on)| null
     */
	public function getCreatedOn($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$created_on_ = $this->query_from_participant ( $columns, $records );
		return sizeof($created_on_)>0 ? $created_on_ [0] ['created_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_by 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (created_by)| null
     */
	public function getCreatedBy($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$created_by_ = $this->query_from_participant ( $columns, $records );
		return sizeof($created_by_)>0 ? $created_by_ [0] ['created_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (updated_on)| null
     */
	public function getUpdatedOn($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$updated_on_ = $this->query_from_participant ( $columns, $records );
		return sizeof($updated_on_)>0 ? $updated_on_ [0] ['updated_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (updated_by)| null
     */
	public function getUpdatedBy($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$updated_by_ = $this->query_from_participant ( $columns, $records );
		return sizeof($updated_by_)>0 ? $updated_by_ [0] ['updated_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of status 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (status)| null
     */
	public function getStatus($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$status_ = $this->query_from_participant ( $columns, $records );
		return sizeof($status_)>0 ? $status_ [0] ['status'] : null;
	}
	

	
	   /**
	* Inserts data into the table[participant] in the order below
	* array ('participant_id','unique_identifier','individual','lab_name','institute_name','department_name','address','city','state','country','zip','long','lat','shipping_address','funding_source','testing_volume','enrolled_programs','site_type','region','first_name','last_name','mobile','phone','contact_name','email','affiliation','network_tier','created_on','created_by','updated_on','updated_by','status')
	* is mapped into
	* array ($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('participant_id','unique_identifier','individual','lab_name','institute_name','department_name','address','city','state','country','zip','long','lat','shipping_address','funding_source','testing_volume','enrolled_programs','site_type','region','first_name','last_name','mobile','phone','contact_name','email','affiliation','network_tier','created_on','created_by','updated_on','updated_by','status');
		$records = array($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status);
		return $this->insert_records_to_participant ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[participant] in the order below
    * array ('participant_id','unique_identifier','individual','lab_name','institute_name','department_name','address','city','state','country','zip','long','lat','shipping_address','funding_source','testing_volume','enrolled_programs','site_type','region','first_name','last_name','mobile','phone','contact_name','email','affiliation','network_tier','created_on','created_by','updated_on','updated_by','status')
    * is mapped into
    * array ($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status, $printSQL = false) {
    	$columns = array('participant_id','unique_identifier','individual','lab_name','institute_name','department_name','address','city','state','country','zip','long','lat','shipping_address','funding_source','testing_volume','enrolled_programs','site_type','region','first_name','last_name','mobile','phone','contact_name','email','affiliation','network_tier','created_on','created_by','updated_on','updated_by','status');
    	$records = array($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status);
    	return $this->delete_record_from_participant( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'participant' 
	*/
	public static function get_table() {
		return 'participant';
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
     * Used  to calculate the number of times a record exists in the table participant
     * It returns the number of times a record exists exists in the table participant
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table participant
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_participant(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table participant
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_participant(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table participant
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_participant(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'participant' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_participant($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table participant that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_participant(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table participant that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_participant(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table participant that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_participant(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [participant]
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
     * Inserts data into the table participant
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
     * Updates all the records that meets the passed criteria from the table participant
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
     * Gets an Associative array of the records in the table participant that meets the passed criteria
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
     * Gets an Associative array of the records in the table participant  that meets the passed criteria
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
     * Gets an Associative array of the records in the table participant that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table participant  that meets the passed criteria
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
