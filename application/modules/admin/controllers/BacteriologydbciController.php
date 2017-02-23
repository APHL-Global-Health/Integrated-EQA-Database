<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 1/13/2017
 * Time: 16:40
 */
require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
    . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . 'Bacteriology' . DIRECTORY_SEPARATOR . 'application'
    . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'main.php';

class Admin_BacteriologydbciController extends Zend_Controller_Action
{
    protected $homeDir;
    protected $dbConnection;

    public function init()
    {

        $this->homeDir = dirname($_SERVER['DOCUMENT_ROOT']);
        $this->dbConnection = new Main();
    }


    public function returnTotalCount($tableName, $id, $column)
    {

        try {
            $where[$column] = $id;
            return $this->dbConnection->selectCount($tableName, $where);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function returnJson($dataArray)
    {
        if (sizeof($dataArray) > 0) {
            return json_encode($dataArray);

        } else {
            return (json_encode(array('status' => 0)));
        }
    }

    public function savesamplestopanelAction()
    {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array)(json_decode($jsPostData));
            $idArray = $jsPostData['sampleIds'];
            $idArray = (array)$idArray;

            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {
                    //   $connection = new Main();
                    $value = ((array)$value);

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

    public function saveuserstosampleAction()
    {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array)(json_decode($jsPostData));
            $idArray = $jsPostData['userIds'];

            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {
                    //   $connection = new Main();
                    $data['userId'] = $value;
                    $data['sampleId'] = $jsPostData['sampleId'];
                    $data['panelToSampleId'] = $jsPostData['panelToSampleId'];
                    $data['roundId'] = $jsPostData['roundId'];
                    $response = $this->dbConnection->insertData('tbl_bac_samples_to_users', $data);


                }
                echo $this->returnJson($response);
            }
            exit();
        } catch (Exception $error) {
            echo $error->getMessage();
        }

    }


    public function savepaneltoshipmentAction()
    {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array)(json_decode($jsPostData));
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

