<?php 

	namespace database\modules;

	use database\crud\Shipment;

	/**
	*  
	*	ShipmentInfo
	*  
	* Provides High level features for interacting with the Shipment;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ShipmentInfo{

	private $build;
	private $client;
	private $action;
	private $shipment;
	private $table = 'shipment';
	/**
	 * ShipmentInfo
	 * 
	 * Class to get all the shipment Information from the shipment table 
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
		
		$this->shipment = new Shipment( $action, $client );

	}

	

		/**
	* Inserts data into the table[shipment] in the order below
	* array ('shipment_id','shipment_code','scheme_type','shipment_date','lastdate_response','distribution_id','number_of_samples','number_of_controls','response_switch','max_score','average_score','shipment_comment','created_by_admin','created_on_admin','updated_by_admin','updated_on_admin','status')
	* is mappped into 
	* array ($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('shipment_id','shipment_code','scheme_type','shipment_date','lastdate_response','distribution_id','number_of_samples','number_of_controls','response_switch','max_score','average_score','shipment_comment','created_by_admin','created_on_admin','updated_by_admin','updated_on_admin','status');
		$records = array($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status);
		return $this->shipment->insert_prepared_records($shipment_id,$shipment_code,$scheme_type,$shipment_date,$lastdate_response,$distribution_id,$number_of_samples,$number_of_controls,$response_switch,$max_score,$average_score,$shipment_comment,$created_by_admin,$created_on_admin,$updated_by_admin,$updated_on_admin,$status,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_shipment = $this->shipment->fetch_assoc_in_shipment ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_shipment);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_shipment);
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
        return $this->shipment->insert_raw($records, $printSQL);
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
        public function insert_records_to_shipment(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->shipment->insert_records_to_shipment($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_shipment = $this->shipment->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_shipment);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_shipment);
		}
	}

	public function query_eng_build($queried_shipment){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_shipment);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_shipment);
		}
	}
	public function query_user_build($queried_shipment){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_shipment);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_shipment);
		}
	}
	public function export_query_json($queried_shipment){
		$query_json = json_encode($queried_shipment);
		return $query_json;
	}
	public function export_query_html($queried_shipment){
		$query_html = "";
		foreach ( $queried_shipment as $shipment_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $shipment_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $shipment_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$shipment_id = $shipment_row_items ['shipment_id'];
	if ($shipment_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_id', $shipment_id  );
}
$shipment_code = $shipment_row_items ['shipment_code'];
	if ($shipment_code  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_code', $shipment_code  );
}
$scheme_type = $shipment_row_items ['scheme_type'];
	if ($scheme_type  != null) {
	$html_export .= $this->parseHtmlExport ( 'scheme_type', $scheme_type  );
}
$shipment_date = $shipment_row_items ['shipment_date'];
	if ($shipment_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_date', $shipment_date  );
}
$lastdate_response = $shipment_row_items ['lastdate_response'];
	if ($lastdate_response  != null) {
	$html_export .= $this->parseHtmlExport ( 'lastdate_response', $lastdate_response  );
}
$distribution_id = $shipment_row_items ['distribution_id'];
	if ($distribution_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'distribution_id', $distribution_id  );
}
$number_of_samples = $shipment_row_items ['number_of_samples'];
	if ($number_of_samples  != null) {
	$html_export .= $this->parseHtmlExport ( 'number_of_samples', $number_of_samples  );
}
$number_of_controls = $shipment_row_items ['number_of_controls'];
	if ($number_of_controls  != null) {
	$html_export .= $this->parseHtmlExport ( 'number_of_controls', $number_of_controls  );
}
$response_switch = $shipment_row_items ['response_switch'];
	if ($response_switch  != null) {
	$html_export .= $this->parseHtmlExport ( 'response_switch', $response_switch  );
}
$max_score = $shipment_row_items ['max_score'];
	if ($max_score  != null) {
	$html_export .= $this->parseHtmlExport ( 'max_score', $max_score  );
}
$average_score = $shipment_row_items ['average_score'];
	if ($average_score  != null) {
	$html_export .= $this->parseHtmlExport ( 'average_score', $average_score  );
}
$shipment_comment = $shipment_row_items ['shipment_comment'];
	if ($shipment_comment  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_comment', $shipment_comment  );
}
$created_by_admin = $shipment_row_items ['created_by_admin'];
	if ($created_by_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_by_admin', $created_by_admin  );
}
$created_on_admin = $shipment_row_items ['created_on_admin'];
	if ($created_on_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_on_admin', $created_on_admin  );
}
$updated_by_admin = $shipment_row_items ['updated_by_admin'];
	if ($updated_by_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by_admin', $updated_by_admin  );
}
$updated_on_admin = $shipment_row_items ['updated_on_admin'];
	if ($updated_on_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on_admin', $updated_on_admin  );
}
$status = $shipment_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
