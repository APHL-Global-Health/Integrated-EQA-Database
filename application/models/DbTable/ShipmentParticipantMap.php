<?php

class Application_Model_DbTable_ShipmentParticipantMap extends Zend_Db_Table_Abstract
{

    protected $_name = 'shipment_participant_map';
    protected $_primary = 'map_id';


    public function sendEnrollingEmail($data)
    {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();


        $labShipmentDetails = $db->fetchAll($db->select()
            ->from(array('s' => 'shipment'), array('shipment_code', 'lastdate_response', 'scheme_type', ''))
            ->join(array('d' => 'shipment_participant_map'), 'd.shipment_id = s.shipment_id',
                array('participant_id', 'shipment_id'))
            ->join(array('p' => 'participant'), 'p.participant_id = d.participant_id',
                array('email', 'institute_name'))
            ->join(array('di' => 'distributions'), 'di.distribution_id = s.distribution_id',
                array('distribution_code'))
            ->where("d.shipment_id = ?", $data['shipment_id']));
        $emails = array();
        foreach ($labShipmentDetails as $key => $value) {
            $common = new Application_Service_Common();

            $config = new Zend_Config_Ini($common->configFileUrl(), APPLICATION_ENV);

            $message = "" .
                "This is a notification of an impending EQA round(" . $value['distribution_code'] . ") for Viral Load/EID from the NHRL Proficiency Testing programme." .
                "<br>Kindly let us know if you will be able to participate by filling the readiness assessment " .
                "checklist using the link below:<br>" .

                "<br><a href='" . $common->baseUrl() . '/distributions' . "' style='padding:14px;width:auto;" .
                "text-decoration:none;display:block;background-color:purple;margin:8px;color:white;border-radius:10px;'>" .
                "NHRL Proficiency Testing Programme:<br>Viral Load/EID readiness checklist</a><br>" .
                "Please complete by THIS DATE. Failure to comply will result in exclusion from the round<br>" .
                "<br>" .
                "<br>" ;

            array_push($emails, $value['email']);


        }

        if (count($emails) > 0) {
            $common->sendGeneralEmail($emails, $message, "participant");
        }

    }


    public function sendResultsPublishingEmail($data)
    {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();


        $labShipmentDetails = $db->fetchAll($db->select()
            ->from(array('s' => 'shipment'), array('shipment_code', 'lastdate_response', 'scheme_type', ''))
            ->join(array('d' => 'shipment_participant_map'), 'd.shipment_id = s.shipment_id',
                array('participant_id', 'shipment_id'))
            ->join(array('p' => 'participant'), 'p.participant_id = d.participant_id',
                array('email', 'institute_name'))
            ->join(array('di' => 'distributions'), 'di.distribution_id = s.distribution_id',
                array('distribution_code'))
            ->where("d.shipment_id = ?", $data['shipment_id']));
        $emails = array();
        foreach ($labShipmentDetails as $key => $value) {
            $common = new Application_Service_Common();

            $config = new Zend_Config_Ini($common->configFileUrl(), APPLICATION_ENV);

            $message = "" .
                "This to notify you that your viral load/EID EQA panel results from the NHRL proficiency testing programme are available online. Please log in to view:<br>" .

                "<br><a href='" . $common->baseUrl() . '/participant/all-schemes' . "' style='padding:14px;width:auto;" .
                "text-decoration:none;display:block;background-color:purple;margin:8px;color:white;border-radius:10px;'>" .
                "NHRL Proficiency Testing Programme:<br>Viral Load/EID readiness checklist</a><br>" .
                "<br>" .
                "<br>" ;
            array_push($emails, $value['email']);


        }
        if (count($emails) > 0) {
            $common->sendGeneralEmail($emails, $message, "participant");
        }
    }


    public function shipItNow($params)
    {
        try {
            $this->getAdapter()->beginTransaction();
            $authNameSpace = new Zend_Session_Namespace('administrators');
            $this->delete('shipment_id=' . $params['shipmentId']);
            foreach ($params['participants'] as $participant) {


                //$row = $this->fetchRow('shipment_id='.$params['shipmentId'] .' and participant_id='.$participant);
                //if($row != null && $row != ""){
                //    echo('shipment_id='.$params['shipmentId'] .' and participant_id='.$participant);
                //    $data = array('shipment_id'=>$params['shipmentId'],
                //                  'participant_id'=>$participant,
                //                  'updated_by_admin' => $authNameSpace->admin_id,
                //                  "updated_on_admin"=>new Zend_Db_Expr('now()'));
                //    $this->update($data,'shipment_id='.$params['shipmentId'] .' and participant_id='.$participant);                    
                //}else{
                $data = array('shipment_id' => $params['shipmentId'],
                    'participant_id' => $participant,
                    'evaluation_status' => '19901190',
                    'created_by_admin' => $authNameSpace->admin_id,
                    "created_on_admin" => new Zend_Db_Expr('now()'));


                $this->insert($data);
                //}
            }
            $this->sendEnrollingEmail($data);

            $shipmentDb = new Application_Model_DbTable_Shipments();
            $shipmentDb->updateShipmentStatus($params['shipmentId'], 'ready');

            $shipmentRow = $shipmentDb->fetchRow('shipment_id=' . $params['shipmentId']);

            $resultSet = $shipmentDb->fetchAll($shipmentDb->select()->where("status = 'pending' AND distribution_id = "
                . $shipmentRow['distribution_id']));

            if (count($resultSet) == 0) {
                $distroService = new Application_Service_Distribution();
                $distroService->updateDistributionStatus($shipmentRow['distribution_id'], 'configured');
            }

            $this->getAdapter()->commit();
            return true;
        } catch (Exception $e) {
            $this->getAdapter()->rollBack();
            die($e->getMessage());
            error_log($e->getTraceAsString());
            return false;
        }
    }

