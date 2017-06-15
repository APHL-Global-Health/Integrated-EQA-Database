<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 1/13/2017
 * Time: 16:40
 */
require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
        . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'Bacteriology' . DIRECTORY_SEPARATOR . 'application'
        . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'main.php';

class BacteriologydbciController extends Zend_Controller_Action {

    protected $homeDir;
    protected $dbConnection;

    public function init() {

        $this->homeDir = dirname($_SERVER['DOCUMENT_ROOT']);
        $this->dbConnection = new Main();
    }

    public function returnTotalCount($tableName, $id, $column) {

        try {
            $where[$column] = $id;
            return $this->dbConnection->selectCount($tableName, $where);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function returnJson($dataArray) {
        if (sizeof($dataArray) > 0) {
            return json_encode($dataArray);
        } else {
            return (json_encode(array('status' => 0)));
        }
    }

    public function savesamplestopanelAction() {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array) (json_decode($jsPostData));
            $idArray = $jsPostData['sampleIds'];
            $idArray = (array) $idArray;

            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {
                    //   $connection = new Main();
                    $value = ((array) $value);

                    $data['sampleId'] = $value['id'];
                    $data['totalAddedSamples'] = $value['quantity'];
                    $data['panelId'] = $jsPostData['panelId'];
                    $response = $this->dbConnection->insertData('tbl_bac_sample_to_panel', $data);
                }
                echo $this->returnJson($response);
            }
            exit();
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public function saveuserstosampleAction() {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array) (json_decode($jsPostData));
            $idArray = $jsPostData['userIds'];

            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {
                    //   $connection = new Main();
                    $data['userId'] = $value;
                    $data['sampleId'] = $jsPostData['sampleId'];
                    $data['panelToSampleId'] = $jsPostData['panelToSampleId'];
                    $data['roundId'] = $jsPostData['roundId'];
                    $data['participantId'] = $jsPostData['participantId'];
                    $response = $this->dbConnection->insertData('tbl_bac_samples_to_users', $data);
                    $whereUpdate['id'] = $jsPostData['panelToSampleId'];
                }
                if (isset($whereUpdate)) {
                    $updateData['issuedFlag'] = 1;
                    $this->dbConnection->updateTable('tbl_bac_sample_to_panel', $whereUpdate, $updateData);
                }

                echo $this->returnJson($response);
            }
            exit();
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public function createEmailBody($name, $message) {

        $html = "<div style='heigth:40px;width:100%;background-color:gray;color:White;text-align:left'>"
                . "<p style='margin-left : 10px;padding-top : 10px;padding-bottom : 10px;font-size:18px'><b>NPHL</b><br>"
                . "National Public Health Laboratories,<br>PT Testing</p></div>"
                . "<br><div style='font-size:16px;'><b>Dear " . $name . ",</b></div>";
        $html .= "<div style='font-size:14px;text-align:left;margin-top : 10px'>"
                . 'This is to notify you  ' . $message . '.';

        $html .= '<br><br>Regards,<br>National Public Health Laboratories.'
                . ''
                . '<hr>';

        $html .= "<hr>
            <div style='font-size:14px;text-align:left;padding-top : 10px;padding-bottom : 10px'>
            
           DISCLAIMER : This is a system generated mail, please do not reply.
            All the information contained in this e-mail message is strictly
            confidential and may be legally privileged. Such information is intended
            solely for the use of the designated recipient. Any disclosure, copying or
            distribution of all or part of the information contained herein to or by
            third parties is prohibited and may be unlawful. If you have received this
            e-mail message in error please delete it immediately and notify NPHL through e-mail to  <mailto:info@nphl.co.ke>
            mailto:info@nphl.co.ke
            <hr>
           </div>
            ";
        $html .= "<div style='heigth:70px;width:100%;background-color:#33ccff;color:white;text-align:center;padding-top : 10px;padding-bottom : 10px'>"
                . "<p style='color:white'>NPHL. | KNH, Upperhill, Nairobi.<br>


                    Office:  |<br>

                    email:   info@nphl.co.ke |web:   <http://www.nphl.co.ke/ > <i style='color:white'>www.nphl.co.ke</i>

                    

                   </p>"
                . "<p style='margin-left : 10px;margin-bottom : 3px;'>Copyright Reserved @ " . date('Y') . "</p></div>";


//        $body['body'] = $html;
//        $body['subject'] = $message['subject'];
        return $html;
    }

    public function generateMessage($message, $type) {
        $msg = '';
        if ($type == 0) {//successfully enrollement of lab
            $msg = "that your request to participant in the round <b>" . $message['roundCode'] .
                    "</b> has been successfully approved<br>You will receive an official start date";
            $subj = 'Successfully Enrollement Of Lab';
        }
        if ($type == 1) {//Official Start of Round
            $msg = "that the round <b>" . $message['roundCode'] . "</b> has started official on <b>" . $message['date'] . "</b>";
            $subj = 'Official Start of Round ' . $message['roundCode'];
        }
        if ($type == 2) {//Issuance of samples
            $msg = "that you have been issue with sample " . $message['batchName'] . " for round 
            <b>" . $message['roundCode'] . "</b> and submit results by <b>" . $message['date'] . "</b>";
            $subj = 'Issuance of samples ' . $message['batchName'];
        }
        if ($type == 3) {//success sending of samples
            $msg = "that  " . $message['shipmentName'] . " shipment has been dispatched to you lab ,courier is <b>" . $message['courier'] . "</b> on
            <b>" . $message['date'] . "</b> <br> Kindly confirm on receiving";
            $subj = 'Shipment Dispatch ' . $message['shipmentName'];
        }
        if ($type == 4) {//officia end of round
            $msg = "that the round <b>" . $message['roundCode'] . "</b> has ended official on <b>" . $message['date'] . "</b> no more submissions are allowed";
            $subj = 'Official end of round ' . $message['roundCode'];
        }

        $mess['message'] = $msg;
        $mess['subject'] = $subj;
        return $mess;
    }

    public function sendemailAction($body, $to = '', $send = '') {
        try {
            $config = array('ssl' => 'tls',
                'auth' => 'login',
                'username' => 'osoromichael@gmail.com',
                'password' => 'w@r10r@90');

            $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);


            $mail = new Zend_Mail();


            $message = isset($send) ? $body : $this->createEmailBody('Participant', $body['message']);
            $mail->setBodyHtml($message);
            $mail->setFrom('National Public Health Laboratories');
            if ($to != '') {
                $mail->addTo($to, '');
            } else {
                $mail->addTo('okarmikell@gmail.com', 'Okari Mikell');
            }
            $subject = isset($send) ? 'ROUND PUBLISHED RESULTS' : $body['subject'];
            $mail->setSubject($subject);
            if ($mail->send($transport)) {
//                echo 'Sent successfully';
            } else {
                echo 'unable to send email';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit();
    }

    public function savepaneltoshipmentAction() {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array) (json_decode($jsPostData));
            $idArray = $jsPostData['panelId'];

            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {

                    $data['panelId'] = $value;
                    $data['shipmentId'] = $jsPostData['shipmentId'];
                    $response = $this->dbConnection->insertData('tbl_bac_panels_shipments', $data);
                }
                echo $this->returnJson($response);
            }
            exit();
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public function saveEmailNotifications() {
        
    }

