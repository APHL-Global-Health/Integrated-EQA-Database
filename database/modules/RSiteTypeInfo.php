<?php 

	namespace database\modules;

	use database\crud\RSiteType;

	/**
	*  
	*	RSiteTypeInfo
	*  
	* Provides High level features for interacting with the RSiteType;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RSiteTypeInfo{

	private $build;
	private $client;
	private $action;
	private $r_site_type;
	private $table = 'r_site_type';
	/**
	 * RSiteTypeInfo
	 * 
	 * Class to get all the r_site_type Information from the r_site_type table 
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
		
		$this->r_site_type = new RSiteType( $action, $client );

	}

	

		/**
	* Inserts data into the table[r_site_type] in the order below
	* array ('r_stid','site_type')
	* is mappped into 
	* array ($r_stid,$site_type)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($r_stid,$site_type,$redundancy_check= false, $printSQL = false) {
		$columns = array('r_stid','site_type');
		$records = array($r_stid,$site_type);
		return $this->r_site_type->insert_prepared_records($r_stid,$site_type,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_r_site_type = $this->r_site_type->fetch_assoc_in_r_site_type ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_site_type);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_site_type);
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
        return $this->r_site_type->insert_raw($records, $printSQL);
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
        public function insert_records_to_r_site_type(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->r_site_type->insert_records_to_r_site_type($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_r_site_type = $this->r_site_type->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_site_type);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_site_type);
		}
	}

	public function query_eng_build($queried_r_site_type){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_site_type);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_site_type);
		}
	}
	public function query_user_build($queried_r_site_type){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_site_type);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_site_type);
		}
	}
	public function export_query_json($queried_r_site_type){
		$query_json = json_encode($queried_r_site_type);
		return $query_json;
	}
	public function export_query_html($queried_r_site_type){
		$query_html = "";
		foreach ( $queried_r_site_type as $r_site_type_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $r_site_type_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $r_site_type_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$r_stid = $r_site_type_row_items ['r_stid'];
	if ($r_stid  != null) {
	$html_export .= $this->parseHtmlExport ( 'r_stid', $r_stid  );
}
$site_type = $r_site_type_row_items ['site_type'];
	if ($site_type  != null) {
	$html_export .= $this->parseHtmlExport ( 'site_type', $site_type  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
