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
* ReferenceDbsEia
*  
* Low level class for manipulating the data in the table reference_dbs_eia
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ReferenceDbsEia {

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
	* private class variable $_eia
	*/
	private $_eia;
	
	/**
	* returns the value of $eia
	*
	* @return object(int|string) eia
	*/
	public function _getEia() {
		return $this->_eia;
	}
	
	/**
	* sets the value of $_eia
	*
	* @param eia
	*/
	public function _setEia($eia) {
		$this->_eia = $eia;
	}
	/**
	* sets the value of $_eia
	*
	* @param eia
	* @return object ( this class)
	*/
	public function setEia($eia) {
		$this->_setEia($eia);
		return $this;
	}
	
	
	/**
	* private class variable $_lot
	*/
	private $_lot;
	
	/**
	* returns the value of $lot
	*
	* @return object(int|string) lot
	*/
	public function _getLot() {
		return $this->_lot;
	}
	
	/**
	* sets the value of $_lot
	*
	* @param lot
	*/
	public function _setLot($lot) {
		$this->_lot = $lot;
	}
	/**
	* sets the value of $_lot
	*
	* @param lot
	* @return object ( this class)
	*/
	public function setLot($lot) {
		$this->_setLot($lot);
		return $this;
	}
	
	
	/**
	* private class variable $_expDate
	*/
	private $_expDate;
	
	/**
	* returns the value of $expDate
	*
	* @return object(int|string) expDate
	*/
	public function _getExpDate() {
		return $this->_expDate;
	}
	
	/**
	* sets the value of $_expDate
	*
	* @param expDate
	*/
	public function _setExpDate($expDate) {
		$this->_expDate = $expDate;
	}
	/**
	* sets the value of $_expDate
	*
	* @param expDate
	* @return object ( this class)
	*/
	public function setExpDate($expDate) {
		$this->_setExpDate($expDate);
		return $this;
	}
	
	
	/**
	* private class variable $_od
	*/
	private $_od;
	
	/**
	* returns the value of $od
	*
	* @return object(int|string) od
	*/
	public function _getOd() {
		return $this->_od;
	}
	
	/**
	* sets the value of $_od
	*
	* @param od
	*/
	public function _setOd($od) {
		$this->_od = $od;
	}
	/**
	* sets the value of $_od
	*
	* @param od
	* @return object ( this class)
	*/
	public function setOd($od) {
		$this->_setOd($od);
		return $this;
	}
	
	
	/**
	* private class variable $_cutoff
	*/
	private $_cutoff;
	
	/**
	* returns the value of $cutoff
	*
	* @return object(int|string) cutoff
	*/
	public function _getCutoff() {
		return $this->_cutoff;
	}
	
	/**
	* sets the value of $_cutoff
	*
	* @param cutoff
	*/
	public function _setCutoff($cutoff) {
		$this->_cutoff = $cutoff;
	}
	/**
	* sets the value of $_cutoff
	*
	* @param cutoff
	* @return object ( this class)
	*/
	public function setCutoff($cutoff) {
		$this->_setCutoff($cutoff);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of id 
     * based on the value of $id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff passed to the function
     *
     * @param $id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff
     * @return object (id)| null
     */
	public function getId($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff) {
		$columns = array ('id','shipment_id','sample_id','eia','lot','exp_date','od','cutoff');
		$records = array ($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff);
		$id_ = $this->query_from_reference_dbs_eia ( $columns, $records );
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
		$shipment_id_ = $this->query_from_reference_dbs_eia ( $columns, $records );
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
		$sample_id_ = $this->query_from_reference_dbs_eia ( $columns, $records );
		return sizeof($sample_id_)>0 ? $sample_id_ [0] ['sample_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of eia 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (eia)| null
     */
	public function getEia($id) {
		$columns = array ('id');
		$records = array ($id);
		$eia_ = $this->query_from_reference_dbs_eia ( $columns, $records );
		return sizeof($eia_)>0 ? $eia_ [0] ['eia'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lot 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (lot)| null
     */
	public function getLot($id) {
		$columns = array ('id');
		$records = array ($id);
		$lot_ = $this->query_from_reference_dbs_eia ( $columns, $records );
		return sizeof($lot_)>0 ? $lot_ [0] ['lot'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of exp_date 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (exp_date)| null
     */
	public function getExpDate($id) {
		$columns = array ('id');
		$records = array ($id);
		$exp_date_ = $this->query_from_reference_dbs_eia ( $columns, $records );
		return sizeof($exp_date_)>0 ? $exp_date_ [0] ['exp_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of od 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (od)| null
     */
	public function getOd($id) {
		$columns = array ('id');
		$records = array ($id);
		$od_ = $this->query_from_reference_dbs_eia ( $columns, $records );
		return sizeof($od_)>0 ? $od_ [0] ['od'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of cutoff 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (cutoff)| null
     */
	public function getCutoff($id) {
		$columns = array ('id');
		$records = array ($id);
		$cutoff_ = $this->query_from_reference_dbs_eia ( $columns, $records );
		return sizeof($cutoff_)>0 ? $cutoff_ [0] ['cutoff'] : null;
	}
	

	
	   /**
	* Inserts data into the table[reference_dbs_eia] in the order below
	* array ('id','shipment_id','sample_id','eia','lot','exp_date','od','cutoff')
	* is mapped into
	* array ($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','shipment_id','sample_id','eia','lot','exp_date','od','cutoff');
		$records = array($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff);
		return $this->insert_records_to_reference_dbs_eia ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[reference_dbs_eia] in the order below
    * array ('id','shipment_id','sample_id','eia','lot','exp_date','od','cutoff')
    * is mapped into
    * array ($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff, $printSQL = false) {
    	$columns = array('id','shipment_id','sample_id','eia','lot','exp_date','od','cutoff');
    	$records = array($id,$shipment_id,$sample_id,$eia,$lot,$exp_date,$od,$cutoff);
    	return $this->delete_record_from_reference_dbs_eia( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'reference_dbs_eia' 
	*/
	public static function get_table() {
		return 'reference_dbs_eia';
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
     * Used  to calculate the number of times a record exists in the table reference_dbs_eia
     * It returns the number of times a record exists exists in the table reference_dbs_eia
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table reference_dbs_eia
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_reference_dbs_eia(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table reference_dbs_eia
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_reference_dbs_eia(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table reference_dbs_eia
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_reference_dbs_eia(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'reference_dbs_eia' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_reference_dbs_eia($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_dbs_eia that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_reference_dbs_eia(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_dbs_eia that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_reference_dbs_eia(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table reference_dbs_eia that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_reference_dbs_eia(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [reference_dbs_eia]
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
     * Inserts data into the table reference_dbs_eia
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
     * Updates all the records that meets the passed criteria from the table reference_dbs_eia
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
     * Gets an Associative array of the records in the table reference_dbs_eia that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_dbs_eia  that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_dbs_eia that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table reference_dbs_eia  that meets the passed criteria
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
