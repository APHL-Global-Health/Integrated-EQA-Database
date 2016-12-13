<?php 

	namespace database\modules;

	use database\crud\REnrolledPrograms;

	/**
	*  
	*	REnrolledProgramsInfo
	*  
	* Provides High level features for interacting with the REnrolledPrograms;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class REnrolledProgramsInfo{

	private $build;
	private $client;
	private $action;
	private $r_enrolled_programs;
	private $table = 'r_enrolled_programs';
	/**
	 * REnrolledProgramsInfo
	 * 
	 * Class to get all the r_enrolled_programs Information from the r_enrolled_programs table 
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
		
		$this->r_enrolled_programs = new REnrolledPrograms( $action, $client );

	}

	

		/**
	* Inserts data into the table[r_enrolled_programs] in the order below
	* array ('r_epid','enrolled_programs')
	* is mappped into 
	* array ($r_epid,$enrolled_programs)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($r_epid,$enrolled_programs,$redundancy_check= false, $printSQL = false) {
		$columns = array('r_epid','enrolled_programs');
		$records = array($r_epid,$enrolled_programs);
		return $this->r_enrolled_programs->insert_prepared_records($r_epid,$enrolled_programs,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_r_enrolled_programs = $this->r_enrolled_programs->fetch_assoc_in_r_enrolled_programs ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_enrolled_programs);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_enrolled_programs);
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
        return $this->r_enrolled_programs->insert_raw($records, $printSQL);
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
        public function insert_records_to_r_enrolled_programs(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->r_enrolled_programs->insert_records_to_r_enrolled_programs($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_r_enrolled_programs = $this->r_enrolled_programs->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_enrolled_programs);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_enrolled_programs);
		}
	}

	public function query_eng_build($queried_r_enrolled_programs){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_enrolled_programs);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_enrolled_programs);
		}
	}
	public function query_user_build($queried_r_enrolled_programs){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_enrolled_programs);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_enrolled_programs);
		}
	}
	public function export_query_json($queried_r_enrolled_programs){
		$query_json = json_encode($queried_r_enrolled_programs);
		return $query_json;
	}
	public function export_query_html($queried_r_enrolled_programs){
		$query_html = "";
		foreach ( $queried_r_enrolled_programs as $r_enrolled_programs_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $r_enrolled_programs_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $r_enrolled_programs_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$r_epid = $r_enrolled_programs_row_items ['r_epid'];
	if ($r_epid  != null) {
	$html_export .= $this->parseHtmlExport ( 'r_epid', $r_epid  );
}
$enrolled_programs = $r_enrolled_programs_row_items ['enrolled_programs'];
	if ($enrolled_programs  != null) {
	$html_export .= $this->parseHtmlExport ( 'enrolled_programs', $enrolled_programs  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
