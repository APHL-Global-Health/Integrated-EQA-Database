<?php 

	namespace database\modules;

	use database\crud\Participant;

	/**
	*  
	*	ParticipantInfo
	*  
	* Provides High level features for interacting with the Participant;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class ParticipantInfo{

	private $build;
	private $client;
	private $action;
	private $participant;
	private $table = 'participant';
	/**
	 * ParticipantInfo
	 * 
	 * Class to get all the participant Information from the participant table 
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
		
		$this->participant = new Participant( $action, $client );

	}

	

		/**
	* Inserts data into the table[participant] in the order below
	* array ('participant_id','unique_identifier','individual','lab_name','institute_name','department_name','address','city','state','country','zip','long','lat','shipping_address','funding_source','testing_volume','enrolled_programs','site_type','region','first_name','last_name','mobile','phone','contact_name','email','affiliation','network_tier','created_on','created_by','updated_on','updated_by','status')
	* is mappped into 
	* array ($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('participant_id','unique_identifier','individual','lab_name','institute_name','department_name','address','city','state','country','zip','long','lat','shipping_address','funding_source','testing_volume','enrolled_programs','site_type','region','first_name','last_name','mobile','phone','contact_name','email','affiliation','network_tier','created_on','created_by','updated_on','updated_by','status');
		$records = array($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status);
		return $this->participant->insert_prepared_records($participant_id,$unique_identifier,$individual,$lab_name,$institute_name,$department_name,$address,$city,$state,$country,$zip,$long,$lat,$shipping_address,$funding_source,$testing_volume,$enrolled_programs,$site_type,$region,$first_name,$last_name,$mobile,$phone,$contact_name,$email,$affiliation,$network_tier,$created_on,$created_by,$updated_on,$updated_by,$status,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_participant = $this->participant->fetch_assoc_in_participant ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_participant);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_participant);
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
        return $this->participant->insert_raw($records, $printSQL);
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
        public function insert_records_to_participant(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->participant->insert_records_to_participant($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_participant = $this->participant->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_participant);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_participant);
		}
	}

	public function query_eng_build($queried_participant){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_participant);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_participant);
		}
	}
	public function query_user_build($queried_participant){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_participant);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_participant);
		}
	}
	public function export_query_json($queried_participant){
		$query_json = json_encode($queried_participant);
		return $query_json;
	}
	public function export_query_html($queried_participant){
		$query_html = "";
		foreach ( $queried_participant as $participant_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $participant_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $participant_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$participant_id = $participant_row_items ['participant_id'];
	if ($participant_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'participant_id', $participant_id  );
}
$unique_identifier = $participant_row_items ['unique_identifier'];
	if ($unique_identifier  != null) {
	$html_export .= $this->parseHtmlExport ( 'unique_identifier', $unique_identifier  );
}
$individual = $participant_row_items ['individual'];
	if ($individual  != null) {
	$html_export .= $this->parseHtmlExport ( 'individual', $individual  );
}
$lab_name = $participant_row_items ['lab_name'];
	if ($lab_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'lab_name', $lab_name  );
}
$institute_name = $participant_row_items ['institute_name'];
	if ($institute_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'institute_name', $institute_name  );
}
$department_name = $participant_row_items ['department_name'];
	if ($department_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'department_name', $department_name  );
}
$address = $participant_row_items ['address'];
	if ($address  != null) {
	$html_export .= $this->parseHtmlExport ( 'address', $address  );
}
$city = $participant_row_items ['city'];
	if ($city  != null) {
	$html_export .= $this->parseHtmlExport ( 'city', $city  );
}
$state = $participant_row_items ['state'];
	if ($state  != null) {
	$html_export .= $this->parseHtmlExport ( 'state', $state  );
}
$country = $participant_row_items ['country'];
	if ($country  != null) {
	$html_export .= $this->parseHtmlExport ( 'country', $country  );
}
$zip = $participant_row_items ['zip'];
	if ($zip  != null) {
	$html_export .= $this->parseHtmlExport ( 'zip', $zip  );
}
$long = $participant_row_items ['long'];
	if ($long  != null) {
	$html_export .= $this->parseHtmlExport ( 'long', $long  );
}
$lat = $participant_row_items ['lat'];
	if ($lat  != null) {
	$html_export .= $this->parseHtmlExport ( 'lat', $lat  );
}
$shipping_address = $participant_row_items ['shipping_address'];
	if ($shipping_address  != null) {
	$html_export .= $this->parseHtmlExport ( 'shipping_address', $shipping_address  );
}
$funding_source = $participant_row_items ['funding_source'];
	if ($funding_source  != null) {
	$html_export .= $this->parseHtmlExport ( 'funding_source', $funding_source  );
}
$testing_volume = $participant_row_items ['testing_volume'];
	if ($testing_volume  != null) {
	$html_export .= $this->parseHtmlExport ( 'testing_volume', $testing_volume  );
}
$enrolled_programs = $participant_row_items ['enrolled_programs'];
	if ($enrolled_programs  != null) {
	$html_export .= $this->parseHtmlExport ( 'enrolled_programs', $enrolled_programs  );
}
$site_type = $participant_row_items ['site_type'];
	if ($site_type  != null) {
	$html_export .= $this->parseHtmlExport ( 'site_type', $site_type  );
}
$region = $participant_row_items ['region'];
	if ($region  != null) {
	$html_export .= $this->parseHtmlExport ( 'region', $region  );
}
$first_name = $participant_row_items ['first_name'];
	if ($first_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'first_name', $first_name  );
}
$last_name = $participant_row_items ['last_name'];
	if ($last_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'last_name', $last_name  );
}
$mobile = $participant_row_items ['mobile'];
	if ($mobile  != null) {
	$html_export .= $this->parseHtmlExport ( 'mobile', $mobile  );
}
$phone = $participant_row_items ['phone'];
	if ($phone  != null) {
	$html_export .= $this->parseHtmlExport ( 'phone', $phone  );
}
$contact_name = $participant_row_items ['contact_name'];
	if ($contact_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'contact_name', $contact_name  );
}
$email = $participant_row_items ['email'];
	if ($email  != null) {
	$html_export .= $this->parseHtmlExport ( 'email', $email  );
}
$affiliation = $participant_row_items ['affiliation'];
	if ($affiliation  != null) {
	$html_export .= $this->parseHtmlExport ( 'affiliation', $affiliation  );
}
$network_tier = $participant_row_items ['network_tier'];
	if ($network_tier  != null) {
	$html_export .= $this->parseHtmlExport ( 'network_tier', $network_tier  );
}
$created_on = $participant_row_items ['created_on'];
	if ($created_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_on', $created_on  );
}
$created_by = $participant_row_items ['created_by'];
	if ($created_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'created_by', $created_by  );
}
$updated_on = $participant_row_items ['updated_on'];
	if ($updated_on  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_on', $updated_on  );
}
$updated_by = $participant_row_items ['updated_by'];
	if ($updated_by  != null) {
	$html_export .= $this->parseHtmlExport ( 'updated_by', $updated_by  );
}
$status = $participant_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
