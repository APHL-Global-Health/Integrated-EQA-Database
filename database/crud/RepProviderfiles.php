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
* RepProviderfiles
*  
* Low level class for manipulating the data in the table rep_providerfiles
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class RepProviderfiles {

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
	* private class variable $_periodID
	*/
	private $_periodID;
	
	/**
	* returns the value of $periodID
	*
	* @return object(int|string) periodID
	*/
	public function _getPeriodID() {
		return $this->_periodID;
	}
	
	/**
	* sets the value of $_periodID
	*
	* @param periodID
	*/
	public function _setPeriodID($periodID) {
		$this->_periodID = $periodID;
	}
	/**
	* sets the value of $_periodID
	*
	* @param periodID
	* @return object ( this class)
	*/
	public function setPeriodID($periodID) {
		$this->_setPeriodID($periodID);
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
	* private class variable $_fileName
	*/
	private $_fileName;
	
	/**
	* returns the value of $fileName
	*
	* @return object(int|string) fileName
	*/
	public function _getFileName() {
		return $this->_fileName;
	}
	
	/**
	* sets the value of $_fileName
	*
	* @param fileName
	*/
	public function _setFileName($fileName) {
		$this->_fileName = $fileName;
	}
	/**
	* sets the value of $_fileName
	*
	* @param fileName
	* @return object ( this class)
	*/
	public function setFileName($fileName) {
		$this->_setFileName($fileName);
		return $this;
	}
	
	
	/**
	* private class variable $_fileType
	*/
	private $_fileType;
	
	/**
	* returns the value of $fileType
	*
	* @return object(int|string) fileType
	*/
	public function _getFileType() {
		return $this->_fileType;
	}
	
	/**
	* sets the value of $_fileType
	*
	* @param fileType
	*/
	public function _setFileType($fileType) {
		$this->_fileType = $fileType;
	}
	/**
	* sets the value of $_fileType
	*
	* @param fileType
	* @return object ( this class)
	*/
	public function setFileType($fileType) {
		$this->_setFileType($fileType);
		return $this;
	}
	
	
	/**
	* private class variable $_fileSize
	*/
	private $_fileSize;
	
	/**
	* returns the value of $fileSize
	*
	* @return object(int|string) fileSize
	*/
	public function _getFileSize() {
		return $this->_fileSize;
	}
	
	/**
	* sets the value of $_fileSize
	*
	* @param fileSize
	*/
	public function _setFileSize($fileSize) {
		$this->_fileSize = $fileSize;
	}
	/**
	* sets the value of $_fileSize
	*
	* @param fileSize
	* @return object ( this class)
	*/
	public function setFileSize($fileSize) {
		$this->_setFileSize($fileSize);
		return $this;
	}
	
	
	/**
	* private class variable $_url
	*/
	private $_url;
	
	/**
	* returns the value of $url
	*
	* @return object(int|string) url
	*/
	public function _getUrl() {
		return $this->_url;
	}
	
	/**
	* sets the value of $_url
	*
	* @param url
	*/
	public function _setUrl($url) {
		$this->_url = $url;
	}
	/**
	* sets the value of $_url
	*
	* @param url
	* @return object ( this class)
	*/
	public function setUrl($url) {
		$this->_setUrl($url);
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
     * Performs a database query and returns the value of ID 
     * based on the value of $ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate passed to the function
     *
     * @param $ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate
     * @return object (ID)| null
     */
	public function getID($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate) {
		$columns = array ('ID','ProviderID','PeriodID','ProgramID','FileName','FileType','FileSize','Url','CreatedBy','CreatedDate');
		$records = array ($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate);
		$ID_ = $this->query_from_rep_providerfiles ( $columns, $records );
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
		$ProviderID_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($ProviderID_)>0 ? $ProviderID_ [0] ['ProviderID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of PeriodID 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (PeriodID)| null
     */
	public function getPeriodID($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$PeriodID_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($PeriodID_)>0 ? $PeriodID_ [0] ['PeriodID'] : null;
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
		$ProgramID_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($ProgramID_)>0 ? $ProgramID_ [0] ['ProgramID'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of FileName 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (FileName)| null
     */
	public function getFileName($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$FileName_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($FileName_)>0 ? $FileName_ [0] ['FileName'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of FileType 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (FileType)| null
     */
	public function getFileType($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$FileType_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($FileType_)>0 ? $FileType_ [0] ['FileType'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of FileSize 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (FileSize)| null
     */
	public function getFileSize($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$FileSize_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($FileSize_)>0 ? $FileSize_ [0] ['FileSize'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of Url 
     * based on the value of $ID passed to the function
     *
     * @param $ID
     * @return object (Url)| null
     */
	public function getUrl($ID) {
		$columns = array ('ID');
		$records = array ($ID);
		$Url_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($Url_)>0 ? $Url_ [0] ['Url'] : null;
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
		$CreatedBy_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($CreatedBy_)>0 ? $CreatedBy_ [0] ['CreatedBy'] : null;
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
		$CreatedDate_ = $this->query_from_rep_providerfiles ( $columns, $records );
		return sizeof($CreatedDate_)>0 ? $CreatedDate_ [0] ['CreatedDate'] : null;
	}
	

	
	   /**
	* Inserts data into the table[rep_providerfiles] in the order below
	* array ('ID','ProviderID','PeriodID','ProgramID','FileName','FileType','FileSize','Url','CreatedBy','CreatedDate')
	* is mapped into
	* array ($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate,$redundancy_check= false, $printSQL = false) {
		$columns = array('ID','ProviderID','PeriodID','ProgramID','FileName','FileType','FileSize','Url','CreatedBy','CreatedDate');
		$records = array($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate);
		return $this->insert_records_to_rep_providerfiles ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[rep_providerfiles] in the order below
    * array ('ID','ProviderID','PeriodID','ProgramID','FileName','FileType','FileSize','Url','CreatedBy','CreatedDate')
    * is mapped into
    * array ($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate, $printSQL = false) {
    	$columns = array('ID','ProviderID','PeriodID','ProgramID','FileName','FileType','FileSize','Url','CreatedBy','CreatedDate');
    	$records = array($ID,$ProviderID,$PeriodID,$ProgramID,$FileName,$FileType,$FileSize,$Url,$CreatedBy,$CreatedDate);
    	return $this->delete_record_from_rep_providerfiles( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'rep_providerfiles' 
	*/
	public static function get_table() {
		return 'rep_providerfiles';
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
     * Used  to calculate the number of times a record exists in the table rep_providerfiles
     * It returns the number of times a record exists exists in the table rep_providerfiles
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table rep_providerfiles
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_rep_providerfiles(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table rep_providerfiles
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_rep_providerfiles(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table rep_providerfiles
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_rep_providerfiles(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'rep_providerfiles' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_rep_providerfiles($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_providerfiles that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_rep_providerfiles(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table rep_providerfiles that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_rep_providerfiles(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table rep_providerfiles that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_rep_providerfiles(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [rep_providerfiles]
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
     * Inserts data into the table rep_providerfiles
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
     * Updates all the records that meets the passed criteria from the table rep_providerfiles
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
     * Gets an Associative array of the records in the table rep_providerfiles that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_providerfiles  that meets the passed criteria
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
     * Gets an Associative array of the records in the table rep_providerfiles that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table rep_providerfiles  that meets the passed criteria
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
