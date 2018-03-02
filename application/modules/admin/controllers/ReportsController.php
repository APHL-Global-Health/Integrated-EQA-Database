<?php

/**
 * Created by PhpStorm.
 * User: Abno-44
 * Date: 3/7/2017
 * Time: 11:36
 */
require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
    . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'Bacteriology' . DIRECTORY_SEPARATOR . 'application'
    . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'main.php';

require_once 'BacteriologydbciController.php';

class Admin_ReportsController extends Admin_BacteriologydbciController
{

    public function testAction()
    {

    }

    /* selectReportFromTable($tableName,$colArray, $where ,$orderArray, $group='',$groupArray='') */

    public function getgeneralroundreportAction()
    {
        $postedData = $this->returnArrayFromInput();
        $col = array('*');
        $orderArray = array('id', 'startDate');

        $groupArray = array('id');
        if (isset($postedData['round'])) {
            $whereRnd['roundName'] = $postedData['round'];
            $roundInfo = $this->returnValueWhere($whereRnd, 'tbl_bac_rounds');
            $postedData['id'] = $roundInfo['id'];
            unset($postedData['round']);
        }
        $counter = 0;

        $data = $this->dbConnection->selectReportFromTable('tbl_bac_rounds', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {
            foreach ($data as $key => $value) {
                $round = $this->returnValueWhere($value->id, 'tbl_bac_rounds');
                $data[$key]->index = ++$counter;
                $data[$key]->daysLeft = $this->converttodays($data[$key]->endDate);
                $data[$key]->currentStatus = $data[$key]->daysLeft > 0 ? "RUNNING" : "ENDED";
                $data[$key]->totalShipmentsAdded = $this->dbConnection->selectCount('tbl_bac_shipments', $value->id, 'roundId');
                $data[$key]->totalResponded = $this->dbConnection->selectCount('tbl_bac_response_results', $value->id, 'roundId');
            }
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, "msg" => 'No Records available with the selected filters'));
        }
        exit;
    }

    public function getresponsefeedbackAction()
    {
        $postedData = $this->returnArrayFromInput();
        $col = ['*'];
        $orderArray = ['id', 'dateCreated'];

        $groupArray = ['id'];


        $data = $this->dbConnection->selectReportFromTable('tbl_bac_samples_to_users', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {
            foreach ($data as $key => $value) {
                $round = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');
                $sampleName = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');
                $data[$key]->daysLeft = $this->converttodays($round['endDate']);
                $data[$key]->batchName = $sampleName['batchName'];
                $data[$key]->roundName = $round['roundName'];
                $data[$key]->roundCode = $round['roundCode'];
                $data[$key]->startDate = $round['startDate'];
                $data[$key]->endDate = $round['endDate'];
                $deliveryDetails = $this->returnValueWhere($value->panelToSampleId, 'tbl_bac_sample_to_panel');

                $data[$key]->dateDelivered = $deliveryDetails['dateDelivered'];

                $data[$key]->sampleInstructions = $sampleName['sampleInstructions'];
                $data[$key]->sampleDetails = $sampleName['sampleDetails'];
                $data[$key]->materialSource = $sampleName['materialSource'];
                $data[$key]->currentStatus = $data[$key]->daysLeft > 0 ? "RUNNING" : "ENDED";
                $data[$key]->totalShipmentsAdded = $this->dbConnection->selectCount('tbl_bac_shipments', $value->id, 'roundId');
            }
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, "msg" => 'No Records available with the selected filters'));
        }
        exit;
    }

    public function evaluateroundAction()
    {
        $postedData = $this->returnArrayFromInput();
        $whereRound['roundId'] = $postedData['id'];
        $whereRound['startRoundFlag'] = 1;
        $updateStatus = false;
        $shipments = $this->dbConnection->selectFromTable('tbl_bac_shipments', $whereRound);
        if ($shipments != false) {
            foreach ($shipments as $key => $value) {
                $whereShipmentRound['shipmentId'] = $value->id;
                $whereShipmentRound['startRoundFlag'] = $value->startRoundFlag;
                $whereShipmentRound['dateFrom'] = $value->dateCreated;
                $updateStatus = $this->evaluateresultsAction($whereShipmentRound);
            }

            if ($updateStatus) {
                $whereEvaluation['id'] = $postedData['id'];
                $whereEvaluation['startRoundFlag'] = 1;
                $updateEval['evaluated'] = 1;

                $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_rounds', $whereEvaluation, $updateEval);
                echo $this->returnJson(array('status' => 1, 'message' => 'Round Evaluation was Successful !'));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'Round Evaluation was Unsuccessful !'));
            }
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'Round Evaluation Unsuccessful.no shipments found !'));
        }
        exit;
    }

    public function updatepublicationAction()
    {
        $where = $this->returnArrayFromInput();
        $wherePub['id'] = $where['id'];

        $update['published'] = $where['published'];
//print_r($where);exit;
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_rounds', $wherePub, $update);

        $whereRound['roundId'] = $where['id'];
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_samples_to_users', $whereRound, $update);
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_response_results', $whereRound, $update);
        $updatePublication = $this->dbConnection->updateTable('tbl_bac_micro_bacterial_agents', $whereRound, $update);


        if ($update['published'] == 1) {
            $this->sendEmailToEnrolledLabsForPublish($wherePub['id']);
        }
        echo $this->returnJson($updatePublication);
        exit;
    }

    public function sendEmailToEnrolledLabsForPublish($roundId)
    {
        $where['roundId'] = $roundId;
        $where['status'] = 1;

        $enrolledLabs = $this->dbConnection->selectFromTable('tbl_bac_rounds_labs', $where);

        if ($enrolledLabs != false) {

            $round = $this->returnValueWhere($where['roundId'], 'tbl_bac_rounds');
            $emails = array();
            foreach ($enrolledLabs as $key => $value) {
                $labDetails = $this->returnValueWhere($value->labId, 'participant');
                if (!empty($labDetails)) {
                    if ($labDetails['email'] != '' || $labDetails['email'] != null) {
                        array_push($emails, $labDetails['email']);
                    }
                }
            }
            $this->publishedMails($emails, $round);
        }
    }

    public function publishedMails($lab, $round)
    {

        $name = 'Laboratory';

        $message = 'The results for for round, <b>' . $round['roundName'] . ' : ' . $round['roundCode'] . '</b> have been evaluated and published.<br>Please log in to view.';

        $body = $this->createEmailBody($name, $message);

        $this->sendemailAction($body, $lab, true);

        return true;
    }

    public function getindividuallabsAction()
    {
        $postedData = $this->returnArrayFromInput();
        $col = array('*');
        $orderArray = array('id', 'dateCreated');

        $groupArray = array('id');
        if (isset($postedData['participantId'])) {
            if ($postedData['participantId'] == '') {
                unset($postedData['participantId']);
            }
        }
        $data = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $postedData, $orderArray, true, $groupArray);
        $counter = 0;
        if ($data != false) {

            foreach ($data as $key => $value) {
                $labDetails = $this->returnValueWhere($value->participantId, 'participant');
                $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');
                $data[$key]->labDetails = $labDetails;
                $data[$key]->index = ++$counter;
                $data[$key]->batchName = $sample['batchName'];
                $data[$key]->sampleInstructions = $sample['sampleInstructions'];
                $data[$key]->sampleDetails = $sample['sampleDetails'];
                $round = $this->returnValueWhere($value->roundId, 'tbl_bac_rounds');

                $data[$key]->daysLeft = $this->converttodays($round['endDate']);
                $data[$key]->published = $round['published'];
                $sampleInfo = $this->returnSampleInfo($value->panelToSampleId);
                $data[$key]->daysLeftOnTen = $sampleInfo['endDaysLeft'] > 10 ? 0 : $sampleInfo['endDaysLeft'];
                $data[$key]->allowedOnTenDays = $sampleInfo['endDaysLeft'] > 10 ? 0 : 1;

                $data[$key]->materialSource = $sample['materialSource'];
                $data[$key]->evaluatedStatus = $value->markedStatus == 1 ? 'Evaluated' : 'Un-evaluated';
            }
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No records available'));
        }
        exit;
    }

    public function savemicroagentsevaluationAction()
    {
        $posted = $this->returnArrayFromInput()['update'];
        if (count($posted) > 0) {
            $microSum = 0;
            $where = array();

            foreach ($posted as $key => $value) {
                $arr = (array)$value;
                $whereUpdate['id'] = $arr['id'];

                $where['panelToSampleId'] = $arr['panelToSampleId'];
                $where['participantId'] = $arr['participantId'];
                $where['userId'] = $arr['userId'];
                $where['sampleId'] = $arr['sampleId'];
                $where['roundId'] = $arr['roundId'];

                $update['score'] = $arr['score'];
                $update['diskContent'] = $arr['diskContent'];

                $update['finalScore'] = $arr['finalScore'];

                $update['reportedToStatus'] = $arr['reportedToStatus'];
                $update['score'] = $arr['score'];
                if (is_float($update['score']) || is_numeric($update['score'])) {
                    $update['adminMarked'] = 1;
                    $microSum += $arr['score'];
                    $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_micro_bacterial_agents', $whereUpdate, $update);
                } else {
                    $updateEvaluation = array('status' => 0, 'message' => 'score should be numeric');
                }
            }
            $updateEval['totalMicroAgentsScore'] = $microSum;
            $results = $this->returnValueWhere($where, 'tbl_bac_response_results');
            if (!empty($results)) {
                $microAstScore = $results['totalMicroAgentsScore'];
            }
            if ($updateEvaluation['status'] == 1) {
                if ($microSum < 1) {

                } else {
                    $microSum = $microSum > 100 ? 100 : $microSum;
                    $count = 0;
                    $updateEval['finalScore'] = 0;


                    $count = 0;
                    if ($results['finalIdentificationScore'] > -1) {
                        $count++;
                        $updateEval['finalScore'] += $results['finalIdentificationScore'];
                    }

                    if ($results['grainStainReactionScore'] > -1) {
                        $count++;
                        $updateEval['finalScore'] += $results['grainStainReactionScore'];
                    }
                    if ($microSum > 0) {

                        $count++;
                        $updateEval['finalScore'] += $microSum;
                    }
                    if ($count > 0) {

                        $updateEval['finalScore'] = round($updateEval['finalScore'] / $count);
                    } else {
                        echo $this->returnJson(array('status' => 0, 'message' => 'Samples seems to have no possible expected results'));
                        exit;
                    }

                    $gradingArray = $this->getGradeRemark($updateEval['finalScore']);

                    $updateEval['grade'] = $gradingArray['grade'];
                    $updateEval['remarks'] = $gradingArray['remarks'];
                    $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_response_results', $where, $updateEval);
                }
            }
            echo $this->returnJson($updateEvaluation);
            exit;
        }

        exit;
    }

    public function updatefunctionAction()
    {
        $posted = $this->returnArrayFromInput();

        $whereEvaluation['id'] = $posted['id'];
        $updateEval = (array)$posted['update'];

        unset($updateEval['id']);
        unset($updateEval['batchName']);
        unset($updateEval['materialSource']);
        unset($updateEval['sampleDetails']);
        unset($updateEval['sampleInstructions']);
        unset($updateEval['labDetails']);
        unset($updateEval['evaluatedStatus']);
        unset($updateEval['finalScore']);
        unset($updateEval['allowedOnTenDays']);


        $finalScore = 0;
        $score = '';
        $updateEval['markedStatus'] = 1;
        $updateEval['adminMarked'] = 1;
        foreach ($updateEval as $key => $value) {

            if (is_numeric($value) && substr($key, -5) == 'Score') {
                if ($value > -1) {
                    $finalScore += $value;
                }
            }
        }
        $whereSampleId['sampleId'] = $updateEval['sampleId'];
        $countAstSamples = $this->dbConnection->selectCount('tbl_bac_expected_micro_bacterial_agents', $whereSampleId, 'sampleId');
        $count = 0;
        if ($updateEval['finalIdentificationScore'] > -1) {
            $count++;
        }

        if ($updateEval['grainStainReactionScore'] > -1) {
            $count++;
        }
        if ($countAstSamples > 0) {

            $count++;
        }
        if ($count > 0) {

            $updateEval['finalScore'] = round($finalScore / $count);
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'Samples seems to have no possible expected results'));
            exit;
        }
