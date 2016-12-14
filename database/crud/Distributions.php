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
* Distributions
*  
* Low level class for manipulating the data in the table distributions
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class Distributions {

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
	* private class variable $_distributionId
	*/
	private $_distributionId;
	
	/**
	* returns the value of $distributionId
	*
	* @return object(int|string) distributionId
	*/
	public function _getDistributionId() {
		return $this->_distributionId;
	}
	
	/**
	* sets the value of $_distributionId
	*
	* @param distributionId
	*/
	public function _setDistributionId($distributionId) {
		$this->_distributionId = $distributionId;
	}
	/**
	* sets the value of $_distributionId
	*
	* @param distributionId
	* @return object ( this class)
	*/
	public function setDistributionId($distributionId) {
		$this->_setDistributionId($distributionId);
		return $this;
	}
	
	
	/**
	* private class variable $_distributionCode
	*/
	private $_distributionCode;
	
	/**
	* returns the value of $distributionCode
	*
	* @return object(int|string) distributionCode
	*/
	public function _getDistributionCode() {
		return $this->_distributionCode;
	}
	
	/**
	* sets the value of $_distributionCode
	*
	* @param distributionCode
	*/
	public function _setDistributionCode($distributionCode) {
		$this->_distributionCode = $distributionCode;
	}
	/**
	* sets the value of $_distributionCode
	*
	* @param distributionCode
	* @return object ( this class)
	*/
	public function setDistributionCode($distributionCode) {
		$this->_setDistributionCode($distributionCode);
		return $this;
	}
	
	
	/**
	* private class variable $_distributionDate
	*/
	private $_distributionDate;
	
	/**
	* returns the value of $distributionDate
	*
	* @return object(int|string) distributionDate
	*/
	public function _getDistributionDate() {
		return $this->_distributionDate;
	}
	
	/**
	* sets the value of $_distributionDate
	*
	* @param distributionDate
	*/
	public function _setDistributionDate($distributionDate) {
		$this->_distributionDate = $distributionDate;
	}
	/**
	* sets the value of $_distributionDate
	*
	* @param distributionDate
	* @return object ( this class)
	*/
	public function setDistributionDate($distributionDate) {
		$this->_setDistributionDate($distributionDate);
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
	* private class variable $_createdOn
	*/
	private $_createdOn;
	
	/**
	* returns the value of $createdOn
	*
	* @return object(int|string) createdOn
	*/
	public function _getCreatedOn() {
		return $this->_createdOn;
	}
	
	/**
	* sets the value of $_createdOn
	*
	* @param createdOn
	*/
	public function _setCreatedOn($createdOn) {
		$this->_createdOn = $createdOn;
	}
	/**
	* sets the value of $_createdOn
	*
	* @param createdOn
	* @return object ( this class)
	*/
	public function setCreatedOn($createdOn) {
		$this->_setCreatedOn($createdOn);
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
	* private class variable $_updatedOn
	*/
	private $_updatedOn;
	
	/**
	* returns the value of $updatedOn
	*
	* @return object(int|string) updatedOn
	*/
	public function _getUpdatedOn() {
		return $this->_updatedOn;
	}
	
	/**
	* sets the value of $_updatedOn
	*
	* @param updatedOn
	*/
	public function _setUpdatedOn($updatedOn) {
		$this->_updatedOn = $updatedOn;
	}
	/**
	* sets the value of $_updatedOn
	*
	* @param updatedOn
	* @return object ( this class)
	*/
	public function setUpdatedOn($updatedOn) {
		$this->_setUpdatedOn($updatedOn);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedBy
	*/
	private $_updatedBy;
	
	/**
	* returns the value of $updatedBy
	*
	* @return object(int|string) updatedBy
	*/
	public function _getUpdatedBy() {
		return $this->_updatedBy;
	}
	
	/**
	* sets the value of $_updatedBy
	*
	* @param updatedBy
	*/
	public function _setUpdatedBy($updatedBy) {
		$this->_updatedBy = $updatedBy;
	}
	/**
	* sets the value of $_updatedBy
	*
	* @param updatedBy
	* @return object ( this class)
	*/
	public function setUpdatedBy($updatedBy) {
		$this->_setUpdatedBy($updatedBy);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of distribution_id 
     * based on the value of $distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by passed to the function
     *
     * @param $distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by
     * @return object (distribution_id)| null
     */
	public function getDistributionId($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by) {
		$columns = array ('distribution_id','distribution_code','distribution_date','status','created_on','created_by','updated_on','updated_by');
		$records = array ($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by);
		$distribution_id_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($distribution_id_)>0 ? $distribution_id_ [0] ['distribution_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of distribution_code 
     * based on the value of $distribution_id passed to the function
     *
     * @param $distribution_id
     * @return object (distribution_code)| null
     */
	public function getDistributionCode($distribution_id) {
		$columns = array ('distribution_id');
		$records = array ($distribution_id);
		$distribution_code_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($distribution_code_)>0 ? $distribution_code_ [0] ['distribution_code'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of distribution_date 
     * based on the value of $distribution_id passed to the function
     *
     * @param $distribution_id
     * @return object (distribution_date)| null
     */
	public function getDistributionDate($distribution_id) {
		$columns = array ('distribution_id');
		$records = array ($distribution_id);
		$distribution_date_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($distribution_date_)>0 ? $distribution_date_ [0] ['distribution_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of status 
     * based on the value of $distribution_id passed to the function
     *
     * @param $distribution_id
     * @return object (status)| null
     */
	public function getStatus($distribution_id) {
		$columns = array ('distribution_id');
		$records = array ($distribution_id);
		$status_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($status_)>0 ? $status_ [0] ['status'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on 
     * based on the value of $distribution_id passed to the function
     *
     * @param $distribution_id
     * @return object (created_on)| null
     */
	public function getCreatedOn($distribution_id) {
		$columns = array ('distribution_id');
		$records = array ($distribution_id);
		$created_on_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($created_on_)>0 ? $created_on_ [0] ['created_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_by 
     * based on the value of $distribution_id passed to the function
     *
     * @param $distribution_id
     * @return object (created_by)| null
     */
	public function getCreatedBy($distribution_id) {
		$columns = array ('distribution_id');
		$records = array ($distribution_id);
		$created_by_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($created_by_)>0 ? $created_by_ [0] ['created_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on 
     * based on the value of $distribution_id passed to the function
     *
     * @param $distribution_id
     * @return object (updated_on)| null
     */
	public function getUpdatedOn($distribution_id) {
		$columns = array ('distribution_id');
		$records = array ($distribution_id);
		$updated_on_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($updated_on_)>0 ? $updated_on_ [0] ['updated_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by 
     * based on the value of $distribution_id passed to the function
     *
     * @param $distribution_id
     * @return object (updated_by)| null
     */
	public function getUpdatedBy($distribution_id) {
		$columns = array ('distribution_id');
		$records = array ($distribution_id);
		$updated_by_ = $this->query_from_distributions ( $columns, $records );
		return sizeof($updated_by_)>0 ? $updated_by_ [0] ['updated_by'] : null;
	}
	

	
	   /**
	* Inserts data into the table[distributions] in the order below
	* array ('distribution_id','distribution_code','distribution_date','status','created_on','created_by','updated_on','updated_by')
	* is mapped into
	* array ($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check= false, $printSQL = false) {
		$columns = array('distribution_id','distribution_code','distribution_date','status','created_on','created_by','updated_on','updated_by');
		$records = array($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by);
		return $this->insert_records_to_distributions ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[distributions] in the order below
    * array ('distribution_id','distribution_code','distribution_date','status','created_on','created_by','updated_on','updated_by')
    * is mapped into
    * array ($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by, $printSQL = false) {
    	$columns = array('distribution_id','distribution_code','distribution_date','status','created_on','created_by','updated_on','updated_by');
    	$records = array($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by);
    	return $this->delete_record_from_distributions( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'distributions' 
	*/
	public static function get_table() {
		return 'distributions';
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
     * Used  to calculate the number of times a record exists in the table distributions
     * It returns the number of times a record exists exists in the table distributions
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table distributions
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_distributions(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table distributions
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_distributions(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table distributions
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_distributions(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'distributions' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_distributions($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table distributions that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_distributions(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table distributions that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_distributions(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table distributions that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_distributions(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [distributions]
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
     * Inserts data into the table distributions
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
     * Updates all the records that meets the passed criteria from the table distributions
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
     * Gets an Associative array of the records in the table distributions that meets the passed criteria
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
     * Gets an Associative array of the records in the table distributions  that meets the passed criteria
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
     * Gets an Associative array of the records in the table distributions that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table distributions  that meets the passed criteria
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
