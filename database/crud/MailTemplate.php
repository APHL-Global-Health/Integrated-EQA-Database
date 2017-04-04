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
* MailTemplate
*  
* Low level class for manipulating the data in the table mail_template
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class MailTemplate {

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
	* private class variable $_mailTempId
	*/
	private $_mailTempId;
	
	/**
	* returns the value of $mailTempId
	*
	* @return object(int|string) mailTempId
	*/
	public function _getMailTempId() {
		return $this->_mailTempId;
	}
	
	/**
	* sets the value of $_mailTempId
	*
	* @param mailTempId
	*/
	public function _setMailTempId($mailTempId) {
		$this->_mailTempId = $mailTempId;
	}
	/**
	* sets the value of $_mailTempId
	*
	* @param mailTempId
	* @return object ( this class)
	*/
	public function setMailTempId($mailTempId) {
		$this->_setMailTempId($mailTempId);
		return $this;
	}
	
	
	/**
	* private class variable $_mailPurpose
	*/
	private $_mailPurpose;
	
	/**
	* returns the value of $mailPurpose
	*
	* @return object(int|string) mailPurpose
	*/
	public function _getMailPurpose() {
		return $this->_mailPurpose;
	}
	
	/**
	* sets the value of $_mailPurpose
	*
	* @param mailPurpose
	*/
	public function _setMailPurpose($mailPurpose) {
		$this->_mailPurpose = $mailPurpose;
	}
	/**
	* sets the value of $_mailPurpose
	*
	* @param mailPurpose
	* @return object ( this class)
	*/
	public function setMailPurpose($mailPurpose) {
		$this->_setMailPurpose($mailPurpose);
		return $this;
	}
	
	
	/**
	* private class variable $_fromName
	*/
	private $_fromName;
	
	/**
	* returns the value of $fromName
	*
	* @return object(int|string) fromName
	*/
	public function _getFromName() {
		return $this->_fromName;
	}
	
	/**
	* sets the value of $_fromName
	*
	* @param fromName
	*/
	public function _setFromName($fromName) {
		$this->_fromName = $fromName;
	}
	/**
	* sets the value of $_fromName
	*
	* @param fromName
	* @return object ( this class)
	*/
	public function setFromName($fromName) {
		$this->_setFromName($fromName);
		return $this;
	}
	
	
	/**
	* private class variable $_mailFrom
	*/
	private $_mailFrom;
	
	/**
	* returns the value of $mailFrom
	*
	* @return object(int|string) mailFrom
	*/
	public function _getMailFrom() {
		return $this->_mailFrom;
	}
	
	/**
	* sets the value of $_mailFrom
	*
	* @param mailFrom
	*/
	public function _setMailFrom($mailFrom) {
		$this->_mailFrom = $mailFrom;
	}
	/**
	* sets the value of $_mailFrom
	*
	* @param mailFrom
	* @return object ( this class)
	*/
	public function setMailFrom($mailFrom) {
		$this->_setMailFrom($mailFrom);
		return $this;
	}
	
	
	/**
	* private class variable $_mailCc
	*/
	private $_mailCc;
	
	/**
	* returns the value of $mailCc
	*
	* @return object(int|string) mailCc
	*/
	public function _getMailCc() {
		return $this->_mailCc;
	}
	
	/**
	* sets the value of $_mailCc
	*
	* @param mailCc
	*/
	public function _setMailCc($mailCc) {
		$this->_mailCc = $mailCc;
	}
	/**
	* sets the value of $_mailCc
	*
	* @param mailCc
	* @return object ( this class)
	*/
	public function setMailCc($mailCc) {
		$this->_setMailCc($mailCc);
		return $this;
	}
	
	
	/**
	* private class variable $_mailBcc
	*/
	private $_mailBcc;
	
	/**
	* returns the value of $mailBcc
	*
	* @return object(int|string) mailBcc
	*/
	public function _getMailBcc() {
		return $this->_mailBcc;
	}
	
	/**
	* sets the value of $_mailBcc
	*
	* @param mailBcc
	*/
	public function _setMailBcc($mailBcc) {
		$this->_mailBcc = $mailBcc;
	}
	/**
	* sets the value of $_mailBcc
	*
	* @param mailBcc
	* @return object ( this class)
	*/
	public function setMailBcc($mailBcc) {
		$this->_setMailBcc($mailBcc);
		return $this;
	}
	
	
	/**
	* private class variable $_mailSubject
	*/
	private $_mailSubject;
	
	/**
	* returns the value of $mailSubject
	*
	* @return object(int|string) mailSubject
	*/
	public function _getMailSubject() {
		return $this->_mailSubject;
	}
	
	/**
	* sets the value of $_mailSubject
	*
	* @param mailSubject
	*/
	public function _setMailSubject($mailSubject) {
		$this->_mailSubject = $mailSubject;
	}
	/**
	* sets the value of $_mailSubject
	*
	* @param mailSubject
	* @return object ( this class)
	*/
	public function setMailSubject($mailSubject) {
		$this->_setMailSubject($mailSubject);
		return $this;
	}
	
	
	/**
	* private class variable $_mailContent
	*/
	private $_mailContent;
	
	/**
	* returns the value of $mailContent
	*
	* @return object(int|string) mailContent
	*/
	public function _getMailContent() {
		return $this->_mailContent;
	}
	
	/**
	* sets the value of $_mailContent
	*
	* @param mailContent
	*/
	public function _setMailContent($mailContent) {
		$this->_mailContent = $mailContent;
	}
	/**
	* sets the value of $_mailContent
	*
	* @param mailContent
	* @return object ( this class)
	*/
	public function setMailContent($mailContent) {
		$this->_setMailContent($mailContent);
		return $this;
	}
	
	
	/**
	* private class variable $_mailFooter
	*/
	private $_mailFooter;
	
	/**
	* returns the value of $mailFooter
	*
	* @return object(int|string) mailFooter
	*/
	public function _getMailFooter() {
		return $this->_mailFooter;
	}
	
	/**
	* sets the value of $_mailFooter
	*
	* @param mailFooter
	*/
	public function _setMailFooter($mailFooter) {
		$this->_mailFooter = $mailFooter;
	}
	/**
	* sets the value of $_mailFooter
	*
	* @param mailFooter
	* @return object ( this class)
	*/
	public function setMailFooter($mailFooter) {
		$this->_setMailFooter($mailFooter);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of mail_temp_id 
     * based on the value of $mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer passed to the function
     *
     * @param $mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer
     * @return object (mail_temp_id)| null
     */
	public function getMailTempId($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer) {
		$columns = array ('mail_temp_id','mail_purpose','from_name','mail_from','mail_cc','mail_bcc','mail_subject','mail_content','mail_footer');
		$records = array ($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer);
		$mail_temp_id_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_temp_id_)>0 ? $mail_temp_id_ [0] ['mail_temp_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mail_purpose 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (mail_purpose)| null
     */
	public function getMailPurpose($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$mail_purpose_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_purpose_)>0 ? $mail_purpose_ [0] ['mail_purpose'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of from_name 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (from_name)| null
     */
	public function getFromName($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$from_name_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($from_name_)>0 ? $from_name_ [0] ['from_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mail_from 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (mail_from)| null
     */
	public function getMailFrom($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$mail_from_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_from_)>0 ? $mail_from_ [0] ['mail_from'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mail_cc 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (mail_cc)| null
     */
	public function getMailCc($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$mail_cc_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_cc_)>0 ? $mail_cc_ [0] ['mail_cc'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mail_bcc 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (mail_bcc)| null
     */
	public function getMailBcc($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$mail_bcc_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_bcc_)>0 ? $mail_bcc_ [0] ['mail_bcc'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mail_subject 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (mail_subject)| null
     */
	public function getMailSubject($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$mail_subject_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_subject_)>0 ? $mail_subject_ [0] ['mail_subject'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mail_content 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (mail_content)| null
     */
	public function getMailContent($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$mail_content_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_content_)>0 ? $mail_content_ [0] ['mail_content'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mail_footer 
     * based on the value of $mail_temp_id passed to the function
     *
     * @param $mail_temp_id
     * @return object (mail_footer)| null
     */
	public function getMailFooter($mail_temp_id) {
		$columns = array ('mail_temp_id');
		$records = array ($mail_temp_id);
		$mail_footer_ = $this->query_from_mail_template ( $columns, $records );
		return sizeof($mail_footer_)>0 ? $mail_footer_ [0] ['mail_footer'] : null;
	}
	

	
	   /**
	* Inserts data into the table[mail_template] in the order below
	* array ('mail_temp_id','mail_purpose','from_name','mail_from','mail_cc','mail_bcc','mail_subject','mail_content','mail_footer')
	* is mapped into
	* array ($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer,$redundancy_check= false, $printSQL = false) {
		$columns = array('mail_temp_id','mail_purpose','from_name','mail_from','mail_cc','mail_bcc','mail_subject','mail_content','mail_footer');
		$records = array($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer);
		return $this->insert_records_to_mail_template ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[mail_template] in the order below
    * array ('mail_temp_id','mail_purpose','from_name','mail_from','mail_cc','mail_bcc','mail_subject','mail_content','mail_footer')
    * is mapped into
    * array ($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer, $printSQL = false) {
    	$columns = array('mail_temp_id','mail_purpose','from_name','mail_from','mail_cc','mail_bcc','mail_subject','mail_content','mail_footer');
    	$records = array($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer);
    	return $this->delete_record_from_mail_template( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'mail_template' 
	*/
	public static function get_table() {
		return 'mail_template';
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
     * Used  to calculate the number of times a record exists in the table mail_template
     * It returns the number of times a record exists exists in the table mail_template
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table mail_template
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_mail_template(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table mail_template
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_mail_template(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table mail_template
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_mail_template(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'mail_template' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_mail_template($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table mail_template that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_mail_template(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table mail_template that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_mail_template(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table mail_template that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_mail_template(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [mail_template]
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
     * Inserts data into the table mail_template
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
     * Updates all the records that meets the passed criteria from the table mail_template
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
     * Gets an Associative array of the records in the table mail_template that meets the passed criteria
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
     * Gets an Associative array of the records in the table mail_template  that meets the passed criteria
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
     * Gets an Associative array of the records in the table mail_template that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table mail_template  that meets the passed criteria
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