//        print_r($updateEval);
//        exit;
        $updateEval['totalMicroAgentsScore'] = $updateEval['totalMicroAgentsScore'];
        $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_response_results', $whereEvaluation, $updateEval);

        echo $this->returnJson($updateEvaluation);
        exit;
    }

    public function getmicroagentswhereAction()
    {
        $posted = $this->returnArrayFromInput();

        $responseResults = $this->dbConnection->selectFromTable('tbl_bac_micro_bacterial_agents', $posted);
//        print_r($posted);
//        exit;
        if ($responseResults != false) {
            echo $this->returnJson(array('status' => 1, "data" => $responseResults));
        } else {
            echo $this->returnJson(array('status' => 0, "message" => "No records found"));
        }

        exit;
    }

    public function getparticipatinglabsAction()
    {
        $postedData = $this->returnArrayFromInput();
//        print_r($postedData);
//        exit;
        $where = 'WHERE ';
        if (isset($postedData['dateFrom'])) {
            if ($postedData['dateFrom'] != '') {
                $where .= " tbl_bac_rounds_labs.dateCreated >='" . substr($postedData['dateFrom'], 0, 10) . "' ";
            }
        }
        if (isset($postedData['dateTo'])) {
            if ($postedData['dateTo'] != '') {
                $where = " WHERE tbl_bac_rounds_labs.dateCreated BETWEEN '" . substr($postedData['dateFrom'], 0, 10) . "  05:59:59'"
                    . " AND  '" . substr($postedData['dateTo'], 0, 10) . "  23:59:59' ";
            }
        }
        if (isset($postedData['region'])) {
            if ($postedData['region'] != '') {
                $where .= " AND mfl_facility_codes.County='" . $postedData['region'] . "' ";
            }
        }

        if (isset($postedData['round'])) {

            if ($postedData['round'] != '') {
                $where .= " AND roundName='" . $postedData['round'] . "' ";
            }
        }

        if (is_string($where)) {
            $results = $this->dbConnection->returnParticipatinglabs($where);
            if ($results !== false) {
                echo $this->returnJson(array('status' => 1, 'data' => $results));
            } else {
                echo $this->returnJson(array('status' => 0, 'Message' => 'No data found'));
            }
        }

        exit;
    }

    public function evaluateresultsAction($whereRoundData = '')
    {
        /* select results for evaluation */
        $postedData = $this->returnArrayFromInput();
        $where = array();


        if (!empty($whereRoundData)) {
            $where = $whereRoundData;
        } else {
            $where['shipmentId'] = $postedData['id'];
            $where['startRoundFlag'] = 1;


            $shipmentInfo = $this->returnValueWhere($where['shipmentId'], 'tbl_bac_shipments');
            $where['dateFrom'] = $shipmentInfo['dateCreated'];
        }

        /* run this on retrieving shipment from shipment table */
        $orderArray = ['id', 'dateCreated'];
        $col = ['*'];
        $groupArray = ['id'];
        $updateArray = false;

        if (count($where) > 0) {


            $panelSamples = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $where, $orderArray, true, $groupArray);
//            var_dump($panelSamples);
//            exit;
            if ($panelSamples != false) {
                foreach ($panelSamples as $key => $value) {
                    $whereSampleId['sampleId'] = $panelSamples[$key]->sampleId;
                    $whereSampleId['participantId'] = $panelSamples[$key]->participantId;
                    $whereSampleId['roundId'] = $panelSamples[$key]->roundId;

                    $responseResults = $this->dbConnection->selectFromTable('tbl_bac_response_results', $whereSampleId);
                    if ($responseResults != false) {

                        foreach ($responseResults as $key => $value) {

                            $updateArray = $this->updateResponseResults((array)$responseResults[$key]);
                        }
                    }
                }
            }


            /* run this if update on all tables was a success */

            if ($updateArray) {

                $whereEvaluation['id'] = $where['shipmentId'];
                $whereEvaluation['startRoundFlag'] = 1;

                $updateEval['evaluated'] = 1;

                $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_shipments', $whereEvaluation, $updateEval);

                $arr = array('status' => 1, 'message' => 'Shipment Evaluation was successful !');
//                var_dump(!empty($whereRoundData));
//                exit;
                if (!empty($whereRoundData)) {

                    return true;
                }

                echo $this->returnJson($arr);
            } else {
                if (!empty($whereRoundData)) {
                    return false;
                }
                echo $this->returnJson(array('status' => 0, 'message' => 'Evaluation was Unsuccessful !'));
            }
        } else {
            $response['message'] = 'Invalid survey or round ';
        }
        exit;
    }

    public function testinAction()
    {
        $ar = 'michael osoro';
        $arr = explode(" ", $ar);

        $in = 'osoros';
        var_dump(in_array($in, $arr));
        exit;
    }

    public function compareStrings($s1, $s2)
    {
        //one is empty, so no result
        if (strlen($s1) == 0 || strlen($s2) == 0) {
            return 0;
        }

        //replace none alphanumeric charactors
        //i left - in case its used to combine words
        $s1clean = preg_replace("/[^A-Za-z0-9-]/", ' ', $s1);
        $s2clean = preg_replace("/[^A-Za-z0-9-]/", ' ', $s2);

        //remove double spaces
        while (strpos($s1clean, "  ") !== false) {
            $s1clean = str_replace("  ", " ", $s1clean);
        }
        while (strpos($s2clean, "  ") !== false) {
            $s2clean = str_replace("  ", " ", $s2clean);
        }

        //create arrays
        $ar1 = explode(" ", $s1clean);
        $ar2 = explode(" ", $s2clean);
        $l1 = count($ar1);
        $l2 = count($ar2);

        //flip the arrays if needed so ar1 is always largest.
        if ($l2 > $l1) {
            $t = $ar2;
            $ar2 = $ar1;
            $ar1 = $t;
        }

        //flip array 2, to make the words the keys
        $ar2 = array_flip($ar2);


        $maxwords = max($l1, $l2);
        $matches = 0;

        //find matching words
        foreach ($ar1 as $word) {
            if (array_key_exists($word, $ar2))
                $matches++;
        }

        return ($matches / $maxwords) * 100;
    }

    public function passageAction()
    {


        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $whereSearch['grade'] = $postedData['grade'];
            }
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $whereSearch['sampleId'] = $sampleDetails['id'];
            }
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
        }

        $where['roundName'] = $postedData['round'];

        $roundDetails = $this->returnValueWhere($where, 'tbl_bac_rounds');

        $whereSearch['roundId'] = $roundDetails['id'];
        $sum = 0;
        $samples = array();

        $orderArray = array('sampleId');
        $col = array('COUNT(sampleId) as count', 'avg(finalScore) as avgMarks', 'grade', 'sampleId', 'roundId');

        $groupArray = array('grade');

        if ($roundDetails != false) {
            if (isset($labs) && $labs != false) {

                $report = array();
                foreach ($labs as $key => $value) {

                    $whereSearch['participantId'] = $value->participant_id;

                    $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true,
                        $groupArray);
                    if ($reportData != false) {

                        foreach ($reportData as $keys => $val) {

                            $whereSampleId['id'] = $val->sampleId;
                            $whereRoundId['id'] = $val->roundId;
                            $whereLabId['participant_id'] = $val->participantId;

                            $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');

                            $reportData[$keys]->roundName = $roundInfo['roundName'];
                            $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                            $reportData[$keys]->batchName = $sampleInfo['batchName'];

                        }
                    }
                }
                $stat['total'] = $sum;
                $stat['mean'] = round($sum / sizeof($report), 4);
                $stat['labs'] = sizeof($report);
                $stat['sd'] = $this->standard_deviation($samples);

                if (!empty($report)) {
                    echo $this->returnJson(array('status' => 1, 'data' => $report, 'stat' => $stat));
                }
            } else {
                if (isset($labs)) {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                    exit;
                }

                $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true, $groupArray);
                if ($reportData != false) {

                    foreach ($reportData as $keys => $val) {

                        $whereSampleId['id'] = $val->sampleId;
                        $whereRoundId['id'] = $val->roundId;


                        $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                        $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');

                        $reportData[$keys]->roundName = $roundInfo['roundName'];
                        $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                        $reportData[$keys]->batchName = $sampleInfo['batchName'];

                    }
//                    $stat['total'] = $sum;
//                    $stat['mean'] = round($sum / sizeof($reportData), 4);
//                    $stat['sd'] = $this->standard_deviation($samples);
//                    $stat['labs'] = sizeof($reportData);
                    echo $this->returnJson(array('status' => 1, 'data' => $reportData, 'stat' => ''));
                } else {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                }
