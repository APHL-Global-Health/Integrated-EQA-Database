<?php 

	namespace database\modules;

	use database\crud\RepLabs;

	/**
	*  
	*	RepLabsInfo
	*  
	* Provides High level features for interacting with the RepLabs;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RepLabsInfo{

	private $build;
	private $client;
	private $action;
	private $rep_labs;
	private $table = 'rep_labs';
	/**
	 * RepLabsInfo
	 * 
	 * Class to get all the rep_labs Information from the rep_labs table 
	 * @param String $action
	 * @param String $client
	 * @param String $build
	 * 
	 * @author Victor Mwenda
	 * Email : vmwenda.vm@gmail.com
	 * Phone : +254718034449
	 */
	public function __construct($action = "query", $client = "mobile-android",$build="user-build") {

		$this->client = $client;
		$this->action = $action;
		$this->build = $build;
		
		$this->rep_labs = new RepLabs( $action, $client );

	}

	

		/**
	* Inserts data into the table[rep_labs] in the order below
	* array ('LabID','LabName','County','Address','PostalCode','Telephone','ContactName','ContactEmail','ContactTelephone','Status','CreatedBy','CreatedDate')
	* is mappped into 
	* array ($LabID,$LabName,$County,$Address,$PostalCode,$Telephone,$ContactName,$ContactEmail,$ContactTelephone,$Status,$CreatedBy,$CreatedDate)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($LabID,$LabName,$County,$Address,$PostalCode,$Telephone,$ContactName,$ContactEmail,$ContactTelephone,$Status,$CreatedBy,$CreatedDate,$redundancy_check= false, $printSQL = false) {
		$columns = array('LabID','LabName','County','Address','PostalCode','Telephone','ContactName','ContactEmail','ContactTelephone','Status','CreatedBy','CreatedDate');
		$records = array($LabID,$LabName,$County,$Address,$PostalCode,$Telephone,$ContactName,$ContactEmail,$ContactTelephone,$Status,$CreatedBy,$CreatedDate);
		return $this->rep_labs->insert_prepared_records($LabID,$LabName,$County,$Address,$PostalCode,$Telephone,$ContactName,$ContactEmail,$ContactTelephone,$Status,$CreatedBy,$CreatedDate,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_rep_labs = $this->rep_labs->fetch_assoc_in_rep_labs ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_labs);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_labs);
		}
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
        return $this->rep_labs->insert_raw($records, $printSQL);
    }

    /**
     * Inserts records in a relation
     * The records are matched alongside the columns in the relation
         * @param array $columns
         * @param array $records
         * @param bool $redundancy_check
         * @param bool $printSQL
         * @return mixed
         */
        public function insert_records_to_rep_labs(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->rep_labs->insert_records_to_rep_labs($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_rep_labs = $this->rep_labs->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_labs);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_labs);
		}
	}

	public function query_eng_build($queried_rep_labs){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_labs);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_labs);
		}
	}
	public function query_user_build($queried_rep_labs){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_labs);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_labs);
		}
	}
	public function export_query_json($queried_rep_labs){
		$query_json = json_encode($queried_rep_labs);
		return $query_json;
	}
	public function export_query_html($queried_rep_labs){
		$query_html = "";
		foreach ( $queried_rep_labs as $rep_labs_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $rep_labs_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $rep_labs_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$LabID = $rep_labs_row_items ['LabID'];
	if ($LabID  != null) {
	$html_export .= $this->parseHtmlExport ( 'LabID', $LabID  );
}
$LabName = $rep_labs_row_items ['LabName'];
	if ($LabName  != null) {
	$html_export .= $this->parseHtmlExport ( 'LabName', $LabName  );
}
$County = $rep_labs_row_items ['County'];
	if ($County  != null) {
	$html_export .= $this->parseHtmlExport ( 'County', $County  );
}
$Address = $rep_labs_row_items ['Address'];
	if ($Address  != null) {
	$html_export .= $this->parseHtmlExport ( 'Address', $Address  );
}
$PostalCode = $rep_labs_row_items ['PostalCode'];
	if ($PostalCode  != null) {
	$html_export .= $this->parseHtmlExport ( 'PostalCode', $PostalCode  );
}
$Telephone = $rep_labs_row_items ['Telephone'];
	if ($Telephone  != null) {
	$html_export .= $this->parseHtmlExport ( 'Telephone', $Telephone  );
}
$ContactName = $rep_labs_row_items ['ContactName'];
	if ($ContactName  != null) {
	$html_export .= $this->parseHtmlExport ( 'ContactName', $ContactName  );
}
$ContactEmail = $rep_labs_row_items ['ContactEmail'];
	if ($ContactEmail  != null) {
	$html_export .= $this->parseHtmlExport ( 'ContactEmail', $ContactEmail  );
}
$ContactTelephone = $rep_labs_row_items ['ContactTelephone'];
	if ($ContactTelephone  != null) {
	$html_export .= $this->parseHtmlExport ( 'ContactTelephone', $ContactTelephone  );
}
$Status = $rep_labs_row_items ['Status'];
	if ($Status  != null) {
	$html_export .= $this->parseHtmlExport ( 'Status', $Status  );
}
$CreatedBy = $rep_labs_row_items ['CreatedBy'];
	if ($CreatedBy  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedBy', $CreatedBy  );
}
$CreatedDate = $rep_labs_row_items ['CreatedDate'];
	if ($CreatedDate  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedDate', $CreatedDate  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
