<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 4/23/2018
 * Time: 12:14
 */

class Application_Model_DbTable_MicroReports extends Zend_Db_Table_Abstract

{

    protected $_roundsTable = 'tbl_bac_rounds';
    protected $_samplesTable = 'tbl_bac_samples';
    protected $_participantsTable = 'participant';
    protected $_countiesTable = 'rep_counties';
    protected $_shipmentsTable = 'tbl_bac_shipments';
    protected $_responsesTable = 'tbl_bac_response_results';
    protected $_expectedTable = 'tbl_bac_expected_results';
    protected $_expectedMicroTable = 'tbl_bac_expected_micro_bacterial_agents';
    protected $_roundsLabTable = 'tbl_bac_rounds_labs';
    protected $_mflCodesTable = 'mfl_facility_codes';
    protected $_sampleToPanelTable = 'tbl_bac_sample_to_panel';
    protected $_gradesTable = 'tbl_bac_grades';

    public function getRounds($where = null)
    {


        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_roundsTable));
        if (isset($where)) {
            $sQuery->where($where);
        }


        return $rResult = array('status' => 1, 'data' => $this->getAdapter()->fetchAll($sQuery), 'message' => 'rounds available');
    }

    public function getLabs($where = null)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_participantsTable));

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = array('status' => 1, 'data' => $this->getAdapter()->fetchAll($sQuery), 'message' => 'counties available');


    }

    public function getSamples($where = null)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_samplesTable));

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = $this->getAdapter()->fetchAll($sQuery);


    }

    public function getGrades($where = null)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_gradesTable));

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = $this->getAdapter()->fetchAll($sQuery);


    }

    public function getCounties($where = null)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_countiesTable));

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = array('status' => 1, 'data' => $this->getAdapter()->fetchAll($sQuery), 'message' => 'counties available');

    }


    public function getShipments($where = null)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_shipmentsTable));

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = $this->getAdapter()->fetchAll($sQuery);

    }

    public function returnWhereStatement($array)
    {

        $where = '  ';
        if (is_array($array)) {


            $counter = 0;
            foreach ($array as $key => $value) {
                if ($value === null) {
                    $where .= $key . " is null ";
                } else {
                    $where .= $key . "=" . " '$value' ";
                }
                $counter++;
                if ($counter < sizeof($array)) {
                    $where .= ' and ';
                }
            }
            if (!isset($array['status'])) {
                $where .= ' ';
            }
        }
        return $where;
    }

    public function returnSampleASTExpected($sampleId)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_expectedMicroTable));


        $sQuery->where("sampleId=?", $sampleId);


        $rResult = $this->getAdapter()->fetchRow($sQuery);
        return $rResult['agentScore'];
    }

    public function returnRoundScoreBasedOnSampleType($sampleId, $type, $where = null)
    {

        //
        $sampleExpected = [];
        {
            $selectExpectedR = '';

            if ($type == 1) {
                $selectExpectedR = "grainStainreactionScore";
            }
            if ($type == 2) {
                $selectExpectedR = "finalIdentificationScore";
            }
            if ($type == 3) {
                $selectExpectedR = "totalMicroAgentsScore";
            }

            if ($type < 3) {
                $selectWhereExpected['sampleId'] = $sampleId;
                $sSelectExpected = $this->getAdapter()
                    ->select()
                    ->from(array('r' => $this->_expectedTable), $selectExpectedR)
                    ->where($this->returnWhereStatement($selectWhereExpected));
                $sampleExpected = $this->getAdapter()->fetchRow($sSelectExpected);

                $scoreExp = !$sampleExpected[$selectExpectedR] > 0 ? 5 : $sampleExpected[$selectExpectedR];
            } else {

                $scoreExp = $this->returnSampleASTExpected($sampleId);
            }
        }
        //

        if (isset($scoreExp)) {
//            echo $selectExpectedR;
            $select = array('count(if(' . $selectExpectedR . '=' . $scoreExp . ',1,null)) as ACCEPTABLE',
                'count(if(' . $selectExpectedR . '<>' . $scoreExp . ',1,null)) as UNACCEPTABLE', 'r.sampleId');


            $sQuery = $this->getAdapter()->select();

            $sQuery->join(array('s' => 'tbl_bac_samples'), 's.id=r.sampleId', array('batchName'));
            $sQuery->group('grade');
            $sQuery->group('sampleId');

            $sQuery->from(array('r' => $this->_responsesTable), $select);
            $where['sampleId'] = $sampleId;
            if (isset($where)) {
                if (isset($where['region'])) {
                    $sQuery->join(array('p' => 'participant'), 'p.participant_id=r.participantId', array('region'));
                }
                $sQuery->where($this->returnWhereStatement($where));
            }
            $rResult = $this->getAdapter()->fetchRow($sQuery);

            return $rResult;//
        } else {
            return false;
        }

    }


    public function getSampleIdSampleTypes($sampleId)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_samplesTable), array('id', 'sampleType', 'batchName'));

        if (isset($where)) {
            $sQuery->where($where);
        }
        $sQuery->where("id =?", $sampleId);

        $rResult = $this->getAdapter()->fetchAll($sQuery);
        $samples = array();
        $str = '';

        $returnArray = array();

        foreach ($rResult as $key => $value) {
            $sampleType = str_replace('[', '', $value['sampleType']);
            $sampleType = str_replace(']', '', $sampleType);
            $sampleType = str_replace('"', '', $sampleType);
            $sampleType = explode(',', $sampleType);

            for ($i = 0; $i < count($sampleType); $i++) {
                if ($sampleType[$i] == 1) {
                    $str = 'ID';

                }
                if ($sampleType[$i] == 2) {
                    $str = 'Gram Stain';
                }
                if ($sampleType[$i] == 3) {
                    $str = 'AST';
                }
                $resultsForSampleType = $this->returnRoundScoreBasedOnSampleType($sampleId, $sampleType[$i], $where = null);

                $resultsForSampleType['newSampleName'] = $value['batchName'] . " " . $str;

                array_push($samples, $resultsForSampleType);

            }


        }
        return $samples;

    }

    public function getResults($where = null)
    {
        $select = array('count(if(grade="UNACCEPTABLE",1,null)) as UNACCEPTABLE', 'count(if(grade="ACCEPTABLE",1,null)) as ACCEPTABLE', 'r.sampleId');

        $sQuery = $this->getAdapter()->select();

        $sQuery->join(array('s' => 'tbl_bac_samples'), 's.id=r.sampleId', array('batchName'));
        $sQuery->group('grade');
        $sQuery->group('sampleId');

        $sQuery->from(array('r' => $this->_responsesTable), $select);

        if (isset($where)) {
            if (isset($where['region'])) {
                $sQuery->join(array('p' => 'participant'), 'p.participant_id=r.participantId', array('region'));
            }
            $sQuery->where($this->returnWhereStatement($where));
        }
        return $rResult = array('status' => 1, 'data' => $this->getAdapter()->fetchAll($sQuery), 'message' => 'results available');

    }

    public function getFilteredSamplesResults($where = null)
    {
        $select = array('r.sampleId');

        $sQuery = $this->getAdapter()->select();

        $sQuery->join(array('s' => 'tbl_bac_samples'), 's.id=r.sampleId', array('batchName'));

        $sQuery->distinct(true);
        $sQuery->group('sampleId');

        $sQuery->from(array('r' => $this->_sampleToPanelTable), $select);

        if (isset($where)) {
            if (isset($where['region'])) {
                $sQuery->join(array('p' => 'participant'), 'p.participant_id=r.participantId', array('region'));
            }
            $sQuery->where($this->returnWhereStatement($where));
        }
        return $rResult = $this->getAdapter()->fetchAll($sQuery);

    }

    public function getLabsResults($where)
    {
        $select = array('count(if(grade="UNACCEPTABLE",1,null)) as UNACCEPTABLE', 'count(if(grade="ACCEPTABLE",1,null)) as ACCEPTABLE', 'r.participantId');

        $sQuery = $this->getAdapter()->select();

        $sQuery->join(array('p' => $this->_participantsTable), 'p.participant_id=r.participantId', array('lab_name', 'first_name', 'mflCode', 'last_name'));
        $sQuery->group('grade');
        $sQuery->group('participantId');

        $sQuery->from(array('r' => $this->_responsesTable), $select);

        if (isset($where)) {
            if (isset($where['region'])) {
                //   $sQuery->join(array('p' => 'participant'), 'p.participant_id=r.participantId', array('region'));
            }
            $sQuery->where($this->returnWhereStatement($where));
        }
        return $rResult = array('status' => 1, 'data' => $this->getAdapter()->fetchAll($sQuery), 'message' => 'results available');

    }

    public function getRoundsResults($where)
    {
        $select = array('count(if(grade="UNACCEPTABLE",1,null)) as UNACCEPTABLE', 'count(if(grade="ACCEPTABLE",1,null)) as ACCEPTABLE', 'r.roundId');

        $sQuery = $this->getAdapter()->select();

        $sQuery->join(array('s' => $this->_roundsTable), 's.id=r.roundId', array('roundName', 'roundCode'));
        $sQuery->group('grade');
        $sQuery->group('roundId');

        $sQuery->from(array('r' => $this->_responsesTable), $select);

        if (isset($where)) {
            if (isset($where['region'])) {
                $sQuery->join(array('p' => 'participant'), 'p.participant_id=r.participantId', array('region'));
            }
            if (isset($where['dateFrom'])) {
                $sQuery->where("s.dateCreated >=?",$where['dateFrom']);
                unset($where['dateFrom']);
            }
            if (isset($where['dateTo'])) {
                $sQuery->where("s.dateCreated <=?",$where['dateTo']);
                unset($where['dateTo']);
            }
            if(!empty($where)) {
                $sQuery->where($this->returnWhereStatement($where));
            }
        }
        return $rResult = array('status' => 1, 'data' => $this->getAdapter()->fetchAll($sQuery), 'message' => 'results available');

    }


}