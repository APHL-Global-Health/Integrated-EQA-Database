<?php 

	namespace database\modules;

	use database\crud\ReferenceDtsWb;

	/**
	*  
	*	ReferenceDtsWbInfo
	*  
	* Provides High level features for interacting with the ReferenceDtsWb;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ReferenceDtsWbInfo{

	private $build;
	private $client;
	private $action;
	private $reference_dts_wb;
	private $table = 'reference_dts_wb';
	/**
	 * ReferenceDtsWbInfo
	 * 
	 * Class to get all the reference_dts_wb Information from the reference_dts_wb table 
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
		
		$this->reference_dts_wb = new ReferenceDtsWb( $action, $client );

	}

	

		/**
	* Inserts data into the table[reference_dts_wb] in the order below
	* array ('id','shipment_id','sample_id','wb','lot','exp_date','160','120','66','55','51','41','31','24','17')
	* is mappped into 
	* array ($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17,$redundancy_check= false, $printSQL = false) {
		$columns = array('id','shipment_id','sample_id','wb','lot','exp_date','160','120','66','55','51','41','31','24','17');
		$records = array($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17);
		return $this->reference_dts_wb->insert_prepared_records($id,$shipment_id,$sample_id,$wb,$lot,$exp_date,$160,$120,$66,$55,$51,$41,$31,$24,$17,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_reference_dts_wb = $this->reference_dts_wb->fetch_assoc_in_reference_dts_wb ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_reference_dts_wb);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_reference_dts_wb);
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
        return $this->reference_dts_wb->insert_raw($records, $printSQL);
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
        public function insert_records_to_reference_dts_wb(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->reference_dts_wb->insert_records_to_reference_dts_wb($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_reference_dts_wb = $this->reference_dts_wb->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_reference_dts_wb);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_reference_dts_wb);
		}
	}

	public function query_eng_build($queried_reference_dts_wb){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_reference_dts_wb);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_reference_dts_wb);
		}
	}
	public function query_user_build($queried_reference_dts_wb){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_reference_dts_wb);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_reference_dts_wb);
		}
	}
	public function export_query_json($queried_reference_dts_wb){
		$query_json = json_encode($queried_reference_dts_wb);
		return $query_json;
	}
	public function export_query_html($queried_reference_dts_wb){
		$query_html = "";
		foreach ( $queried_reference_dts_wb as $reference_dts_wb_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $reference_dts_wb_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $reference_dts_wb_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$id = $reference_dts_wb_row_items ['id'];
	if ($id  != null) {
	$html_export .= $this->parseHtmlExport ( 'id', $id  );
}
$shipment_id = $reference_dts_wb_row_items ['shipment_id'];
	if ($shipment_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_id', $shipment_id  );
}
$sample_id = $reference_dts_wb_row_items ['sample_id'];
	if ($sample_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'sample_id', $sample_id  );
}
$wb = $reference_dts_wb_row_items ['wb'];
	if ($wb  != null) {
	$html_export .= $this->parseHtmlExport ( 'wb', $wb  );
}
$lot = $reference_dts_wb_row_items ['lot'];
	if ($lot  != null) {
	$html_export .= $this->parseHtmlExport ( 'lot', $lot  );
}
$exp_date = $reference_dts_wb_row_items ['exp_date'];
	if ($exp_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'exp_date', $exp_date  );
}
$160 = $reference_dts_wb_row_items ['160'];
	if ($160  != null) {
	$html_export .= $this->parseHtmlExport ( '160', $160  );
}
$120 = $reference_dts_wb_row_items ['120'];
	if ($120  != null) {
	$html_export .= $this->parseHtmlExport ( '120', $120  );
}
$66 = $reference_dts_wb_row_items ['66'];
	if ($66  != null) {
	$html_export .= $this->parseHtmlExport ( '66', $66  );
}
$55 = $reference_dts_wb_row_items ['55'];
	if ($55  != null) {
	$html_export .= $this->parseHtmlExport ( '55', $55  );
}
$51 = $reference_dts_wb_row_items ['51'];
	if ($51  != null) {
	$html_export .= $this->parseHtmlExport ( '51', $51  );
}
$41 = $reference_dts_wb_row_items ['41'];
	if ($41  != null) {
	$html_export .= $this->parseHtmlExport ( '41', $41  );
}
$31 = $reference_dts_wb_row_items ['31'];
	if ($31  != null) {
	$html_export .= $this->parseHtmlExport ( '31', $31  );
}
$24 = $reference_dts_wb_row_items ['24'];
	if ($24  != null) {
	$html_export .= $this->parseHtmlExport ( '24', $24  );
}
$17 = $reference_dts_wb_row_items ['17'];
	if ($17  != null) {
	$html_export .= $this->parseHtmlExport ( '17', $17  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
