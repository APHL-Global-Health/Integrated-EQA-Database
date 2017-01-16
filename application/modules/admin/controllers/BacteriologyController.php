<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 1/13/2017
 * Time: 09:52
 */
class Admin_BacteriologyController extends Zend_Controller_Action
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