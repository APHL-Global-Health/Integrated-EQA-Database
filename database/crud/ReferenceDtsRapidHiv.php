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
* ReferenceDtsRapidHiv
*  
* Low level class for manipulating the data in the table reference_dts_rapid_hiv
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ReferenceDtsRapidHiv {

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
	* private class variable $_shipmentId
	*/
	private $_shipmentId;
	
	/**
	* returns the value of $shipmentId
	*
	* @return object(int|string) shipmentId
	*/
	public function _getShipmentId() {
		return $this->_shipmentId;
	}
	
	/**
	* sets the value of $_shipmentId
	*
	* @param shipmentId
	*/
	public function _setShipmentId($shipmentId) {
		$this->_shipmentId = $shipmentId;
	}
	/**
	* sets the value of $_shipmentId
	*
	* @param shipmentId
	* @return object ( this class)
	*/
	public function setShipmentId($shipmentId) {
		$this->_setShipmentId($shipmentId);
		return $this;
	}
	
	
	/**
	* private class variable $_sampleId
	*/
	private $_sampleId;
	
	/**
	* returns the value of $sampleId
	*
	* @return object(int|string) sampleId
	*/
	public function _getSampleId() {
		return $this->_sampleId;
	}
	
	/**
	* sets the value of $_sampleId
	*
	* @param sampleId
	*/
	public function _setSampleId($sampleId) {
		$this->_sampleId = $sampleId;
	}
	/**
	* sets the value of $_sampleId
	*
	* @param sampleId
	* @return object ( this class)
	*/
	public function setSampleId($sampleId) {
		$this->_setSampleId($sampleId);
		return $this;
	}
	
	
	/**
	* private class variable $_testkit
	*/
	private $_testkit;
	
	/**
	* returns the value of $testkit
	*
	* @return object(int|string) testkit
	*/
	public function _getTestkit() {
		return $this->_testkit;
	}
	
	/**
	* sets the value of $_testkit
	*
	* @param testkit
	*/
	public function _setTestkit($testkit) {
		$this->_testkit = $testkit;
	}
	/**
	* sets the value of $_testkit
	*
	* @param testkit
	* @return object ( this class)
	*/
	public function setTestkit($testkit) {
		$this->_setTestkit($testkit);
		return $this;
	}
	
	
	/**
	* private class variable $_lotNo
	*/
	private $_lotNo;
	
	/**
	* returns the value of $lotNo
	*
	* @return object(int|string) lotNo
	*/
	public function _getLotNo() {
		return $this->_lotNo;
	}
	
	/**
	* sets the value of $_lotNo
	*
	* @param lotNo
	*/
	public function _setLotNo($lotNo) {
		$this->_lotNo = $lotNo;
	}
	/**
	* sets the value of $_lotNo
	*
	* @param lotNo
	* @return object ( this class)
	*/
	public function setLotNo($lotNo) {
		$this->_setLotNo($lotNo);
		return $this;
	}
	
	
	/**
	* private class variable $_expiryDate
	*/
	private $_expiryDate;
	
	/**
	* returns the value of $expiryDate
	*
	* @return object(int|string) expiryDate
	*/
	public function _getExpiryDate() {
		return $this->_expiryDate;
	}
	
	/**
	* sets the value of $_expiryDate
	*
	* @param expiryDate
	*/
	public function _setExpiryDate($expiryDate) {
		$this->_expiryDate = $expiryDate;
	}
	/**
	* sets the value of $_expiryDate
	*
	* @param expiryDate
	* @return object ( this class)
	*/
	public function setExpiryDate($expiryDate) {
		$this->_setExpiryDate($expiryDate);
		return $this;
	}
	
	
	/**
	* private class variable $_result
	*/
	private $_result;
	
	/**
	* returns the value of $result
	*
	* @return object(int|string) result
	*/
	public function _getResult() {
		return $this->_result;
	}
	
	/**
	* sets the value of $_result
	*
	* @param result
	*/
	public function _setResult($result) {
		$this->_result = $result;
	}
	/**
	* sets the value of $_result
	*
	* @param result
	* @return object ( this class)
	*/
	public function setResult($result) {
		$this->_setResult($result);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of id 
     * based on the value of $id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result passed to the function
     *
     * @param $id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result
     * @return object (id)| null
     */
	public function getId($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result) {
		$columns = array ('id','shipment_id','sample_id','testkit','lot_no','expiry_date','result');
		$records = array ($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result);
		$id_ = $this->query_from_reference_dts_rapid_hiv ( $columns, $records );
		return sizeof($id_)>0 ? $id_ [0] ['id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_id 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (shipment_id)| null
     */
	public function getShipmentId($id) {
		$columns = array ('id');
		$records = array ($id);
		$shipment_id_ = $this->query_from_reference_dts_rapid_hiv ( $columns, $records );
		return sizeof($shipment_id_)>0 ? $shipment_id_ [0] ['shipment_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of sample_id 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (sample_id)| null
     */
	public function getSampleId($id) {
		$columns = array ('id');
		$records = array ($id);
		$sample_id_ = $this->query_from_reference_dts_rapid_hiv ( $columns, $records );
		return sizeof($sample_id_)>0 ? $sample_id_ [0] ['sample_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of testkit 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (testkit)| null
     */
	public function getTestkit($id) {
		$columns = array ('id');
		$records = array ($id);
		$testkit_ = $this->query_from_reference_dts_rapid_hiv ( $columns, $records );
		return sizeof($testkit_)>0 ? $testkit_ [0] ['testkit'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lot_no 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (lot_no)| null
     */
	public function getLotNo($id) {
		$columns = array ('id');
		$records = array ($id);
		$lot_no_ = $this->query_from_reference_dts_rapid_hiv ( $columns, $records );
		return sizeof($lot_no_)>0 ? $lot_no_ [0] ['lot_no'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of expiry_date 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (expiry_date)| null
     */
	public function getExpiryDate($id) {
		$columns = array ('id');
		$records = array ($id);
		$expiry_date_ = $this->query_from_reference_dts_rapid_hiv ( $columns, $records );
		return sizeof($expiry_date_)>0 ? $expiry_date_ [0] ['expiry_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of result 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (result)| null
     */
	public function getResult($id) {
		$columns = array ('id');
		$records = array ($id);
		$result_ = $this->query_from_reference_dts_rapid_hiv ( $columns, $records );
		return sizeof($result_)>0 ? $result_ [0] ['result'] : null;
	}
	

	
	   /**
	* Inserts data into the table[reference_dts_rapid_hiv] in the order below
	* array ('id','shipment_id','sample_id','testkit','lot_no','expiry_date','result')
	* is mapped into
	* array ($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','shipment_id','sample_id','testkit','lot_no','expiry_date','result');
		$records = array($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result);
		return $this->insert_records_to_reference_dts_rapid_hiv ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[reference_dts_rapid_hiv] in the order below
    * array ('id','shipment_id','sample_id','testkit','lot_no','expiry_date','result')
    * is mapped into
    * array ($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result, $printSQL = false) {
    	$columns = array('id','shipment_id','sample_id','testkit','lot_no','expiry_date','result');
    	$records = array($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result);
    	return $this->delete_record_from_reference_dts_rapid_hiv( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'reference_dts_rapid_hiv' 
	*/
	public static function get_table() {
		return 'reference_dts_rapid_hiv';
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
     * Used  to calculate the number of times a record exists in the table reference_dts_rapid_hiv
     * It returns the number of times a record exists exists in the table reference_dts_rapid_hiv
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table reference_dts_rapid_hiv
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_reference_dts_rapid_hiv(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table reference_dts_rapid_hiv
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_reference_dts_rapid_hiv(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table reference_dts_rapid_hiv
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_reference_dts_rapid_hiv(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'reference_dts_rapid_hiv' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_reference_dts_rapid_hiv($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_dts_rapid_hiv that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_reference_dts_rapid_hiv(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_dts_rapid_hiv that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_reference_dts_rapid_hiv(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table reference_dts_rapid_hiv that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_reference_dts_rapid_hiv(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [reference_dts_rapid_hiv]
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
     * Inserts data into the table reference_dts_rapid_hiv
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
     * Updates all the records that meets the passed criteria from the table reference_dts_rapid_hiv
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
     * Gets an Associative array of the records in the table reference_dts_rapid_hiv that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_dts_rapid_hiv  that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_dts_rapid_hiv that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table reference_dts_rapid_hiv  that meets the passed criteria
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
