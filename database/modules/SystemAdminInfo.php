<?php 

	namespace database\modules;

	use database\crud\SystemAdmin;

	/**
	*  
	*	SystemAdminInfo
	*  
	* Provides High level features for interacting with the SystemAdmin;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class SystemAdminInfo{

	private $build;
	private $client;
	private $action;
	private $system_admin;
	private $table = 'system_admin';
	/**
	 * SystemAdminInfo
	 * 
	 * Class to get all the system_admin Information from the system_admin table 
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
		
		$this->system_admin = new SystemAdmin( $action, $client );

	}

	

		/**
	* Inserts data into the table[system_admin] in the order below
	* array ('admin_id','first_name','last_name','primary_email','password','secondary_email','phone','force_password_reset','status','created_on','created_by','updated_on','updated_by')
	* is mappped into 
	* array ($admin_id,$first_name,$last_name,$primary_email,$password,$secondary_email,$phone,$force_password_reset,$status,$created_on,$created_by,$updated_on,$updated_by)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($admin_id,$first_name,$last_name,$primary_email,$password,$secondary_email,$phone,$force_password_reset,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check= false, $printSQL = false) {
		$columns = array('admin_id','first_name','last_name','primary_email','password','secondary_email','phone','force_password_reset','status','created_on','created_by','updated_on','updated_by');
		$records = array($admin_id,$first_name,$last_name,$primary_email,$password,$secondary_email,$phone,$force_password_reset,$status,$created_on,$created_by,$updated_on,$updated_by);
		return $this->system_admin->insert_prepared_records($admin_id,$first_name,$last_name,$primary_email,$password,$secondary_email,$phone,$force_password_reset,$status,$created_on,$created_by,$updated_on,$updated_by,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_system_admin = $this->system_admin->fetch_assoc_in_system_admin ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_system_admin);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_system_admin);
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
        return $this->system_admin->insert_raw($records, $printSQL);
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
        public function insert_records_to_system_admin(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->system_admin->insert_records_to_system_admin($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_system_admin = $this->system_admin->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_system_admin);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_system_admin);
		}
	}

	public function query_eng_build($queried_system_admin){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_system_admin);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_system_admin);
		}
	}
	public function query_user_build($queried_system_admin){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_system_admin);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_system_admin);
		}
	}
	public function export_query_json($queried_system_admin){
		$query_json = json_encode($queried_system_admin);
		return $query_json;
	}
	public function export_query_html($queried_system_admin){
		$query_html = "";
		foreach ( $queried_system_admin as $system_admin_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $system_admin_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $system_admin_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$admin_id = $system_admin_row_items ['admin_id'];
	if ($admin_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'admin_id', $admin_id  );
}
$first_name = $system_admin_row_items ['first_name'];
	if ($first_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'first_name', $first_name  );
}
$last_name = $system_admin_row_items ['last_name'];
	if ($last_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'last_name', $last_name  );
}
$primary_email = $system_admin_row_items ['primary_email'];
	if ($primary_email  != null) {
	$html_export .= $this->parseHtmlExport ( 'primary_email', $primary_email  );
}
$password = $system_admin_row_items ['password'];
	if ($password  != null) {
	$html_export .= $this->parseHtmlExport ( 'password', $password  );
}
$secondary_email = $system_admin_row_items ['secondary_email'];
	if ($secondary_email  != null) {
	$html_export .= $this->parseHtmlExport ( 'secondary_email', $secondary_email  );
}
$phone = $system_admin_row_items ['phone'];
	if ($phone  != null) {
	$html_export .= $this->parseHtmlExport ( 'phone', $phone  );
}
$force_password_reset = $system_admin_row_items ['force_password_reset'];
	if ($force_password_reset  != null) {
	$html_export .= $this->parseHtmlExport ( 'force_password_reset', $force_password_reset  );
}
$status = $system_admin_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}
$created_on = $system_admin_row_items ['created_on'];
	if ($created_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_on', $created_on  );
}
$created_by = $system_admin_row_items ['created_by'];
	if ($created_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_by', $created_by  );
}
$updated_on = $system_admin_row_items ['updated_on'];
	if ($updated_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on', $updated_on  );
}
$updated_by = $system_admin_row_items ['updated_by'];
	if ($updated_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by', $updated_by  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
