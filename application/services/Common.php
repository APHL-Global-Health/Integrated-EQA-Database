<?php
require_once substr($_SERVER['CONTEXT_DOCUMENT_ROOT'], 0, stripos($_SERVER['CONTEXT_DOCUMENT_ROOT'], 'public'))
    . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . 'Bacteriology' . DIRECTORY_SEPARATOR . 'application'
    . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'main.php';
class Application_Service_Common {

    public function sendMail($to, $cc, $bcc, $subject, $message, $fromMail = null, $fromName = null, $attachments = array()) {
        //Send to email
        $to = explode(",", $to);
        $conf = new Zend_Config_Ini(APPLICATION_PATH . '/configs/application.ini', APPLICATION_ENV);
        $smtpTransportObj = new Zend_Mail_Transport_Smtp($conf->email->host, $conf->email->config->toArray());

        if ($fromMail == null || $fromMail == "") {
            $fromMail = $conf->email->config->username;
        }
        if ($fromName == null || $fromName == "") {
            $fromName = "ePT";
        }
        $originalMessage = html_entity_decode($message, ENT_QUOTES, 'UTF-8');
        $systemMail = new Zend_Mail();

        $originalMessage = str_replace("&nbsp;", "", strval($originalMessage));
        $originalMessage = str_replace("&amp;nbsp;", "", strval($originalMessage));

        $systemMail->setSubject($subject);
        $systemMail->setBodyHtml(html_entity_decode($originalMessage, ENT_QUOTES, 'UTF-8'));

        $systemMail->setFrom($fromMail, $fromName);
        $systemMail->setReplyTo($fromMail, $fromName);

        if (is_array($to)) {
            foreach ($to as $name => $mail) {
                $systemMail->addTo($mail, $name);
            }
        } else {
            $systemMail->addTo($to);
        }
        if (isset($cc) && $cc != "" && $cc != null) {
            if (is_array($cc)) {
                foreach ($cc as $name => $mail) {
                    $systemMail->addCc($mail, $name);
                }
            } else {
                $systemMail->addCc($cc);
            }
        }
        if (isset($bcc) && $bcc != "" && $bcc != null) {
            if (is_array($bcc)) {
                foreach ($bcc as $name => $mail) {
                    $systemMail->addBcc($mail, $name);
                }
            } else {
                $systemMail->addBcc($bcc);
            }
        }

        try {
            $systemMail->send($smtpTransportObj);
            return true;
        } catch (Exception $exc) {

            error_log("===== MAIL SENDING FAILED - START =====");
            error_log($exc->getMessage());
            error_log($exc->getTraceAsString());
            error_log("===== MAIL SENDING FAILED - END =====");
            return false;
        }
    }

    public static function getRandomString($length = 8) {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $randStr = "";
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $randStr .= $alphabet[$n];
        }
        return $randStr; //turn the array into a string
    }

    public function sendPasswordEmailToUser($sendTo, $password, $fullname) {
//        $common = new Application_Service_Common();
        $config = new Zend_Config_Ini(APPLICATION_PATH . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "config.ini", APPLICATION_ENV);
        $message = "Dear $fullname,"
                . $config->emailRegistrationBody
                . "<br>Username : $sendTo <br>"
                . "Password : $password <br>"
                . $config->emailRegistrationSignature;
        $toMail = Application_Service_Common::getConfig('admin_email');
        //$fromName = Application_Service_Common::getConfig('admin-name');			
        $this->sendMail($sendTo, null, null, "NPHL Integrated EQA Login Credentials", $message, null, "ePT Admin Credentials");
    }
