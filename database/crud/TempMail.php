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
* TempMail
*  
* Low level class for manipulating the data in the table temp_mail
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class TempMail {

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
	* private class variable $_tempId
	*/
	private $_tempId;
	
	/**
	* returns the value of $tempId
	*
	* @return object(int|string) tempId
	*/
	public function _getTempId() {
		return $this->_tempId;
	}
	
	/**
	* sets the value of $_tempId
	*
	* @param tempId
	*/
	public function _setTempId($tempId) {
		$this->_tempId = $tempId;
	}
	/**
	* sets the value of $_tempId
	*
	* @param tempId
	* @return object ( this class)
	*/
	public function setTempId($tempId) {
		$this->_setTempId($tempId);
		return $this;
	}
	
	
	/**
	* private class variable $_message
	*/
	private $_message;
	
	/**
	* returns the value of $message
	*
	* @return object(int|string) message
	*/
	public function _getMessage() {
		return $this->_message;
	}
	
	/**
	* sets the value of $_message
	*
	* @param message
	*/
	public function _setMessage($message) {
		$this->_message = $message;
	}
	/**
	* sets the value of $_message
	*
	* @param message
	* @return object ( this class)
	*/
	public function setMessage($message) {
		$this->_setMessage($message);
		return $this;
	}
	
	
	/**
	* private class variable $_fromMail
	*/
	private $_fromMail;
	
	/**
	* returns the value of $fromMail
	*
	* @return object(int|string) fromMail
	*/
	public function _getFromMail() {
		return $this->_fromMail;
	}
	
	/**
	* sets the value of $_fromMail
	*
	* @param fromMail
	*/
	public function _setFromMail($fromMail) {
		$this->_fromMail = $fromMail;
	}
	/**
	* sets the value of $_fromMail
	*
	* @param fromMail
	* @return object ( this class)
	*/
	public function setFromMail($fromMail) {
		$this->_setFromMail($fromMail);
		return $this;
	}
	
	
	/**
	* private class variable $_toEmail
	*/
	private $_toEmail;
	
	/**
	* returns the value of $toEmail
	*
	* @return object(int|string) toEmail
	*/
	public function _getToEmail() {
		return $this->_toEmail;
	}
	
	/**
	* sets the value of $_toEmail
	*
	* @param toEmail
	*/
	public function _setToEmail($toEmail) {
		$this->_toEmail = $toEmail;
	}
	/**
	* sets the value of $_toEmail
	*
	* @param toEmail
	* @return object ( this class)
	*/
	public function setToEmail($toEmail) {
		$this->_setToEmail($toEmail);
		return $this;
	}
	
	
	/**
	* private class variable $_bcc
	*/
	private $_bcc;
	
	/**
	* returns the value of $bcc
	*
	* @return object(int|string) bcc
	*/
	public function _getBcc() {
		return $this->_bcc;
	}
	
	/**
	* sets the value of $_bcc
	*
	* @param bcc
	*/
	public function _setBcc($bcc) {
		$this->_bcc = $bcc;
	}
	/**
	* sets the value of $_bcc
	*
	* @param bcc
	* @return object ( this class)
	*/
	public function setBcc($bcc) {
		$this->_setBcc($bcc);
		return $this;
	}
	
	
	/**
	* private class variable $_cc
	*/
	private $_cc;
	
	/**
	* returns the value of $cc
	*
	* @return object(int|string) cc
	*/
	public function _getCc() {
		return $this->_cc;
	}
	
	/**
	* sets the value of $_cc
	*
	* @param cc
	*/
	public function _setCc($cc) {
		$this->_cc = $cc;
	}
	/**
	* sets the value of $_cc
	*
	* @param cc
	* @return object ( this class)
	*/
	public function setCc($cc) {
		$this->_setCc($cc);
		return $this;
	}
	
	
	/**
	* private class variable $_subject
	*/
	private $_subject;
	
	/**
	* returns the value of $subject
	*
	* @return object(int|string) subject
	*/
	public function _getSubject() {
		return $this->_subject;
	}
	
	/**
	* sets the value of $_subject
	*
	* @param subject
	*/
	public function _setSubject($subject) {
		$this->_subject = $subject;
	}
	/**
	* sets the value of $_subject
	*
	* @param subject
	* @return object ( this class)
	*/
	public function setSubject($subject) {
		$this->_setSubject($subject);
		return $this;
	}
	
	
	/**
	* private class variable $_fromFullName
	*/
	private $_fromFullName;
	
	/**
	* returns the value of $fromFullName
	*
	* @return object(int|string) fromFullName
	*/
	public function _getFromFullName() {
		return $this->_fromFullName;
	}
	
	/**
	* sets the value of $_fromFullName
	*
	* @param fromFullName
	*/
	public function _setFromFullName($fromFullName) {
		$this->_fromFullName = $fromFullName;
	}
	/**
	* sets the value of $_fromFullName
	*
	* @param fromFullName
	* @return object ( this class)
	*/
	public function setFromFullName($fromFullName) {
		$this->_setFromFullName($fromFullName);
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
     * Performs a database query and returns the value of temp_id 
     * based on the value of $temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status passed to the function
     *
     * @param $temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status
     * @return object (temp_id)| null
     */
	public function getTempId($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status) {
		$columns = array ('temp_id','message','from_mail','to_email','bcc','cc','subject','from_full_name','status');
		$records = array ($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status);
		$temp_id_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($temp_id_)>0 ? $temp_id_ [0] ['temp_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of message 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (message)| null
     */
	public function getMessage($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$message_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($message_)>0 ? $message_ [0] ['message'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of from_mail 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (from_mail)| null
     */
	public function getFromMail($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$from_mail_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($from_mail_)>0 ? $from_mail_ [0] ['from_mail'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of to_email 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (to_email)| null
     */
	public function getToEmail($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$to_email_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($to_email_)>0 ? $to_email_ [0] ['to_email'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of bcc 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (bcc)| null
     */
	public function getBcc($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$bcc_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($bcc_)>0 ? $bcc_ [0] ['bcc'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of cc 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (cc)| null
     */
	public function getCc($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$cc_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($cc_)>0 ? $cc_ [0] ['cc'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of subject 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (subject)| null
     */
	public function getSubject($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$subject_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($subject_)>0 ? $subject_ [0] ['subject'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of from_full_name 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (from_full_name)| null
     */
	public function getFromFullName($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$from_full_name_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($from_full_name_)>0 ? $from_full_name_ [0] ['from_full_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of status 
     * based on the value of $temp_id passed to the function
     *
     * @param $temp_id
     * @return object (status)| null
     */
	public function getStatus($temp_id) {
		$columns = array ('temp_id');
		$records = array ($temp_id);
		$status_ = $this->query_from_temp_mail ( $columns, $records );
		return sizeof($status_)>0 ? $status_ [0] ['status'] : null;
	}
	

	
	   /**
	* Inserts data into the table[temp_mail] in the order below
	* array ('temp_id','message','from_mail','to_email','bcc','cc','subject','from_full_name','status')
	* is mapped into
	* array ($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('temp_id','message','from_mail','to_email','bcc','cc','subject','from_full_name','status');
		$records = array($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status);
		return $this->insert_records_to_temp_mail ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[temp_mail] in the order below
    * array ('temp_id','message','from_mail','to_email','bcc','cc','subject','from_full_name','status')
    * is mapped into
    * array ($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status, $printSQL = false) {
    	$columns = array('temp_id','message','from_mail','to_email','bcc','cc','subject','from_full_name','status');
    	$records = array($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status);
    	return $this->delete_record_from_temp_mail( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'temp_mail' 
	*/
	public static function get_table() {
		return 'temp_mail';
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
     * Used  to calculate the number of times a record exists in the table temp_mail
     * It returns the number of times a record exists exists in the table temp_mail
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table temp_mail
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_temp_mail(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table temp_mail
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_temp_mail(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table temp_mail
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_temp_mail(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'temp_mail' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_temp_mail($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table temp_mail that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_temp_mail(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table temp_mail that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_temp_mail(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table temp_mail that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_temp_mail(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [temp_mail]
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
     * Inserts data into the table temp_mail
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
     * Updates all the records that meets the passed criteria from the table temp_mail
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
     * Gets an Associative array of the records in the table temp_mail that meets the passed criteria
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
     * Gets an Associative array of the records in the table temp_mail  that meets the passed criteria
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
     * Gets an Associative array of the records in the table temp_mail that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table temp_mail  that meets the passed criteria
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
