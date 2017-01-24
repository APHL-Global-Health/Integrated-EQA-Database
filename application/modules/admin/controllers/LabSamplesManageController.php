<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 1/24/2017
 * Time: 11:01
 */
class Admin_LabSamplesManageController extends Zend_Controller_Action
{
    public function init()
    {

    }

    public function indexAction()
    {

    }

    public function returnJason($data)
    {
        echo json_encode($data);
    }

    public function testAction()
    {

    }

    public function getallsamplesAction()
    {
        $data['status'] = 3;
        $this->returnJason($data);
        exit;


    }
}