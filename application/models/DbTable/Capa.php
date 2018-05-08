<?php

class Application_Model_DbTable_Capa extends Zend_Db_Table_Abstract
{

    protected $_name = 'vl_eid_capa';
//    protected $_primary = 'ID';


    public function saveCorrectiveAction($params){
       // print_r($params);exit;
        $insertId = $this->insert($params);
    }
    public function getParticipantId($dm_id){

       $labs = array('participant_id');
       
        return $lab['participant_id'];
    }



}
