<?php

class Application_Model_DbTable_Participants extends Zend_Db_Table_Abstract {

    protected $_name = 'participant';
    protected $_primary = 'participant_id';

    protected $_dependentTables = array('Application_Model_DbTable_ReadinessChecklistParticipant');

    public function getParticipantsByUserSystemId($userSystemId) {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        if ($authNameSpace->IsTester == '1') {
            return $this->getAdapter()->fetchAll($this->getAdapter()->select()->from(array('p' => $this->_name))
                                    ->joinLeft(array('pmm' => 'participant_manager_map'), 'pmm.participant_id=p.participant_id', array('data_manager' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT pmm.dm_id SEPARATOR ', ')")))
                                    ->where("pmm.dm_id = ?", $userSystemId)
                                    //->where("p.status = 'active'")
                                    ->group('p.participant_id'));
        } else {
            return $this->getAdapter()->fetchAll($this->getAdapter()->select()->from(array('p' => $this->_name))
                                    ->joinLeft(array('pmm' => 'participant_manager_map'), 'pmm.participant_id=p.participant_id', array('data_manager' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT pmm.dm_id SEPARATOR ', ')")))
                                    ->where("pmm.parent_id = ?", $userSystemId)
                                    //->where("p.status = 'active'")
                                    ->group('p.participant_id'));
        }
    }

    public function getParticipantsByUserm($userSystemId) {
        return $this->getAdapter()->fetchAll($this->getAdapter()->select()->from(array('p' => $this->_name))
                                ->where("p.email = ?", $userSystemId));
    }

    public function getParticipantsByUserEmail($userSystemId) {

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('p' => 'data_manager'))
            ->join(array('sp' => 'participant_manager_map'), 'p.dm_id=sp.dm_id')
            ->join(array('s' => 'participant'), 's.participant_id=sp.participant_id')
            ->where("p.primary_email= ?" , $userSystemId);
        return $db->fetchAll($sql);
    }

    public function getAffiliateList() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll($db->select()->from('r_participant_affiliates')->order('affiliate ASC'));
    }

