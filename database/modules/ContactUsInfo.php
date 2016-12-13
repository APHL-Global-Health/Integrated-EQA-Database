<?php 

	namespace database\modules;

	use database\crud\ContactUs;

	/**
	*  
	*	ContactUsInfo
	*  
	* Provides High level features for interacting with the ContactUs;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ContactUsInfo{

	private $build;
	private $client;
	private $action;
	private $contact_us;
	private $table = 'contact_us';
	/**
	 * ContactUsInfo
	 * 
	 * Class to get all the contact_us Information from the contact_us table 
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
		
		$this->contact_us = new ContactUs( $action, $client );

	}

	

		/**
	* Inserts data into the table[contact_us] in the order below
	* array ('contact_id','first_name','last_name','email','phone','reason','lab','additional_info','contacted_on','ip_address')
	* is mappped into 
	* array ($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address,$redundancy_check= false, $printSQL = false) {
		$columns = array('contact_id','first_name','last_name','email','phone','reason','lab','additional_info','contacted_on','ip_address');
		$records = array($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address);
		return $this->contact_us->insert_prepared_records($contact_id,$first_name,$last_name,$email,$phone,$reason,$lab,$additional_info,$contacted_on,$ip_address,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_contact_us = $this->contact_us->fetch_assoc_in_contact_us ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_contact_us);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_contact_us);
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
        return $this->contact_us->insert_raw($records, $printSQL);
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
        public function insert_records_to_contact_us(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->contact_us->insert_records_to_contact_us($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_contact_us = $this->contact_us->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_contact_us);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_contact_us);
		}
	}

	public function query_eng_build($queried_contact_us){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_contact_us);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_contact_us);
		}
	}
	public function query_user_build($queried_contact_us){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_contact_us);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_contact_us);
		}
	}
	public function export_query_json($queried_contact_us){
		$query_json = json_encode($queried_contact_us);
		return $query_json;
	}
	public function export_query_html($queried_contact_us){
		$query_html = "";
		foreach ( $queried_contact_us as $contact_us_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $contact_us_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $contact_us_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$contact_id = $contact_us_row_items ['contact_id'];
	if ($contact_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'contact_id', $contact_id  );
}
$first_name = $contact_us_row_items ['first_name'];
	if ($first_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'first_name', $first_name  );
}
$last_name = $contact_us_row_items ['last_name'];
	if ($last_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'last_name', $last_name  );
}
$email = $contact_us_row_items ['email'];
	if ($email  != null) {
	$html_export .= $this->parseHtmlExport ( 'email', $email  );
}
$phone = $contact_us_row_items ['phone'];
	if ($phone  != null) {
	$html_export .= $this->parseHtmlExport ( 'phone', $phone  );
}
$reason = $contact_us_row_items ['reason'];
	if ($reason  != null) {
	$html_export .= $this->parseHtmlExport ( 'reason', $reason  );
}
$lab = $contact_us_row_items ['lab'];
	if ($lab  != null) {
	$html_export .= $this->parseHtmlExport ( 'lab', $lab  );
}
$additional_info = $contact_us_row_items ['additional_info'];
	if ($additional_info  != null) {
	$html_export .= $this->parseHtmlExport ( 'additional_info', $additional_info  );
}
$contacted_on = $contact_us_row_items ['contacted_on'];
	if ($contacted_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'contacted_on', $contacted_on  );
}
$ip_address = $contact_us_row_items ['ip_address'];
	if ($ip_address  != null) {
	$html_export .= $this->parseHtmlExport ( 'ip_address', $ip_address  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
