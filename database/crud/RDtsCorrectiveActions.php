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
* RDtsCorrectiveActions
*  
* Low level class for manipulating the data in the table r_dts_corrective_actions
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RDtsCorrectiveActions {

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
	* private class variable $_actionId
	*/
	private $_actionId;
	
	/**
	* returns the value of $actionId
	*
	* @return object(int|string) actionId
	*/
	public function _getActionId() {
		return $this->_actionId;
	}
	
	/**
	* sets the value of $_actionId
	*
	* @param actionId
	*/
	public function _setActionId($actionId) {
		$this->_actionId = $actionId;
	}
	/**
	* sets the value of $_actionId
	*
	* @param actionId
	* @return object ( this class)
	*/
	public function setActionId($actionId) {
		$this->_setActionId($actionId);
		return $this;
	}
	
	
	/**
	* private class variable $_correctiveAction
	*/
	private $_correctiveAction;
	
	/**
	* returns the value of $correctiveAction
	*
	* @return object(int|string) correctiveAction
	*/
	public function _getCorrectiveAction() {
		return $this->_correctiveAction;
	}
	
	/**
	* sets the value of $_correctiveAction
	*
	* @param correctiveAction
	*/
	public function _setCorrectiveAction($correctiveAction) {
		$this->_correctiveAction = $correctiveAction;
	}
	/**
	* sets the value of $_correctiveAction
	*
	* @param correctiveAction
	* @return object ( this class)
	*/
	public function setCorrectiveAction($correctiveAction) {
		$this->_setCorrectiveAction($correctiveAction);
		return $this;
	}
	
	
	/**
	* private class variable $_description
	*/
	private $_description;
	
	/**
	* returns the value of $description
	*
	* @return object(int|string) description
	*/
	public function _getDescription() {
		return $this->_description;
	}
	
	/**
	* sets the value of $_description
	*
	* @param description
	*/
	public function _setDescription($description) {
		$this->_description = $description;
	}
	/**
	* sets the value of $_description
	*
	* @param description
	* @return object ( this class)
	*/
	public function setDescription($description) {
		$this->_setDescription($description);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of action_id 
     * based on the value of $action_id,$corrective_action,$description passed to the function
     *
     * @param $action_id,$corrective_action,$description
     * @return object (action_id)| null
     */
	public function getActionId($action_id,$corrective_action,$description) {
		$columns = array ('action_id','corrective_action','description');
		$records = array ($action_id,$corrective_action,$description);
		$action_id_ = $this->query_from_r_dts_corrective_actions ( $columns, $records );
		return sizeof($action_id_)>0 ? $action_id_ [0] ['action_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of corrective_action 
     * based on the value of $action_id passed to the function
     *
     * @param $action_id
     * @return object (corrective_action)| null
     */
	public function getCorrectiveAction($action_id) {
		$columns = array ('action_id');
		$records = array ($action_id);
		$corrective_action_ = $this->query_from_r_dts_corrective_actions ( $columns, $records );
		return sizeof($corrective_action_)>0 ? $corrective_action_ [0] ['corrective_action'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of description 
     * based on the value of $action_id passed to the function
     *
     * @param $action_id
     * @return object (description)| null
     */
	public function getDescription($action_id) {
		$columns = array ('action_id');
		$records = array ($action_id);
		$description_ = $this->query_from_r_dts_corrective_actions ( $columns, $records );
		return sizeof($description_)>0 ? $description_ [0] ['description'] : null;
	}
	

	
	   /**
	* Inserts data into the table[r_dts_corrective_actions] in the order below
	* array ('action_id','corrective_action','description')
	* is mapped into
	* array ($action_id,$corrective_action,$description)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($action_id,$corrective_action,$description,$redundancy_check= false, $printSQL = false) {
		$columns = array('action_id','corrective_action','description');
		$records = array($action_id,$corrective_action,$description);
		return $this->insert_records_to_r_dts_corrective_actions ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[r_dts_corrective_actions] in the order below
    * array ('action_id','corrective_action','description')
    * is mapped into
    * array ($action_id,$corrective_action,$description)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($action_id,$corrective_action,$description, $printSQL = false) {
    	$columns = array('action_id','corrective_action','description');
    	$records = array($action_id,$corrective_action,$description);
    	return $this->delete_record_from_r_dts_corrective_actions( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'r_dts_corrective_actions' 
	*/
	public static function get_table() {
		return 'r_dts_corrective_actions';
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
     * Used  to calculate the number of times a record exists in the table r_dts_corrective_actions
     * It returns the number of times a record exists exists in the table r_dts_corrective_actions
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table r_dts_corrective_actions
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_r_dts_corrective_actions(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table r_dts_corrective_actions
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_r_dts_corrective_actions(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table r_dts_corrective_actions
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_r_dts_corrective_actions(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'r_dts_corrective_actions' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_r_dts_corrective_actions($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_dts_corrective_actions that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_r_dts_corrective_actions(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_dts_corrective_actions that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_r_dts_corrective_actions(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table r_dts_corrective_actions that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_r_dts_corrective_actions(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [r_dts_corrective_actions]
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
     * Inserts data into the table r_dts_corrective_actions
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
     * Updates all the records that meets the passed criteria from the table r_dts_corrective_actions
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
     * Gets an Associative array of the records in the table r_dts_corrective_actions that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_dts_corrective_actions  that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_dts_corrective_actions that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table r_dts_corrective_actions  that meets the passed criteria
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
