<?php 

	namespace database\modules;

	use database\crud\RTestkitnameDts;

	/**
	*  
	*	RTestkitnameDtsInfo
	*  
	* Provides High level features for interacting with the RTestkitnameDts;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class RTestkitnameDtsInfo{

	private $build;
	private $client;
	private $action;
	private $r_testkitname_dts;
	private $table = 'r_testkitname_dts';
	/**
	 * RTestkitnameDtsInfo
	 * 
	 * Class to get all the r_testkitname_dts Information from the r_testkitname_dts table 
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
		
		$this->r_testkitname_dts = new RTestkitnameDts( $action, $client );

	}

	

		/**
	* Inserts data into the table[r_testkitname_dts] in the order below
	* array ('TestKitName_ID','scheme_type','TestKit_Name','TestKit_Name_Short','TestKit_Comments','Updated_On','Updated_By','Installation_id','TestKit_Manufacturer','Created_On','Created_By','Approval','TestKit_ApprovalAgency','source_reference','CountryAdapted','testkit_1','testkit_2','testkit_3')
	* is mappped into 
	* array ($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3,$redundancy_check= false, $printSQL = false) {
		$columns = array('TestKitName_ID','scheme_type','TestKit_Name','TestKit_Name_Short','TestKit_Comments','Updated_On','Updated_By','Installation_id','TestKit_Manufacturer','Created_On','Created_By','Approval','TestKit_ApprovalAgency','source_reference','CountryAdapted','testkit_1','testkit_2','testkit_3');
		$records = array($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3);
		return $this->r_testkitname_dts->insert_prepared_records($TestKitName_ID,$scheme_type,$TestKit_Name,$TestKit_Name_Short,$TestKit_Comments,$Updated_On,$Updated_By,$Installation_id,$TestKit_Manufacturer,$Created_On,$Created_By,$Approval,$TestKit_ApprovalAgency,$source_reference,$CountryAdapted,$testkit_1,$testkit_2,$testkit_3,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_r_testkitname_dts = $this->r_testkitname_dts->fetch_assoc_in_r_testkitname_dts ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_testkitname_dts);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_testkitname_dts);
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
        return $this->r_testkitname_dts->insert_raw($records, $printSQL);
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
        public function insert_records_to_r_testkitname_dts(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->r_testkitname_dts->insert_records_to_r_testkitname_dts($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_r_testkitname_dts = $this->r_testkitname_dts->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_testkitname_dts);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_testkitname_dts);
		}
	}

	public function query_eng_build($queried_r_testkitname_dts){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_testkitname_dts);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_testkitname_dts);
		}
	}
	public function query_user_build($queried_r_testkitname_dts){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_testkitname_dts);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_testkitname_dts);
		}
	}
	public function export_query_json($queried_r_testkitname_dts){
		$query_json = json_encode($queried_r_testkitname_dts);
		return $query_json;
	}
	public function export_query_html($queried_r_testkitname_dts){
		$query_html = "";
		foreach ( $queried_r_testkitname_dts as $r_testkitname_dts_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $r_testkitname_dts_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $r_testkitname_dts_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$TestKitName_ID = $r_testkitname_dts_row_items ['TestKitName_ID'];
	if ($TestKitName_ID  != null) {
	$html_export .= $this->parseHtmlExport ( 'TestKitName_ID', $TestKitName_ID  );
}
$scheme_type = $r_testkitname_dts_row_items ['scheme_type'];
	if ($scheme_type  != null) {
	$html_export .= $this->parseHtmlExport ( 'scheme_type', $scheme_type  );
}
$TestKit_Name = $r_testkitname_dts_row_items ['TestKit_Name'];
	if ($TestKit_Name  != null) {
	$html_export .= $this->parseHtmlExport ( 'TestKit_Name', $TestKit_Name  );
}
$TestKit_Name_Short = $r_testkitname_dts_row_items ['TestKit_Name_Short'];
	if ($TestKit_Name_Short  != null) {
	$html_export .= $this->parseHtmlExport ( 'TestKit_Name_Short', $TestKit_Name_Short  );
}
$TestKit_Comments = $r_testkitname_dts_row_items ['TestKit_Comments'];
	if ($TestKit_Comments  != null) {
	$html_export .= $this->parseHtmlExport ( 'TestKit_Comments', $TestKit_Comments  );
}
$Updated_On = $r_testkitname_dts_row_items ['Updated_On'];
	if ($Updated_On  != null) {
	$html_export .= $this->parseHtmlExport ( 'Updated_On', $Updated_On  );
}
$Updated_By = $r_testkitname_dts_row_items ['Updated_By'];
	if ($Updated_By  != null) {
	$html_export .= $this->parseHtmlExport ( 'Updated_By', $Updated_By  );
}
$Installation_id = $r_testkitname_dts_row_items ['Installation_id'];
	if ($Installation_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'Installation_id', $Installation_id  );
}
$TestKit_Manufacturer = $r_testkitname_dts_row_items ['TestKit_Manufacturer'];
	if ($TestKit_Manufacturer  != null) {
	$html_export .= $this->parseHtmlExport ( 'TestKit_Manufacturer', $TestKit_Manufacturer  );
}
$Created_On = $r_testkitname_dts_row_items ['Created_On'];
	if ($Created_On  != null) {
	$html_export .= $this->parseHtmlExport ( 'Created_On', $Created_On  );
}
$Created_By = $r_testkitname_dts_row_items ['Created_By'];
	if ($Created_By  != null) {
	$html_export .= $this->parseHtmlExport ( 'Created_By', $Created_By  );
}
$Approval = $r_testkitname_dts_row_items ['Approval'];
	if ($Approval  != null) {
	$html_export .= $this->parseHtmlExport ( 'Approval', $Approval  );
}
$TestKit_ApprovalAgency = $r_testkitname_dts_row_items ['TestKit_ApprovalAgency'];
	if ($TestKit_ApprovalAgency  != null) {
	$html_export .= $this->parseHtmlExport ( 'TestKit_ApprovalAgency', $TestKit_ApprovalAgency  );
}
$source_reference = $r_testkitname_dts_row_items ['source_reference'];
	if ($source_reference  != null) {
	$html_export .= $this->parseHtmlExport ( 'source_reference', $source_reference  );
}
$CountryAdapted = $r_testkitname_dts_row_items ['CountryAdapted'];
	if ($CountryAdapted  != null) {
	$html_export .= $this->parseHtmlExport ( 'CountryAdapted', $CountryAdapted  );
}
$testkit_1 = $r_testkitname_dts_row_items ['testkit_1'];
	if ($testkit_1  != null) {
	$html_export .= $this->parseHtmlExport ( 'testkit_1', $testkit_1  );
}
$testkit_2 = $r_testkitname_dts_row_items ['testkit_2'];
	if ($testkit_2  != null) {
	$html_export .= $this->parseHtmlExport ( 'testkit_2', $testkit_2  );
}
$testkit_3 = $r_testkitname_dts_row_items ['testkit_3'];
	if ($testkit_3  != null) {
	$html_export .= $this->parseHtmlExport ( 'testkit_3', $testkit_3  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