//                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
        }

        exit;
    }


    public function updateResponseResults($responseResults)
    {
        if (is_array($responseResults)) {
            $whereSampleExpectedResult['sampleId'] = $responseResults['sampleId'];
            $sampleExpectedResult = $this->returnValueWhere($whereSampleExpectedResult, 'tbl_bac_expected_results');
            if (count($sampleExpectedResult) > 0) {
                $score['grainStainReactionScore'] = 0;
                $score['primaryMediaScore'] = 0;
                $score['incubationConditionsScore'] = 0;
                $score['colonialMorphologyScore'] = 0;
                $score['bacterialQualificationScore'] = 0;
                $score['isolateProcessingScore'] = 0;
                $score['bacterialReagentsScore'] = 0;
                $score['finalIdentificationScore'] = 0;
                $scoreGS = 0;
                $scoreFIS = 0;
                if ($responseResults['grainStainReaction'] == $sampleExpectedResult['grainStainReaction']) {
                    $scoreGS = $sampleExpectedResult['grainStainReactionScore'];
                } else if (in_array($responseResults['grainStainReaction'], explode(' ', $sampleExpectedResult['grainStainReaction']))) {

                    $scoreGS = 0.75 * $sampleExpectedResult['grainStainReactionScore'];
                }

                $score['grainStainReactionScore'] = $sampleExpectedResult['grainStainReactionScore'] > 0 ? round(($scoreGS / $sampleExpectedResult['grainStainReactionScore']) * 100, 3) : -1;


                if ($responseResults['finalIdentification'] == $sampleExpectedResult['finalIdentification']) {

                    $scoreFIS = $sampleExpectedResult['finalIdentificationScore'];
                }

//                echo $scoreFIS;
//                exit();
                $score['finalIdentificationScore'] = $sampleExpectedResult['finalIdentificationScore'] > 0 ? round(($scoreFIS / $sampleExpectedResult['finalIdentificationScore']) * 100, 3) : -1;

                $whereResponse['sampleId'] = $responseResults['sampleId'];
                $whereResponse['roundId'] = $responseResults['roundId'];
                $whereResponse['participantId'] = $responseResults['participantId'];
                $whereResponse['adminMarked'] = 0;
                $score['finalScore'] = array_sum($score);

                $score['markedStatus'] = 1;
                $updateLabResults = $this->dbConnection->updateTable('tbl_bac_response_results', $whereResponse, $score);
                if ($updateLabResults['status'] == 0) {
                    return false;
                } else {
                    $updateSuscepibility = $this->updateSuscepibilityScore($whereResponse);
//                    print_r($updateSuscepibility);
//                    exit;
                    if ($updateSuscepibility['status']) {
                        $update['feedBack'] = 1;


                        $update['totalCorrectScore'] = round(($score['finalIdentificationScore'] + $score['grainStainReactionScore']) / 2, 2);
                        $update['totalMicroAgentsScore'] = $updateSuscepibility['susScore'];

                        $score['totalMicroAgentsScore'] = $updateSuscepibility['susScore'];
                        /* total grading update of marks happens here */
                        $part = 3;
                        if ($updateSuscepibility['susScore'] === false) {
                            $part = 2;
                            $score['totalMicroAgentsScore'] = 0;
                        }
                        $total = round(($score['totalMicroAgentsScore'] + $score['finalIdentificationScore'] + $score['grainStainReactionScore']) / $part, 2);
                        $gradingArray = $this->getGradeRemark($total);

                        $update['grade'] = $gradingArray['grade'];
                        $update['remarks'] = $gradingArray['remarks'];
                        $update['finalScore'] = $total;

                        $score['grade'] = $gradingArray['grade'];
                        $score['remarks'] = $gradingArray['remarks'];
                        $score['finalScore'] = $total;

                        $updateLabResultsResp = $this->dbConnection->updateTable('tbl_bac_response_results', $whereResponse, $score);

                        $updateLabResults = $this->dbConnection->updateTable('tbl_bac_samples_to_users', $whereResponse, $update);

                        if ($updateLabResults['status'] == 0) {
//                            var_dump($updateLabResults);
                        }
                    }
                }
            }
        }
        $whereResponse['sampleId'] = $responseResults['sampleId'];
        $whereResponse['roundId'] = $responseResults['roundId'];
        $whereResponse['participantId'] = $responseResults['participantId'];
        $whereResponse['adminMarked'] = 0;


        $score['markedStatus'] = 1;

        $updateLabResults = $this->dbConnection->updateTable('tbl_bac_response_results', $whereResponse, $score);
        return true;
    }

    public function getGradeRemark($total)
    {

        $where = '';
        $range = $this->dbConnection->selectFromTable('tbl_bac_grades', $where);
        $returnArray['grade'] = 'Not Set';
        $returnArray['remarks'] = 'Not Available';

        if ($range != false) {
            foreach ($range as $key => $value) {
                if ($total >= $value->lowerMark && $total <= $value->upperMark) {
                    $returnArray['grade'] = $value->grade;
                    $returnArray['remarks'] = $value->remarks;
                    break;
                }
            }
        }
        return $returnArray;
    }

    public function getMicroLevel($diskContent, $antiMicroAgent)
    {
        $where['testAgentName'] = $antiMicroAgent;

        $antiMicroAgentData = $this->returnValueWhere($where, 'tbl_bac_test_agents');

        if ($diskContent > 0 && $diskContent <= $antiMicroAgentData['fewRange']) {
            return 'few';
        }
        if ($diskContent > $antiMicroAgentData['fewRange'] && $diskContent <= $antiMicroAgentData['modRange']) {
            return 'mod';
        }
        if ($diskContent > $antiMicroAgentData['modRange'] && $diskContent <= $antiMicroAgentData['manyRange']) {
            return 'many';
        } else {
            return 'outOfRange';
        }
    }

    public function outOfRange($range, $where)
    {

    }

    public function getshipmentsforroundAction()
    {
        $postedData = $this->returnArrayFromInput();
        $col = ['id', 'shipmentName', 'roundId', 'dateCreated', 'status', 'startRoundFlag', 'evaluated'];
        $orderArray = ['id', 'dateCreated'];

        $postedData['startRoundFlag'] = 1;
//        $postedData['roundId'] = 33;

        $groupArray = ['id'];
        $data = $this->dbConnection->selectReportFromTable('tbl_bac_shipments', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {
            $totalRespondedSamples = 0;
            foreach ($data as $key => $value) {
                $whereShipmentId['shipmentId'] = $value->id;
                $whereShipmentId['roundId'] = $value->roundId;
                $data[$key]->totalSamples = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereShipmentId, 'quantity', true);
                $colSamPan = ['sampleId', 'id'];

                $samplesToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $colSamPan, $whereShipmentId, $orderArray, true, $groupArray);
                $data[$key]->totalRespondedSamples = 0;
                $data[$key]->totalEvaluatedSamples = 0;

                if ($samplesToPanel != false) {
                    foreach ($samplesToPanel as $keyPan => $valPan) {
//                        $whereSamPan['roundId'] = $valPan->id;
                        $whereSamPan['panelToSampleId'] = $valPan->id;
//                        $totalRespondedSamples++;
                        $totalRespondedSamples += $this->dbConnection->selectCount('tbl_bac_response_results', $whereSamPan['panelToSampleId'], 'panelToSampleId');

                        $data[$key]->totalRespondedSamples = $totalRespondedSamples;
                        $whereSamPan['markedStatus'] = 1;
                        $data[$key]->totalEvaluatedSamples += $this->dbConnection->selectCount('tbl_bac_response_results', $whereSamPan, 'id');
                    }
                }

                $data[$key]->totalUnRespondedSamples = $data[$key]->totalSamples - $data[$key]->totalRespondedSamples;
                $data[$key]->totalUnEvaluatedSamples = $data[$key]->totalRespondedSamples - $data[$key]->totalEvaluatedSamples;
            }
//            var_dump($totalRespondedSamples);exit;
            echo $this->returnJson(array('status' => 1, 'data' => $data));
        } else {
            echo $this->returnJson(array('status' => 0, "msg" => 'No Records available with the selected filters'));
        }

        exit;
    }

    public function updateSuscepibilityScore($whereResponse)
    {
        try {
            if (isset($whereResponse)) {
                unset($whereResponse['adminMarked']);

                $microAgents = $this->dbConnection->selectFromTable('tbl_bac_micro_bacterial_agents', $whereResponse);

                $whereSampleId['sampleId'] = $whereResponse['sampleId'];

                $microExpectedAgents = $this->dbConnection->selectFromTable('tbl_bac_expected_micro_bacterial_agents', $whereSampleId);
                $returnScore = 0;
                $totalSamples = count($microExpectedAgents);
//                echo $totalSamples;
                if ($microExpectedAgents !== false) {
                    if ($microAgents !== false) {
                        foreach ($microAgents as $key => $value) {
                            $score['score'] = 0;
                            foreach ($microExpectedAgents as $ekey => $evalue) {
//                            echo $microAgents[$ekey]->antiMicroAgent .' = '. $microExpectedAgents[$key]->antiMicroAgent.'<br>';
                                $ratioForEverySample = round($evalue->agentScore / $totalSamples, 3);

                                if ($evalue->antiMicroAgent == $value->antiMicroAgent) {
                                    $percentOnCorrect = round(($ratioForEverySample / $evalue->agentScore) * 100, 3);
                                    $score['score'] = 0.5 * $percentOnCorrect;

                                    if ($microAgents[$key]->finalScore == $microExpectedAgents[$ekey]->finalScore) {
                                        $score['score'] = $percentOnCorrect;
                                    } else {
                                        $score['score'] = 0;
                                        return array('status' => true, 'susScore' => '');
                                    }

                                    break;
                                }
                            }
//                        print_r($score);
//                        exit;
                            $returnScore += $score['score'];
                            $whereResponse['antiMicroAgent'] = $microAgents[$key]->antiMicroAgent;
                            $whereResponse['adminMarked'] = 0;
                            $score['markedStatus'] = 1;
                            $updateSuscepibility = $this->dbConnection->updateTable('tbl_bac_micro_bacterial_agents', $whereResponse, $score);
                            if ($updateSuscepibility['status'] == 0) {

                                return false;
                            }
                        }

                        return array('status' => true, 'susScore' => $returnScore);
                    } else {
                        return array('status' => true, 'susScore' => false);
                    }
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getlabuserresponseAction()
    {
        $postedData = $this->returnArrayFromInput();
        $where['userId'] = $postedData['userId'];
        $where['sampleId'] = $postedData['sampleId'];
        $where['roundId'] = $postedData['roundId'];

        $results = $this->returnValueWhere($where, 'tbl_bac_response_results');
        $susceptibility = $this->returnValueWhere($where, 'tbl_bac_suscepitibility');
        $microAgents = $this->dbConnection->selectFromTable('tbl_bac_micro_bacterial_agents', $where);


        $data['results'] = $results;
        $data['susceptibility'] = $susceptibility;
        $data['microAgents'] = $microAgents;
        $postedWhere['sampleId'] = $postedData['sampleId'];
        $data['sampleInstructions'] = $this->returnSampleInstructions($postedWhere);

        if ($microAgents != false) {
            foreach ($microAgents as $key => $value) {

                $sampleInfoRange = $this->getMicroLevel($microAgents[$key]->diskContent, $microAgents[$key]->antiMicroAgent);
                $microAgents[$key]->range = $sampleInfoRange;
            }
        }
        echo $this->returnJson(array('status' => 1, 'data' => $data));

        exit;
    }

    public function returnCompressedArray($lab, $samples)
    {
        $collectiveArray = array();
        $tempArray = array();
        for ($j = 0; $j < sizeof($lab); $j++) {
            $allSamples = array();

            for ($i = 0; $i < sizeof($samples); $i++) {

                if ($samples[$i]['labId'] == $lab[$j]) {
//                    !is_array($tempArray[$j]) ? (array)$tempArray[$j]:'';
//                    $tempArray[$j]['info']=array();

                    array_push($tempArray, $samples[$i]['sampleInfo']);
                }
            }
            $labInfo = $this->returnValueWhere($lab[$j], 'participant');

            $tempArrays['labName'] = $labInfo['institute_name'];
            $tempArrays['labId'] = $lab[$j];
            $tempArrays['sampleInfo'] = $tempArray;
            array_push($collectiveArray, ($tempArrays));
            $tempArray = array();
        }
        if (sizeof($tempArray) > 0) {
            for ($i = 0; sizeof($tempArray); $i++) {

            }
        }
        return $collectiveArray;
    }

    public function getgenstatperformanceAction()
    {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $whereSearch['grade'] = $postedData['grade'];
            }
        }


        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
        }

        $where['roundName'] = $postedData['round'];

        $roundDetails = $this->returnValueWhere($where, 'tbl_bac_rounds');

        $whereSearch['roundId'] = $roundDetails['id'];
        $sum = 0;
        $samples = array();
        $report = array();
        $lab = array();
        $samples = array();
        if ($roundDetails != false) {

            if (isset($labs) && $labs != false) {
//                print_r($roundDetails);
//                exit;

                foreach ($labs as $key => $value) {

                    $whereSearch['participantId'] = $value->participant_id;
                    $orderArray = array('id', 'dateCreated');
                    $col = array('*');

                    $groupArray = array('id');
                    $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true, $groupArray);
//                    print_r($reportData);
//                    exit;
                    if ($reportData != false) {
                        $exist = false;
                        $labId = '';

                        foreach ($reportData as $keys => $val) {
                            $sampleName = $sampleInfo = $this->returnValueWhere($reportData[$keys]->sampleId, 'tbl_bac_samples');

                            $score = array('sampleInfo' => array('finalScore' => $reportData[$keys]->finalScore,
                                'grainStainReactionScore' => $reportData[$keys]->grainStainReactionScore,
                                'finalIdentificationScore' => $reportData[$keys]->finalIdentificationScore,
                                'totalMicroAgentsScore' => $reportData[$keys]->totalMicroAgentsScore, 'sampleName' => $sampleName['batchName'],
                                'sampleId' => $reportData[$keys]->sampleId), 'labId' => $reportData[$keys]->participantId);
//                            print_r($reportData[$key]);
                            array_push($samples, $score);

                            if (sizeof($lab) > 0) {
                                $labId = $reportData[$keys]->participantId;
                                for ($i = 0; $i < sizeof($lab); $i++) {


                                    if ($reportData[$keys]->participantId == $lab[$i]) {

                                        $exist = true;
//
//                                        break;
                                    }
                                }
                            }
                            if (!$exist) {

                                array_push($lab, $reportData[$keys]->participantId);
                            } else {

                            }
                        }
                    }
                }

//                $stat['total'] = $sum;
//                $stat['mean'] = round($sum / sizeof($report), 4);
//                $stat['labs'] = sizeof($report);
//                $stat['sd'] = $this->standard_deviation($samples);

                if (sizeof($lab) > 0) {
                    $lab = $this->returnCompressedArray($lab, $samples);
                    echo $this->returnJson(array('status' => 1, 'data' => $lab));
                } else {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                }
            } else {
                if (isset($labs)) {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                    exit;
                }
                $orderArray = array('id', 'dateCreated');
                $col = array('*');

                $groupArray = array('id');
                $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true, $groupArray);
                if ($reportData != false) {

                    foreach ($reportData as $keys => $val) {
                        $exist = false;
                        $sampleName = $sampleInfo = $this->returnValueWhere($reportData[$keys]->sampleId, 'tbl_bac_samples');

                        $score = array('sampleInfo' => array('finalScore' => $reportData[$keys]->finalScore,
                            'grainStainReactionScore' => $reportData[$keys]->grainStainReactionScore,
                            'finalIdentificationScore' => $reportData[$keys]->finalIdentificationScore,
                            'totalMicroAgentsScore' => $reportData[$keys]->totalMicroAgentsScore, 'sampleName' => $sampleName['batchName'],
                            'sampleId' => $reportData[$keys]->sampleId), 'labId' => $reportData[$keys]->participantId);

                        array_push($samples, $score);

                        if (sizeof($lab) > 0) {
                            $labId = $reportData[$keys]->participantId;
                            for ($i = 0; $i < sizeof($lab); $i++) {


                                if ($reportData[$keys]->participantId == $lab[$i]) {

                                    $exist = true;
//
//                                        break;
                                }
                            }
                        }
                        if (!$exist) {
                            array_push($lab, $reportData[$keys]->participantId);
                        } else {

                        }
                    }
//                    $stat['total'] = $sum;
//                    $stat['mean'] = round($sum / sizeof($reportData), 4);
//                    $stat['sd'] = $this->standard_deviation($samples);
//                    $stat['labs'] = sizeof($reportData);

                    if (sizeof($lab) > 0) {
                        $lab = $this->returnCompressedArray($lab, $samples);
                        echo $this->returnJson(array('status' => 1, 'data' => $lab));
                    } else {
                        echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                    }
                } else {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                }
//                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
        }

        exit;
    }

    public function getroundperformanceAction()
    {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $whereSearch['grade'] = $postedData['grade'];
            }
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $whereSearch['sampleId'] = $sampleDetails['id'];
            }
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
        }

        $where['roundName'] = $postedData['round'];

        $roundDetails = $this->returnValueWhere($where, 'tbl_bac_rounds');

        $whereSearch['roundId'] = $roundDetails['id'];
        $sum = 0;
        $samples = array();
        if ($roundDetails != false) {
            if (isset($labs) && $labs != false) {

                $report = array();
                foreach ($labs as $key => $value) {

                    $whereSearch['participantId'] = $value->participant_id;
                    $orderArray = array('id', 'dateCreated');
                    $col = array('*');

                    $groupArray = array('id');
                    $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true, $groupArray);
                    if ($reportData != false) {

                        foreach ($reportData as $keys => $val) {

                            $whereSampleId['id'] = $val->sampleId;
                            $whereRoundId['id'] = $val->roundId;

                            $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');

                            $reportData[$keys]->labName = $value->institute_name;
                            $reportData[$keys]->county = $value->region;
                            $reportData[$keys]->unique_identifier = $value->unique_identifier;

                            $reportData[$keys]->roundName = $roundInfo['roundName'];
                            $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                            $reportData[$keys]->batchName = $sampleInfo['batchName'];
                            $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                            $reportData[$keys]->unique_identifier = $value->unique_identifier;
                            $reportData[$keys]->status = 'valid';
                            array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                            $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                            array_push($report, (array)$reportData[$keys]);
                        }
                    }
                }
                $stat['total'] = $sum;
                $stat['mean'] = round($sum / sizeof($report), 4);
                $stat['labs'] = sizeof($report);
                $stat['sd'] = $this->standard_deviation($samples);

                if (!empty($report)) {
                    echo $this->returnJson(array('status' => 1, 'data' => $report, 'stat' => $stat));
                }
            } else {
                if (isset($labs)) {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                    exit;
                }
                $orderArray = ['id', 'dateCreated'];
                $col = ['*'];

                $groupArray = ['id'];
                $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $whereSearch, $orderArray, true, $groupArray);
                if ($reportData != false) {

                    foreach ($reportData as $keys => $val) {

                        $whereSampleId['id'] = $val->sampleId;
                        $whereRoundId['id'] = $val->roundId;
                        $whereLabId['participant_id'] = $val->participantId;

                        $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                        $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                        $labInfo = $this->returnValueWhere($whereLabId, 'participant');

                        $reportData[$keys]->labName = $labInfo['institute_name'];
                        $reportData[$keys]->county = $labInfo['region'];
                        $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];

                        $reportData[$keys]->roundName = $roundInfo['roundName'];
                        $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                        $reportData[$keys]->batchName = $sampleInfo['batchName'];
                        $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                        $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];
                        $reportData[$keys]->status = 'valid';
                        array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                        $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                    }
                    $stat['total'] = $sum;
                    $stat['mean'] = round($sum / sizeof($reportData), 4);
                    $stat['sd'] = $this->standard_deviation($samples);
                    $stat['labs'] = sizeof($reportData);
                    echo $this->returnJson(array('status' => 1, 'data' => $reportData, 'stat' => $stat));
                } else {
                    echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
                }
