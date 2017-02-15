<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 1/13/2017
 * Time: 16:40
 */
require_once dirname($_SERVER['DOCUMENT_ROOT']).'\library\Bacteriology\application\controllers\main.php';

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
            //print_r($jsPostData);

            if (is_array($jsPostData)) {
                $response = [];
                foreach ($idArray as $value) {
                    $connection = new Main();
                    $data['sampleId'] = $value;
                    $data['panelId'] = $jsPostData['panelId'];
                    $response = $connection->insertData('tbl_bac_sample_to_panel', $data);


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
            $connection = new Main();
            $dataDB['data'] = $connection->insertData($jsPostData['tableName'], (array)$jsPostData['data']);
            $dataDB['status'] = 1;
        } else {
            $dataDB['status'] = 0;
        }
        echo $this->returnJson($dataDB);

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
            } else {
                $where = '';
            }


            $where = sizeof($where) > 0 ? $where : "";


            $connection = new Main();
            $dataDB = $connection->selectFromTable($tableName, $where);

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