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


    public function returnJson($dataArray)
    {
        if (sizeof($dataArray) > 0) {
            return json_encode($dataArray);

        } else {
            return (json_encode(array('status' => 0)));
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

        $where = file_get_contents('php://input');
        $where = (array)(json_decode($where));
        $where = sizeof($where) > 0 ? $where : "";
        $connection = new Main();
        $dataDB = $connection->selectFromTable('tbl_bac_samples', $where);

        if (sizeof($dataDB) > 0) {
            $data['status'] = 1;
            $data['data'] = $dataDB;
            echo($this->returnJson($data));
        } else {
            echo($this->returnJson(json_encode(array('status' => 0))));
        }
        exit();
    }

}