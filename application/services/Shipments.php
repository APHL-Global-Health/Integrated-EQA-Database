<?php

class Application_Service_Shipments {

    public function getSampleShipment($sid) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll(
                        $db->select()
                                ->from('reference_vl_calculation')
                                ->join(array('rr' => 'reference_result_vl'), 'reference_vl_calculation.sample_id=rr.sample_id')
                                ->join(array('sp' => 'shipment'), 'reference_vl_calculation.shipment_id=sp.shipment_id')

                                ->where("reference_vl_calculation.shipment_id=rr.shipment_id")
                                ->where("rr.shipment_id=" . $sid)
                                ->order('reference_vl_calculation.sample_id ASC')
        );
    }

    public function getsamplemeans($sid, $sampleId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll(
                        $db->select()
                                ->from('vl_peer_mean')
                                ->join(array('rr' => 'reference_result_vl'), 'vl_peer_mean.sampleId=rr.sample_id')
                                ->join(array('sp' => 'shipment'), 'vl_peer_mean.shipmentId=sp.shipment_id')
                                ->joinLeft(array('system_admin' => 'system_admin'), 'vl_peer_mean.system_id=system_admin.admin_id')
//                                ->where("reference_vl_calculation.shipment_id=" . $sid)
                                ->where("vl_peer_mean.shipmentId=rr.shipment_id")
                                ->where("vl_peer_mean.shipmentId=" . $sid)
                                ->where("vl_peer_mean.sampleId=" . $sampleId)
                                ->order('vl_peer_mean.sampleId ASC')
        );
    }

    public function getparticipatingLabs($sid) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll(
                        $db->select()
                                ->from('shipment_participant_map')
                                ->join(array('pp' => 'participant'), 'shipment_participant_map.participant_id=pp.participant_id')
                                ->join(array('sp' => 'shipment'), 'shipment_participant_map.shipment_id=sp.shipment_id')
                                ->where("shipment_participant_map.shipment_id=" . $sid)
        );
    }

    public function getAllShipments($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $aColumns = array("sl.scheme_name", "shipment_code", 'distribution_code', "DATE_FORMAT(distribution_date,'%d-%b-%Y')", 'number_of_samples', 's.status');
        $orderColumns = array("sl.scheme_name", "shipment_code", 'distribution_code', 'distribution_date', 'number_of_samples', 's.status');


        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "shipment_id";


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
                    $sOrder .= $orderColumns[intval($parameters['iSortCol_' . $i])] . "
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
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search ) . "%' OR ";
                    } else {
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search ) . "%' ";
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

        $sQuery = $db->select()->from(array('s' => 'shipment'))
                ->join(array('d' => 'distributions'), 'd.distribution_id = s.distribution_id', array('distribution_code', 'distribution_date', 'readiness_checklist_survey_id'))
                ->joinLeft(array('rcs' => 'readiness_checklist_surveys'), 'd.readiness_checklist_survey_id = rcs.id')
                ->joinLeft(array('rcp' => 'readiness_checklist_participants'), 'rcs.id = rcp.readiness_checklist_survey_id && rcp.status = 2', array('total_participants' => new Zend_Db_Expr('count(participant_id)')))
                ->join(array('sl' => 'schemes'), 'sl.scheme_id=s.scheme_type', array('SCHEME' => 'sl.scheme_name'))
                ->group('s.shipment_id');

        if (isset($parameters['scheme']) && $parameters['scheme'] != "") {
            $sQuery = $sQuery->where("s.scheme_type = ?", $parameters['scheme']);
        }

        if (isset($parameters['distribution']) && $parameters['distribution'] != "" && $parameters['distribution'] != 0) {
            $sQuery = $sQuery->where("s.distribution_id = ?", $parameters['distribution']);
        }

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

        $rResult = $db->fetchAll($sQuery);

        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $db->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */
        $sQuery = $db->select()->from('shipment', new Zend_Db_Expr("COUNT('shipment_id')"));
        $aResultTotal = $db->fetchCol($sQuery);
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
            if ($aRow['status'] == 'ready') {
                $btn = "btn-success";
            } else if ($aRow['status'] == 'pending') {
                $btn = "btn-warning";
            } else {
                $btn = "btn-primary";
            }

            if ($aRow['status'] != 'finalized' && $aRow['status'] != 'ready' && $aRow['status'] != 'pending') {
                $responseSwitch = "<select onchange='responseSwitch(this.value," . $aRow['shipment_id'] . ")'>";
                $responseSwitch .= "<option value='on'" . (isset($aRow['response_switch']) && $aRow['response_switch'] == "on" ? " selected='selected' " : "") . ">On</option>";
                $responseSwitch .= "<option value='off'" . (isset($aRow['response_switch']) && $aRow['response_switch'] == "off" ? " selected='selected' " : "") . ">Off</option>";
                $responseSwitch .= "</select>";
            } else {
                $responseSwitch = '-';
            }

            $row[] = $aRow['shipment_code'];
            $row[] = $aRow['SCHEME'];
            $row[] = '<a href="/admin/distributions/edit/d8s5_8d/' . base64_encode($aRow['distribution_id']) . '">' . $aRow['distribution_code'] . '</a>';
            $row[] = Pt_Commons_General::humanDateFormat($aRow['distribution_date']);
            $row[] = Pt_Commons_General::humanDateFormat($aRow['lastdate_response']);
            $row[] = $aRow['number_of_samples'];
            $row[] = "<a href='/admin/readiness-checklist/participants/id/" . ($aRow['readiness_checklist_survey_id']) . "'>" . $aRow['total_participants'] . "</a>";
            $row[] = $responseSwitch;
            $row[] = ucfirst($aRow['status']);
            $edit = '';
            $enrolled = '';
            $delete = '';
            $announcementMail = '';
            $manageEnroll = '';

            if ($aRow['status'] != 'finalized') {
                $edit = '&nbsp;<a class="btn btn-primary btn-xs" href="/admin/shipment/edit/sid/' . base64_encode($aRow['shipment_id']) . '"><span><i class="icon-edit"></i> Edit</span></a>';
                $delete = '&nbsp;<a class="btn btn-danger btn-xs" href="javascript:void(0);" onclick="removeShipment(\'' . base64_encode($aRow['shipment_id']) . '\')"><span><i class="icon-remove"></i> Delete</span></a>';
            } else {
                $edit = '&nbsp;<a class="btn btn-danger btn-xs disabled" href="javascript:void(0);"><span><i class="icon-check"></i> Finalized</span></a>';
            }

            if  ($aRow['status'] == 'ready') {
                $enrolled = '&nbsp;<a class="btn btn-primary btn-xs disabled" href="javascript:void(0);"><span><i class="icon-ambulance"></i> Shipped</span></a>';
                $announcementMail = '&nbsp;<a class="btn btn-warning btn-xs" href="javascript:void(0);" onclick="mailShipment(\'' . base64_encode($aRow['shipment_id']) . '\')"><span><i class="icon-bullhorn"></i> New Shipment Mail</span></a>';
            }
            if ($aRow['status'] == 'shipped' || $aRow['status'] == 'evaluated') {
                $manageEnroll = '&nbsp;<a class="btn btn-info btn-xs" href="/admin/shipment/manage-enroll/sid/' . base64_encode($aRow['shipment_id']) . '/sctype/' . base64_encode($aRow['scheme_type']) . '"><span><i class="icon-gear"></i> Enrollment </span></a>';
            }

            $row[] = $edit . $enrolled . $delete . $announcementMail . $manageEnroll ;
            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function updateEidResults($params) {
        if (!$this->isShipmentEditable($params['shipmentId'], $params['participantId'])) {
            return false;
        }

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $db->beginTransaction();
        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');

            if (!isset($params['modeOfReceipt']) || trim($params['modeOfReceipt']) == "") {
                $params['modeOfReceipt'] = NULL;
            }

            $attributes = array(
                "extraction_assay" => $params['extractionAssay'],
                "detection_assay" => $params['detectionAssay'],
                "extraction_assay_expiry_date" => Pt_Commons_General::dateFormat($params['assayExpirationDate']),
                "detection_assay_expiry_date" => Pt_Commons_General::dateFormat($params['assayExpirationDate']),
                "extraction_assay_lot_no" => $params['assayLotNumber'],
                "detection_assay_lot_no" => $params['assayLotNumber'],
                "uploaded_file" => $params['uploadedFilePath']);

            $attributes = json_encode($attributes);

            $data = array(
                "shipment_receipt_date" => Pt_Commons_General::dateFormat($params['receiptDate']),
                "shipment_test_date" => Pt_Commons_General::dateFormat($params['testDate']),
                "attributes" => $attributes,
                "supervisor_approval" => $params['supervisorApproval'],
                "participant_supervisor" => $params['participantSupervisor'],
                "user_comment" => $params['userComments'],
                "mode_id" => $params['modeOfReceipt'],
                "updated_by_user" => $authNameSpace->dm_id,
                "updated_on_user" => new Zend_Db_Expr('now()')
            );

            if (isset($params['testReceiptDate']) && trim($params['testReceiptDate']) != '') {
                $data['shipment_test_report_date'] = Pt_Commons_General::dateFormat($params['testReceiptDate']);
            } else {
                $data['shipment_test_report_date'] = new Zend_Db_Expr('now()');
            }

            if (isset($authNameSpace->qc_access) && $authNameSpace->qc_access == 'yes') {
                $data['qc_done'] = $params['qcDone'];
                if (isset($data['qc_done']) && trim($data['qc_done']) == "yes") {
                    $data['qc_date'] = Pt_Commons_General::dateFormat($params['qcDate']);
                    $data['qc_done_by'] = trim($params['qcDoneBy']);
                    $data['qc_created_on'] = new Zend_Db_Expr('now()');
                } else {
                    $data['qc_date'] = NULL;
                    $data['qc_done_by'] = NULL;
                    $data['qc_created_on'] = NULL;
                }
            }
            
            if(isset($params['sample_conditions'])){
                 $data['sample_conditions']=$params['sample_conditions'];
            }
            
            $noOfRowsAffected = $shipmentParticipantDb->updateShipment($data, $params['smid'], $params['hdLastDate']);

            $eidResponseDb = new Application_Model_DbTable_ResponseEid();
            $eidResponseDb->updateResults($params);
            $db->commit();
        } catch (Exception $e) {
            // If any of the queries failed and threw an exception,
            // we want to roll back the whole transaction, reversing
            // changes made in the transaction, even those that succeeded.
            // Thus all changes are committed together, or none are.
            $db->rollBack();
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
        }
    }

    public function updateDtsResults($params) {
        if (!$this->isShipmentEditable($params['shipmentId'], $params['participantId'])) {
            return false;
        }
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $db->beginTransaction();
        try {

            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            $attributes["sample_rehydration_date"] = Pt_Commons_General::dateFormat($params['sampleRehydrationDate']);
            $attributes["algorithm"] = $params['algorithm'];
            $attributes = json_encode($attributes);


            $data = array(
                "shipment_receipt_date" => Pt_Commons_General::dateFormat($params['receiptDate']),
                "shipment_test_date" => Pt_Commons_General::dateFormat($params['testDate']),
                //"shipment_test_report_date" => new Zend_Db_Expr('now()'),
                "attributes" => $attributes,
                "supervisor_approval" => $params['supervisorApproval'],
                "participant_supervisor" => $params['participantSupervisor'],
                "user_comment" => $params['userComments'],
                "updated_by_user" => $authNameSpace->dm_id,
                "mode_id" => $params['modeOfReceipt'],
                "updated_on_user" => new Zend_Db_Expr('now()')
            );

            if (isset($params['testReceiptDate']) && trim($params['testReceiptDate']) != '') {
                $data['shipment_test_report_date'] = Pt_Commons_General::dateFormat($params['testReceiptDate']);
            } else {
                $data['shipment_test_report_date'] = new Zend_Db_Expr('now()');
            }

            if (isset($authNameSpace->qc_access) && $authNameSpace->qc_access == 'yes') {
                $data['qc_done'] = $params['qcDone'];
                if (isset($data['qc_done']) && trim($data['qc_done']) == "yes") {
                    $data['qc_date'] = Pt_Commons_General::dateFormat($params['qcDate']);
                    $data['qc_done_by'] = trim($params['qcDoneBy']);
                    $data['qc_created_on'] = new Zend_Db_Expr('now()');
                } else {
                    $data['qc_date'] = NULL;
                    $data['qc_done_by'] = NULL;
                    $data['qc_created_on'] = NULL;
                }
            }
            if (isset($params['customField1']) && trim($params['customField1']) != "") {
                $data['custom_field_1'] = $params['customField1'];
            }

            if (isset($params['customField2']) && trim($params['customField2']) != "") {
                $data['custom_field_2'] = $params['customField2'];
            }

            $noOfRowsAffected = $shipmentParticipantDb->updateShipment($data, $params['smid'], $params['hdLastDate']);

            $dtsResponseDb = new Application_Model_DbTable_ResponseDts();
            $dtsResponseDb->updateResults($params);
            $db->commit();
        } catch (Exception $e) {
            // If any of the queries failed and threw an exception,
            // we want to roll back the whole transaction, reversing
            // changes made in the transaction, even those that succeeded.
            // Thus all changes are committed together, or none are.
            $db->rollBack();
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
        }
    }

    public function removeDtsResults($mapId) {
        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            $data = array(
                "shipment_receipt_date" => '',
                "shipment_test_date" => '',
                "attributes" => '',
                "shipment_test_report_date" => '',
                "supervisor_approval" => '',
                "participant_supervisor" => '',
                "user_comment" => '',
                "final_result" => '',
                "updated_on_user" => new Zend_Db_Expr('now()'),
                "updated_by_user" => $authNameSpace->dm_id,
                "qc_date" => '',
                "qc_done_by" => '',
                "qc_created_on" => '',
                "mode_id" => ''
            );
            $noOfRowsAffected = $shipmentParticipantDb->removeShipmentMapDetails($data, $mapId);

            $dtsResponseDb = new Application_Model_DbTable_ResponseDts();
            $dtsResponseDb->removeShipmentResults($mapId);
        } catch (Exception $e) {
            return($e->getMessage());
            return "Unable to delete. Please try again later or contact system admin for help";
        }
    }

    public function removeDtsEidResults($mapId) {
        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            $data = array(
                "shipment_receipt_date" => '',
                "shipment_test_date" => '',
                "attributes" => '',
                "shipment_test_report_date" => '',
                "supervisor_approval" => '',
                "participant_supervisor" => '',
                "user_comment" => '',
                "final_result" => '',
                "updated_on_user" => new Zend_Db_Expr('now()'),
                "updated_by_user" => $authNameSpace->dm_id,
                "qc_date" => '',
                "qc_done_by" => '',
                "qc_created_on" => '',
                "mode_id" => ''
            );
            $noOfRowsAffected = $shipmentParticipantDb->removeShipmentMapDetails($data, $mapId);

            $responseDb = new Application_Model_DbTable_ResponseEid();
            $responseDb->delete("shipment_map_id=$mapId");
        } catch (Exception $e) {
            return($e->getMessage());
            return "Unable to delete. Please try again later or contact system admin for help";
        }
    }

    public function removeDtsVlResults($mapId) {
        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            $data = array(
                "shipment_receipt_date" => '',
                "shipment_test_date" => '',
                "attributes" => '',
                "shipment_test_report_date" => '',
                "supervisor_approval" => '',
                "participant_supervisor" => '',
                "user_comment" => '',
                "final_result" => '',
                "updated_on_user" => new Zend_Db_Expr('now()'),
                "updated_by_user" => $authNameSpace->dm_id,
                "qc_date" => '',
                "qc_done_by" => '',
                "qc_created_on" => '',
                "mode_id" => ''
            );
            $noOfRowsAffected = $shipmentParticipantDb->removeShipmentMapDetails($data, $mapId);

            $responseDb = new Application_Model_DbTable_ResponseVl();
            $responseDb->delete("shipment_map_id=$mapId");
        } catch (Exception $e) {
            return($e->getMessage());
            return "Unable to delete. Please try again later or contact system admin for help";
        }
    }

    public function updateDbsResults($params) {

        if (!$this->isShipmentEditable($params['shipmentId'], $params['participantId'])) {
            return false;
        }
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $db->beginTransaction();
        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            $attributes["sample_rehydration_date"] = Pt_Commons_General::dateFormat($params['sampleRehydrationDate']);
            $attributes = json_encode($attributes);
            $data = array(
                "shipment_receipt_date" => Pt_Commons_General::dateFormat($params['receiptDate']),
                "shipment_test_date" => Pt_Commons_General::dateFormat($params['testDate']),
                "attributes" => $attributes,
                //"shipment_test_report_date" => new Zend_Db_Expr('now()'),
                "supervisor_approval" => $params['supervisorApproval'],
                "participant_supervisor" => $params['participantSupervisor'],
                "user_comment" => $params['userComments'],
                "mode_id" => $params['modeOfReceipt'],
                "updated_by_user" => $authNameSpace->dm_id,
                "updated_on_user" => new Zend_Db_Expr('now()')
            );
            if (isset($params['testReceiptDate']) && trim($params['testReceiptDate']) != '') {
                $data['shipment_test_report_date'] = Pt_Commons_General::dateFormat($params['testReceiptDate']);
            } else {
                $data['shipment_test_report_date'] = new Zend_Db_Expr('now()');
            }

            if (isset($authNameSpace->qc_access) && $authNameSpace->qc_access == 'yes') {
                $data['qc_done'] = $params['qcDone'];
                if (isset($data['qc_done']) && trim($data['qc_done']) == "yes") {
                    $data['qc_date'] = Pt_Commons_General::dateFormat($params['qcDate']);
                    $data['qc_done_by'] = trim($params['qcDoneBy']);
                    $data['qc_created_on'] = new Zend_Db_Expr('now()');
                } else {
                    $data['qc_date'] = NULL;
                    $data['qc_done_by'] = NULL;
                    $data['qc_created_on'] = NULL;
                }
            }
            $noOfRowsAffected = $shipmentParticipantDb->updateShipment($data, $params['smid'], $params['hdLastDate']);

            $dbsResponseDb = new Application_Model_DbTable_ResponseDbs();
            $dbsResponseDb->updateResults($params);
            $db->commit();
        } catch (Exception $e) {
            // If any of the queries failed and threw an exception,
            // we want to roll back the whole transaction, reversing
            // changes made in the transaction, even those that succeeded.
            // Thus all changes are committed together, or none are.
            $db->rollBack();
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
        }
    }

    public function updateTbResults($params) {

        if (!$this->isShipmentEditable($params['shipmentId'], $params['participantId'])) {
            return false;
        }

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $db->beginTransaction();
        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            $attributes = array("sample_rehydration_date" => Pt_Commons_General::dateFormat($params['sampleRehydrationDate']),
                "mtb_rif_kit_lot_no" => $params['mtbRifKitLotNo'],
                "expiry_date" => $params['expiryDate']);
            $attributes = json_encode($attributes);
            $data = array(
                "shipment_receipt_date" => Pt_Commons_General::dateFormat($params['receiptDate']),
                "shipment_test_date" => Pt_Commons_General::dateFormat($params['testDate']),
                "attributes" => $attributes,
                //"shipment_test_report_date" => new Zend_Db_Expr('now()'),
                "supervisor_approval" => $params['supervisorApproval'],
                "participant_supervisor" => $params['participantSupervisor'],
                "user_comment" => $params['userComments'],
                "mode_id" => $params['modeOfReceipt'],
                "updated_by_user" => $authNameSpace->dm_id,
                "updated_on_user" => new Zend_Db_Expr('now()')
            );

            if (isset($params['testReceiptDate']) && trim($params['testReceiptDate']) != '') {
                $data['shipment_test_report_date'] = Pt_Commons_General::dateFormat($params['testReceiptDate']);
            } else {
                $data['shipment_test_report_date'] = new Zend_Db_Expr('now()');
            }

            if (isset($authNameSpace->qc_access) && $authNameSpace->qc_access == 'yes') {
                $data['qc_done'] = $params['qcDone'];
                if (isset($data['qc_done']) && trim($data['qc_done']) == "yes") {
                    $data['qc_date'] = Pt_Commons_General::dateFormat($params['qcDate']);
                    $data['qc_done_by'] = trim($params['qcDoneBy']);
                    $data['qc_created_on'] = new Zend_Db_Expr('now()');
                } else {
                    $data['qc_date'] = NULL;
                    $data['qc_done_by'] = NULL;
                    $data['qc_created_on'] = NULL;
                }
            }
            $noOfRowsAffected = $shipmentParticipantDb->updateShipment($data, $params['smid'], $params['hdLastDate']);

            $tbResponseDb = new Application_Model_DbTable_ResponseTb();
            $tbResponseDb->updateResults($params);
            $db->commit();
        } catch (Exception $e) {
            // If any of the queries failed and threw an exception,
            // we want to roll back the whole transaction, reversing
            // changes made in the transaction, even those that succeeded.
            // Thus all changes are committed together, or none are.
            $db->rollBack();
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
        }
    }

    public function updateVlResults($params) {

        if (!$this->isShipmentEditable($params['shipmentId'], $params['participantId'])) {
            return false;
        }
        $adminNameSpace = new Zend_Session_Namespace('administrators');

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $db->beginTransaction();

        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $authNameSpace = new Zend_Session_Namespace('datamanagers');
            if (isset($params['sampleRehydrationDate']) && trim($params['sampleRehydrationDate']) != "") {
                $params['sampleRehydrationDate'] = Pt_Commons_General::dateFormat($params['sampleRehydrationDate']);
            }
            if (isset($params['assayExpirationDate']) && trim($params['assayExpirationDate']) != "") {
                $params['assayExpirationDate'] = Pt_Commons_General::dateFormat($params['assayExpirationDate']);
            }
            $attributes = array("sample_rehydration_date" => $params['sampleRehydrationDate'],
                "vl_assay" => $params['vlAssay'],
                "assay_lot_number" => $params['assayLotNumber'],
                "assay_expiration_date" => $params['assayExpirationDate'],
                "specimen_volume" => $params['specimenVolume'],
                "uploaded_file" => $params['uploadedFilePath']
            );

            if (isset($params['otherAssay']) && $params['otherAssay'] != "") {
                $attributes['other_assay'] = $params['otherAssay'];
            }

            if (!isset($params['modeOfReceipt'])) {
                $params['modeOfReceipt'] = NULL;
            }

            $attributes = json_encode($attributes);
            
            $data = array(
                "shipment_receipt_date" => Pt_Commons_General::dateFormat($params['receiptDate']),
                "shipment_test_date" => Pt_Commons_General::dateFormat($params['testDate']),
                "attributes" => $attributes,
                "supervisor_approval" => $params['supervisorApproval'],
                "participant_supervisor" => $params['participantSupervisor'],
                "user_comment" => $params['userComments'],
                "updated_by_user" => isset($authNameSpace->dm_id)?$authNameSpace->dm_id:$adminNameSpace->admin_id,
                "mode_id" => $params['modeOfReceipt'],
                "updated_on_user" => new Zend_Db_Expr('now()')
            );

            if (isset($params['testReceiptDate']) && trim($params['testReceiptDate']) != '') {
                $data['shipment_test_report_date'] = Pt_Commons_General::dateFormat($params['testReceiptDate']);
            } else {
                $data['shipment_test_report_date'] = new Zend_Db_Expr('now()');
            }

            if (isset($params['isPtTestNotPerformed']) && $params['isPtTestNotPerformed'] == 'yes') {
                $data['is_pt_test_not_performed'] = 'yes';
                $data['vl_not_tested_reason'] = $params['vlNotTestedReason'];
                $data['pt_test_not_performed_comments'] = $params['ptNotTestedComments'];
                $data['pt_support_comments'] = $params['ptSupportComments'];
            } else {
                $data['is_pt_test_not_performed'] = NULL;
                $data['vl_not_tested_reason'] = NULL;
                $data['pt_test_not_performed_comments'] = NULL;
                $data['pt_support_comments'] = NULL;
            }

            if (isset($authNameSpace->qc_access) && $authNameSpace->qc_access == 'yes') {
                $data['qc_done'] = $params['qcDone'];
                if (isset($data['qc_done']) && trim($data['qc_done']) == "yes") {
                    $data['qc_date'] = Pt_Commons_General::dateFormat($params['qcDate']);
                    $data['qc_done_by'] = trim($params['qcDoneBy']);
                    $data['qc_created_on'] = new Zend_Db_Expr('now()');
                } else {
                    $data['qc_date'] = NULL;
                    $data['qc_done_by'] = NULL;
                    $data['qc_created_on'] = NULL;
                }
            }

            $noOfRowsAffected = $shipmentParticipantDb->updateShipment($data, $params['smid'], $params['hdLastDate']);

            $eidResponseDb = new Application_Model_DbTable_ResponseVl();
            $eidResponseDb->updateResults($params);
            $db->commit();
        } catch (Exception $e) {
            // If any of the queries failed and threw an exception,
            // we want to roll back the whole transaction, reversing
            // changes made in the transaction, even those that succeeded.
            // Thus all changes are committed together, or none are.
            $db->rollBack();
            error_log($e->getMessage());
        }
    }

    public function addShipment($params) {

        $scheme = $params['schemeId'];
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $db = new Application_Model_DbTable_Shipments();
        $distroService = new Application_Service_Distribution();
        $distro = $distroService->getDistribution($params['distribution']);

        $controlCount = 0;
        foreach ($params['control'] as $control) {
            if ($control == 1) {
                $controlCount += 1;
            }
        }

        $data = array(
            'shipment_code' => $params['shipmentCode'],
            'distribution_id' => $params['distribution'],
            'scheme_type' => $scheme,
            'shipment_date' => $distro['distribution_date'],
            'number_of_samples' => count($params['sampleName']) - $controlCount,
            'number_of_controls' => $controlCount,
            'lastdate_response' => Pt_Commons_General::dateFormat($params['lastDate']),
            'created_on_admin' => new Zend_Db_Expr('now()'),
            'created_by_admin' => $authNameSpace->primary_email,
            'testingInstructions' => $params['testingInstructions']
        );
        $lastId = $db->insert($data);

        $dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $size = count($params['sampleName']);
        if ($params['schemeId'] == 'eid') {
            for ($i = 0; $i < $size; $i++) {
                $dbAdapter->insert('reference_result_eid', array(
                    'shipment_id' => $lastId,
                    'sample_id' => ($i + 1),
                    'sample_label' => $params['sampleName'][$i],
                    'reference_result' => $params['eidResult'][$i],
                    'control' => $params['control'][$i],
                    'mandatory' => $params['mandatory'][$i],
                    'sample_score' => 1
                        )
                );
            }
        } else if ($params['schemeId'] == 'vl') {
            for ($i = 0; $i < $size; $i++) {
                $dbAdapter->insert('reference_result_vl', array(
                    'shipment_id' => $lastId,
                    'sample_id' => ($i + 1),
                    'sample_label' => $params['sampleName'][$i],
                    'reference_result' => $params['vlResult'][$i],
                    'control' => $params['control'][$i],
                    'mandatory' => $params['mandatory'][$i],
                    'sample_score' => 1
                        )
                );
            }
        }

        $distroService->updateDistributionStatus($params['distribution'], 'pending');
    }

    public function getShipment($sid) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        $row = $shipmentDb->fetchRow('shipment_id=' . $sid);
        return $row;
    }

    public function shipItNow($params) {
        $db = new Application_Model_DbTable_ShipmentParticipantMap();
        error_log("shipItNow: 999");
        error_log(json_encode($params));
        return $db->shipItNow($params);
    }

    public function removeShipment($sid) {
        try {

            $shipmentDb = new Application_Model_DbTable_Shipments();
            $row = $shipmentDb->fetchRow('shipment_id=' . $sid);
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();

            $db->beginTransaction();
            if ($row['scheme_type'] == 'vl') {
                $db->delete("reference_result_vl", 'shipment_id=' . $sid);
            } else if ($row['scheme_type'] == 'eid') {
                $db->delete("reference_result_eid", 'shipment_id=' . $sid);
            }

            $shipmentParticipantMap = new Application_Model_DbTable_ShipmentParticipantMap();
            $shipmentParticipantMap->delete('shipment_id=' . $sid);

            $shipmentDb->delete('shipment_id=' . $sid);

            $returnMessage = "Shipment deleted.";

            $db->commit();
        } catch (Exception $e) {
            $returnMessage = ($e->getMessage());
            $returnMessage .= "\nUnable to delete. Please try again later or contact system admin for help";
            $db->rollBack();
        }
        return $returnMessage;
    }

    public function isShipmentEditable($shipmentId = NULL, $participantId = NULL) {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        if ($authNameSpace->view_only_access == 'yes') {
            return false;
        }

        $spMap = new Application_Model_DbTable_ShipmentParticipantMap();
        return $spMap->isShipmentEditable($shipmentId, $participantId);
    }

    public function checkParticipantAccess($participantId) {
        $participantDb = new Application_Model_DbTable_Participants();
        return $participantDb->checkParticipantAccess($participantId);
    }
    public function sendEnrollingEmail(){
           $shipmentDb = new Application_Model_DbTable_ShipmentParticipantMap();
        return $shipmentDb->sendEnrollingEmail();
    }

    public function getShipmentForEdit($sid) {

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $shipment = $db->fetchRow($db->select()->from(array('s' => 'shipment'))
                        ->join(array('d' => 'distributions'), 'd.distribution_id = s.distribution_id', array('distribution_code', 'distribution_date', 'distribution_status' => 'status'))
                        ->where("s.shipment_id = ?", $sid));


        $possibleResults = "";

        $returnArray = array();

        if ($shipment['scheme_type'] == 'eid') {
            $reference = $db->fetchAll($db->select()->from(array('s' => 'shipment'))
                            ->join(array('ref' => 'reference_result_eid'), 'ref.shipment_id=s.shipment_id')
                            ->where("s.shipment_id = ?", $sid));
            $schemeService = new Application_Service_Schemes();
            $possibleResults = $schemeService->getPossibleResults('eid');
        } else if ($shipment['scheme_type'] == 'vl') {
            $reference = $db->fetchAll($db->select()->from(array('s' => 'shipment'))
                            ->join(array('ref' => 'reference_result_vl'), 'ref.shipment_id=s.shipment_id')
                            ->where("s.shipment_id = ?", $sid));
            $possibleResults = "";

        } else {
            return false;
        }

        $returnArray['shipment'] = $shipment;
        $returnArray['reference'] = $reference;
        $returnArray['possibleResults'] = $possibleResults;

        return $returnArray;
    }

    public function updateShipment($params) {

        $dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $shipmentRow = $dbAdapter->fetchRow(
            $dbAdapter->select()->from(array('s' => 'shipment'))->where('shipment_id = ' . $params['shipmentId']));

        $scheme = $shipmentRow['scheme_type'];

        $size = count($params['sampleName']);


        $controlCount = 0;
        foreach ($params['control'] as $control) {
            if ($control == 1) {
                $controlCount += 1;
            }
        }

        $dbAdapter->beginTransaction();
                
        try {
            if ($scheme == 'eid') {
                $dbAdapter->delete('reference_result_eid', 'shipment_id = ' . $params['shipmentId']);
                for ($i = 0; $i < $size; $i++) {
                    $dbAdapter->insert('reference_result_eid', array(
                        'shipment_id' => $params['shipmentId'],
                        'sample_id' => ($i + 1),
                        'sample_label' => $params['sampleName'][$i],
                        'reference_result' => $params['eidResult'][$i],
                        'control' => $params['control'][$i],
                        'mandatory' => $params['mandatory'][$i],
                        'sample_score' => 1
                            )
                    );
                }
            } else if ($scheme == 'vl') {

                $dbAdapter->delete('reference_result_vl', 'shipment_id = ' . $params['shipmentId']);
                for ($i = 0; $i < $size; $i++) {
                    $dbAdapter->insert('reference_result_vl', array(
                        'shipment_id' => $params['shipmentId'],
                        'sample_id' => ($i + 1),
                        'sample_label' => $params['sampleName'][$i],
                        'reference_result' => $params['vlResult'][$i],
                        'control' => $params['control'][$i],
                        'mandatory' => $params['mandatory'][$i],
                        'sample_score' => 1
                            )
                    );

                }
            }

            $dbAdapter->update('shipment', array('number_of_samples' => $size - $controlCount,
                'number_of_controls' => $controlCount,
                'shipment_code' => $params['shipmentCode'],
                'testingInstructions' => $params['testingInstructions'],
                'lastdate_response' => Pt_Commons_General::dateFormat($params['lastDate'])), 'shipment_id = ' . $params['shipmentId']);

            $dbAdapter->commit();

        } catch (Exception $e) {
            error_log($e->getMessage());
            $dbAdapter->rollBack();
        }
    }

    public function getShipmentOverview($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getShipmentOverviewDetails($parameters);
    }

    public function getShipmentCurrent($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getShipmentCurrentDetails($parameters);
    }

    public function getShipmentDefault($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getShipmentDefaultDetails($parameters);
    }

    public function getShipmentAll($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getShipmentAllDetails($parameters);
    }

    public function getindividualReport($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getindividualReportDetails($parameters);
    }

    public function getSummaryReport($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getSummaryReportDetails($parameters);
    }

    public function getShipmentInReports($distributionId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('s' => 'shipment', array('shipment_id', 'shipment_code', 'status', 'number_of_samples')))
                ->join(array('d' => 'distributions'), 'd.distribution_id=s.distribution_id', array('distribution_code', 'distribution_date'))
                ->join(array('sp' => 'shipment_participant_map'), 'sp.shipment_id=s.shipment_id', array('report_generated', 'participant_count' => new Zend_Db_Expr('count("participant_id")'), 'reported_count' => new Zend_Db_Expr("SUM(shipment_test_date <> '0000-00-00')"), 'number_passed' => new Zend_Db_Expr("SUM(final_result = 1)")))
                ->join(array('sl' => 'scheme_list'), 'sl.scheme_id=s.scheme_type', array('scheme_name'))
                ->joinLeft(array('rr' => 'r_results'), 'sp.final_result=rr.result_id')
                ->where("s.distribution_id = ?", $distributionId)
                ->group('s.shipment_id');



        return $db->fetchAll($sql);
    }

    public function getParticipantCountBasedOnScheme() {
        $resultArray = array();
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $sQuery = $db->select()->from(array('s' => 'shipment'), array())
                ->join(array('sp' => 'shipment_participant_map'), 'sp.shipment_id=s.shipment_id', array('participantCount' => new Zend_Db_Expr("count(sp.participant_id)")))
                ->join(array('sl' => 'scheme_list'), 'sl.scheme_id=s.scheme_type', array('SCHEME' => 'sl.scheme_id'))
                ->where("s.scheme_type = sl.scheme_id")
                ->where("s.status!='pending'")
                ->group('s.scheme_type')
                ->order("sl.scheme_id");
        $resultArray = $db->fetchAll($sQuery);

        return $resultArray;
    }

    public function getParticipantCountBasedOnShipment() {
        $resultArray = array();
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();

        $sQuery = $db->select()->from(array('s' => 'shipment'), array('s.shipment_code', 's.scheme_type', 's.lastdate_response'))
                ->join(array('sp' => 'shipment_participant_map'), 'sp.shipment_id=s.shipment_id', array('participantCount' => new Zend_Db_Expr("count(sp.participant_id)"), 'receivedCount' => new Zend_Db_Expr("SUM(sp.shipment_test_date <> '0000-00-00')")))
                ->where("s.status='shipped'")
                ->where("s.shipment_date > DATE_SUB(now(), INTERVAL 24 MONTH)")
                ->group('s.shipment_id')
                ->order("s.shipment_id");
        $resultArray = $db->fetchAll($sQuery);
        return $resultArray;
    }

    public function removeShipmentParticipant($mapId) {

        try {
            error_log($mapId);
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            return $db->delete('shipment_participant_map', "map_id = " . $mapId);
        } catch (Exception $e) {
            return($e->getMessage());
            return "Unable to delete. Please try again later or contact system admin for help";
        }
    }

    public function addEnrollements($params) {
        $db = new Application_Model_DbTable_ShipmentParticipantMap();
        return $db->addEnrollementDetails($params);
    }

    public function getShipmentCode($sid) {
        $code = '';
        $month = date("m");
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sQuery = $db->select()->from('shipment')->where("scheme_type = ?", $sid)->where("MONTH(DATE(created_on_admin))= ?", $month);
        $resultArray = $db->fetchAll($sQuery);
        $year = date("y");
        $count = count($resultArray) + 1;
        if ($sid == 'dts') {
            $code = 'DTS' . $month . $year . '-' . $count;
        } else if ($sid == 'vl') {
            $code = 'VL' . $month . $year . '-' . $count;
        } else if ($sid == 'eid') {
            $code = 'EID' . $month . $year . '-' . $count;
        } else if ($sid == 'dbs') {
            $code = 'DBS' . $month . $year . '-' . $count;
        }
        return $this->checkShipmentCode($month, $year, $count, $sid);
    }

    public function checkShipmentCode($month, $year, $count, $sid) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $code = '';
        if ($sid == 'dts') {
            $code = 'DTS' . $month . $year . '-' . $count;
        } else if ($sid == 'vl') {
            $code = 'VL' . $month . $year . '-' . $count;
        } else if ($sid == 'eid') {
            $code = 'EID' . $month . $year . '-' . $count;
        } else if ($sid == 'dbs') {
            $code = 'DBS' . $month . $year . '-' . $count;
        }
        $sQuery = $db->select()->from('shipment')->where("shipment_code = ?", $code);
        $resultArray = $db->fetchAll($sQuery);
        if (count($resultArray) > 0) {
            $count++;
            if ($sid == 'dts') {
                $code = 'DTS' . $month . $year . '-' . $count;
            } else if ($sid == 'vl') {
                $code = 'VL' . $month . $year . '-' . $count;
            } else if ($sid == 'eid') {
                $code = 'EID' . $month . $year . '-' . $count;
            } else if ($sid == 'dbs') {
                $code = 'DBS' . $month . $year . '-' . $count;
            } else {
                $code = '';
            }
            $this->checkShipmentCode($month, $year, $count, $sid);
        }
        return $code;
    }

    public function getShipmentReport($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getShipmentReportDetails($parameters);
    }

    public function getShipmentParticipants($sid) {
        $commonServices = new Application_Service_Common();
        $general = new Pt_Commons_General();
        $newShipmentMailContent = $commonServices->getEmailTemplate('new_shipment');
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $return = 0;
        $sQuery = $db->select()->from(array('sp' => 'shipment_participant_map'), array('sp.participant_id', 'sp.map_id', 'sp.new_shipment_mail_count'))
                ->join(array('s' => 'shipment'), 's.shipment_id=sp.shipment_id', array('s.shipment_code', 's.shipment_code'))
                ->join(array('d' => 'distributions'), 'd.distribution_id = s.distribution_id', array('distribution_code', 'distribution_date'))
                ->join(array('p' => 'participant'), 'p.participant_id=sp.participant_id', array('p.email', 'participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT p.first_name,\" \",p.last_name ORDER BY p.first_name SEPARATOR ', ')")))
                ->join(array('sl' => 'scheme_list'), 'sl.scheme_id=s.scheme_type', array('SCHEME' => 'sl.scheme_name'))
                ->where("sp.map_id = ?", $sid)
                ->group("p.participant_id");

        $participantEmails = $db->fetchAll($sQuery);

        foreach ($participantEmails as $participantDetails) {
            if ($participantDetails['email'] != '') {
                $surveyDate = $general->humanDateFormat($participantDetails['distribution_date']);
                $search = array('##NAME##', '##SHIPCODE##', '##SHIPTYPE##', '##SURVEYCODE##', '##SURVEYDATE##',);
                $replace = array($participantDetails['participantName'], $participantDetails['shipment_code'], $participantDetails['SCHEME'], $participantDetails['distribution_code'], $surveyDate);
                $content = $newShipmentMailContent['mail_content'];
                $message = str_replace($search, $replace, $content);
                $subject = $newShipmentMailContent['mail_subject'];
                $message = $message;
                $fromEmail = $newShipmentMailContent['mail_from'];
                $fromFullName = $newShipmentMailContent['from_name'];
                $toEmail = $participantDetails['email'];
                $cc = $newShipmentMailContent['mail_cc'];
                $bcc = $newShipmentMailContent['mail_bcc'];
                $commonServices->insertTempMail($toEmail, $cc, $bcc, $subject, $message, $fromEmail, $fromFullName);
                $count = $participantDetails['new_shipment_mail_count'] + 1;
                $return = $db->update('shipment_participant_map', array('last_new_shipment_mailed_on' => new Zend_Db_Expr('now()'), 'new_shipment_mail_count' => $count), 'map_id = ' . $participantDetails['map_id']);
            }
        }
        return $return;
    }

    public function getShipmentNotParticipated($sid) {

        $commonServices = new Application_Service_Common();
        $general = new Pt_Commons_General();
        $notParticipatedMailContent = $commonServices->getEmailTemplate('not_participated');
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $return = 0;
        $sQuery = $db->select()->from(array('sp' => 'shipment_participant_map'), array('sp.participant_id', 'sp.map_id', 'sp.last_not_participated_mail_count', 'sp.final_result'))
                ->joinLeft(array('s' => 'shipment'), 's.shipment_id=sp.shipment_id', array('s.shipment_code', 's.shipment_code'))
                ->joinLeft(array('d' => 'distributions'), 'd.distribution_id = s.distribution_id', array('distribution_code', 'distribution_date'))
                ->joinLeft(array('p' => 'participant'), 'p.participant_id=sp.participant_id', array('p.email', 'participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT p.first_name,\" \",p.last_name ORDER BY p.first_name SEPARATOR ', ')")))
                ->joinLeft(array('sl' => 'scheme_list'), 'sl.scheme_id=s.scheme_type', array('SCHEME' => 'sl.scheme_name'))
                ->where("(sp.shipment_test_date = '0000-00-00' OR sp.shipment_test_date IS NULL)")
                ->where("sp.shipment_id = ?", $sid)
                ->group("sp.participant_id");

        $participantEmails = $db->fetchAll($sQuery);

        foreach ($participantEmails as $participantDetails) {
            if ($participantDetails['email'] != '') {
                $surveyDate = $general->humanDateFormat($participantDetails['distribution_date']);
                $search = array('##NAME##', '##SHIPCODE##', '##SHIPTYPE##', '##SURVEYCODE##', '##SURVEYDATE##',);
                $replace = array($participantDetails['participantName'], $participantDetails['shipment_code'], $participantDetails['SCHEME'], $participantDetails['distribution_code'], $surveyDate);
                $content = $notParticipatedMailContent['mail_content'];
                $message = str_replace($search, $replace, $content);
                $subject = $notParticipatedMailContent['mail_subject'];
                $message = $message;
                $fromEmail = $notParticipatedMailContent['mail_from'];
                $fromFullName = $notParticipatedMailContent['from_name'];
                $toEmail = $participantDetails['email'];
                $cc = $notParticipatedMailContent['mail_cc'];
                $bcc = $notParticipatedMailContent['mail_bcc'];
                $commonServices->insertTempMail($toEmail, $cc, $bcc, $subject, $message, $fromEmail, $fromFullName);
                $count = $participantDetails['last_not_participated_mail_count'] + 1;
                $return = $db->update('shipment_participant_map', array('last_not_participated_mailed_on' => new Zend_Db_Expr('now()'), 'last_not_participated_mail_count' => $count), 'map_id = ' . $participantDetails['map_id']);
            }
        }
        return $return;
    }

    public function enrollShipmentParticipant($shipmentId, $participantId) {
        $db = new Application_Model_DbTable_ShipmentParticipantMap();
        return $db->enrollShipmentParticipant($shipmentId, $participantId);
    }

    public function getShipmentRowData($shipmentId) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getShipmentRowInfo($shipmentId);
    }

    public function getAllShipmentForm($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->getAllShipmentFormDetails($parameters);
    }

    public function getAllFinalizedShipments($parameters) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->fecthAllFinalizedShipments($parameters);
    }

    public function responseSwitch($shipmentId, $switchStatus) {
        $shipmentDb = new Application_Model_DbTable_Shipments();
        return $shipmentDb->responseSwitch($shipmentId, $switchStatus);
    }

    public function getFinalizedShipmentInReports($distributionId) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('s' => 'shipment', array('shipment_id', 'shipment_code', 'status', 'number_of_samples')))
                ->join(array('d' => 'distributions'), 'd.distribution_id=s.distribution_id', array('distribution_code', 'distribution_date'))
                ->join(array('sp' => 'shipment_participant_map'), 'sp.shipment_id=s.shipment_id', array('participant_count' => new Zend_Db_Expr('count("participant_id")'), 'reported_count' => new Zend_Db_Expr("SUM(shipment_test_date <> '0000-00-00')"), 'number_passed' => new Zend_Db_Expr("SUM(final_result = 1)")))
                ->join(array('sl' => 'scheme_list'), 'sl.scheme_id=s.scheme_type', array('scheme_name'))
                ->joinLeft(array('rr' => 'r_results'), 'sp.final_result=rr.result_id')
                ->where("s.status='finalized'")
                ->where("s.distribution_id = ?", $distributionId)
                ->group('s.shipment_id');

        return $db->fetchAll($sql);
    }

    public function addQcDetails($params) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $db->beginTransaction();
        try {
            $shipmentParticipantDb = new Application_Model_DbTable_ShipmentParticipantMap();
            $noOfRowsAffected = $shipmentParticipantDb->addQcInfo($params);
            if ($noOfRowsAffected > 0) {
                $db->commit();
                return $noOfRowsAffected;
            }
        } catch (Exception $e) {
            $db->rollBack();
            error_log($e->getMessage());
            error_log($e->getTraceAsString());
        }
    }

}