    public function savelabstoroundAction()
    {
        try {
            $jsPostData = file_get_contents('php://input');

            $jsPostData = (array)(json_decode($jsPostData));
            $idArray = $jsPostData['labId'];


            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {

                    $data['labId'] = $value;
                    $data['roundId'] = $jsPostData['roundId'];
                    $response = $this->dbConnection->insertData('tbl_bac_rounds_labs', $data);

                    $updateData['status'] = 2;
                    $this->dbConnection->updateTable('tbl_bac_ready_labs', $data, $updateData);
                    $this->savePanelForEachLab($data['roundId'], $data['labId']);
                }
                echo $this->returnJson($response);
            }
            exit();
        } catch (Exception $error) {
            echo $error->getMessage();
        }

    }

    public function savePanelForEachLab($round, $labId)
    {
        $where['roundId'] = $round;

        $dataDB = $this->dbConnection->selectFromTable('tbl_bac_shipments', $where);

        if ($dataDB != false) {
            foreach ($dataDB as $key => $value) {

                $whereShipmentId['shipmentId'] = $dataDB[$key]->id;
                $whereShipmentId['participantId'] = null;
                $panels = $this->dbConnection->selectFromTable('tbl_bac_panels_shipments', $whereShipmentId);
//                var_dump($dataDB);
//                exit;
                if ($panels != false) {
                    $deleteNullPanel['shipmentId'] = $whereShipmentId['shipmentId'];
                    $deleteNullPanel['panelId'] = $panels[$key]->panelId;
                    foreach ($panels as $key => $panelValue) {
                        $insert['panelId'] = $panels[$key]->panelId;
                        $insert['shipmentId'] = $whereShipmentId['shipmentId'];
                        $insert['deliveryStatus'] = $panels[$key]->deliveryStatus;
                        $insert['participantId'] = $labId;
                        $insert['roundId'] = $round;
                        $insert['createdBy'] = $this->dbConnection->getUserSession();

                        $response = $this->dbConnection->insertData('tbl_bac_panels_shipments', $insert);


                    }
                    if (isset($deleteNullPanel)) {
                        $deleteNullPanel['panelId'] = null;
                        //$status = $this->dbConnection->deleteFromWhere('tbl_bac_panels_shipments', $deleteNullPanel);
                    }
                }

            }


        } else {
            exit;
        }

    }

    public function insertAction()
    {
        $jsPostData = file_get_contents('php://input');

        $jsPostData = (array)(json_decode($jsPostData));
        if (is_array($jsPostData)) {

            $dataDB['data'] = $this->dbConnection->insertData($jsPostData['tableName'], (array)$jsPostData['data']);
            $dataDB['status'] = 1;
        } else {
            $dataDB['status'] = 0;
        }
        echo $this->returnJson($dataDB);

        exit();
    }

    public function returnValueWhere($id, $tableName)
    {
        $returnArray = '';
        if ($tableName == 'data_manager') {
            $whereId['dm_id'] = $id;
        } else if ($tableName == 'participant') {
            $whereId['participant_id'] = $id;
        } else if ($tableName == 'participant_manager_map') {
            $whereId['dm_id'] = $id;
        } else {
            $whereId['id'] = $id;
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
                    return '';
                }
            } else {

            }
        }
        return (array)$returnArray;
        exit();
    }

    public function testpdfAction()
    {

        exit();

    }

    public function returnWithRefColNames($tableName, $where)
    {
        try {

            $dataDB = $this->dbConnection->selectFromTable($tableName, $where);
//            echo(size($dataDB));
//            exit;
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
                    } else if ($tableName == 'tbl_bac_sample_to_panel') {
                        $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');

                        $dataDB[$key]->batchName = $sample['batchName'];
                        $dataDB[$key]->datePrepared = $sample['datePrepared'];
                        $dataDB[$key]->bloodPackNo = $sample['bloodPackNo'];
                        $dataDB[$key]->materialOrigin = $sample['materialOrigin'];
                        $dataDB[$key]->dateCreated = substr($dataDB[$key]->dateCreated, 0, 10);
                        $dataDB[$key]->datePrepared = substr($dataDB[$key]->datePrepared, 0, 10);
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

    public function getwheredeliveryAction()
    {
        try {
            $postedData = file_get_contents('php://input');
            $postedData = (array)(json_decode($postedData));

            $tableName = $postedData['tableName'];

            $where = $postedData['where'];
            $where = (array)($where);

//            print_r($where);
//            exit;
            $dataDB = $this->dbConnection->selectFromDStatusTable($tableName, $where);
//            var_dump($dataDB);
//            echo sizeof($dataDB);
//            exit;
            if ($dataDB != false) {

                if ($tableName == 'tbl_bac_panel_mst' || $tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_panels_shipments'
                    || $tableName == 'tbl_bac_samples_to_users' || $tableName == 'tbl_bac_rounds'
                ) {
                    foreach ($dataDB as $key => $value) {

                        $dataDB[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->id, 'panelId');

                        if ($tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_samples_to_users') {

                            $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');

                            $dataDB[$key]->batchName = $sample['batchName'];
                            $dataDB[$key]->datePrepared = $sample['datePrepared'];
                            $dataDB[$key]->bloodPackNo = $sample['bloodPackNo'];
                            $dataDB[$key]->materialOrigin = $sample['materialOrigin'];
                            $dataDB[$key]->dateCreated = substr($dataDB[$key]->dateCreated, 0, 10);
                            $dataDB[$key]->datePrepared = substr($dataDB[$key]->datePrepared, 0, 10);

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

    public function updateroundstartAction()
    {
        try {
            $data['status'] = 0;
            $dataArray = $this->returnArrayFromInput();

            if (is_array($dataArray)) {

                $data = $this->dbConnection->updateTable($dataArray['tableName'], (array)$dataArray['where'], (array)$dataArray['updateData']);
                $arr = (array)$dataArray['where'];
                $where['roundId'] = $arr['id'];
                $data = $this->dbConnection->updateTable('tbl_bac_shipments', $where, (array)$dataArray['updateData']);

                $data = $this->dbConnection->updateTable('tbl_bac_panels_shipments', $where, (array)$dataArray['updateData']);
                $data = $this->dbConnection->updateTable('tbl_bac_sample_to_panel', $where, (array)$dataArray['updateData']);

                if ($dataArray['tableName'] == 'tbl_bac_shipments') {

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

    public function converttodays($endDate, $startDate = null)
    {
        if (isset($startDate)) {
            $diff = $endDate - strtotime($startDate);
        } else {
            $diff = strtotime($endDate) - time();
        }
        $diff = round($diff / (60 * 60 * 24), 1);
        return $diff > 0 ? $diff : 0;
        exit;
    }

    public function returnTotalSamples($array, $tableName)
    {
        if (count($array)) {
            foreach ($array as $key => $value) {
                if ($tableName == 'tbl_bac_panel_mst') {
                    $array[$key]->totalSamplesAdded = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $value->id, 'panelId');
                }
                if ($tableName == 'tbl_bac_shipments') {
                    $where['participantId !'] = NULL;
                    $where['shipmentId'] = $value->id;
                    $array[$key]->totalPanelsAdded = $this->dbConnection->selectCount('tbl_bac_panels_shipments', $where, 'shipmentId');
                }
            }
        }
        return $array;
    }

    public function getdistinctpanelsAction()
    {

        $postedData = file_get_contents('php://input');
        $postedData = (array)(json_decode($postedData));
        //
        $where = (array)$postedData['where'];
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

    public function selectfromtableAction()
    {
        try {
            $postedData = file_get_contents('php://input');
            $postedData = (array)(json_decode($postedData));

            $tableName = $postedData['tableName'];
            if (isset($postedData['where'])) {
                $where = $postedData['where'];
                $where = (array)($where);
            } else {
                $where = '';
            }


            $where = sizeof($where) > 0 ? $where : "";


            if ($tableName == 'tbl_bac_panels_shipments') {
                $dataDB = $this->returnWithRefColNames($tableName, $where);
            } else if ($tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_ready_labs') {
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

    public function returnArrayFromInput()
    {
        $postedData = file_get_contents('php://input');
        $postedData = (array)(json_decode($postedData));

        return $postedData;
    }

    public function customdeleteAction()
    {
        try {
            $postedData = file_get_contents('php://input');
            $postedData = (array)(json_decode($postedData));


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

    public function getusersamplesissuedAction()
    {
        try {

            $where['userId'] = $this->dbConnection->getUserSession();

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

    public function getsampleallusersAction()
    {
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

    public function updatetablewhereAction()
    {
        try {
            $data['status'] = 0;
            $dataArray = $this->returnArrayFromInput();

            if (is_array($dataArray)) {

                $data = $this->dbConnection->updateTable($dataArray['tableName'], (array)$dataArray['where'], (array)$dataArray['updateData']);
                if ($dataArray['tableName'] == 'tbl_bac_shipments') {

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

    public function saveshipmentstoroundAction()
    {
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

    public function getPanelsFromShipment($where)
    {

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

    public function returnUserLabDetails()
    {
        $loggedIn = $this->dbConnection->getUserSession();
        try {
            $userLab = $this->returnValueWhere($loggedIn, 'participant_manager_map');
            $userLabDetails = $this->returnValueWhere($userLab['participant_id'], 'participant');
            return $userLabDetails;

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function generatelabelsAction()
    {
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
}