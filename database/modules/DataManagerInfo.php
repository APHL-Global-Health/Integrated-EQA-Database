<?php 

	namespace database\modules;

	use database\crud\DataManager;

	/**
	*  
	*	DataManagerInfo
	*  
	* Provides High level features for interacting with the DataManager;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class DataManagerInfo{

	private $build;
	private $client;
	private $action;
	private $data_manager;
	private $table = 'data_manager';
	/**
	 * DataManagerInfo
	 * 
	 * Class to get all the data_manager Information from the data_manager table 
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
		
		$this->data_manager = new DataManager( $action, $client );

	}

	

		/**
	* Inserts data into the table[data_manager] in the order below
	* array ('dm_id','primary_email','password','institute','first_name','last_name','phone','secondary_email','UserFld1','UserFld2','UserFld3','mobile','force_password_reset','qc_access','enable_adding_test_response_date','status','created_on','created_by','updated_on','updated_by')
	* is mappped into 
	* array ($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check= false, $printSQL = false) {
		$columns = array('dm_id','primary_email','password','institute','first_name','last_name','phone','secondary_email','UserFld1','UserFld2','UserFld3','mobile','force_password_reset','qc_access','enable_adding_test_response_date','status','created_on','created_by','updated_on','updated_by');
		$records = array($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by);
		return $this->data_manager->insert_prepared_records($dm_id,$primary_email,$password,$institute,$first_name,$last_name,$phone,$secondary_email,$UserFld1,$UserFld2,$UserFld3,$mobile,$force_password_reset,$qc_access,$enable_adding_test_response_date,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_data_manager = $this->data_manager->fetch_assoc_in_data_manager ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_data_manager);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_data_manager);
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
        return $this->data_manager->insert_raw($records, $printSQL);
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
        public function insert_records_to_data_manager(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->data_manager->insert_records_to_data_manager($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_data_manager = $this->data_manager->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_data_manager);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_data_manager);
		}
	}

	public function query_eng_build($queried_data_manager){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_data_manager);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_data_manager);
		}
	}
	public function query_user_build($queried_data_manager){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_data_manager);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_data_manager);
		}
	}
	public function export_query_json($queried_data_manager){
		$query_json = json_encode($queried_data_manager);
		return $query_json;
	}
	public function export_query_html($queried_data_manager){
		$query_html = "";
		foreach ( $queried_data_manager as $data_manager_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $data_manager_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $data_manager_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$dm_id = $data_manager_row_items ['dm_id'];
	if ($dm_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'dm_id', $dm_id  );
}
$primary_email = $data_manager_row_items ['primary_email'];
	if ($primary_email  != null) {
	$html_export .= $this->parseHtmlExport ( 'primary_email', $primary_email  );
}
$password = $data_manager_row_items ['password'];
	if ($password  != null) {
	$html_export .= $this->parseHtmlExport ( 'password', $password  );
}
$institute = $data_manager_row_items ['institute'];
	if ($institute  != null) {
	$html_export .= $this->parseHtmlExport ( 'institute', $institute  );
}
$first_name = $data_manager_row_items ['first_name'];
	if ($first_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'first_name', $first_name  );
}
$last_name = $data_manager_row_items ['last_name'];
	if ($last_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'last_name', $last_name  );
}
$phone = $data_manager_row_items ['phone'];
	if ($phone  != null) {
	$html_export .= $this->parseHtmlExport ( 'phone', $phone  );
}
$secondary_email = $data_manager_row_items ['secondary_email'];
	if ($secondary_email  != null) {
	$html_export .= $this->parseHtmlExport ( 'secondary_email', $secondary_email  );
}
$UserFld1 = $data_manager_row_items ['UserFld1'];
	if ($UserFld1  != null) {
	$html_export .= $this->parseHtmlExport ( 'UserFld1', $UserFld1  );
}
$UserFld2 = $data_manager_row_items ['UserFld2'];
	if ($UserFld2  != null) {
	$html_export .= $this->parseHtmlExport ( 'UserFld2', $UserFld2  );
}
$UserFld3 = $data_manager_row_items ['UserFld3'];
	if ($UserFld3  != null) {
	$html_export .= $this->parseHtmlExport ( 'UserFld3', $UserFld3  );
}
$mobile = $data_manager_row_items ['mobile'];
	if ($mobile  != null) {
	$html_export .= $this->parseHtmlExport ( 'mobile', $mobile  );
}
$force_password_reset = $data_manager_row_items ['force_password_reset'];
	if ($force_password_reset  != null) {
	$html_export .= $this->parseHtmlExport ( 'force_password_reset', $force_password_reset  );
}
$qc_access = $data_manager_row_items ['qc_access'];
	if ($qc_access  != null) {
	$html_export .= $this->parseHtmlExport ( 'qc_access', $qc_access  );
}
$enable_adding_test_response_date = $data_manager_row_items ['enable_adding_test_response_date'];
	if ($enable_adding_test_response_date  != null) {
	$html_export .= $this->parseHtmlExport ( 'enable_adding_test_response_date', $enable_adding_test_response_date  );
}
$status = $data_manager_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}
$created_on = $data_manager_row_items ['created_on'];
	if ($created_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_on', $created_on  );
}
$created_by = $data_manager_row_items ['created_by'];
	if ($created_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_by', $created_by  );
}
$updated_on = $data_manager_row_items ['updated_on'];
	if ($updated_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on', $updated_on  );
}
$updated_by = $data_manager_row_items ['updated_by'];
	if ($updated_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by', $updated_by  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
