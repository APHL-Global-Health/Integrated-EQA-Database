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
* ReferenceResultDts
*  
* Low level class for manipulating the data in the table reference_result_dts
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ReferenceResultDts {

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
	* private class variable $_sampleLabel
	*/
	private $_sampleLabel;
	
	/**
	* returns the value of $sampleLabel
	*
	* @return object(int|string) sampleLabel
	*/
	public function _getSampleLabel() {
		return $this->_sampleLabel;
	}
	
	/**
	* sets the value of $_sampleLabel
	*
	* @param sampleLabel
	*/
	public function _setSampleLabel($sampleLabel) {
		$this->_sampleLabel = $sampleLabel;
	}
	/**
	* sets the value of $_sampleLabel
	*
	* @param sampleLabel
	* @return object ( this class)
	*/
	public function setSampleLabel($sampleLabel) {
		$this->_setSampleLabel($sampleLabel);
		return $this;
	}
	
	
	/**
	* private class variable $_referenceResult
	*/
	private $_referenceResult;
	
	/**
	* returns the value of $referenceResult
	*
	* @return object(int|string) referenceResult
	*/
	public function _getReferenceResult() {
		return $this->_referenceResult;
	}
	
	/**
	* sets the value of $_referenceResult
	*
	* @param referenceResult
	*/
	public function _setReferenceResult($referenceResult) {
		$this->_referenceResult = $referenceResult;
	}
	/**
	* sets the value of $_referenceResult
	*
	* @param referenceResult
	* @return object ( this class)
	*/
	public function setReferenceResult($referenceResult) {
		$this->_setReferenceResult($referenceResult);
		return $this;
	}
	
	
	/**
	* private class variable $_control
	*/
	private $_control;
	
	/**
	* returns the value of $control
	*
	* @return object(int|string) control
	*/
	public function _getControl() {
		return $this->_control;
	}
	
	/**
	* sets the value of $_control
	*
	* @param control
	*/
	public function _setControl($control) {
		$this->_control = $control;
	}
	/**
	* sets the value of $_control
	*
	* @param control
	* @return object ( this class)
	*/
	public function setControl($control) {
		$this->_setControl($control);
		return $this;
	}
	
	
	/**
	* private class variable $_mandatory
	*/
	private $_mandatory;
	
	/**
	* returns the value of $mandatory
	*
	* @return object(int|string) mandatory
	*/
	public function _getMandatory() {
		return $this->_mandatory;
	}
	
	/**
	* sets the value of $_mandatory
	*
	* @param mandatory
	*/
	public function _setMandatory($mandatory) {
		$this->_mandatory = $mandatory;
	}
	/**
	* sets the value of $_mandatory
	*
	* @param mandatory
	* @return object ( this class)
	*/
	public function setMandatory($mandatory) {
		$this->_setMandatory($mandatory);
		return $this;
	}
	
	
	/**
	* private class variable $_sampleScore
	*/
	private $_sampleScore;
	
	/**
	* returns the value of $sampleScore
	*
	* @return object(int|string) sampleScore
	*/
	public function _getSampleScore() {
		return $this->_sampleScore;
	}
	
	/**
	* sets the value of $_sampleScore
	*
	* @param sampleScore
	*/
	public function _setSampleScore($sampleScore) {
		$this->_sampleScore = $sampleScore;
	}
	/**
	* sets the value of $_sampleScore
	*
	* @param sampleScore
	* @return object ( this class)
	*/
	public function setSampleScore($sampleScore) {
		$this->_setSampleScore($sampleScore);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of sample_id 
     * based on the value of $shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score passed to the function
     *
     * @param $shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score
     * @return object (sample_id)| null
     */
	public function getSampleId($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score) {
		$columns = array ('shipment_id','sample_id','sample_label','reference_result','control','mandatory','sample_score');
		$records = array ($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score);
		$sample_id_ = $this->query_from_reference_result_dts ( $columns, $records );
		return sizeof($sample_id_)>0 ? $sample_id_ [0] ['sample_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_id 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (shipment_id)| null
     */
	public function getShipmentId($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$shipment_id_ = $this->query_from_reference_result_dts ( $columns, $records );
		return sizeof($shipment_id_)>0 ? $shipment_id_ [0] ['shipment_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of sample_label 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (sample_label)| null
     */
	public function getSampleLabel($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$sample_label_ = $this->query_from_reference_result_dts ( $columns, $records );
		return sizeof($sample_label_)>0 ? $sample_label_ [0] ['sample_label'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of reference_result 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (reference_result)| null
     */
	public function getReferenceResult($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$reference_result_ = $this->query_from_reference_result_dts ( $columns, $records );
		return sizeof($reference_result_)>0 ? $reference_result_ [0] ['reference_result'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of control 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (control)| null
     */
	public function getControl($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$control_ = $this->query_from_reference_result_dts ( $columns, $records );
		return sizeof($control_)>0 ? $control_ [0] ['control'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mandatory 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (mandatory)| null
     */
	public function getMandatory($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$mandatory_ = $this->query_from_reference_result_dts ( $columns, $records );
		return sizeof($mandatory_)>0 ? $mandatory_ [0] ['mandatory'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of sample_score 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (sample_score)| null
     */
	public function getSampleScore($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$sample_score_ = $this->query_from_reference_result_dts ( $columns, $records );
		return sizeof($sample_score_)>0 ? $sample_score_ [0] ['sample_score'] : null;
	}
	

	
	   /**
	* Inserts data into the table[reference_result_dts] in the order below
	* array ('shipment_id','sample_id','sample_label','reference_result','control','mandatory','sample_score')
	* is mapped into
	* array ($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score,$redundancy_check= false, $printSQL = false) {
		$columns = array('shipment_id','sample_id','sample_label','reference_result','control','mandatory','sample_score');
		$records = array($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score);
		return $this->insert_records_to_reference_result_dts ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[reference_result_dts] in the order below
    * array ('shipment_id','sample_id','sample_label','reference_result','control','mandatory','sample_score')
    * is mapped into
    * array ($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score, $printSQL = false) {
    	$columns = array('shipment_id','sample_id','sample_label','reference_result','control','mandatory','sample_score');
    	$records = array($shipment_id,$sample_id,$sample_label,$reference_result,$control,$mandatory,$sample_score);
    	return $this->delete_record_from_reference_result_dts( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'reference_result_dts' 
	*/
	public static function get_table() {
		return 'reference_result_dts';
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
     * Used  to calculate the number of times a record exists in the table reference_result_dts
     * It returns the number of times a record exists exists in the table reference_result_dts
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table reference_result_dts
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_reference_result_dts(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table reference_result_dts
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_reference_result_dts(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table reference_result_dts
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_reference_result_dts(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'reference_result_dts' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_reference_result_dts($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_result_dts that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_reference_result_dts(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_result_dts that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_reference_result_dts(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table reference_result_dts that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_reference_result_dts(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [reference_result_dts]
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
     * Inserts data into the table reference_result_dts
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
     * Updates all the records that meets the passed criteria from the table reference_result_dts
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
     * Gets an Associative array of the records in the table reference_result_dts that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_result_dts  that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_result_dts that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table reference_result_dts  that meets the passed criteria
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