//                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
        }

        exit;
    }

    public function getshipmentsreportsAction()
    {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $postedData['grade'] = $postedData['grade'];
            }
            unset($postedData['grade']);
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $postedData['sampleId'] = $sampleDetails['id'];
            }
            unset($postedData['sample']);
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
            unset($postedData['region']);
        }
        if (isset($postedData['round'])) {
            if ($postedData['round'] == '') {
                unset($postedData['round']);
            } else {
                $whereRound['roundName'] = $postedData['round'];
                $roundDetails = $this->returnValueWhere($whereRound, 'tbl_bac_rounds');

                $postedData['roundId'] = $roundDetails['id'];
            }
            unset($postedData['round']);
        }


        $orderArray = ['id', 'dateCreated'];
        $col = ['*'];

        $groupArray = ['participantId', 'roundId', 'sampleId'];


        $report = array();
        $postedData['roundId >'] = 0;
        $counter = 0;
        if (isset($labs)) {
            if ($labs != false) {


                $data['totalResponded'] = 0;

                foreach ($labs as $key => $value) {
                    $postedData['participantId'] = $value->participant_id;
                    $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);

                    if ($sampleToPanel != false) {

                        foreach ($sampleToPanel as $ky => $val) {
                            $counter++;
                            $sampleToPanel[$ky]->index = $counter;
                            $whereParticipantId['participant_id'] = $val->participantId;
                            $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                            $whereSampleId['id'] = $val->sampleId;;
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                            $roundId['id'] = $val->roundId;;
                            $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                            $sampleToPanel[$ky]->sample = $sampleInfo;
                            $sampleToPanel[$ky]->round = $roundInfo;
                            $sampleToPanel[$ky]->lab = $participantInfo;


                            $whereSamples['sampleId'] = $val->sampleId;
                            $whereSamples['shipmentId'] = $val->shipmentId;
                            $whereSamples['participantId'] = $val->participantId;

                            $sampleToPanel[$ky]->totalSent = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');

                            $whereSamples['deliveryStatus'] = 4;
                            $sampleToPanel[$ky]->received = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                            $whereSamples['deliveryStatus'] = 5;
                            $sampleToPanel[$ky]->rejected = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                            unset($whereSamples);
                            array_push($report, (array)$sampleToPanel[$ky]);
                        }
                    }
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {

//            $postedData['shipmentId >'] = 0;
            $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);

            if ($sampleToPanel != false) {

                foreach ($sampleToPanel as $ky => $val) {
                    $counter++;
                    $sampleToPanel[$ky]->index = $counter;
                    $whereParticipantId['participant_id'] = $val->participantId;
                    $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                    $whereSampleId['id'] = $val->sampleId;;
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $roundId['id'] = $val->roundId;;
                    $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                    $sampleToPanel[$ky]->sample = $sampleInfo;
                    $sampleToPanel[$ky]->round = $roundInfo;
                    $sampleToPanel[$ky]->lab = $participantInfo;

                    $whereSamples['sampleId'] = $val->sampleId;
                    $whereSamples['shipmentId'] = $val->shipmentId;
                    $whereSamples['participantId'] = $val->participantId;
                    $sampleToPanel[$ky]->totalSent = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');

                    $whereSamples['deliveryStatus'] = 4;
                    $sampleToPanel[$ky]->received = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                    $whereSamples['deliveryStatus'] = 5;
                    $sampleToPanel[$ky]->rejected = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $whereSamples, 'roundId');
                    unset($whereSamples);
                }

                echo $this->returnJson(array('status' => 1, 'data' => $sampleToPanel));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function getcorrectiveaactionreportAction()
    {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $postedData['grade'] = $postedData['grade'];
            }
            unset($postedData['grade']);
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $postedData['sampleId'] = $sampleDetails['id'];
            }
            unset($postedData['sample']);
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
            unset($postedData['region']);
        }
        if (isset($postedData['round'])) {
            if ($postedData['round'] == '') {
                unset($postedData['round']);
            } else {
                $whereRound['roundName'] = $postedData['round'];
                $roundDetails = $this->returnValueWhere($whereRound, 'tbl_bac_rounds');

                $postedData['roundId'] = $roundDetails['id'];
            }
            unset($postedData['round']);
        }


        $orderArray = ['id', 'dateCreated'];
        $col = ['id', 'participantId', 'roundId', 'sampleId', 'remarks', 'grade', 'adminRemarks', 'correctiveAction', 'dateCreated'];

        $groupArray = ['id'];


        $report = array();

        $postedData['correctiveAction'] = 1;
        if (isset($labs)) {
            if ($labs != false) {


                $data['totalResponded'] = 0;
                foreach ($labs as $key => $value) {
                    $postedData['participantId'] = $value->participant_id;
                    $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $postedData, $orderArray, true, $groupArray);
                    if ($sampleToPanel != false) {
                        foreach ($sampleToPanel as $ky => $val) {
                            $whereParticipantId['participant_id'] = $val->participantId;
                            $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                            $whereSampleId['id'] = $val->sampleId;;
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                            $roundId['id'] = $val->roundId;;
                            $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                            $sampleToPanel[$ky]->sample = $sampleInfo;
                            $sampleToPanel[$ky]->round = $roundInfo;
                            $sampleToPanel[$ky]->lab = $participantInfo;

                            array_push($report, (array)$sampleToPanel[$ky]);
                        }
                    }
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            $postedData['roundId >'] = 0;
            $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $postedData, $orderArray, true, $groupArray);
            if ($sampleToPanel != false) {
                foreach ($sampleToPanel as $ky => $val) {
                    $whereParticipantId['participant_id'] = $val->participantId;
                    $participantInfo = $this->returnValueWhere($whereParticipantId, 'participant');
                    $whereSampleId['id'] = $val->sampleId;;
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $roundId['id'] = $val->roundId;;
                    $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');

                    $sampleToPanel[$ky]->sample = $sampleInfo;
                    $sampleToPanel[$ky]->round = $roundInfo;
                    $sampleToPanel[$ky]->lab = $participantInfo;
                }

                echo $this->returnJson(array('status' => 1, 'data' => $sampleToPanel));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function getroundparticipatoryAction()
    {
        $postedData = $this->returnArrayFromInput();


        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            } else {
                $postedData['grade'] = $postedData['grade'];
            }
            unset($postedData['grade']);
        }
        if (isset($postedData['sample'])) {
            if ($postedData['sample'] == '') {
                unset($postedData['sample']);
            } else {
                $wheresample['batchName'] = $postedData['sample'];
                $sampleDetails = $this->returnValueWhere($wheresample, 'tbl_bac_samples');

                $postedData['sampleId'] = $sampleDetails['id'];
            }
            unset($postedData['sample']);
        }

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            } else {
                $whereCounty['region'] = $postedData['region'];
                $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            }
            unset($postedData['region']);
        }
        if (isset($postedData['round'])) {
            if ($postedData['round'] == '') {
                unset($postedData['round']);
            } else {
                $whereRound['roundName'] = $postedData['round'];
                $roundDetails = $this->returnValueWhere($whereRound, 'tbl_bac_rounds');

                $postedData['roundId'] = $roundDetails['id'];
            }
            unset($postedData['round']);
        }


        $orderArray = ['id', 'dateCreated'];
        $col = ['id', 'participantId', 'roundId', 'sampleId'];

        $groupArray = ['roundId', 'sampleId'];

