<?php 

	namespace database\modules;

	use database\crud\RNetworkTiers;

	/**
	*  
	*	RNetworkTiersInfo
	*  
	* Provides High level features for interacting with the RNetworkTiers;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RNetworkTiersInfo{

	private $build;
	private $client;
	private $action;
	private $r_network_tiers;
	private $table = 'r_network_tiers';
	/**
	 * RNetworkTiersInfo
	 * 
	 * Class to get all the r_network_tiers Information from the r_network_tiers table 
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
		
		$this->r_network_tiers = new RNetworkTiers( $action, $client );

	}

	

		/**
	* Inserts data into the table[r_network_tiers] in the order below
	* array ('network_id','network_name')
	* is mappped into 
	* array ($network_id,$network_name)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($network_id,$network_name,$redundancy_check= false, $printSQL = false) {
		$columns = array('network_id','network_name');
		$records = array($network_id,$network_name);
		return $this->r_network_tiers->insert_prepared_records($network_id,$network_name,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_r_network_tiers = $this->r_network_tiers->fetch_assoc_in_r_network_tiers ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_network_tiers);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_network_tiers);
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
        return $this->r_network_tiers->insert_raw($records, $printSQL);
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
        public function insert_records_to_r_network_tiers(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->r_network_tiers->insert_records_to_r_network_tiers($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_r_network_tiers = $this->r_network_tiers->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_network_tiers);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_network_tiers);
		}
	}

	public function query_eng_build($queried_r_network_tiers){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_network_tiers);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_network_tiers);
		}
	}
	public function query_user_build($queried_r_network_tiers){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_network_tiers);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_network_tiers);
		}
	}
	public function export_query_json($queried_r_network_tiers){
		$query_json = json_encode($queried_r_network_tiers);
		return $query_json;
	}
	public function export_query_html($queried_r_network_tiers){
		$query_html = "";
		foreach ( $queried_r_network_tiers as $r_network_tiers_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $r_network_tiers_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $r_network_tiers_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$network_id = $r_network_tiers_row_items ['network_id'];
	if ($network_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'network_id', $network_id  );
}
$network_name = $r_network_tiers_row_items ['network_name'];
	if ($network_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'network_name', $network_name  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
