<?php 

	namespace database\modules;

	use database\crud\SchemeList;

	/**
	*  
	*	SchemeListInfo
	*  
	* Provides High level features for interacting with the SchemeList;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class SchemeListInfo{

	private $build;
	private $client;
	private $action;
	private $scheme_list;
	private $table = 'scheme_list';
	/**
	 * SchemeListInfo
	 * 
	 * Class to get all the scheme_list Information from the scheme_list table 
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
		
		$this->scheme_list = new SchemeList( $action, $client );

	}

	

		/**
	* Inserts data into the table[scheme_list] in the order below
	* array ('scheme_id','scheme_name','response_table','reference_result_table','attribute_list','status')
	* is mappped into 
	* array ($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('scheme_id','scheme_name','response_table','reference_result_table','attribute_list','status');
		$records = array($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status);
		return $this->scheme_list->insert_prepared_records($scheme_id,$scheme_name,$response_table,$reference_result_table,$attribute_list,$status,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_scheme_list = $this->scheme_list->fetch_assoc_in_scheme_list ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_scheme_list);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_scheme_list);
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
        return $this->scheme_list->insert_raw($records, $printSQL);
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
        public function insert_records_to_scheme_list(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->scheme_list->insert_records_to_scheme_list($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_scheme_list = $this->scheme_list->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_scheme_list);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_scheme_list);
		}
	}

	public function query_eng_build($queried_scheme_list){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_scheme_list);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_scheme_list);
		}
	}
	public function query_user_build($queried_scheme_list){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_scheme_list);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_scheme_list);
		}
	}
	public function export_query_json($queried_scheme_list){
		$query_json = json_encode($queried_scheme_list);
		return $query_json;
	}
	public function export_query_html($queried_scheme_list){
		$query_html = "";
		foreach ( $queried_scheme_list as $scheme_list_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $scheme_list_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $scheme_list_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$scheme_id = $scheme_list_row_items ['scheme_id'];
	if ($scheme_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'scheme_id', $scheme_id  );
}
$scheme_name = $scheme_list_row_items ['scheme_name'];
	if ($scheme_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'scheme_name', $scheme_name  );
}
$response_table = $scheme_list_row_items ['response_table'];
	if ($response_table  != null) {
	$html_export .= $this->parseHtmlExport ( 'response_table', $response_table  );
}
$reference_result_table = $scheme_list_row_items ['reference_result_table'];
	if ($reference_result_table  != null) {
	$html_export .= $this->parseHtmlExport ( 'reference_result_table', $reference_result_table  );
}
$attribute_list = $scheme_list_row_items ['attribute_list'];
	if ($attribute_list  != null) {
	$html_export .= $this->parseHtmlExport ( 'attribute_list', $attribute_list  );
}
$status = $scheme_list_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
