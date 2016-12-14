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
* Enrollments
*  
* Low level class for manipulating the data in the table enrollments
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class Enrollments {

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
	* private class variable $_schemeId
	*/
	private $_schemeId;
	
	/**
	* returns the value of $schemeId
	*
	* @return object(int|string) schemeId
	*/
	public function _getSchemeId() {
		return $this->_schemeId;
	}
	
	/**
	* sets the value of $_schemeId
	*
	* @param schemeId
	*/
	public function _setSchemeId($schemeId) {
		$this->_schemeId = $schemeId;
	}
	/**
	* sets the value of $_schemeId
	*
	* @param schemeId
	* @return object ( this class)
	*/
	public function setSchemeId($schemeId) {
		$this->_setSchemeId($schemeId);
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
	* private class variable $_enrolledOn
	*/
	private $_enrolledOn;
	
	/**
	* returns the value of $enrolledOn
	*
	* @return object(int|string) enrolledOn
	*/
	public function _getEnrolledOn() {
		return $this->_enrolledOn;
	}
	
	/**
	* sets the value of $_enrolledOn
	*
	* @param enrolledOn
	*/
	public function _setEnrolledOn($enrolledOn) {
		$this->_enrolledOn = $enrolledOn;
	}
	/**
	* sets the value of $_enrolledOn
	*
	* @param enrolledOn
	* @return object ( this class)
	*/
	public function setEnrolledOn($enrolledOn) {
		$this->_setEnrolledOn($enrolledOn);
		return $this;
	}
	
	
	/**
	* private class variable $_enrollmentEndedOn
	*/
	private $_enrollmentEndedOn;
	
	/**
	* returns the value of $enrollmentEndedOn
	*
	* @return object(int|string) enrollmentEndedOn
	*/
	public function _getEnrollmentEndedOn() {
		return $this->_enrollmentEndedOn;
	}
	
	/**
	* sets the value of $_enrollmentEndedOn
	*
	* @param enrollmentEndedOn
	*/
	public function _setEnrollmentEndedOn($enrollmentEndedOn) {
		$this->_enrollmentEndedOn = $enrollmentEndedOn;
	}
	/**
	* sets the value of $_enrollmentEndedOn
	*
	* @param enrollmentEndedOn
	* @return object ( this class)
	*/
	public function setEnrollmentEndedOn($enrollmentEndedOn) {
		$this->_setEnrollmentEndedOn($enrollmentEndedOn);
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
     * based on the value of $scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status passed to the function
     *
     * @param $scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status
     * @return object (participant_id)| null
     */
	public function getParticipantId($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status) {
		$columns = array ('scheme_id','participant_id','enrolled_on','enrollment_ended_on','status');
		$records = array ($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status);
		$participant_id_ = $this->query_from_enrollments ( $columns, $records );
		return sizeof($participant_id_)>0 ? $participant_id_ [0] ['participant_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of scheme_id 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (scheme_id)| null
     */
	public function getSchemeId($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$scheme_id_ = $this->query_from_enrollments ( $columns, $records );
		return sizeof($scheme_id_)>0 ? $scheme_id_ [0] ['scheme_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of enrolled_on 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (enrolled_on)| null
     */
	public function getEnrolledOn($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$enrolled_on_ = $this->query_from_enrollments ( $columns, $records );
		return sizeof($enrolled_on_)>0 ? $enrolled_on_ [0] ['enrolled_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of enrollment_ended_on 
     * based on the value of $participant_id passed to the function
     *
     * @param $participant_id
     * @return object (enrollment_ended_on)| null
     */
	public function getEnrollmentEndedOn($participant_id) {
		$columns = array ('participant_id');
		$records = array ($participant_id);
		$enrollment_ended_on_ = $this->query_from_enrollments ( $columns, $records );
		return sizeof($enrollment_ended_on_)>0 ? $enrollment_ended_on_ [0] ['enrollment_ended_on'] : null;
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
		$status_ = $this->query_from_enrollments ( $columns, $records );
		return sizeof($status_)>0 ? $status_ [0] ['status'] : null;
	}
	

	
	   /**
	* Inserts data into the table[enrollments] in the order below
	* array ('scheme_id','participant_id','enrolled_on','enrollment_ended_on','status')
	* is mapped into
	* array ($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('scheme_id','participant_id','enrolled_on','enrollment_ended_on','status');
		$records = array($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status);
		return $this->insert_records_to_enrollments ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[enrollments] in the order below
    * array ('scheme_id','participant_id','enrolled_on','enrollment_ended_on','status')
    * is mapped into
    * array ($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status, $printSQL = false) {
    	$columns = array('scheme_id','participant_id','enrolled_on','enrollment_ended_on','status');
    	$records = array($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status);
    	return $this->delete_record_from_enrollments( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'enrollments' 
	*/
	public static function get_table() {
		return 'enrollments';
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
     * Used  to calculate the number of times a record exists in the table enrollments
     * It returns the number of times a record exists exists in the table enrollments
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table enrollments
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_enrollments(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table enrollments
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_enrollments(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table enrollments
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_enrollments(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'enrollments' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_enrollments($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table enrollments that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_enrollments(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table enrollments that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_enrollments(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table enrollments that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_enrollments(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [enrollments]
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
     * Inserts data into the table enrollments
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
     * Updates all the records that meets the passed criteria from the table enrollments
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
     * Gets an Associative array of the records in the table enrollments that meets the passed criteria
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
     * Gets an Associative array of the records in the table enrollments  that meets the passed criteria
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
     * Gets an Associative array of the records in the table enrollments that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table enrollments  that meets the passed criteria
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
