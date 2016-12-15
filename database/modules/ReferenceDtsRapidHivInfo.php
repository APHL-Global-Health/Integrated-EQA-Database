<?php 

	namespace database\modules;

	use database\crud\ReferenceDtsRapidHiv;

	/**
	*  
	*	ReferenceDtsRapidHivInfo
	*  
	* Provides High level features for interacting with the ReferenceDtsRapidHiv;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ReferenceDtsRapidHivInfo{

	private $build;
	private $client;
	private $action;
	private $reference_dts_rapid_hiv;
	private $table = 'reference_dts_rapid_hiv';
	/**
	 * ReferenceDtsRapidHivInfo
	 * 
	 * Class to get all the reference_dts_rapid_hiv Information from the reference_dts_rapid_hiv table 
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
		
		$this->reference_dts_rapid_hiv = new ReferenceDtsRapidHiv( $action, $client );

	}

	

		/**
	* Inserts data into the table[reference_dts_rapid_hiv] in the order below
	* array ('id','shipment_id','sample_id','testkit','lot_no','expiry_date','result')
	* is mappped into 
	* array ($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','shipment_id','sample_id','testkit','lot_no','expiry_date','result');
		$records = array($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result);
		return $this->reference_dts_rapid_hiv->insert_prepared_records($id,$shipment_id,$sample_id,$testkit,$lot_no,$expiry_date,$result,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_reference_dts_rapid_hiv = $this->reference_dts_rapid_hiv->fetch_assoc_in_reference_dts_rapid_hiv ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_reference_dts_rapid_hiv);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_reference_dts_rapid_hiv);
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
        return $this->reference_dts_rapid_hiv->insert_raw($records, $printSQL);
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
        public function insert_records_to_reference_dts_rapid_hiv(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->reference_dts_rapid_hiv->insert_records_to_reference_dts_rapid_hiv($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_reference_dts_rapid_hiv = $this->reference_dts_rapid_hiv->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_reference_dts_rapid_hiv);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_reference_dts_rapid_hiv);
		}
	}

	public function query_eng_build($queried_reference_dts_rapid_hiv){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_reference_dts_rapid_hiv);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_reference_dts_rapid_hiv);
		}
	}
	public function query_user_build($queried_reference_dts_rapid_hiv){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_reference_dts_rapid_hiv);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_reference_dts_rapid_hiv);
		}
	}
	public function export_query_json($queried_reference_dts_rapid_hiv){
		$query_json = json_encode($queried_reference_dts_rapid_hiv);
		return $query_json;
	}
	public function export_query_html($queried_reference_dts_rapid_hiv){
		$query_html = "";
		foreach ( $queried_reference_dts_rapid_hiv as $reference_dts_rapid_hiv_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $reference_dts_rapid_hiv_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $reference_dts_rapid_hiv_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$id = $reference_dts_rapid_hiv_row_items ['id'];
	if ($id  != null) {
	$html_export .= $this->parseHtmlExport ( 'id', $id  );
}
$shipment_id = $reference_dts_rapid_hiv_row_items ['shipment_id'];
	if ($shipment_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_id', $shipment_id  );
}
$sample_id = $reference_dts_rapid_hiv_row_items ['sample_id'];
	if ($sample_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'sample_id', $sample_id  );
}
$testkit = $reference_dts_rapid_hiv_row_items ['testkit'];
	if ($testkit  != null) {
	$html_export .= $this->parseHtmlExport ( 'testkit', $testkit  );
}
$lot_no = $reference_dts_rapid_hiv_row_items ['lot_no'];
	if ($lot_no  != null) {
	$html_export .= $this->parseHtmlExport ( 'lot_no', $lot_no  );
}
$expiry_date = $reference_dts_rapid_hiv_row_items ['expiry_date'];
	if ($expiry_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'expiry_date', $expiry_date  );
}
$result = $reference_dts_rapid_hiv_row_items ['result'];
	if ($result  != null) {
	$html_export .= $this->parseHtmlExport ( 'result', $result  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
