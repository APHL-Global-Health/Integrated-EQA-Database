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

        echo $this->returnJson($updatePublication);
        exit;


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

    public function updatefunctionAction()
    {
        $posted = $this->returnArrayFromInput();
        print_r($posted);
        exit;
        $whereEvaluation['id'] = $posted['id'];
        $updateEval = $posted['data'];

        $updateEvaluation = $this->dbConnection->updateTable('tbl_bac_response_results', $whereEvaluation, $updateEval);
        echo $this->returnJson($updateEvaluation);
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
        $susceptibility = $this->dbConnection->selectFromTable('tbl_bac_suscepitibility', $where);
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
}