<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:46  09/12/2016
	* 
	*
	* DATABASE CRUD GENERATOR IS AN OPEN SOURCE PROJECT. TO IMPROVE ON THIS PROJECT BY
	* ADDING MODULES, FIXING BUGS e.t.c GET THE SOURCE CODE FROM GIT (https://github.com/marviktintor/dbcrudgen/)
	* 
	* DATABASE CRUD GENERATOR INFO:
	* 
	* DEVELOPER : VICTOR MWENDA
	* VERSION : DEVELOPER PREVIEW 0.1
	* SUPPORTED LANGUAGES : PHP
	* DEVELOPER EMAIL : vmwenda.vm@gmail.com
	* 
	*/


/**
*  
* ResponseResultDbs
*  
* Low level class for manipulating the data in the table response_result_dbs
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ResponseResultDbs {

	private $databaseUtils;
	private $action;
	private $client;
	
	public function __construct($databaseUtils, $action = "", $client = "") {
		$this->init($databaseUtils);
	}
	
	//Initializes
	public function init($databaseUtils) {
		
		//Init
		$this->databaseUtils = $databaseUtils;
		
	}
	
		
	/**
	* private class variable $_shipmentMapId
	*/
	private $_shipmentMapId;
	
	/**
	* returns the value of $shipmentMapId
	*
	* @return object(int|string) shipmentMapId
	*/
	public function _getShipmentMapId() {
		return $this->_shipmentMapId;
	}
	
	/**
	* sets the value of $_shipmentMapId
	*
	* @param shipmentMapId
	*/
	public function _setShipmentMapId($shipmentMapId) {
		$this->_shipmentMapId = $shipmentMapId;
	}
	/**
	* sets the value of $_shipmentMapId
	*
	* @param shipmentMapId
	* @return object ( this class)
	*/
	public function setShipmentMapId($shipmentMapId) {
		$this->_setShipmentMapId($shipmentMapId);
		return $this;
	}
	
	
	/**
	* private class variable $_sampleId
	*/
	private $_sampleId;
	
	/**
	* returns the value of $sampleId
	*
	* @return object(int|string) sampleId
	*/
	public function _getSampleId() {
		return $this->_sampleId;
	}
	
	/**
	* sets the value of $_sampleId
	*
	* @param sampleId
	*/
	public function _setSampleId($sampleId) {
		$this->_sampleId = $sampleId;
	}
	/**
	* sets the value of $_sampleId
	*
	* @param sampleId
	* @return object ( this class)
	*/
	public function setSampleId($sampleId) {
		$this->_setSampleId($sampleId);
		return $this;
	}
	
	
	/**
	* private class variable $_eia1
	*/
	private $_eia1;
	
	/**
	* returns the value of $eia1
	*
	* @return object(int|string) eia1
	*/
	public function _getEia1() {
		return $this->_eia1;
	}
	
	/**
	* sets the value of $_eia1
	*
	* @param eia1
	*/
	public function _setEia1($eia1) {
		$this->_eia1 = $eia1;
	}
	/**
	* sets the value of $_eia1
	*
	* @param eia1
	* @return object ( this class)
	*/
	public function setEia1($eia1) {
		$this->_setEia1($eia1);
		return $this;
	}
	
	
	/**
	* private class variable $_lotNo1
	*/
	private $_lotNo1;
	
	/**
	* returns the value of $lotNo1
	*
	* @return object(int|string) lotNo1
	*/
	public function _getLotNo1() {
		return $this->_lotNo1;
	}
	
	/**
	* sets the value of $_lotNo1
	*
	* @param lotNo1
	*/
	public function _setLotNo1($lotNo1) {
		$this->_lotNo1 = $lotNo1;
	}
	/**
	* sets the value of $_lotNo1
	*
	* @param lotNo1
	* @return object ( this class)
	*/
	public function setLotNo1($lotNo1) {
		$this->_setLotNo1($lotNo1);
		return $this;
	}
	
	
	/**
	* private class variable $_expDate1
	*/
	private $_expDate1;
	
	/**
	* returns the value of $expDate1
	*
	* @return object(int|string) expDate1
	*/
	public function _getExpDate1() {
		return $this->_expDate1;
	}
	
	/**
	* sets the value of $_expDate1
	*
	* @param expDate1
	*/
	public function _setExpDate1($expDate1) {
		$this->_expDate1 = $expDate1;
	}
	/**
	* sets the value of $_expDate1
	*
	* @param expDate1
	* @return object ( this class)
	*/
	public function setExpDate1($expDate1) {
		$this->_setExpDate1($expDate1);
		return $this;
	}
	
	
	/**
	* private class variable $_od1
	*/
	private $_od1;
	
	/**
	* returns the value of $od1
	*
	* @return object(int|string) od1
	*/
	public function _getOd1() {
		return $this->_od1;
	}
	
	/**
	* sets the value of $_od1
	*
	* @param od1
	*/
	public function _setOd1($od1) {
		$this->_od1 = $od1;
	}
	/**
	* sets the value of $_od1
	*
	* @param od1
	* @return object ( this class)
	*/
	public function setOd1($od1) {
		$this->_setOd1($od1);
		return $this;
	}
	
	
	/**
	* private class variable $_cutoff1
	*/
	private $_cutoff1;
	
	/**
	* returns the value of $cutoff1
	*
	* @return object(int|string) cutoff1
	*/
	public function _getCutoff1() {
		return $this->_cutoff1;
	}
	
	/**
	* sets the value of $_cutoff1
	*
	* @param cutoff1
	*/
	public function _setCutoff1($cutoff1) {
		$this->_cutoff1 = $cutoff1;
	}
	/**
	* sets the value of $_cutoff1
	*
	* @param cutoff1
	* @return object ( this class)
	*/
	public function setCutoff1($cutoff1) {
		$this->_setCutoff1($cutoff1);
		return $this;
	}
	
	
	/**
	* private class variable $_eia2
	*/
	private $_eia2;
	
	/**
	* returns the value of $eia2
	*
	* @return object(int|string) eia2
	*/
	public function _getEia2() {
		return $this->_eia2;
	}
	
	/**
	* sets the value of $_eia2
	*
	* @param eia2
	*/
	public function _setEia2($eia2) {
		$this->_eia2 = $eia2;
	}
	/**
	* sets the value of $_eia2
	*
	* @param eia2
	* @return object ( this class)
	*/
	public function setEia2($eia2) {
		$this->_setEia2($eia2);
		return $this;
	}
	
	
	/**
	* private class variable $_lotNo2
	*/
	private $_lotNo2;
	
	/**
	* returns the value of $lotNo2
	*
	* @return object(int|string) lotNo2
	*/
	public function _getLotNo2() {
		return $this->_lotNo2;
	}
	
	/**
	* sets the value of $_lotNo2
	*
	* @param lotNo2
	*/
	public function _setLotNo2($lotNo2) {
		$this->_lotNo2 = $lotNo2;
	}
	/**
	* sets the value of $_lotNo2
	*
	* @param lotNo2
	* @return object ( this class)
	*/
	public function setLotNo2($lotNo2) {
		$this->_setLotNo2($lotNo2);
		return $this;
	}
	
	
	/**
	* private class variable $_expDate2
	*/
	private $_expDate2;
	
	/**
	* returns the value of $expDate2
	*
	* @return object(int|string) expDate2
	*/
	public function _getExpDate2() {
		return $this->_expDate2;
	}
	
	/**
	* sets the value of $_expDate2
	*
	* @param expDate2
	*/
	public function _setExpDate2($expDate2) {
		$this->_expDate2 = $expDate2;
	}
	/**
	* sets the value of $_expDate2
	*
	* @param expDate2
	* @return object ( this class)
	*/
	public function setExpDate2($expDate2) {
		$this->_setExpDate2($expDate2);
		return $this;
	}
	
	
	/**
	* private class variable $_od2
	*/
	private $_od2;
	
	/**
	* returns the value of $od2
	*
	* @return object(int|string) od2
	*/
	public function _getOd2() {
		return $this->_od2;
	}
	
	/**
	* sets the value of $_od2
	*
	* @param od2
	*/
	public function _setOd2($od2) {
		$this->_od2 = $od2;
	}
	/**
	* sets the value of $_od2
	*
	* @param od2
	* @return object ( this class)
	*/
	public function setOd2($od2) {
		$this->_setOd2($od2);
		return $this;
	}
	
	
	/**
	* private class variable $_cutoff2
	*/
	private $_cutoff2;
	
	/**
	* returns the value of $cutoff2
	*
	* @return object(int|string) cutoff2
	*/
	public function _getCutoff2() {
		return $this->_cutoff2;
	}
	
	/**
	* sets the value of $_cutoff2
	*
	* @param cutoff2
	*/
	public function _setCutoff2($cutoff2) {
		$this->_cutoff2 = $cutoff2;
	}
	/**
	* sets the value of $_cutoff2
	*
	* @param cutoff2
	* @return object ( this class)
	*/
	public function setCutoff2($cutoff2) {
		$this->_setCutoff2($cutoff2);
		return $this;
	}
	
	
	/**
	* private class variable $_eia3
	*/
	private $_eia3;
	
	/**
	* returns the value of $eia3
	*
	* @return object(int|string) eia3
	*/
	public function _getEia3() {
		return $this->_eia3;
	}
	
	/**
	* sets the value of $_eia3
	*
	* @param eia3
	*/
	public function _setEia3($eia3) {
		$this->_eia3 = $eia3;
	}
	/**
	* sets the value of $_eia3
	*
	* @param eia3
	* @return object ( this class)
	*/
	public function setEia3($eia3) {
		$this->_setEia3($eia3);
		return $this;
	}
	
	
	/**
	* private class variable $_lotNo3
	*/
	private $_lotNo3;
	
	/**
	* returns the value of $lotNo3
	*
	* @return object(int|string) lotNo3
	*/
	public function _getLotNo3() {
		return $this->_lotNo3;
	}
	
	/**
	* sets the value of $_lotNo3
	*
	* @param lotNo3
	*/
	public function _setLotNo3($lotNo3) {
		$this->_lotNo3 = $lotNo3;
	}
	/**
	* sets the value of $_lotNo3
	*
	* @param lotNo3
	* @return object ( this class)
	*/
	public function setLotNo3($lotNo3) {
		$this->_setLotNo3($lotNo3);
		return $this;
	}
	
	
	/**
	* private class variable $_expDate3
	*/
	private $_expDate3;
	
	/**
	* returns the value of $expDate3
	*
	* @return object(int|string) expDate3
	*/
	public function _getExpDate3() {
		return $this->_expDate3;
	}
	
	/**
	* sets the value of $_expDate3
	*
	* @param expDate3
	*/
	public function _setExpDate3($expDate3) {
		$this->_expDate3 = $expDate3;
	}
	/**
	* sets the value of $_expDate3
	*
	* @param expDate3
	* @return object ( this class)
	*/
	public function setExpDate3($expDate3) {
		$this->_setExpDate3($expDate3);
		return $this;
	}
	
	
	/**
	* private class variable $_od3
	*/
	private $_od3;
	
	/**
	* returns the value of $od3
	*
	* @return object(int|string) od3
	*/
	public function _getOd3() {
		return $this->_od3;
	}
	
	/**
	* sets the value of $_od3
	*
	* @param od3
	*/
	public function _setOd3($od3) {
		$this->_od3 = $od3;
	}
	/**
	* sets the value of $_od3
	*
	* @param od3
	* @return object ( this class)
	*/
	public function setOd3($od3) {
		$this->_setOd3($od3);
		return $this;
	}
	
	
	/**
	* private class variable $_cutoff3
	*/
	private $_cutoff3;
	
	/**
	* returns the value of $cutoff3
	*
	* @return object(int|string) cutoff3
	*/
	public function _getCutoff3() {
		return $this->_cutoff3;
	}
	
	/**
	* sets the value of $_cutoff3
	*
	* @param cutoff3
	*/
	public function _setCutoff3($cutoff3) {
		$this->_cutoff3 = $cutoff3;
	}
	/**
	* sets the value of $_cutoff3
	*
	* @param cutoff3
	* @return object ( this class)
	*/
	public function setCutoff3($cutoff3) {
		$this->_setCutoff3($cutoff3);
		return $this;
	}
	
	
	/**
	* private class variable $_wb
	*/
	private $_wb;
	
	/**
	* returns the value of $wb
	*
	* @return object(int|string) wb
	*/
	public function _getWb() {
		return $this->_wb;
	}
	
	/**
	* sets the value of $_wb
	*
	* @param wb
	*/
	public function _setWb($wb) {
		$this->_wb = $wb;
	}
	/**
	* sets the value of $_wb
	*
	* @param wb
	* @return object ( this class)
	*/
	public function setWb($wb) {
		$this->_setWb($wb);
		return $this;
	}
	
	
	/**
	* private class variable $_wbLot
	*/
	private $_wbLot;
	
	/**
	* returns the value of $wbLot
	*
	* @return object(int|string) wbLot
	*/
	public function _getWbLot() {
		return $this->_wbLot;
	}
	
	/**
	* sets the value of $_wbLot
	*
	* @param wbLot
	*/
	public function _setWbLot($wbLot) {
		$this->_wbLot = $wbLot;
	}
	/**
	* sets the value of $_wbLot
	*
	* @param wbLot
	* @return object ( this class)
	*/
	public function setWbLot($wbLot) {
		$this->_setWbLot($wbLot);
		return $this;
	}
	
	
	/**
	* private class variable $_wbExpDate
	*/
	private $_wbExpDate;
	
	/**
	* returns the value of $wbExpDate
	*
	* @return object(int|string) wbExpDate
	*/
	public function _getWbExpDate() {
		return $this->_wbExpDate;
	}
	
	/**
	* sets the value of $_wbExpDate
	*
	* @param wbExpDate
	*/
	public function _setWbExpDate($wbExpDate) {
		$this->_wbExpDate = $wbExpDate;
	}
	/**
	* sets the value of $_wbExpDate
	*
	* @param wbExpDate
	* @return object ( this class)
	*/
	public function setWbExpDate($wbExpDate) {
		$this->_setWbExpDate($wbExpDate);
		return $this;
	}
	
	
	/**
	* private class variable $_wb160
	*/
	private $_wb160;
	
	/**
	* returns the value of $wb160
	*
	* @return object(int|string) wb160
	*/
	public function _getWb160() {
		return $this->_wb160;
	}
	
	/**
	* sets the value of $_wb160
	*
	* @param wb160
	*/
	public function _setWb160($wb160) {
		$this->_wb160 = $wb160;
	}
	/**
	* sets the value of $_wb160
	*
	* @param wb160
	* @return object ( this class)
	*/
	public function setWb160($wb160) {
		$this->_setWb160($wb160);
		return $this;
	}
	
	
	/**
	* private class variable $_wb120
	*/
	private $_wb120;
	
	/**
	* returns the value of $wb120
	*
	* @return object(int|string) wb120
	*/
	public function _getWb120() {
		return $this->_wb120;
	}
	
	/**
	* sets the value of $_wb120
	*
	* @param wb120
	*/
	public function _setWb120($wb120) {
		$this->_wb120 = $wb120;
	}
	/**
	* sets the value of $_wb120
	*
	* @param wb120
	* @return object ( this class)
	*/
	public function setWb120($wb120) {
		$this->_setWb120($wb120);
		return $this;
	}
	
	
	/**
	* private class variable $_wb66
	*/
	private $_wb66;
	
	/**
	* returns the value of $wb66
	*
	* @return object(int|string) wb66
	*/
	public function _getWb66() {
		return $this->_wb66;
	}
	
	/**
	* sets the value of $_wb66
	*
	* @param wb66
	*/
	public function _setWb66($wb66) {
		$this->_wb66 = $wb66;
	}
	/**
	* sets the value of $_wb66
	*
	* @param wb66
	* @return object ( this class)
	*/
	public function setWb66($wb66) {
		$this->_setWb66($wb66);
		return $this;
	}
	
	
	/**
	* private class variable $_wb55
	*/
	private $_wb55;
	
	/**
	* returns the value of $wb55
	*
	* @return object(int|string) wb55
	*/
	public function _getWb55() {
		return $this->_wb55;
	}
	
	/**
	* sets the value of $_wb55
	*
	* @param wb55
	*/
	public function _setWb55($wb55) {
		$this->_wb55 = $wb55;
	}
	/**
	* sets the value of $_wb55
	*
	* @param wb55
	* @return object ( this class)
	*/
	public function setWb55($wb55) {
		$this->_setWb55($wb55);
		return $this;
	}
	
	
	/**
	* private class variable $_wb51
	*/
	private $_wb51;
	
	/**
	* returns the value of $wb51
	*
	* @return object(int|string) wb51
	*/
	public function _getWb51() {
		return $this->_wb51;
	}
	
	/**
	* sets the value of $_wb51
	*
	* @param wb51
	*/
	public function _setWb51($wb51) {
		$this->_wb51 = $wb51;
	}
	/**
	* sets the value of $_wb51
	*
	* @param wb51
	* @return object ( this class)
	*/
	public function setWb51($wb51) {
		$this->_setWb51($wb51);
		return $this;
	}
	
	
	/**
	* private class variable $_wb41
	*/
	private $_wb41;
	
	/**
	* returns the value of $wb41
	*
	* @return object(int|string) wb41
	*/
	public function _getWb41() {
		return $this->_wb41;
	}
	
	/**
	* sets the value of $_wb41
	*
	* @param wb41
	*/
	public function _setWb41($wb41) {
		$this->_wb41 = $wb41;
	}
	/**
	* sets the value of $_wb41
	*
	* @param wb41
	* @return object ( this class)
	*/
	public function setWb41($wb41) {
		$this->_setWb41($wb41);
		return $this;
	}
	
	
	/**
	* private class variable $_wb31
	*/
	private $_wb31;
	
	/**
	* returns the value of $wb31
	*
	* @return object(int|string) wb31
	*/
	public function _getWb31() {
		return $this->_wb31;
	}
	
	/**
	* sets the value of $_wb31
	*
	* @param wb31
	*/
	public function _setWb31($wb31) {
		$this->_wb31 = $wb31;
	}
	/**
	* sets the value of $_wb31
	*
	* @param wb31
	* @return object ( this class)
	*/
	public function setWb31($wb31) {
		$this->_setWb31($wb31);
		return $this;
	}
	
	
	/**
	* private class variable $_wb24
	*/
	private $_wb24;
	
	/**
	* returns the value of $wb24
	*
	* @return object(int|string) wb24
	*/
	public function _getWb24() {
		return $this->_wb24;
	}
	
	/**
	* sets the value of $_wb24
	*
	* @param wb24
	*/
	public function _setWb24($wb24) {
		$this->_wb24 = $wb24;
	}
	/**
	* sets the value of $_wb24
	*
	* @param wb24
	* @return object ( this class)
	*/
	public function setWb24($wb24) {
		$this->_setWb24($wb24);
		return $this;
	}
	
	
	/**
	* private class variable $_wb17
	*/
	private $_wb17;
	
	/**
	* returns the value of $wb17
	*
	* @return object(int|string) wb17
	*/
	public function _getWb17() {
		return $this->_wb17;
	}
	
	/**
	* sets the value of $_wb17
	*
	* @param wb17
	*/
	public function _setWb17($wb17) {
		$this->_wb17 = $wb17;
	}
	/**
	* sets the value of $_wb17
	*
	* @param wb17
	* @return object ( this class)
	*/
	public function setWb17($wb17) {
		$this->_setWb17($wb17);
		return $this;
	}
	
	
	/**
	* private class variable $_reportedResult
	*/
	private $_reportedResult;
	
	/**
	* returns the value of $reportedResult
	*
	* @return object(int|string) reportedResult
	*/
	public function _getReportedResult() {
		return $this->_reportedResult;
	}
	
	/**
	* sets the value of $_reportedResult
	*
	* @param reportedResult
	*/
	public function _setReportedResult($reportedResult) {
		$this->_reportedResult = $reportedResult;
	}
	/**
	* sets the value of $_reportedResult
	*
	* @param reportedResult
	* @return object ( this class)
	*/
	public function setReportedResult($reportedResult) {
		$this->_setReportedResult($reportedResult);
		return $this;
	}
	
	
	/**
	* private class variable $_calculatedScore
	*/
	private $_calculatedScore;
	
	/**
	* returns the value of $calculatedScore
	*
	* @return object(int|string) calculatedScore
	*/
	public function _getCalculatedScore() {
		return $this->_calculatedScore;
	}
	
	/**
	* sets the value of $_calculatedScore
	*
	* @param calculatedScore
	*/
	public function _setCalculatedScore($calculatedScore) {
		$this->_calculatedScore = $calculatedScore;
	}
	/**
	* sets the value of $_calculatedScore
	*
	* @param calculatedScore
	* @return object ( this class)
	*/
	public function setCalculatedScore($calculatedScore) {
		$this->_setCalculatedScore($calculatedScore);
		return $this;
	}
	
	
	/**
	* private class variable $_createdBy
	*/
	private $_createdBy;
	
	/**
	* returns the value of $createdBy
	*
	* @return object(int|string) createdBy
	*/
	public function _getCreatedBy() {
		return $this->_createdBy;
	}
	
	/**
	* sets the value of $_createdBy
	*
	* @param createdBy
	*/
	public function _setCreatedBy($createdBy) {
		$this->_createdBy = $createdBy;
	}
	/**
	* sets the value of $_createdBy
	*
	* @param createdBy
	* @return object ( this class)
	*/
	public function setCreatedBy($createdBy) {
		$this->_setCreatedBy($createdBy);
		return $this;
	}
	
	
	/**
	* private class variable $_createdOn
	*/
	private $_createdOn;
	
	/**
	* returns the value of $createdOn
	*
	* @return object(int|string) createdOn
	*/
	public function _getCreatedOn() {
		return $this->_createdOn;
	}
	
	/**
	* sets the value of $_createdOn
	*
	* @param createdOn
	*/
	public function _setCreatedOn($createdOn) {
		$this->_createdOn = $createdOn;
	}
	/**
	* sets the value of $_createdOn
	*
	* @param createdOn
	* @return object ( this class)
	*/
	public function setCreatedOn($createdOn) {
		$this->_setCreatedOn($createdOn);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedBy
	*/
	private $_updatedBy;
	
	/**
	* returns the value of $updatedBy
	*
	* @return object(int|string) updatedBy
	*/
	public function _getUpdatedBy() {
		return $this->_updatedBy;
	}
	
	/**
	* sets the value of $_updatedBy
	*
	* @param updatedBy
	*/
	public function _setUpdatedBy($updatedBy) {
		$this->_updatedBy = $updatedBy;
	}
	/**
	* sets the value of $_updatedBy
	*
	* @param updatedBy
	* @return object ( this class)
	*/
	public function setUpdatedBy($updatedBy) {
		$this->_setUpdatedBy($updatedBy);
		return $this;
	}
	
	
	/**
	* private class variable $_updatedOn
	*/
	private $_updatedOn;
	
	/**
	* returns the value of $updatedOn
	*
	* @return object(int|string) updatedOn
	*/
	public function _getUpdatedOn() {
		return $this->_updatedOn;
	}
	
	/**
	* sets the value of $_updatedOn
	*
	* @param updatedOn
	*/
	public function _setUpdatedOn($updatedOn) {
		$this->_updatedOn = $updatedOn;
	}
	/**
	* sets the value of $_updatedOn
	*
	* @param updatedOn
	* @return object ( this class)
	*/
	public function setUpdatedOn($updatedOn) {
		$this->_setUpdatedOn($updatedOn);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of sample_id 
     * based on the value of $shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on passed to the function
     *
     * @param $shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on
     * @return object (sample_id)| null
     */
	public function getSampleId($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on) {
		$columns = array ('shipment_map_id','sample_id','eia_1','lot_no_1','exp_date_1','od_1','cutoff_1','eia_2','lot_no_2','exp_date_2','od_2','cutoff_2','eia_3','lot_no_3','exp_date_3','od_3','cutoff_3','wb','wb_lot','wb_exp_date','wb_160','wb_120','wb_66','wb_55','wb_51','wb_41','wb_31','wb_24','wb_17','reported_result','calculated_score','created_by','created_on','updated_by','updated_on');
		$records = array ($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on);
		$sample_id_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($sample_id_)>0 ? $sample_id_ [0] ['sample_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_map_id 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (shipment_map_id)| null
     */
	public function getShipmentMapId($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$shipment_map_id_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($shipment_map_id_)>0 ? $shipment_map_id_ [0] ['shipment_map_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of eia_1 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (eia_1)| null
     */
	public function getEia1($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$eia_1_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($eia_1_)>0 ? $eia_1_ [0] ['eia_1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lot_no_1 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (lot_no_1)| null
     */
	public function getLotNo1($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$lot_no_1_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($lot_no_1_)>0 ? $lot_no_1_ [0] ['lot_no_1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of exp_date_1 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (exp_date_1)| null
     */
	public function getExpDate1($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$exp_date_1_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($exp_date_1_)>0 ? $exp_date_1_ [0] ['exp_date_1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of od_1 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (od_1)| null
     */
	public function getOd1($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$od_1_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($od_1_)>0 ? $od_1_ [0] ['od_1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of cutoff_1 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (cutoff_1)| null
     */
	public function getCutoff1($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$cutoff_1_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($cutoff_1_)>0 ? $cutoff_1_ [0] ['cutoff_1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of eia_2 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (eia_2)| null
     */
	public function getEia2($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$eia_2_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($eia_2_)>0 ? $eia_2_ [0] ['eia_2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lot_no_2 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (lot_no_2)| null
     */
	public function getLotNo2($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$lot_no_2_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($lot_no_2_)>0 ? $lot_no_2_ [0] ['lot_no_2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of exp_date_2 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (exp_date_2)| null
     */
	public function getExpDate2($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$exp_date_2_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($exp_date_2_)>0 ? $exp_date_2_ [0] ['exp_date_2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of od_2 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (od_2)| null
     */
	public function getOd2($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$od_2_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($od_2_)>0 ? $od_2_ [0] ['od_2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of cutoff_2 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (cutoff_2)| null
     */
	public function getCutoff2($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$cutoff_2_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($cutoff_2_)>0 ? $cutoff_2_ [0] ['cutoff_2'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of eia_3 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (eia_3)| null
     */
	public function getEia3($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$eia_3_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($eia_3_)>0 ? $eia_3_ [0] ['eia_3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of lot_no_3 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (lot_no_3)| null
     */
	public function getLotNo3($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$lot_no_3_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($lot_no_3_)>0 ? $lot_no_3_ [0] ['lot_no_3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of exp_date_3 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (exp_date_3)| null
     */
	public function getExpDate3($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$exp_date_3_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($exp_date_3_)>0 ? $exp_date_3_ [0] ['exp_date_3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of od_3 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (od_3)| null
     */
	public function getOd3($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$od_3_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($od_3_)>0 ? $od_3_ [0] ['od_3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of cutoff_3 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (cutoff_3)| null
     */
	public function getCutoff3($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$cutoff_3_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($cutoff_3_)>0 ? $cutoff_3_ [0] ['cutoff_3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb)| null
     */
	public function getWb($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_)>0 ? $wb_ [0] ['wb'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_lot 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_lot)| null
     */
	public function getWbLot($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_lot_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_lot_)>0 ? $wb_lot_ [0] ['wb_lot'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_exp_date 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_exp_date)| null
     */
	public function getWbExpDate($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_exp_date_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_exp_date_)>0 ? $wb_exp_date_ [0] ['wb_exp_date'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_160 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_160)| null
     */
	public function getWb160($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_160_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_160_)>0 ? $wb_160_ [0] ['wb_160'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_120 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_120)| null
     */
	public function getWb120($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_120_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_120_)>0 ? $wb_120_ [0] ['wb_120'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_66 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_66)| null
     */
	public function getWb66($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_66_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_66_)>0 ? $wb_66_ [0] ['wb_66'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_55 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_55)| null
     */
	public function getWb55($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_55_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_55_)>0 ? $wb_55_ [0] ['wb_55'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_51 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_51)| null
     */
	public function getWb51($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_51_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_51_)>0 ? $wb_51_ [0] ['wb_51'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_41 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_41)| null
     */
	public function getWb41($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_41_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_41_)>0 ? $wb_41_ [0] ['wb_41'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_31 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_31)| null
     */
	public function getWb31($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_31_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_31_)>0 ? $wb_31_ [0] ['wb_31'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_24 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_24)| null
     */
	public function getWb24($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_24_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_24_)>0 ? $wb_24_ [0] ['wb_24'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of wb_17 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (wb_17)| null
     */
	public function getWb17($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$wb_17_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($wb_17_)>0 ? $wb_17_ [0] ['wb_17'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of reported_result 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (reported_result)| null
     */
	public function getReportedResult($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$reported_result_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($reported_result_)>0 ? $reported_result_ [0] ['reported_result'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of calculated_score 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (calculated_score)| null
     */
	public function getCalculatedScore($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$calculated_score_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($calculated_score_)>0 ? $calculated_score_ [0] ['calculated_score'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_by 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (created_by)| null
     */
	public function getCreatedBy($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$created_by_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($created_by_)>0 ? $created_by_ [0] ['created_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of created_on 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (created_on)| null
     */
	public function getCreatedOn($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$created_on_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($created_on_)>0 ? $created_on_ [0] ['created_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (updated_by)| null
     */
	public function getUpdatedBy($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$updated_by_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($updated_by_)>0 ? $updated_by_ [0] ['updated_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on 
     * based on the value of $sample_id passed to the function
     *
     * @param $sample_id
     * @return object (updated_on)| null
     */
	public function getUpdatedOn($sample_id) {
		$columns = array ('sample_id');
		$records = array ($sample_id);
		$updated_on_ = $this->query_from_response_result_dbs ( $columns, $records );
		return sizeof($updated_on_)>0 ? $updated_on_ [0] ['updated_on'] : null;
	}
	

	
	   /**
	* Inserts data into the table[response_result_dbs] in the order below
	* array ('shipment_map_id','sample_id','eia_1','lot_no_1','exp_date_1','od_1','cutoff_1','eia_2','lot_no_2','exp_date_2','od_2','cutoff_2','eia_3','lot_no_3','exp_date_3','od_3','cutoff_3','wb','wb_lot','wb_exp_date','wb_160','wb_120','wb_66','wb_55','wb_51','wb_41','wb_31','wb_24','wb_17','reported_result','calculated_score','created_by','created_on','updated_by','updated_on')
	* is mapped into
	* array ($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on,$redundancy_check= false, $printSQL = false) {
		$columns = array('shipment_map_id','sample_id','eia_1','lot_no_1','exp_date_1','od_1','cutoff_1','eia_2','lot_no_2','exp_date_2','od_2','cutoff_2','eia_3','lot_no_3','exp_date_3','od_3','cutoff_3','wb','wb_lot','wb_exp_date','wb_160','wb_120','wb_66','wb_55','wb_51','wb_41','wb_31','wb_24','wb_17','reported_result','calculated_score','created_by','created_on','updated_by','updated_on');
		$records = array($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on);
		return $this->insert_records_to_response_result_dbs ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[response_result_dbs] in the order below
    * array ('shipment_map_id','sample_id','eia_1','lot_no_1','exp_date_1','od_1','cutoff_1','eia_2','lot_no_2','exp_date_2','od_2','cutoff_2','eia_3','lot_no_3','exp_date_3','od_3','cutoff_3','wb','wb_lot','wb_exp_date','wb_160','wb_120','wb_66','wb_55','wb_51','wb_41','wb_31','wb_24','wb_17','reported_result','calculated_score','created_by','created_on','updated_by','updated_on')
    * is mapped into
    * array ($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on, $printSQL = false) {
    	$columns = array('shipment_map_id','sample_id','eia_1','lot_no_1','exp_date_1','od_1','cutoff_1','eia_2','lot_no_2','exp_date_2','od_2','cutoff_2','eia_3','lot_no_3','exp_date_3','od_3','cutoff_3','wb','wb_lot','wb_exp_date','wb_160','wb_120','wb_66','wb_55','wb_51','wb_41','wb_31','wb_24','wb_17','reported_result','calculated_score','created_by','created_on','updated_by','updated_on');
    	$records = array($shipment_map_id,$sample_id,$eia_1,$lot_no_1,$exp_date_1,$od_1,$cutoff_1,$eia_2,$lot_no_2,$exp_date_2,$od_2,$cutoff_2,$eia_3,$lot_no_3,$exp_date_3,$od_3,$cutoff_3,$wb,$wb_lot,$wb_exp_date,$wb_160,$wb_120,$wb_66,$wb_55,$wb_51,$wb_41,$wb_31,$wb_24,$wb_17,$reported_result,$calculated_score,$created_by,$created_on,$updated_by,$updated_on);
    	return $this->delete_record_from_response_result_dbs( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'response_result_dbs' 
	*/
	public static function get_table() {
		return 'response_result_dbs';
	}
	
	/**
	* This action represents the intended database transaction
	*
	* @return string the set action.
	*/
	private function get_action() {
		return $this->action;
	}
	
	/**
	* Returns the client doing transactions
	*
	* @return string the client
	*/
	private function get_client() {
		return $this->client;
	}
	
	/**
     * Used  to calculate the number of times a record exists in the table response_result_dbs
     * It returns the number of times a record exists exists in the table response_result_dbs
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table response_result_dbs
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_response_result_dbs(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
		return $this->insert_records ( $this->get_table (), $columns, $records,$redundancy_check, $printSQL );
	}
	/**
         * Inserts records in a relation
         * The records are inserted in the relation columns in the order they are arranged in the array
         *
         * @param $records
         * @param bool $printSQL
         * @return bool|mysqli_result
         * @throws NullabilityException
         */
        public function insert_raw($records, $printSQL = false)
        {
            return $this->get_database_utils()->insert_raw_records($this->get_table(), $records, $printSQL);
        }
	/**
	 * Deletes all the records that meets the passed criteria from the table response_result_dbs
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_response_result_dbs(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table response_result_dbs
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_response_result_dbs(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'response_result_dbs' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_response_result_dbs($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table response_result_dbs that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_response_result_dbs(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table response_result_dbs that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_response_result_dbs(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table response_result_dbs that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_response_result_dbs(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
		return $this->search ( $this->get_table (), $columns, $records,$extraSQL, $printSQL );
	}
	
	/**
	* Get Database Utils
	*  
	* @return DatabaseUtils $this->databaseUtils
	*/
	public function get_database_utils() {
		return $this->databaseUtils;
	}
	
	
	/**
	 * Deletes all the records that meets the passed criteria from the table [response_result_dbs]
	 *
	 * @param $table
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return bool|int|\mysqli_result number of deleted rows
	* @throws InvalidColumnValueMatchException
    * @throws NullabilityException
	 */
	private function delete_record($table, Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->delete_record ( $table, $columns, $records, $printSQL );
	}
	
	
	/**
     * Inserts data into the table response_result_dbs
     *
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     * @param $table
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return bool|mixed|\mysqli_result the number of times the record exists
   * @throws NullabilityException
     */
	private function insert_records($table, Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
		if($redundancy_check){
			if($this->is_exists($columns, $records) == 0){
				return $this->get_database_utils ()->insert_records ( $table, $columns, $records, $printSQL );
			} else return $this->is_exists($columns, $records);
		}else{
			return $this->get_database_utils ()->insert_records ( $table, $columns, $records, $printSQL );
		}
		
	}
	
	/**
     * Updates all the records that meets the passed criteria from the table response_result_dbs
     * @param $table
     * @param array $columns
     * @param array $records
     * @param array $where_columns
     * @param array $where_records
     * @param bool $printSQL
     * @return bool|\mysqli_result number of updated rows
   * @throws NullabilityException
     */
	private function update_record($table, Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->get_database_utils ()->update_record ( $table, $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
     * Gets an Associative array of the records in the table response_result_dbs that meets the passed criteria
     * associative array of the records that are found after performing the query
     * @param $distinct
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array|null
    * @throws InvalidColumnValueMatchException
   * @throws NullabilityException
     */
	private function fetch_assoc($distinct, $table, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->get_database_utils ()->fetch_assoc ( $distinct, $table, $columns, $records,$extraSQL, $printSQL );
	}
	
	 /**
     * Gets an Associative array of the records in the table response_result_dbs  that meets the passed criteria
     *
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array
     */
	private function query($table, Array $columns, Array $records,$extraSQL="",$printSQL = false) {
		return $this->get_database_utils ()->query ( $table, $columns, $records,$extraSQL, $printSQL );
	}
	/**
     * Gets an Associative array of the records in the table response_result_dbs that meets the distinct passed criteria
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array
     */
	private function query_distinct($table, Array $columns, Array $records,$extraSQL="",$printSQL = false) {
		return $this->get_database_utils ()->query_distinct ( $table, $columns, $records,$extraSQL, $printSQL );
	}
	
	 /**
     * Performs a search and returns an associative array of the records in the table response_result_dbs  that meets the passed criteria
     * 
     * @param $table
     * @param array $columns
     * @param array $records
     * @param string $extraSQL
     * @param bool $printSQL
     * @return array|null
    * @throws InvalidColumnValueMatchException
   * @throws NullabilityException
     */
	private function search($table, Array $columns, Array $records,$extraSQL="", $printSQL = false) {
		return $this->get_database_utils ()->search ( $table, $columns, $records, $extraSQL, $printSQL );
	}
}
?>
