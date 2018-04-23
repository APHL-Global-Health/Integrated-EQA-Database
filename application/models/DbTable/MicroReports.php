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


        return $rResult = $this->getAdapter()->fetchAll($sQuery);
    }

    public function getLabs($where = null)
    {
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_participantsTable));

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = $this->getAdapter()->fetchAll($sQuery);


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
        return $rResult = $this->getAdapter()->fetchAll($sQuery);

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
        $sQuery = $this->getAdapter()->select()
            ->from(array('s' => $this->_responsesTable));

        if (isset($where)) {
            $sQuery->where($where);
        }
        return $rResult = $this->getAdapter()->fetchAll($sQuery);

    }



}