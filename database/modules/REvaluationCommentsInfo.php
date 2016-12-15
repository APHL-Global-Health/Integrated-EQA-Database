<?php 

	namespace database\modules;

	use database\crud\REvaluationComments;

	/**
	*  
	*	REvaluationCommentsInfo
	*  
	* Provides High level features for interacting with the REvaluationComments;
	*
	* This source code is auto-generated
    *
    * @author Victor Mwenda
    * Email : vmwenda.vm@gmail.com
    * Phone : +254(0)718034449
	*/
	class REvaluationCommentsInfo{

	private $build;
	private $client;
	private $action;
	private $r_evaluation_comments;
	private $table = 'r_evaluation_comments';
	/**
	 * REvaluationCommentsInfo
	 * 
	 * Class to get all the r_evaluation_comments Information from the r_evaluation_comments table 
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
		
		$this->r_evaluation_comments = new REvaluationComments( $action, $client );

	}

	

		/**
	* Inserts data into the table[r_evaluation_comments] in the order below
	* array ('comment_id','scheme','comment')
	* is mappped into 
	* array ($comment_id,$scheme,$comment)
	* @return 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert($comment_id,$scheme,$comment,$redundancy_check= false, $printSQL = false) {
		$columns = array('comment_id','scheme','comment');
		$records = array($comment_id,$scheme,$comment);
		return $this->r_evaluation_comments->insert_prepared_records($comment_id,$scheme,$comment,$redundancy_check,$printSQL );
	}


 	/**
     * @param $distinct
     * @param string $extraSQL
     * @return string
     */
	public function query($distinct,$extraSQL=""){

		$columns = $records = array ();
		$queried_r_evaluation_comments = $this->r_evaluation_comments->fetch_assoc_in_r_evaluation_comments ($distinct, $columns, $records,$extraSQL );

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_evaluation_comments);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_evaluation_comments);
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
        return $this->r_evaluation_comments->insert_raw($records, $printSQL);
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
        public function insert_records_to_r_evaluation_comments(Array $columns, Array $records,$redundancy_check = false, $printSQL = false){
            return $this->r_evaluation_comments->insert_records_to_r_evaluation_comments($columns, $records,$redundancy_check,$printSQL);
        }

     /**
        * Performs a raw Query
        * @param $sql string sql to execute
        * @return string sql results
        * @throws \app\libs\marvik\libs\database\core\mysql\NullabilityException
        */
	public function rawQuery($sql){

		$queried_r_evaluation_comments = $this->r_evaluation_comments->get_database_utils()->rawQuery($sql);

		if($this->build == "eng-build"){
			return $this->query_eng_build($queried_r_evaluation_comments);
		}
		if($this->build == "user-build"){
			return $this->query_user_build($queried_r_evaluation_comments);
		}
	}

	public function query_eng_build($queried_r_evaluation_comments){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_evaluation_comments);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_evaluation_comments);
		}
	}
	public function query_user_build($queried_r_evaluation_comments){
		if($this->client == "web-desktop"){
			return $this->export_query_html($queried_r_evaluation_comments);
		}
		if($this->client == "mobile-android"){
			return $this->export_query_json($queried_r_evaluation_comments);
		}
	}
	public function export_query_json($queried_r_evaluation_comments){
		$query_json = json_encode($queried_r_evaluation_comments);
		return $query_json;
	}
	public function export_query_html($queried_r_evaluation_comments){
		$query_html = "";
		foreach ( $queried_r_evaluation_comments as $r_evaluation_comments_row_items ) {
			$query_html .= $this->process_query_for_html_export ( $r_evaluation_comments_row_items );
		}
		return $query_html;
	}

	private function process_query_for_html_export ( $r_evaluation_comments_row_items ){
		$html_export ='<div style="padding:10px;margin:10px;border:2px solid black;"><h3>'  .$this->table.  '</h3>';
		
		$comment_id = $r_evaluation_comments_row_items ['comment_id'];
	if ($comment_id  != null) {
	$html_export .= $this->parseHtmlExport ( 'comment_id', $comment_id  );
}
$scheme = $r_evaluation_comments_row_items ['scheme'];
	if ($scheme  != null) {
	$html_export .= $this->parseHtmlExport ( 'scheme', $scheme  );
}
$comment = $r_evaluation_comments_row_items ['comment'];
	if ($comment  != null) {
	$html_export .= $this->parseHtmlExport ( 'comment', $comment  );
}

		
		return $html_export .='</div>';
	}

	private function parseHtmlExport($title,$message){
		return '<div style="width:400px;"><h4>' . $title . '</h4><hr /><p>' . $message . '</p></div>';
	}
} ?>
