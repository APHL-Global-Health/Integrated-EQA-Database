<?php 

	namespace database\modules;

	use database\crud\RepCounties;

	/**
	*  
	*	RepCountiesInfo
	*  
	* Provides High level features for interacting with the RepCounties;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RepCountiesInfo{

	private $build;
	private $client;
	private $action;
	private $rep_counties;
	private $table = 'rep_counties';
	/**
	 * RepCountiesInfo
	 * 
	 * Class to get all the rep_counties Information from the rep_counties table 
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
		
		$this->rep_counties = new RepCounties( $action, $client );

	}

	

		/**
	* Inserts data into the table[rep_counties] in the order below
	* array ('CountyID','Description','CreatedBy','CreatedDate')
	* is mappped into 
	* array ($CountyID,$Description,$CreatedBy,$CreatedDate)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($CountyID,$Description,$CreatedBy,$CreatedDate,$redundancy_check= false, $printSQL = false) {
		$columns = array('CountyID','Description','CreatedBy','CreatedDate');
		$records = array($CountyID,$Description,$CreatedBy,$CreatedDate);
		return $this->rep_counties->insert_prepared_records($CountyID,$Description,$CreatedBy,$CreatedDate,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_rep_counties = $this->rep_counties->fetch_assoc_in_rep_counties ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_counties);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_counties);
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
        return $this->rep_counties->insert_raw($records, $printSQL);
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
        public function insert_records_to_rep_counties(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->rep_counties->insert_records_to_rep_counties($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_rep_counties = $this->rep_counties->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_counties);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_counties);
		}
	}

	public function query_eng_build($queried_rep_counties){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_counties);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_counties);
		}
	}
	public function query_user_build($queried_rep_counties){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_counties);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_counties);
		}
	}
	public function export_query_json($queried_rep_counties){
		$query_json = json_encode($queried_rep_counties);
		return $query_json;
	}
	public function export_query_html($queried_rep_counties){
		$query_html = "";
		foreach ( $queried_rep_counties as $rep_counties_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $rep_counties_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $rep_counties_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$CountyID = $rep_counties_row_items ['CountyID'];
	if ($CountyID  != null) {
	$html_export .= $this->parseHtmlExport ( 'CountyID', $CountyID  );
}
$Description = $rep_counties_row_items ['Description'];
	if ($Description  != null) {
	$html_export .= $this->parseHtmlExport ( 'Description', $Description  );
}
$CreatedBy = $rep_counties_row_items ['CreatedBy'];
	if ($CreatedBy  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedBy', $CreatedBy  );
}
$CreatedDate = $rep_counties_row_items ['CreatedDate'];
	if ($CreatedDate  != null) {
	$html_export .= $this->parseHtmlExport ( 'CreatedDate', $CreatedDate  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
