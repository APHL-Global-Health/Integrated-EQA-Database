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
    protected $_roundsLabTable = 'tbl_bac_rounds_labs';
    protected $_mflCodesTable = 'mfl_facility_codes';
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


    public function getResults($where = null)
    {
        $select = array('count(if(grade="UNACCEPTABLE",1,null)) as UNACCEPTABLE','count(if(grade="ACCEPTABLE",1,null)) as ACCEPTABLE', 'sampleId');

        $sQuery = $this->getAdapter()->select();

        $sQuery->group('grade');
        $sQuery->group('sampleId');

        $sQuery->from(array('s' => $this->_responsesTable), $select);

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = array('status' => 1, 'data' => $this->getAdapter()->fetchAll($sQuery), 'message' => 'results available');

    }


}