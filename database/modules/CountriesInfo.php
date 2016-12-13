<?php 

	namespace database\modules;

	use database\crud\Countries;

	/**
	*  
	*	CountriesInfo
	*  
	* Provides High level features for interacting with the Countries;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class CountriesInfo{

	private $build;
	private $client;
	private $action;
	private $countries;
	private $table = 'countries';
	/**
	 * CountriesInfo
	 * 
	 * Class to get all the countries Information from the countries table 
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
		
		$this->countries = new Countries( $action, $client );

	}

	

		/**
	* Inserts data into the table[countries] in the order below
	* array ('id','iso_name','iso2','iso3','numeric_code')
	* is mappped into 
	* array ($id,$iso_name,$iso2,$iso3,$numeric_code)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($id,$iso_name,$iso2,$iso3,$numeric_code,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','iso_name','iso2','iso3','numeric_code');
		$records = array($id,$iso_name,$iso2,$iso3,$numeric_code);
		return $this->countries->insert_prepared_records($id,$iso_name,$iso2,$iso3,$numeric_code,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_countries = $this->countries->fetch_assoc_in_countries ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_countries);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_countries);
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
        return $this->countries->insert_raw($records, $printSQL);
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
        public function insert_records_to_countries(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->countries->insert_records_to_countries($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_countries = $this->countries->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_countries);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_countries);
		}
	}

	public function query_eng_build($queried_countries){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_countries);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_countries);
		}
	}
	public function query_user_build($queried_countries){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_countries);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_countries);
		}
	}
	public function export_query_json($queried_countries){
		$query_json = json_encode($queried_countries);
		return $query_json;
	}
	public function export_query_html($queried_countries){
		$query_html = "";
		foreach ( $queried_countries as $countries_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $countries_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $countries_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$id = $countries_row_items ['id'];
	if ($id  != null) {
	$html_export .= $this->parseHtmlExport ( 'id', $id  );
}
$iso_name = $countries_row_items ['iso_name'];
	if ($iso_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'iso_name', $iso_name  );
}
$iso2 = $countries_row_items ['iso2'];
	if ($iso2  != null) {
	$html_export .= $this->parseHtmlExport ( 'iso2', $iso2  );
}
$iso3 = $countries_row_items ['iso3'];
	if ($iso3  != null) {
	$html_export .= $this->parseHtmlExport ( 'iso3', $iso3  );
}
$numeric_code = $countries_row_items ['numeric_code'];
	if ($numeric_code  != null) {
	$html_export .= $this->parseHtmlExport ( 'numeric_code', $numeric_code  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
