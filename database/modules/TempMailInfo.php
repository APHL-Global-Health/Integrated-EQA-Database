<?php 

	namespace database\modules;

	use database\crud\TempMail;

	/**
	*  
	*	TempMailInfo
	*  
	* Provides High level features for interacting with the TempMail;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class TempMailInfo{

	private $build;
	private $client;
	private $action;
	private $temp_mail;
	private $table = 'temp_mail';
	/**
	 * TempMailInfo
	 * 
	 * Class to get all the temp_mail Information from the temp_mail table 
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
		
		$this->temp_mail = new TempMail( $action, $client );

	}

	

		/**
	* Inserts data into the table[temp_mail] in the order below
	* array ('temp_id','message','from_mail','to_email','bcc','cc','subject','from_full_name','status')
	* is mappped into 
	* array ($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status,$redundancy_check= false, $printSQL = false) {
		$columns = array('temp_id','message','from_mail','to_email','bcc','cc','subject','from_full_name','status');
		$records = array($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status);
		return $this->temp_mail->insert_prepared_records($temp_id,$message,$from_mail,$to_email,$bcc,$cc,$subject,$from_full_name,$status,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_temp_mail = $this->temp_mail->fetch_assoc_in_temp_mail ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_temp_mail);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_temp_mail);
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
        return $this->temp_mail->insert_raw($records, $printSQL);
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
        public function insert_records_to_temp_mail(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->temp_mail->insert_records_to_temp_mail($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_temp_mail = $this->temp_mail->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_temp_mail);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_temp_mail);
		}
	}

	public function query_eng_build($queried_temp_mail){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_temp_mail);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_temp_mail);
		}
	}
	public function query_user_build($queried_temp_mail){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_temp_mail);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_temp_mail);
		}
	}
	public function export_query_json($queried_temp_mail){
		$query_json = json_encode($queried_temp_mail);
		return $query_json;
	}
	public function export_query_html($queried_temp_mail){
		$query_html = "";
		foreach ( $queried_temp_mail as $temp_mail_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $temp_mail_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $temp_mail_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$temp_id = $temp_mail_row_items ['temp_id'];
	if ($temp_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'temp_id', $temp_id  );
}
$message = $temp_mail_row_items ['message'];
	if ($message  != null) {
	$html_export .= $this->parseHtmlExport ( 'message', $message  );
}
$from_mail = $temp_mail_row_items ['from_mail'];
	if ($from_mail  != null) {
	$html_export .= $this->parseHtmlExport ( 'from_mail', $from_mail  );
}
$to_email = $temp_mail_row_items ['to_email'];
	if ($to_email  != null) {
	$html_export .= $this->parseHtmlExport ( 'to_email', $to_email  );
}
$bcc = $temp_mail_row_items ['bcc'];
	if ($bcc  != null) {
	$html_export .= $this->parseHtmlExport ( 'bcc', $bcc  );
}
$cc = $temp_mail_row_items ['cc'];
	if ($cc  != null) {
	$html_export .= $this->parseHtmlExport ( 'cc', $cc  );
}
$subject = $temp_mail_row_items ['subject'];
	if ($subject  != null) {
	$html_export .= $this->parseHtmlExport ( 'subject', $subject  );
}
$from_full_name = $temp_mail_row_items ['from_full_name'];
	if ($from_full_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'from_full_name', $from_full_name  );
}
$status = $temp_mail_row_items ['status'];
	if ($status  != null) {
	$html_export .= $this->parseHtmlExport ( 'status', $status  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
