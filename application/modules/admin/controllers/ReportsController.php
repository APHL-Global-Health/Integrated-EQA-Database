<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 3/7/2017
 * Time: 11:36
 */
require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
    . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . 'Bacteriology' . DIRECTORY_SEPARATOR . 'application'
    . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'main.php';

require_once 'BacteriologydbciController.php';

class Admin_ReportsController extends Admin_BacteriologydbciController
{

    public function testAction()
    {
        $arr = array('Hello', 'World!', 'Beautiful', 'Day!');
        echo implode(",", $arr);
        exit;
    }

    /* selectReportFromTable($tableName,$colArray, $where ,$orderArray, $group='',$groupArray='') */

    public function getgeneralroundreportAction()
    {
        $postedData = $this->returnArrayFromInput();
        $col = ['*'];
        $orderArray = ['id', 'startDate'];

        $groupArray = ['id'];


        $data = $this->dbConnection->selectReportFromTable('tbl_bac_rounds', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {
            foreach ($data as $key=>$value){
                $round = $this->returnValueWhere($value->id, 'tbl_bac_rounds');

                $data[$key]->daysLeft = $this->converttodays($data[$key]->endDate);
                $data[$key]->currentStatus = $data[$key]->daysLeft > 0 ? "RUNNING" : "ENDED";
                $data[$key]->totalShipmentsAdded = $this->dbConnection->selectCount('tbl_bac_shipments', $value->id, 'roundId');
            }
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        }else{
            echo $this->returnJson(array('status' => 0,"msg"=>'No Records available with the selected filters'));
        }
        exit;
    }


}