    public function sendEmailToEnrolledLabs($dtls) {
        try {
            $labDetails = $this->returnValueWhere($dtls['labId'], 'participant');
            $roundDetails = $this->returnValueWhere($dtls['roundId'], 'tbl_bac_rounds');

            $message['labName'] = $labDetails['first_name'];
            $message['roundCode'] = $roundDetails['roundCode'];
            $message['date'] = $roundDetails['startDate'];
            $emailMessage = $this->generateMessage($message, 0);

            $this->saveEmailNotifications($emailMessage, $labDetails['email']);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getenrolledroundsAction() {
        $whereLab = $this->returnUserLabDetails();
        $where['labId'] = $whereLab['participant_id'];
        $where['status'] = 2;
        $round = $this->dbConnection->selectFromTable('tbl_bac_ready_labs', $where);
        if ($round != false) {
            foreach ($round as $key => $value) {
                $roundInfo = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');
                $round[$key]->roundName = $roundInfo['roundName'];
                $round[$key]->roundCode = $roundInfo['roundCode'];
                $round[$key]->startDate = $roundInfo['startDate'];
                $round[$key]->endDate = $roundInfo['endDate'];
                $round[$key]->evaluated = $roundInfo['evaluated'];
                $round[$key]->evaluatedStatus = $roundInfo['evaluated'] == 0 ? 'Unevaluated' : 'Evaluated';
                $round[$key]->DaysLeft = $this->converttodays($round[$key]->endDate);
            }
            echo $this->returnJson(array('status' => 1, 'data' => $round));
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No Records Found'));
        }
        exit;
    }

    public function getroundwherelabAction() {

//        $whereRound['evaluated'] = 0;
        $whereLab = $this->returnUserLabDetails();

        $round = $this->dbConnection->selectFromTable('tbl_bac_rounds');
//        var_dump($whereLab);
        if ($round != false) {
            foreach ($round as $key => $value) {
                $where['labId'] = $whereLab['participant_id'];
                $where['roundId'] = $value->id;

                $readyLabs = $this->dbConnection->selectCount('tbl_bac_ready_labs', $where, 'labId');


                $round[$key]->enrolled = $readyLabs > 0 ? 1 : 0;
                $round[$key]->enrolledStatus = $readyLabs > 0 ? 'Enrolled for the round' : 'Not Enrolled';
                $round[$key]->evalauatedStatus = $round[$key]->evaluated == 0 ? 'Not Evaluated' : 'Evaluated';
                $round[$key]->daysLeft = $this->converttodays($round[$key]->endDate);
                $round[$key]->participantId = $whereLab['participant_id'];
            }
            echo $this->returnJson(array('data' => $round, 'status' => 1));
        }

        exit;
    }

    public function getroundperformanceperlabAction() {
        $whereLab = $this->returnUserLabDetails();
        $jsPostData = file_get_contents('php://input');

        $jsPostData = (array) (json_decode($jsPostData));
//        print_r($whereLab);
        if (isset($jsPostData['checkLab'])) {
            if ($jsPostData['checkLab'] == 1) {
                $wherePP['labId'] = $whereLab['participant_id'];
            }
        }

        $round = $this->dbConnection->selectFromTable('tbl_bac_rounds_labs');

        if ($round != false) {
            foreach ($round as $key => $value) {
//                $where['labId'] = $whereLab['participant_id'];
                $where['roundId'] = $value->roundId;

                $roundInfo = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');

                $round[$key]->totalMarks = $this->dbConnection->selectCount('tbl_bac_response_results', $where, 'finalScore', true);

                $roundId = $where['roundId'];
                $round[$key]->totalSamples = $this->dbConnection->doQuery("select count(distinct sampleID) as totalSamples from tbl_bac_sample_to_panel where roundId = $roundId  group by roundId", true);
                $round[$key]->averageScore = $roundInfo['evaluated'] == 0 ? 'N/A' : round($round[$key]->totalMarks / $round[$key]->totalSamples);
                $round[$key]->roundName = $roundInfo['roundName'];
                $round[$key]->roundCode = $roundInfo['roundCode'];
                $round[$key]->roundDateCreated = $roundInfo['dateCreated'];

                $grade = $this->getGradeRemark($round[$key]->averageScore);

                $round[$key]->averageGrade = $roundInfo['evaluated'] == 0 ? 'N/A' : $grade['grade'];
                $round[$key]->evaluated = $roundInfo['evaluated'] == 0 ? 'Un-Evaluated' : 'Evaluated';
            }
            echo $this->returnJson(array('data' => $round, 'status' => 1));
        }


        exit;
    }

    public function addSamplesToLab($jsPostData) {
        $where['participantId'] = $jsPostData['labId'];
        $where['roundId'] = $jsPostData['roundId'];

        $panels = $this->dbConnection->selectFromTable('tbl_bac_panels_shipments', $where);

        if (count($panels) > 0) {
            foreach ($panels as $key => $value) {

                $panel['panelId'] = $panels[$key]->panelId;
                $panel['shipmentId'] = $panels[$key]->shipmentId;
                $panel['participantId'] = null;
                $samples = $this->dbConnection->selectFromTable('tbl_bac_sample_to_panel', $panel);


                if (count($samples) > 0) {

                    foreach ($samples as $ky => $val) {
                        $panelSample = (array) $samples[$ky];
                        unset($panelSample['id']);
                        $shipment = $this->returnValueWhere($panel['shipmentId'], 'tbl_bac_shipments');
                        $panelSample['deliveryStatus'] = $shipment['shipmentStatus'];
                        $panelSample['panelId'] = $panel['panelId'];
                        $panelSample['participantId'] = $where['participantId'];
                        $panelSample['roundId'] = $where['roundId'];
                        $response = $this->dbConnection->insertData('tbl_bac_sample_to_panel', $panelSample);
                        var_dump($response);
                        exit;
                    }
                }
            }
        }
    }

    public function saveenrollinglabAction() {
        $jsPostData = file_get_contents('php://input');

        $jsPostData = (array) (json_decode($jsPostData));

        $response = $this->dbConnection->insertData('tbl_bac_ready_labs', $jsPostData);
        if ($response['status']) {
            $this->addSamplesToLab($jsPostData);
        }
        echo $this->returnJson($response);
        exit;
    }

    public function savelabstoroundAction() {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array) (json_decode($jsPostData));
            $idArray = $jsPostData['labId'];

            if (is_array($jsPostData)) {

                foreach ($idArray as $value) {

                    $data['labId'] = $value;

                    $data['roundId'] = $jsPostData['roundId'];
                    $response = $this->dbConnection->insertData('tbl_bac_rounds_labs', $data);
                    $this->sendEmailToEnrolledLabs($data);
                    $updateData['status'] = 2;
                    $this->dbConnection->updateTable('tbl_bac_ready_labs', $data, $updateData);

                    $this->savePanelForEachLab($data['roundId'], $data['labId']);
                }
                echo $this->returnJson(array('status' => 1));
            }
            exit();
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    public function savePanelForEachLab($round, $labId) {
        $where['roundId'] = $round;

        $dataDB = $this->dbConnection->selectFromTable('tbl_bac_shipments', $where);

        if ($dataDB != false) {
            foreach ($dataDB as $key => $value) {

                $whereShipmentId['shipmentId'] = $dataDB[$key]->id;
                $whereShipmentId['participantId'] = null;
                $panels = $this->dbConnection->selectFromTable('tbl_bac_panels_shipments', $whereShipmentId);
//                var_dump($dataDB);
//                exit;
                try {
                    if ($panels != false) {

                        foreach ($panels as $key => $panelValue) {
                            $deleteNullPanel['shipmentId'] = $whereShipmentId['shipmentId'];
                            $deleteNullPanel['panelId'] = $panels[$key]->panelId;
                            $insert['panelId'] = $panels[$key]->panelId;
                            $insert['shipmentId'] = $whereShipmentId['shipmentId'];
                            $insert['deliveryStatus'] = $panels[$key]->deliveryStatus;
                            $insert['participantId'] = $labId;
                            $insert['roundId'] = $round;
                            $insert['createdBy'] = $this->dbConnection->getUserSession();

                            $response = $this->dbConnection->insertData('tbl_bac_panels_shipments', $insert);
                            $insertSample = $this->savesampleforeachpanel($insert);
//                        if (!$insertSample) {
//                            exit;
//                        }
                            if (isset($deleteNullPanel)) {
                                $deleteNullPanel['panelId'] = null;
                                //$status = $this->dbConnection->deleteFromWhere('tbl_bac_panels_shipments', $deleteNullPanel);
                            }
                        }
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        } else {
            exit;
        }
    }

    public function savesampleforeachpanel($panelDtls) {

        try {


            if (is_array($panelDtls)) {
                $where['panelId'] = $panelDtls['panelId'];
                $where['shipmentId'] = $panelDtls['shipmentId'];
                $where['deliveryStatus'] = null;
                $where['participantId'] = null;


                $samplesWithPanels = $this->dbConnection->selectFromTable('tbl_bac_sample_to_panel', $where);

                if ($samplesWithPanels != false) {

                    foreach ($samplesWithPanels as $key => $value) {

                        $insert['panelId'] = $panelDtls['panelId'];
                        $insert['sampleId'] = $samplesWithPanels[$key]->sampleId;
                        $insert['shipmentId'] = $panelDtls['shipmentId'];
                        $insert['deliveryStatus'] = $samplesWithPanels[$key]->deliveryStatus;
                        $insert['participantId'] = $panelDtls['participantId'];
                        $insert['roundId'] = $panelDtls['roundId'];
                        $insert['totalAddedSamples'] = $samplesWithPanels[$key]->totalAddedSamples;

                        $insert['createdBy'] = $this->dbConnection->getUserSession();
                        $response = $this->dbConnection->insertData('tbl_bac_sample_to_panel', $insert);
                    }
//                    return true;
                }
//                return false;
            }
        } catch (Exception $exception) {
            echo("error occured " . $exception->getMessage());
        }
    }

    public function insertAction() {
        $jsPostData = file_get_contents('php://input');

        $jsPostData = (array) (json_decode($jsPostData));
        if (is_array($jsPostData)) {

            $dataDB['data'] = $this->dbConnection->insertData($jsPostData['tableName'], (array) $jsPostData['data']);
            $dataDB['status'] = 1;
        } else {
            $dataDB['status'] = 0;
        }
        echo $this->returnJson($dataDB);

        exit();
    }

    public function returnValueWhere($id, $tableName) {
        $returnArray = array();
        if (!is_array($id)) {
            if ($tableName == 'data_manager') {
                $whereId['dm_id'] = $id;
            } else if ($tableName == 'participant') {
                $whereId['participant_id'] = $id;
            } else if ($tableName == 'participant_manager_map') {
                $whereId['dm_id'] = $id;
            } else {
                $whereId['id'] = $id;
            }
        } else {
            $whereId = $id;
        }
        if (is_array($whereId)) {
            $dataDB = $this->dbConnection->selectFromTable($tableName, $whereId);
//            echo($dataDB);
//            exit;
            if ($dataDB != false) {
                try {

                    foreach ($dataDB as $key => $value) {
                        // array_push($returnArray,$value);
                        $returnArray = $value;
                    }
                } catch (Exception $e) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return (array) $returnArray;
        exit();
    }

    public function testpdfAction() {

        exit();
    }

    public function returnWithRefColNames($tableName, $where) {
        try {

            $dataDB = $this->dbConnection->selectFromTable($tableName, $where);
//            print_r($where);
//            exit;
            if ($dataDB != false) {

                foreach ($dataDB as $key => $value) {
                    if ($tableName == 'tbl_bac_panels_shipments') {


                        $panel = $this->returnValueWhere($value->panelId, 'tbl_bac_panel_mst');

                        $shipment = $this->returnValueWhere($value->shipmentId, 'tbl_bac_shipments');

                        $dataDB[$key]->panelName = $panel['panelName'];
                        $dataDB[$key]->panelLabel = $panel['panelLabel'];
                        $dataDB[$key]->panelType = $panel['panelType'];
                        $dataDB[$key]->panelDatePrepared = $panel['panelDatePrepared'];
                        $dataDB[$key]->dateCreated = $panel['dateCreated'];
                        $dataDB[$key]->barcode = $panel['barcode'];
                        $dataDB[$key]->shipmentDeliveryStatus = $shipment['shipmentStatus'];

                        if (isset($where['participantId'])) {
                            $dataDB[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $where, 'panelId');
                        } else {
                            $dataDB[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->panelId, 'panelId');
                        }
//                        var_dump($where);
//                        exit;
                    } else if ($tableName == 'tbl_bac_sample_to_panel') {
                        $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');

                        $dataDB[$key]->batchName = $sample['batchName'];
                        $dataDB[$key]->datePrepared = $sample['datePrepared'];
                        $dataDB[$key]->materialSource = $sample['materialSource'];
                        $dataDB[$key]->materialOrigin = $sample['materialOrigin'];
                        $dataDB[$key]->dateCreated = substr($dataDB[$key]->dateCreated, 0, 10);
                        $dataDB[$key]->datePrepared = substr($dataDB[$key]->datePrepared, 0, 10);
                    } else if ($tableName == 'tbl_bac_expected_results') {
                        $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');

                        $dataDB[$key]->batchName = $sample['batchName'];
                        $dataDB[$key]->materialSource = $sample['materialSource'];
                        $dataDB[$key]->sampleDetails = $sample['sampleDetails'];
                        $dataDB[$key]->sampleInstructions = $sample['sampleInstructions'];
                    } else if ($tableName == 'tbl_bac_panel_mst') {

                        $dataDB[$key]->totalSamplesAdded = $this->selectCount('tbl_bac_sample_to_panel', $value->panelId, 'panelId');
                    } else if ($tableName == 'tbl_bac_ready_labs') {
                        $lab = $this->returnValueWhere($value->labId, 'participant');

                        $dataDB[$key]->first_name = $lab['first_name'];
                        $dataDB[$key]->region = $lab['region'];
                        $dataDB[$key]->institute = $lab['institute_name'];
//                        $dataDB[$key]->batchName = $sample['batchName'];
                    }
                }
            }
            return $dataDB;
        } catch
        (Exception $e) {
            $e->getMessage();
        }
    }

    public function getmicroagentsAction() {
        $postedData = $this->returnArrayFromInput();
//print_r($postedData);
//exit;
        $where['sampleId'] = $postedData['sampleId'];
        $microAgents = $this->dbConnection->selectFromTable('tbl_bac_expected_micro_bacterial_agents', $where);
//        var_dump($where);
//        exit;
        if ($microAgents != false) {
            echo $this->returnJson(array("status" => 1, 'data' => $microAgents));
        } else {
            echo $this->returnJson(array("status" => 0, 'message' => 'No Records Found'));
        }
        exit;
    }

    public function getusersessionsAction() {
        if (!$this->returnUserLabDetails()) {
            echo $this->returnJson(array('data' => $this->returnUserLabDetails(), 'status' => 0));
        } else {
            echo $this->returnJson(array('data' => $this->returnUserLabDetails(), 'status' => 1));
        }

        exit;
    }

    public function getwheredeliveryAction() {
        try {
            $postedData = file_get_contents('php://input');
            $postedData = (array) (json_decode($postedData));

            $tableName = $postedData['tableName'];

            $where = $postedData['where'];
            $where = (array) ($where);
            if ($tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_samples_to_users') {
                $userdetails = $this->returnUserLabDetails();
                if (!$userdetails) {
                    echo $this->returnJson(array('status' => 0, 'message' => 'no records found'));
                    exit;
                } else {
//                    $participantId = $userdetails['participant_id'];
                }
                $participantId = $userdetails['participant_id'];

                $dataDB = $this->dbConnection->selectFromDStatusTableSamples($tableName, $where, $participantId);
            } else {
                $dataDB = $this->dbConnection->selectFromDStatusTable($tableName, $where);
            }


            if ($dataDB != false) {
                $tableArry = array();
                if ($tableName == 'tbl_bac_panel_mst' || $tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_panels_shipments' || $tableName == 'tbl_bac_samples_to_users' || $tableName == 'tbl_bac_rounds' || $tableName == 'tbl_bac_shipments'
                ) {
                    foreach ($dataDB as $key => $value) {

                        $dataDB[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->id, 'panelId');
                        if ($tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_samples_to_users') {

                            $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');

                            $round = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');

                            $dataDB[$key]->batchName = $sample['batchName'];
                            $dataDB[$key]->datePrepared = $sample['datePrepared'];
                            $dataDB[$key]->materialSource = $sample['materialSource'];
                            $dataDB[$key]->materialOrigin = $sample['materialOrigin'];
                            $dataDB[$key]->roundCode = $round['roundCode'];

                            $dataDB[$key]->dateCreated = substr($dataDB[$key]->dateCreated, 0, 10);
                            $dataDB[$key]->datePrepared = substr($dataDB[$key]->datePrepared, 0, 10);
                            $dataDB[$key]->feedBackWord = $value->feedBack == 1 ? 'taken' : 'untaken';
                            $whereId = $tableName == 'tbl_bac_sample_to_panel' ? $dataDB[$key]->id : $dataDB[$key]->panelToSampleId;
                            $sampleInfo = $this->returnSampleInfo($whereId);

                            $dataDB[$key]->daysLeftOnTen = $this->converttodays($round['endDate']);//> 10 ? 0 : $sampleInfo['endDaysLeft'];
                            $dataDB[$key]->allowedOnTenDays = $sampleInfo['endDaysLeft'] > 0 ? 1 : 0;


                            if ($tableName == 'tbl_bac_samples_to_users') {

                                $issuedTo = $this->returnValueWhere($value->userId, 'data_manager');
//                            var_dump($issuedTo);
//                            exit;
                                $dataDB[$key]->issuedTo = $issuedTo['last_name'] . ' ' . $issuedTo['first_name'];
                            }
                        }
                        if ($tableName == 'tbl_bac_rounds') {
                            $dataDB[$key]->daysLeft = $this->converttodays($dataDB[$key]->endDate);
                            $dataDB[$key]->totalShipmentsAdded = $this->dbConnection->selectCount('tbl_bac_shipments', $value->id, 'roundId');
                            $whereReady['roundId'] = $value->id;
                            $whereReady['status'] = 2;
                            $dataDB[$key]->totalLabsAdded = $this->dbConnection->selectCount('tbl_bac_ready_labs', $whereReady, 'roundId');
                        }
                        if ($tableName == 'tbl_bac_panels_shipments') {


                            $panel = $this->returnValueWhere($value->panelId, 'tbl_bac_panel_mst');


                            $dataDB[$key]->panelName = $panel['panelName'];
                            $dataDB[$key]->panelLabel = $panel['panelLabel'];
                            $dataDB[$key]->panelType = $panel['panelType'];
                            $dataDB[$key]->panelDatePrepared = $panel['panelDatePrepared'];
                            $dataDB[$key]->dateCreated = $panel['dateCreated'];
                            $dataDB[$key]->barcode = $panel['barcode'];
                            $dataDB[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->panelId, 'panelId');
                        }

                        if ($tableName == 'tbl_bac_shipments') {
                            $where['participantId'] = null;
                            $whereSS['shipmentId'] = $value->id;
                            $dataDB[$key]->totalPanelsAdded = $this->dbConnection->selectCount('tbl_bac_panels_shipments', $whereSS, 'shipmentId');
                        }
                    }
                }
            }

            if (sizeof($dataDB) > 0) {
                $data['status'] = 1;
                $data['data'] = $dataDB;
                echo($this->returnJson($data));
            } else {
                echo($this->returnJson(json_encode(array('status' => 0))));
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit();
    }

    public function updateroundstartAction() {
        try {
            $data['status'] = 0;
            $dataArray = $this->returnArrayFromInput();

            if (is_array($dataArray)) {
                $arr = (array) $dataArray['where'];
                $checkShipment['roundId'] = $arr['id'];
                $checkShipment['shipmentStatus'] = 0;

                $shipmentDispatch = $this->dbConnection->selectCount('tbl_bac_shipments', $checkShipment, 'roundId');

                if ($shipmentDispatch == 0) {
                    $data = $this->dbConnection->updateTable($dataArray['tableName'], (array) $dataArray['where'], (array) $dataArray['updateData']);
                    $arr = (array) $dataArray['where'];
                    $where['roundId'] = $arr['id'];
                    $data = $this->dbConnection->updateTable('tbl_bac_shipments', $where, (array) $dataArray['updateData']);

                    $data = $this->dbConnection->updateTable('tbl_bac_panels_shipments', $where, (array) $dataArray['updateData']);
                    $data = $this->dbConnection->updateTable('tbl_bac_sample_to_panel', $where, (array) $dataArray['updateData']);

                    if ($dataArray['tableName'] == 'tbl_bac_shipments') {
                        
                    }
                    $data['status'] = 1;
                } else {
                    $data['message'] = 'There is undispatched shipment,please dispatch then try again';
                }
            } else {
                $data['message'] = ('could not find your request');
            }
            echo $this->returnJson($data);
        } catch (Exception $exc) {
            $exc->getMessage();
        }
        exit();
    }

    public function converttodays($endDate, $startDate = null) {
        if (isset($startDate)) {
            $diff = strtotime($endDate) - strtotime($startDate);
        } else {
            $diff = strtotime($endDate) - time();
        }
        $diff = round($diff / (60 * 60 * 24), 1);
        return $diff > 0 ? $diff : 0;
        exit;
    }

    public function returnTotalSamples($array, $tableName) {
        if (count($array)) {
            foreach ($array as $key => $value) {
                if ($tableName == 'tbl_bac_panel_mst') {
                    $array[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->id, 'panelId');
                }
                if ($tableName == 'tbl_bac_shipments') {
                    $where['participantId'] = null;
                    $where['shipmentId'] = $value->id;
                    $array[$key]->totalPanelsAdded = $this->dbConnection->selectCount('tbl_bac_panels_shipments', $where, 'shipmentId');
                }
            }
        }
        return $array;
    }

    public function getsampleinstructionsAction() {
        $postedData = file_get_contents('php://input');
        $postedData = (array) (json_decode($postedData));

        $sampleInstructions = $this->returnValueWhere($postedData, 'tbl_bac_sample_instructions');

        if (sizeof($sampleInstructions) == 0) {
            $where['status'] = 9;

            $sampleInstructions = $this->returnValueWhere($where, 'tbl_bac_sample_instructions');
        }

        if (sizeof($sampleInstructions) > 0) {
            $sampleInstructions['currentId'] = $sampleInstructions['sampleId'];
            unset($sampleInstructions['batchName']);
            echo $this->returnJson(array('status' => 1, 'data' => $sampleInstructions));
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'no records found'));
        }
//        return $sampleInstructions;
        exit;
    }

    public function returnSampleInstructions($postedData) {

        $sampleInstructions = $this->returnValueWhere($postedData, 'tbl_bac_sample_instructions');

        if (sizeof($sampleInstructions) == 0) {
            $where['status'] = 9;

            $sampleInstructions = $this->returnValueWhere($where, 'tbl_bac_sample_instructions');
        }
        return $sampleInstructions;
    }

    public function getdistinctshipmentsAction() {

        $postedData = file_get_contents('php://input');
        $postedData = (array) (json_decode($postedData));

        $where = (array) $postedData['where'];


        if ($where['type'] == 0) {
            $whereShipment = $this->returnUserLabDetails();
            $whereParticipant['participantId'] = $whereShipment['participant_id'];
            $whereParticipant['deliveryStatus !'] = 0;
            if (!$this->returnUserLabDetails()) {
                echo $this->returnJson(array('status' => 0, 'message' => 'No Records Found,User has no lab'));
                exit;
            }
        }

        $tableName = 'tbl_bac_panels_shipments';
//        $whereParticipant['startRoundFlag'] = 1;
        $dataDB = $this->dbConnection->selectFromTable($tableName, $whereParticipant, true);


        if ($dataDB != false) {
            foreach ($dataDB as $key => $value) {
                if ($tableName == 'tbl_bac_panels_shipments') {

                    $whereS['shipmentId'] = $value->shipmentId;
                    $whereS['participantId'] = $whereShipment['participant_id'];

                    $shipment = $this->returnValueWhere($value->shipmentId, 'tbl_bac_shipments');

                    $round = $this->returnValueWhere($shipment['roundId'], 'tbl_bac_rounds');

                    $dataDB[$key]->shipmentName = $shipment['shipmentName'];
                    $dataDB[$key]->shipmetId = $value->shipmentId;
                    $dataDB[$key]->id = $value->shipmentId;
                    $dataDB[$key]->shipmentLabel = $shipment['shipmentLabel'];
                    $dataDB[$key]->shimentDsc = $shipment['shipmentDsc'];
                    $dataDB[$key]->dateDispatched = $shipment['dateDispatched'];
                    $dataDB[$key]->dateCreated = $shipment['dateCreated'];
                    $dataDB[$key]->roundId = $shipment['roundId'];
                    $dataDB[$key]->shipmentStatus = $shipment['shipmentStatus'];
                    $dataDB[$key]->datePrepared = $shipment['datePrepared'];

                    $dataDB[$key]->dispatchCourier = $shipment['dispatchCourier'];
                    $whereCouriers['courierName'] = $shipment['dispatchCourier'];

                    $courierInfo = $this->returnValueWhere($whereCouriers, 'tbl_bac_couriers');
                    $dataDB[$key]->courierContactNumber = $courierInfo['mobile'];
                    $dataDB[$key]->roundName = $round['roundName'];
                    $dataDB[$key]->roundCode = $round['roundCode'];
                    $dataDB[$key]->startDate = $round['startDate'];
                    $dataDB[$key]->endDate = $round['endDate'];
                    $dataDB[$key]->daysLeft = $this->converttodays($dataDB[$key]->endDate);
                    $dataDB[$key]->totalPanelsAdded = $this->dbConnection->selectCount('tbl_bac_panels_shipments', $whereS, 'panelId');
                }
            }
        }
        if ($dataDB != false) {
            $data['status'] = 1;
            $data['data'] = $dataDB;

            echo($this->returnJson($data));
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No Records Found'));
        }

        exit;
    }

    public function getdistinctpanelsAction() {

        $postedData = file_get_contents('php://input');
        $postedData = (array) (json_decode($postedData));
        //
        $where = (array) $postedData['where'];
//        print_r($where);
//          exit();
        $tableName = 'tbl_bac_panels_shipments';
        $dataDB = $this->dbConnection->selectFromTable($tableName, $where, true);

        if ($dataDB != false) {
            foreach ($dataDB as $key => $value) {
                if ($tableName == 'tbl_bac_panels_shipments') {


                    $panel = $this->returnValueWhere($value->panelId, 'tbl_bac_panel_mst');


                    $dataDB[$key]->panelName = $panel['panelName'];
                    $dataDB[$key]->panelLabel = $panel['panelLabel'];
                    $dataDB[$key]->panelType = $panel['panelType'];
                    $dataDB[$key]->panelDatePrepared = $panel['panelDatePrepared'];
                    $dataDB[$key]->dateCreated = $panel['dateCreated'];
                    $dataDB[$key]->barcode = $panel['barcode'];
                    $dataDB[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->panelId, 'panelId');
                }
            }
        }
        if ($dataDB != false) {
            $data['status'] = 1;
            $data['data'] = $dataDB;

            echo($this->returnJson($data));
        } else {
            echo($this->returnJson(json_encode(array('status' => 0, 'message' => 'No Records Found'))));
        }

        exit;
    }

    public function returnLastRounds($where, $userId) {
        $whr['labId'] = $where['participant_id'];
        $rounds = $this->dbConnection->selectFromTable('tbl_bac_ready_labs', $whr);
//        var_dump($rounds);
//        exit;
        if ($rounds != false) {
            $i = 0;
            foreach ($rounds as $key => $value) {
                if ($i == 1) {
                    break;
                }
                $whereUserRound['userId'] = $userId;
                $whereUserRound['roundId'] = $value->roundId;
                $getUserFromIssuedSamples = $this->dbConnection->selectFromTable('tbl_bac_samples_to_users', $whereUserRound);
                if ($getUserFromIssuedSamples != false) {
                    return true;
                } else {
                    return false;
                }


                $i++;
            }
        } else {
            return false;
        }
    }

    public function getlabusersAction() {

        try {
            $labDetails = $this->returnUserLabDetails();
            $where['participant_id'] = $labDetails['participant_id'];



            if (isset($where['participant_id'])) {
                $labUsers = $this->dbConnection->selectFromTable('participant_manager_map', $where);

                if ($labUsers != false) {
                    foreach ($labUsers as $key => $value) {
                        $userDetails = $this->returnValueWhere($value->dm_id, 'data_manager');

                        $receivedLastRound = $this->returnLastRounds($where, $value->dm_id);

                        $labUsers[$key]->names = isset($userDetails['first_name']) ? $userDetails['first_name'] : 'INVALID';
                        $labUsers[$key]->names .= isset($userDetails['last_name']) ? $userDetails['last_name'] : ' USER';

                        $labUsers[$key]->receivedLastMessage = $receivedLastRound ? 'Received sample previous Round' : 'Didn\'t receive sample previous round';
                        $labUsers[$key]->receivedLastStatus = $receivedLastRound;
                        $labUsers[$key]->validUser = isset($userDetails['first_name']) ? 1 : 0;
                    }

//                    var_dump($labUsers);
//                    exit;
                    echo $this->returnJson(array("status" => 1, "data" => $labUsers));
                }
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        exit;
    }

    public function selectfromtableAction() {
        try {
            $postedData = file_get_contents('php://input');
            $postedData = (array) (json_decode($postedData));

            $tableName = $postedData['tableName'];

            if (isset($postedData['where'])) {
                $where = $postedData['where'];
                $where = (array) ($where);
                if ($tableName == 'tbl_bac_panels_shipments') {
                    $userDetails = $this->returnUserLabDetails();
                    if (!$userDetails) {
                        echo($this->returnJson(json_encode(array('status' => 0, 'message' => 'No Records Found'))));
                        exit;
                    }
                    $where['participantId'] = $userDetails['participant_id'];
                }
            } else {
                $where = '';
            }


            $where = sizeof($where) > 0 ? $where : "";

            if ($tableName == 'tbl_bac_panels_shipments') {
                $dataDB = $this->returnWithRefColNames($tableName, $where);
            } else if ($tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_ready_labs' || $tableName == 'tbl_bac_expected_results') {
                $dataDB = $this->returnWithRefColNames($tableName, $where);
            } else {
                $dataDB = $this->dbConnection->selectFromTable($tableName, $where);
                $dataDB = $this->returnTotalSamples($dataDB, $tableName);
            }
            if ($dataDB != false) {
                $data['status'] = 1;
                $data['data'] = $dataDB;

                echo($this->returnJson($data));
            } else {
                echo($this->returnJson(json_encode(array('status' => 0, 'message' => 'No Records Found'))));
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit();
    }

    public function returnArrayFromInput() {
        $postedData = file_get_contents('php://input');
        $postedData = (array) (json_decode($postedData));

        return $postedData;
    }

    public function customdeleteAction() {
        try {
            $postedData = file_get_contents('php://input');
            $postedData = (array) (json_decode($postedData));


            $where['id'] = $postedData['where'];
            $tableName = $postedData['tableName'];
            $status['status'] = 0;
            if (isset($tableName)) {
                $status = $this->dbConnection->deleteFromWhere($tableName, $where);
            }
            echo $this->returnJson($status);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit();
    }

    public function returnSampleInfo($samplePanelId) {


        $sampleDateDelivered = $this->returnValueWhere($samplePanelId, 'tbl_bac_sample_to_panel');

        $endDate = date('Y-m-d');
        $sampleDateDelivered['endDaysLeft'] = $this->converttodays($endDate, $sampleDateDelivered['dateDelivered']);

        return $sampleDateDelivered;
    }

    public function getusersamplesissuedAction() {
        try {

            $where['userId'] = $this->dbConnection->getUserSession();

            if (count($where) > 0) {

                $dataDB = $this->dbConnection->selectFromTable('tbl_bac_samples_to_users', $where);

                if ($dataDB != false) {
                    foreach ($dataDB as $key => $value) {
                        $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');
                        $dataDB[$key]->batchName = $sample['batchName'];
                        $dataDB[$key]->datePrepared = $sample['datePrepared'];
                        $dataDB[$key]->sampleInstructions = $sample['sampleInstructions'];
                        $dataDB[$key]->materialOrigin = $sample['materialOrigin'];

                        $dataDB[$key]->materialSource = $sample['materialSource'];
                        $dataDB[$key]->sampleDetails = $sample['sampleDetails'];
                        $dataDB[$key]->sampleInstructions = $sample['sampleInstructions'];

                        $dataDB[$key]->materialOrigin = $sample['materialOrigin'];
                        $dataDB[$key]->dateCreated = substr($dataDB[$key]->dateCreated, 0, 10);
                        $dataDB[$key]->datePrepared = substr($dataDB[$key]->datePrepared, 0, 10);

                        $round = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');

                        $dataDB[$key]->startDate = $round['startDate'];
                        $dataDB[$key]->endDate = $round['endDate'];
                        $dataDB[$key]->roundCode = $round['roundCode'];
                        $dataDB[$key]->roundStatus = $round['roundStatus'];
                        $sampleInfo = $this->returnSampleInfo($dataDB[$key]->panelToSampleId);

                        $dataDB[$key]->daysLeft = $this->converttodays($dataDB[$key]->endDate);


                        $dataDB[$key]->daysLeftOnTen = $dataDB[$key]->daysLeft;//$sampleInfo['endDaysLeft'] > 10 ? 0 : $sampleInfo['endDaysLeft'];

                        $dataDB[$key]->allowedOnTenDays =  $dataDB[$key]->daysLeft > 0 ? 1 : 0;
                        $dataDB[$key]->allowed = $dataDB[$key]->daysLeft > 0 ? 1 : 0;
                    }
                    $data['status'] = 1;
                    $data['data'] = $dataDB;

                    echo($this->returnJson($data));
                } else {
                    $data['status'] = 0;
                    $data['message'] = 'No data available';

                    echo($this->returnJson($data));
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit;
    }

    public function editusermicroagentsAction() {
        $postedData = file_get_contents('php://input');
        $postedData = (array) (json_decode($postedData));
        $insertData = (array) $postedData['resultsAba'];
//print_r($insertData);exit;
        if (count($insertData) > 0) {
            $resp['status'] = 0;
            if (isset($postedData['edit'])) {
                $deleteWhere['sampleId'] = $postedData['sampleId'];
                $status = $this->dbConnection->deleteFromWhere('tbl_bac_micro_bacterial_agents', $deleteWhere);
//                echo $this->returnJson($status);
//                exit;
            }
            for ($i = 0; $i < sizeof($insertData); $i++) {

                $newFinal = (array) $insertData[$i];

                $newFinalArray['antiMicroAgent'] = $newFinal['antiMicroAgent'];
                $newFinalArray['reportedToStatus'] = $newFinal['reportedToStatus'];
                $newFinalArray['diskContent'] = $newFinal['diskContent'];
                $newFinalArray['sampleId'] = $postedData['sampleId'];
                $newFinalArray['finalScore'] = $newFinal['finalScore'];

                if ($postedData['tableName'] == "tbl_bac_micro_bacterial_agents") {
                    $newFinalArray['userId'] = $postedData['userId'];
                    $newFinalArray['roundId'] = $postedData['roundId'];
                    $newFinalArray['participantId'] = $postedData['participantId'];

                    $newFinalArray['panelToSampleId'] = $postedData['panelToSampleId'];
                    $newFinalArray['level'] = 1;
                } else {
                    $newFinalArray['agentScore'] = $postedData['agentScore'];
                }
                $insertStatus = $this->dbConnection->insertData($postedData['tableName'], $newFinalArray);

                $resp['status'] = 1;
                if ($insertStatus['status'] != 1) {

                    $resp['status'] = 0;
                    $resp['message'] = $insertStatus['message'];
                } else {
                    if ($postedData['tableName'] == "tbl_bac_micro_bacterial_agents") {
                        $where['panelToSampleId'] = $newFinalArray['panelToSampleId'];
                        $where['participantId'] = $postedData['participantId'];

                        $update['published'] = 0;
//                        $update['markedStatus'] = 0;
                        $data = $this->dbConnection->updateTable('tbl_bac_sample_to_panel', $where, $update);
                        $data = $this->dbConnection->updateTable('tbl_bac_samples_to_users', $where, $update);
                    }
                }
            }
            echo $this->returnJson($resp);
        }


        exit;
    }

    public function saveusermicroagentsAction() {
        $postedData = file_get_contents('php://input');
        $postedData = (array) (json_decode($postedData));
        $insertData = (array) $postedData['resultsAba'];
//print_r($insertData);exit;
        if (count($insertData) > 0) {
            $resp['status'] = 0;
            if (isset($postedData['edit'])) {
                $deleteWhere['sampleId'] = $postedData['sampleId'];
                $status = $this->dbConnection->deleteFromWhere('tbl_bac_expected_micro_bacterial_agents', $deleteWhere);
//                echo $this->returnJson($status);
//                exit;
            }
            for ($i = 0; $i < sizeof($insertData); $i++) {

                $newFinal = (array) $insertData[$i];

                $newFinalArray['antiMicroAgent'] = $newFinal['antiMicroAgent'];
                $newFinalArray['reportedToStatus'] = $newFinal['reportedToStatus'];
                $newFinalArray['diskContent'] = $newFinal['diskContent'];
                $newFinalArray['sampleId'] = $postedData['sampleId'];
                $newFinalArray['finalScore'] = $newFinal['finalScore'];

                if ($postedData['tableName'] == "tbl_bac_micro_bacterial_agents") {
                    $newFinalArray['userId'] = $postedData['userId'];
                    $newFinalArray['roundId'] = $postedData['roundId'];
                    $newFinalArray['participantId'] = $postedData['participantId'];

                    $newFinalArray['panelToSampleId'] = $postedData['panelToSampleId'];
                    $newFinalArray['level'] = 1;
                } else {
                    $newFinalArray['agentScore'] = $postedData['agentScore'];
                }
                $insertStatus = $this->dbConnection->insertData($postedData['tableName'], $newFinalArray);

                $resp['status'] = 1;
                if ($insertStatus['status'] != 1) {

                    $resp['status'] = 0;
                    $resp['message'] = $insertStatus['message'];
                } else {
                    if ($postedData['tableName'] == "tbl_bac_micro_bacterial_agents") {
                        $where['panelToSampleId'] = $newFinalArray['panelToSampleId'];
                        $where['participantId'] = $postedData['participantId'];
                        $update['responseStatus'] = 1;

                        $data = $this->dbConnection->updateTable('tbl_bac_sample_to_panel', $where, $update);
                        $data = $this->dbConnection->updateTable('tbl_bac_samples_to_users', $where, $update);
                    }
                }
            }
            echo $this->returnJson($resp);
        }


        exit;
    }

    public function getsampleallusersAction() {
        try {
            $where = $this->returnArrayFromInput();

            if (count($where) > 0) {
                $dataDB = $this->dbConnection->selectFromTable('tbl_bac_samples_to_users', $where);
                if ($dataDB != false) {
                    foreach ($dataDB as $key => $value) {
                        $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');
                        $dataDB[$key]->batchName = $sample['batchName'];
                        $dataDB[$key]->datePrepared = $sample['datePrepared'];
                        $dataDB[$key]->bloodPackNo = $sample['bloodPackNo'];
                        $dataDB[$key]->materialOrigin = $sample['materialOrigin'];
                        $dataDB[$key]->dateCreated = substr($dataDB[$key]->dateCreated, 0, 10);
                        $dataDB[$key]->datePrepared = substr($dataDB[$key]->datePrepared, 0, 10);

                        $round = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');

                        $dataDB[$key]->startDate = $round['startDate'];
                        $dataDB[$key]->endDate = $round['endDate'];
                        $dataDB[$key]->roundCode = $round['roundCode'];
                        $dataDB[$key]->roundStatus = $round['roundStatus'];
                        $dataDB[$key]->daysLeft = $this->converttodays($dataDB[$key]->endDate);
                        $dataDB[$key]->allowed = $dataDB[$key]->daysLeft > 0 ? 1 : 0;
                    }
                    $data['status'] = 1;
                    $data['data'] = $dataDB;

                    echo($this->returnJson($data));
                } else {
                    $data['status'] = 0;
                    $data['message'] = 'No data available';

                    echo($this->returnJson($data));
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        exit;
    }

    public function updateShipmentRelatedTables($where, $update) {
        $updatetbl_bac_panel_mst = array();

        $updatetbl_bac_panels_shipments = array();

        $updatetbl_bac_sample_to_panel = array();
        $whereShipmentId['shipmentId'] = $where['id'];
        $whereShipmentIdMothertable['id'] = $where['id'];
        $shipmentData = $this->returnValueWhere($whereShipmentIdMothertable, 'tbl_bac_shipments');


        $shipmentStatus = $shipmentData['shipmentStatus'];
        $shipmentId = $shipmentData['id'];
        /*         * ***************************Update tbl_bac_panels_shipments****************************** */
        $updatetbl_bac_panels_shipments['deliveryStatus'] = $shipmentStatus;
        $updatetbl_bac_panels_shipments['dateDelivered'] = date('Y-m-d', time());
        $updatetbl_bac_panels_shipments['quantity'] = 1;
        $updatetbl_bac_panels_shipments['receivedBy'] = $shipmentData['addressedTo'];
        $whereTBPS['shipmentId'] = $shipmentId;
        $whereTBPS['roundId >'] = 0;
        $this->dbConnection->updateTable('tbl_bac_panels_shipments', $whereTBPS, $updatetbl_bac_panels_shipments);
        /*         * ****************************************************************************************** */

        /*         * *******************************update tbl_bac_panel_mst*********************************************************** */

        $whereShipmentData = $this->dbConnection->selectFromTable('tbl_bac_panels_shipments', $whereShipmentId);

        if ($whereShipmentData != false) {
            foreach ($whereShipmentData as $key => $value) {
                $whereTBPM['id'] = $whereShipmentData[$key]->panelId;
                $updateTBPM['dateDelivered'] = $shipmentData['dateReceived'];
                $updateTBPM['panelStatus'] = $shipmentData['shipmentStatus'];
                $updateTBPM['shipmentNumber'] = 'S-0' . $shipmentId;

                $updateTBPMfeedback = $this->dbConnection->updateTable('tbl_bac_panel_mst', $whereTBPM, $updateTBPM);

                /*                 * *********************update tbl_bac_sample_to_panel************************** */

                $updateTBSP['dateDelivered'] = date('Y-m-d', time());
                $updateTBSP['deliveryStatus'] = $shipmentData['shipmentStatus'];
                $updateTBSP['shipmentId'] = $shipmentId;
                $whereTBSP['panelId'] = $whereShipmentData[$key]->panelId;
                $whereTBSP['roundId > '] = 0;
                $updateTBPMfeedback = $this->dbConnection->updateTable('tbl_bac_sample_to_panel', $whereTBSP, $updateTBSP);
//                print_r($whereTBPM);
//                exit;
                /*                 * ****************************************** */
            }
        }
        /*         * ************************************************************************************************************** */
//        exit;
        return true;
    }

    public function updatetablewhereAction() {
        try {
            $data['status'] = 0;
            $dataArray = $this->returnArrayFromInput();

            if (is_array($dataArray)) {

                $data = $this->dbConnection->updateTable($dataArray['tableName'], (array) $dataArray['where'], (array) $dataArray['updateData']);

                if ($dataArray['tableName'] == 'tbl_bac_shipments') {
                    if ($data['status'] == 1) {
                        $this->updateShipmentRelatedTables((array) $dataArray['where'], (array) $dataArray['updateData']);
                    }
                }
            } else {
                $data['message'] = ('could not find your request');
            }
            echo $this->returnJson($data);
        } catch (Exception $exc) {
            $exc->getMessage();
        }
        exit();
    }

    public function saveshipmentstoroundAction() {
        $postedData = $this->returnArrayFromInput();
        if (is_array($postedData)) {
            $shipments = $postedData['shipmentIds'];
            for ($i = 0; $i < sizeof($shipments); $i++) {
                $where['id'] = $shipments[$i];
                $updateData['roundId'] = $postedData['roundCode'];
                $data = $this->dbConnection->updateTable('tbl_bac_shipments', $where, $updateData);
                print_r($data);
            }
        }
        exit;
    }

    public function getPanelsFromShipment($where) {

        try {
            $tableName = 'tbl_bac_panels_shipments';
            $dataDB = $this->dbConnection->selectFromTable($tableName, $where);
            //  echo(sizeof($dataDB));
//            exit;
            if ($dataDB != false) {
                $userLabDtls = $this->returnUserLabDetails();
                foreach ($dataDB as $key => $value) {


                    $panel = $this->returnValueWhere($value->participantId, 'participant');
                    $panelDtls = $this->returnValueWhere($value->panelId, 'tbl_bac_panel_mst');

                    $dataDB[$key]->originLab = $userLabDtls['first_name'] . ' - ' . $userLabDtls['institute_name'];
                    $dataDB[$key]->panelName = $panelDtls['panelName'];
                    $dataDB[$key]->panelLabel = $panelDtls['panelLabel'];
                    $dataDB[$key]->labName = $panel['lab_name'];
                    $dataDB[$key]->instituteName = $panel['institute_name'];
                    $dataDB[$key]->city = $panel['city'];
                    $dataDB[$key]->region = $panel['region'];
                    $dataDB[$key]->firstName = $panel['first_name'];
                    $dataDB[$key]->mobile = $panel['mobile'];
                    $dataDB[$key]->phone = $panel['phone'];
                    $dataDB[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->panelId, 'panelId');
                }
            }
            return $dataDB;
        } catch
        (Exception $e) {
            $e->getMessage();
        }
    }

    public function returnUserLabDetails() {
        $loggedIn = $this->dbConnection->getUserSession();


        try {

            $userLab = $this->returnValueWhere($loggedIn, 'participant_manager_map');

//            var_dump($userLab);
//            exit;
            if (sizeof($userLab) == 0) {
                return false;
            } else {
                $userLabDetails = $this->returnValueWhere($userLab['participant_id'], 'participant');

                return $userLabDetails;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function generatelabelsAction() {
        $where['shipmentId'] = $_GET['id'];
        $loggedIn = $this->returnUserLabDetails();

        if ($loggedIn > 0) {
            $count = $_GET['total'];
            $panels = $this->getPanelsFromShipment($where);

            if ($panels > 0) {
                // print_r($panels);
                $this->dbConnection->generatePdfFile($panels, $count);
            } else {
                echo 'No Panel Available records available';
            }
        } else {
            echo '<b>You not logged in</b>';
        }
        exit();
    }

    public function testAction() {
        $arr = array('Hello', 'World!', 'Beautiful', 'Day!');
        echo implode(",", $arr);
        exit;
    }

    /* selectReportFromTable($tableName,$colArray, $where ,$orderArray, $group='',$groupArray='') */

    public function getgeneralroundreportAction() {
        $postedData = $this->returnArrayFromInput();
        $col = ['*'];
        $orderArray = ['id', 'startDate'];

        $groupArray = ['id'];


        $data = $this->dbConnection->selectReportFromTable('tbl_bac_rounds', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {
            foreach ($data as $key => $value) {
                $round = $this->returnValueWhere($value->id, 'tbl_bac_rounds');

                $data[$key]->daysLeft = $this->converttodays($data[$key]->endDate);
                $data[$key]->currentStatus = $data[$key]->daysLeft > 0 ? "RUNNING" : "ENDED";
                $data[$key]->totalShipmentsAdded = $this->dbConnection->selectCount('tbl_bac_shipments', $value->id, 'roundId');
                $data[$key]->totalResponded = $this->dbConnection->selectCount('tbl_bac_response_results', $value->id, 'roundId');
            }
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, "msg" => 'No Records available with the selected filters'));
        }
        exit;
    }

    public function getresponsefeedbackAction() {
        $postedData = $this->returnArrayFromInput();
        $col = array('*');
        $orderArray = array('id', 'dateCreated');

        $groupArray = array('id');
        $userDetails = $this->returnUserLabDetails();
        if (!$userDetails) {
            echo $this->returnJson(array('status' => 0, "msg" => 'No Records available with the selected filters'));
            exit;
        } else {
            $postedData['participantId'] = $userDetails['participant_id'];
        }
        $data = $this->dbConnection->selectReportFromTable('tbl_bac_samples_to_users', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {
            foreach ($data as $key => $value) {
                $round = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');
                $sampleName = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');
                $data[$key]->daysLeft = $this->converttodays($round['endDate']);
                $data[$key]->batchName = $sampleName['batchName'];
                $data[$key]->roundName = $round['roundName'];
                $data[$key]->roundCode = $round['roundCode'];
                $data[$key]->startDate = $round['startDate'];
                $data[$key]->endDate = $round['endDate'];
                $deliveryDetails = $this->returnValueWhere($value->panelToSampleId, 'tbl_bac_sample_to_panel');

                $data[$key]->dateDelivered = $deliveryDetails['dateDelivered'];

                $data[$key]->sampleInstructions = $sampleName['sampleInstructions'];
                $data[$key]->sampleDetails = $sampleName['sampleDetails'];
                $data[$key]->materialSource = $sampleName['materialSource'];
                $data[$key]->currentStatus = $data[$key]->daysLeft > 0 ? "RUNNING" : "ENDED";
                $data[$key]->totalShipmentsAdded = $this->dbConnection->selectCount('tbl_bac_shipments', $value->id, 'roundId');
            }
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, "msg" => 'No Records available with the selected filters'));
        }
        exit;
    }

    public function evaluateroundAction() {
        $postedData = $this->returnArrayFromInput();
        $whereRound['roundId'] = $postedData['id'];
        $whereRound['startRoundFlag'] = 1;
        $updateStatus = false;
        $shipments = $this->dbConnection->selectFromTable('tbl_bac_shipments', $whereRound);
        if ($shipments != false) {
            foreach ($shipments as $key => $value) {
                $whereShipmentRound['shipmentId'] = $value->id;
                $whereShipmentRound['startRoundFlag'] = $value->startRoundFlag;
                $whereShipmentRound['dateFrom'] = $value->dateCreated;
                $updateStatus = $this->evaluateresultsAction($whereShipmentRound);
            }

            if ($updateStatus) {
                $whereEvaluation['id'] = $postedData['id'];
                $whereEvaluation['startRoundFlag'] = 1;
                $updateEval['evaluated'] = 1;

                $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_rounds', $whereEvaluation, $updateEval);
                echo $this->returnJson(array('status' => 1, 'message' => 'Round Evaluation was Successful !'));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'Round Evaluation was Unsuccessful !'));
            }
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'Round Evaluation was Unsuccessful !'));
        }
        exit;
    }

    public function updatepublicationAction() {
        $where = $this->returnArrayFromInput();
        $wherePub['id'] = $where['id'];

        $update['published'] = $where['published'];
//print_r($where);exit;
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_rounds', $wherePub, $update);

        $whereRound['roundId'] = $where['id'];
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_samples_to_users', $whereRound, $update);
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_response_results', $whereRound, $update);
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_micro_bacterial_agents', $whereRound, $update);
        echo $this->returnJson($updatePublication);

        if ($update['published'] == 1) {
            $this->sendEmailToEnrolledLabsForPublish($wherePub['id']);
        }
        exit;
    }

    public function sendEmailToEnrolledLabsForPublish($roundId) {
        $where['roundId'] = $roundId;
        $where['status'] = 2;

        $enrolledLabs = $this->dbConnection->selectFromTable('tbl_bac_ready_labs', $where);

        if ($enrolledLabs != false) {
            $round = $this->returnValueWhere($where['roundId'], 'tbl_bac_rounds');

            foreach ($enrolledLabs as $key => $value) {
                $labDetails = $this->returnValueWhere($value->labId, 'participant');
                if (!empty($labDetails)) {
                    if ($labDetails['email'] != '' || $labDetails['email'] != null) {
                        $this->publishedMails($labDetails, $round);
                    }
                }
            }
        }
    }

    public function publishedMails($lab, $round) {

        $name = $lab['institute_name'] . ' ' . $lab['unique_identifier'];

        $message = 'The results for for round, <b>' . $round['roundName'] . ' : ' . $round['roundCode'] . '</b> have been evaluated and published.<br>Please log in to view.';

        $body = $this->createEmailBody($name, $message);

        $this->sendemailAction($body, $lab['email'], true);
    }

    public function getindividuallabsAction() {
        $postedData = $this->returnArrayFromInput();
        $col = ['*'];
        $orderArray = ['id', 'dateCreated'];

        $groupArray = ['id'];

        $data = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {

            foreach ($data as $key => $value) {
                $labDetails = $this->returnValueWhere($value->participantId, 'participant');
                $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');
                $data[$key]->labDetails = $labDetails;
                $data[$key]->batchName = $sample['batchName'];
                $data[$key]->sampleInstructions = $sample['sampleInstructions'];
                $data[$key]->sampleDetails = $sample['sampleDetails'];
                $round = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');

                $data[$key]->daysLeft = $this->converttodays($round['endDate']);


                $sampleInfo = $this->returnSampleInfo($value->panelToSampleId);
                $data[$key]->daysLeftOnTen = $sampleInfo['endDaysLeft'] > 10 ? 0 : $sampleInfo['endDaysLeft'];
                $data[$key]->allowedOnTenDays = $sampleInfo['endDaysLeft'] > 10 ? 0 : 1;

                $data[$key]->materialSource = $sample['materialSource'];
                $data[$key]->evaluatedStatus = $value->markedStatus == 1 ? 'Evaluated' : 'Un-evaluated';
            }
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No records available'));
        }
        exit;
    }

    public function savemicroagentsevaluationAction() {
        $posted = $this->returnArrayFromInput()['update'];
        if (count($posted) > 0) {
            $microSum = 0;
            $where = [];

            foreach ($posted as $key => $value) {
                $arr = (array) $value;
                $whereUpdate['id'] = $arr['id'];

                $where['panelToSampleId'] = $arr['panelToSampleId'];
                $where['participantId'] = $arr['participantId'];
                $where['userId'] = $arr['userId'];
                $where['sampleId'] = $arr['sampleId'];
                $where['roundId'] = $arr['roundId'];

                $update['score'] = $arr['score'];
                if (is_float($update['score']) || is_numeric($update['score'])) {
                    $update['adminMarked'] = 1;
                    $microSum += $arr['score'];
                    $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_micro_bacterial_agents', $whereUpdate, $update);
                } else {
                    $updateEvaluation = array('status' => 0, 'message' => 'score should be numeric');
                }
            }
            $updateEval['totalMicroAgentsScore'] = $microSum;
            if ($updateEvaluation['status'] == 1) {
                $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_response_results', $where, $updateEval);
            }
            echo $this->returnJson($updateEvaluation);
            exit;
        }

        exit;
    }

    public function updatefunctionAction() {
        $posted = $this->returnArrayFromInput();

        $whereEvaluation['id'] = $posted['id'];
        $updateEval = (array) $posted['update'];

        unset($updateEval['id']);
        unset($updateEval['batchName']);
        unset($updateEval['materialSource']);
        unset($updateEval['sampleDetails']);
        unset($updateEval['sampleInstructions']);
        unset($updateEval['labDetails']);
        unset($updateEval['evaluatedStatus']);
        unset($updateEval['finalScore']);
        unset($updateEval['totalMicroAgentsScore']);
        if (isset($updateEval['allowedOnTenDays'])) {
            unset($updateEval['allowedOnTenDays']);
        }
//        print_r($updateEval);
//        exit;
        $finalScore = 0;
        $score = '';
        $updateEval['markedStatus'] = 1;
        $updateEval['adminMarked'] = 1;
        foreach ($updateEval as $key => $value) {

            if (is_numeric($value) && substr($key, -5) == 'Score') {

                $finalScore += $value;
            }
        }
        $updateEval['finalScore'] = $finalScore;


        $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_response_results', $whereEvaluation, $updateEval);

        echo $this->returnJson($updateEvaluation);
        exit;
    }

    public function getmicroagentswhereAction() {
        $posted = $this->returnArrayFromInput();

        $responseResults = $this->dbConnection->selectFromTable('tbl_bac_micro_bacterial_agents', $posted);
//        print_r($posted);
//        exit;
        if ($responseResults != false) {
            echo $this->returnJson(array('status' => 1, "data" => $responseResults));
        } else {
            echo $this->returnJson(array('status' => 0, "message" => "No records found"));
        }

        exit;
    }

    public function getresultsonroundAction() {
        $where['roundId'] = 1;
        $where['markedStatus'] = 1;
        $getSampleResults = $this->dbConnection->selectFromTable('tbl_bac_response_results', $where);

        if ($getSampleResults !== false) {
            $holdingArray = array();
            $arrayResultsAndExpected = array();
            $arrayASTResults = array();
            $arrayASTExpectedResults = array();

            foreach ($getSampleResults as $key => $value) {
                $whereSampleID['sampleId'] = $getSampleResults[$key]->sampleId;
                $expectedResults = $this->returnValueWhere($whereSampleID, 'tbl_bac_expected_results');

                $sampleInfo = $this->returnValueWhere($getSampleResults[$key]->sampleId, 'tbl_bac_samples');

                $tempArray['grainStainReactionResult'] = $value->grainStainReaction;
                $tempArray['grainStainReactionScoreResult'] = $value->grainStainReactionScore;
                $tempArray['finalIdentificationResult'] = $value->finalIdentification;
                $tempArray['finalIdentificationScoreResult'] = $value->finalIdentificationScore;

                $tempArray['grade'] = $value->grade;
                $tempArray['finalScore'] = $value->finalScore;

                $tempArray['batchName'] = $sampleInfo['batchName'];
                $tempArray['grainStainReaction'] = $expectedResults['grainStainReaction'];
                $tempArray['grainStainReactionScore'] = $expectedResults['grainStainReactionScore'];
                $tempArray['finalIdentification'] = $expectedResults['finalIdentification'];
                $tempArray['finalIdentificationScore'] = $expectedResults['finalIdentificationScore'];

                $sampleASTs = $this->dbConnection->selectFromTable('tbl_bac_micro_bacterial_agents', $whereSampleID);

                $sampleASTsExptectedResults = $this->dbConnection->selectFromTable('tbl_bac_expected_micro_bacterial_agents', $whereSampleID);
                array_push($arrayResultsAndExpected, $tempArray);
                $holdEvery['arrayResultsAndExpected'] = $arrayResultsAndExpected;
                $holdEvery['arrayASTResults'] = $sampleASTs;
                $holdEvery['arrayASTExpectedResults'] = $sampleASTsExptectedResults;
                $holdEvery['sampleDetails'] = $sampleInfo;

                $arrayResultsAndExpected = array();
//                array_push($arrayResultsAndExpected, $tempArray);
//                array_push($arrayASTResults, $sampleASTs);
                array_push($arrayASTExpectedResults, $holdEvery);
            }
//            $holding['resultInfo'] = $arrayASTExpectedResults;
            echo json_encode(array('status' => 1, 'data' => $arrayASTExpectedResults));
        } else {
            
        }
        exit;
    }

    public function evaluateresultsAction($whereRoundData = '') {
        /* select results for evaluation */
        $postedData = $this->returnArrayFromInput();
        $where = [];


        if (!empty($whereRoundData)) {
            $where = $whereRoundData;
        } else {
            $where['shipmentId'] = $postedData['id'];
            $where['startRoundFlag'] = 1;


            $shipmentInfo = $this->returnValueWhere($where['shipmentId'], 'tbl_bac_shipments');
            $where['dateFrom'] = $shipmentInfo['dateCreated'];
        }

        /* run this on retrieving shipment from shipment table */
        $orderArray = ['id', 'dateCreated'];
        $col = ['*'];
        $groupArray = ['id'];
        $updateArray = false;

        if (count($where) > 0) {


            $panelSamples = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $where, $orderArray, true, $groupArray);
//            var_dump($panelSamples);
//            exit;
            if ($panelSamples != false) {
                foreach ($panelSamples as $key => $value) {
                    $whereSampleId['sampleId'] = $panelSamples[$key]->sampleId;
                    $whereSampleId['participantId'] = $panelSamples[$key]->participantId;
                    $whereSampleId['roundId'] = $panelSamples[$key]->roundId;

                    $responseResults = $this->dbConnection->selectFromTable('tbl_bac_response_results', $whereSampleId);
                    if ($responseResults != false) {

                        foreach ($responseResults as $key => $value) {

                            $updateArray = $this->updateResponseResults((array) $responseResults[$key]);
                        }
                    }
                }
            }


            /* run this if update on all tables was a success */

            if ($updateArray) {

                $whereEvaluation['id'] = $where['shipmentId'];
                $whereEvaluation['startRoundFlag'] = 1;

                $updateEval['evaluated'] = 1;

                $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_shipments', $whereEvaluation, $updateEval);

                $arr = array('status' => 1, 'message' => 'Shipment Evaluation was successful !');
//                var_dump(!empty($whereRoundData));
//                exit;
                if (!empty($whereRoundData)) {

                    return true;
                }

                echo $this->returnJson($arr);
            } else {
                if (!empty($whereRoundData)) {
                    return false;
                }
                echo $this->returnJson(array('status' => 0, 'message' => 'Evaluation was Unsuccessful !'));
            }
        } else {
            $response['message'] = 'Invalid survey or round ';
        }
        exit;
    }

    public function testinAction() {
        $ar = 'michael osoro';
        $arr = explode(" ", $ar);

        $in = 'osoros';
        var_dump(in_array($in, $arr));
        exit;
    }

    public function updateResponseResults($responseResults) {
        if (is_array($responseResults)) {
            $whereSampleExpectedResult['sampleId'] = $responseResults['sampleId'];
            $sampleExpectedResult = $this->returnValueWhere($whereSampleExpectedResult, 'tbl_bac_expected_results');
            if (count($sampleExpectedResult) > 0) {
                $score['grainStainReactionScore'] = 0;
                $score['primaryMediaScore'] = 0;
                $score['incubationConditionsScore'] = 0;
                $score['colonialMorphologyScore'] = 0;
                $score['bacterialQualificationScore'] = 0;
                $score['isolateProcessingScore'] = 0;
                $score['bacterialReagentsScore'] = 0;
                $score['finalIdentificationScore'] = 0;
                if ($responseResults['grainStainReaction'] == $sampleExpectedResult['grainStainReaction']) {
                    $score['grainStainReactionScore'] = $sampleExpectedResult['grainStainReactionScore'];
                } else if (in_array($responseResults['grainStainReaction'], explode(' ', $sampleExpectedResult['grainStainReaction']))) {
                    $score['grainStainReactionScore'] = 0.75 * $sampleExpectedResult['grainStainReactionScore'];
                }
                if ($responseResults['primaryMedia'] == $sampleExpectedResult['primaryMedia']) {
                    $score['primaryMedia'] = $sampleExpectedResult['primaryMediaScore'];
                }
                if ($responseResults['incubationConditions'] == $sampleExpectedResult['incubationConditions']) {
                    $score['incubationConditionsScore'] = $sampleExpectedResult['incubationConditionsScore'];
                }
                if ($responseResults['colonialMorphology'] == $sampleExpectedResult['colonialMorphology']) {
                    $score['colonialMorphologyScore'] = $sampleExpectedResult['colonialMorphologyScore'];
                }
                if ($responseResults['bacterialQualification'] == $sampleExpectedResult['bacterialQualification']) {
                    $score['bacterialQualificationScore'] = $sampleExpectedResult['bacterialQualificationScore'];
                }
                if ($responseResults['bacterialReagents'] == $sampleExpectedResult['bacterialReagents']) {
                    $score['bacterialReagentsScore'] = $sampleExpectedResult['bacterialReagentsScore'];
                }
                if ($responseResults['isolateProcessing'] == $sampleExpectedResult['isolateProcessing']) {
                    $score['isolateProcessingScore'] = $sampleExpectedResult['isolateProcessing'];
                }
                if ($responseResults['finalIdentification'] == $sampleExpectedResult['finalIdentification']) {
                    $score['finalIdentificationScore'] = $sampleExpectedResult['finalIdentificationScore'];
                }
                $whereResponse['sampleId'] = $responseResults['sampleId'];
                $whereResponse['roundId'] = $responseResults['roundId'];
                $whereResponse['participantId'] = $responseResults['participantId'];
                $whereResponse['adminMarked'] = 0;
                $score['finalScore'] = array_sum($score);

                $score['markedStatus'] = 1;
                $updateLabResults = $this->dbConnection->updateTable('tbl_bac_response_results', $whereResponse, $score);
                if ($updateLabResults['status'] == 0) {
                    return false;
                } else {
                    $updateSuscepibility = $this->updateSuscepibilityScore($whereResponse);
                    if ($updateSuscepibility['status']) {
                        $update['feedBack'] = 1;


                        $update['totalCorrectScore'] = $score['finalScore'];
                        $update['totalMicroAgentsScore'] = $updateSuscepibility['susScore'];

                        $score['totalMicroAgentsScore'] = $updateSuscepibility['susScore'];
                        /* total grading update of marks happens here */
                        $total = $score['totalMicroAgentsScore'] + $update['totalCorrectScore'];
                        $gradingArray = $this->getGradeRemark($total);

                        $update['grade'] = $gradingArray['grade'];
                        $update['remarks'] = $gradingArray['remarks'];

                        $score['grade'] = $gradingArray['grade'];
                        $score['remarks'] = $gradingArray['remarks'];

                        $updateLabResultsResp = $this->dbConnection->updateTable('tbl_bac_response_results', $whereResponse, $score);

                        $updateLabResults = $this->dbConnection->updateTable('tbl_bac_samples_to_users', $whereResponse, $update);

                        if ($updateLabResults['status'] == 0) {
//                            var_dump($updateLabResults);
                        }
                    }
                }
            }
        }
        return true;
    }

    public function getGradeRemark($total) {

        $where = '';
        $range = $this->dbConnection->selectFromTable('tbl_bac_grades', $where);
        $returnArray['grade'] = 'Not Set';
        $returnArray['remarks'] = 'Not Available';

        if ($range != false) {
            foreach ($range as $key => $value) {
                if ($total >= $value->lowerMark && $total <= $value->upperMark) {
                    $returnArray['grade'] = $value->grade;
                    $returnArray['remarks'] = $value->remarks;
                    break;
                }
            }
        }
        return $returnArray;
    }

    public function getMicroLevel($diskContent, $antiMicroAgent) {
        $where['testAgentName'] = $antiMicroAgent;

        $antiMicroAgentData = $this->returnValueWhere($where, 'tbl_bac_test_agents');

        if ($diskContent > 0 && $diskContent <= $antiMicroAgentData['fewRange']) {
            return 'few';
        }
        if ($diskContent > $antiMicroAgentData['fewRange'] && $diskContent <= $antiMicroAgentData['modRange']) {
            return 'mod';
        }
        if ($diskContent > $antiMicroAgentData['modRange'] && $diskContent <= $antiMicroAgentData['manyRange']) {
            return 'many';
        } else {
            return 'outOfRange';
        }
    }

    public function outOfRange($range, $where) {
        
    }

    public function getshipmentsforroundAction() {
        $postedData = $this->returnArrayFromInput();
        $col = ['id', 'shipmentName', 'roundId', 'dateCreated', 'status', 'startRoundFlag', 'evaluated'];
        $orderArray = ['id', 'dateCreated'];

        $postedData['startRoundFlag'] = 1;
//        $postedData['roundId'] = 33;

        $groupArray = ['id'];
        $data = $this->dbConnection->selectReportFromTable('tbl_bac_shipments', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {
            $totalRespondedSamples = 0;
            foreach ($data as $key => $value) {
                $whereShipmentId['shipmentId'] = $value->id;
                $whereShipmentId['roundId'] = $value->roundId;
                $data[$key]->totalSamples = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereShipmentId, 'quantity', true);
                $colSamPan = ['sampleId', 'id'];

                $samplesToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $colSamPan, $whereShipmentId, $orderArray, true, $groupArray);
                $data[$key]->totalRespondedSamples = 0;
                $data[$key]->totalEvaluatedSamples = 0;

                if ($samplesToPanel != false) {
                    foreach ($samplesToPanel as $keyPan => $valPan) {
//                        $whereSamPan['roundId'] = $valPan->id;
                        $whereSamPan['panelToSampleId'] = $valPan->id;
//                        $totalRespondedSamples++;
                        $totalRespondedSamples += $this->dbConnection->selectCount('tbl_bac_response_results', $whereSamPan['panelToSampleId'], 'panelToSampleId');

                        $data[$key]->totalRespondedSamples = $totalRespondedSamples;
                        $whereSamPan['markedStatus'] = 1;
                        $data[$key]->totalEvaluatedSamples += $this->dbConnection->selectCount('tbl_bac_response_results', $whereSamPan, 'id');
                    }
                }

                $data[$key]->totalUnRespondedSamples = $data[$key]->totalSamples - $data[$key]->totalRespondedSamples;
                $data[$key]->totalUnEvaluatedSamples = $data[$key]->totalRespondedSamples - $data[$key]->totalEvaluatedSamples;
            }
//            var_dump($totalRespondedSamples);exit;
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, "msg" => 'No Records available with the selected filters'));
        }

        exit;
    }

    public function updateSuscepibilityScore($whereResponse) {
        try {
            if (isset($whereResponse)) {
                unset($whereResponse['adminMarked']);

                $microAgents = $this->dbConnection->selectFromTable('tbl_bac_micro_bacterial_agents', $whereResponse);

                $whereSampleId = $whereResponse['sampleId'];

                $microExpectedAgents = $this->dbConnection->selectFromTable('tbl_bac_expected_micro_bacterial_agents', $whereSampleId);
                $returnScore = 0;

                if ($microExpectedAgents != false) {
                    foreach ($microAgents as $key => $value) {
                        $score['score'] = 0;
                        foreach ($microExpectedAgents as $ekey => $evalue) {
//                            echo $microAgents[$ekey]->antiMicroAgent .' = '. $microExpectedAgents[$key]->antiMicroAgent.'<br>';
                            if ($evalue->antiMicroAgent == $value->antiMicroAgent) {

//                                $score['score'] =0.5*(round(($microExpectedAgents[$key]->agentScore)/(sizeof($microExpectedAgents)),2));

                                if ($microAgents[$key]->finalScore == $microExpectedAgents[$ekey]->finalScore) {
                                    $score['score'] = round(($microExpectedAgents[$key]->agentScore) / (sizeof($microExpectedAgents)), 2);
                                } else {
                                    $score['score'] = 0;
                                    return array('status' => true, 'susScore' => '');
                                }

                                break;
                            }
                        }
//                        print_r($score);
//                        exit;
                        $returnScore += $score['score'];
                        $whereResponse['antiMicroAgent'] = $microAgents[$key]->antiMicroAgent;
                        $whereResponse['adminMarked'] = 0;
                        $score['markedStatus'] = 1;
                        $updateSuscepibility = $this->dbConnection->updateTable('tbl_bac_micro_bacterial_agents', $whereResponse, $score);
                        if ($updateSuscepibility['status'] == 0) {

                            return false;
                        }
                    }
                }
                return array('status' => true, 'susScore' => $returnScore);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function returnExpectedResults($sampleId) {
        $sampleWhere['sampleId'] = $sampleId;
        $sampleInstructions = $this->returnValueWhere($sampleWhere, 'tbl_bac_expected_results');

        $returnFinalASTExpectedResults = array();
        if ($sampleInstructions != null) {
            $returnFinalASTExpectedResults['expectedResults'] = $sampleInstructions;
        }

        $expectedASTs = $this->dbConnection->selectFromTable('tbl_bac_expected_micro_bacterial_agents', $sampleWhere);
        $returnFinalASTExpectedResults['expectedASTs'] = $expectedASTs;
        return $returnFinalASTExpectedResults;
    }

    public function getlabuserresponseAction() {
        $postedData = $this->returnArrayFromInput();
        $where['userId'] = $postedData['userId'];
        $where['sampleId'] = $postedData['sampleId'];
        $where['roundId'] = $postedData['roundId'];
//        print_r($where);
//        exit;
        $results = $this->returnValueWhere($where, 'tbl_bac_response_results');
        $susceptibility = $this->returnValueWhere($where, 'tbl_bac_suscepitibility');

        $microAgents = $this->dbConnection->selectFromTable('tbl_bac_micro_bacterial_agents', $where);


        $data['results'] = $results;
        $data['susceptibility'] = $susceptibility;
        $data['microAgents'] = $microAgents;
        $postedWhere['sampleId'] = $postedData['sampleId'];
        $data['sampleInstructions'] = $this->returnSampleInstructions($postedWhere);

//        if ($microAgents != false) {
//            foreach ($microAgents as $key => $value) {
//
//                $sampleInfoRange = $this->getMicroLevel($microAgents[$key]->diskContent, $microAgents[$key]->antiMicroAgent);
//                $microAgents[$key]->range = $sampleInfoRange;
//            }
//        }
        $data['expectedResults'] = $this->returnExpectedResults($where['sampleId']);

        echo $this->returnJson(array('status' => 1, 'data' => $data));

        exit;
    }

    public function getroundperformanceAction() {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $whereSearch['grade'] = $postedData['grade'];
            }
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $whereSearch['sampleId'] = $sampleDetails['id'];
            }
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
        }

        $where['roundName'] = $postedData['round'];

        $roundDetails = $this->returnValueWhere($where, 'tbl_bac_rounds');

        $whereSearch['roundId'] = $roundDetails['id'];
        $sum = 0;
        $samples = [];
        if ($roundDetails != false) {
            if (isset($labs) && $labs != false) {

                $report = [];
                foreach ($labs as $key => $value) {

                    $whereSearch['participantId'] = $value->participant_id;
                    $orderArray = ['id', 'dateCreated'];
                    $col = ['*'];

                    $groupArray = ['id'];
                    $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true, $groupArray);
                    if ($reportData != false) {

                        foreach ($reportData as $keys => $val) {

                            $whereSampleId['id'] = $val->sampleId;
                            $whereRoundId['id'] = $val->roundId;

                            $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');

                            $reportData[$keys]->labName = $value->institute_name;
                            $reportData[$keys]->county = $value->region;
                            $reportData[$keys]->unique_identifier = $value->unique_identifier;

                            $reportData[$keys]->roundName = $roundInfo['roundName'];
                            $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                            $reportData[$keys]->batchName = $sampleInfo['batchName'];
                            $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                            $reportData[$keys]->unique_identifier = $value->unique_identifier;
                            $reportData[$keys]->status = 'valid';
                            array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                            $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                            array_push($report, (array) $reportData[$keys]);
                        }
                    }
                }
                $stat['total'] = $sum;
                $stat['mean'] = round($sum / sizeof($report), 4);
                $stat['labs'] = sizeof($report);
                $stat['sd'] = $this->standard_deviation($samples);

                if (!empty($report)) {
                    echo $this->returnJson(array('status' => 1, 'data' => $report, 'stat' => $stat));
                }
            } else {
                if (isset($labs)) {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                    exit;
                }
                $orderArray = ['id', 'dateCreated'];
                $col = ['*'];

                $groupArray = ['id'];
                $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true, $groupArray);
                if ($reportData != false) {

                    foreach ($reportData as $keys => $val) {

                        $whereSampleId['id'] = $val->sampleId;
                        $whereRoundId['id'] = $val->roundId;
                        $whereLabId['participant_id'] = $val->participantId;

                        $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                        $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                        $labInfo = $this->returnValueWhere($whereLabId, 'participant');

                        $reportData[$keys]->labName = $labInfo['institute_name'];
                        $reportData[$keys]->county = $labInfo['region'];
                        $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];

                        $reportData[$keys]->roundName = $roundInfo['roundName'];
                        $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                        $reportData[$keys]->batchName = $sampleInfo['batchName'];
                        $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                        $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];
                        $reportData[$keys]->status = 'valid';
                        array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                        $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                    }
                    $stat['total'] = $sum;
                    $stat['mean'] = round($sum / sizeof($reportData), 4);
                    $stat['sd'] = $this->standard_deviation($samples);
                    $stat['labs'] = sizeof($reportData);
                    echo $this->returnJson(array('status' => 1, 'data' => $reportData, 'stat' => $stat));
                } else {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                }
//                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
        }

        exit;
    }

    public function getshipmentsreportsAction() {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $postedData['grade'] = $postedData['grade'];
            }
            unset($postedData['grade']);
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $postedData['sampleId'] = $sampleDetails['id'];
            }
            unset($postedData['sample']);
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
            unset($postedData['region']);
        }
        if (isset($postedData['round'])) {
            if ($postedData['round'] == '') {
                unset($postedData['round']);
            } else {
                $whereRound['roundName'] = $postedData['round'];
                $roundDetails = $this->returnValueWhere($whereRound, 'tbl_bac_rounds');

                $postedData['roundId'] = $roundDetails['id'];
            }
            unset($postedData['round']);
        }


        $orderArray = ['id', 'dateCreated'];
        $col = ['*'];

        $groupArray = ['shipmentId', 'roundId', 'sampleId'];


        $report = [];
        $postedData['roundId >'] = 0;
        if (isset($labs)) {
            if ($labs != false) {


                $data['totalResponded'] = 0;
                foreach ($labs as $key => $value) {
                    $postedData['participantId'] = $value->participant_id;
                    $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);

                    if ($sampleToPanel != false) {
                        foreach ($sampleToPanel as $ky => $val) {
                            $whereParticipantId['participant_id'] = $val->participantId;
                            $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                            $whereSampleId['id'] = $val->sampleId;
                            ;
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                            $roundId['id'] = $val->roundId;
                            ;
                            $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                            $sampleToPanel[$ky]->sample = $sampleInfo;
                            $sampleToPanel[$ky]->round = $roundInfo;
                            $sampleToPanel[$ky]->lab = $participantInfo;

                            $whereSamples['sampleId'] = $val->sampleId;
                            $whereSamples['shipmentId'] = $val->shipmentId;

                            $sampleToPanel[$ky]->totalSent = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');

                            $whereSamples['deliveryStatus'] = 4;
                            $sampleToPanel[$ky]->received = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                            $whereSamples['deliveryStatus'] = 5;
                            $sampleToPanel[$ky]->rejected = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                            unset($whereSamples);
                            array_push($report, (array) $sampleToPanel[$ky]);
                        }
                    }
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {

//            $postedData['shipmentId >'] = 0;
            $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);

            if ($sampleToPanel != false) {
                foreach ($sampleToPanel as $ky => $val) {
                    $whereParticipantId['participant_id'] = $val->participantId;
                    $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                    $whereSampleId['id'] = $val->sampleId;
                    ;
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $roundId['id'] = $val->roundId;
                    ;
                    $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                    $sampleToPanel[$ky]->sample = $sampleInfo;
                    $sampleToPanel[$ky]->round = $roundInfo;
                    $sampleToPanel[$ky]->lab = $participantInfo;

                    $whereSamples['sampleId'] = $val->sampleId;
                    $whereSamples['shipmentId'] = $val->shipmentId;

                    $sampleToPanel[$ky]->totalSent = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');

                    $whereSamples['deliveryStatus'] = 4;
                    $sampleToPanel[$ky]->received = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                    $whereSamples['deliveryStatus'] = 5;
                    $sampleToPanel[$ky]->rejected = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                    unset($whereSamples);
                }

                echo $this->returnJson(array('status' => 1, 'data' => $sampleToPanel));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function getcorrectiveaactionreportAction() {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $postedData['grade'] = $postedData['grade'];
            }
            unset($postedData['grade']);
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $postedData['sampleId'] = $sampleDetails['id'];
            }
            unset($postedData['sample']);
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
            unset($postedData['region']);
        }
        if (isset($postedData['round'])) {
            if ($postedData['round'] == '') {
                unset($postedData['round']);
            } else {
                $whereRound['roundName'] = $postedData['round'];
                $roundDetails = $this->returnValueWhere($whereRound, 'tbl_bac_rounds');

                $postedData['roundId'] = $roundDetails['id'];
            }
            unset($postedData['round']);
        }


        $orderArray = ['id', 'dateCreated'];
        $col = ['id', 'participantId', 'roundId', 'sampleId', 'remarks', 'grade', 'adminRemarks', 'correctiveAction', 'dateCreated'];

        $groupArray = ['id'];


        $report = [];

        $postedData['correctiveAction'] = 1;
        if (isset($labs)) {
            if ($labs != false) {


                $data['totalResponded'] = 0;
                foreach ($labs as $key => $value) {
                    $postedData['participantId'] = $value->participant_id;
                    $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $postedData, $orderArray, true, $groupArray);
                    if ($sampleToPanel != false) {
                        foreach ($sampleToPanel as $ky => $val) {
                            $whereParticipantId['participant_id'] = $val->participantId;
                            $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                            $whereSampleId['id'] = $val->sampleId;
                            ;
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                            $roundId['id'] = $val->roundId;
                            ;
                            $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                            $sampleToPanel[$ky]->sample = $sampleInfo;
                            $sampleToPanel[$ky]->round = $roundInfo;
                            $sampleToPanel[$ky]->lab = $participantInfo;

                            array_push($report, (array) $sampleToPanel[$ky]);
                        }
                    }
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            $postedData['roundId >'] = 0;
            $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $postedData, $orderArray, true, $groupArray);
            if ($sampleToPanel != false) {
                foreach ($sampleToPanel as $ky => $val) {
                    $whereParticipantId['participant_id'] = $val->participantId;
                    $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                    $whereSampleId['id'] = $val->sampleId;
                    ;
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $roundId['id'] = $val->roundId;
                    ;
                    $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                    $sampleToPanel[$ky]->sample = $sampleInfo;
                    $sampleToPanel[$ky]->round = $roundInfo;
                    $sampleToPanel[$ky]->lab = $participantInfo;
                }

                echo $this->returnJson(array('status' => 1, 'data' => $sampleToPanel));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function getroundparticipatoryAction() {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $postedData['grade'] = $postedData['grade'];
            }
            unset($postedData['grade']);
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $postedData['sampleId'] = $sampleDetails['id'];
            }
            unset($postedData['sample']);
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
            unset($postedData['region']);
        }
        if (isset($postedData['round'])) {
            if ($postedData['round'] == '') {
                unset($postedData['round']);
            } else {
                $whereRound['roundName'] = $postedData['round'];
                $roundDetails = $this->returnValueWhere($whereRound, 'tbl_bac_rounds');

                $postedData['roundId'] = $roundDetails['id'];
            }
            unset($postedData['round']);
        }


        $orderArray = ['id', 'dateCreated'];
        $col = ['id', 'participantId', 'roundId', 'sampleId'];

        $groupArray = ['participantId', 'roundId', 'sampleId'];

//        var_dump($labs);
//        exit;
        $report = [];

        $data['totalResponded'] = 0;
        $data['totalUnresponded'] = 0;
        $data['totalTotalEvaluated'] = 0;
        $data['totalTotalUnevaluated'] = 0;
        $data['totalLabsAndSamples'] = 0;

        if (isset($labs)) {
            if ($labs != false) {


                $data['totalResponded'] = 0;
                foreach ($labs as $key => $value) {
                    $postedData['participantId'] = $value->participant_id;
                    $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);
                    if ($sampleToPanel != false) {
                        foreach ($sampleToPanel as $ky => $val) {

                            $where['participantId'] = $val->participantId;
                            $where['roundId'] = $val->roundId;
                            $where['sampleId'] = $val->sampleId;

                            $whereSampleId['id'] = $where['sampleId'];
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                            $roundId['id'] = $where['roundId'];
                            $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');
                            $data['sample'] = $sampleInfo;
                            $data['round'] = $roundInfo;

                            $data['totalResponded'] = $this->dbConnection->selectCount('tbl_bac_response_results', $where, 'roundId');


                            $evaluated = $where;
                            $unevaluated['markedStatus'] = 1;
                            $data['totalTotalEvaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $evaluated, 'roundId');
                            $unevaluated = $where;
                            $unevaluated['markedStatus'] = 0;
                            $data['totalTotalUnevaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $unevaluated, 'roundId');

                            $data['totalLabsAndSamples'] = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $where, 'roundId');
                            $data['totalUnresponded'] = $data['totalLabsAndSamples'] - $data['totalResponded'];
                            $data['responseRate'] = round(($data['totalResponded'] / $data['totalLabsAndSamples']) * 100, 2);
                            array_push($report, $data);
                        }
                    }
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            $postedData['roundId >'] = 0;
            $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);
            if ($sampleToPanel != false) {
                foreach ($sampleToPanel as $ky => $val) {

                    $where['participantId'] = $val->participantId;
                    $where['roundId'] = $val->roundId;
                    $where['sampleId'] = $val->sampleId;

                    $whereSampleId['id'] = $where['sampleId'];
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $roundId['id'] = $where['roundId'];
                    $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');
                    $data['sample'] = $sampleInfo;
                    $data['round'] = $roundInfo;

                    $data['totalResponded'] = $this->dbConnection->selectCount('tbl_bac_response_results', $where, 'roundId');


                    $evaluated = $where;
                    $unevaluated['markedStatus'] = 1;
                    $data['totalTotalEvaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $evaluated, 'roundId');
                    $unevaluated = $where;
                    $unevaluated['markedStatus'] = 0;
                    $data['totalTotalUnevaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $unevaluated, 'roundId');

                    $data['totalLabsAndSamples'] = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $where, 'roundId');
                    $data['totalUnresponded'] = $data['totalLabsAndSamples'] - $data['totalResponded'];
                    $data['responseRate'] = round(($data['totalResponded'] / $data['totalLabsAndSamples']) * 100, 2);
                    array_push($report, $data);
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function getlabperformanceAction() {
        $postedData = $this->returnArrayFromInput();

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            }
        }
        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            }
        }
        $sum = 0;
        $samples = [];
        if (isset($postedData['region'])) {
            $county = $postedData['region'];
            unset($postedData['region']);
            $whereCounty['region'] = $county;
            $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            $where = $postedData;
            if ($labs != false) {

                $report = [];
                foreach ($labs as $key => $value) {

                    $where['participantId'] = $value->participant_id;
                    $orderArray = ['id', 'dateCreated'];
                    $col = ['*'];

                    $groupArray = ['id'];
                    $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $where, $orderArray, true, $groupArray);
                    if ($reportData != false) {

                        foreach ($reportData as $keys => $val) {

                            $whereSampleId['id'] = $val->sampleId;
                            $whereRoundId['id'] = $val->roundId;

                            $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');

                            $reportData[$keys]->labName = $value->institute_name;
                            $reportData[$keys]->county = $value->region;
                            $reportData[$keys]->unique_identifier = $value->unique_identifier;

                            $reportData[$keys]->roundName = $roundInfo['roundName'];
                            $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                            $reportData[$keys]->batchName = $sampleInfo['batchName'];
                            $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                            $reportData[$keys]->unique_identifier = $value->unique_identifier;
                            $reportData[$keys]->status = 'valid';
                            array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                            $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                            array_push($report, (array) $reportData[$keys]);
                        }
                    }
                }
                $stat['total'] = $sum;
                $stat['mean'] = round($sum / sizeof($report), 4);
                $stat['labs'] = sizeof($report);
                $stat['sd'] = $this->standard_deviation($samples);

                if (!empty($report)) {
                    echo $this->returnJson(array('status' => 1, 'data' => $report, 'stat' => $stat));
                }
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            $where = $postedData;
            $orderArray = ['id', 'dateCreated'];
            $col = ['*'];

            $groupArray = ['id'];
            $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $where, $orderArray, true, $groupArray);
            if ($reportData != false) {

                foreach ($reportData as $keys => $val) {

                    $whereSampleId['id'] = $val->sampleId;
                    $whereRoundId['id'] = $val->roundId;
                    $whereLabId['participant_id'] = $val->participantId;

                    $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $labInfo = $this->returnValueWhere($whereLabId, 'participant');

                    $reportData[$keys]->labName = $labInfo['institute_name'];
                    $reportData[$keys]->county = $labInfo['region'];
                    $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];

                    $reportData[$keys]->roundName = $roundInfo['roundName'];
                    $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                    $reportData[$keys]->batchName = $sampleInfo['batchName'];
                    $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                    $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];
                    $reportData[$keys]->status = 'valid';
                    array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                    $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                }
                $stat['total'] = $sum;
                $stat['mean'] = round($sum / sizeof($reportData), 4);
                $stat['sd'] = $this->standard_deviation($samples);
                $stat['labs'] = sizeof($reportData);
                echo $this->returnJson(array('status' => 1, 'data' => $reportData, 'stat' => $stat));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function standard_deviation($aValues, $bSample = false) {
        $fMean = array_sum($aValues) / count($aValues);
        $fVariance = 0.0;
        foreach ($aValues as $i) {
            $fVariance += pow($i - $fMean, 2);
        }
        $fVariance /= ($bSample ? count($aValues) - 1 : count($aValues));
        return (float) sqrt($fVariance);
    }

    public function getcountiesAction() {
        $where['status'] = 1;
        $counties = $this->dbConnection->selectFromTable('rep_counties', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $counties));

        exit;
    }

    public function getgradesAction() {
        $where['status'] = 1;
        $grades = $this->dbConnection->selectFromTable('tbl_bac_grades', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $grades));

        exit;
    }

    public function getroundsAction() {
        $where['status'] = 1;
        $rounds = $this->dbConnection->selectFromTable('tbl_bac_rounds', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $rounds));

        exit;
    }

    public function getsamplesAction() {
        $where['status'] = 1;
        $samples = $this->dbConnection->selectFromTable('tbl_bac_samples', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $samples));

        exit;
    }

}
