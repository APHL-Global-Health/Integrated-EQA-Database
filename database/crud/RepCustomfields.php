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
* RepCustomfields
*  
* Low level class for manipulating the data in the table rep_customfields
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RepCustomfields {

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
	* private class variable $_iD
	*/
	private $_iD;
	
	/**
	* returns the value of $iD
	*
	* @return object(int|string) iD
	*/
	public function _getID() {
		return $this->_iD;
	}
	
	/**
	* sets the value of $_iD
	*
	* @param iD
	*/
	public function _setID($iD) {
		$this->_iD = $iD;
	}
	/**
	* sets the value of $_iD
	*
	* @param iD
	* @return object ( this class)
	*/
	public function setID($iD) {
		$this->_setID($iD);
		return $this;
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
	* private class variable $_programID
	*/
	private $_programID;
	
	/**
	* returns the value of $programID
	*
	* @return object(int|string) programID
	*/
	public function _getProgramID() {
		return $this->_programID;
	}
	
	/**
	* sets the value of $_programID
	*
	* @param programID
	*/
	public function _setProgramID($programID) {
		$this->_programID = $programID;
	}
	/**
	* sets the value of $_programID
	*
	* @param programID
	* @return object ( this class)
	*/
	public function setProgramID($programID) {
		$this->_setProgramID($programID);
		return $this;
	}
	
	
	/**
	* private class variable $_columnName
	*/
	private $_columnName;
	
	/**
	* returns the value of $columnName
	*
	* @return object(int|string) columnName
	*/
	public function _getColumnName() {
		return $this->_columnName;
	}
	
	/**
	* sets the value of $_columnName
	*
	* @param columnName
	*/
	public function _setColumnName($columnName) {
		$this->_columnName = $columnName;
	}
	/**
	* sets the value of $_columnName
	*
	* @param columnName
	* @return object ( this class)
	*/
	public function setColumnName($columnName) {
		$this->_setColumnName($columnName);
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
     * Performs a database query and returns the value of ID 
     * based on the value of $ID,$ProviderID,$ProgramID,$ColumnName,$Description passed to the function
     *
     * @param $ID,$ProviderID,$ProgramID,$ColumnName,$Description
     * @return object (ID)| null
     */
	public function getID($ID,$ProviderID,$ProgramID,$ColumnName,$Description) {
		$columns = array ('ID','ProviderID','ProgramID','ColumnName','Description');
		$records = array ($ID,$ProviderID,$ProgramID,$ColumnName,$Description);
		$ID_ = $this->query_from_rep_customfields ( $columns, $records );
		return sizeof($ID_)>0 ? $ID_ [0] ['ID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ProviderID 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (ProviderID)| null
     */
	public function getProviderID($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$ProviderID_ = $this->query_from_rep_customfields ( $columns, $records );
		return sizeof($ProviderID_)>0 ? $ProviderID_ [0] ['ProviderID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ProgramID 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (ProgramID)| null
     */
	public function getProgramID($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$ProgramID_ = $this->query_from_rep_customfields ( $columns, $records );
		return sizeof($ProgramID_)>0 ? $ProgramID_ [0] ['ProgramID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ColumnName 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (ColumnName)| null
     */
	public function getColumnName($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$ColumnName_ = $this->query_from_rep_customfields ( $columns, $records );
		return sizeof($ColumnName_)>0 ? $ColumnName_ [0] ['ColumnName'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Description 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (Description)| null
     */
	public function getDescription($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$Description_ = $this->query_from_rep_customfields ( $columns, $records );
		return sizeof($Description_)>0 ? $Description_ [0] ['Description'] : null;
	}
	

	
	   /**
	* Inserts data into the table[rep_customfields] in the order below
	* array ('ID','ProviderID','ProgramID','ColumnName','Description')
	* is mapped into
	* array ($ID,$ProviderID,$ProgramID,$ColumnName,$Description)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($ID,$ProviderID,$ProgramID,$ColumnName,$Description,$redundancy_check= false, $printSQL = false) {
		$columns = array('ID','ProviderID','ProgramID','ColumnName','Description');
		$records = array($ID,$ProviderID,$ProgramID,$ColumnName,$Description);
		return $this->insert_records_to_rep_customfields ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[rep_customfields] in the order below
    * array ('ID','ProviderID','ProgramID','ColumnName','Description')
    * is mapped into
    * array ($ID,$ProviderID,$ProgramID,$ColumnName,$Description)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($ID,$ProviderID,$ProgramID,$ColumnName,$Description, $printSQL = false) {
    	$columns = array('ID','ProviderID','ProgramID','ColumnName','Description');
    	$records = array($ID,$ProviderID,$ProgramID,$ColumnName,$Description);
    	return $this->delete_record_from_rep_customfields( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'rep_customfields' 
	*/
	public static function get_table() {
		return 'rep_customfields';
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
     * Used  to calculate the number of times a record exists in the table rep_customfields
     * It returns the number of times a record exists exists in the table rep_customfields
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table rep_customfields
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_rep_customfields(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table rep_customfields
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_rep_customfields(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table rep_customfields
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_rep_customfields(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'rep_customfields' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_rep_customfields($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_customfields that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_rep_customfields(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_customfields that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_rep_customfields(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table rep_customfields that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_rep_customfields(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [rep_customfields]
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
     * Inserts data into the table rep_customfields
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
     * Updates all the records that meets the passed criteria from the table rep_customfields
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
     * Gets an Associative array of the records in the table rep_customfields that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_customfields  that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_customfields that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table rep_customfields  that meets the passed criteria
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
