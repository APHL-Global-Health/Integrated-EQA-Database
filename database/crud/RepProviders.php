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
* RepProviders
*  
* Low level class for manipulating the data in the table rep_providers
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RepProviders {

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
	* private class variable $_providerName
	*/
	private $_providerName;
	
	/**
	* returns the value of $providerName
	*
	* @return object(int|string) providerName
	*/
	public function _getProviderName() {
		return $this->_providerName;
	}
	
	/**
	* sets the value of $_providerName
	*
	* @param providerName
	*/
	public function _setProviderName($providerName) {
		$this->_providerName = $providerName;
	}
	/**
	* sets the value of $_providerName
	*
	* @param providerName
	* @return object ( this class)
	*/
	public function setProviderName($providerName) {
		$this->_setProviderName($providerName);
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
	* private class variable $_telephone
	*/
	private $_telephone;
	
	/**
	* returns the value of $telephone
	*
	* @return object(int|string) telephone
	*/
	public function _getTelephone() {
		return $this->_telephone;
	}
	
	/**
	* sets the value of $_telephone
	*
	* @param telephone
	*/
	public function _setTelephone($telephone) {
		$this->_telephone = $telephone;
	}
	/**
	* sets the value of $_telephone
	*
	* @param telephone
	* @return object ( this class)
	*/
	public function setTelephone($telephone) {
		$this->_setTelephone($telephone);
		return $this;
	}
	
	
	/**
	* private class variable $_postalCode
	*/
	private $_postalCode;
	
	/**
	* returns the value of $postalCode
	*
	* @return object(int|string) postalCode
	*/
	public function _getPostalCode() {
		return $this->_postalCode;
	}
	
	/**
	* sets the value of $_postalCode
	*
	* @param postalCode
	*/
	public function _setPostalCode($postalCode) {
		$this->_postalCode = $postalCode;
	}
	/**
	* sets the value of $_postalCode
	*
	* @param postalCode
	* @return object ( this class)
	*/
	public function setPostalCode($postalCode) {
		$this->_setPostalCode($postalCode);
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
	* private class variable $_contactTelephone
	*/
	private $_contactTelephone;
	
	/**
	* returns the value of $contactTelephone
	*
	* @return object(int|string) contactTelephone
	*/
	public function _getContactTelephone() {
		return $this->_contactTelephone;
	}
	
	/**
	* sets the value of $_contactTelephone
	*
	* @param contactTelephone
	*/
	public function _setContactTelephone($contactTelephone) {
		$this->_contactTelephone = $contactTelephone;
	}
	/**
	* sets the value of $_contactTelephone
	*
	* @param contactTelephone
	* @return object ( this class)
	*/
	public function setContactTelephone($contactTelephone) {
		$this->_setContactTelephone($contactTelephone);
		return $this;
	}
	
	
	/**
	* private class variable $_contactEmail
	*/
	private $_contactEmail;
	
	/**
	* returns the value of $contactEmail
	*
	* @return object(int|string) contactEmail
	*/
	public function _getContactEmail() {
		return $this->_contactEmail;
	}
	
	/**
	* sets the value of $_contactEmail
	*
	* @param contactEmail
	*/
	public function _setContactEmail($contactEmail) {
		$this->_contactEmail = $contactEmail;
	}
	/**
	* sets the value of $_contactEmail
	*
	* @param contactEmail
	* @return object ( this class)
	*/
	public function setContactEmail($contactEmail) {
		$this->_setContactEmail($contactEmail);
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
	* private class variable $_createdDate
	*/
	private $_createdDate;
	
	/**
	* returns the value of $createdDate
	*
	* @return object(int|string) createdDate
	*/
	public function _getCreatedDate() {
		return $this->_createdDate;
	}
	
	/**
	* sets the value of $_createdDate
	*
	* @param createdDate
	*/
	public function _setCreatedDate($createdDate) {
		$this->_createdDate = $createdDate;
	}
	/**
	* sets the value of $_createdDate
	*
	* @param createdDate
	* @return object ( this class)
	*/
	public function setCreatedDate($createdDate) {
		$this->_setCreatedDate($createdDate);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of ProviderID 
     * based on the value of $ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate passed to the function
     *
     * @param $ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate
     * @return object (ProviderID)| null
     */
	public function getProviderID($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate) {
		$columns = array ('ProviderID','ProviderName','Email','Address','Telephone','PostalCode','ContactName','ContactTelephone','ContactEmail','Status','CreatedBy','CreatedDate');
		$records = array ($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate);
		$ProviderID_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($ProviderID_)>0 ? $ProviderID_ [0] ['ProviderID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ProviderName 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (ProviderName)| null
     */
	public function getProviderName($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$ProviderName_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($ProviderName_)>0 ? $ProviderName_ [0] ['ProviderName'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Email 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (Email)| null
     */
	public function getEmail($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$Email_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($Email_)>0 ? $Email_ [0] ['Email'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Address 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (Address)| null
     */
	public function getAddress($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$Address_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($Address_)>0 ? $Address_ [0] ['Address'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Telephone 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (Telephone)| null
     */
	public function getTelephone($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$Telephone_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($Telephone_)>0 ? $Telephone_ [0] ['Telephone'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of PostalCode 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (PostalCode)| null
     */
	public function getPostalCode($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$PostalCode_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($PostalCode_)>0 ? $PostalCode_ [0] ['PostalCode'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ContactName 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (ContactName)| null
     */
	public function getContactName($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$ContactName_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($ContactName_)>0 ? $ContactName_ [0] ['ContactName'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ContactTelephone 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (ContactTelephone)| null
     */
	public function getContactTelephone($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$ContactTelephone_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($ContactTelephone_)>0 ? $ContactTelephone_ [0] ['ContactTelephone'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ContactEmail 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (ContactEmail)| null
     */
	public function getContactEmail($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$ContactEmail_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($ContactEmail_)>0 ? $ContactEmail_ [0] ['ContactEmail'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Status 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (Status)| null
     */
	public function getStatus($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$Status_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($Status_)>0 ? $Status_ [0] ['Status'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of CreatedBy 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (CreatedBy)| null
     */
	public function getCreatedBy($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$CreatedBy_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($CreatedBy_)>0 ? $CreatedBy_ [0] ['CreatedBy'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of CreatedDate 
     * based on the value of $ProviderID passed to the function
     *
     * @param $ProviderID
     * @return object (CreatedDate)| null
     */
	public function getCreatedDate($ProviderID) {
		$columns = array ('ProviderID');
		$records = array ($ProviderID);
		$CreatedDate_ = $this->query_from_rep_providers ( $columns, $records );
		return sizeof($CreatedDate_)>0 ? $CreatedDate_ [0] ['CreatedDate'] : null;
	}
	

	
	   /**
	* Inserts data into the table[rep_providers] in the order below
	* array ('ProviderID','ProviderName','Email','Address','Telephone','PostalCode','ContactName','ContactTelephone','ContactEmail','Status','CreatedBy','CreatedDate')
	* is mapped into
	* array ($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate,$redundancy_check= false, $printSQL = false) {
		$columns = array('ProviderID','ProviderName','Email','Address','Telephone','PostalCode','ContactName','ContactTelephone','ContactEmail','Status','CreatedBy','CreatedDate');
		$records = array($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate);
		return $this->insert_records_to_rep_providers ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[rep_providers] in the order below
    * array ('ProviderID','ProviderName','Email','Address','Telephone','PostalCode','ContactName','ContactTelephone','ContactEmail','Status','CreatedBy','CreatedDate')
    * is mapped into
    * array ($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate, $printSQL = false) {
    	$columns = array('ProviderID','ProviderName','Email','Address','Telephone','PostalCode','ContactName','ContactTelephone','ContactEmail','Status','CreatedBy','CreatedDate');
    	$records = array($ProviderID,$ProviderName,$Email,$Address,$Telephone,$PostalCode,$ContactName,$ContactTelephone,$ContactEmail,$Status,$CreatedBy,$CreatedDate);
    	return $this->delete_record_from_rep_providers( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'rep_providers' 
	*/
	public static function get_table() {
		return 'rep_providers';
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
     * Used  to calculate the number of times a record exists in the table rep_providers
     * It returns the number of times a record exists exists in the table rep_providers
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table rep_providers
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_rep_providers(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table rep_providers
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_rep_providers(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table rep_providers
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_rep_providers(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'rep_providers' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_rep_providers($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_providers that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_rep_providers(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_providers that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_rep_providers(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table rep_providers that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_rep_providers(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [rep_providers]
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
     * Inserts data into the table rep_providers
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
     * Updates all the records that meets the passed criteria from the table rep_providers
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
     * Gets an Associative array of the records in the table rep_providers that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_providers  that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_providers that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table rep_providers  that meets the passed criteria
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
