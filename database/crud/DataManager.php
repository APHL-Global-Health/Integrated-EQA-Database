<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:43  09/12/2016
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
* DataManager
*  
* Low level class for manipulating the data in the table data_manager
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class DataManager {

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
	* private class variable $_dmId
	*/
	private $_dmId;
	
	/**
	* returns the value of $dmId
	*
	* @return object(int|string) dmId
	*/
	public function _getDmId() {
		return $this->_dmId;
	}
	
	/**
	* sets the value of $_dmId
	*
	* @param dmId
	*/
	public function _setDmId($dmId) {
		$this->_dmId = $dmId;
	}
	/**
	* sets the value of $_dmId
	*
	* @param dmId
	* @return object ( this class)
	*/
	public function setDmId($dmId) {
		$this->_setDmId($dmId);
		return $this;
	}
	
	
	/**
	* private class variable $_primaryEmail
	*/
	private $_primaryEmail;
	
	/**
	* returns the value of $primaryEmail
	*
	* @return object(int|string) primaryEmail
	*/
	public function _getPrimaryEmail() {
		return $this->_primaryEmail;
	}
	
	/**
	* sets the value of $_primaryEmail
	*
	* @param primaryEmail
	*/
	public function _setPrimaryEmail($primaryEmail) {
		$this->_primaryEmail = $primaryEmail;
	}
	/**
	* sets the value of $_primaryEmail
	*
	* @param primaryEmail
	* @return object ( this class)
	*/
	public function setPrimaryEmail($primaryEmail) {
		$this->_setPrimaryEmail($primaryEmail);
		return $this;
	}
	
	
	/**
	* private class variable $_password
	*/
	private $_password;
	
	/**
	* returns the value of $password
	*
	* @return object(int|string) password
	*/
	public function _getPassword() {
		return $this->_password;
	}
	
	/**
	* sets the value of $_password
	*
	* @param password
	*/
	public function _setPassword($password) {
		$this->_password = $password;
	}
	/**
	* sets the value of $_password
	*
	* @param password
	* @return object ( this class)
	*/
	public function setPassword($password) {
		$this->_setPassword($password);
		return $this;
	}
	
	
	/**
	* private class variable $_institute
	*/
	private $_institute;
	
	/**
	* returns the value of $institute
	*
	* @return object(int|string) institute
	*/
	public function _getInstitute() {
		return $this->_institute;
	}
	
	/**
	* sets the value of $_institute
	*
	* @param institute
	*/
	public function _setInstitute($institute) {
		$this->_institute = $institute;
	}
	/**
	* sets the value of $_institute
	*
	* @param institute
	* @return object ( this class)
	*/
	public function setInstitute($institute) {
		$this->_setInstitute($institute);
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
	* private class variable $_secondaryEmail
	*/
	private $_secondaryEmail;
	
	/**
	* returns the value of $secondaryEmail
	*
	* @return object(int|string) secondaryEmail
	*/
	public function _getSecondaryEmail() {
		return $this->_secondaryEmail;
	}
	
	/**
	* sets the value of $_secondaryEmail
	*
	* @param secondaryEmail
	*/
	public function _setSecondaryEmail($secondaryEmail) {
		$this->_secondaryEmail = $secondaryEmail;
	}
	/**
	* sets the value of $_secondaryEmail
	*
	* @param secondaryEmail
	* @return object ( this class)
	*/
	public function setSecondaryEmail($secondaryEmail) {
		$this->_setSecondaryEmail($secondaryEmail);
		return $this;
	}
	
	
	/**
	* private class variable $_userFld1
	*/
	private $_userFld1;
	
	/**
	* returns the value of $userFld1
	*
	* @return object(int|string) userFld1
	*/
	public function _getUserFld1() {
		return $this->_userFld1;
	}
	
	/**
	* sets the value of $_userFld1
	*
	* @param userFld1
	*/
	public function _setUserFld1($userFld1) {
		$this->_userFld1 = $userFld1;
	}
	/**
	* sets the value of $_userFld1
	*
	* @param userFld1
	* @return object ( this class)
	*/
	public function setUserFld1($userFld1) {
		$this->_setUserFld1($userFld1);
		return $this;
	}
	
	
	/**
	* private class variable $_userFld2
	*/
	private $_userFld2;
	
	/**
	* returns the value of $userFld2
	*
	* @return object(int|string) userFld2
	*/
	public function _getUserFld2() {
		return $this->_userFld2;
	}
	
	/**
	* sets the value of $_userFld2
	*
	* @param userFld2
	*/
	public function _setUserFld2($userFld2) {
		$this->_userFld2 = $userFld2;
	}
	/**
	* sets the value of $_userFld2
	*
	* @param userFld2
	* @return object ( this class)
	*/
	public function setUserFld2($userFld2) {
		$this->_setUserFld2($userFld2);
		return $this;
	}
	
	
	/**
	* private class variable $_userFld3
	*/
	private $_userFld3;
	
	/**
	* returns the value of $userFld3
	*
	* @return object(int|string) userFld3
	*/
	public function _getUserFld3() {
		return $this->_userFld3;
	}
	
	/**
	* sets the value of $_userFld3
	*
	* @param userFld3
	*/
	public function _setUserFld3($userFld3) {
		$this->_userFld3 = $userFld3;
	}
	/**
	* sets the value of $_userFld3
	*
	* @param userFld3
	* @return object ( this class)
	*/
	public function setUserFld3($userFld3) {
		$this->_setUserFld3($userFld3);
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
	* private class variable $_forcePasswordReset
	*/
	private $_forcePasswordReset;
	
	/**
	* returns the value of $forcePasswordReset
	*
	* @return object(int|string) forcePasswordReset
	*/
	public function _getForcePasswordReset() {
		return $this->_forcePasswordReset;
	}
	
	/**
	* sets the value of $_forcePasswordReset
	*
	* @param forcePasswordReset
	*/
	public function _setForcePasswordReset($forcePasswordReset) {
		$this->_forcePasswordReset = $forcePasswordReset;
	}
	/**
	* sets the value of $_forcePasswordReset
	*
	* @param forcePasswordReset
	* @return object ( this class)
	*/
	public function setForcePasswordReset($forcePasswordReset) {
		$this->_setForcePasswordReset($forcePasswordReset);
		return $this;
	}
	
	
	/**
	* private class variable $_qcAccess
	*/
	private $_qcAccess;
	
	/**
	* returns the value of $qcAccess
	*
	* @return object(int|string) qcAccess
	*/
	public function _getQcAccess() {
		return $this->_qcAccess;
	}
	
	/**
	* sets the value of $_qcAccess
	*
	* @param qcAccess
	*/
	public function _setQcAccess($qcAccess) {
		$this->_qcAccess = $qcAccess;
	}
	/**
	* sets the value of $_qcAccess
	*
	* @param qcAccess
	* @return object ( this class)
	*/
	public function setQcAccess($qcAccess) {
		$this->_setQcAccess($qcAccess);
		return $this;
	}
	
	
	/**
	* private class variable $_enableAddingTestResponseDate
	*/
	private $_enableAddingTestResponseDate;
	
	/**
	* returns the value of $enableAddingTestResponseDate
	*
	* @return object(int|string) enableAddingTestResponseDate
	*/
	public function _getEnableAddingTestResponseDate() {
		return $this->_enableAddingTestResponseDate;
	}
	
	/**
	* sets the value of $_enableAddingTestResponseDate
	*
	* @param enableAddingTestResponseDate
	*/
	public function _setEnableAddingTestResponseDate($enableAddingTestResponseDate) {
		$this->_enableAddingTestResponseDate = $enableAddingTestResponseDate;
	}
	/**
	* sets the value of $_enableAddingTestResponseDate
	*
	* @param enableAddingTestResponseDate
	* @return object ( this class)
	*/
	public function setEnableAddingTestResponseDate($enableAddingTestResponseDate) {
		$this->_setEnableAddingTestResponseDate($enableAddingTestResponseDate);
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
     * Performs a database query and returns the value of dm_id 
     * based on the value of $dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by passed to the function
     *
     * @param $dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by
     * @return object (dm_id)| null
     */
	public function getDmId($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by) {
		$columns = array ('dm_id','primary_email','password','institute','first_name','last_name','phone','secondary_email','UserFld1','UserFld2','UserFld3','mobile','force_password_reset','qc_access','enable_adding_test_response_date','status','created_on','created_by','updated_on','updated_by');
		$records = array ($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by);
		$dm_id_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($dm_id_)>0 ? $dm_id_ [0] ['dm_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of primary_email 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (primary_email)| null
     */
	public function getPrimaryEmail($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$primary_email_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($primary_email_)>0 ? $primary_email_ [0] ['primary_email'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of password 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (password)| null
     */
	public function getPassword($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$password_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($password_)>0 ? $password_ [0] ['password'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of institute 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (institute)| null
     */
	public function getInstitute($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$institute_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($institute_)>0 ? $institute_ [0] ['institute'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of first_name 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (first_name)| null
     */
	public function getFirstName($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$first_name_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($first_name_)>0 ? $first_name_ [0] ['first_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of last_name 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (last_name)| null
     */
	public function getLastName($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$last_name_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($last_name_)>0 ? $last_name_ [0] ['last_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of phone 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (phone)| null
     */
	public function getPhone($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$phone_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($phone_)>0 ? $phone_ [0] ['phone'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of secondary_email 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (secondary_email)| null
     */
	public function getSecondaryEmail($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$secondary_email_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($secondary_email_)>0 ? $secondary_email_ [0] ['secondary_email'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of UserFld1 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (UserFld1)| null
     */
	public function getUserFld1($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$UserFld1_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($UserFld1_)>0 ? $UserFld1_ [0] ['UserFld1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of UserFld2 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (UserFld2)| null
     */
	public function getUserFld2($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$UserFld2_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($UserFld2_)>0 ? $UserFld2_ [0] ['UserFld2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of UserFld3 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (UserFld3)| null
     */
	public function getUserFld3($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$UserFld3_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($UserFld3_)>0 ? $UserFld3_ [0] ['UserFld3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mobile 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (mobile)| null
     */
	public function getMobile($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$mobile_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($mobile_)>0 ? $mobile_ [0] ['mobile'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of force_password_reset 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (force_password_reset)| null
     */
	public function getForcePasswordReset($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$force_password_reset_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($force_password_reset_)>0 ? $force_password_reset_ [0] ['force_password_reset'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of qc_access 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (qc_access)| null
     */
	public function getQcAccess($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$qc_access_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($qc_access_)>0 ? $qc_access_ [0] ['qc_access'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of enable_adding_test_response_date 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (enable_adding_test_response_date)| null
     */
	public function getEnableAddingTestResponseDate($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$enable_adding_test_response_date_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($enable_adding_test_response_date_)>0 ? $enable_adding_test_response_date_ [0] ['enable_adding_test_response_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of status 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (status)| null
     */
	public function getStatus($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$status_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($status_)>0 ? $status_ [0] ['status'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (created_on)| null
     */
	public function getCreatedOn($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$created_on_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($created_on_)>0 ? $created_on_ [0] ['created_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_by 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (created_by)| null
     */
	public function getCreatedBy($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$created_by_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($created_by_)>0 ? $created_by_ [0] ['created_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (updated_on)| null
     */
	public function getUpdatedOn($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$updated_on_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($updated_on_)>0 ? $updated_on_ [0] ['updated_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by 
     * based on the value of $dm_id passed to the function
     *
     * @param $dm_id
     * @return object (updated_by)| null
     */
	public function getUpdatedBy($dm_id) {
		$columns = array ('dm_id');
		$records = array ($dm_id);
		$updated_by_ = $this->query_from_data_manager ( $columns, $records );
		return sizeof($updated_by_)>0 ? $updated_by_ [0] ['updated_by'] : null;
	}
	

	
	   /**
	* Inserts data into the table[data_manager] in the order below
	* array ('dm_id','primary_email','password','institute','first_name','last_name','phone','secondary_email','UserFld1','UserFld2','UserFld3','mobile','force_password_reset','qc_access','enable_adding_test_response_date','status','created_on','created_by','updated_on','updated_by')
	* is mapped into
	* array ($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check= false, $printSQL = false) {
		$columns = array('dm_id','primary_email','password','institute','first_name','last_name','phone','secondary_email','UserFld1','UserFld2','UserFld3','mobile','force_password_reset','qc_access','enable_adding_test_response_date','status','created_on','created_by','updated_on','updated_by');
		$records = array($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by);
		return $this->insert_records_to_data_manager ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[data_manager] in the order below
    * array ('dm_id','primary_email','password','institute','first_name','last_name','phone','secondary_email','UserFld1','UserFld2','UserFld3','mobile','force_password_reset','qc_access','enable_adding_test_response_date','status','created_on','created_by','updated_on','updated_by')
    * is mapped into
    * array ($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by, $printSQL = false) {
    	$columns = array('dm_id','primary_email','password','institute','first_name','last_name','phone','secondary_email','UserFld1','UserFld2','UserFld3','mobile','force_password_reset','qc_access','enable_adding_test_response_date','status','created_on','created_by','updated_on','updated_by');
    	$records = array($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by);
    	return $this->delete_record_from_data_manager( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'data_manager' 
	*/
	public static function get_table() {
		return 'data_manager';
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
     * Used  to calculate the number of times a record exists in the table data_manager
     * It returns the number of times a record exists exists in the table data_manager
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table data_manager
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_data_manager(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table data_manager
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_data_manager(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table data_manager
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_data_manager(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'data_manager' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_data_manager($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table data_manager that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_data_manager(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table data_manager that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_data_manager(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table data_manager that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_data_manager(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [data_manager]
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
     * Inserts data into the table data_manager
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
     * Updates all the records that meets the passed criteria from the table data_manager
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
     * Gets an Associative array of the records in the table data_manager that meets the passed criteria
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
     * Gets an Associative array of the records in the table data_manager  that meets the passed criteria
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
     * Gets an Associative array of the records in the table data_manager that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table data_manager  that meets the passed criteria
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
