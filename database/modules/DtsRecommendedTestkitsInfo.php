<?php 

	namespace database\modules;

	use database\crud\DtsRecommendedTestkits;

	/**
	*  
	*	DtsRecommendedTestkitsInfo
	*  
	* Provides High level features for interacting with the DtsRecommendedTestkits;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class DtsRecommendedTestkitsInfo{

	private $build;
	private $client;
	private $action;
	private $dts_recommended_testkits;
	private $table = 'dts_recommended_testkits';
	/**
	 * DtsRecommendedTestkitsInfo
	 * 
	 * Class to get all the dts_recommended_testkits Information from the dts_recommended_testkits table 
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
		
		$this->dts_recommended_testkits = new DtsRecommendedTestkits( $action, $client );

	}

	

		/**
	* Inserts data into the table[dts_recommended_testkits] in the order below
	* array ('test_no','testkit')
	* is mappped into 
	* array ($test_no,$testkit)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($test_no,$testkit,$redundancy_check= false, $printSQL = false) {
		$columns = array('test_no','testkit');
		$records = array($test_no,$testkit);
		return $this->dts_recommended_testkits->insert_prepared_records($test_no,$testkit,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_dts_recommended_testkits = $this->dts_recommended_testkits->fetch_assoc_in_dts_recommended_testkits ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_dts_recommended_testkits);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_dts_recommended_testkits);
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
        return $this->dts_recommended_testkits->insert_raw($records, $printSQL);
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
        public function insert_records_to_dts_recommended_testkits(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->dts_recommended_testkits->insert_records_to_dts_recommended_testkits($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_dts_recommended_testkits = $this->dts_recommended_testkits->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_dts_recommended_testkits);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_dts_recommended_testkits);
		}
	}

	public function query_eng_build($queried_dts_recommended_testkits){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_dts_recommended_testkits);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_dts_recommended_testkits);
		}
	}
	public function query_user_build($queried_dts_recommended_testkits){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_dts_recommended_testkits);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_dts_recommended_testkits);
		}
	}
	public function export_query_json($queried_dts_recommended_testkits){
		$query_json = json_encode($queried_dts_recommended_testkits);
		return $query_json;
	}
	public function export_query_html($queried_dts_recommended_testkits){
		$query_html = "";
		foreach ( $queried_dts_recommended_testkits as $dts_recommended_testkits_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $dts_recommended_testkits_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $dts_recommended_testkits_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$test_no = $dts_recommended_testkits_row_items ['test_no'];
	if ($test_no  != null) {
	$html_export .= $this->parseHtmlExport ( 'test_no', $test_no  );
}
$testkit = $dts_recommended_testkits_row_items ['testkit'];
	if ($testkit  != null) {
	$html_export .= $this->parseHtmlExport ( 'testkit', $testkit  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
