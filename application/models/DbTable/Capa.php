<?php

class Application_Model_DbTable_Capa extends Zend_Db_Table_Abstract
{

    protected $_name = 'vl_eid_capa';

//    protected $_primary = 'ID';


    public function saveCorrectiveAction($params)
    {
        $db = Zend_Db_Table_Abstract::getAdapter();
        $checkquery = $db->select()
            ->from("vl_eid_capa", array("num" => "COUNT(*)"))
            ->where('participantId = ?', $params['participantId'])
            ->where('surveyId = ?', $params['surveyId'])
            ->where('dmId = ?', $params['dmId']);

        $checkrequest = $db->fetchRow($checkquery);

        if ($checkrequest["num"] > 0) {
            return 2;
        }
        $insertId = $this->insert($params);
        return 1;
    }

    public function getParticipantId($dm_id)
    {

        $select = array('participant_id');

        $sQuery = $this->getAdapter()->select();

        //$sQuery->join(array('p' => ""), 'p.participant_id=sp.participantId', array());


        $sQuery->from(array('sp' => "participant_manager_map"), $select);
        $sQuery->where('dm_id = ?', $dm_id);
        $lab = $this->getAdapter()->fetchRow($sQuery);

        return $lab['participant_id'];
    }

    public function getCapaFeedback($filter = null)
    {

        $db = Zend_Db_Table_Abstract::getAdapter();
        $checkquery = $db->select()
            ->from("vl_eid_capa")
            ->join(array('pmm' => 'participant'), 'pmm.participant_id=vl_eid_capa.ParticipantID', array('mflCode', 'institute_name'))
            ->join(array('r' => 'distributions'), 'r.distribution_id=vl_eid_capa.surveyId', 'distribution_code');;
        if (isset($filter)) {
            if (isset($filter['dateSubmittedFrom']) && !empty($filter['dateSubmittedFrom']))
                $checkquery->where('dateCreated >= ?', $filter['dateSubmittedFrom']);
            if (isset($filter['dateSubmittedFrom']) && !empty($filter['dateSubmittedFrom']))
                $checkquery->where('dateCreated <= ?', $filter['dateSubmittedTo']);
            if (isset($filter['surveyId']) && !empty($filter['surveyId']))
                $checkquery->where('surveyId >= ?', $filter['surveyId']);
            if (isset($filter['participantId'])&& !empty($filter['participantId']))
                $checkquery->where('participantId = ?', $filter['participantId']);
        }
        return $db->fetchAll($checkquery);
    }

    public function enrolledLaboratories()
    {
        $db = Zend_Db_Table_Abstract::getAdapter();
        $checkquery = $db->select()
            ->from("participant",array('mflCode', 'institute_name','participant_id'))
           // ->join(array('e' => 'enrollments'), 'e.participant_id=participant.participant_id', array())
        ->group("participant.participant_id");
        return $db->fetchAll($checkquery);

    }


}
