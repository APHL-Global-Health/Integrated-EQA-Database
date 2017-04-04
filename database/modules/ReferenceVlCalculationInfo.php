<?php 

	namespace database\modules;

	use database\crud\ReferenceVlCalculation;

	/**
	*  
	*	ReferenceVlCalculationInfo
	*  
	* Provides High level features for interacting with the ReferenceVlCalculation;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ReferenceVlCalculationInfo{

	private $build;
	private $client;
	private $action;
	private $reference_vl_calculation;
	private $table = 'reference_vl_calculation';
	/**
	 * ReferenceVlCalculationInfo
	 * 
	 * Class to get all the reference_vl_calculation Information from the reference_vl_calculation table 
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
		
		$this->reference_vl_calculation = new ReferenceVlCalculation( $action, $client );

	}

	

		/**
	* Inserts data into the table[reference_vl_calculation] in the order below
	* array ('shipment_id','sample_id','vl_assay','q1','q3','iqr','quartile_low','quartile_high','mean','sd','cv','low_limit','high_limit','calculated_on','manual_low_limit','manual_high_limit','updated_on','updated_by','use_range')
	* is mappped into 
	* array ($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range,$redundancy_check= false, $printSQL = false) {
		$columns = array('shipment_id','sample_id','vl_assay','q1','q3','iqr','quartile_low','quartile_high','mean','sd','cv','low_limit','high_limit','calculated_on','manual_low_limit','manual_high_limit','updated_on','updated_by','use_range');
		$records = array($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range);
		return $this->reference_vl_calculation->insert_prepared_records($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_reference_vl_calculation = $this->reference_vl_calculation->fetch_assoc_in_reference_vl_calculation ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_reference_vl_calculation);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_reference_vl_calculation);
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
        return $this->reference_vl_calculation->insert_raw($records, $printSQL);
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
        public function insert_records_to_reference_vl_calculation(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->reference_vl_calculation->insert_records_to_reference_vl_calculation($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_reference_vl_calculation = $this->reference_vl_calculation->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_reference_vl_calculation);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_reference_vl_calculation);
		}
	}

	public function query_eng_build($queried_reference_vl_calculation){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_reference_vl_calculation);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_reference_vl_calculation);
		}
	}
	public function query_user_build($queried_reference_vl_calculation){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_reference_vl_calculation);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_reference_vl_calculation);
		}
	}
	public function export_query_json($queried_reference_vl_calculation){
		$query_json = json_encode($queried_reference_vl_calculation);
		return $query_json;
	}
	public function export_query_html($queried_reference_vl_calculation){
		$query_html = "";
		foreach ( $queried_reference_vl_calculation as $reference_vl_calculation_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $reference_vl_calculation_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $reference_vl_calculation_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$shipment_id = $reference_vl_calculation_row_items ['shipment_id'];
	if ($shipment_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_id', $shipment_id  );
}
$sample_id = $reference_vl_calculation_row_items ['sample_id'];
	if ($sample_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'sample_id', $sample_id  );
}
$vl_assay = $reference_vl_calculation_row_items ['vl_assay'];
	if ($vl_assay  != null) {
	$html_export .= $this->parseHtmlExport ( 'vl_assay', $vl_assay  );
}
$q1 = $reference_vl_calculation_row_items ['q1'];
	if ($q1  != null) {
	$html_export .= $this->parseHtmlExport ( 'q1', $q1  );
}
$q3 = $reference_vl_calculation_row_items ['q3'];
	if ($q3  != null) {
	$html_export .= $this->parseHtmlExport ( 'q3', $q3  );
}
$iqr = $reference_vl_calculation_row_items ['iqr'];
	if ($iqr  != null) {
	$html_export .= $this->parseHtmlExport ( 'iqr', $iqr  );
}
$quartile_low = $reference_vl_calculation_row_items ['quartile_low'];
	if ($quartile_low  != null) {
	$html_export .= $this->parseHtmlExport ( 'quartile_low', $quartile_low  );
}
$quartile_high = $reference_vl_calculation_row_items ['quartile_high'];
	if ($quartile_high  != null) {
	$html_export .= $this->parseHtmlExport ( 'quartile_high', $quartile_high  );
}
$mean = $reference_vl_calculation_row_items ['mean'];
	if ($mean  != null) {
	$html_export .= $this->parseHtmlExport ( 'mean', $mean  );
}
$sd = $reference_vl_calculation_row_items ['sd'];
	if ($sd  != null) {
	$html_export .= $this->parseHtmlExport ( 'sd', $sd  );
}
$cv = $reference_vl_calculation_row_items ['cv'];
	if ($cv  != null) {
	$html_export .= $this->parseHtmlExport ( 'cv', $cv  );
}
$low_limit = $reference_vl_calculation_row_items ['low_limit'];
	if ($low_limit  != null) {
	$html_export .= $this->parseHtmlExport ( 'low_limit', $low_limit  );
}
$high_limit = $reference_vl_calculation_row_items ['high_limit'];
	if ($high_limit  != null) {
	$html_export .= $this->parseHtmlExport ( 'high_limit', $high_limit  );
}
$calculated_on = $reference_vl_calculation_row_items ['calculated_on'];
	if ($calculated_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'calculated_on', $calculated_on  );
}
$manual_low_limit = $reference_vl_calculation_row_items ['manual_low_limit'];
	if ($manual_low_limit  != null) {
	$html_export .= $this->parseHtmlExport ( 'manual_low_limit', $manual_low_limit  );
}
$manual_high_limit = $reference_vl_calculation_row_items ['manual_high_limit'];
	if ($manual_high_limit  != null) {
	$html_export .= $this->parseHtmlExport ( 'manual_high_limit', $manual_high_limit  );
}
$updated_on = $reference_vl_calculation_row_items ['updated_on'];
	if ($updated_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on', $updated_on  );
}
$updated_by = $reference_vl_calculation_row_items ['updated_by'];
	if ($updated_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by', $updated_by  );
}
$use_range = $reference_vl_calculation_row_items ['use_range'];
	if ($use_range  != null) {
	$html_export .= $this->parseHtmlExport ( 'use_range', $use_range  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
