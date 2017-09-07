<?php

class Application_Model_DbTable_SystemAdmin extends Zend_Db_Table_Abstract {

    protected $_name = 'system_admin';
    protected $_primary = 'admin_id';

    public function getAllAdmin($parameters) {

        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */

        $aColumns = array('first_name', 'last_name', 'primary_email', 'phone');

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
        if ($_SESSION['loggedInDetails']['IsVl'] != 4) {
            if ($sWhere == "") {
                $sWhere .= "IsVl='" . $_SESSION['loggedInDetails']['IsVl'] . "' ";
            } else {
                $sWhere .= "and (IsVl='" . $_SESSION['loggedInDetails']['IsVl'] . "') ";
            }
        }
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
            $row[] = $aRow['first_name'];
            $row[] = $aRow['last_name'];
            $row[] = $aRow['primary_email'];
            $row[] = $aRow['phone'];
            $row[] = '<a href="/admin/system-admins/edit/id/' . $aRow['admin_id'] . '" class="btn btn-warning btn-xs" style="margin-right: 2px;"><i class="icon-pencil"></i> Edit</a>';

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

    public function getAllSystemAdmins($systemType = null) {

        $sQuery = $this->getAdapter()->select()->from(array('a' => $this->_name));
        $sWhere = '';
        if(isset($systemType)){
            $sWhere .= " IsVl = $systemType";
        }
        if (isset($sWhere) && $sWhere != "") {
            $sQuery = $sQuery->where($sWhere);
        }

        //error_log($sQuery);

        $rResult = $this->getAdapter()->fetchAll($sQuery);

        return $rResult;
    }

    public function generateRandomPassword($len) {

        $min_lenght = 0;
        $max_lenght = 100;
        $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $smallL = "abcdefghijklmnopqrstuvwxyz0123456789&$@";
        $number = "0123456789&$@";
        $bigB = str_shuffle($bigL);
        $smallS = str_shuffle($smallL);
        $numberS = str_shuffle($number);
        $subA = substr($bigB, 0, 5);
        $subB = substr($bigB, 6, 5);
        $subC = substr($bigB, 10, 5);
        $subD = substr($smallS, 0, 5);
        $subE = substr($smallS, 6, 5);
        $subF = substr($smallS, 10, 5);
        $subG = substr($numberS, 0, 5);
        $subH = substr($numberS, 6, 5);
        $subI = substr($numberS, 10, 5);
        $RandCode1 = str_shuffle($subA . $subD . $subB . $subF . $subC . $subE);
        $RandCode2 = str_shuffle($RandCode1);
        $RandCode = $RandCode1 . $RandCode2;
        if ($len > $min_lenght && $len < $max_lenght) {
            $CodeEX = substr($RandCode, 0, $len);
        } else {
            $CodeEX = $RandCode;
        }
        return $CodeEX;
    }

    public function addSystemAdmin($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        error_log(json_encode($params));
        $common = new Application_Service_Common();
        $email = $params['primaryEmail'];
        $password = $this->generateRandomPassword(9);
        $data = array(
            'first_name' => $params['firstName'],
            'last_name' => $params['lastName'],
            'primary_email' => $params['primaryEmail'],
            'secondary_email' => $params['secondaryEmail'],
            'password' => MD5($password),
            'phone' => $params['phone'],
            'IsVl' => $params['IsVl'],
            'IsProvider' => $params['IsProvider'],
            'AssignModule' => 0,
            'status' => $params['status'],
            'force_password_reset' => 1,
            'created_by' => $authNameSpace->admin_id,
            'created_on' => new Zend_Db_Expr('now()')
        );

        if ($data['IsVl'] == 4) {
            $data['AssignModule'] = 1;
            $data['IsProvider'] = 1;
        }
        if ($_SESSION['loggedInDetails']['IsVl'] != 4) {
            $data['IsVl'] = $_SESSION['loggedInDetails']['IsVl'];
            if ($data['IsVl'] == 2) {
                $data['County'] = $params['County'];
            }
        }
        if ($_SESSION['loggedInDetails']['IsVl'] == 4) {
            if ($data['IsVl'] == 2) {
                $data['IsProvider'] = 1;
            }
        }

        $fullname = $params['firstName'] . ' ' . $params['lastName'];

        $common->sendPasswordEmailToUser($email, $password, $fullname);

        $newSystemAdmin = $this->insert($data);

        if ($_SESSION['loggedInDetails']['IsVl'] == 2) {

            $db = Zend_Db_Table::getDefaultAdapter();

            foreach ($params['County'] as $county) {
                $query = "INSERT IGNORE INTO system_admin_counties (userID, countyID) VALUES ($newSystemAdmin, $county)";
                $db->query($query);
            }
        }

        return $newSystemAdmin;
    }

    public function getSystemAdminDetails($adminId) {
        return $this->fetchRow($this->select()->where("admin_id = ? ", $adminId));
    }

    public function getSystemAdminCounties($adminId) {

        $db = Zend_Db_Table::getDefaultAdapter();
        return $db->fetchCol("SELECT countyID FROM system_admin_counties WHERE userID = ?", $adminId);
    }

    public function updateSystemAdmin($params) {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        error_log(json_encode($params));
        $data = array(
            'first_name' => $params['firstName'],
            'last_name' => $params['lastName'],
            'primary_email' => $params['primaryEmail'],
            'secondary_email' => $params['secondaryEmail'],
            'phone' => $params['phone'],
            'status' => $params['status'],
            'IsVl' => $params['IsVl'],
            'AssignModule' => 0,
            'updated_by' => $authNameSpace->admin_id,
            'updated_on' => new Zend_Db_Expr('now()')
        );
        if (isset($params['IsProvider'])) {
            $data['IsProvider'] = $params['IsProvider'];
        }
        if (isset($params['password']) && $params['password'] != "") {
            $data['password'] = MD5($params['password']);
        }
        if (isset($params['force_password_reset'])) {
            $data['force_password_reset'] = 0;
            $_SESSION['loggedInDetails']['force_password_reset'] = 0;
        }
        if ($data['IsVl'] == 4) {
            $data['AssignModule'] = 1;
        }
        if ($_SESSION['loggedInDetails']['IsVl'] != 4) {
            $data['IsVl'] = $_SESSION['loggedInDetails']['IsVl'];
            if ($data['IsVl'] == 2) {
                if (isset($data['County'])) {
                    $data['County'] = $params['County'];
                }
            }
        }

        $systemAdmin =  $this->update($data, "admin_id=" . $params['adminId']);

        if ($_SESSION['loggedInDetails']['IsVl'] == 2) {

            $db = Zend_Db_Table::getDefaultAdapter();

            $db->query("DELETE FROM system_admin_counties WHERE userID = " . $params['adminId']);
            
            foreach ($params['County'] as $county) {
                $query = "INSERT IGNORE INTO system_admin_counties (countyID, userID) VALUES ($county, " . $params['adminId'] . ")";
                $db->query($query);
            }
        }

        return $systemAdmin;
    }

}
