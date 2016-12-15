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
* Countries
*  
* Low level class for manipulating the data in the table countries
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class Countries {

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
	* private class variable $_id
	*/
	private $_id;
	
	/**
	* returns the value of $id
	*
	* @return object(int|string) id
	*/
	public function _getId() {
		return $this->_id;
	}
	
	/**
	* sets the value of $_id
	*
	* @param id
	*/
	public function _setId($id) {
		$this->_id = $id;
	}
	/**
	* sets the value of $_id
	*
	* @param id
	* @return object ( this class)
	*/
	public function setId($id) {
		$this->_setId($id);
		return $this;
	}
	
	
	/**
	* private class variable $_isoName
	*/
	private $_isoName;
	
	/**
	* returns the value of $isoName
	*
	* @return object(int|string) isoName
	*/
	public function _getIsoName() {
		return $this->_isoName;
	}
	
	/**
	* sets the value of $_isoName
	*
	* @param isoName
	*/
	public function _setIsoName($isoName) {
		$this->_isoName = $isoName;
	}
	/**
	* sets the value of $_isoName
	*
	* @param isoName
	* @return object ( this class)
	*/
	public function setIsoName($isoName) {
		$this->_setIsoName($isoName);
		return $this;
	}
	
	
	/**
	* private class variable $_iso2
	*/
	private $_iso2;
	
	/**
	* returns the value of $iso2
	*
	* @return object(int|string) iso2
	*/
	public function _getIso2() {
		return $this->_iso2;
	}
	
	/**
	* sets the value of $_iso2
	*
	* @param iso2
	*/
	public function _setIso2($iso2) {
		$this->_iso2 = $iso2;
	}
	/**
	* sets the value of $_iso2
	*
	* @param iso2
	* @return object ( this class)
	*/
	public function setIso2($iso2) {
		$this->_setIso2($iso2);
		return $this;
	}
	
	
	/**
	* private class variable $_iso3
	*/
	private $_iso3;
	
	/**
	* returns the value of $iso3
	*
	* @return object(int|string) iso3
	*/
	public function _getIso3() {
		return $this->_iso3;
	}
	
	/**
	* sets the value of $_iso3
	*
	* @param iso3
	*/
	public function _setIso3($iso3) {
		$this->_iso3 = $iso3;
	}
	/**
	* sets the value of $_iso3
	*
	* @param iso3
	* @return object ( this class)
	*/
	public function setIso3($iso3) {
		$this->_setIso3($iso3);
		return $this;
	}
	
	
	/**
	* private class variable $_numericCode
	*/
	private $_numericCode;
	
	/**
	* returns the value of $numericCode
	*
	* @return object(int|string) numericCode
	*/
	public function _getNumericCode() {
		return $this->_numericCode;
	}
	
	/**
	* sets the value of $_numericCode
	*
	* @param numericCode
	*/
	public function _setNumericCode($numericCode) {
		$this->_numericCode = $numericCode;
	}
	/**
	* sets the value of $_numericCode
	*
	* @param numericCode
	* @return object ( this class)
	*/
	public function setNumericCode($numericCode) {
		$this->_setNumericCode($numericCode);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of id 
     * based on the value of $id,$iso_name,$iso2,$iso3,$numeric_code passed to the function
     *
     * @param $id,$iso_name,$iso2,$iso3,$numeric_code
     * @return object (id)| null
     */
	public function getId($id,$iso_name,$iso2,$iso3,$numeric_code) {
		$columns = array ('id','iso_name','iso2','iso3','numeric_code');
		$records = array ($id,$iso_name,$iso2,$iso3,$numeric_code);
		$id_ = $this->query_from_countries ( $columns, $records );
		return sizeof($id_)>0 ? $id_ [0] ['id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of iso_name 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (iso_name)| null
     */
	public function getIsoName($id) {
		$columns = array ('id');
		$records = array ($id);
		$iso_name_ = $this->query_from_countries ( $columns, $records );
		return sizeof($iso_name_)>0 ? $iso_name_ [0] ['iso_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of iso2 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (iso2)| null
     */
	public function getIso2($id) {
		$columns = array ('id');
		$records = array ($id);
		$iso2_ = $this->query_from_countries ( $columns, $records );
		return sizeof($iso2_)>0 ? $iso2_ [0] ['iso2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of iso3 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (iso3)| null
     */
	public function getIso3($id) {
		$columns = array ('id');
		$records = array ($id);
		$iso3_ = $this->query_from_countries ( $columns, $records );
		return sizeof($iso3_)>0 ? $iso3_ [0] ['iso3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of numeric_code 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (numeric_code)| null
     */
	public function getNumericCode($id) {
		$columns = array ('id');
		$records = array ($id);
		$numeric_code_ = $this->query_from_countries ( $columns, $records );
		return sizeof($numeric_code_)>0 ? $numeric_code_ [0] ['numeric_code'] : null;
	}
	

	
	   /**
	* Inserts data into the table[countries] in the order below
	* array ('id','iso_name','iso2','iso3','numeric_code')
	* is mapped into
	* array ($id,$iso_name,$iso2,$iso3,$numeric_code)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($id,$iso_name,$iso2,$iso3,$numeric_code,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','iso_name','iso2','iso3','numeric_code');
		$records = array($id,$iso_name,$iso2,$iso3,$numeric_code);
		return $this->insert_records_to_countries ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[countries] in the order below
    * array ('id','iso_name','iso2','iso3','numeric_code')
    * is mapped into
    * array ($id,$iso_name,$iso2,$iso3,$numeric_code)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($id,$iso_name,$iso2,$iso3,$numeric_code, $printSQL = false) {
    	$columns = array('id','iso_name','iso2','iso3','numeric_code');
    	$records = array($id,$iso_name,$iso2,$iso3,$numeric_code);
    	return $this->delete_record_from_countries( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'countries' 
	*/
	public static function get_table() {
		return 'countries';
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
     * Used  to calculate the number of times a record exists in the table countries
     * It returns the number of times a record exists exists in the table countries
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table countries
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_countries(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table countries
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_countries(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table countries
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_countries(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'countries' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_countries($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table countries that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_countries(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table countries that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_countries(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table countries that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_countries(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [countries]
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
     * Inserts data into the table countries
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
     * Updates all the records that meets the passed criteria from the table countries
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
     * Gets an Associative array of the records in the table countries that meets the passed criteria
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
     * Gets an Associative array of the records in the table countries  that meets the passed criteria
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
     * Gets an Associative array of the records in the table countries that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table countries  that meets the passed criteria
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
