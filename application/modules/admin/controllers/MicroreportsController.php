<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 3/7/2017
 * Time: 10:07
 */
class Admin_MicroreportsController extends Zend_Controller_Action
{

    protected $_microReportModel;

    protected $_commonService;

    public function init()
    {
        $this->_microReportModel = new Application_Model_DbTable_MicroReports();
        $this->_commonService = new Application_Service_Common();
    }

    public function indexAction()
    {

    }

    //has optional parameter of date//range

    public function returnArrayFromInput()
    {
        $postedData = file_get_contents('php://input');
        $postedData = (array)(json_decode($postedData));

        return $postedData;
    }

    public function getroundsAction()
    {

        $params = $this->returnArrayFromInput();
        $where = null;
        if (isset($where)) {

            $where['dateCreated'] = $params['dateFrom'];
        }

        echo json_encode($this->_microReportModel->getRounds($where));

        exit;
    }


    //has an option parameter of county
    public function getLabsAction()
    {
        $params = $this->returnArrayFromInput();
        $where = null;
        if (isset($where)) {

            $where['dateCreated'] = $params['dateFrom'];
        }

        echo json_encode($this->_microReportModel->getLabs($where));

        exit;
    }

    //has an optional parameter of roundid
    public function getsamplesAction()
    {

        $params = $this->returnArrayFromInput();
        $where = null;
        if (isset($where)) {

            $where['roundId'] = $params['roundId'];
            $where['dateCreated'] = $params['dateCreated'];
        }
        echo json_encode($this->_microReportModel->getSamples($where));

        exit;
    }

    public function getgradesAction()
    {
        $params = $this->returnArrayFromInput();
        $where = null;
        if (isset($where)) {

            $where['roundId'] = $params['roundId'];
            $where['dateCreated'] = $params['dateCreated'];
        }
        echo json_encode($this->_microReportModel->getGrades($where));

        exit;
    }

    //has a parameter of mflcode
    public function getlabwithmflcodeAction()
    {
        $params = $this->returnArrayFromInput();
        $where = null;
        if (isset($where)) {

            $where['roundId'] = $params['roundId'];
            $where['dateCreated'] = $params['dateCreated'];
        }
        echo json_encode($this->_microReportModel->getlabwithmflcode($where));

        exit;
    }

    //no parameters
    public function getcountiesAction()
    {
        $params = $this->returnArrayFromInput();
        $where = null;
        if (isset($where)) {

            $where['roundId'] = $params['roundId'];
            $where['dateCreated'] = $params['dateCreated'];
        }
        echo json_encode($this->_microReportModel->getCounties($where));

        exit;
    }
    //


}