<?php 

	namespace database\modules;

	use database\crud\RepProviderprograms;

	/**
	*  
	*	RepProviderprogramsInfo
	*  
	* Provides High level features for interacting with the RepProviderprograms;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RepProviderprogramsInfo{

	private $build;
	private $client;
	private $action;
	private $rep_providerprograms;
	private $table = 'rep_providerprograms';
	/**
	 * RepProviderprogramsInfo
	 * 
	 * Class to get all the rep_providerprograms Information from the rep_providerprograms table 
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
		
		$this->rep_providerprograms = new RepProviderprograms( $action, $client );

	}

	

		/**
	* Inserts data into the table[rep_providerprograms] in the order below
	* array ('ID','ProviderID','ProgramID','CreatedBy','CreatedDate')
	* is mappped into 
	* array ($ID,$ProviderID,$ProgramID,$CreatedBy,$CreatedDate)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($ID,$ProviderID,$ProgramID,$CreatedBy,$CreatedDate,$redundancy_check= false, $printSQL = false) {
		$columns = array('ID','ProviderID','ProgramID','CreatedBy','CreatedDate');
		$records = array($ID,$ProviderID,$ProgramID,$CreatedBy,$CreatedDate);
		return $this->rep_providerprograms->insert_prepared_records($ID,$ProviderID,$ProgramID,$CreatedBy,$CreatedDate,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_rep_providerprograms = $this->rep_providerprograms->fetch_assoc_in_rep_providerprograms ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_providerprograms);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_providerprograms);
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
        return $this->rep_providerprograms->insert_raw($records, $printSQL);
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
        public function insert_records_to_rep_providerprograms(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->rep_providerprograms->insert_records_to_rep_providerprograms($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_rep_providerprograms = $this->rep_providerprograms->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_providerprograms);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_providerprograms);
		}
	}

	public function query_eng_build($queried_rep_providerprograms){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_providerprograms);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_providerprograms);
		}
	}
	public function query_user_build($queried_rep_providerprograms){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_providerprograms);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_providerprograms);
		}
	}
	public function export_query_json($queried_rep_providerprograms){
		$query_json = json_encode($queried_rep_providerprograms);
		return $query_json;
	}
	public function export_query_html($queried_rep_providerprograms){
		$query_html = "";
		foreach ( $queried_rep_providerprograms as $rep_providerprograms_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $rep_providerprograms_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $rep_providerprograms_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$ID = $rep_providerprograms_row_items ['ID'];
	if ($ID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ID', $ID  );
}
$ProviderID = $rep_providerprograms_row_items ['ProviderID'];
	if ($ProviderID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ProviderID', $ProviderID  );
}
$ProgramID = $rep_providerprograms_row_items ['ProgramID'];
	if ($ProgramID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ProgramID', $ProgramID  );
}
$CreatedBy = $rep_providerprograms_row_items ['CreatedBy'];
	if ($CreatedBy  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedBy', $CreatedBy  );
}
$CreatedDate = $rep_providerprograms_row_items ['CreatedDate'];
	if ($CreatedDate  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedDate', $CreatedDate  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
