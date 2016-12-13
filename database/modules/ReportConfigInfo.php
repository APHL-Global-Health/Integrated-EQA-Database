<?php 

	namespace database\modules;

	use database\crud\ReportConfig;

	/**
	*  
	*	ReportConfigInfo
	*  
	* Provides High level features for interacting with the ReportConfig;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ReportConfigInfo{

	private $build;
	private $client;
	private $action;
	private $report_config;
	private $table = 'report_config';
	/**
	 * ReportConfigInfo
	 * 
	 * Class to get all the report_config Information from the report_config table 
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
		
		$this->report_config = new ReportConfig( $action, $client );

	}

	

		/**
	* Inserts data into the table[report_config] in the order below
	* array ('name','value')
	* is mappped into 
	* array ($name,$value)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($name,$value,$redundancy_check= false, $printSQL = false) {
		$columns = array('name','value');
		$records = array($name,$value);
		return $this->report_config->insert_prepared_records($name,$value,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_report_config = $this->report_config->fetch_assoc_in_report_config ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_report_config);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_report_config);
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
        return $this->report_config->insert_raw($records, $printSQL);
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
        public function insert_records_to_report_config(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->report_config->insert_records_to_report_config($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_report_config = $this->report_config->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_report_config);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_report_config);
		}
	}

	public function query_eng_build($queried_report_config){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_report_config);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_report_config);
		}
	}
	public function query_user_build($queried_report_config){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_report_config);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_report_config);
		}
	}
	public function export_query_json($queried_report_config){
		$query_json = json_encode($queried_report_config);
		return $query_json;
	}
	public function export_query_html($queried_report_config){
		$query_html = "";
		foreach ( $queried_report_config as $report_config_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $report_config_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $report_config_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$name = $report_config_row_items ['name'];
	if ($name  != null) {
	$html_export .= $this->parseHtmlExport ( 'name', $name  );
}
$value = $report_config_row_items ['value'];
	if ($value  != null) {
	$html_export .= $this->parseHtmlExport ( 'value', $value  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
