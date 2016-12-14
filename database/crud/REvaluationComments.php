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
* REvaluationComments
*  
* Low level class for manipulating the data in the table r_evaluation_comments
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class REvaluationComments {

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
	* private class variable $_commentId
	*/
	private $_commentId;
	
	/**
	* returns the value of $commentId
	*
	* @return object(int|string) commentId
	*/
	public function _getCommentId() {
		return $this->_commentId;
	}
	
	/**
	* sets the value of $_commentId
	*
	* @param commentId
	*/
	public function _setCommentId($commentId) {
		$this->_commentId = $commentId;
	}
	/**
	* sets the value of $_commentId
	*
	* @param commentId
	* @return object ( this class)
	*/
	public function setCommentId($commentId) {
		$this->_setCommentId($commentId);
		return $this;
	}
	
	
	/**
	* private class variable $_scheme
	*/
	private $_scheme;
	
	/**
	* returns the value of $scheme
	*
	* @return object(int|string) scheme
	*/
	public function _getScheme() {
		return $this->_scheme;
	}
	
	/**
	* sets the value of $_scheme
	*
	* @param scheme
	*/
	public function _setScheme($scheme) {
		$this->_scheme = $scheme;
	}
	/**
	* sets the value of $_scheme
	*
	* @param scheme
	* @return object ( this class)
	*/
	public function setScheme($scheme) {
		$this->_setScheme($scheme);
		return $this;
	}
	
	
	/**
	* private class variable $_comment
	*/
	private $_comment;
	
	/**
	* returns the value of $comment
	*
	* @return object(int|string) comment
	*/
	public function _getComment() {
		return $this->_comment;
	}
	
	/**
	* sets the value of $_comment
	*
	* @param comment
	*/
	public function _setComment($comment) {
		$this->_comment = $comment;
	}
	/**
	* sets the value of $_comment
	*
	* @param comment
	* @return object ( this class)
	*/
	public function setComment($comment) {
		$this->_setComment($comment);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of comment_id 
     * based on the value of $comment_id,$scheme,$comment passed to the function
     *
     * @param $comment_id,$scheme,$comment
     * @return object (comment_id)| null
     */
	public function getCommentId($comment_id,$scheme,$comment) {
		$columns = array ('comment_id','scheme','comment');
		$records = array ($comment_id,$scheme,$comment);
		$comment_id_ = $this->query_from_r_evaluation_comments ( $columns, $records );
		return sizeof($comment_id_)>0 ? $comment_id_ [0] ['comment_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of scheme 
     * based on the value of $comment_id passed to the function
     *
     * @param $comment_id
     * @return object (scheme)| null
     */
	public function getScheme($comment_id) {
		$columns = array ('comment_id');
		$records = array ($comment_id);
		$scheme_ = $this->query_from_r_evaluation_comments ( $columns, $records );
		return sizeof($scheme_)>0 ? $scheme_ [0] ['scheme'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of comment 
     * based on the value of $comment_id passed to the function
     *
     * @param $comment_id
     * @return object (comment)| null
     */
	public function getComment($comment_id) {
		$columns = array ('comment_id');
		$records = array ($comment_id);
		$comment_ = $this->query_from_r_evaluation_comments ( $columns, $records );
		return sizeof($comment_)>0 ? $comment_ [0] ['comment'] : null;
	}
	

	
	   /**
	* Inserts data into the table[r_evaluation_comments] in the order below
	* array ('comment_id','scheme','comment')
	* is mapped into
	* array ($comment_id,$scheme,$comment)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($comment_id,$scheme,$comment,$redundancy_check= false, $printSQL = false) {
		$columns = array('comment_id','scheme','comment');
		$records = array($comment_id,$scheme,$comment);
		return $this->insert_records_to_r_evaluation_comments ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[r_evaluation_comments] in the order below
    * array ('comment_id','scheme','comment')
    * is mapped into
    * array ($comment_id,$scheme,$comment)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($comment_id,$scheme,$comment, $printSQL = false) {
    	$columns = array('comment_id','scheme','comment');
    	$records = array($comment_id,$scheme,$comment);
    	return $this->delete_record_from_r_evaluation_comments( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'r_evaluation_comments' 
	*/
	public static function get_table() {
		return 'r_evaluation_comments';
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
     * Used  to calculate the number of times a record exists in the table r_evaluation_comments
     * It returns the number of times a record exists exists in the table r_evaluation_comments
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table r_evaluation_comments
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_r_evaluation_comments(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table r_evaluation_comments
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_r_evaluation_comments(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table r_evaluation_comments
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_r_evaluation_comments(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'r_evaluation_comments' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_r_evaluation_comments($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_evaluation_comments that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_r_evaluation_comments(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_evaluation_comments that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_r_evaluation_comments(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table r_evaluation_comments that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_r_evaluation_comments(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [r_evaluation_comments]
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
     * Inserts data into the table r_evaluation_comments
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
     * Updates all the records that meets the passed criteria from the table r_evaluation_comments
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
     * Gets an Associative array of the records in the table r_evaluation_comments that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_evaluation_comments  that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_evaluation_comments that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table r_evaluation_comments  that meets the passed criteria
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
