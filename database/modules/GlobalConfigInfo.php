<?php 

	namespace database\modules;

	use database\crud\GlobalConfig;

	/**
	*  
	*	GlobalConfigInfo
	*  
	* Provides High level features for interacting with the GlobalConfig;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class GlobalConfigInfo{

	private $build;
	private $client;
	private $action;
	private $global_config;
	private $table = 'global_config';
	/**
	 * GlobalConfigInfo
	 * 
	 * Class to get all the global_config Information from the global_config table 
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
		
		$this->global_config = new GlobalConfig( $action, $client );

	}

	

		/**
	* Inserts data into the table[global_config] in the order below
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
		return $this->global_config->insert_prepared_records($name,$value,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_global_config = $this->global_config->fetch_assoc_in_global_config ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_global_config);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_global_config);
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
        return $this->global_config->insert_raw($records, $printSQL);
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
        public function insert_records_to_global_config(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->global_config->insert_records_to_global_config($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_global_config = $this->global_config->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_global_config);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_global_config);
		}
	}

	public function query_eng_build($queried_global_config){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_global_config);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_global_config);
		}
	}
	public function query_user_build($queried_global_config){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_global_config);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_global_config);
		}
	}
	public function export_query_json($queried_global_config){
		$query_json = json_encode($queried_global_config);
		return $query_json;
	}
	public function export_query_html($queried_global_config){
		$query_html = "";
		foreach ( $queried_global_config as $global_config_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $global_config_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $global_config_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$name = $global_config_row_items ['name'];
	if ($name  != null) {
	$html_export .= $this->parseHtmlExport ( 'name', $name  );
}
$value = $global_config_row_items ['value'];
	if ($value  != null) {
	$html_export .= $this->parseHtmlExport ( 'value', $value  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
