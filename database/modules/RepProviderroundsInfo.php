<?php 

	namespace database\modules;

	use database\crud\RepProviderrounds;

	/**
	*  
	*	RepProviderroundsInfo
	*  
	* Provides High level features for interacting with the RepProviderrounds;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RepProviderroundsInfo{

	private $build;
	private $client;
	private $action;
	private $rep_providerrounds;
	private $table = 'rep_providerrounds';
	/**
	 * RepProviderroundsInfo
	 * 
	 * Class to get all the rep_providerrounds Information from the rep_providerrounds table 
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
		
		$this->rep_providerrounds = new RepProviderrounds( $action, $client );

	}

	

		/**
	* Inserts data into the table[rep_providerrounds] in the order below
	* array ('ID','PeriodDescription','ProviderID','EnrolledLabs','CreatedBy','CreatedDate')
	* is mappped into 
	* array ($ID,$PeriodDescription,$ProviderID,$EnrolledLabs,$CreatedBy,$CreatedDate)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($ID,$PeriodDescription,$ProviderID,$EnrolledLabs,$CreatedBy,$CreatedDate,$redundancy_check= false, $printSQL = false) {
		$columns = array('ID','PeriodDescription','ProviderID','EnrolledLabs','CreatedBy','CreatedDate');
		$records = array($ID,$PeriodDescription,$ProviderID,$EnrolledLabs,$CreatedBy,$CreatedDate);
		return $this->rep_providerrounds->insert_prepared_records($ID,$PeriodDescription,$ProviderID,$EnrolledLabs,$CreatedBy,$CreatedDate,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_rep_providerrounds = $this->rep_providerrounds->fetch_assoc_in_rep_providerrounds ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_providerrounds);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_providerrounds);
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
        return $this->rep_providerrounds->insert_raw($records, $printSQL);
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
        public function insert_records_to_rep_providerrounds(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->rep_providerrounds->insert_records_to_rep_providerrounds($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_rep_providerrounds = $this->rep_providerrounds->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_providerrounds);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_providerrounds);
		}
	}

	public function query_eng_build($queried_rep_providerrounds){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_providerrounds);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_providerrounds);
		}
	}
	public function query_user_build($queried_rep_providerrounds){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_providerrounds);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_providerrounds);
		}
	}
	public function export_query_json($queried_rep_providerrounds){
		$query_json = json_encode($queried_rep_providerrounds);
		return $query_json;
	}
	public function export_query_html($queried_rep_providerrounds){
		$query_html = "";
		foreach ( $queried_rep_providerrounds as $rep_providerrounds_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $rep_providerrounds_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $rep_providerrounds_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$ID = $rep_providerrounds_row_items ['ID'];
	if ($ID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ID', $ID  );
}
$PeriodDescription = $rep_providerrounds_row_items ['PeriodDescription'];
	if ($PeriodDescription  != null) {
	$html_export .= $this->parseHtmlExport ( 'PeriodDescription', $PeriodDescription  );
}
$ProviderID = $rep_providerrounds_row_items ['ProviderID'];
	if ($ProviderID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ProviderID', $ProviderID  );
}
$EnrolledLabs = $rep_providerrounds_row_items ['EnrolledLabs'];
	if ($EnrolledLabs  != null) {
	$html_export .= $this->parseHtmlExport ( 'EnrolledLabs', $EnrolledLabs  );
}
$CreatedBy = $rep_providerrounds_row_items ['CreatedBy'];
	if ($CreatedBy  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedBy', $CreatedBy  );
}
$CreatedDate = $rep_providerrounds_row_items ['CreatedDate'];
	if ($CreatedDate  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedDate', $CreatedDate  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