//        var_dump($labs);
//        exit;
        $report = array();

        $data['totalResponded'] = 0;
        $data['totalUnresponded'] = 0;
        $data['totalTotalEvaluated'] = 0;
        $data['totalTotalUnevaluated'] = 0;
        $data['totalLabsAndSamples'] = 0;

        if (isset($labs)) {
            if ($labs != false) {


                $data['totalResponded'] = 0;
                foreach ($labs as $key => $value) {
                    $postedData['participantId'] = $value->participant_id;
                    $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);
                    if ($sampleToPanel != false) {
                        foreach ($sampleToPanel as $ky => $val) {

//                            $where['participantId'] = $val->participantId;
                            $where['roundId'] = $val->roundId;
                            $where['sampleId'] = $val->sampleId;

                            $whereSampleId['id'] = $where['sampleId'];
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                            $roundId['id'] = $where['roundId'];
                            $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');
                            $data['sample'] = $sampleInfo;
                            $data['round'] = $roundInfo;

                            $data['totalResponded'] = $this->dbConnection->selectCount('tbl_bac_response_results', $where, 'roundId');


                            $evaluated = $where;
                            $unevaluated['markedStatus'] = 1;
                            $data['totalTotalEvaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $evaluated, 'roundId');
                            $unevaluated = $where;
                            $unevaluated['markedStatus'] = 0;
                            $data['totalTotalUnevaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $unevaluated, 'roundId');

                            $data['totalLabsAndSamples'] = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $where, 'roundId');
                            $data['totalUnresponded'] = $data['totalLabsAndSamples'] - $data['totalResponded'];
                            $data['responseRate'] = round(($data['totalResponded'] / $data['totalLabsAndSamples']) * 100, 2);
                            array_push($report, $data);
                        }
                    }
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            $postedData['roundId >'] = 0;
            $sampleToPanel = $this->dbConnection->selectReportFromTable('tbl_bac_sample_to_panel', $col, $postedData, $orderArray, true, $groupArray);
            if ($sampleToPanel != false) {
                foreach ($sampleToPanel as $ky => $val) {

//                    $where['participantId'] = $val->participantId;
                    $where['roundId'] = $val->roundId;
                    $where['sampleId'] = $val->sampleId;

                    $whereSampleId['id'] = $where['sampleId'];
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $roundId['id'] = $where['roundId'];
                    $roundInfo = $this->returnValueWhere($roundId, 'tbl_bac_rounds');
                    $data['sample'] = $sampleInfo;
                    $data['round'] = $roundInfo;

                    $data['totalResponded'] = $this->dbConnection->selectCount('tbl_bac_response_results', $where, 'roundId');


                    $evaluated = $where;
                    $unevaluated['markedStatus'] = 1;
                    $data['totalTotalEvaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $evaluated, 'roundId');
                    $unevaluated = $where;
                    $unevaluated['markedStatus'] = 0;
                    $data['totalTotalUnevaluated'] = $this->dbConnection->selectCount('tbl_bac_response_results', $unevaluated, 'roundId');

                    $data['totalLabsAndSamples'] = $this->dbConnection->selectCount('tbl_bac_sample_to_panel', $where, 'roundId');
                    $data['totalUnresponded'] = $data['totalLabsAndSamples'] - $data['totalResponded'];
                    $data['responseRate'] = round(($data['totalResponded'] / $data['totalLabsAndSamples']) * 100, 2);
                    array_push($report, $data);
                }

                echo $this->returnJson(array('status' => 1, 'data' => $report));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function getlabperformanceAction()
    {
        $postedData = $this->returnArrayFromInput();

        if (isset($postedData['region'])) {
            if ($postedData['region'] == '') {
                unset($postedData['region']);
            }
        }
        if (isset($postedData['grade'])) {
            if ($postedData['grade'] == '') {
                unset($postedData['grade']);
            }
        }
        $sum = 0;
        $samples = array();
        if (isset($postedData['region'])) {
            $county = $postedData['region'];
            unset($postedData['region']);
            $whereCounty['region'] = $county;
            $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            $where = $postedData;
            if ($labs != false) {

                $report = array();
                foreach ($labs as $key => $value) {

                    $where['participantId'] = $value->participant_id;
                    $orderArray = array('id', 'dateCreated');
                    $col = array('*');

                    $groupArray = array('id');
                    $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $where, $orderArray, true, $groupArray);
                    if ($reportData != false) {

                        foreach ($reportData as $keys => $val) {

                            $whereSampleId['id'] = $val->sampleId;
                            $whereRoundId['id'] = $val->roundId;

                            $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                            $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');

                            $reportData[$keys]->labName = $value->institute_name;
                            $reportData[$keys]->county = $value->region;
                            $reportData[$keys]->unique_identifier = $value->unique_identifier;
                            $reportData[$keys]->MflCode = $value->MflCode;

                            $reportData[$keys]->roundName = $roundInfo['roundName'];
                            $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                            $reportData[$keys]->batchName = $sampleInfo['batchName'];
                            $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                            $reportData[$keys]->unique_identifier = $value->unique_identifier;
                            $reportData[$keys]->status = 'valid';
                            array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                            $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                            array_push($report, (array)$reportData[$keys]);
                        }
                    }
                }
                $stat['total'] = $sum;
                $stat['mean'] = round($sum / sizeof($report), 4);
                $stat['labs'] = sizeof($report);
                $stat['sd'] = $this->standard_deviation($samples);

                if (!empty($report)) {
                    echo $this->returnJson(array('status' => 1, 'data' => $report, 'stat' => $stat));
                }
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        } else {
            $where = $postedData;
            $orderArray = ['id', 'dateCreated'];
            $col = ['*'];

            $groupArray = ['id'];
            $reportData = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $where, $orderArray, true, $groupArray);
            if ($reportData != false) {

                foreach ($reportData as $keys => $val) {

                    $whereSampleId['id'] = $val->sampleId;
                    $whereRoundId['id'] = $val->roundId;
                    $whereLabId['participant_id'] = $val->participantId;

                    $roundInfo = $this->returnValueWhere($whereRoundId, 'tbl_bac_rounds');
                    $sampleInfo = $this->returnValueWhere($whereSampleId, 'tbl_bac_samples');
                    $labInfo = $this->returnValueWhere($whereLabId, 'participant');

                    $reportData[$keys]->labName = $labInfo['institute_name'];
                    $reportData[$keys]->county = $labInfo['region'];
                    $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];

                    $reportData[$keys]->roundName = $roundInfo['roundName'];
                    $reportData[$keys]->roundCode = $roundInfo['roundCode'];

                    $reportData[$keys]->batchName = $sampleInfo['batchName'];
                    $reportData[$keys]->materialSource = $sampleInfo['materialSource'];

                    $reportData[$keys]->unique_identifier = $labInfo['unique_identifier'];
                    $reportData[$keys]->MflCode = $labInfo['MflCode'];
                    $reportData[$keys]->status = 'valid';
                    array_push($samples, ($val->finalScore + $val->totalMicroAgentsScore));
                    $sum += ($val->finalScore + $val->totalMicroAgentsScore);
                }
                $stat['total'] = $sum;
                $stat['mean'] = round($sum / sizeof($reportData), 4);
                $stat['sd'] = $this->standard_deviation($samples);
                $stat['labs'] = sizeof($reportData);
                echo $this->returnJson(array('status' => 1, 'data' => $reportData, 'stat' => $stat));
            } else {
                echo $this->returnJson(array('status' => 0, 'message' => 'No records Available'));
            }
        }

        exit;
    }

    public function standard_deviation($aValues, $bSample = false)
    {
        $fMean = array_sum($aValues) / count($aValues);
        $fVariance = 0.0;
        foreach ($aValues as $i) {
            $fVariance += pow($i - $fMean, 2);
        }
        $fVariance /= ($bSample ? count($aValues) - 1 : count($aValues));
        return (float)sqrt($fVariance);
    }

    public function getcountiesAction()
    {
        $where['status'] = 1;
        $counties = $this->dbConnection->selectFromTable('rep_counties', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $counties));

        exit;
    }

    public function getgradesAction()
    {
        $where['status'] = 1;
        $grades = $this->dbConnection->selectFromTable('tbl_bac_grades', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $grades));

        exit;
    }

    public function getroundsAction()
    {
        $where['status'] = 1;
        $rounds = $this->dbConnection->selectFromTable('tbl_bac_rounds', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $rounds));

        exit;
    }

    public function getsamplesAction()
    {
        $where['status'] = 1;
        $samples = $this->dbConnection->selectFromTable('tbl_bac_samples', $where);
        echo $this->returnJson(array('status' => 1, 'data' => $samples));

        exit;
    }

}
