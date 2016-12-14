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
* RControl
*  
* Low level class for manipulating the data in the table r_control
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RControl {

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
	* private class variable $_controlId
	*/
	private $_controlId;
	
	/**
	* returns the value of $controlId
	*
	* @return object(int|string) controlId
	*/
	public function _getControlId() {
		return $this->_controlId;
	}
	
	/**
	* sets the value of $_controlId
	*
	* @param controlId
	*/
	public function _setControlId($controlId) {
		$this->_controlId = $controlId;
	}
	/**
	* sets the value of $_controlId
	*
	* @param controlId
	* @return object ( this class)
	*/
	public function setControlId($controlId) {
		$this->_setControlId($controlId);
		return $this;
	}
	
	
	/**
	* private class variable $_controlName
	*/
	private $_controlName;
	
	/**
	* returns the value of $controlName
	*
	* @return object(int|string) controlName
	*/
	public function _getControlName() {
		return $this->_controlName;
	}
	
	/**
	* sets the value of $_controlName
	*
	* @param controlName
	*/
	public function _setControlName($controlName) {
		$this->_controlName = $controlName;
	}
	/**
	* sets the value of $_controlName
	*
	* @param controlName
	* @return object ( this class)
	*/
	public function setControlName($controlName) {
		$this->_setControlName($controlName);
		return $this;
	}
	
	
	/**
	* private class variable $_forScheme
	*/
	private $_forScheme;
	
	/**
	* returns the value of $forScheme
	*
	* @return object(int|string) forScheme
	*/
	public function _getForScheme() {
		return $this->_forScheme;
	}
	
	/**
	* sets the value of $_forScheme
	*
	* @param forScheme
	*/
	public function _setForScheme($forScheme) {
		$this->_forScheme = $forScheme;
	}
	/**
	* sets the value of $_forScheme
	*
	* @param forScheme
	* @return object ( this class)
	*/
	public function setForScheme($forScheme) {
		$this->_setForScheme($forScheme);
		return $this;
	}
	
	
	/**
	* private class variable $_isActive
	*/
	private $_isActive;
	
	/**
	* returns the value of $isActive
	*
	* @return object(int|string) isActive
	*/
	public function _getIsActive() {
		return $this->_isActive;
	}
	
	/**
	* sets the value of $_isActive
	*
	* @param isActive
	*/
	public function _setIsActive($isActive) {
		$this->_isActive = $isActive;
	}
	/**
	* sets the value of $_isActive
	*
	* @param isActive
	* @return object ( this class)
	*/
	public function setIsActive($isActive) {
		$this->_setIsActive($isActive);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of control_id 
     * based on the value of $control_id,$control_name,$for_scheme,$is_active passed to the function
     *
     * @param $control_id,$control_name,$for_scheme,$is_active
     * @return object (control_id)| null
     */
	public function getControlId($control_id,$control_name,$for_scheme,$is_active) {
		$columns = array ('control_id','control_name','for_scheme','is_active');
		$records = array ($control_id,$control_name,$for_scheme,$is_active);
		$control_id_ = $this->query_from_r_control ( $columns, $records );
		return sizeof($control_id_)>0 ? $control_id_ [0] ['control_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of control_name 
     * based on the value of $control_id passed to the function
     *
     * @param $control_id
     * @return object (control_name)| null
     */
	public function getControlName($control_id) {
		$columns = array ('control_id');
		$records = array ($control_id);
		$control_name_ = $this->query_from_r_control ( $columns, $records );
		return sizeof($control_name_)>0 ? $control_name_ [0] ['control_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of for_scheme 
     * based on the value of $control_id passed to the function
     *
     * @param $control_id
     * @return object (for_scheme)| null
     */
	public function getForScheme($control_id) {
		$columns = array ('control_id');
		$records = array ($control_id);
		$for_scheme_ = $this->query_from_r_control ( $columns, $records );
		return sizeof($for_scheme_)>0 ? $for_scheme_ [0] ['for_scheme'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of is_active 
     * based on the value of $control_id passed to the function
     *
     * @param $control_id
     * @return object (is_active)| null
     */
	public function getIsActive($control_id) {
		$columns = array ('control_id');
		$records = array ($control_id);
		$is_active_ = $this->query_from_r_control ( $columns, $records );
		return sizeof($is_active_)>0 ? $is_active_ [0] ['is_active'] : null;
	}
	

	
	   /**
	* Inserts data into the table[r_control] in the order below
	* array ('control_id','control_name','for_scheme','is_active')
	* is mapped into
	* array ($control_id,$control_name,$for_scheme,$is_active)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($control_id,$control_name,$for_scheme,$is_active,$redundancy_check= false, $printSQL = false) {
		$columns = array('control_id','control_name','for_scheme','is_active');
		$records = array($control_id,$control_name,$for_scheme,$is_active);
		return $this->insert_records_to_r_control ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[r_control] in the order below
    * array ('control_id','control_name','for_scheme','is_active')
    * is mapped into
    * array ($control_id,$control_name,$for_scheme,$is_active)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($control_id,$control_name,$for_scheme,$is_active, $printSQL = false) {
    	$columns = array('control_id','control_name','for_scheme','is_active');
    	$records = array($control_id,$control_name,$for_scheme,$is_active);
    	return $this->delete_record_from_r_control( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'r_control' 
	*/
	public static function get_table() {
		return 'r_control';
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
     * Used  to calculate the number of times a record exists in the table r_control
     * It returns the number of times a record exists exists in the table r_control
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table r_control
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_r_control(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table r_control
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_r_control(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table r_control
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_r_control(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'r_control' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_r_control($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_control that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_r_control(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table r_control that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_r_control(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table r_control that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_r_control(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [r_control]
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
     * Inserts data into the table r_control
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
     * Updates all the records that meets the passed criteria from the table r_control
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
     * Gets an Associative array of the records in the table r_control that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_control  that meets the passed criteria
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
     * Gets an Associative array of the records in the table r_control that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table r_control  that meets the passed criteria
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
