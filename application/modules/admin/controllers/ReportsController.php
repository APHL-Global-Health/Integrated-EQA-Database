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
            foreach ($data as $key => $value) {
                $round = $this->returnValueWhere($value->id, 'tbl_bac_rounds');

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
            echo $this->returnJson(array('status' => 0, 'message' => 'Round Evaluation was Unsuccessful !'));
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
        echo $this->returnJson($updatePublication);

        if ($update['published'] == 1) {
            $this->sendEmailToEnrolledLabsForPublish($wherePub['id']);
        }
        exit;


    }

    public function sendEmailToEnrolledLabsForPublish($roundId)
    {
        $where['roundId'] = $roundId;
        $where['status'] = 2;

        $enrolledLabs = $this->dbConnection->selectFromTable('tbl_bac_ready_labs', $where);

        if ($enrolledLabs != false) {
            $round = $this->returnValueWhere($where['roundId'], 'tbl_bac_rounds');

            foreach ($enrolledLabs as $key => $value) {
                $labDetails = $this->returnValueWhere($value->labId, 'participant');
                if (!empty($labDetails)) {
                    if ($labDetails['email'] != '' || $labDetails['email'] != null) {
                        $this->publishedMails($labDetails, $round);
                    }
                }
            }

        }
    }

    public function publishedMails($lab, $round)
    {

        $name = $lab['institute_name'] . ' ' . $lab['unique_identifier'];

        $message = 'The results for for round, <b>' . $round['roundName'] . ' : ' . $round['roundCode'] . '</b> have been evaluated and published.<br>Please log in to view.';

        $body = $this->createEmailBody($name, $message);

        $this->sendemailAction($body, $lab['email'], true);
    }

    public function getindividuallabsAction()
    {
        $postedData = $this->returnArrayFromInput();
        $col = ['*'];
        $orderArray = ['id', 'dateCreated'];

        $groupArray = ['id'];

        $data = $this->dbConnection->selectReportFromTable('tbl_bac_response_results', $col, $postedData, $orderArray, true, $groupArray);

        if ($data != false) {

            foreach ($data as $key => $value) {
                $labDetails = $this->returnValueWhere($value->participantId, 'participant');
                $sample = $this->returnValueWhere($value->sampleId, 'tbl_bac_samples');
                $data[$key]->labDetails = $labDetails;
                $data[$key]->batchName = $sample['batchName'];
                $data[$key]->sampleInstructions = $sample['sampleInstructions'];
                $data[$key]->sampleDetails = $sample['sampleDetails'];
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
            $where = [];
            foreach ($posted as $key => $value) {
                $arr = (array)$value;
                $whereUpdate['id'] = $arr['id'];

                $where['panelToSampleId'] = $arr['panelToSampleId'];
                $where['participantId'] = $arr['participantId'];
                $where['userId'] = $arr['userId'];
                $where['sampleId'] = $arr['sampleId'];
                $where['roundId'] = $arr['roundId'];

                $update['score'] = $arr['score'];
                $update['adminMarked'] = 1;
                $microSum += $arr['score'];
                $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_micro_bacterial_agents', $whereUpdate, $update);
            }
            $updateEval['totalMicroAgentsScore'] = $microSum;
            $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_response_results', $where, $updateEval);
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
        unset($updateEval['totalMicroAgentsScore']);

//        print_r($updateEval);
//        exit;
        $finalScore = 0;
        $score = '';
        $updateEval['markedStatus'] = 1;
        $updateEval['adminMarked'] = 1;
        foreach ($updateEval as $key => $value) {

            if (is_numeric($value) && substr($key, -5) == 'Score') {

                $finalScore += $value;
            }
        }
        $updateEval['finalScore'] = $finalScore;


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

    public function evaluateresultsAction($whereRoundData = '')
    {
        /*select results for evaluation*/
        $postedData = $this->returnArrayFromInput();
        $where = [];


        if (!empty($whereRoundData)) {
            $where = $whereRoundData;

        } else {
            $where['shipmentId'] = $postedData['id'];
            $where['startRoundFlag'] = 1;


            $shipmentInfo = $this->returnValueWhere($where['shipmentId'], 'tbl_bac_shipments');
            $where['dateFrom'] = $shipmentInfo['dateCreated'];

        }

        /*run this on retrieving shipment from shipment table*/
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


            /*run this if update on all tables was a success*/

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
                if ($responseResults['grainStainReaction'] == $sampleExpectedResult['grainStainReaction']) {
                    $score['grainStainReactionScore'] = $sampleExpectedResult['grainStainReactionScore'];
                } else if (in_array($responseResults['grainStainReaction'], explode(' ', $sampleExpectedResult['grainStainReaction']))) {
                    $score['grainStainReactionScore'] = 0.75 * $sampleExpectedResult['grainStainReactionScore'];
                }
                if ($responseResults['primaryMedia'] == $sampleExpectedResult['primaryMedia']) {
                    $score['primaryMedia'] = $sampleExpectedResult['primaryMediaScore'];
                }
                if ($responseResults['incubationConditions'] == $sampleExpectedResult['incubationConditions']) {
                    $score['incubationConditionsScore'] = $sampleExpectedResult['incubationConditionsScore'];
                }
                if ($responseResults['colonialMorphology'] == $sampleExpectedResult['colonialMorphology']) {
                    $score['colonialMorphologyScore'] = $sampleExpectedResult['colonialMorphologyScore'];
                }
                if ($responseResults['bacterialQualification'] == $sampleExpectedResult['bacterialQualification']) {
                    $score['bacterialQualificationScore'] = $sampleExpectedResult['bacterialQualificationScore'];
                }
                if ($responseResults['bacterialReagents'] == $sampleExpectedResult['bacterialReagents']) {
                    $score['bacterialReagentsScore'] = $sampleExpectedResult['bacterialReagentsScore'];
                }
                if ($responseResults['isolateProcessing'] == $sampleExpectedResult['isolateProcessing']) {
                    $score['isolateProcessingScore'] = $sampleExpectedResult['isolateProcessing'];
                }
                if ($responseResults['finalIdentification'] == $sampleExpectedResult['finalIdentification']) {
                    $score['finalIdentificationScore'] = $sampleExpectedResult['finalIdentificationScore'];
                }
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
                    if ($updateSuscepibility['status']) {
                        $update['feedBack'] = 1;


                        $update['totalCorrectScore'] = $score['finalScore'];
                        $update['totalMicroAgentsScore'] = $updateSuscepibility['susScore'];

                        $score['totalMicroAgentsScore'] = $updateSuscepibility['susScore'];
                        /*total grading update of marks happens here*/
                        $total = $score['totalMicroAgentsScore'] + $update['totalCorrectScore'];
                        $gradingArray = $this->getGradeRemark($total);

                        $update['grade'] = $gradingArray['grade'];
                        $update['remarks'] = $gradingArray['remarks'];

                        $score['grade'] = $gradingArray['grade'];
                        $score['remarks'] = $gradingArray['remarks'];

                        $updateLabResultsResp = $this->dbConnection->updateTable('tbl_bac_response_results', $whereResponse, $score);

                        $updateLabResults = $this->dbConnection->updateTable('tbl_bac_samples_to_users', $whereResponse, $update);

                        if ($updateLabResults['status'] == 0) {
//                            var_dump($updateLabResults);
                        }
                    }
                }

            }

        }
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
                        $whereSamPan['panelToSampleId'] = $valPan->id;
                        $whereSamPan['sampleId'] = $valPan->sampleId;

                        $data[$key]->totalRespondedSamples += $this->dbConnection->selectCount('tbl_bac_response_results', $whereSamPan, 'id');
                        $whereSamPan['markedStatus'] = 1;
                        $data[$key]->totalEvaluatedSamples += $this->dbConnection->selectCount('tbl_bac_response_results', $whereSamPan, 'id');
                    }

                }
                $data[$key]->totalUnRespondedSamples = $data[$key]->totalSamples - $data[$key]->totalRespondedSamples;
                $data[$key]->totalUnEvaluatedSamples = $data[$key]->totalRespondedSamples - $data[$key]->totalEvaluatedSamples;


            }
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

                $whereSampleId = $whereResponse['sampleId'];

                $microExpectedAgents = $this->dbConnection->selectFromTable('tbl_bac_expected_micro_bacterial_agents', $whereSampleId);
                $returnScore = 0;
                foreach ($microAgents as $key => $value) {
                    $score['score'] = 0;

                    foreach ($microExpectedAgents as $ekey => $evalue) {
                        if ($microAgents[$key]->antiMicroAgent == $microExpectedAgents[$key]->antiMicroAgent) {
                            $score['score'] = ($microExpectedAgents[$key]->finalScore / 2);
                            if ($this->getMicroLevel($microAgents[$key]->diskContent, $microAgents[$key]->antiMicroAgent)
                                == $this->getMicroLevel($microExpectedAgents[$key]->diskContent, $microExpectedAgents[$key]->antiMicroAgent)
                            ) {
                                $score['score'] = $microExpectedAgents[$key]->finalScore;

                            } else {

                                $this->outOfRange($this->getMicroLevel($microAgents[$key]->diskContent, $microAgents[$key]->antiMicroAgent), $whereResponse);
                            }

                            break;
                        }
                    }
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
        if ($microAgents != false) {
            foreach ($microAgents as $key => $value) {

                $sampleInfoRange = $this->getMicroLevel($microAgents[$key]->diskContent, $microAgents[$key]->antiMicroAgent);
                $microAgents[$key]->range = $sampleInfoRange;
            }
        }
        echo $this->returnJson(array('status' => 1, 'data' => $data));

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
        $samples = [];
        if ($roundDetails != false) {
            if (isset($labs) && $labs != false) {

                $report = [];
                foreach ($labs as $key => $value) {

                    $whereSearch['participantId'] = $value->participant_id;
                    $orderArray = ['id', 'dateCreated'];
                    $col = ['*'];

                    $groupArray = ['id'];
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
        $samples = [];
        if (isset($postedData['region'])) {
            $county = $postedData['region'];
            unset($postedData['region']);
            $whereCounty['region'] = $county;
            $labs = $this->dbConnection->selectFromTable('participant', $whereCounty);
            $where = $postedData;
            if ($labs != false) {

                $report = [];
                foreach ($labs as $key => $value) {

                    $where['participantId'] = $value->participant_id;
                    $orderArray = ['id', 'dateCreated'];
                    $col = ['*'];

                    $groupArray = ['id'];
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