    public function getSiteTypeList() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll($db->select()->from('r_site_type')->order('site_type ASC'));
    }

    public function getPartnerList() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll($db->select()->from('partners')->order('partner_id ASC'));
    }
    public function getCounties() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
       return $db->fetchAll($db->select()->from('rep_counties')->order('CountyID ASC'));
    }
    public function getNetworkTierList() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll($db->select()->from('r_network_tiers')->order('network_name ASC'));
    }

    public function getEnrollmentDetails($pid, $sid) {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $sql = $db->select()->from(array('p' => 'participant'))
                ->joinLeft(array('sp' => 'shipment_participant_map'), 'p.participant_id=sp.participant_id')
                ->joinLeft(array('s' => 'shipment'), 's.shipment_id=sp.shipment_id')
                ->where("p.participant_id=" . $pid);
        return $db->fetchAll($sql);
    }

    public function getEnrolledProgramsList() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        return $db->fetchAll($db->select()->from('r_enrolled_programs')->order('enrolled_programs ASC'));
    }

    public function checkParticipantAccess($participantId) {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $row = $this->getAdapter()->fetchRow($this->getAdapter()->select()
                        ->from(array('pmm' => 'participant_manager_map'))
                        ->where("pmm.participant_id = ?", $participantId)
                        ->where("pmm.dm_id = ?", $authNameSpace->dm_id));

        if ($row == false) {
            return false;
        } else {
            return true;
        }
    }

    public function getParticipant($partSysId) {
        return $this->getAdapter()->fetchRow($this->getAdapter()->select()->from(array('p' => $this->_name))
                                ->joinLeft(array('pmm' => 'participant_manager_map'), 'pmm.participant_id=p.participant_id',
                                        array('data_manager' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT pmm.dm_id SEPARATOR ', ')")))
                                 ->joinLeft(array('dm' => 'data_manager'), 'dm.dm_id=dm.dm_id',
                                        array('phone'))
                                ->joinLeft(array('pe' => 'participant_enrolled_programs_map'), 'pe.participant_id=p.participant_id', array('enrolled_prog' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT pe.ep_id SEPARATOR ', ')")))
                                ->where("p.participant_id = ?", $partSysId)
                                ->group('p.participant_id'));
    }

    public function getEnrolledPlatforms($partSysId) {
        return $this->getAdapter()->fetchAll($this->getAdapter()->select()->from(array('p' => 'facilityplatform'))
                                ->joinLeft(array('e' => 'vl_platform'), 'e.ID=p.PlatformID')
                                ->where("p.FacilityID = ?", $partSysId));
    }

    public function getAllParticipants($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('unique_identifier', 'institute_name', 'enrolled_programs', 'status');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "participant_id";
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

        $sQuery = $this->getAdapter()->select()->from(array('p' => $this->_name),
                array('p.participant_id', 'p.unique_identifier', 'p.country', 'p.mobile', 'p.phone',
                    'p.affiliation', 'p.email', 'p.status', 'p.MflCode', 'p.institute_name', 'p.enrolled_programs',
                    'participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT COALESCE(p.first_name,''),\" \",COALESCE(p.last_name,'') ORDER BY p.first_name SEPARATOR ', ')")))
                ->join(array('c' => 'countries'), 'c.id=p.country')
                ->group("p.participant_id");

        if (isset($parameters['withStatus']) && $parameters['withStatus'] != "") {
            $sQuery = $sQuery->where("p.status = ? ", $parameters['withStatus']);
        }
        if (isset($_SESSION['loggedInDetails']["IsVl"])) {
            $sQuery = $sQuery->where("p.IsVl = ? ", $_SESSION['loggedInDetails']["IsVl"]);
        }

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
        $sQuery = $this->getAdapter()->select()->from(array("p" => $this->_name), new Zend_Db_Expr("COUNT('" . $sIndexColumn . "')"));

        if (isset($parameters['withStatus']) && $parameters['withStatus'] != "") {
            $sQuery = $sQuery->where("p.status = ? ", $parameters['withStatus']);
        }
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
            $row[] = $aRow['unique_identifier'];
            $row[] = $aRow['institute_name'];
            $row[] = $aRow['enrolled_programs'];
            $row[] = ucwords($aRow['status']);
            $row[] = ''
                    . '<a href="/admin/participants/edit/id/' . $aRow['participant_id']
                    . '" class="btn btn-warning btn-xs" style="margin-right: 2px;">'
                    . '<i class="icon-pencil"></i> Edit</a>'
                    . '<a href="/admin/participants/view/id/' . $aRow['participant_id']
                    . '" class="btn btn-info btn-xs" style="margin-right: 2px;">'
                    . '<i class="icon-eye"></i> view</a>';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function updateParticipant($params) {
        $authNameSpace = new Zend_Session_Namespace('datamanagers');

        $data = array(
            'unique_identifier' => $params['pid'],
            'MflCode' => $params['MflCode'],
            'institute_name' => $params['instituteName'],
            'lab_name' => $params['lab_name'],
            'department_name' => $params['departmentName'],
            'address' => $params['address'],
            'city' => $params['city'],
            'state' => $params['state'],
            'country' => $params['country'],
            'zip' => $params['zip'],
            'long' => $params['long'],
            'lat' => $params['lat'],
            'shipping_address' => $params['shippingAddress'],
            'first_name' => $params['pfname'],
            'last_name' => $params['plname'],
            'mobile' => $params['pphone2'],
            'phone' => $params['pphone1'],
            'email' => $params['pemail'],
            'contact_name' => $params['contactname'],
            'affiliation' => $params['partAff'],
            'network_tier' => $params['network'],
            'testing_volume' => $params['testingVolume'],
            'funding_source' => $params['fundingSource'],
            'site_type' => $params['siteType'],
            'region' => $params['region'],
            'updated_on' => new Zend_Db_Expr('now()')
        );

        if (isset($params['individualParticipant']) && $params['individualParticipant'] == 'on') {
            $data['individual'] = 'yes';
        } else {
            $data['individual'] = 'no';
        }
        if (isset($params['MflCode'])) {
            $data['MflCode'] = $params['MflCode'];
        }


        if (isset($params['status']) && $params['status'] != "" && $params['status'] != null) {
            $data['status'] = $params['status'];
        }

        if (isset($authNameSpace->dm_id) && $authNameSpace->dm_id != "") {
            $data['updated_by'] = $authNameSpace->dm_id;
        } else {
            $authNameSpace = new Zend_Session_Namespace('administrators');
            if (isset($authNameSpace->primary_email) && $authNameSpace->primary_email != "") {
                $data['updated_by'] = $authNameSpace->primary_email;
            }
        }


        $noOfRows = $this->update($data, "participant_id = " . $params['participantId']);
        $db = Zend_Db_Table_Abstract::getAdapter();

        if (isset($params['enrolledProgram']) && $params['enrolledProgram'] != "") {
            $db->delete('participant_enrolled_programs_map', "participant_id = " . $params['participantId']);
            //var_dump($params['enrolledProgram']);die;
            foreach ($params['enrolledProgram'] as $epId) {
                $db->insert('participant_enrolled_programs_map', array('ep_id' => $epId, 'participant_id' => $params['participantId']));
            }
        }

        if (isset($params['dataManager']) && $params['dataManager'] != "") {
            $db->delete('participant_manager_map', "participant_id = " . $params['participantId']);
            foreach ($params['dataManager'] as $dataManager) {
                $db->insert('participant_manager_map', array('dm_id' => $dataManager, 'participant_id' => $params['participantId']));
            }
        }

        if (isset($params['scheme']) && $params['scheme'] != "") {
            $enrollDb = new Application_Model_DbTable_Enrollments();
            $enrollDb->enrollParticipantToSchemes($params['participantId'], $params['scheme']);
        }

        return $noOfRows;
    }

    public function addParticipants($params) {

        $authNameSpace = new Zend_Session_Namespace('administrators');

        $data = array(
            'MflCode' => $params['MflCode'],
            'institute_name' => $params['instituteName'],
            'department_name' => $params['departmentName'],
            'address' => $params['address'],
            'city' => $params['city'],
            'state' => isset($params['state']) ? $params['state'] : '',
            'country' => 116,
            'zip' => $params['zip'],
            'long' => isset($params['long']) ? $params['long'] : '',
            'lat' => isset($params['lat']) ? $params['lat'] : '',
            'shipping_address' => $params['shippingAddress'],
            'first_name' => $params['pfname'],
            'lab_name' => $params['pfname'],
            'last_name' => $params['plname'],
            'mobile' => isset($params['phone2']) ? $params['phone2'] : '',
            'phone' => isset($params['phone']) ? $params['phone'] : '',
            'email' => $params['pemail'],
            'contact_name' => $params['pfname'] . ' ' . $params['plname'],
            'affiliation' => $params['partAff'],
            'network_tier' => isset($params['network']) ? $params['network'] : '',
            'site_type' => isset($params['siteType']) ? $params['siteType'] : '',
            'region' => $params['region'],
            'created_on' => new Zend_Db_Expr('now()'),
            'created_by' => $authNameSpace->primary_email,
            'ModuleID' => 1,
            'status' => 'active'
        );
        
        if (isset($params['individualParticipant']) && $params['individualParticipant'] == 'on') {
            $data['individual'] = 'yes';
        } else {
            $data['individual'] = 'no';
        }

        $participantName = $params['instituteName'];
        $data['IsVl'] = $_SESSION['loggedInDetails']["IsVl"];

        if (isset($params['MflCode'])) {
            $data['MflCode'] = $params['MflCode'];
        }

        $participantId = $this->insert($data);
        $db = Zend_Db_Table_Abstract::getAdapter();
        $common = new Application_Service_Common();        
        
        if (isset($params['enrolledProgram']) && $params['enrolledProgram'] != "") {
            $db->delete('participant_enrolled_programs_map', "participant_id = " . $participantId);
            //var_dump($params['enrolledProgram']);die;
            foreach ($params['enrolledProgram'] as $epId) {
                $db->insert('participant_enrolled_programs_map', array('ep_id' => $epId, 'participant_id' => $participantId));
            }
        }

        if (isset($params['dataManager']) && $params['dataManager'] != "") {
            $db->delete('participant_manager_map', "participant_id = " . $participantId);
            foreach ($params['dataManager'] as $dataManager) {
                $db->insert('participant_manager_map', array('dm_id' => $dataManager, 'participant_id' => $participantId));
            }
        }

        if (isset($params['scheme']) && $params['scheme'] != "") {
            $enrollDb = new Application_Model_DbTable_Enrollments();
            $enrollDb->enrollParticipantToSchemes($participantId, $params['scheme']);
        }
        
        
        


        ////////insert into data_manager if its selft registraion////////////////////

        $sendTo = $params['pemail'];
        if ($_SESSION['loggedInDetails']["IsVl"] == 3) {
            $common = new Application_Service_Common();
            $message = "Hi,<br/>  A new participant ($participantName) was added. <br/><small>This is a system generated email. Please do not reply.</small>";

            $common->sendGeneralEmail($sendTo, "New Participant Registered <br>  $message", $participantName);
        }

        $updateInfo['unique_identifier'] = $params['MflCode'].'/'.$participantId;
        
      $this->update($updateInfo, "participant_id = " . $participantId);;
        
        
        return $participantId;
    }

    public function selfRegistration($params, $sysAdminEmails = null) {

        $authNameSpace = new Zend_Session_Namespace('administrators');

        $data = array(
            'unique_identifier' => $params['pid'],
            'institute_name' => $params['instituteName'],
            'department_name' => $params['departmentName'],
            'address' => $params['address'],
            'city' => $params['city'],
            'state' => isset($params['state']) ? $params['state'] : '',
            'country' => 116,
            'zip' => $params['zip'],
            'long' => isset($params['long']) ? $params['long'] : '',
            'lat' => isset($params['lat']) ? $params['lat'] : '',
            'shipping_address' => $params['shippingAddress'],
            'first_name' => $params['pfname'],
            'lab_name' => $params['lab_name'],//lab_name
            'last_name' => $params['plname'],
            'mobile' => isset($params['phone2']) ? $params['phone2'] : '',
            'phone' => isset($params['phone1']) ? $params['phone1'] : '',
            'email' => $params['pemail'],
            'contact_name' => $params['pfname'] . ' ' . $params['plname'],
            'network_tier' => isset($params['network']) ? $params['network'] : '',
            'site_type' => isset($params['siteType']) ? $params['siteType'] : '',
            'region' => $params['region'],
            'created_on' => new Zend_Db_Expr('now()'),
            'created_by' => $authNameSpace->primary_email,
            'ModuleID' => 1,
            'IsVl' => '1',
            'IsModule' => '1',
            'status' => 'active'
        );
        if (isset($params['individualParticipant']) && $params['individualParticipant'] == 'on') {
            $data['individual'] = 'yes';
        } else {
            $data['individual'] = 'no';
        }

        $participantName = $params['instituteName'];

        if (isset($params['MflCode'])) {
            $data['MflCode'] = $params['MflCode'];
        }
        $participantId = $this->insert($data);
        
         $updateInfo['unique_identifier'] = $params['MflCode'].'/'.$participantId;
        
      $this->update($updateInfo, "participant_id = " . $participantId);
        ///////end of inserting to participants table

        $db = Zend_Db_Table_Abstract::getAdapter();
        $common = new Application_Service_Common();

        ////////insert into data_manager
        $password = $common->generateRandomPassword(8);
        $datam = array(
            'first_name' => $params['pfname'],
            'last_name' => $params['plname'],
            'institute' => $params['instituteName'],
            'phone' => $params['phone2'],
            'mobile' => $params['phone1'],
            'secondary_email' => $params['pemail'],
            'primary_email' => $params['pemail'],
            'password' => md5($password),
            'force_password_reset' => 1,
            'qc_access' => 'no',
            'enable_adding_test_response_date' => 'no',
            'enable_choosing_mode_of_receipt' => 'no',
            'view_only_access' => 'no',
            'status' => 'active',
            'IsVl' => '1',
            'IsTester' => '0',
            'created_by' => $authNameSpace->admin_id,
            'created_on' => new Zend_Db_Expr('now()')
        );

        $dm_id = $db->insert('data_manager', $datam);
        $lastInsertId = $this->getAdapter()->lastInsertId('data_manager');
        $db->insert('participant_manager_map', array('dm_id' => $lastInsertId, 'participant_id' => $participantId));

        if (isset($params['scheme']) && $params['scheme'] != "") {
            $enrollDb = new Application_Model_DbTable_Enrollments();
            $enrollDb->enrollParticipantToSchemes($participantId, $params['scheme']);
        }
        if (isset($params['platform']) && $params['platform'] != "") {
            $this->savePlatformInfo($params['platform'], $participantId);
        }
        $sendTo = $params['pemail'];



        $common = new Application_Service_Common();

        $pMail = $params['pemail'];
        $message = "Hi,<br/>  A new participant ($participantName) was added. <br/><small>This is a system generated email. Please do not reply.</small>";
        $toMail = Application_Service_Common::getConfig('admin_email');

        $common->sendMail($toMail, null, null, "New Participant Registered  ($participantName)", $message, null, "ePT Admin");

        $common->sendPasswordEmailToUser($pMail, $password, $participantName);

        if (isset($sysAdminEmails)) {

            $common->sendMail($sysAdminEmails, null, null, "New Participant Registered  ($participantName)", $message, null, "ePT Admin");
        }
        return $participantId;
    }

    public function savePlatformInfo($platformArray, $facilityID) {
        $db = Zend_Db_Table_Abstract::getAdapter();
        foreach ($platformArray as $platformId) {
            $db->insert('facilityplatform', array('FacilityID' => $facilityID, 'PlatformID' => $platformId));
        }
    }

    public function addParticipantForDataManager($params) {
        //Zend_Debug::dump($params);die;
        $authNameSpace = new Zend_Session_Namespace('datamanagers');

        $data = array(
            'unique_identifier' => $params['pid'],
            'institute_name' => $params['instituteName'],
            'department_name' => $params['departmentName'],
            'address' => $params['address'],
            'city' => $params['city'],
            'state' => $params['state'],
            'zip' => $params['zip'],
            'country' => 116,
            'long' => $params['long'],
            'lat' => $params['lat'],
            'shipping_address' => $params['shippingAddress'],
            'first_name' => $params['pfname'],
            'last_name' => $params['plname'],
            'mobile' => $params['pphone2'],
            'phone' => $params['pphone1'],
            'contact_name' => $params['contactname'],
            'email' => $params['pemail'],
            'affiliation' => $params['partAff'],
            'network_tier' => $params['network'],
            'status' => 'active',
            'testing_volume' => $params['testingVolume'],
            'funding_source' => $params['fundingSource'],
            'region' => $params['region'],
            'site_type' => $params['siteType'],
            'created_on' => new Zend_Db_Expr('now()'),
            'created_by' => $authNameSpace->UserID,
            'ModuleID' => 1,
        );

        if (isset($params['individualParticipant']) && $params['individualParticipant'] == 'on') {
            $data['individual'] = 'yes';
        } else {
            $data['individual'] = 'yes';
        }


        //Zend_Debug::dump($data);die;
        //Zend_Debug::dump($data);die;
        $participantId =  $this->insert($data);//$this->getParticipantLab();


        if (isset($params['enrolledProgram']) && $params['enrolledProgram'] != "") {
            $db = Zend_Db_Table_Abstract::getAdapter();
            $db->delete('participant_enrolled_programs_map', "participant_id = " . $participantId);
            foreach ($params['enrolledProgram'] as $epId) {
                $db->insert('participant_enrolled_programs_map', array('ep_id' => $epId, 'participant_id' => $participantId));
            }
        }


        if (isset($params['scheme']) && $params['scheme'] != "") {
            $enrollDb = new Application_Model_DbTable_Enrollments();
            $enrollDb->enrollParticipantToSchemes($participantId, $params['scheme']);
        }
        if (isset($params['assay']) && $params['assay'] != "") {
            $assayDb = Zend_Db_Table_Abstract::getAdapter();
            $assayDb->delete('participantassays', "participant=" . $participantId);
            foreach ($params['assay'] as $assay) {
                $data = array('participant' => $participantId, 'AssayID' => $assay);
                $assayDb->insert('participantassays', $data);
            }
        }

        $db = Zend_Db_Table_Abstract::getAdapter();
        $common = new Application_Service_Common();
        $password = $common->generateRandomPassword(8);
        $datam = array(
            'first_name' => $params['pfname'],
            'last_name' => $params['plname'],
            'institute' => $params['instituteName'],
            'phone' => $params['pphone2'],
            'mobile' => $params['pphone1'],
            'secondary_email' => $params['pemail'],
            'primary_email' => $params['pemail'],
            'password' => md5($password),
            'force_password_reset' => 1,
            'qc_access' => 'no',
            'enable_adding_test_response_date' => 'no',
            'enable_choosing_mode_of_receipt' => 'no',
            'view_only_access' => 'no',
            'status' => 'active',
            'IsVl' => '1',
            'IsTester' => '1',
            'created_by' => $authNameSpace->admin_id,
            'created_on' => new Zend_Db_Expr('now()')
        );

        $dmId = $db->insert('data_manager', $datam);
        $lastInsertId = $this->getAdapter()->lastInsertId('data_manager');
        $db->insert('participant_manager_map', array('dm_id' => $lastInsertId,
            'participant_id' => $participantId, 'Parent_id' => $authNameSpace->dm_id));
        $participantName = $params['pfname'] . " " . $params['plname'];
        $dataManager = $authNameSpace->first_name . " " . $authNameSpace->last_name;

        $toMail = $params['pemail'];
        $common->sendPasswordEmailToUser($toMail, $password, $participantName);

        return $participantId;
    }

    public function fetchAllActiveParticipants() {
        if ($_SESSION['loggedInDetails']["IsVl"] == 3) {
            return $this->fetchAll($this->select()->where("status='active'")->where("IsVl='3'")->order("first_name"));
        } else {
            return $this->fetchAll($this->select()->where("status='active'")->order("first_name"));
        }
    }

    public function getParticipantLab() {
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $authNameSpace = new Zend_Session_Namespace('datamanagers');
        $mp = $db->fetchRow($db->select()->from('participant_manager_map')->where("dm_id=$authNameSpace->dm_id"));
        
        if(isset($mp['participant_id'])){
            return $mp['participant_id'];
        }else{
            return false;
        }
    }

    public function getSchemeWiseParticipants($schemeType) {
        if ($schemeType != "all") {
            $result = $this->getAdapter()->fetchAll($this->getAdapter()->select()->from(array('p' => $this->_name), array('p.address', 'p.long', 'p.lat', 'p.first_name', 'p.last_name'))
                            ->join(array('e' => 'enrollments'), 'e.participant_id=p.participant_id')
                            ->where("e.scheme_id = ?", $schemeType)
                            ->where("p.status='active'")
                            ->group('p.participant_id'));
        } else {
            $result = $this->fetchAll($this->select()->where("status='active'"));
        }

        return $result;
    }

    public function getParticipantCycleResponses($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('unique_identifier', 'institute_name', '', 'status');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "participant_id";
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

        $sQuery = $this->getAdapter()->select()
                ->from(array('d' => 'distributions'))
                ->join(array('s' => 'shipment'), 'd.distribution_id=s.distribution_id', 
                    array('s.shipment_code', 's.scheme_type', 's.shipment_date', 'due_date' => 's.lastdate_response', 
                        'shipment_status' => 's.status', 'shipment_id'))
                ->join(array('spm' => 'shipment_participant_map'), 's.shipment_id=spm.shipment_id', 
                    array('response_date' => new Zend_Db_Expr("IFNULL(spm.updated_on_user,'')"), 'participant_id', 
                        'platform_id'))
                ->join(array('p' => 'participant'), 'spm.participant_id=p.participant_id', array('p.institute_name'))
                ->join(array('pf' => 'vl_platform'), 'spm.platform_id=pf.ID', array('platform_name' => 'pf.PlatformName'))
                ->joinLeft(array('dm' => 'data_manager'), 'spm.updated_by_user=dm.dm_id', 
                    array('respondent' => new Zend_Db_Expr("CONCAT(dm.first_name, ' ', dm.last_name)")))
                ->where('d.status != ?', 'pending');

        if (isset($parameters['withStatus']) && $parameters['withStatus'] != "") {
            $sQuery = $sQuery->where("p.status = ? ", $parameters['withStatus']);
        }

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
        $sQuery = $this->getAdapter()->select()->from(array("p" => $this->_name), new Zend_Db_Expr("COUNT('" . $sIndexColumn . "')"));

        if (isset($parameters['withStatus']) && $parameters['withStatus'] != "") {
            $sQuery = $sQuery->where("p.status = ? ", $parameters['withStatus']);
        }
        $aResultTotal = $this->getAdapter()->fetchCol($sQuery);
        $iTotal = $aResultTotal[0];

        /*
         * Output
         */
        $output = array(
            "sEcho" => 1,
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );


        foreach ($rResult as $aRow) {
            $row = array();

            $row['distribution_code'] = $aRow['distribution_code'];
            $row['institute_name'] = $aRow['institute_name'];
            $row['shipment_code'] = $aRow['shipment_code'];
            $row['platform_name'] = $aRow['platform_name'];
            $row['shipment_date'] = $aRow['shipment_date'];
            $row['due_date'] = $aRow['due_date'];
            $row['respondent'] = $aRow['respondent'];
            $row['response_date'] = $aRow['response_date'];
            if(strlen($row['response_date']) > 0){
                $row['action'] = '<a href="/admin/participants/individual-response/sid/' . $aRow['shipment_id'] . '/pid/' . $aRow['participant_id'] . '/eid/19121190/pfid/' . $aRow['platform_id'] . '" class="btn btn-info btn-xs"> View Response</a>';
            }else{
                $row['action'] = '';
            }

            $output['aaData'][] = $row;
        }

        return $output;

    }

    public function getEnrolledByShipmentDetails($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('first_name', 'iso_name', 'mobile', 'email', 'p.status');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "participant_id";

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


        $sQuery = $this->getAdapter()->select()->from(array('p' => 'participant'))
                ->join(array('sp' => 'shipment_participant_map'), 'sp.participant_id=p.participant_id', array('sp.map_id', 'sp.created_on_user', 'sp.attributes', 'sp.final_result', 'sp.shipment_test_date', "RESPONSE" => new Zend_Db_Expr("CASE WHEN (sp.is_excluded ='yes') THEN 'Excluded'  WHEN (sp.shipment_test_date!='' AND sp.shipment_test_date!='0000-00-00' AND sp.shipment_test_date!='NULL') THEN 'Responded' ELSE 'Not Responded' END")))
                ->join(array('s' => 'shipment'), 'sp.shipment_id=s.shipment_id', array('shipmentStatus' => 's.status'))
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country', array('c.iso_name'))
                ->where("p.status='active'");

        if (isset($parameters['shipmentId']) && $parameters['shipmentId'] != "") {
            $sQuery = $sQuery->where("s.shipment_id = ? ", $parameters['shipmentId']);
        }

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

        $sQuery = $this->getAdapter()->select()->from(array("p" => $this->_name), new Zend_Db_Expr("COUNT('" . $sIndexColumn . "')"))
                ->join(array('sp' => 'shipment_participant_map'), 'sp.participant_id=p.participant_id', array('sp.shipment_test_date'))
                ->join(array('s' => 'shipment'), 'sp.shipment_id=s.shipment_id', array())
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country', array('c.iso_name'))
                ->where("p.status='active'");

        if (isset($parameters['shipmentId']) && $parameters['shipmentId'] != "") {
            $sQuery = $sQuery->where("s.shipment_id = ? ", $parameters['shipmentId']);
        }

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
            $row[] = ucwords($aRow['first_name'] . " " . $aRow['last_name']);
            $row[] = ucwords($aRow['iso_name']);
            $row[] = $aRow['mobile'];
            $row[] = $aRow['email'];
            $row[] = ucwords($aRow['RESPONSE']);

            if (trim($aRow['created_on_user']) == "" && trim($aRow['final_result']) == "" && $aRow['shipmentStatus'] != 'finalized') {
                $row[] = '<a href="javascript:void(0);" onclick="removeParticipants(\'' . base64_encode($aRow['map_id']) . '\')" class="btn btn-primary btn-xs"><i class="icon-remove"></i> Delete</a>';
            } else {
                $row[] = '';
            }

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function getUnEnrolledByShipments($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('first_name', 'iso_name', 'mobile', 'email', 'p.status');

        /* Indexed column (used for fast and accurate table cardinality) */
        $sIndexColumn = "participant_id";

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


        $sQuery = $this->getAdapter()->select()->from(array('p' => 'participant'), array('p.participant_id'))
                ->join(array('sp' => 'shipment_participant_map'), 'sp.participant_id=p.participant_id', array())
                ->join(array('s' => 'shipment'), 'sp.shipment_id=s.shipment_id', array())
                ->where("p.status='active'");

        if (isset($parameters['shipmentId']) && $parameters['shipmentId'] != "") {
            $sQuery = $sQuery->where("s.shipment_id = ? ", $parameters['shipmentId']);
        }

        $sQuery = $this->getAdapter()->select()->from(array('p' => 'participant'))->joinLeft(array('c' => 'countries'), 'c.id=p.country', array('c.iso_name'))->where("p.status='active'")->where("p.participant_id NOT IN ?", $sQuery);

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }

        $rResult = $this->getAdapter()->fetchAll($sQuery);

        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $this->getAdapter()->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */


        $sQuery = $this->getAdapter()->select()->from(array("p" => $this->_name), array('p.participant_id'))
                ->join(array('sp' => 'shipment_participant_map'), 'sp.participant_id=p.participant_id', array())
                ->join(array('s' => 'shipment'), 'sp.shipment_id=s.shipment_id', array())
                ->where("p.status='active'");

        if (isset($parameters['shipmentId']) && $parameters['shipmentId'] != "") {
            $sQuery = $sQuery->where("s.shipment_id = ? ", $parameters['shipmentId']);
        }
        $sQuery = $this->getAdapter()->select()->from(array('p' => 'participant'), new Zend_Db_Expr("COUNT('" . $sIndexColumn . "')"))->where("p.status='active'")->where("p.participant_id NOT IN ?", $sQuery);

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
            $row[] = '<input type="checkbox" class="isRequired" name="participants[]" id="' . $aRow['participant_id'] . '" value="' . base64_encode($aRow['participant_id']) . '" onclick="checkParticipantName(' . $aRow['participant_id'] . ',this)" title="Select atleast one participant">';
            $row[] = ucwords($aRow['first_name'] . " " . $aRow['last_name']);
            $row[] = ucwords($aRow['iso_name']);
            $row[] = $aRow['mobile'];
            $row[] = $aRow['email'];
            // $row[] = ucwords($aRow['status']);
            $row[] = 'Unenrolled';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function addParticipantManager($params) {
        $db = Zend_Db_Table_Abstract::getAdapter();
        if (isset($params['datamanagerId']) && $params['datamanagerId'] != "") {
            $db->delete('participant_manager_map', "dm_id = " . $params['datamanagerId']);

            foreach ($params['participants'] as $participants) {
                $db->insert('participant_manager_map', array('participant_id' => $participants, 'dm_id' => $params['datamanagerId']));
            }
        } else if (isset($params['participantId']) && $params['participantId'] != "") {
            $db->delete('participant_manager_map', "participant_id = " . $params['participantId']);

            foreach ($params['datamangers'] as $datamangers) {

                $db->insert('participant_manager_map', array('dm_id' => $datamangers, 'participant_id' => $params['participantId']));
            }
        }
    }

    public function getShipmentRespondedParticipants($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('unique_identifier', 'first_name', 'iso_name', 'mobile', 'phone', 'affiliation', 'email', 'status');

        /* Indexed column (used for fast and accurate table cardinality) */
        //  $sIndexColumn = "participant_id";
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

        $sQuery = $this->getAdapter()->select()->from(array('sp' => 'shipment_participant_map'), array('sp.participant_id', 'sp.shipment_test_date', "RESPONSE" => new Zend_Db_Expr("CASE WHEN (sp.is_excluded ='yes') THEN 'Excluded'  WHEN (sp.shipment_test_date!='' AND sp.shipment_test_date!='0000-00-00' AND sp.shipment_test_date!='NULL') THEN 'Responded' ELSE 'Not Responded' END")))
                ->joinLeft(array('p' => 'participant'), 'p.participant_id=sp.participant_id', array('p.participant_id', 'p.unique_identifier', 'p.country', 'p.mobile', 'p.phone', 'p.affiliation', 'p.email', 'p.status', 'participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT p.first_name,\" \",p.last_name ORDER BY p.first_name SEPARATOR ', ')")))
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country')
                ->where("sp.shipment_test_date <>'0000-00-00'")
                ->where("sp.shipment_test_date IS NOT NULL ")
                ->where("sp.shipment_id = ?", $parameters['shipmentId'])
                ->group("sp.participant_id");
        //  error_log($sQuery);
        if (isset($parameters['withStatus']) && $parameters['withStatus'] != "") {
            $sQuery = $sQuery->where("p.status = ? ", $parameters['withStatus']);
        }
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
        $sQuery = $this->getAdapter()->select()->from(array('sp' => 'shipment_participant_map'), array())
                ->joinLeft(array('p' => 'participant'), 'p.participant_id=sp.participant_id', array())
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country')
                ->where("sp.shipment_test_date <>'0000-00-00'")
                ->where("sp.shipment_test_date IS NOT NULL ")
                ->where("sp.shipment_id = ?", $parameters['shipmentId'])
                ->group("sp.participant_id");

        if (isset($parameters['withStatus']) && $parameters['withStatus'] != "") {
            $sQuery = $sQuery->where("p.status = ? ", $parameters['withStatus']);
        }
        $aResultTotal = $this->getAdapter()->fetchAll($sQuery);
        $iTotal = count($aResultTotal);

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
            $row[] = $aRow['unique_identifier'];
            $row[] = $aRow['participantName'];
            $row[] = $aRow['iso_name'];
            $row[] = $aRow['mobile'];
            $row[] = $aRow['phone'];
            $row[] = $aRow['affiliation'];
            $row[] = $aRow['email'];
            $row[] = ucwords($aRow['RESPONSE']);

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function getShipmentNotRespondedParticipants($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('unique_identifier', 'first_name', 'iso_name', 'mobile', 'phone', 'affiliation', 'email', 'status');

        /* Indexed column (used for fast and accurate table cardinality) */
        //  $sIndexColumn = "participant_id";
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
        $sQuery = $this->getAdapter()->select()->from(array('sp' => 'shipment_participant_map'), array('sp.participant_id', 'sp.map_id', 'sp.shipment_test_date', 'shipment_id', "RESPONSE" => new Zend_Db_Expr("CASE WHEN (sp.is_excluded ='yes') THEN 'Excluded'  WHEN (sp.shipment_test_date!='' AND sp.shipment_test_date!='0000-00-00' AND sp.shipment_test_date!='NULL') THEN 'Responded' ELSE 'Not Responded' END")))
                ->joinLeft(array('p' => 'participant'), 'p.participant_id=sp.participant_id', array('p.participant_id', 'p.unique_identifier', 'p.country', 'p.mobile', 'p.phone', 'p.affiliation', 'p.email', 'p.status', 'participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT p.first_name,\" \",p.last_name ORDER BY p.first_name SEPARATOR ', ')")))
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country')
                ->where("(sp.shipment_test_date = '0000-00-00' OR sp.shipment_test_date IS NULL)")
                ->where("sp.shipment_id = ?", $parameters['shipmentId'])
                ->group("sp.participant_id");

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }


        $rResult = $this->getAdapter()->fetchAll($sQuery);

        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $this->getAdapter()->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */
        $sQuery = $this->getAdapter()->select()->from(array('sp' => 'shipment_participant_map'), array())
                ->joinLeft(array('p' => 'participant'), 'p.participant_id=sp.participant_id', array())
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country')
                ->where("(sp.shipment_test_date = '0000-00-00' OR sp.shipment_test_date IS NULL)")
                ->where("sp.shipment_id = ?", $parameters['shipmentId'])
                ->group("sp.participant_id");

        $aResultTotal = $this->getAdapter()->fetchAll($sQuery);
        $iTotal = count($aResultTotal);

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
            $row[] = $aRow['unique_identifier'];
            $row[] = $aRow['participantName'];
            $row[] = $aRow['iso_name'];
            $row[] = $aRow['mobile'];
            $row[] = $aRow['phone'];
            $row[] = $aRow['affiliation'];
            $row[] = $aRow['email'];
            $row[] = ucwords($aRow['RESPONSE']);
            $row[] = '<a href="javascript:void(0);" onclick="removeParticipants(\'' . base64_encode($aRow['map_id']) . '\')" class="btn btn-primary btn-xs"><i class="icon-remove"></i> Delete</a>';
            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function getShipmentNotEnrolledParticipants($parameters) {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('first_name', 'unique_identifier', 'first_name', 'iso_name', 'mobile', 'phone', 'affiliation', 'email', 'p.status');

        /* Indexed column (used for fast and accurate table cardinality) */
        //  $sIndexColumn = "participant_id";
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
        $subSql = $this->getAdapter()->select()->from(array('sp' => 'shipment_participant_map'), array('sp.participant_id'))
                ->where("sp.shipment_id = ?", $parameters['shipmentId'])
                ->group("sp.participant_id");

        $sQuery = $this->getAdapter()->select()->from(array('e' => 'enrollments'), array('e.participant_id'))
                ->joinLeft(array('p' => 'participant'), 'p.participant_id=e.participant_id', array('p.unique_identifier', 'p.country', 'p.mobile', 'p.phone', 'p.affiliation', 'p.email', 'p.status', 'participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT p.first_name,\" \",p.last_name ORDER BY p.first_name SEPARATOR ', ')")))
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country')
                ->where("e.participant_id NOT IN ?", $subSql)->where("p.status='active'")->order('first_name')
                ->group("e.participant_id");

        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        if (isset($sOrder) && $sOrder != "") {
            $sQuery = $sQuery->order($sOrder);
        }

        if (isset($sLimit) && isset($sOffset)) {
            $sQuery = $sQuery->limit($sLimit, $sOffset);
        }


        $rResult = $this->getAdapter()->fetchAll($sQuery);

        /* Data set length after filtering */
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_COUNT);
        $sQuery = $sQuery->reset(Zend_Db_Select::LIMIT_OFFSET);
        $aResultFilterTotal = $this->getAdapter()->fetchAll($sQuery);
        $iFilteredTotal = count($aResultFilterTotal);

        /* Total data set length */
        $sQuery = $this->getAdapter()->select()->from(array('e' => 'enrollments'), array('e.participant_id'))
                ->joinLeft(array('p' => 'participant'), 'p.participant_id=e.participant_id', array('p.unique_identifier', 'p.country', 'p.mobile', 'p.phone', 'p.affiliation', 'p.email', 'p.status', 'participantName' => new Zend_Db_Expr("GROUP_CONCAT(DISTINCT p.first_name,\" \",p.last_name ORDER BY p.first_name SEPARATOR ', ')")))
                ->joinLeft(array('c' => 'countries'), 'c.id=p.country')
                ->where("e.participant_id NOT IN ?", $subSql)->where("p.status='active'")->order('first_name')
                ->group("e.participant_id");


        $aResultTotal = $this->getAdapter()->fetchAll($sQuery);
        $iTotal = count($aResultTotal);

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

            $row[] = '<input type="checkbox" class="checkParticipants" id="chk' . base64_encode($aRow['participant_id']) . '"  value="' . base64_encode($aRow['participant_id']) . '" onclick="toggleSelect(this);"  />';
            $row[] = $aRow['unique_identifier'];
            $row[] = $aRow['participantName'];
            $row[] = $aRow['iso_name'];
            $row[] = $aRow['mobile'];
            $row[] = $aRow['phone'];
            $row[] = $aRow['affiliation'];
            $row[] = $aRow['email'];
            $row[] = '<a href="javascript:void(0);" onclick="enrollParticipants(\'' . base64_encode($aRow['participant_id']) . '\',\'' . base64_encode($parameters['shipmentId']) . '\')" class="btn btn-primary btn-xs"> Enroll</a>';
            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function CountParticipants() {
        $db = Zend_Db_Table_Abstract::getAdapter();
        $count = $db->fetchOne("SELECT COUNT(*) AS count FROM participant where ModuleID=1 AND status='active'");
        return $count;
    }

    public function AllEnrolledParticipants() {
        $db = Zend_Db_Table_Abstract::getAdapter();
        $count = $db->fetchAll("select DISTINCT p.email from participant p
                                LEFT JOIN enrollments e on p.participant_id=e.participant_id
                                where e.`status`='enrolled' and p.`status`='active' and p.ModuleID=1");
        return $count;
    }

    public function AllVlEIdDataManagers(){
        $db = Zend_Db_Table_Abstract::getAdapter();
        $count = $db->fetchAll("select DISTINCT p.primary_email as email from data_manager p");
        return $count;
    }

}
