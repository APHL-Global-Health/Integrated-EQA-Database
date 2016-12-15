<?php 

	namespace database\modules;

	use database\crud\RDtsCorrectiveActions;

	/**
	*  
	*	RDtsCorrectiveActionsInfo
	*  
	* Provides High level features for interacting with the RDtsCorrectiveActions;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RDtsCorrectiveActionsInfo{

	private $build;
	private $client;
	private $action;
	private $r_dts_corrective_actions;
	private $table = 'r_dts_corrective_actions';
	/**
	 * RDtsCorrectiveActionsInfo
	 * 
	 * Class to get all the r_dts_corrective_actions Information from the r_dts_corrective_actions table 
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
		
		$this->r_dts_corrective_actions = new RDtsCorrectiveActions( $action, $client );

	}

	

		/**
	* Inserts data into the table[r_dts_corrective_actions] in the order below
	* array ('action_id','corrective_action','description')
	* is mappped into 
	* array ($action_id,$corrective_action,$description)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($action_id,$corrective_action,$description,$redundancy_check= false, $printSQL = false) {
		$columns = array('action_id','corrective_action','description');
		$records = array($action_id,$corrective_action,$description);
		return $this->r_dts_corrective_actions->insert_prepared_records($action_id,$corrective_action,$description,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_r_dts_corrective_actions = $this->r_dts_corrective_actions->fetch_assoc_in_r_dts_corrective_actions ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_dts_corrective_actions);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_dts_corrective_actions);
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
        return $this->r_dts_corrective_actions->insert_raw($records, $printSQL);
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
        public function insert_records_to_r_dts_corrective_actions(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->r_dts_corrective_actions->insert_records_to_r_dts_corrective_actions($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_r_dts_corrective_actions = $this->r_dts_corrective_actions->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_dts_corrective_actions);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_dts_corrective_actions);
		}
	}

	public function query_eng_build($queried_r_dts_corrective_actions){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_dts_corrective_actions);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_dts_corrective_actions);
		}
	}
	public function query_user_build($queried_r_dts_corrective_actions){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_dts_corrective_actions);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_dts_corrective_actions);
		}
	}
	public function export_query_json($queried_r_dts_corrective_actions){
		$query_json = json_encode($queried_r_dts_corrective_actions);
		return $query_json;
	}
	public function export_query_html($queried_r_dts_corrective_actions){
		$query_html = "";
		foreach ( $queried_r_dts_corrective_actions as $r_dts_corrective_actions_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $r_dts_corrective_actions_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $r_dts_corrective_actions_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$action_id = $r_dts_corrective_actions_row_items ['action_id'];
	if ($action_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'action_id', $action_id  );
}
$corrective_action = $r_dts_corrective_actions_row_items ['corrective_action'];
	if ($corrective_action  != null) {
	$html_export .= $this->parseHtmlExport ( 'corrective_action', $corrective_action  );
}
$description = $r_dts_corrective_actions_row_items ['description'];
	if ($description  != null) {
	$html_export .= $this->parseHtmlExport ( 'description', $description  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
