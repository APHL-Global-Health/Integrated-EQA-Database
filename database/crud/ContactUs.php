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
* ContactUs
*  
* Low level class for manipulating the data in the table contact_us
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ContactUs {

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
	* private class variable $_contactId
	*/
	private $_contactId;
	
	/**
	* returns the value of $contactId
	*
	* @return object(int|string) contactId
	*/
	public function _getContactId() {
		return $this->_contactId;
	}
	
	/**
	* sets the value of $_contactId
	*
	* @param contactId
	*/
	public function _setContactId($contactId) {
		$this->_contactId = $contactId;
	}
	/**
	* sets the value of $_contactId
	*
	* @param contactId
	* @return object ( this class)
	*/
	public function setContactId($contactId) {
		$this->_setContactId($contactId);
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
	* private class variable $_reason
	*/
	private $_reason;
	
	/**
	* returns the value of $reason
	*
	* @return object(int|string) reason
	*/
	public function _getReason() {
		return $this->_reason;
	}
	
	/**
	* sets the value of $_reason
	*
	* @param reason
	*/
	public function _setReason($reason) {
		$this->_reason = $reason;
	}
	/**
	* sets the value of $_reason
	*
	* @param reason
	* @return object ( this class)
	*/
	public function setReason($reason) {
		$this->_setReason($reason);
		return $this;
	}
	
	
	/**
	* private class variable $_lab
	*/
	private $_lab;
	
	/**
	* returns the value of $lab
	*
	* @return object(int|string) lab
	*/
	public function _getLab() {
		return $this->_lab;
	}
	
	/**
	* sets the value of $_lab
	*
	* @param lab
	*/
	public function _setLab($lab) {
		$this->_lab = $lab;
	}
	/**
	* sets the value of $_lab
	*
	* @param lab
	* @return object ( this class)
	*/
	public function setLab($lab) {
		$this->_setLab($lab);
		return $this;
	}
	
	
	/**
	* private class variable $_additionalInfo
	*/
	private $_additionalInfo;
	
	/**
	* returns the value of $additionalInfo
	*
	* @return object(int|string) additionalInfo
	*/
	public function _getAdditionalInfo() {
		return $this->_additionalInfo;
	}
	
	/**
	* sets the value of $_additionalInfo
	*
	* @param additionalInfo
	*/
	public function _setAdditionalInfo($additionalInfo) {
		$this->_additionalInfo = $additionalInfo;
	}
	/**
	* sets the value of $_additionalInfo
	*
	* @param additionalInfo
	* @return object ( this class)
	*/
	public function setAdditionalInfo($additionalInfo) {
		$this->_setAdditionalInfo($additionalInfo);
		return $this;
	}
	
	
	/**
	* private class variable $_contactedOn
	*/
	private $_contactedOn;
	
	/**
	* returns the value of $contactedOn
	*
	* @return object(int|string) contactedOn
	*/
	public function _getContactedOn() {
		return $this->_contactedOn;
	}
	
	/**
	* sets the value of $_contactedOn
	*
	* @param contactedOn
	*/
	public function _setContactedOn($contactedOn) {
		$this->_contactedOn = $contactedOn;
	}
	/**
	* sets the value of $_contactedOn
	*
	* @param contactedOn
	* @return object ( this class)
	*/
	public function setContactedOn($contactedOn) {
		$this->_setContactedOn($contactedOn);
		return $this;
	}
	
	
	/**
	* private class variable $_ipAddress
	*/
	private $_ipAddress;
	
	/**
	* returns the value of $ipAddress
	*
	* @return object(int|string) ipAddress
	*/
	public function _getIpAddress() {
		return $this->_ipAddress;
	}
	
	/**
	* sets the value of $_ipAddress
	*
	* @param ipAddress
	*/
	public function _setIpAddress($ipAddress) {
		$this->_ipAddress = $ipAddress;
	}
	/**
	* sets the value of $_ipAddress
	*
	* @param ipAddress
	* @return object ( this class)
	*/
	public function setIpAddress($ipAddress) {
		$this->_setIpAddress($ipAddress);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of contact_id 
     * based on the value of $contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address passed to the function
     *
     * @param $contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address
     * @return object (contact_id)| null
     */
	public function getContactId($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address) {
		$columns = array ('contact_id','first_name','last_name','email','phone','reason','lab','additional_info','contacted_on','ip_address');
		$records = array ($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address);
		$contact_id_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($contact_id_)>0 ? $contact_id_ [0] ['contact_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of first_name 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (first_name)| null
     */
	public function getFirstName($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$first_name_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($first_name_)>0 ? $first_name_ [0] ['first_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of last_name 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (last_name)| null
     */
	public function getLastName($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$last_name_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($last_name_)>0 ? $last_name_ [0] ['last_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of email 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (email)| null
     */
	public function getEmail($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$email_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($email_)>0 ? $email_ [0] ['email'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of phone 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (phone)| null
     */
	public function getPhone($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$phone_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($phone_)>0 ? $phone_ [0] ['phone'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of reason 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (reason)| null
     */
	public function getReason($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$reason_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($reason_)>0 ? $reason_ [0] ['reason'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lab 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (lab)| null
     */
	public function getLab($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$lab_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($lab_)>0 ? $lab_ [0] ['lab'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of additional_info 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (additional_info)| null
     */
	public function getAdditionalInfo($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$additional_info_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($additional_info_)>0 ? $additional_info_ [0] ['additional_info'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of contacted_on 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (contacted_on)| null
     */
	public function getContactedOn($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$contacted_on_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($contacted_on_)>0 ? $contacted_on_ [0] ['contacted_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ip_address 
     * based on the value of $contact_id passed to the function
     *
     * @param $contact_id
     * @return object (ip_address)| null
     */
	public function getIpAddress($contact_id) {
		$columns = array ('contact_id');
		$records = array ($contact_id);
		$ip_address_ = $this->query_from_contact_us ( $columns, $records );
		return sizeof($ip_address_)>0 ? $ip_address_ [0] ['ip_address'] : null;
	}
	

	
	   /**
	* Inserts data into the table[contact_us] in the order below
	* array ('contact_id','first_name','last_name','email','phone','reason','lab','additional_info','contacted_on','ip_address')
	* is mapped into
	* array ($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address,$redundancy_check= false, $printSQL = false) {
		$columns = array('contact_id','first_name','last_name','email','phone','reason','lab','additional_info','contacted_on','ip_address');
		$records = array($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address);
		return $this->insert_records_to_contact_us ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[contact_us] in the order below
    * array ('contact_id','first_name','last_name','email','phone','reason','lab','additional_info','contacted_on','ip_address')
    * is mapped into
    * array ($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address, $printSQL = false) {
    	$columns = array('contact_id','first_name','last_name','email','phone','reason','lab','additional_info','contacted_on','ip_address');
    	$records = array($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address);
    	return $this->delete_record_from_contact_us( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'contact_us' 
	*/
	public static function get_table() {
		return 'contact_us';
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
     * Used  to calculate the number of times a record exists in the table contact_us
     * It returns the number of times a record exists exists in the table contact_us
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table contact_us
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_contact_us(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table contact_us
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_contact_us(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table contact_us
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_contact_us(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'contact_us' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_contact_us($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table contact_us that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_contact_us(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table contact_us that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_contact_us(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table contact_us that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_contact_us(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [contact_us]
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
     * Inserts data into the table contact_us
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
     * Updates all the records that meets the passed criteria from the table contact_us
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
     * Gets an Associative array of the records in the table contact_us that meets the passed criteria
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
     * Gets an Associative array of the records in the table contact_us  that meets the passed criteria
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
     * Gets an Associative array of the records in the table contact_us that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table contact_us  that meets the passed criteria
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
