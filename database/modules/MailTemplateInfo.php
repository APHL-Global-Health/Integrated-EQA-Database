<?php 

	namespace database\modules;

	use database\crud\MailTemplate;

	/**
	*  
	*	MailTemplateInfo
	*  
	* Provides High level features for interacting with the MailTemplate;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class MailTemplateInfo{

	private $build;
	private $client;
	private $action;
	private $mail_template;
	private $table = 'mail_template';
	/**
	 * MailTemplateInfo
	 * 
	 * Class to get all the mail_template Information from the mail_template table 
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
		
		$this->mail_template = new MailTemplate( $action, $client );

	}

	

		/**
	* Inserts data into the table[mail_template] in the order below
	* array ('mail_temp_id','mail_purpose','from_name','mail_from','mail_cc','mail_bcc','mail_subject','mail_content','mail_footer')
	* is mappped into 
	* array ($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer,$redundancy_check= false, $printSQL = false) {
		$columns = array('mail_temp_id','mail_purpose','from_name','mail_from','mail_cc','mail_bcc','mail_subject','mail_content','mail_footer');
		$records = array($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer);
		return $this->mail_template->insert_prepared_records($mail_temp_id,$mail_purpose,$from_name,$mail_from,$mail_cc,$mail_bcc,$mail_subject,$mail_content,$mail_footer,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_mail_template = $this->mail_template->fetch_assoc_in_mail_template ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_mail_template);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_mail_template);
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
        return $this->mail_template->insert_raw($records, $printSQL);
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
        public function insert_records_to_mail_template(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->mail_template->insert_records_to_mail_template($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_mail_template = $this->mail_template->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_mail_template);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_mail_template);
		}
	}

	public function query_eng_build($queried_mail_template){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_mail_template);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_mail_template);
		}
	}
	public function query_user_build($queried_mail_template){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_mail_template);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_mail_template);
		}
	}
	public function export_query_json($queried_mail_template){
		$query_json = json_encode($queried_mail_template);
		return $query_json;
	}
	public function export_query_html($queried_mail_template){
		$query_html = "";
		foreach ( $queried_mail_template as $mail_template_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $mail_template_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $mail_template_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$mail_temp_id = $mail_template_row_items ['mail_temp_id'];
	if ($mail_temp_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_temp_id', $mail_temp_id  );
}
$mail_purpose = $mail_template_row_items ['mail_purpose'];
	if ($mail_purpose  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_purpose', $mail_purpose  );
}
$from_name = $mail_template_row_items ['from_name'];
	if ($from_name  != null) {
	$html_export .= $this->parseHtmlExport ( 'from_name', $from_name  );
}
$mail_from = $mail_template_row_items ['mail_from'];
	if ($mail_from  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_from', $mail_from  );
}
$mail_cc = $mail_template_row_items ['mail_cc'];
	if ($mail_cc  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_cc', $mail_cc  );
}
$mail_bcc = $mail_template_row_items ['mail_bcc'];
	if ($mail_bcc  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_bcc', $mail_bcc  );
}
$mail_subject = $mail_template_row_items ['mail_subject'];
	if ($mail_subject  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_subject', $mail_subject  );
}
$mail_content = $mail_template_row_items ['mail_content'];
	if ($mail_content  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_content', $mail_content  );
}
$mail_footer = $mail_template_row_items ['mail_footer'];
	if ($mail_footer  != null) {
	$html_export .= $this->parseHtmlExport ( 'mail_footer', $mail_footer  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
