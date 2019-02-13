<?php

class Application_Model_DbTable_ResponseEid extends Zend_Db_Table_Abstract
{

    protected $_name = 'response_result_eid';
    protected $_primary = array('shipment_map_id','sample_id');

    public function updateResults($params){
        $sampleIds = $params['sampleId'];
        $targets = $params['target'];
        $interpretations = $params['interpretation'];
        foreach($sampleIds as $key => $sampleId){
            $res = $this->fetchRow("shipment_map_id = ".$params['smid'] . " and sample_id = ".$sampleId );
            $authNameSpace = new Zend_Session_Namespace('datamanagers');

            error_log(json_encode($sampleId));
            error_log(json_encode($targets[$key]));
            error_log(json_encode($interpretations[$key]));

            if($res == null || count($res) == 0){
                $this->insert(array(
                                    'shipment_map_id'=>$params['smid'],
                                    'sample_id'=>$sampleId,
                                    'target'=>$targets[$key],
                                    'interpretation'=>$interpretations[$key],
                                    'created_by' => $authNameSpace->dm_id,
                                    'created_on' => new Zend_Db_Expr('now()')
                                   ));                
            }else{
                $this->update(array(
                                    'shipment_map_id'=>$params['smid'],
                                    'sample_id'=>$sampleId,
                                    'target'=>$targets[$key],
                                    'interpretation'=>$interpretations[$key],
                                    'updated_by' => $authNameSpace->UserID,
                                    'updated_on' => new Zend_Db_Expr('now()')
                                   ), "shipment_map_id = ".$params['smid'] . " and sample_id = ".$sampleId );
                
            }

        }
    }

}

