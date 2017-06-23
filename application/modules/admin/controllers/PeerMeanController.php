<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_PeerMeanController extends Zend_Controller_Action {

    protected $db;

    public function init() {
        $this->db = Zend_Db_Table_Abstract::getDefaultAdapter();
    }

    public function indexAction() {
        
    }

    public function standard_deviation($aValues, $bSample = false) {
        $fMean = array_sum($aValues) / count($aValues);
        $fVariance = 0.0;
        $sdArray = array();
        $sdArray['mean'] = $fMean;
        foreach ($aValues as $i) {
            $fVariance += pow($i - $fMean, 2);
        }
        $fVariance /= ($bSample ? count($aValues) - 1 : count($aValues));
        $sdArray['sd'] = (float) sqrt($fVariance);

        return $sdArray;
    }

    public function updatesampletableActions($sampleDetails) {
        try {
            $peerSamples = $this->db->fetchAll(
                    $this->db
                            ->select()
                            ->from('vl_peer_mean')
                            ->where("shipmentId = " . $sampleDetails['shipmentId'] . "")
                            ->where("sampleId = " . $sampleDetails['sampleId'] . "")
            );
            $values = array();

            if (count($peerSamples) > 0) {
                foreach ($peerSamples as $key => $value) {
                    array_push($values, $value['result']);
                }
                $updateArray = $this->standard_deviation($values);

                $updateArray['low_limit'] = $updateArray['mean'] - 0.5;
                $updateArray['high_limit'] = $updateArray['mean'] + 0.5;

                $where = "shipment_id = " . $sampleDetails['shipmentId'] . " and sample_id =" . $sampleDetails['sampleId'] . "";
                $this->db->update('reference_vl_calculation', $updateArray, $where);
            }
//            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getpeermeansAction() {
        $shipmentServce = new Application_Service_Shipments();

        $shipmentId = $this->getRequest()->getParam('shipmentId');
        $sampleId = $this->getRequest()->getParam('sampleId');

        $sampleDetails = $shipmentServce->getsamplemeans($shipmentId, $sampleId);

        echo json_encode($sampleDetails);
        exit;
    }

    public function savepeermeanAction() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $insertArray = $_POST;


        $insertArray['system_id'] = $_SESSION['loggedInDetails']["admin_id"];

        if (is_array($insertArray)) {
            $insert_id = $db->insert('vl_peer_mean', $insertArray);

            if ($insert_id > 0) {
                $updateMean = $this->updatesampletableActions($insertArray);
                echo json_encode(array('status' => 1, 'message' => ''));
            } else {
                echo json_encode(array('status' => 0, 'message' => ''));
            }
        }

        exit;
    }

    public function deleteFromPeerMeans($id) {

        $where['id'] = $id;
    }

    public function deletepeermeanAction() {

        $id = $_POST['id'];
        
        if (is_numeric($id)) {
            $this->db->delete('vl_peer_mean', " id = $id");
            $this->updatesampletableActions($_POST);
            echo json_encode(array('status' => 1, 'message' => 'Record deleted'));
        } else {
            echo json_encode(array('status' => 0, 'message' => '  '));
        }

        exit;
    }

}
