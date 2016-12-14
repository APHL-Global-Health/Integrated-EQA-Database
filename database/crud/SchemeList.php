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
* SchemeList
*  
* Low level class for manipulating the data in the table scheme_list
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class SchemeList {

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
	* private class variable $_schemeName
	*/
	private $_schemeName;
	
	/**
	* returns the value of $schemeName
	*
	* @return object(int|string) schemeName
	*/
	public function _getSchemeName() {
		return $this->_schemeName;
	}
	
	/**
	* sets the value of $_schemeName
	*
	* @param schemeName
	*/
	public function _setSchemeName($schemeName) {
		$this->_schemeName = $schemeName;
	}
	/**
	* sets the value of $_schemeName
	*
	* @param schemeName
	* @return object ( this class)
	*/
	public function setSchemeName($schemeName) {
		$this->_setSchemeName($schemeName);
		return $this;
	}
	
	
	/**
	* private class variable $_responseTable
	*/
	private $_responseTable;
	
	/**
	* returns the value of $responseTable
	*
	* @return object(int|string) responseTable
	*/
	public function _getResponseTable() {
		return $this->_responseTable;
	}
	
	/**
	* sets the value of $_responseTable
	*
	* @param responseTable
	*/
	public function _setResponseTable($responseTable) {
		$this->_responseTable = $responseTable;
	}
	/**
	* sets the value of $_responseTable
	*
	* @param responseTable
	* @return object ( this class)
	*/
	public function setResponseTable($responseTable) {
		$this->_setResponseTable($responseTable);
		return $this;
	}
	
	
	/**
	* private class variable $_referenceResultTable
	*/
	private $_referenceResultTable;
	
	/**
	* returns the value of $referenceResultTable
	*
	* @return object(int|string) referenceResultTable
	*/
	public function _getReferenceResultTable() {
		return $this->_referenceResultTable;
	}
	
	/**
	* sets the value of $_referenceResultTable
	*
	* @param referenceResultTable
	*/
	public function _setReferenceResultTable($referenceResultTable) {
		$this->_referenceResultTable = $referenceResultTable;
	}
	/**
	* sets the value of $_referenceResultTable
	*
	* @param referenceResultTable
	* @return object ( this class)
	*/
	public function setReferenceResultTable($referenceResultTable) {
		$this->_setReferenceResultTable($referenceResultTable);
		return $this;
	}
	
	
	/**
	* private class variable $_attributeList
	*/
	private $_attributeList;
	
	/**
	* returns the value of $attributeList
	*
	* @return object(int|string) attributeList
	*/
	public function _getAttributeList() {
		return $this->_attributeList;
	}
	
	/**
	* sets the value of $_attributeList
	*
	* @param attributeList
	*/
	public function _setAttributeList($attributeList) {
		$this->_attributeList = $attributeList;
	}
	/**
	* sets the value of $_attributeList
	*
	* @param attributeList
	* @return object ( this class)
	*/
	public function setAttributeList($attributeList) {
		$this->_setAttributeList($attributeList);
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
     * Performs a database query and returns the value of scheme_id 
     * based on the value of $scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status passed to the function
     *
     * @param $scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status
     * @return object (scheme_id)| null
     */
	public function getSchemeId($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status) {
		$columns = array ('scheme_id','scheme_name','response_table','reference_result_table','attribute_list','status');
		$records = array ($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status);
		$scheme_id_ = $this->query_from_scheme_list ( $columns, $records );
		return sizeof($scheme_id_)>0 ? $scheme_id_ [0] ['scheme_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of scheme_name 
     * based on the value of $scheme_id passed to the function
     *
     * @param $scheme_id
     * @return object (scheme_name)| null
     */
	public function getSchemeName($scheme_id) {
		$columns = array ('scheme_id');
		$records = array ($scheme_id);
		$scheme_name_ = $this->query_from_scheme_list ( $columns, $records );
		return sizeof($scheme_name_)>0 ? $scheme_name_ [0] ['scheme_name'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of response_table 
     * based on the value of $scheme_id passed to the function
     *
     * @param $scheme_id
     * @return object (response_table)| null
     */
	public function getResponseTable($scheme_id) {
		$columns = array ('scheme_id');
		$records = array ($scheme_id);
		$response_table_ = $this->query_from_scheme_list ( $columns, $records );
		return sizeof($response_table_)>0 ? $response_table_ [0] ['response_table'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of reference_result_table 
     * based on the value of $scheme_id passed to the function
     *
     * @param $scheme_id
     * @return object (reference_result_table)| null
     */
	public function getReferenceResultTable($scheme_id) {
		$columns = array ('scheme_id');
		$records = array ($scheme_id);
		$reference_result_table_ = $this->query_from_scheme_list ( $columns, $records );
		return sizeof($reference_result_table_)>0 ? $reference_result_table_ [0] ['reference_result_table'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of attribute_list 
     * based on the value of $scheme_id passed to the function
     *
     * @param $scheme_id
     * @return object (attribute_list)| null
     */
	public function getAttributeList($scheme_id) {
		$columns = array ('scheme_id');
		$records = array ($scheme_id);
		$attribute_list_ = $this->query_from_scheme_list ( $columns, $records );
		return sizeof($attribute_list_)>0 ? $attribute_list_ [0] ['attribute_list'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of status 
     * based on the value of $scheme_id passed to the function
     *
     * @param $scheme_id
     * @return object (status)| null
     */
	public function getStatus($scheme_id) {
		$columns = array ('scheme_id');
		$records = array ($scheme_id);
		$status_ = $this->query_from_scheme_list ( $columns, $records );
		return sizeof($status_)>0 ? $status_ [0] ['status'] : null;
	}
	

	
	   /**
	* Inserts data into the table[scheme_list] in the order below
	* array ('scheme_id','scheme_name','response_table','reference_result_table','attribute_list','status')
	* is mapped into
	* array ($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('scheme_id','scheme_name','response_table','reference_result_table','attribute_list','status');
		$records = array($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status);
		return $this->insert_records_to_scheme_list ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[scheme_list] in the order below
    * array ('scheme_id','scheme_name','response_table','reference_result_table','attribute_list','status')
    * is mapped into
    * array ($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status, $printSQL = false) {
    	$columns = array('scheme_id','scheme_name','response_table','reference_result_table','attribute_list','status');
    	$records = array($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status);
    	return $this->delete_record_from_scheme_list( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'scheme_list' 
	*/
	public static function get_table() {
		return 'scheme_list';
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
     * Used  to calculate the number of times a record exists in the table scheme_list
     * It returns the number of times a record exists exists in the table scheme_list
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table scheme_list
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_scheme_list(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table scheme_list
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_scheme_list(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table scheme_list
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_scheme_list(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'scheme_list' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_scheme_list($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table scheme_list that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_scheme_list(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table scheme_list that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_scheme_list(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table scheme_list that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_scheme_list(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [scheme_list]
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
     * Inserts data into the table scheme_list
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
     * Updates all the records that meets the passed criteria from the table scheme_list
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
     * Gets an Associative array of the records in the table scheme_list that meets the passed criteria
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
     * Gets an Associative array of the records in the table scheme_list  that meets the passed criteria
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
     * Gets an Associative array of the records in the table scheme_list that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table scheme_list  that meets the passed criteria
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
