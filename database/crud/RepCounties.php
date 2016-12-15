<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:45  09/12/2016
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
* RepCounties
*  
* Low level class for manipulating the data in the table rep_counties
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RepCounties {

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
	* private class variable $_countyID
	*/
	private $_countyID;
	
	/**
	* returns the value of $countyID
	*
	* @return object(int|string) countyID
	*/
	public function _getCountyID() {
		return $this->_countyID;
	}
	
	/**
	* sets the value of $_countyID
	*
	* @param countyID
	*/
	public function _setCountyID($countyID) {
		$this->_countyID = $countyID;
	}
	/**
	* sets the value of $_countyID
	*
	* @param countyID
	* @return object ( this class)
	*/
	public function setCountyID($countyID) {
		$this->_setCountyID($countyID);
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
     * Performs a database query and returns the value of CountyID 
     * based on the value of $CountyID,$Description,$CreatedBy,$CreatedDate passed to the function
     *
     * @param $CountyID,$Description,$CreatedBy,$CreatedDate
     * @return object (CountyID)| null
     */
	public function getCountyID($CountyID,$Description,$CreatedBy,$CreatedDate) {
		$columns = array ('CountyID','Description','CreatedBy','CreatedDate');
		$records = array ($CountyID,$Description,$CreatedBy,$CreatedDate);
		$CountyID_ = $this->query_from_rep_counties ( $columns, $records );
		return sizeof($CountyID_)>0 ? $CountyID_ [0] ['CountyID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Description 
     * based on the value of $CountyID passed to the function
     *
     * @param $CountyID
     * @return object (Description)| null
     */
	public function getDescription($CountyID) {
		$columns = array ('CountyID');
		$records = array ($CountyID);
		$Description_ = $this->query_from_rep_counties ( $columns, $records );
		return sizeof($Description_)>0 ? $Description_ [0] ['Description'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of CreatedBy 
     * based on the value of $CountyID passed to the function
     *
     * @param $CountyID
     * @return object (CreatedBy)| null
     */
	public function getCreatedBy($CountyID) {
		$columns = array ('CountyID');
		$records = array ($CountyID);
		$CreatedBy_ = $this->query_from_rep_counties ( $columns, $records );
		return sizeof($CreatedBy_)>0 ? $CreatedBy_ [0] ['CreatedBy'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of CreatedDate 
     * based on the value of $CountyID passed to the function
     *
     * @param $CountyID
     * @return object (CreatedDate)| null
     */
	public function getCreatedDate($CountyID) {
		$columns = array ('CountyID');
		$records = array ($CountyID);
		$CreatedDate_ = $this->query_from_rep_counties ( $columns, $records );
		return sizeof($CreatedDate_)>0 ? $CreatedDate_ [0] ['CreatedDate'] : null;
	}
	

	
	   /**
	* Inserts data into the table[rep_counties] in the order below
	* array ('CountyID','Description','CreatedBy','CreatedDate')
	* is mapped into
	* array ($CountyID,$Description,$CreatedBy,$CreatedDate)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($CountyID,$Description,$CreatedBy,$CreatedDate,$redundancy_check= false, $printSQL = false) {
		$columns = array('CountyID','Description','CreatedBy','CreatedDate');
		$records = array($CountyID,$Description,$CreatedBy,$CreatedDate);
		return $this->insert_records_to_rep_counties ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[rep_counties] in the order below
    * array ('CountyID','Description','CreatedBy','CreatedDate')
    * is mapped into
    * array ($CountyID,$Description,$CreatedBy,$CreatedDate)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($CountyID,$Description,$CreatedBy,$CreatedDate, $printSQL = false) {
    	$columns = array('CountyID','Description','CreatedBy','CreatedDate');
    	$records = array($CountyID,$Description,$CreatedBy,$CreatedDate);
    	return $this->delete_record_from_rep_counties( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'rep_counties' 
	*/
	public static function get_table() {
		return 'rep_counties';
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
     * Used  to calculate the number of times a record exists in the table rep_counties
     * It returns the number of times a record exists exists in the table rep_counties
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table rep_counties
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_rep_counties(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table rep_counties
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_rep_counties(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table rep_counties
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_rep_counties(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'rep_counties' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_rep_counties($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_counties that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_rep_counties(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_counties that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_rep_counties(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table rep_counties that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_rep_counties(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [rep_counties]
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
     * Inserts data into the table rep_counties
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
     * Updates all the records that meets the passed criteria from the table rep_counties
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
     * Gets an Associative array of the records in the table rep_counties that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_counties  that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_counties that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table rep_counties  that meets the passed criteria
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