public function sendGeneralEmail($sendTo, $Message, $fullname) {
//        $common = new Application_Service_Common();
        $config = new Zend_Config_Ini(APPLICATION_PATH . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "config.ini", APPLICATION_ENV);
        $message = "Dear $fullname,"
                
                . "<br> $Message <br>"
               
                . $config->emailRegistrationSignature;
        $toMail = Application_Service_Common::getConfig('admin_email');
        //$fromName = Application_Service_Common::getConfig('admin-name');			
        $this->sendMail($sendTo, null, null, "NPHL Integrated EQA Login Credentials", $message, null, "ePT Admin Credentials");
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

    public static function getConfig($name) {
        $gc = new Application_Model_DbTable_GlobalConfig();
        return $gc->getValue($name);
    }

    public function contactForm($params) {
//		$message = "<h3>The following details were entered by ".$params['first_name']." " .$params['last_name']."</h3>";
//		$message .= "Name : ".$params['first_name']." " .$params['last_name']."<br/>";
//		$message .= "Email : ".$params['email']."<br/>";
//		$message .= "Phone/Mobile : ".$params['phone']."<br/>";
//		$message .= "Selected Reason to Contact : ".$params['reason']."<br/>";
//		$message .= "Lab/Agency : ".$params['agency']."<br/>";
//		$message .= "Additional Info : ".$params['additionalInfo']."<br/>";
        print_r($params['platform']);
        exit;
        $db = new Application_Model_DbTable_Facility();
        $dbs = Zend_Db_Table_Abstract::getAdapter();
        $data = array('FacilityName' => $params['facilityname'], 'MFLCode' => $params['mflcode'], 'Department' => $params['department'], 'PhysicalAddress' => $params['physicaladdress'], 'PostalAddress' => $params['postaladdress'], 'Email' => $params['email'], 'Town' => $params['town'], 'Telephone' => $params['telephone'], 'County' => $params['county'], 'Country' => $params['Country'], 'Partner' => $params['Partner'], 'ContactName' => $params['contactname'], 'ContactEmail' => $params['contactemail'], 'ContactTelephone' => $params['contacttel'], 'additionalinfo' => $params['additionalInfo']);
        //$db->addContact($data);
        $Id = $db->insert($data);
        if (isset($params['platform']) && $params['platform'] != "") {

            foreach ($params['platform'] as $epId) {
                echo $epId;
                exit;
                $dbs->insert('facilityplatform', array('FacilityID' => $Id, 'PlatformID' => $epId));
            }
        }
        return 1;
//		$fromEmail = $params['email'];
//		$fromName  = $params['first_name']." " .$params['last_name'];
//		
//		$to = Application_Service_Common::getConfig('admin_email');
//		
//		$mailSent = $this->sendMail($to,null,null,"New contact message from the ePT program",$message,$fromEmail,$fromName);
//		if($mailSent){
//			return 1;
//		}else{
//			return 0;
//		}		
    }

    public function checkDuplicate($params) {
        $session = new Zend_Session_Namespace('credo');
        $tableName = $params['tableName'];
        $fieldName = $params['fieldName'];
        $value = trim($params['value']);
        $fnct = $params['fnct'];
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        if ($fnct == '' || $fnct == 'null') {
            $sql = $db->select()->from($tableName)->where($fieldName . "=" . "'$value'");
            $result = $db->fetchAll($sql);
            $data = count($result);
        } else {
            $table = explode("##", $fnct);
            // first trying $table[1] without quotes. If this does not work, then in catch we try with single quotes
            try {

                $sql = $db->select()->from($tableName)->where($fieldName . "=" . "'$value'")->where($table[0] . "!=" . $table[1]);
                $result = $db->fetchAll($sql);
                $data = count($result);
            } catch (Exception $e) {
                $sql = $db->select()->from($tableName)->where($fieldName . "=" . "'$value'")->where($table[0] . "!='" . $table[1] . "'");
                $result = $db->fetchAll($sql);
                $data = count($result);
            }
        }
        return $data;
    }

    public function removespecials($url) {
        $url = str_replace(" ", "-", $url);

        $url = preg_replace('/[^a-zA-Z0-9\-]/', '', $url);
        $url = preg_replace('/^[\-]+/', '', $url);
        $url = preg_replace('/[\-]+$/', '', $url);
        $url = preg_replace('/[\-]{2,}/', '', $url);

        return strtolower($url);
    }

    public function getCountriesList() {
        $countriesDb = new Application_Model_DbTable_Countries();
        return $countriesDb->getAllCountries();
    }

    public function getCountiesList() {
        $countriesDb = new Application_Model_DbTable_Counties();
        return $countriesDb->getAllCounties();
    }

    public function getPartnersList() {
        $countriesDb = new Application_Model_DbTable_Partners();
        return $countriesDb->fetchAllActivePartners();
    }

    public function getDepartmentList() {
        $countriesDb = new Application_Model_DbTable_Departments();
        return $countriesDb->getAllDepartments();
    }

    public function getMflList() {
        $countriesDb = new Application_Model_DbTable_Mfls();
        return $countriesDb->getAllMfls();
    }

    public function getPlatformList() {
        $countriesDb = new Application_Model_DbTable_Platforms();
        return $countriesDb->getAllPlatforms();
    }

    public function getSchemesList() {
        $countriesDb = new Application_Model_DbTable_Schemes();
        return $countriesDb->getAllSchemes();
    }

    public function getAllnetwork() {
        $networkDb = new Application_Model_DbTable_NetworkTires();
        return $networkDb->getAllnetwork();
    }

    public function getAllParticipantAffiliates() {
        $participantAffiliateDb = new Application_Model_DbTable_ParticipantAffiliates();
        return $participantAffiliateDb->getAllParticipantAffiliates();
    }

    public function getGlobalConfigDetails() {
        $db = new Application_Model_DbTable_GlobalConfig();
        return $db->getGlobalConfig();
    }

    public function getFullSchemesDetails() {
        $db = new Application_Model_DbTable_SchemeList();
        return $db->getFullSchemeList();
    }

    public function updateConfig($params) {
        $db = new Application_Model_DbTable_GlobalConfig();
        $db->updateConfigDetails($params);
    }

    public function getEmailTemplate($purpose) {
        $db = new Application_Model_DbTable_MailTemplate();
        return $db->getEmailTemplateDetails($purpose);
    }

    public function updateTemplate($params) {
        $filterRules = array(
            '*' => 'StripTags',
            '*' => 'StringTrim'
        );

        $filter = new Zend_Filter_Input($filterRules, null, $params);

        if ($filter->isValid()) {

            $params = $filter->getEscaped();
            $db = new Application_Model_DbTable_MailTemplate();
            $db->getAdapter()->beginTransaction();

            try {
                $result = $db->updateMailTemplateDetails($params);
                $db->getAdapter()->commit();
            } catch (Exception $exc) {
                $db->getAdapter()->rollBack();
                error_log($exc->getMessage());
                error_log($exc->getTraceAsString());
            }
        }
    }

    public function insertTempMail($to, $cc, $bcc, $subject, $message, $fromMail = null, $fromName = null) {
        $db = new Application_Model_DbTable_TempMail();
        return $db->insertTempMailDetails($to, $cc, $bcc, $subject, $message, $fromMail, $fromName);
    }

    public function getAllModeOfReceipt() {
        $db = new Application_Model_DbTable_ModeOfReceipt();
        return $db->fetchAllModeOfReceipt();
    }

    public function updateHomeBanner($params) {
        $filterRules = array(
            '*' => 'StripTags',
            '*' => 'StringTrim'
        );

        $filter = new Zend_Filter_Input($filterRules, null, $params);

        if ($filter->isValid()) {

            $params = $filter->getEscaped();
            $db = new Application_Model_DbTable_HomeBanner();
            $db->getAdapter()->beginTransaction();

            try {
                $result = $db->updateHomeBannerDetails($params);
                $db->getAdapter()->commit();
            } catch (Exception $exc) {
                $db->getAdapter()->rollBack();
                error_log($exc->getMessage());
                error_log($exc->getTraceAsString());
            }
        }
    }

    public function getHomeBannerDetails() {
        $db = new Application_Model_DbTable_HomeBanner();
        return $db->fetchHomeBannerDetails();
    }

    public function getHomeBanner() {
        $db = new Application_Model_DbTable_HomeBanner();
        return $db->fetchHomeBanner();
    }

    public function getproviderList() {
        $providerDb = new Application_Model_DbTable_Providers();
        return $providerDb->getProviders();
    }

    public function getprogramList() {
        $programDb = new Application_Model_DbTable_Programs();
        return $programDb->getPrograms();
    }

    public function getperiodList() {
        $periodDb = new Application_Model_DbTable_Periods();
        return $periodDb->getPeriods();
    }

    public function getlabList() {
        $labsDb = new Application_Model_DbTable_Labs();
        return $labsDb->getLabs();
    }

    public function getRepositoryColumns() {
        $repDb = new Application_Model_DbTable_Importcsv();
        return $repDb->getAllColumns();
    }

}