    public function updateShipment($params, $shipmentMapId, $lastDate)
    {
        $row = $this->fetchRow("map_id = " . $shipmentMapId);
        if ($row != "") {
            if (trim($row['created_on_user']) == "" || $row['created_on_user'] == NULL) {
                $this->update(array('created_on_user' => new Zend_Db_Expr('now()')), "map_id = " . $shipmentMapId);
            }
        }

        $params['evaluation_status'] = $row['evaluation_status'];

        // changing evaluation status 3rd character to 1 = responded
        $params['evaluation_status'][2] = 1;

        // changing evaluation status 5th character to 1 = via web user
        $params['evaluation_status'][4] = 1;

        // changing evaluation status 4th character to 1 = timely response or 2 = delayed response

        $date = new Zend_Date();
        $lastDate = new Zend_Date($lastDate, Zend_Date::ISO_8601);
        // only if current date is LATER than last date we make status = 2
        if ($date->compare($lastDate) == 1) {
            $params['evaluation_status'][3] = 2;
        } else {
            $params['evaluation_status'][3] = 1;
        }

        return $this->update($params, "map_id = " . $shipmentMapId);
    }

    public function removeShipmentMapDetails($params, $mapId)
    {
        $row = $this->fetchRow("map_id = " . $mapId);
        if ($row != "") {
            if (trim($row['created_on_user']) == "" || $row['created_on_user'] == NULL) {
                $this->update(array('created_on_user' => new Zend_Db_Expr('now()')), "map_id = " . $mapId);
            }
        }
        $params['evaluation_status'] = $row['evaluation_status'];
        // changing evaluation status 3rd character to 9 = not responded
        $params['evaluation_status'][2] = 9;

        // changing evaluation status 5th character to 1 = via web user
        $params['evaluation_status'][4] = 1;

        // changing evaluation status 4th character to 0 = no response
        $params['evaluation_status'][3] = 0;

        return $this->update($params, "map_id = " . $mapId);
    }

    public function isShipmentEditable($shipmentId, $participantId)
    {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $shipment = $db->fetchRow($db->select()->from(array('s' => 'shipment'))
            ->where("s.shipment_id = ?", $shipmentId));

        if ($shipment["status"] == 'finalized' || $shipment["response_switch"] == 'off') {
            return false;
        } else {
            return true;
        }
    }

    public function addEnrollementDetails($params)
    {
        try {
            $this->getAdapter()->beginTransaction();
            $authNameSpace = new Zend_Session_Namespace('administrators');
            $size = count($params['participants']);
            for ($i = 0; $i < $size; $i++) {
                $data = array('shipment_id' => base64_decode($params['shipmentId']),
                    'participant_id' => base64_decode($params['participants'][$i]),
                    'evaluation_status' => '19901190',
                    'created_by_admin' => $authNameSpace->admin_id,
                    "created_on_admin" => new Zend_Db_Expr('now()'));
                $this->insert($data);
            }
            $this->getAdapter()->commit();
            $alertMsg = new Zend_Session_Namespace('alertSpace');
            $alertMsg->message = "Participants added successfully";
        } catch (Exception $e) {
            $this->getAdapter()->rollBack();
            die($e->getMessage());
            error_log($e->getTraceAsString());
            return false;
        }
    }

    public function enrollShipmentParticipant($shipmentId, $participantId)
    {
        $insertCount = 0;
        try {
            $this->getAdapter()->beginTransaction();
            $authNameSpace = new Zend_Session_Namespace('administrators');
            $participantId = explode(',', $participantId);
            $count = count($participantId);
            for ($i = 0; $i < $count; $i++) {
                $data = array('shipment_id' => $shipmentId,
                    'participant_id' => base64_decode($participantId[$i]),
                    'evaluation_status' => '19901190',
                    'created_by_admin' => $authNameSpace->admin_id,
                    "created_on_admin" => new Zend_Db_Expr('now()'));
                $insertCount = $this->insert($data);
            }
            $this->getAdapter()->commit();
            return $insertCount;
        } catch (Exception $e) {
            $this->getAdapter()->rollBack();
            die($e->getMessage());
            error_log($e->getTraceAsString());
            return 0;
        }
    }

    public function addQcInfo($params)
    {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        if (isset($params['mapId']) && trim($params['mapId']) != "") {
            $participantMapId = explode(',', $params['mapId']);
            $count = count($participantMapId);
            $qcDate = Pt_Commons_General::dateFormat($params['qcDate']);
            for ($i = 0; $i < $count; $i++) {
                if (trim($participantMapId[$i]) != "") {
                    $data = array(
                        'qc_date' => $qcDate,
                        'qc_done_by' => $authNameSpace->dm_id,
                        "qc_created_on" => new Zend_Db_Expr('now()')
                    );
                    $result = $this->update($data, "map_id = " . $participantMapId[$i]);
                }
            }
            return $result;
        }


    }

}
