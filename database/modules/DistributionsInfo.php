<?php 

	namespace database\modules;

	use database\crud\Distributions;

	/**
	*  
	*	DistributionsInfo
	*  
	* Provides High level features for interacting with the Distributions;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class DistributionsInfo{

	private $build;
	private $client;
	private $action;
	private $distributions;
	private $table = 'distributions';
	/**
	 * DistributionsInfo
	 * 
	 * Class to get all the distributions Information from the distributions table 
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
		
		$this->distributions = new Distributions( $action, $client );

	}

	

		/**
	* Inserts data into the table[distributions] in the order below
	* array ('distribution_id','distribution_code','distribution_date','status','created_on','created_by','updated_on','updated_by')
	* is mappped into 
	* array ($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check= false, $printSQL = false) {
		$columns = array('distribution_id','distribution_code','distribution_date','status','created_on','created_by','updated_on','updated_by');
		$records = array($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by);
		return $this->distributions->insert_prepared_records($distribution_id,$distribution_code,$distribution_date,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_distributions = $this->distributions->fetch_assoc_in_distributions ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_distributions);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_distributions);
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
        return $this->distributions->insert_raw($records, $printSQL);
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
        public function insert_records_to_distributions(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->distributions->insert_records_to_distributions($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_distributions = $this->distributions->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_distributions);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_distributions);
		}
	}

	public function query_eng_build($queried_distributions){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_distributions);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_distributions);
		}
	}
	public function query_user_build($queried_distributions){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_distributions);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_distributions);
		}
	}
	public function export_query_json($queried_distributions){
		$query_json = json_encode($queried_distributions);
		return $query_json;
	}
	public function export_query_html($queried_distributions){
		$query_html = "";
		foreach ( $queried_distributions as $distributions_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $distributions_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $distributions_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$distribution_id = $distributions_row_items ['distribution_id'];
	if ($distribution_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'distribution_id', $distribution_id  );
}
$distribution_code = $distributions_row_items ['distribution_code'];
	if ($distribution_code  != null) {
	$html_export .= $this->parseHtmlExport ( 'distribution_code', $distribution_code  );
}
$distribution_date = $distributions_row_items ['distribution_date'];
	if ($distribution_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'distribution_date', $distribution_date  );
}
$status = $distributions_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}
$created_on = $distributions_row_items ['created_on'];
	if ($created_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_on', $created_on  );
}
$created_by = $distributions_row_items ['created_by'];
	if ($created_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_by', $created_by  );
}
$updated_on = $distributions_row_items ['updated_on'];
	if ($updated_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on', $updated_on  );
}
$updated_by = $distributions_row_items ['updated_by'];
	if ($updated_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by', $updated_by  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
