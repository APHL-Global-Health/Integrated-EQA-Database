<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_DbTable_Importcsv extends Zend_Db_Table_Abstract {

    protected $_name = 'rep_repository';
    protected $_primary = 'ImpID';

    public function getAllData($parameters) {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('ImpID', 'ProviderID', 'ProgramID', 'LabID', 'RoundID', 'SampleCode', 'TestKitID', 'Result', 'ResultCode', 'Grade', 'FailReasonCode');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = $this->_primary;

        /*
         * Paging
         */
        $sLimit = "";
        if (isset($parameters['iDisplayStart']) && $parameters['iDisplayLength'] != '-1') {
            $sOffset = $parameters['iDisplayStart'];
            $sLimit = $parameters['iDisplayLength'];
        }

        /*
         * Ordering
         */
        $sOrder = "";
        if (isset($parameters['iSortCol_0'])) {
            $sOrder = "";
            for ($i = 0; $i < intval($parameters['iSortingCols']); $i++) {
                if ($parameters['bSortable_' . intval($parameters['iSortCol_' . $i])] == "true") {
                    $sOrder .= $aColumns[intval($parameters['iSortCol_' . $i])] . "
				 	" . ($parameters['sSortDir_' . $i]) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        $sWhere = "";
        if (isset($parameters['sSearch']) && $parameters['sSearch'] != "") {
            $searchArray = explode(" ", $parameters['sSearch']);
            $sWhereSub = "";
            foreach ($searchArray as $search) {
                if ($sWhereSub == "") {
                    $sWhereSub .= "(";
                } else {
                    $sWhereSub .= " AND (";
                }
                $colSize = count($aColumns);

                for ($i = 0; $i < $colSize; $i++) {
                    if ($i < $colSize - 1) {
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search) . "%' OR ";
                    } else {
                        $sWhereSub .= $aColumns[$i] . " LIKE '%" . ($search) . "%' ";
                    }
                }
                $sWhereSub .= ")";
            }
            $sWhere .= $sWhereSub;
        }

        /* Individual column filtering */
        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($parameters['bSearchable_' . $i]) && $parameters['bSearchable_' . $i] == "true" && $parameters['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere .= $aColumns[$i] . " LIKE '%" . ($parameters['sSearch_' . $i]) . "%' ";
                } else {
                    $sWhere .= " AND " . $aColumns[$i] . " LIKE '%" . ($parameters['sSearch_' . $i]) . "%' ";
                }
            }
        }


        /*
         * SQL queries
         * Get data to display
         */
        $sQuery = $this->getAdapter()->select()->from(array('a' => $this->_name));

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

        //error_log($sQuery);

        $rResult = $this->getAdapter()->fetchAll($sQuery);


        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $this->getAdapter()->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */
        $sQuery = $this->getAdapter()->select()->from($this->_name, new Zend_Db_Expr("COUNT('" . $sIndexColumn . "')"));
        $aResultTotal = $this->getAdapter()->fetchCol($sQuery);
        $iTotal = $aResultTotal[0];

        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($parameters['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );


        foreach ($rResult as $aRow) {
            $row = array();
            $row[] = $aRow['ProviderID'];
            $row[] = $aRow['ProgramID'];
            $row[] = $aRow['LabID'];
            $row[] = $aRow['RoundID'];
            $row[] = $aRow['SampleCode'];
            $row[] = $aRow['Result'];
            $row[] = $aRow['ResultCode'];
            $row[] = $aRow['Grade'];
            $row[] = $aRow['FailReasonCode'];
            //$row[] = '<a href="/admin/periods/edit/id/' . $aRow['ID'] . '" class="btn btn-warning btn-xs" style="margin-right: 2px;"><i class="icon-pencil"></i> Edit</a>';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function addData($params, $provider, $program, $period) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $labid = $this->getLabID($params[0]);
        $county = $this->getCountyID($params[1]);
        $country = $this->getCountryID($params[2]);
        $releasedate = $params[3];
        $samplecode = $params[4];
        $analyte = $this->getAnalyteID($params[5]);
        $samplecondition = $params[6];
        $datesamplereceived = $params[7];
        $results = $params[8];
        $resultcode = $params[9];
        $grade = $this->getGradeID($params[10]);
        $testkit = $this->getTestKitID($params[11]);
        $shipmentdate = $params[12];
        $failreason = $params[13];

        $data = array(
            'ProviderID' => $provider,
            'LabID' => $labid,
            'RoundID' => $period,
            'ProgramID' => $program,
            'County' => $county,
            'Country' => $country,
            'ReleaseDate' => $releasedate,
            'SampleCode' => $samplecode,
            'AnalyteID' => $analyte,
            'SampleCondition' => $samplecondition,
            'DateSampleReceived' => $datesamplereceived,
            'Result' => $results,
            'ResultCode' => $resultcode,
            'Grade' => $grade,
            'TestKitID' => $testkit,
            'DateSampleShipped' => $shipmentdate,
            'FailReasonCode' => $failreason,
        );
        return $this->insert($data);
    }

    public function saveData($params, $extraInfo) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $db = Zend_Db_Table::getDefaultAdapter();
        $provider = $extraInfo['ProviderID'];
        $program = $extraInfo['ProgramID'];
        $createdColumns = array();
        foreach ($params as $newColumn) {
            $db->beginTransaction();
            try {
                $sqlCommands = "ALTER TABLE `rep_repository` ADD COLUMN " . $this->parseString($newColumn) . " TEXT DEFAULT NULL COMMENT '$newColumn';";
                $db->query($sqlCommands);
                $customf = "INSERT INTO `rep_customfields` (ProviderID,ProgramID,ColumnName,Description) VALUES('$provider','$program','" . $this->parseString($newColumn) . "','$newColumn');";
                $db->query($customf);
                $db->commit();
                $createdColumns [count($createdColumns)] = $this->parseString($newColumn);
            } catch (Exception $ex) {
                $db->rollBack();
            }
        }
        return $createdColumns;
    }

    public function parseString($string) {
        return preg_replace('/[^a-zA-Z]/', '', $string);
    }

    public function getAllColumns() {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchAll(
                "SHOW FULL COLUMNS IN rep_repository where Field NOT IN('ProviderID','RoundID','ProgramID','ImpID')"
        );
        return $result;
    }

    public function getLabID($labname) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT LabID FROM rep_labs WHERE LabName = :placeholder', array('placeholder' => $labname)
        );
        return $result;
    }

    public function getCountyID($countryname) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT CountyID FROM rep_counties WHERE Description = :placeholder', array('placeholder' => $countryname)
        );
        return $result;
    }

    public function getCountryID($countryname) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT id FROM countries WHERE iso_name = :placeholder', array('placeholder' => $countryname)
        );
        return $result;
    }

    public function getAnalyteID($analytename) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT ID FROM rep_analytes WHERE AnalyteDescription = :placeholder', array('placeholder' => $analytename)
        );
        return $result;
    }

    public function getGradeID($gradename) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT ID FROM rep_grading WHERE GradeDescription LIKE :placeholder', array('placeholder' => $gradename . '%')
        );
        return $result;
    }

    public function getTestKitID($kitname) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT ID FROM rep_testkits WHERE TestKitName = :placeholder', array('placeholder' => $kitname)
        );
        return $result;
    }

    public function getFailReasonID($reason) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT ID FROM rep_failreasons WHERE ReasonDescription = :placeholder', array('placeholder' => $reason)
        );
        return $result;
    }

    public function getPeriodDetails($adminId) {
        $db = Zend_Db_Table::getDefaultAdapter();
        $result = $db->fetchOne(
                'SELECT LabID FROM rep_labs WHERE LabName = :placeholder', array('placeholder' => $labname)
        );
        return $result;
    }

    public function updatePeriods($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'PeriodDescription' => $params['PeriodDescription'],
            'ProviderID' => $params['ProviderID'],
            'CreatedBy' => $authNameSpace->admin_id,
            'CreatedDate' => new Zend_Db_Expr('now()')
        );
        return $this->update($data, "ID=" . $params['ID']);
    }

}
