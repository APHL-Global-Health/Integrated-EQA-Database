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
* ReferenceDbsWb
*  
* Low level class for manipulating the data in the table reference_dbs_wb
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ReferenceDbsWb {

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
	* private class variable $_wb
	*/
	private $_wb;
	
	/**
	* returns the value of $wb
	*
	* @return object(int|string) wb
	*/
	public function _getWb() {
		return $this->_wb;
	}
	
	/**
	* sets the value of $_wb
	*
	* @param wb
	*/
	public function _setWb($wb) {
		$this->_wb = $wb;
	}
	/**
	* sets the value of $_wb
	*
	* @param wb
	* @return object ( this class)
	*/
	public function setWb($wb) {
		$this->_setWb($wb);
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
	* private class variable $_160
	*/
	private $_160;
	
	/**
	* returns the value of $160
	*
	* @return object(int|string) 160
	*/
	public function _get160() {
		return $this->_160;
	}
	
	/**
	* sets the value of $_160
	*
	* @param 160
	*/
	public function _set160($160) {
		$this->_160 = $160;
	}
	/**
	* sets the value of $_160
	*
	* @param 160
	* @return object ( this class)
	*/
	public function set160($160) {
		$this->_set160($160);
		return $this;
	}
	
	
	/**
	* private class variable $_120
	*/
	private $_120;
	
	/**
	* returns the value of $120
	*
	* @return object(int|string) 120
	*/
	public function _get120() {
		return $this->_120;
	}
	
	/**
	* sets the value of $_120
	*
	* @param 120
	*/
	public function _set120($120) {
		$this->_120 = $120;
	}
	/**
	* sets the value of $_120
	*
	* @param 120
	* @return object ( this class)
	*/
	public function set120($120) {
		$this->_set120($120);
		return $this;
	}
	
	
	/**
	* private class variable $_66
	*/
	private $_66;
	
	/**
	* returns the value of $66
	*
	* @return object(int|string) 66
	*/
	public function _get66() {
		return $this->_66;
	}
	
	/**
	* sets the value of $_66
	*
	* @param 66
	*/
	public function _set66($66) {
		$this->_66 = $66;
	}
	/**
	* sets the value of $_66
	*
	* @param 66
	* @return object ( this class)
	*/
	public function set66($66) {
		$this->_set66($66);
		return $this;
	}
	
	
	/**
	* private class variable $_55
	*/
	private $_55;
	
	/**
	* returns the value of $55
	*
	* @return object(int|string) 55
	*/
	public function _get55() {
		return $this->_55;
	}
	
	/**
	* sets the value of $_55
	*
	* @param 55
	*/
	public function _set55($55) {
		$this->_55 = $55;
	}
	/**
	* sets the value of $_55
	*
	* @param 55
	* @return object ( this class)
	*/
	public function set55($55) {
		$this->_set55($55);
		return $this;
	}
	
	
	/**
	* private class variable $_51
	*/
	private $_51;
	
	/**
	* returns the value of $51
	*
	* @return object(int|string) 51
	*/
	public function _get51() {
		return $this->_51;
	}
	
	/**
	* sets the value of $_51
	*
	* @param 51
	*/
	public function _set51($51) {
		$this->_51 = $51;
	}
	/**
	* sets the value of $_51
	*
	* @param 51
	* @return object ( this class)
	*/
	public function set51($51) {
		$this->_set51($51);
		return $this;
	}
	
	
	/**
	* private class variable $_41
	*/
	private $_41;
	
	/**
	* returns the value of $41
	*
	* @return object(int|string) 41
	*/
	public function _get41() {
		return $this->_41;
	}
	
	/**
	* sets the value of $_41
	*
	* @param 41
	*/
	public function _set41($41) {
		$this->_41 = $41;
	}
	/**
	* sets the value of $_41
	*
	* @param 41
	* @return object ( this class)
	*/
	public function set41($41) {
		$this->_set41($41);
		return $this;
	}
	
	
	/**
	* private class variable $_31
	*/
	private $_31;
	
	/**
	* returns the value of $31
	*
	* @return object(int|string) 31
	*/
	public function _get31() {
		return $this->_31;
	}
	
	/**
	* sets the value of $_31
	*
	* @param 31
	*/
	public function _set31($31) {
		$this->_31 = $31;
	}
	/**
	* sets the value of $_31
	*
	* @param 31
	* @return object ( this class)
	*/
	public function set31($31) {
		$this->_set31($31);
		return $this;
	}
	
	
	/**
	* private class variable $_24
	*/
	private $_24;
	
	/**
	* returns the value of $24
	*
	* @return object(int|string) 24
	*/
	public function _get24() {
		return $this->_24;
	}
	
	/**
	* sets the value of $_24
	*
	* @param 24
	*/
	public function _set24($24) {
		$this->_24 = $24;
	}
	/**
	* sets the value of $_24
	*
	* @param 24
	* @return object ( this class)
	*/
	public function set24($24) {
		$this->_set24($24);
		return $this;
	}
	
	
	/**
	* private class variable $_17
	*/
	private $_17;
	
	/**
	* returns the value of $17
	*
	* @return object(int|string) 17
	*/
	public function _get17() {
		return $this->_17;
	}
	
	/**
	* sets the value of $_17
	*
	* @param 17
	*/
	public function _set17($17) {
		$this->_17 = $17;
	}
	/**
	* sets the value of $_17
	*
	* @param 17
	* @return object ( this class)
	*/
	public function set17($17) {
		$this->_set17($17);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of id 
     * based on the value of $id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17 passed to the function
     *
     * @param $id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17
     * @return object (id)| null
     */
	public function getId($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17) {
		$columns = array ('id','shipment_id','sample_id','wb','lot','exp_date','160','120','66','55','51','41','31','24','17');
		$records = array ($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17);
		$id_ = $this->query_from_reference_dbs_wb ( $columns, $records );
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
		$shipment_id_ = $this->query_from_reference_dbs_wb ( $columns, $records );
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
		$sample_id_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($sample_id_)>0 ? $sample_id_ [0] ['sample_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (wb)| null
     */
	public function getWb($id) {
		$columns = array ('id');
		$records = array ($id);
		$wb_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($wb_)>0 ? $wb_ [0] ['wb'] : null;
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
		$lot_ = $this->query_from_reference_dbs_wb ( $columns, $records );
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
		$exp_date_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($exp_date_)>0 ? $exp_date_ [0] ['exp_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 160 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (160)| null
     */
	public function get160($id) {
		$columns = array ('id');
		$records = array ($id);
		$160_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($160_)>0 ? $160_ [0] ['160'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 120 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (120)| null
     */
	public function get120($id) {
		$columns = array ('id');
		$records = array ($id);
		$120_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($120_)>0 ? $120_ [0] ['120'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 66 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (66)| null
     */
	public function get66($id) {
		$columns = array ('id');
		$records = array ($id);
		$66_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($66_)>0 ? $66_ [0] ['66'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 55 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (55)| null
     */
	public function get55($id) {
		$columns = array ('id');
		$records = array ($id);
		$55_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($55_)>0 ? $55_ [0] ['55'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 51 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (51)| null
     */
	public function get51($id) {
		$columns = array ('id');
		$records = array ($id);
		$51_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($51_)>0 ? $51_ [0] ['51'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 41 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (41)| null
     */
	public function get41($id) {
		$columns = array ('id');
		$records = array ($id);
		$41_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($41_)>0 ? $41_ [0] ['41'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 31 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (31)| null
     */
	public function get31($id) {
		$columns = array ('id');
		$records = array ($id);
		$31_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($31_)>0 ? $31_ [0] ['31'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 24 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (24)| null
     */
	public function get24($id) {
		$columns = array ('id');
		$records = array ($id);
		$24_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($24_)>0 ? $24_ [0] ['24'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of 17 
     * based on the value of $id passed to the function
     *
     * @param $id
     * @return object (17)| null
     */
	public function get17($id) {
		$columns = array ('id');
		$records = array ($id);
		$17_ = $this->query_from_reference_dbs_wb ( $columns, $records );
		return sizeof($17_)>0 ? $17_ [0] ['17'] : null;
	}
	

	
	   /**
	* Inserts data into the table[reference_dbs_wb] in the order below
	* array ('id','shipment_id','sample_id','wb','lot','exp_date','160','120','66','55','51','41','31','24','17')
	* is mapped into
	* array ($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','shipment_id','sample_id','wb','lot','exp_date','160','120','66','55','51','41','31','24','17');
		$records = array($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17);
		return $this->insert_records_to_reference_dbs_wb ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[reference_dbs_wb] in the order below
    * array ('id','shipment_id','sample_id','wb','lot','exp_date','160','120','66','55','51','41','31','24','17')
    * is mapped into
    * array ($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17, $printSQL = false) {
    	$columns = array('id','shipment_id','sample_id','wb','lot','exp_date','160','120','66','55','51','41','31','24','17');
    	$records = array($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17);
    	return $this->delete_record_from_reference_dbs_wb( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'reference_dbs_wb' 
	*/
	public static function get_table() {
		return 'reference_dbs_wb';
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
     * Used  to calculate the number of times a record exists in the table reference_dbs_wb
     * It returns the number of times a record exists exists in the table reference_dbs_wb
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table reference_dbs_wb
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_reference_dbs_wb(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table reference_dbs_wb
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_reference_dbs_wb(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table reference_dbs_wb
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_reference_dbs_wb(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'reference_dbs_wb' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_reference_dbs_wb($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_dbs_wb that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_reference_dbs_wb(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_dbs_wb that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_reference_dbs_wb(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table reference_dbs_wb that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_reference_dbs_wb(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [reference_dbs_wb]
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
     * Inserts data into the table reference_dbs_wb
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
     * Updates all the records that meets the passed criteria from the table reference_dbs_wb
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
     * Gets an Associative array of the records in the table reference_dbs_wb that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_dbs_wb  that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_dbs_wb that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table reference_dbs_wb  that meets the passed criteria
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
