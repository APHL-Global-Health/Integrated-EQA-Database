<?php

	namespace database\crud;
 
	use database\core\mysql\DatabaseUtils;
    use database\core\mysql\InvalidColumnValueMatchException;
    use database\core\mysql\NullabilityException;

	/**
	* THIS SOURCE CODE WAS AUTOMATICALLY GENERATED ON Fri 03:16:45  09/12/2016
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
* ReferenceVlCalculation
*  
* Low level class for manipulating the data in the table reference_vl_calculation
*
* This source code is auto-generated
*
* @author Victor Mwenda
* Email : vmwenda.vm@gmail.com
* Phone : +254(0)718034449
*/
class ReferenceVlCalculation {

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
	* private class variable $_shipmentId
	*/
	private $_shipmentId;
	
	/**
	* returns the value of $shipmentId
	*
	* @return object(int|string) shipmentId
	*/
	public function _getShipmentId() {
		return $this->_shipmentId;
	}
	
	/**
	* sets the value of $_shipmentId
	*
	* @param shipmentId
	*/
	public function _setShipmentId($shipmentId) {
		$this->_shipmentId = $shipmentId;
	}
	/**
	* sets the value of $_shipmentId
	*
	* @param shipmentId
	* @return object ( this class)
	*/
	public function setShipmentId($shipmentId) {
		$this->_setShipmentId($shipmentId);
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
	* private class variable $_vlAssay
	*/
	private $_vlAssay;
	
	/**
	* returns the value of $vlAssay
	*
	* @return object(int|string) vlAssay
	*/
	public function _getVlAssay() {
		return $this->_vlAssay;
	}
	
	/**
	* sets the value of $_vlAssay
	*
	* @param vlAssay
	*/
	public function _setVlAssay($vlAssay) {
		$this->_vlAssay = $vlAssay;
	}
	/**
	* sets the value of $_vlAssay
	*
	* @param vlAssay
	* @return object ( this class)
	*/
	public function setVlAssay($vlAssay) {
		$this->_setVlAssay($vlAssay);
		return $this;
	}
	
	
	/**
	* private class variable $_q1
	*/
	private $_q1;
	
	/**
	* returns the value of $q1
	*
	* @return object(int|string) q1
	*/
	public function _getQ1() {
		return $this->_q1;
	}
	
	/**
	* sets the value of $_q1
	*
	* @param q1
	*/
	public function _setQ1($q1) {
		$this->_q1 = $q1;
	}
	/**
	* sets the value of $_q1
	*
	* @param q1
	* @return object ( this class)
	*/
	public function setQ1($q1) {
		$this->_setQ1($q1);
		return $this;
	}
	
	
	/**
	* private class variable $_q3
	*/
	private $_q3;
	
	/**
	* returns the value of $q3
	*
	* @return object(int|string) q3
	*/
	public function _getQ3() {
		return $this->_q3;
	}
	
	/**
	* sets the value of $_q3
	*
	* @param q3
	*/
	public function _setQ3($q3) {
		$this->_q3 = $q3;
	}
	/**
	* sets the value of $_q3
	*
	* @param q3
	* @return object ( this class)
	*/
	public function setQ3($q3) {
		$this->_setQ3($q3);
		return $this;
	}
	
	
	/**
	* private class variable $_iqr
	*/
	private $_iqr;
	
	/**
	* returns the value of $iqr
	*
	* @return object(int|string) iqr
	*/
	public function _getIqr() {
		return $this->_iqr;
	}
	
	/**
	* sets the value of $_iqr
	*
	* @param iqr
	*/
	public function _setIqr($iqr) {
		$this->_iqr = $iqr;
	}
	/**
	* sets the value of $_iqr
	*
	* @param iqr
	* @return object ( this class)
	*/
	public function setIqr($iqr) {
		$this->_setIqr($iqr);
		return $this;
	}
	
	
	/**
	* private class variable $_quartileLow
	*/
	private $_quartileLow;
	
	/**
	* returns the value of $quartileLow
	*
	* @return object(int|string) quartileLow
	*/
	public function _getQuartileLow() {
		return $this->_quartileLow;
	}
	
	/**
	* sets the value of $_quartileLow
	*
	* @param quartileLow
	*/
	public function _setQuartileLow($quartileLow) {
		$this->_quartileLow = $quartileLow;
	}
	/**
	* sets the value of $_quartileLow
	*
	* @param quartileLow
	* @return object ( this class)
	*/
	public function setQuartileLow($quartileLow) {
		$this->_setQuartileLow($quartileLow);
		return $this;
	}
	
	
	/**
	* private class variable $_quartileHigh
	*/
	private $_quartileHigh;
	
	/**
	* returns the value of $quartileHigh
	*
	* @return object(int|string) quartileHigh
	*/
	public function _getQuartileHigh() {
		return $this->_quartileHigh;
	}
	
	/**
	* sets the value of $_quartileHigh
	*
	* @param quartileHigh
	*/
	public function _setQuartileHigh($quartileHigh) {
		$this->_quartileHigh = $quartileHigh;
	}
	/**
	* sets the value of $_quartileHigh
	*
	* @param quartileHigh
	* @return object ( this class)
	*/
	public function setQuartileHigh($quartileHigh) {
		$this->_setQuartileHigh($quartileHigh);
		return $this;
	}
	
	
	/**
	* private class variable $_mean
	*/
	private $_mean;
	
	/**
	* returns the value of $mean
	*
	* @return object(int|string) mean
	*/
	public function _getMean() {
		return $this->_mean;
	}
	
	/**
	* sets the value of $_mean
	*
	* @param mean
	*/
	public function _setMean($mean) {
		$this->_mean = $mean;
	}
	/**
	* sets the value of $_mean
	*
	* @param mean
	* @return object ( this class)
	*/
	public function setMean($mean) {
		$this->_setMean($mean);
		return $this;
	}
	
	
	/**
	* private class variable $_sd
	*/
	private $_sd;
	
	/**
	* returns the value of $sd
	*
	* @return object(int|string) sd
	*/
	public function _getSd() {
		return $this->_sd;
	}
	
	/**
	* sets the value of $_sd
	*
	* @param sd
	*/
	public function _setSd($sd) {
		$this->_sd = $sd;
	}
	/**
	* sets the value of $_sd
	*
	* @param sd
	* @return object ( this class)
	*/
	public function setSd($sd) {
		$this->_setSd($sd);
		return $this;
	}
	
	
	/**
	* private class variable $_cv
	*/
	private $_cv;
	
	/**
	* returns the value of $cv
	*
	* @return object(int|string) cv
	*/
	public function _getCv() {
		return $this->_cv;
	}
	
	/**
	* sets the value of $_cv
	*
	* @param cv
	*/
	public function _setCv($cv) {
		$this->_cv = $cv;
	}
	/**
	* sets the value of $_cv
	*
	* @param cv
	* @return object ( this class)
	*/
	public function setCv($cv) {
		$this->_setCv($cv);
		return $this;
	}
	
	
	/**
	* private class variable $_lowLimit
	*/
	private $_lowLimit;
	
	/**
	* returns the value of $lowLimit
	*
	* @return object(int|string) lowLimit
	*/
	public function _getLowLimit() {
		return $this->_lowLimit;
	}
	
	/**
	* sets the value of $_lowLimit
	*
	* @param lowLimit
	*/
	public function _setLowLimit($lowLimit) {
		$this->_lowLimit = $lowLimit;
	}
	/**
	* sets the value of $_lowLimit
	*
	* @param lowLimit
	* @return object ( this class)
	*/
	public function setLowLimit($lowLimit) {
		$this->_setLowLimit($lowLimit);
		return $this;
	}
	
	
	/**
	* private class variable $_highLimit
	*/
	private $_highLimit;
	
	/**
	* returns the value of $highLimit
	*
	* @return object(int|string) highLimit
	*/
	public function _getHighLimit() {
		return $this->_highLimit;
	}
	
	/**
	* sets the value of $_highLimit
	*
	* @param highLimit
	*/
	public function _setHighLimit($highLimit) {
		$this->_highLimit = $highLimit;
	}
	/**
	* sets the value of $_highLimit
	*
	* @param highLimit
	* @return object ( this class)
	*/
	public function setHighLimit($highLimit) {
		$this->_setHighLimit($highLimit);
		return $this;
	}
	
	
	/**
	* private class variable $_calculatedOn
	*/
	private $_calculatedOn;
	
	/**
	* returns the value of $calculatedOn
	*
	* @return object(int|string) calculatedOn
	*/
	public function _getCalculatedOn() {
		return $this->_calculatedOn;
	}
	
	/**
	* sets the value of $_calculatedOn
	*
	* @param calculatedOn
	*/
	public function _setCalculatedOn($calculatedOn) {
		$this->_calculatedOn = $calculatedOn;
	}
	/**
	* sets the value of $_calculatedOn
	*
	* @param calculatedOn
	* @return object ( this class)
	*/
	public function setCalculatedOn($calculatedOn) {
		$this->_setCalculatedOn($calculatedOn);
		return $this;
	}
	
	
	/**
	* private class variable $_manualLowLimit
	*/
	private $_manualLowLimit;
	
	/**
	* returns the value of $manualLowLimit
	*
	* @return object(int|string) manualLowLimit
	*/
	public function _getManualLowLimit() {
		return $this->_manualLowLimit;
	}
	
	/**
	* sets the value of $_manualLowLimit
	*
	* @param manualLowLimit
	*/
	public function _setManualLowLimit($manualLowLimit) {
		$this->_manualLowLimit = $manualLowLimit;
	}
	/**
	* sets the value of $_manualLowLimit
	*
	* @param manualLowLimit
	* @return object ( this class)
	*/
	public function setManualLowLimit($manualLowLimit) {
		$this->_setManualLowLimit($manualLowLimit);
		return $this;
	}
	
	
	/**
	* private class variable $_manualHighLimit
	*/
	private $_manualHighLimit;
	
	/**
	* returns the value of $manualHighLimit
	*
	* @return object(int|string) manualHighLimit
	*/
	public function _getManualHighLimit() {
		return $this->_manualHighLimit;
	}
	
	/**
	* sets the value of $_manualHighLimit
	*
	* @param manualHighLimit
	*/
	public function _setManualHighLimit($manualHighLimit) {
		$this->_manualHighLimit = $manualHighLimit;
	}
	/**
	* sets the value of $_manualHighLimit
	*
	* @param manualHighLimit
	* @return object ( this class)
	*/
	public function setManualHighLimit($manualHighLimit) {
		$this->_setManualHighLimit($manualHighLimit);
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
	* private class variable $_useRange
	*/
	private $_useRange;
	
	/**
	* returns the value of $useRange
	*
	* @return object(int|string) useRange
	*/
	public function _getUseRange() {
		return $this->_useRange;
	}
	
	/**
	* sets the value of $_useRange
	*
	* @param useRange
	*/
	public function _setUseRange($useRange) {
		$this->_useRange = $useRange;
	}
	/**
	* sets the value of $_useRange
	*
	* @param useRange
	* @return object ( this class)
	*/
	public function setUseRange($useRange) {
		$this->_setUseRange($useRange);
		return $this;
	}
	

		
		
	/**
     * Performs a database query and returns the value of vl_assay 
     * based on the value of $shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range passed to the function
     *
     * @param $shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range
     * @return object (vl_assay)| null
     */
	public function getVlAssay($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range) {
		$columns = array ('shipment_id','sample_id','vl_assay','q1','q3','iqr','quartile_low','quartile_high','mean','sd','cv','low_limit','high_limit','calculated_on','manual_low_limit','manual_high_limit','updated_on','updated_by','use_range');
		$records = array ($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range);
		$vl_assay_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($vl_assay_)>0 ? $vl_assay_ [0] ['vl_assay'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of shipment_id 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (shipment_id)| null
     */
	public function getShipmentId($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$shipment_id_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($shipment_id_)>0 ? $shipment_id_ [0] ['shipment_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of sample_id 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (sample_id)| null
     */
	public function getSampleId($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$sample_id_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($sample_id_)>0 ? $sample_id_ [0] ['sample_id'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of q1 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (q1)| null
     */
	public function getQ1($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$q1_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($q1_)>0 ? $q1_ [0] ['q1'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of q3 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (q3)| null
     */
	public function getQ3($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$q3_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($q3_)>0 ? $q3_ [0] ['q3'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of iqr 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (iqr)| null
     */
	public function getIqr($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$iqr_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($iqr_)>0 ? $iqr_ [0] ['iqr'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of quartile_low 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (quartile_low)| null
     */
	public function getQuartileLow($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$quartile_low_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($quartile_low_)>0 ? $quartile_low_ [0] ['quartile_low'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of quartile_high 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (quartile_high)| null
     */
	public function getQuartileHigh($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$quartile_high_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($quartile_high_)>0 ? $quartile_high_ [0] ['quartile_high'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of mean 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (mean)| null
     */
	public function getMean($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$mean_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($mean_)>0 ? $mean_ [0] ['mean'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of sd 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (sd)| null
     */
	public function getSd($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$sd_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($sd_)>0 ? $sd_ [0] ['sd'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of cv 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (cv)| null
     */
	public function getCv($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$cv_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($cv_)>0 ? $cv_ [0] ['cv'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of low_limit 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (low_limit)| null
     */
	public function getLowLimit($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$low_limit_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($low_limit_)>0 ? $low_limit_ [0] ['low_limit'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of high_limit 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (high_limit)| null
     */
	public function getHighLimit($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$high_limit_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($high_limit_)>0 ? $high_limit_ [0] ['high_limit'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of calculated_on 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (calculated_on)| null
     */
	public function getCalculatedOn($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$calculated_on_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($calculated_on_)>0 ? $calculated_on_ [0] ['calculated_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of manual_low_limit 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (manual_low_limit)| null
     */
	public function getManualLowLimit($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$manual_low_limit_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($manual_low_limit_)>0 ? $manual_low_limit_ [0] ['manual_low_limit'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of manual_high_limit 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (manual_high_limit)| null
     */
	public function getManualHighLimit($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$manual_high_limit_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($manual_high_limit_)>0 ? $manual_high_limit_ [0] ['manual_high_limit'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_on 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (updated_on)| null
     */
	public function getUpdatedOn($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$updated_on_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($updated_on_)>0 ? $updated_on_ [0] ['updated_on'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of updated_by 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (updated_by)| null
     */
	public function getUpdatedBy($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$updated_by_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($updated_by_)>0 ? $updated_by_ [0] ['updated_by'] : null;
	}
	
	
	/**
     * Performs a database query and returns the value of use_range 
     * based on the value of $vl_assay passed to the function
     *
     * @param $vl_assay
     * @return object (use_range)| null
     */
	public function getUseRange($vl_assay) {
		$columns = array ('vl_assay');
		$records = array ($vl_assay);
		$use_range_ = $this->query_from_reference_vl_calculation ( $columns, $records );
		return sizeof($use_range_)>0 ? $use_range_ [0] ['use_range'] : null;
	}
	

	
	   /**
	* Inserts data into the table[reference_vl_calculation] in the order below
	* array ('shipment_id','sample_id','vl_assay','q1','q3','iqr','quartile_low','quartile_high','mean','sd','cv','low_limit','high_limit','calculated_on','manual_low_limit','manual_high_limit','updated_on','updated_by','use_range')
	* is mapped into
	* array ($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range)
	* @return int 1 if data was inserted,0 otherwise
	* if redundancy check is true, it inserts if the record if it never existed else.
	* if the record exists, it returns the number of times the record exists on the relation
	*/
	public function insert_prepared_records($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range,$redundancy_check= false, $printSQL = false) {
		$columns = array('shipment_id','sample_id','vl_assay','q1','q3','iqr','quartile_low','quartile_high','mean','sd','cv','low_limit','high_limit','calculated_on','manual_low_limit','manual_high_limit','updated_on','updated_by','use_range');
		$records = array($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range);
		return $this->insert_records_to_reference_vl_calculation ( $columns, $records,$redundancy_check, $printSQL );
	}

	/**
    * Delete data from the table[reference_vl_calculation] in the order below
    * array ('shipment_id','sample_id','vl_assay','q1','q3','iqr','quartile_low','quartile_high','mean','sd','cv','low_limit','high_limit','calculated_on','manual_low_limit','manual_high_limit','updated_on','updated_by','use_range')
    * is mapped into
    * array ($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range)
    * @return int number of deleted rows
    */
    public function delete_prepared_records($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range, $printSQL = false) {
    	$columns = array('shipment_id','sample_id','vl_assay','q1','q3','iqr','quartile_low','quartile_high','mean','sd','cv','low_limit','high_limit','calculated_on','manual_low_limit','manual_high_limit','updated_on','updated_by','use_range');
    	$records = array($shipment_id,$sample_id,$vl_assay,$q1,$q3,$iqr,$quartile_low,$quartile_high,$mean,$sd,$cv,$low_limit,$high_limit,$calculated_on,$manual_low_limit,$manual_high_limit,$updated_on,$updated_by,$use_range);
    	return $this->delete_record_from_reference_vl_calculation( $columns, $records, $printSQL );
    }

	
	/**
	* Returns the table name. This is the owner of these crud functions.
	* The various crud functions directly affect this table
	* @return string table name -> 'reference_vl_calculation' 
	*/
	public static function get_table() {
		return 'reference_vl_calculation';
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
     * Used  to calculate the number of times a record exists in the table reference_vl_calculation
     * It returns the number of times a record exists exists in the table reference_vl_calculation
     * @param array $columns
     * @param array $records
     * @param bool $printSQL
     * @return mixed
     */
	public function is_exists(Array $columns, Array $records, $printSQL = false) {
		return $this->get_database_utils ()->is_exists ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
     * Inserts data into the table reference_vl_calculation
     * if redundancy check is true, it inserts if the record if it never existed else.
     * if the record exists, it returns the number of times the record exists on the relation
     *
     * @param array $columns
     * @param array $records
     * @param bool $redundancy_check
     * @param bool $printSQL
     * @return mixed
     */
	public function insert_records_to_reference_vl_calculation(Array $columns, Array $records,$redundancy_check = false, $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table reference_vl_calculation
	 * @param array $columns
	 * @param array $records
	 * @param bool $printSQL
	 * @return number of deleted rows
	 */
	public function delete_record_from_reference_vl_calculation(Array $columns, Array $records, $printSQL = false) {
		return $this->delete_record ( $this->get_table (), $columns, $records, $printSQL );
	}
	
	/**
	 * Updates all the records that meets the passed criteria from the table reference_vl_calculation
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param array $where_columns
	 * @param array $where_records
	 * @param bool $printSQL
	 * @return number of updated rows
	 */
	public function update_record_in_reference_vl_calculation(Array $columns, Array $records, Array $where_columns, Array $where_records, $printSQL = false) {
		return $this->update_record ( $this->get_table (), $columns, $records, $where_columns, $where_records, $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table 'reference_vl_calculation' that meets the passed criteria
	 *
	 * @param $distinct
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function fetch_assoc_in_reference_vl_calculation($distinct, Array $columns, Array $records, $extraSQL="", $printSQL = false) {
		return $this->fetch_assoc ( $distinct, $this->get_table (),$columns, $records, $extraSQL , $printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_vl_calculation that meets the passed criteria
	 *
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_from_reference_vl_calculation(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Gets an Associative array of the records in the table reference_vl_calculation that meets the passed distinct criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function query_distinct_from_reference_vl_calculation(Array $columns, Array $records,$extraSQL="",  $printSQL = false) {
		return $this->query_distinct ( $this->get_table (), $columns, $records,$extraSQL,$printSQL );
	}
	
	/**
	 * Performs a search in the table reference_vl_calculation that meets the passed criteria
	 * 
	 * @param array $columns
	 * @param array $records
	 * @param string $extraSQL
	 * @param bool $printSQL
	 * @return array|mixed associative
	 */
	public function search_in_reference_vl_calculation(Array $columns, Array $records,$extraSQL="", $printSQL = false) {
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
	 * Deletes all the records that meets the passed criteria from the table [reference_vl_calculation]
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
     * Inserts data into the table reference_vl_calculation
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
     * Updates all the records that meets the passed criteria from the table reference_vl_calculation
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
     * Gets an Associative array of the records in the table reference_vl_calculation that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_vl_calculation  that meets the passed criteria
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
     * Gets an Associative array of the records in the table reference_vl_calculation that meets the distinct passed criteria
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
     * Performs a search and returns an associative array of the records in the table reference_vl_calculation  that meets the passed criteria
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
