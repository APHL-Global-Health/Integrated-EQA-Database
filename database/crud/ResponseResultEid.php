<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:46  09/12/2016
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
* ResponseResultEid
*  
* Low level class for manipulating the data in the table response_result_eid
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ResponseResultEid {

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
	* private class variable $_shipmentMapId
	*/
	private $_shipmentMapId;
	
	/**
	* returns the value of $shipmentMapId
	*
	* @return object(int|string) shipmentMapId
	*/
	public function _getShipmentMapId() {
		return $this->_shipmentMapId;
	}
	
	/**
	* sets the value of $_shipmentMapId
	*
	* @param shipmentMapId
	*/
	public function _setShipmentMapId($shipmentMapId) {
		$this->_shipmentMapId = $shipmentMapId;
	}
	/**
	* sets the value of $_shipmentMapId
	*
	* @param shipmentMapId
	* @return object ( this class)
	*/
	public function setShipmentMapId($shipmentMapId) {
		$this->_setShipmentMapId($shipmentMapId);
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
	* private class variable $_reportedResult
	*/
	private $_reportedResult;
	
	/**
	* returns the value of $reportedResult
	*
	* @return object(int|string) reportedResult
	*/
	public function _getReportedResult() {
		return $this->_reportedResult;
	}
	
	/**
	* sets the value of $_reportedResult
	*
	* @param reportedResult
	*/
	public function _setReportedResult($reportedResult) {
		$this->_reportedResult = $reportedResult;
	}
	/**
	* sets the value of $_reportedResult
	*
	* @param reportedResult
	* @return object ( this class)
	*/
	public function setReportedResult($reportedResult) {
		$this->_setReportedResult($reportedResult);
		return $this;
	}
	
	
	/**
	* private class variable $_hivCtOd
	*/
	private $_hivCtOd;
	
	/**
	* returns the value of $hivCtOd
	*
	* @return object(int|string) hivCtOd
	*/
	public function _getHivCtOd() {
		return $this->_hivCtOd;
	}
	
	/**
	* sets the value of $_hivCtOd
	*
	* @param hivCtOd
	*/
	public function _setHivCtOd($hivCtOd) {
		$this->_hivCtOd = $hivCtOd;
	}
	/**
	* sets the value of $_hivCtOd
	*
	* @param hivCtOd
	* @return object ( this class)
	*/
	public function setHivCtOd($hivCtOd) {
		$this->_setHivCtOd($hivCtOd);
		return $this;
	}
	
	
	/**
	* private class variable $_icQs
	*/
	private $_icQs;
	
	/**
	* returns the value of $icQs
	*
	* @return object(int|string) icQs
	*/
	public function _getIcQs() {
		return $this->_icQs;
	}
	
	/**
	* sets the value of $_icQs
	*
	* @param icQs
	*/
	public function _setIcQs($icQs) {
		$this->_icQs = $icQs;
	}
	/**
	* sets the value of $_icQs
	*
	* @param icQs
	* @return object ( this class)
	*/
	public function setIcQs($icQs) {
		$this->_setIcQs($icQs);
		return $this;
	}
	
	
	/**
	* private class variable $_calculatedScore
	*/
	private $_calculatedScore;
	
	/**
	* returns the value of $calculatedScore
	*
	* @return object(int|string) calculatedScore
	*/
	public function _getCalculatedScore() {
		return $this->_calculatedScore;
	}
	
	/**
	* sets the value of $_calculatedScore
	*
	* @param calculatedScore
	*/
	public function _setCalculatedScore($calculatedScore) {
		$this->_calculatedScore = $calculatedScore;
	}
	/**
	* sets the value of $_calculatedScore
	*
	* @param calculatedScore
	* @return object ( this class)
	*/
	public function setCalculatedScore($calculatedScore) {
		$this->_setCalculatedScore($calculatedScore);
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
     * Performs a database query and returns the value of sample_id 
     * based on the value of $shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on passed to the function
     *
     * @param $shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on
     * @return object (sample_id)| null
     */
	public function getSampleId($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on) {
		$columns = array ('shipment_map_id','sample_id','reported_result','hiv_ct_od','ic_qs','calculated_score','created_by','created_on','updated_by','updated_on');
		$records = array ($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on);
		$sample_id_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($sample_id_)>0 ? $sample_id_ [0] ['sample_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_map_id 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (shipment_map_id)| null
     */
	public function getShipmentMapId($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$shipment_map_id_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($shipment_map_id_)>0 ? $shipment_map_id_ [0] ['shipment_map_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of reported_result 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (reported_result)| null
     */
	public function getReportedResult($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$reported_result_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($reported_result_)>0 ? $reported_result_ [0] ['reported_result'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of hiv_ct_od 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (hiv_ct_od)| null
     */
	public function getHivCtOd($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$hiv_ct_od_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($hiv_ct_od_)>0 ? $hiv_ct_od_ [0] ['hiv_ct_od'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of ic_qs 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (ic_qs)| null
     */
	public function getIcQs($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$ic_qs_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($ic_qs_)>0 ? $ic_qs_ [0] ['ic_qs'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of calculated_score 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (calculated_score)| null
     */
	public function getCalculatedScore($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$calculated_score_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($calculated_score_)>0 ? $calculated_score_ [0] ['calculated_score'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_by 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (created_by)| null
     */
	public function getCreatedBy($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$created_by_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($created_by_)>0 ? $created_by_ [0] ['created_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (created_on)| null
     */
	public function getCreatedOn($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$created_on_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($created_on_)>0 ? $created_on_ [0] ['created_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (updated_by)| null
     */
	public function getUpdatedBy($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$updated_by_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($updated_by_)>0 ? $updated_by_ [0] ['updated_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (updated_on)| null
     */
	public function getUpdatedOn($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$updated_on_ = $this->query_from_response_result_eid ( $columns, $records );
		return sizeof($updated_on_)>0 ? $updated_on_ [0] ['updated_on'] : null;
	}
	

	
	   /**
	* Inserts data into the table[response_result_eid] in the order below
	* array ('shipment_map_id','sample_id','reported_result','hiv_ct_od','ic_qs','calculated_score','created_by','created_on','updated_by','updated_on')
	* is mapped into
	* array ($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on,$redundancy_check= false, $printSQL = false) {
		$columns = array('shipment_map_id','sample_id','reported_result','hiv_ct_od','ic_qs','calculated_score','created_by','created_on','updated_by','updated_on');
		$records = array($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on);
		return $this->insert_records_to_response_result_eid ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[response_result_eid] in the order below
    * array ('shipment_map_id','sample_id','reported_result','hiv_ct_od','ic_qs','calculated_score','created_by','created_on','updated_by','updated_on')
    * is mapped into
    * array ($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on, $printSQL = false) {
    	$columns = array('shipment_map_id','sample_id','reported_result','hiv_ct_od','ic_qs','calculated_score','created_by','created_on','updated_by','updated_on');
    	$records = array($shipment_map_id,$sample_id,$reported_result,$hiv_ct_od,$ic_qs,$calculated_score,$created_by,$created_on,$updated_by,$updated_on);
    	return $this->delete_record_from_response_result_eid( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'response_result_eid' 
	*/
	public static function get_table() {
		return 'response_result_eid';
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
     * Used  to calculate the number of times a record exists in the table response_result_eid
     * It returns the number of times a record exists exists in the table response_result_eid
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table response_result_eid
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_response_result_eid(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table response_result_eid
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_response_result_eid(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table response_result_eid
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_response_result_eid(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'response_result_eid' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_response_result_eid($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table response_result_eid that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_response_result_eid(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table response_result_eid that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_response_result_eid(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table response_result_eid that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_response_result_eid(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [response_result_eid]
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
     * Inserts data into the table response_result_eid
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
     * Updates all the records that meets the passed criteria from the table response_result_eid
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
     * Gets an Associative array of the records in the table response_result_eid that meets the passed criteria
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
     * Gets an Associative array of the records in the table response_result_eid  that meets the passed criteria
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
     * Gets an Associative array of the records in the table response_result_eid that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table response_result_eid  that meets the passed criteria
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
