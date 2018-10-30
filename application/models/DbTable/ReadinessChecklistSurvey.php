<?php

class Application_Model_DbTable_ReadinessChecklistSurvey extends Zend_Db_Table_Abstract {

    protected $_name = 'readiness_checklist_surveys';
    protected $_primary = 'id';

    protected $_dependentTables = array('Application_Model_DbTable_ReadinessChecklistResponse', 'Application_Model_DbTable_ReadinessChecklistParticipant', 'Application_Model_DbTable_Distribution');

    protected $_referenceMap    = array(
        'ReadinessChecklist' => array(
            'columns'           => array('readiness_checklist_id'),
            'refTableClass'     => 'Application_Model_DbTable_ReadinessChecklist',
            'refColumns'        => array('id')
        )
    );

    public function getAllReadinessChecklistSurveys($parameters) {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        error_log(implode("--", $parameters));

        $aColumns = array('readiness_checklist_id', 'start_date', 'end_date', 'created_at', 'created_by');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = $this->_primary;


        /*
         * Paging
         */
        $sLimit = "";
        if (isset($parameters['iDisplayStart']) && $parameters['iDisplayLength'] != '-1') {
            $sOffset = $parameters['iDisplayStart'];
            $sLimit = $parameters['iDisplayLength'];
        }

        /*
         * Ordering
         */
        $sOrder = "";
        if (isset($parameters['iSortCol_0'])) {
            $sOrder = "";
            for ($i = 0; $i < intval($parameters['iSortingCols']); $i++) {
                if ($parameters['bSortable_' . intval($parameters['iSortCol_' . $i])] == "true") {
                    $sOrder .= $aColumns[intval($parameters['iSortCol_' . $i])] . "
				 	" . ($parameters['sSortDir_' . $i]) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = "";
        if (isset($parameters['sSearch']) && $parameters['sSearch'] != "") {
            $searchArray = explode(" ", $parameters['sSearch']);
            $sWhereSub = "";
            foreach ($searchArray as $search) {
                if ($sWhereSub == "") {
                    $sWhereSub .= "(";
                } else {
                    $sWhereSub .= " AND (";
                }
                $colSize = count($aColumns);

                for ($i = 0; $i < $colSize; $i++) {
                    if ($i < $colSize - 1) {
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search) . "%' OR ";
                    } else {
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search) . "%' ";
                    }
                }
                $sWhereSub .= ")";
            }
            $sWhere .= $sWhereSub;
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($parameters['bSearchable_' . $i]) && $parameters['bSearchable_' . $i] == "true" && $parameters['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere .= $aColumns[$i] . " LIKE '%" . ($parameters['sSearch_' . $i]) . "%' ";
                } else {
                    $sWhere .= " AND " . $aColumns[$i] . " LIKE '%" . ($parameters['sSearch_' . $i]) . "%' ";
                }
            }
        }


        /*
         * SQL queries
         * Get data to display
         */

        $sQuery = $this->getAdapter()->select()->from(array('a' => $this->_name));

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

        //error_log($sQuery);

        $rResult = $this->getAdapter()->fetchAll($sQuery);


        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $this->getAdapter()->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */
        $sQuery = $this->getAdapter()->select()->from($this->_name, new Zend_Db_Expr("COUNT('" . $sIndexColumn . "')"));
        $aResultTotal = $this->getAdapter()->fetchCol($sQuery);
        $iTotal = $aResultTotal[0];

        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($parameters['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );


        foreach ($rResult as $aRow) {
            $row = array();
            $row[] = $aRow['readiness_checklist_id'];
            $row[] = $aRow['start_date'];
            $row[] = $aRow['end_date'];
            $row[] = $aRow['created_at'];
            $creator = new Application_Service_SystemAdmin();
            $creatorDetails = $creator->getSystemAdminDetails($aRow['created_by']);
            $row[] = $creatorDetails['first_name'] . " " . $creatorDetails['last_name'];
            $row[] = '<a href="/admin/readiness-checklist/viewresponse/id/' . $aRow['id'] 
                    . '" class="btn btn-warning btn-xs" style="margin-right: 2px;">'
                    .'<i class="icon-pencil"></i> View Response</a> ';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }
    
    public function getReadinessChecklistSurveyDetails($surveyID) {
        $survey = $this->fetchRow($this->select()->where("id = ? ", $surveyID));

        $surveyDetails = $survey->toArray();
        $creator = new Application_Service_SystemAdmin();
        $creatorDetails = $creator->getSystemAdminDetails($surveyDetails['created_by']);
        $surveyDetails['creator'] = $creatorDetails['first_name'] . " " . $creatorDetails['last_name'];

        $parent = $survey->findParentRow('Application_Model_DbTable_ReadinessChecklist');
        $surveyDetails['parent'] = $parent->toArray();

        $participantsRowset = $survey->findDependentRowset('Application_Model_DbTable_ReadinessChecklistParticipant');
        $participants = [];

        foreach ($participantsRowset as $participant) {
            $participants[] = $participant->findParentRow('Application_Model_DbTable_Participants')->toArray()+['survey_status' => $participant->status];
        }

        $surveyDetails['participants'] = $participants;

        return $surveyDetails;
    }

    public function getReadinessChecklistSurveyResponses($surveyID, $participantID) {

        $survey = $this->fetchRow($this->select()->where("id = ? ", $surveyID));

        $surveyDetails = $survey->toArray();

        $parent = $survey->findParentRow('Application_Model_DbTable_ReadinessChecklist');
        $surveyDetails['parent'] = $parent->toArray();

        $surveyDetails['creator'] = "";

        $participantsRowset = $survey->findDependentRowset('Application_Model_DbTable_ReadinessChecklistParticipant');
        $checklistParticipants = [];

        $platforms = [];

        foreach ($participantsRowset as $participant) {

            if($participant->participant_id == $participantID){

                $surveyDetails['checklistParticipant'] = $participant->toArray();
                $surveyDetails['participant'] = $participant->findParentRow('Application_Model_DbTable_Participants')->toArray();
                $checklistParticipants[] = $participant;

                $platforms = $participant->findManyToManyRowset('Application_Model_DbTable_Platforms', 'Application_Model_DbTable_ReadinessChecklistParticipantPlatform', 'ReadinessParticipants')->toArray();
            }
        }

        $surveyDetails['platforms'] = $platforms;

        $surveyDetails['questions'] = $parent->findDependentRowset('Application_Model_DbTable_ReadinessChecklistQuestion')->toArray();


        $answers = [];

        if(count($checklistParticipants) > 0){

            $responses = $checklistParticipants[0]->findDependentRowset('Application_Model_DbTable_ReadinessChecklistResponse');

            foreach ($responses as $response) {
                $dataManager = $response->findParentRow('Application_Model_DbTable_DataManagers');
                $participants = $dataManager->findManyToManyRowset('Application_Model_DbTable_Participants','Application_Model_DbTable_ParticipantManagerMap');
                foreach ($participants as $participant) {
                    if($participant->participant_id == $participantID){
                        $answers[$response->readiness_checklist_question_id] = $response->toArray();
                        
                        $surveyDetails['creator'] = $dataManager['first_name'] . " " . $dataManager['last_name'];
                        break;
                    }
                }
            }
        }
        $surveyDetails['answers'] = $answers;

        return $surveyDetails;
    }

    public function addReadinessChecklistSurvey($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $db = Zend_Db_Table_Abstract::getAdapter();
        $data = array(
            'readiness_checklist_id' => $params['readinessChecklistId'],
            'start_date' => $params['start_date'],
            'end_date' => $params['end_date'],
            'created_by' => $authNameSpace->admin_id,
            'created_at' => date("Y-m-d H:i:s")
        );
        $surveyID = $this->insert($data);

        // Insert participants into readiness_checklist_participants
        $checklistParticipant = new Application_Model_DbTable_ReadinessChecklistParticipant();
        $checklistParticipant->addChecklistSurveyParticipants($surveyID, $params['participants']);

        return $survey;
    }

    public function updateReadinessChecklistSurvey($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'readiness_checklist_id' => $params['readiness_checklist_id'],
            'start_date' => $params['start_date'],
            'end_date' => $params['end_date'],
            'created_by' => $authNameSpace->admin_id
        );
        return $this->update($data, "id=" . $params['readinessChecklistSurveyId']);
    }

}
