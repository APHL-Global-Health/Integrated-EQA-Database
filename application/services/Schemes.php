<?php

class Application_Service_Schemes {

    public function getAllSchemes($onlyActiveScemes = false) {
        $schemeListDb = new Application_Model_DbTable_Scheme();
        return $schemeListDb->getAllSchemes($onlyActiveScemes);
    }

    public function checkResetPassword() {
        if (isset($_SESSION)) {
            if ($_SESSION['loggedInDetails']['force_password_reset'] == 1) {
                return true;
            }
        }
        return false;
    }

    public function getEidExtractionAssay() {

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $res = $db->fetchAll($db->select()->from('r_eid_extraction_assay'));
        $response = array();
        foreach ($res as $row) {
            $response[$row['id']] = $row['name'];
        }
        return $response;
    }

    public function getEidDetectionAssay() {

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $res = $db->fetchAll($db->select()->from('r_eid_detection_assay'));
        $response = array();
        foreach ($res as $row) {
            $response[$row['id']] = $row['name'];
        }
        return $response;
    }

    public function getVlAssay() {

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $res = $db->fetchAll($db->select()->from('assays'));
        $response = array();
        foreach ($res as $row) {
            $response[$row['id']] = $row['name'];
        }
        return $response;
    }

    public function getDtsCorrectiveActions() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $res = $db->fetchAll($db->select()->from('r_dts_corrective_actions'));
        $response = array();
        foreach ($res as $row) {
            $response[$row['action_id']] = $row['corrective_action'];
        }
        return $response;
    }

    public function getVlReferenceData($shipmentId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('reference_result_vl'))
                ->where('shipment_id = ? ', $shipmentId);
        return $db->fetchAll($sql);
    }

    public function getEidReferenceData($shipmentId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('reference_result_eid'))
                ->where('shipment_id = ? ', $shipmentId);
        return $db->fetchAll($sql);
    }

    public function getEidSamples($shipmentID, $participantID, $platformID = 1, $assayID = 2) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('ref' => 'reference_result_eid'))
                ->join(array('s' => 'shipment'), 's.shipment_id=ref.shipment_id')
                ->join(array('sp' => 'shipment_participant_map'), 's.shipment_id=sp.shipment_id')
                ->joinLeft(array('res' => 'response_result_eid'), 'res.shipment_map_id = sp.map_id and res.sample_id = ref.sample_id', array('interpretation', 'target', 'responseDate' => 'res.created_on'))
                ->where('sp.shipment_id = ? ', $shipmentID)
                ->where('sp.participant_id = ? ', $participantID)
                ->where('sp.assay_id = ?', $assayID)
                ->where('sp.platform_id = ? ', $platformID);
        return $db->fetchAll($sql);
    }

    public function getSamples($mapID, $platformID = 1, $assayID = 1) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $sql = $db->select()->from(array('ref' => 'reference_result_vl'))
            ->join(array('s' => 'shipment'), 's.shipment_id=ref.shipment_id')
            ->join(array('sp' => 'shipment_participant_map'), 's.shipment_id=sp.shipment_id')
            ->joinLeft(array('res' => 'response_result_vl'), 'res.shipment_map_id = sp.map_id and res.sample_id = ref.sample_id', array('reported_viral_load', 'calculated_score', 'is_tnd', 'responseDate' => 'res.created_on'))
            ->where('sp.map_id = ? ', $mapID)
            ->where('sp.assay_id = ?', $assayID)
            ->where('sp.platform_id = ? ', $platformID);

        Pt_Commons_General::log2File($sql);

        return $db->fetchAll($sql);
    }

    public function getVlSamples($shipmentID, $participantID, $platformID = 1, $assayID = 1) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $sql = $db->select()->from(array('ref' => 'reference_result_vl'))
            ->join(array('s' => 'shipment'), 's.shipment_id=ref.shipment_id')
            ->join(array('sp' => 'shipment_participant_map'), 's.shipment_id=sp.shipment_id')
            ->joinLeft(array('res' => 'response_result_vl'), 'res.shipment_map_id = sp.map_id and res.sample_id = ref.sample_id', array('reported_viral_load', 'calculated_score', 'is_tnd', 'responseDate' => 'res.created_on'))
            ->where('sp.shipment_id = ? ', $shipmentID)
            ->where('sp.participant_id = ? ', $participantID)
            ->where('sp.assay_id = ?', $assayID)
            ->where('sp.platform_id = ? ', $platformID);

        return $db->fetchAll($sql);
    }

    public function getAllVlPlatformResponses($shipmentID, $platformID = 1, $assayID = 1)
    {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('ref' => 'reference_result_vl'), array('sample_id'))
            ->join(array('sp' => 'shipment_participant_map'), 'ref.shipment_id=sp.shipment_id', array('participant_id'))
            ->join(array('res' => 'response_result_vl'), 'res.shipment_map_id = sp.map_id and res.sample_id = ref.sample_id', array('reported_viral_load', 'is_tnd', 'calculated_score'))
            ->where('sp.shipment_id = ? ', $shipmentID)
            ->where('sp.assay_id = ?', $assayID)
            ->where('sp.platform_id = ? ', $platformID);

        return $db->fetchAll($sql);
    }

    public function getVlRange($sId, $sampleId = null) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('rvc' => 'reference_vl_calculation'))
                ->join(array('ref' => 'reference_result_vl'), 'rvc.sample_id = ref.sample_id', array('sample_label'))
                ->join(array('a' => 'r_vl_assay'), 'a.id = rvc.vl_assay', array('assay_name' => 'name'))
                ->where('rvc.shipment_id = ?', $sId);
        if ($sampleId != null) {
            $sql = $sql->where('rvc.sample_id = ?', $sampleId);
        }
        $res = $db->fetchAll($sql);
        $response = array();
        foreach ($res as $row) {
            $response[$row['vl_assay']][$row['sample_id']]['sample_id'] = $row['sample_id'];
            $response[$row['vl_assay']][$row['sample_id']]['vl_assay'] = $row['vl_assay'];

            if (isset($row['use_range']) && $row['use_range'] != "") {
                if ($row['use_range'] == 'manual') {
                    $response[$row['vl_assay']][$row['sample_id']]['q1'] = $row['manual_q1'];
                    $response[$row['vl_assay']][$row['sample_id']]['q3'] = $row['manual_q3'];
                    $response[$row['vl_assay']][$row['sample_id']]['quartile_low'] = $row['manual_quartile_low'];
                    $response[$row['vl_assay']][$row['sample_id']]['quartile_high'] = $row['manual_quartile_high'];
                    $response[$row['vl_assay']][$row['sample_id']]['low'] = $row['manual_low_limit'];
                    $response[$row['vl_assay']][$row['sample_id']]['high'] = $row['manual_high_limit'];
                    $response[$row['vl_assay']][$row['sample_id']]['mean'] = $row['manual_mean'];
                    $response[$row['vl_assay']][$row['sample_id']]['sd'] = $row['manual_sd'];
                    $response[$row['vl_assay']][$row['sample_id']]['assay_name'] = $row['assay_name'];
                    $response[$row['vl_assay']][$row['sample_id']]['sample_label'] = $row['sample_label'];
                } else {
                    $response[$row['vl_assay']][$row['sample_id']]['q1'] = $row['q1'];
                    $response[$row['vl_assay']][$row['sample_id']]['q3'] = $row['q3'];
                    $response[$row['vl_assay']][$row['sample_id']]['quartile_low'] = $row['quartile_low'];
                    $response[$row['vl_assay']][$row['sample_id']]['quartile_high'] = $row['quartile_high'];
                    $response[$row['vl_assay']][$row['sample_id']]['low'] = $row['low_limit'];
                    $response[$row['vl_assay']][$row['sample_id']]['high'] = $row['high_limit'];
                    $response[$row['vl_assay']][$row['sample_id']]['mean'] = $row['mean'];
                    $response[$row['vl_assay']][$row['sample_id']]['sd'] = $row['sd'];
                    $response[$row['vl_assay']][$row['sample_id']]['assay_name'] = $row['assay_name'];
                    $response[$row['vl_assay']][$row['sample_id']]['sample_label'] = $row['sample_label'];
                }
            } else {
                $response[$row['vl_assay']][$row['sample_id']]['q1'] = $row['q1'];
                $response[$row['vl_assay']][$row['sample_id']]['q3'] = $row['q3'];
                $response[$row['vl_assay']][$row['sample_id']]['quartile_low'] = $row['quartile_low'];
                $response[$row['vl_assay']][$row['sample_id']]['quartile_high'] = $row['quartile_high'];
                $response[$row['vl_assay']][$row['sample_id']]['low'] = $row['low_limit'];
                $response[$row['vl_assay']][$row['sample_id']]['high'] = $row['high_limit'];
                $response[$row['vl_assay']][$row['sample_id']]['mean'] = $row['mean'];
                $response[$row['vl_assay']][$row['sample_id']]['sd'] = $row['sd'];
                $response[$row['vl_assay']][$row['sample_id']]['assay_name'] = $row['assay_name'];
                $response[$row['vl_assay']][$row['sample_id']]['sample_label'] = $row['sample_label'];
            }
        }
        return $response;
    }

    public function getVlRangeInformation($sId, $sampleId = null) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('rvc' => 'reference_vl_calculation'), array('shipment_id', 'sample_id', 'vl_assay', 'low_limit', 'high_limit', 'calculated_on', 'manual_high_limit', 'manual_low_limit', 'mean', 'sd', 'updated_on', 'use_range'))
                ->join(array('ref' => 'reference_result_vl'), 'rvc.sample_id = ref.sample_id AND ref.shipment_id=' . $sId, array('sample_label'))
                ->join(array('a' => 'r_vl_assay'), 'a.id = rvc.vl_assay', array('assay_name' => 'name'))
                ->where('rvc.shipment_id = ?', $sId);

        if ($sampleId != null) {
            $sql = $sql->where('rvc.sample_id = ?', $sampleId);
        }

        $res = $db->fetchAll($sql);

        $response = array();

        foreach ($res as $row) {

            $response[$row['sample_id']][$row['vl_assay']]['shipment_id'] = $row['shipment_id'];
            $response[$row['sample_id']][$row['vl_assay']]['sample_label'] = $row['sample_label'];
            $response[$row['sample_id']][$row['vl_assay']]['sample_id'] = $row['sample_id'];
            $response[$row['sample_id']][$row['vl_assay']]['vl_assay'] = $row['vl_assay'];
            $response[$row['sample_id']][$row['vl_assay']]['assay_name'] = $row['assay_name'];
            $response[$row['sample_id']][$row['vl_assay']]['low'] = $row['low_limit'];
            $response[$row['sample_id']][$row['vl_assay']]['high'] = $row['high_limit'];
            $response[$row['sample_id']][$row['vl_assay']]['mean'] = $row['mean'];
            $response[$row['sample_id']][$row['vl_assay']]['sd'] = $row['sd'];
            $response[$row['sample_id']][$row['vl_assay']]['manual_low_limit'] = $row['manual_low_limit'];
            $response[$row['sample_id']][$row['vl_assay']]['manual_high_limit'] = $row['manual_high_limit'];
            $response[$row['sample_id']][$row['vl_assay']]['use_range'] = $row['use_range'];

            if (!isset($response['updated_on'])) {
                $response['updated_on'] = $row['updated_on'];
            }
            if (!isset($response['calculated_on'])) {
                $response['calculated_on'] = $row['calculated_on'];
            }
        }
        return $response;
    }

    public function updateVlInformation($params) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        foreach ($params['sampleId'] as $assayId => $samples) {
            foreach ($samples as $sampid) {
                $data['use_range'] = $params['useRange'][$assayId][$sampid];
                $data['updated_on'] = new Zend_Db_Expr('now()');
                $db->update('reference_vl_calculation', $data, "shipment_id = " . base64_decode($params['sid']) . " and sample_id = " . $sampid . " and " . " vl_assay = " . $assayId);
            }
        }
    }

    public function setVlRange($sId) {


        $db = Zend_Db_Table_Abstract::getDefaultAdapter();


        $vlAssayArray = $this->getVlAssay();

        foreach ($vlAssayArray as $vlAssayId => $vlAssayName) {
            $sql = $db->select()->from(array('ref' => 'reference_result_vl'), array('shipment_id', 'sample_id'))
                    ->join(array('s' => 'shipment'), 's.shipment_id=ref.shipment_id', array())
                    ->join(array('sp' => 'shipment_participant_map'), 's.shipment_id=sp.shipment_id', array('participant_id'))
                    ->joinLeft(array('res' => 'response_result_vl'), 'res.shipment_map_id = sp.map_id and res.sample_id = ref.sample_id', array('reported_viral_load'))
                    ->where('sp.shipment_id = ? ', $sId)
                    ->where("sp.is_excluded = 'no' ")
                    ->where('sp.attributes like ? ', '%"vl_assay":"' . $vlAssayId . '"%');
            $response = $db->fetchAll($sql);
            $sampleWise = array();
            foreach ($response as $row) {
                $sampleWise[$vlAssayId][$row['sample_id']][] = ($row['reported_viral_load']);
            }
            if (!isset($sampleWise[$vlAssayId])) {
                continue;
            }

            foreach ($sampleWise[$vlAssayId] as $sample => $reportedVl) {

                if ($reportedVl != "" && $reportedVl != null && count($reportedVl) > 7) {

                    $rvcRow = $db->fetchRow($db->select()->from('reference_vl_calculation')
                                    ->where('shipment_id = ?', $sId)
                                    ->where('sample_id = ?', $sample)
                                    ->where('vl_assay = ?', $vlAssayId)
                    );
                    $inputArray = $origArray = $reportedVl;

                    sort($inputArray);
                    $q1 = $this->getQuartile($inputArray, 0.25);
                    $q3 = $this->getQuartile($inputArray, 0.75);
                    $iqr = $q3 - $q1;
                    $quartileLowLimit = $q1 - ($iqr * 1.5);
                    $quartileHighLimit = $q3 + ($iqr * 1.5);

                    $newArray = array();
                    $removeArray = array();
                    foreach ($inputArray as $a) {
                        if ($a >= round($quartileLowLimit, 2) && $a <= round($quartileHighLimit, 2)) {
                            $newArray[] = $a;
                        } else {
                            $removeArray[] = $a;
                        }
                    }


                    //Zend_Debug::dump("Under Assay $vlAssayId-Sample $sample - COUNT AFTER REMOVING OUTLIERS: ".count($newArray) . " FOLLOWING ARE OUTLIERS");
                    //Zend_Debug::dump($removeArray);

                    $avg = $this->getAverage($newArray);
                    $sd = $this->getStdDeviation($newArray);

                    if ($avg == 0) {
                        $cv = 0;
                    } else {
                        $cv = $sd / $avg;
                    }

                    $finalLow = $avg - (3 * $sd);
                    $finalHigh = $avg + (3 * $sd);

                    $data = array('shipment_id' => $sId,
                        'vl_assay' => $vlAssayId,
                        'sample_id' => $sample,
                        'q1' => $q1,
                        'q3' => $q3,
                        'iqr' => $iqr,
                        'quartile_low' => $quartileLowLimit,
                        'quartile_high' => $quartileHighLimit,
                        'mean' => $avg,
                        'sd' => $sd,
                        'cv' => $cv,
                        'low_limit' => $finalLow,
                        'high_limit' => $finalHigh,
                        "calculated_on" => new Zend_Db_Expr('now()')
                    );

                    if (isset($rvcRow['manual_low_limit']) && $rvcRow['manual_low_limit'] != "") {
                        $data['manual_low_limit'] = $rvcRow['manual_low_limit'];
                    }
                    if (isset($rvcRow['manual_high_limit']) && $rvcRow['manual_high_limit'] != "") {
                        $data['manual_high_limit'] = $rvcRow['manual_high_limit'];
                    }
                    if (isset($rvcRow['updated_on']) && $rvcRow['updated_on'] != "") {
                        $data['updated_on'] = $rvcRow['updated_on'];
                    }
                    if (isset($rvcRow['use_range']) && $rvcRow['use_range'] != "") {
                        $data['use_range'] = $rvcRow['use_range'];
                    }
                    $db->delete('reference_vl_calculation', "vl_assay = " . $vlAssayId . " and sample_id=$sample and shipment_id=$sId");
                    $db->insert('reference_vl_calculation', $data);
                }
            }
        }
    }

    public function getQuartile($inputArray, $quartile) {
        $pos = (count($inputArray) - 1) * $quartile;

        $base = floor($pos);
        $rest = $pos - $base;

        if (isset($inputArray[$base + 1])) {
            return $inputArray[$base] + $rest * ($inputArray[$base + 1] - $inputArray[$base]);
        } else {
            return $inputArray[$base];
        }
    }

    public function getAverage($inputArray) {
        return array_sum($inputArray) / count($inputArray);
    }

    public function getStdDeviation($inputArray) {

        $avg = $this->getAverage($inputArray);

        $sum = 0;
        foreach ($inputArray as $value) {
            $sum += pow($value - $avg, 2);
        }

        if((count($inputArray) - 1) != 0)
            return sqrt((1 / (count($inputArray) - 1)) * $sum);
        else
            return;
    }

    public function getShipmentData($sId, $pId, $platformID = 1, $assayID = 1) {

        $db = new Application_Model_DbTable_Shipments();
        return $db->getShipmentData($sId, $pId, $platformID, $assayID);
    }

    public function getSchemeControls($schemeId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll($db->select()->from('r_control')->where("for_scheme='$schemeId'"));
    }

    public function getSchemeEvaluationComments($schemeId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll($db->select()->from('r_evaluation_comments')->where("scheme='$schemeId'"));
    }

    public function getPossibleResults($schemeId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        return $db->fetchAll($db->select()->from('r_possibleresult')->where("scheme_id='$schemeId'"));
    }

    public function countEnrollmentSchemes() {
        $schemeListDb = new Application_Model_DbTable_Scheme();
        return $schemeListDb->countEnrollmentSchemes();
    }

    public function getScheme($sid) {
        if ($sid != null) {
            $schemeListDb = new Application_Model_DbTable_Scheme();
            return $schemeListDb->fetchRow($schemeListDb->select()->where("scheme_id = ?", $sid));
        } else {
            return null;
        }
    }

    public function getVlManualValue($shipmentId, $sampleId, $vlAssay) {
        if (trim($shipmentId) != "" && trim($sampleId) != "" && trim($vlAssay) != "") {
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $sql = $db->select()->from(array('rvc' => 'reference_vl_calculation'), array('shipment_id', 'sample_id', 'vl_assay', 'manual_q1', 'manual_q3', 'manual_iqr', 'manual_quartile_low', 'manual_quartile_high', 'manual_mean', 'manual_sd', 'manual_cv', 'manual_high_limit', 'manual_low_limit', 'use_range'))
                    ->join(array('ref' => 'reference_result_vl'), 'rvc.sample_id = ref.sample_id AND ref.shipment_id=' . $shipmentId, array('sample_label'))
                    ->join(array('a' => 'r_vl_assay'), 'a.id = rvc.vl_assay', array('assay_name' => 'name'))
                    ->where('rvc.shipment_id = ?', $shipmentId)
                    ->where('rvc.sample_id = ?', $sampleId)
                    ->where('rvc.vl_assay = ?', $vlAssay);
            return $db->fetchRow($sql);
        }
    }

    public function updateVlManualValue($params) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $db->beginTransaction();
        try {
            $shipmentId = base64_decode($params['shipmentId']);
            $sampleId = base64_decode($params['sampleId']);
            $vlAssay = base64_decode($params['vlAssay']);
            if (trim($shipmentId) != "" && trim($sampleId) != "" && trim($vlAssay) != "") {
                $data['manual_q1'] = $params['manualQ1'];
                $data['manual_q3'] = $params['manualQ3'];
                $data['manual_iqr'] = $params['manualIqr'];
                $data['manual_quartile_low'] = $params['manualQuartileLow'];
                $data['manual_quartile_high'] = $params['manualQuartileHigh'];
                $data['manual_mean'] = $params['manualMean'];
                $data['manual_sd'] = $params['manualSd'];
                $data['manual_cv'] = $params['manualCv'];
                $data['manual_low_limit'] = $params['manualLowLimit'];
                $data['manual_high_limit'] = $params['manualHighLimit'];
                $db->update('reference_vl_calculation', $data, "shipment_id = " . $shipmentId . " and sample_id = " . $sampleId . " and " . " vl_assay = " . $vlAssay);
                $db->commit();
                return $params['shipmentId'];
            }
        } catch (Exception $e) {
            $db->rollBack();
            error_log($e->getMessage());
        }
    }

    public function getVlNotTestedReasons() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('response_vl_not_tested_reason'))
                ->where('status = ? ', 'active');
        return $db->fetchAll($sql);
    }

    public function addScheme($params){
        $schemeModel = new Application_Model_DbTable_Scheme();
        return $schemeModel->addScheme($params);
    }
       
    public function deleteScheme($platformId){
        $schemeModel = new Application_Model_DbTable_Scheme();
        return $schemeModel->deleteScheme($platformId);
    }
    
    public function updateScheme($params){
        $schemeModel = new Application_Model_DbTable_Scheme();
        return $schemeModel->updateScheme($params);
    }
    
}
