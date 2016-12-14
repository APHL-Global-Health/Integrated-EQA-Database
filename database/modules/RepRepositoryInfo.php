<?php 

	namespace database\modules;

	use database\crud\RepRepository;

	/**
	*  
	*	RepRepositoryInfo
	*  
	* Provides High level features for interacting with the RepRepository;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RepRepositoryInfo{

	private $build;
	private $client;
	private $action;
	private $rep_repository;
	private $table = 'rep_repository';
	/**
	 * RepRepositoryInfo
	 * 
	 * Class to get all the rep_repository Information from the rep_repository table 
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
		
		$this->rep_repository = new RepRepository( $action, $client );

	}

	

		/**
	* Inserts data into the table[rep_repository] in the order below
	* array ('ImpID','ProviderID','LabID','RoundID','ProgramID','ReleaseDate','SampleCode','AnalyteID','SampleCondition','DateSampleReceived','Result','ResultCode','Grade','TestKitID','DateSampleShipped','FailReasonCode','Frequency','StCount','TragetValue','UpperLimit','LowerLimit')
	* is mappped into 
	* array ($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit,$redundancy_check= false, $printSQL = false) {
		$columns = array('ImpID','ProviderID','LabID','RoundID','ProgramID','ReleaseDate','SampleCode','AnalyteID','SampleCondition','DateSampleReceived','Result','ResultCode','Grade','TestKitID','DateSampleShipped','FailReasonCode','Frequency','StCount','TragetValue','UpperLimit','LowerLimit');
		$records = array($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit);
		return $this->rep_repository->insert_prepared_records($ImpID,$ProviderID,$LabID,$RoundID,$ProgramID,$ReleaseDate,$SampleCode,$AnalyteID,$SampleCondition,$DateSampleReceived,$Result,$ResultCode,$Grade,$TestKitID,$DateSampleShipped,$FailReasonCode,$Frequency,$StCount,$TragetValue,$UpperLimit,$LowerLimit,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_rep_repository = $this->rep_repository->fetch_assoc_in_rep_repository ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_repository);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_repository);
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
        return $this->rep_repository->insert_raw($records, $printSQL);
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
        public function insert_records_to_rep_repository(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->rep_repository->insert_records_to_rep_repository($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_rep_repository = $this->rep_repository->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_rep_repository);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_rep_repository);
		}
	}

	public function query_eng_build($queried_rep_repository){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_repository);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_repository);
		}
	}
	public function query_user_build($queried_rep_repository){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_rep_repository);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_rep_repository);
		}
	}
	public function export_query_json($queried_rep_repository){
		$query_json = json_encode($queried_rep_repository);
		return $query_json;
	}
	public function export_query_html($queried_rep_repository){
		$query_html = "";
		foreach ( $queried_rep_repository as $rep_repository_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $rep_repository_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $rep_repository_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$ImpID = $rep_repository_row_items ['ImpID'];
	if ($ImpID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ImpID', $ImpID  );
}
$ProviderID = $rep_repository_row_items ['ProviderID'];
	if ($ProviderID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ProviderID', $ProviderID  );
}
$LabID = $rep_repository_row_items ['LabID'];
	if ($LabID  != null) {
	$html_export .= $this->parseHtmlExport ( 'LabID', $LabID  );
}
$RoundID = $rep_repository_row_items ['RoundID'];
	if ($RoundID  != null) {
	$html_export .= $this->parseHtmlExport ( 'RoundID', $RoundID  );
}
$ProgramID = $rep_repository_row_items ['ProgramID'];
	if ($ProgramID  != null) {
	$html_export .= $this->parseHtmlExport ( 'ProgramID', $ProgramID  );
}
$ReleaseDate = $rep_repository_row_items ['ReleaseDate'];
	if ($ReleaseDate  != null) {
	$html_export .= $this->parseHtmlExport ( 'ReleaseDate', $ReleaseDate  );
}
$SampleCode = $rep_repository_row_items ['SampleCode'];
	if ($SampleCode  != null) {
	$html_export .= $this->parseHtmlExport ( 'SampleCode', $SampleCode  );
}
$AnalyteID = $rep_repository_row_items ['AnalyteID'];
	if ($AnalyteID  != null) {
	$html_export .= $this->parseHtmlExport ( 'AnalyteID', $AnalyteID  );
}
$SampleCondition = $rep_repository_row_items ['SampleCondition'];
	if ($SampleCondition  != null) {
	$html_export .= $this->parseHtmlExport ( 'SampleCondition', $SampleCondition  );
}
$DateSampleReceived = $rep_repository_row_items ['DateSampleReceived'];
	if ($DateSampleReceived  != null) {
	$html_export .= $this->parseHtmlExport ( 'DateSampleReceived', $DateSampleReceived  );
}
$Result = $rep_repository_row_items ['Result'];
	if ($Result  != null) {
	$html_export .= $this->parseHtmlExport ( 'Result', $Result  );
}
$ResultCode = $rep_repository_row_items ['ResultCode'];
	if ($ResultCode  != null) {
	$html_export .= $this->parseHtmlExport ( 'ResultCode', $ResultCode  );
}
$Grade = $rep_repository_row_items ['Grade'];
	if ($Grade  != null) {
	$html_export .= $this->parseHtmlExport ( 'Grade', $Grade  );
}
$TestKitID = $rep_repository_row_items ['TestKitID'];
	if ($TestKitID  != null) {
	$html_export .= $this->parseHtmlExport ( 'TestKitID', $TestKitID  );
}
$DateSampleShipped = $rep_repository_row_items ['DateSampleShipped'];
	if ($DateSampleShipped  != null) {
	$html_export .= $this->parseHtmlExport ( 'DateSampleShipped', $DateSampleShipped  );
}
$FailReasonCode = $rep_repository_row_items ['FailReasonCode'];
	if ($FailReasonCode  != null) {
	$html_export .= $this->parseHtmlExport ( 'FailReasonCode', $FailReasonCode  );
}
$Frequency = $rep_repository_row_items ['Frequency'];
	if ($Frequency  != null) {
	$html_export .= $this->parseHtmlExport ( 'Frequency', $Frequency  );
}
$StCount = $rep_repository_row_items ['StCount'];
	if ($StCount  != null) {
	$html_export .= $this->parseHtmlExport ( 'StCount', $StCount  );
}
$TragetValue = $rep_repository_row_items ['TragetValue'];
	if ($TragetValue  != null) {
	$html_export .= $this->parseHtmlExport ( 'TragetValue', $TragetValue  );
}
$UpperLimit = $rep_repository_row_items ['UpperLimit'];
	if ($UpperLimit  != null) {
	$html_export .= $this->parseHtmlExport ( 'UpperLimit', $UpperLimit  );
}
$LowerLimit = $rep_repository_row_items ['LowerLimit'];
	if ($LowerLimit  != null) {
	$html_export .= $this->parseHtmlExport ( 'LowerLimit', $LowerLimit  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
