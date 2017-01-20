<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 1/13/2017
 * Time: 16:40
 */
require_once 'C:\xampp\htdocs\ePT-Repository\library\Bacteriology\application\controllers\main.php';

class Admin_BacteriologydbciController extends Zend_Controller_Action
{
    protected $homeDir;
    protected $dbConnection;

    public function init()
    {

        $this->homeDir = dirname($_SERVER['DOCUMENT_ROOT']);
        $this->dbConnection = new Main();
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

    public function returnValueWhere($id, $tableName, $col)
    {
        $returnArray = '';
        $whereId['id'] = $id;
//        $col ='shipmentName';
//        $tableName='tbl_bac_shipments';
        if (is_numeric($whereId['id'])) {
            $dataDB = $this->dbConnection->selectFromTable($tableName, $whereId);
            if (sizeof($dataDB) > 0) {
                foreach ($dataDB as $key => $value) {
                    // array_push($returnArray,$value);
                    $returnArray = $value->$col;
                }
            } else {

            }
        }
        return $returnArray;
        exit();
    }

    public function returnWithRefColNames($tableName, $where)
    {
        try {

            $dataDB = $this->dbConnection->selectFromTable($tableName, $where);
            if (sizeof($dataDB) > 0) {

                foreach ($dataDB as $key => $value) {

                    $dataDB[$key]->panelName = $this->returnValueWhere($value->panelId, 'tbl_bac_panel_mst', 'panelName');
                    $dataDB[$key]->panelDatePrepared = $this->returnValueWhere($value->panelId, 'tbl_bac_panel_mst', 'panelDatePrepared');
                }
            }
            return $dataDB;
        } catch
        (Exception $e) {
            $e->getMessage();
        }

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


            //$connection = new Main();
            if ($tableName == 'tbl_bac_panels_shipments') {
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

}