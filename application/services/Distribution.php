<?php

class Application_Service_Distribution {

    public function getAllDistributions($params) {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->getAllDistributions($params);
    }

    public function addDistribution($params, $labEmail = null) {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->addDistribution($params, $labEmail);
    }

    public function getDistribution($did) {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->getDistribution($did);
    }

    public function updateDistribution($params) {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->updateDistribution($params);
    }

    public function getDistributionDates() {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->getDistributionDates();
    }

    public function getShipments($distroId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('s' => 'shipment'))
                ->where("distribution_id = ?", $distroId);

        return $db->fetchAll($sql);
    }

    public function getUnshippedDistributions() {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->getUnshippedDistributions();
    }

    public function updateDistributionStatus($distributionId, $status) {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->updateDistributionStatus($distributionId, $status);
    }

    public function returnshippingMessage($shipmentName) {
        $common = new Application_Service_Common();
                
               $config = new Zend_Config_Ini($common->configFileUrl(), APPLICATION_ENV);
        $message = ""
                . "This to notify you that your flow cytometry EQA panel (".$shipmentName.") from the NHRL proficiency testing programme is en route to your facility.".
                " Please expect delivery within 1-2 working days.<br>".
                
                
                
                "Kindly acknowledge receipt and the condition of the panel immediately it is delivered using the link below:".
                "<br><a href='".$common->baseUrl().'/participant/current-schemes'."' style='padding:14px;width:auto;".
                       "text-decoration:none;display:block;background-color:purple;margin:8px;color:white;border-radius:10px;'>".
                      "NHRL Proficiency Testing Programme:<br> Viral Load/EID receipt</a><br>"
                .$config->vleidEmailFooter;

        
        
        return $message;
    }

    public function getShippedLabList($shipmentId) {
        try {
            $shipmentDb = new Application_Model_DbTable_Shipments();
            $participantData = $shipmentDb->returnEnrolledLabsForMail($shipmentId);
            $email = array();
            $shippingCode = '';
            if (count($participantData) > 0) {
                foreach ($participantData as $key => $value) {
                    array_push($email, $value['email']);
                    $shippingCode = $value['shipment_code'];
                }

                return array('sendTo' => $email, 'shipment_code' => $shippingCode);
            }
            return false;
        } catch (Exception $e) {
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
            return "Unable to ship. Please try again later or contact system admin for help";
        }
    }

    public function sendEmailToParticipantsForShipmentDispatch($shipmentId) {
        $shipmentDb = new Application_Model_DbTable_Shipments();

        $sendInfo = $this->getShippedLabList($shipmentId);
        if ($sendInfo === false){
            return;
        }
        $message = $this->returnshippingMessage($sendInfo['shipment_code']);
        $common = new Application_Service_Common();

        $common->sendGeneralEmail($sendInfo['sendTo'], $message);
    }

    public function shipDistribution($distributionId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $db->beginTransaction();
        try {
            $shipmentDb = new Application_Model_DbTable_Shipments();
            $shipmentDb->updateShipmentStatusByDistribution($distributionId, "shipped");

            $disrtibutionDb = new Application_Model_DbTable_Distribution();
            $disrtibutionDb->updateDistributionStatus($distributionId, "shipped");
            $this->sendEmailToParticipantsForShipmentDispatch($distributionId);
            $db->commit();

            return "PT Event shipped!";
        } catch (Exception $e) {
            $db->rollBack();
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
            return "Unable to ship. Please try again later or contact system admin for help";
        }
    }

    public function getAllDistributionReports($parameters) {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->getAllDistributionReports($parameters);
    }

    public function getAllDistributionStatus() {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->getAllDistributionStatusDetails();
    }

}
