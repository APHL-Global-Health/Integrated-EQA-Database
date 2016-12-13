<?php 

	namespace database\modules;

	use database\crud\Enrollments;

	/**
	*  
	*	EnrollmentsInfo
	*  
	* Provides High level features for interacting with the Enrollments;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class EnrollmentsInfo{

	private $build;
	private $client;
	private $action;
	private $enrollments;
	private $table = 'enrollments';
	/**
	 * EnrollmentsInfo
	 * 
	 * Class to get all the enrollments Information from the enrollments table 
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
		
		$this->enrollments = new Enrollments( $action, $client );

	}

	

		/**
	* Inserts data into the table[enrollments] in the order below
	* array ('scheme_id','participant_id','enrolled_on','enrollment_ended_on','status')
	* is mappped into 
	* array ($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('scheme_id','participant_id','enrolled_on','enrollment_ended_on','status');
		$records = array($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status);
		return $this->enrollments->insert_prepared_records($scheme_id,$participant_id,$enrolled_on,$enrollment_ended_on,$status,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_enrollments = $this->enrollments->fetch_assoc_in_enrollments ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_enrollments);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_enrollments);
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
        return $this->enrollments->insert_raw($records, $printSQL);
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
        public function insert_records_to_enrollments(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->enrollments->insert_records_to_enrollments($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_enrollments = $this->enrollments->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_enrollments);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_enrollments);
		}
	}

	public function query_eng_build($queried_enrollments){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_enrollments);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_enrollments);
		}
	}
	public function query_user_build($queried_enrollments){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_enrollments);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_enrollments);
		}
	}
	public function export_query_json($queried_enrollments){
		$query_json = json_encode($queried_enrollments);
		return $query_json;
	}
	public function export_query_html($queried_enrollments){
		$query_html = "";
		foreach ( $queried_enrollments as $enrollments_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $enrollments_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $enrollments_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$scheme_id = $enrollments_row_items ['scheme_id'];
	if ($scheme_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'scheme_id', $scheme_id  );
}
$participant_id = $enrollments_row_items ['participant_id'];
	if ($participant_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'participant_id', $participant_id  );
}
$enrolled_on = $enrollments_row_items ['enrolled_on'];
	if ($enrolled_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'enrolled_on', $enrolled_on  );
}
$enrollment_ended_on = $enrollments_row_items ['enrollment_ended_on'];
	if ($enrollment_ended_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'enrollment_ended_on', $enrollment_ended_on  );
}
$status = $enrollments_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
