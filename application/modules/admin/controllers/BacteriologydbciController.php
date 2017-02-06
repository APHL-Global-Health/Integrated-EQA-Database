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

    public function rootdirAction()
    {
        $this->dbConnection->testpdf();

        exit();

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

            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {
                    //   $connection = new Main();
                    $data['sampleId'] = $value;
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
                        $dataDB[$key]->panelDatePrepared = $panel['panelDatePrepared'];

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
            if ($tableName == 'tbl_bac_panel_mst' || $tableName == 'tbl_bac_sample_to_panel' || $tableName == 'tbl_bac_samples_to_users') {
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
            } else if ($tableName == 'tbl_bac_sample_to_panel') {
                $dataDB = $this->returnWithRefColNames($tableName, $where);
            } else {
                $dataDB = $this->dbConnection->selectFromTable($tableName, $where);
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

    public function getusersessionAction()
    {
        print_r($this->dbConnection->getUserSession());
        exit();
    }
}