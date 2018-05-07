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
    public function getlabsAction()
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

    public function returnValidWhereArray($params, $table = 'p')
    {
        $where = null;
        isset($params['roundId']) && !$params['roundId'] == 0 ? $where['roundId'] = $params['roundId'] : false;
        isset($params['dateFrom']) ? $where['dateFrom'] = $params['dateFrom'] : false;
        isset($params['dateTo']) ? $where['dateTo'] = $params['dateTo'] : false;
        isset($params['participantId']) && !$params['participantId'] == 0 ? $where[$table . '.participantId'] = $params['participantId'] : false;
        isset($params['region']) && !$params['region'] == 0 ? $where['region'] = $params['region'] : false;


        return $where;
    }

    public function sampletypesAction()
    {


        $params = (array)$this->returnArrayFromInput()['where'];
        $where = null;


        if (isset($params)) {

            $where = $this->returnValidWhereArray($params, 'r');
        }

        $samples = $this->_microReportModel->getFilteredSamplesResults($where);

        $response = array();
        foreach ($samples as $key => $value) {
            array_push($response, $this->_microReportModel->getSampleIdSampleTypes($value['sampleId']));

        }
        $arrayAcceptable = array();
        $arrayUnacceptable = array();
        for ($i = 0; $i < count($samples); $i++) {


            foreach ($response[$i] as $key => $value) {


                $aP = ($value['ACCEPTABLE'] + $value['UNACCEPTABLE']) > 0 ? ($value['ACCEPTABLE'] / ($value['ACCEPTABLE'] + $value['UNACCEPTABLE'])) * 100 : 0;


                array_push($arrayAcceptable, array("x" => $value['newSampleName'], "y" => $aP));
                array_push($arrayUnacceptable, array("x" => $value['newSampleName'], "y" => 100 - $aP));


            }
        }
        $structuredArray = array("status" => 1, "data" => array(
            array('key' => 'ACCEPTABLE', 'color' => "#0000ff", "values" => $arrayAcceptable),
            array('key' => 'UNACCEPTABLE', 'color' => "#ff0000", "values" => $arrayUnacceptable)
        ), "message" => null);
        echo json_encode($structuredArray);
        exit;

    }

    public function teststAction()
    {
        $where['roundId'] = 1;
        print_r($this->_microReportModel->returnRoundScoreBasedOnSampleType(1, 1, $where));
        exit;
    }

    public function getgenresponseAction()
    {
        $params = (array)$this->returnArrayFromInput()['where'];
        $where = null;


        if (isset($params)) {

            $where = $this->returnValidWhereArray($params, 'r');
        }

        $response = $this->_microReportModel->getResults($where);
        $arrayAcceptable = array();
        $arrayUnacceptable = array();
        foreach ($response['data'] as $key => $value) {
            $uP = ($value['ACCEPTABLE'] / ($value['ACCEPTABLE'] + $value['UNACCEPTABLE'])) * 100;
            $aP = ($value['UNACCEPTABLE'] / ($value['ACCEPTABLE'] + $value['UNACCEPTABLE'])) * 100;

            array_push($arrayAcceptable, array("x" => $value['batchName'], "y" => $uP));
            array_push($arrayUnacceptable, array("x" => $value['batchName'], "y" => $aP));


        }
        $structuredArray = array("status" => 1, "data" => array(
            array('key' => 'ACCEPTABLE', "values" => $arrayAcceptable),
            array('key' => 'UNACCEPTABLE', "values" => $arrayUnacceptable)
        ), "message" => null);
        echo json_encode($structuredArray);

        exit;
    }

    public function getlabsresultsAction()
    {

        $params = (array)$this->returnArrayFromInput()['where'];
        $where = null;


        if (isset($params)) {

            $where = $this->returnValidWhereArray($params, 'r');
        }

        $response = $this->_microReportModel->getLabsResults($where);
        $arrayAcceptable = array();
        $arrayUnacceptable = array();
        foreach ($response['data'] as $key => $value) {
            $aP = ($value['ACCEPTABLE'] + $value['UNACCEPTABLE']) > 0 ? ($value['ACCEPTABLE'] / ($value['ACCEPTABLE'] + $value['UNACCEPTABLE'])) * 100 : 0;

            $lab_name = $value['lab_name'] == '' || $value['lab_name'] == null ? $value['first_name'] . " " . $value['last_name'] : $value['lab_name'];

            array_push($arrayAcceptable, array("x" => $lab_name . "(" . $value['mflCode'] . ")", "y" => $aP));

            array_push($arrayUnacceptable, array("x" => $lab_name . "(" . $value['mflCode'] . ")", "y" => $aP > 0 ? 100 - $aP : 0));


        }
        $structuredArray = array("status" => 1, "data" => array(
            array('key' => 'ACCEPTABLE', 'color' => "green", "values" => $arrayAcceptable),
            array('key' => 'UNACCEPTABLE', 'color' => "orange", "values" => $arrayUnacceptable)
        ), "message" => null);

        echo json_encode($structuredArray);

        exit;

    }

    //
    public function returnAcceptables($acceptable, $unacceptable, $ty = 1)
    {
        $counts = array('acceptable' => 0, 'unacceptable' => 0);
        if ($acceptable == 0 && $unacceptable == 0) {

            return $counts;
        }
        $total = $acceptable + $unacceptable;
        if ($ty == 1) {
            $counts['acceptable'] = round(($acceptable / $total) * 100, 0);
            $counts['unacceptable'] = $counts['acceptable'] > 0 ? $unacceptable > 0 ? (100 - $counts['acceptable']) : 0 : 100;
            return $counts;
        }
        $counts['acceptable'] = $acceptable;
        $counts['unacceptable'] = $unacceptable;

        return $counts;


    }

    public function getroundsresultsAction()
    {

        $params = (array)$this->returnArrayFromInput()['where'];
        $where = null;


        if (isset($params)) {

            $where = $this->returnValidWhereArray($params, 'r');
        }

        $response = $this->_microReportModel->getRoundsResults($where);
        $arrayAcceptable = array();
        $arrayUnacceptable = array();
        foreach ($response['data'] as $key => $value) {
            $aP = $this->returnAcceptables($value['ACCEPTABLE'], $value['UNACCEPTABLE']);


            $roundName = $value['roundName'] . "(" . $value['roundCode'] . ")";

            array_push($arrayAcceptable, array("x" => $roundName, "y" => $aP['acceptable']));
            array_push($arrayUnacceptable, array("x" => $roundName, "y" => $aP['unacceptabble']));


        }
        $structuredArray = array("status" => 1, "data" => array(
            array('key' => 'ACCEPTABLE', 'color' => "green", "values" => $arrayAcceptable),
            array('key' => 'UNACCEPTABLE', 'color' => "orange", "values" => $arrayUnacceptable)
        ), "message" => null);

        echo json_encode($structuredArray);

        exit;

    }

    public function getcountiesresultsAction()
    {

        $params = (array)$this->returnArrayFromInput()['where'];
        $where = null;


        if (isset($params)) {

            $where = $this->returnValidWhereArray($params, 'r');
        }

        $response = $this->_microReportModel->getCountiesResults($where);
        $arrayAcceptable = array();
        $arrayUnacceptable = array();
//        var_dump($response);exit;
        foreach ($response['data'] as $key => $value) {
            $aP = $this->returnAcceptables($value['ACCEPTABLE'], $value['UNACCEPTABLE']);


            $roundName = $value['Description'];

            array_push($arrayAcceptable, array("x" => $roundName, "y" => $aP['acceptable']));
            array_push($arrayUnacceptable, array("x" => $roundName, "y" => $aP['unacceptable']));


        }
        $structuredArray = array("status" => 1, "data" => array(
            array('key' => 'ACCEPTABLE', 'color' => "green", "values" => $arrayAcceptable),
            array('key' => 'UNACCEPTABLE', 'color' => "orange", "values" => $arrayUnacceptable)
        ), "message" => null);

        echo json_encode($structuredArray);

        exit;

    }

    public function getsamplesresponsesAction()
    {
        $params = (array)$this->returnArrayFromInput()['where'];
        $where = null;


        if (isset($params)) {

            $where = $this->returnValidWhereArray($params, 'r');
        }

        $samples = $this->_microReportModel->getSampleResponses($where);
        $arrayUnresponded = array();
        $arrayTotal = array();
        $arrayResponded = array();
        if (count($samples) > 0) {

            foreach ($samples['data'] as $key => $value) {

                $totalResponded = $this->_microReportModel->totalRespondedOnSample($value['sampleId']);
//                $totalResponded = round(($totalResponded / $value['total']) * 100,0);
                array_push($arrayTotal, array('x' => $value['batchName'], 'y' => $value['total']));
                array_push($arrayResponded, array('x' => $value['batchName'], 'y' => $totalResponded));
                array_push($arrayUnresponded, array('x' => $value['batchName'], 'y' => $value['total'] - $totalResponded));
            }

        }
        $structuredArray = array("status" => 1, "data" => array(
            array('key' => 'TOTAL', 'color' => "blue", "values" => $arrayTotal),
            array('key' => 'RESPONDED', 'color' => "green", "values" => $arrayResponded),

            array('key' => 'UNRESPONDED', 'color' => "orange", "values" => $arrayUnresponded)
        ), "message" => null);

        echo json_encode($structuredArray);

        exit;


    }

}










