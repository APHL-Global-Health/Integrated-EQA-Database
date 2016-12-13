<?php 

	namespace database\modules;

	use database\crud\ParticipantEnrolledProgramsMap;

	/**
	*  
	*	ParticipantEnrolledProgramsMapInfo
	*  
	* Provides High level features for interacting with the ParticipantEnrolledProgramsMap;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ParticipantEnrolledProgramsMapInfo{

	private $build;
	private $client;
	private $action;
	private $participant_enrolled_programs_map;
	private $table = 'participant_enrolled_programs_map';
	/**
	 * ParticipantEnrolledProgramsMapInfo
	 * 
	 * Class to get all the participant_enrolled_programs_map Information from the participant_enrolled_programs_map table 
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
		
		$this->participant_enrolled_programs_map = new ParticipantEnrolledProgramsMap( $action, $client );

	}

	

		/**
	* Inserts data into the table[participant_enrolled_programs_map] in the order below
	* array ('participant_id','ep_id')
	* is mappped into 
	* array ($participant_id,$ep_id)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($participant_id,$ep_id,$redundancy_check= false, $printSQL = false) {
		$columns = array('participant_id','ep_id');
		$records = array($participant_id,$ep_id);
		return $this->participant_enrolled_programs_map->insert_prepared_records($participant_id,$ep_id,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_participant_enrolled_programs_map = $this->participant_enrolled_programs_map->fetch_assoc_in_participant_enrolled_programs_map ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_participant_enrolled_programs_map);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_participant_enrolled_programs_map);
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
        return $this->participant_enrolled_programs_map->insert_raw($records, $printSQL);
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
        public function insert_records_to_participant_enrolled_programs_map(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->participant_enrolled_programs_map->insert_records_to_participant_enrolled_programs_map($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_participant_enrolled_programs_map = $this->participant_enrolled_programs_map->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_participant_enrolled_programs_map);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_participant_enrolled_programs_map);
		}
	}

	public function query_eng_build($queried_participant_enrolled_programs_map){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_participant_enrolled_programs_map);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_participant_enrolled_programs_map);
		}
	}
	public function query_user_build($queried_participant_enrolled_programs_map){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_participant_enrolled_programs_map);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_participant_enrolled_programs_map);
		}
	}
	public function export_query_json($queried_participant_enrolled_programs_map){
		$query_json = json_encode($queried_participant_enrolled_programs_map);
		return $query_json;
	}
	public function export_query_html($queried_participant_enrolled_programs_map){
		$query_html = "";
		foreach ( $queried_participant_enrolled_programs_map as $participant_enrolled_programs_map_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $participant_enrolled_programs_map_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $participant_enrolled_programs_map_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$participant_id = $participant_enrolled_programs_map_row_items ['participant_id'];
	if ($participant_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'participant_id', $participant_id  );
}
$ep_id = $participant_enrolled_programs_map_row_items ['ep_id'];
	if ($ep_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'ep_id', $ep_id  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
