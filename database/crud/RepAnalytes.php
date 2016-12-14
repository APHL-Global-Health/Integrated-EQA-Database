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
* RepAnalytes
*  
* Low level class for manipulating the data in the table rep_analytes
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RepAnalytes {

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
	* private class variable $_analyteDescription
	*/
	private $_analyteDescription;
	
	/**
	* returns the value of $analyteDescription
	*
	* @return object(int|string) analyteDescription
	*/
	public function _getAnalyteDescription() {
		return $this->_analyteDescription;
	}
	
	/**
	* sets the value of $_analyteDescription
	*
	* @param analyteDescription
	*/
	public function _setAnalyteDescription($analyteDescription) {
		$this->_analyteDescription = $analyteDescription;
	}
	/**
	* sets the value of $_analyteDescription
	*
	* @param analyteDescription
	* @return object ( this class)
	*/
	public function setAnalyteDescription($analyteDescription) {
		$this->_setAnalyteDescription($analyteDescription);
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
	* private class variable $_labID
	*/
	private $_labID;
	
	/**
	* returns the value of $labID
	*
	* @return object(int|string) labID
	*/
	public function _getLabID() {
		return $this->_labID;
	}
	
	/**
	* sets the value of $_labID
	*
	* @param labID
	*/
	public function _setLabID($labID) {
		$this->_labID = $labID;
	}
	/**
	* sets the value of $_labID
	*
	* @param labID
	* @return object ( this class)
	*/
	public function setLabID($labID) {
		$this->_setLabID($labID);
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
     * Performs a database query and returns the value of ID 
     * based on the value of $ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy passed to the function
     *
     * @param $ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy
     * @return object (ID)| null
     */
	public function getID($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy) {
		$columns = array ('ID','AnalyteDescription','ProgramID','ProviderID','LabID','CreatedDate','CreatedBy');
		$records = array ($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy);
		$ID_ = $this->query_from_rep_analytes ( $columns, $records );
		return sizeof($ID_)>0 ? $ID_ [0] ['ID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of AnalyteDescription 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (AnalyteDescription)| null
     */
	public function getAnalyteDescription($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$AnalyteDescription_ = $this->query_from_rep_analytes ( $columns, $records );
		return sizeof($AnalyteDescription_)>0 ? $AnalyteDescription_ [0] ['AnalyteDescription'] : null;
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
		$ProgramID_ = $this->query_from_rep_analytes ( $columns, $records );
		return sizeof($ProgramID_)>0 ? $ProgramID_ [0] ['ProgramID'] : null;
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
		$ProviderID_ = $this->query_from_rep_analytes ( $columns, $records );
		return sizeof($ProviderID_)>0 ? $ProviderID_ [0] ['ProviderID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of LabID 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (LabID)| null
     */
	public function getLabID($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$LabID_ = $this->query_from_rep_analytes ( $columns, $records );
		return sizeof($LabID_)>0 ? $LabID_ [0] ['LabID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of CreatedDate 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (CreatedDate)| null
     */
	public function getCreatedDate($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$CreatedDate_ = $this->query_from_rep_analytes ( $columns, $records );
		return sizeof($CreatedDate_)>0 ? $CreatedDate_ [0] ['CreatedDate'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of CreatedBy 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (CreatedBy)| null
     */
	public function getCreatedBy($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$CreatedBy_ = $this->query_from_rep_analytes ( $columns, $records );
		return sizeof($CreatedBy_)>0 ? $CreatedBy_ [0] ['CreatedBy'] : null;
	}
	

	
	   /**
	* Inserts data into the table[rep_analytes] in the order below
	* array ('ID','AnalyteDescription','ProgramID','ProviderID','LabID','CreatedDate','CreatedBy')
	* is mapped into
	* array ($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy,$redundancy_check= false, $printSQL = false) {
		$columns = array('ID','AnalyteDescription','ProgramID','ProviderID','LabID','CreatedDate','CreatedBy');
		$records = array($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy);
		return $this->insert_records_to_rep_analytes ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[rep_analytes] in the order below
    * array ('ID','AnalyteDescription','ProgramID','ProviderID','LabID','CreatedDate','CreatedBy')
    * is mapped into
    * array ($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy, $printSQL = false) {
    	$columns = array('ID','AnalyteDescription','ProgramID','ProviderID','LabID','CreatedDate','CreatedBy');
    	$records = array($ID,$AnalyteDescription,$ProgramID,$ProviderID,$LabID,$CreatedDate,$CreatedBy);
    	return $this->delete_record_from_rep_analytes( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'rep_analytes' 
	*/
	public static function get_table() {
		return 'rep_analytes';
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
     * Used  to calculate the number of times a record exists in the table rep_analytes
     * It returns the number of times a record exists exists in the table rep_analytes
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table rep_analytes
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_rep_analytes(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table rep_analytes
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_rep_analytes(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table rep_analytes
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_rep_analytes(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'rep_analytes' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_rep_analytes($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_analytes that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_rep_analytes(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_analytes that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_rep_analytes(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table rep_analytes that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_rep_analytes(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [rep_analytes]
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
     * Inserts data into the table rep_analytes
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
     * Updates all the records that meets the passed criteria from the table rep_analytes
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
     * Gets an Associative array of the records in the table rep_analytes that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_analytes  that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_analytes that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table rep_analytes  that meets the passed criteria
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
