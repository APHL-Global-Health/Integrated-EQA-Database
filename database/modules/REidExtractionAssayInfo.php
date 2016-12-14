<?php 

	namespace database\modules;

	use database\crud\REidExtractionAssay;

	/**
	*  
	*	REidExtractionAssayInfo
	*  
	* Provides High level features for interacting with the REidExtractionAssay;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class REidExtractionAssayInfo{

	private $build;
	private $client;
	private $action;
	private $r_eid_extraction_assay;
	private $table = 'r_eid_extraction_assay';
	/**
	 * REidExtractionAssayInfo
	 * 
	 * Class to get all the r_eid_extraction_assay Information from the r_eid_extraction_assay table 
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
		
		$this->r_eid_extraction_assay = new REidExtractionAssay( $action, $client );

	}

	

		/**
	* Inserts data into the table[r_eid_extraction_assay] in the order below
	* array ('id','name')
	* is mappped into 
	* array ($id,$name)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($id,$name,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','name');
		$records = array($id,$name);
		return $this->r_eid_extraction_assay->insert_prepared_records($id,$name,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_r_eid_extraction_assay = $this->r_eid_extraction_assay->fetch_assoc_in_r_eid_extraction_assay ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_eid_extraction_assay);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_eid_extraction_assay);
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
        return $this->r_eid_extraction_assay->insert_raw($records, $printSQL);
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
        public function insert_records_to_r_eid_extraction_assay(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->r_eid_extraction_assay->insert_records_to_r_eid_extraction_assay($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_r_eid_extraction_assay = $this->r_eid_extraction_assay->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_eid_extraction_assay);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_eid_extraction_assay);
		}
	}

	public function query_eng_build($queried_r_eid_extraction_assay){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_eid_extraction_assay);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_eid_extraction_assay);
		}
	}
	public function query_user_build($queried_r_eid_extraction_assay){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_eid_extraction_assay);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_eid_extraction_assay);
		}
	}
	public function export_query_json($queried_r_eid_extraction_assay){
		$query_json = json_encode($queried_r_eid_extraction_assay);
		return $query_json;
	}
	public function export_query_html($queried_r_eid_extraction_assay){
		$query_html = "";
		foreach ( $queried_r_eid_extraction_assay as $r_eid_extraction_assay_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $r_eid_extraction_assay_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $r_eid_extraction_assay_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$id = $r_eid_extraction_assay_row_items ['id'];
	if ($id  != null) {
	$html_export .= $this->parseHtmlExport ( 'id', $id  );
}
$name = $r_eid_extraction_assay_row_items ['name'];
	if ($name  != null) {
	$html_export .= $this->parseHtmlExport ( 'name', $name  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
