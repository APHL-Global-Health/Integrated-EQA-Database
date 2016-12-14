<?php 

	namespace database\modules;

	use database\crud\ShipmentParticipantMap;

	/**
	*  
	*	ShipmentParticipantMapInfo
	*  
	* Provides High level features for interacting with the ShipmentParticipantMap;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ShipmentParticipantMapInfo{

	private $build;
	private $client;
	private $action;
	private $shipment_participant_map;
	private $table = 'shipment_participant_map';
	/**
	 * ShipmentParticipantMapInfo
	 * 
	 * Class to get all the shipment_participant_map Information from the shipment_participant_map table 
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
		
		$this->shipment_participant_map = new ShipmentParticipantMap( $action, $client );

	}

	

		/**
	* Inserts data into the table[shipment_participant_map] in the order below
	* array ('map_id','shipment_id','participant_id','attributes','evaluation_status','shipment_score','documentation_score','shipment_test_date','shipment_receipt_date','shipment_test_report_date','participant_supervisor','supervisor_approval','review_date','final_result','failure_reason','evaluation_comment','optional_eval_comment','is_followup','is_excluded','user_comment','custom_field_1','custom_field_2','created_on_admin','updated_on_admin','updated_by_admin','updated_on_user','updated_by_user','created_by_admin','created_on_user','report_generated','last_new_shipment_mailed_on','new_shipment_mail_count','last_not_participated_mailed_on','last_not_participated_mail_count','qc_date','qc_done_by','qc_created_on','mode_id')
	* is mappped into 
	* array ($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id,$redundancy_check= false, $printSQL = false) {
		$columns = array('map_id','shipment_id','participant_id','attributes','evaluation_status','shipment_score','documentation_score','shipment_test_date','shipment_receipt_date','shipment_test_report_date','participant_supervisor','supervisor_approval','review_date','final_result','failure_reason','evaluation_comment','optional_eval_comment','is_followup','is_excluded','user_comment','custom_field_1','custom_field_2','created_on_admin','updated_on_admin','updated_by_admin','updated_on_user','updated_by_user','created_by_admin','created_on_user','report_generated','last_new_shipment_mailed_on','new_shipment_mail_count','last_not_participated_mailed_on','last_not_participated_mail_count','qc_date','qc_done_by','qc_created_on','mode_id');
		$records = array($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id);
		return $this->shipment_participant_map->insert_prepared_records($map_id,$shipment_id,$participant_id,$attributes,$evaluation_status,$shipment_score,$documentation_score,$shipment_test_date,$shipment_receipt_date,$shipment_test_report_date,$participant_supervisor,$supervisor_approval,$review_date,$final_result,$failure_reason,$evaluation_comment,$optional_eval_comment,$is_followup,$is_excluded,$user_comment,$custom_field_1,$custom_field_2,$created_on_admin,$updated_on_admin,$updated_by_admin,$updated_on_user,$updated_by_user,$created_by_admin,$created_on_user,$report_generated,$last_new_shipment_mailed_on,$new_shipment_mail_count,$last_not_participated_mailed_on,$last_not_participated_mail_count,$qc_date,$qc_done_by,$qc_created_on,$mode_id,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_shipment_participant_map = $this->shipment_participant_map->fetch_assoc_in_shipment_participant_map ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_shipment_participant_map);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_shipment_participant_map);
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
        return $this->shipment_participant_map->insert_raw($records, $printSQL);
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
        public function insert_records_to_shipment_participant_map(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->shipment_participant_map->insert_records_to_shipment_participant_map($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_shipment_participant_map = $this->shipment_participant_map->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_shipment_participant_map);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_shipment_participant_map);
		}
	}

	public function query_eng_build($queried_shipment_participant_map){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_shipment_participant_map);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_shipment_participant_map);
		}
	}
	public function query_user_build($queried_shipment_participant_map){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_shipment_participant_map);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_shipment_participant_map);
		}
	}
	public function export_query_json($queried_shipment_participant_map){
		$query_json = json_encode($queried_shipment_participant_map);
		return $query_json;
	}
	public function export_query_html($queried_shipment_participant_map){
		$query_html = "";
		foreach ( $queried_shipment_participant_map as $shipment_participant_map_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $shipment_participant_map_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $shipment_participant_map_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$map_id = $shipment_participant_map_row_items ['map_id'];
	if ($map_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'map_id', $map_id  );
}
$shipment_id = $shipment_participant_map_row_items ['shipment_id'];
	if ($shipment_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_id', $shipment_id  );
}
$participant_id = $shipment_participant_map_row_items ['participant_id'];
	if ($participant_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'participant_id', $participant_id  );
}
$attributes = $shipment_participant_map_row_items ['attributes'];
	if ($attributes  != null) {
	$html_export .= $this->parseHtmlExport ( 'attributes', $attributes  );
}
$evaluation_status = $shipment_participant_map_row_items ['evaluation_status'];
	if ($evaluation_status  != null) {
	$html_export .= $this->parseHtmlExport ( 'evaluation_status', $evaluation_status  );
}
$shipment_score = $shipment_participant_map_row_items ['shipment_score'];
	if ($shipment_score  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_score', $shipment_score  );
}
$documentation_score = $shipment_participant_map_row_items ['documentation_score'];
	if ($documentation_score  != null) {
	$html_export .= $this->parseHtmlExport ( 'documentation_score', $documentation_score  );
}
$shipment_test_date = $shipment_participant_map_row_items ['shipment_test_date'];
	if ($shipment_test_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_test_date', $shipment_test_date  );
}
$shipment_receipt_date = $shipment_participant_map_row_items ['shipment_receipt_date'];
	if ($shipment_receipt_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_receipt_date', $shipment_receipt_date  );
}
$shipment_test_report_date = $shipment_participant_map_row_items ['shipment_test_report_date'];
	if ($shipment_test_report_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipment_test_report_date', $shipment_test_report_date  );
}
$participant_supervisor = $shipment_participant_map_row_items ['participant_supervisor'];
	if ($participant_supervisor  != null) {
	$html_export .= $this->parseHtmlExport ( 'participant_supervisor', $participant_supervisor  );
}
$supervisor_approval = $shipment_participant_map_row_items ['supervisor_approval'];
	if ($supervisor_approval  != null) {
	$html_export .= $this->parseHtmlExport ( 'supervisor_approval', $supervisor_approval  );
}
$review_date = $shipment_participant_map_row_items ['review_date'];
	if ($review_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'review_date', $review_date  );
}
$final_result = $shipment_participant_map_row_items ['final_result'];
	if ($final_result  != null) {
	$html_export .= $this->parseHtmlExport ( 'final_result', $final_result  );
}
$failure_reason = $shipment_participant_map_row_items ['failure_reason'];
	if ($failure_reason  != null) {
	$html_export .= $this->parseHtmlExport ( 'failure_reason', $failure_reason  );
}
$evaluation_comment = $shipment_participant_map_row_items ['evaluation_comment'];
	if ($evaluation_comment  != null) {
	$html_export .= $this->parseHtmlExport ( 'evaluation_comment', $evaluation_comment  );
}
$optional_eval_comment = $shipment_participant_map_row_items ['optional_eval_comment'];
	if ($optional_eval_comment  != null) {
	$html_export .= $this->parseHtmlExport ( 'optional_eval_comment', $optional_eval_comment  );
}
$is_followup = $shipment_participant_map_row_items ['is_followup'];
	if ($is_followup  != null) {
	$html_export .= $this->parseHtmlExport ( 'is_followup', $is_followup  );
}
$is_excluded = $shipment_participant_map_row_items ['is_excluded'];
	if ($is_excluded  != null) {
	$html_export .= $this->parseHtmlExport ( 'is_excluded', $is_excluded  );
}
$user_comment = $shipment_participant_map_row_items ['user_comment'];
	if ($user_comment  != null) {
	$html_export .= $this->parseHtmlExport ( 'user_comment', $user_comment  );
}
$custom_field_1 = $shipment_participant_map_row_items ['custom_field_1'];
	if ($custom_field_1  != null) {
	$html_export .= $this->parseHtmlExport ( 'custom_field_1', $custom_field_1  );
}
$custom_field_2 = $shipment_participant_map_row_items ['custom_field_2'];
	if ($custom_field_2  != null) {
	$html_export .= $this->parseHtmlExport ( 'custom_field_2', $custom_field_2  );
}
$created_on_admin = $shipment_participant_map_row_items ['created_on_admin'];
	if ($created_on_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_on_admin', $created_on_admin  );
}
$updated_on_admin = $shipment_participant_map_row_items ['updated_on_admin'];
	if ($updated_on_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on_admin', $updated_on_admin  );
}
$updated_by_admin = $shipment_participant_map_row_items ['updated_by_admin'];
	if ($updated_by_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by_admin', $updated_by_admin  );
}
$updated_on_user = $shipment_participant_map_row_items ['updated_on_user'];
	if ($updated_on_user  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on_user', $updated_on_user  );
}
$updated_by_user = $shipment_participant_map_row_items ['updated_by_user'];
	if ($updated_by_user  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by_user', $updated_by_user  );
}
$created_by_admin = $shipment_participant_map_row_items ['created_by_admin'];
	if ($created_by_admin  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_by_admin', $created_by_admin  );
}
$created_on_user = $shipment_participant_map_row_items ['created_on_user'];
	if ($created_on_user  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_on_user', $created_on_user  );
}
$report_generated = $shipment_participant_map_row_items ['report_generated'];
	if ($report_generated  != null) {
	$html_export .= $this->parseHtmlExport ( 'report_generated', $report_generated  );
}
$last_new_shipment_mailed_on = $shipment_participant_map_row_items ['last_new_shipment_mailed_on'];
	if ($last_new_shipment_mailed_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'last_new_shipment_mailed_on', $last_new_shipment_mailed_on  );
}
$new_shipment_mail_count = $shipment_participant_map_row_items ['new_shipment_mail_count'];
	if ($new_shipment_mail_count  != null) {
	$html_export .= $this->parseHtmlExport ( 'new_shipment_mail_count', $new_shipment_mail_count  );
}
$last_not_participated_mailed_on = $shipment_participant_map_row_items ['last_not_participated_mailed_on'];
	if ($last_not_participated_mailed_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'last_not_participated_mailed_on', $last_not_participated_mailed_on  );
}
$last_not_participated_mail_count = $shipment_participant_map_row_items ['last_not_participated_mail_count'];
	if ($last_not_participated_mail_count  != null) {
	$html_export .= $this->parseHtmlExport ( 'last_not_participated_mail_count', $last_not_participated_mail_count  );
}
$qc_date = $shipment_participant_map_row_items ['qc_date'];
	if ($qc_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'qc_date', $qc_date  );
}
$qc_done_by = $shipment_participant_map_row_items ['qc_done_by'];
	if ($qc_done_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'qc_done_by', $qc_done_by  );
}
$qc_created_on = $shipment_participant_map_row_items ['qc_created_on'];
	if ($qc_created_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'qc_created_on', $qc_created_on  );
}
$mode_id = $shipment_participant_map_row_items ['mode_id'];
	if ($mode_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'mode_id', $mode_id  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
