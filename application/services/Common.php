<?php

class Application_Service_Common
{


    public function baseUrl()
    {
        return "http://" . $_SERVER['SERVER_NAME'];//Zend_Controller_Front::getInstance()->getBaseUrl();
    }

    public function configFileUrl()
    {
        return APPLICATION_PATH . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "config.ini";
    }

    public function sendMail($to, $cc, $bcc, $subject, $message, $fromMail = null, $fromName = null, $attachments = array())
    {
        //Send to email

        if (is_string($to)) {
            $to = explode(",", $to);
        }
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

    public static function getRandomString($length = 8)
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $randStr = "";
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $randStr .= $alphabet[$n];
        }
        return $randStr; //turn the array into a string
    }


    public function urlLinkButton($link, $btnLabel)
    {
        return "<br><a href='" . $this->baseUrl() . "/" . $link . "' style='padding:14px;width:40%;" .
            "text-decoration:none;display:block;background-color:purple;margin:8px;color:white;border-radius:10px;'>" .
            "" . $btnLabel . "</a><br>" .
            "";
    }

    public function createFooterWithLogo()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "config.ini", APPLICATION_ENV);

        $footerDiv =
            "<br>" .
            "<div>" . $config->vleidEmailFooter . "<br>" .
            "</div><div>"
            . "<div style='width:100%'>"
            . "<div style='float: left' >"
            . "<img height='100px' width='100px' src='" . $this->baseUrl() . "/" . $config->mohLogo . "'/>"
            . " </div>"
            . "<div style='width: 90%;float: right;text-align: left;'>"
            . "<br><br>" . $config->vlLogoFooterMessage . ""
            . "</div>"
            . "</div > "
            . "</div > ";
        return $footerDiv;

    }


    public function sendPasswordEmailToUser($sendTo, $password, $fullname = null)
    {
//        $common = new Application_Service_Common();
        $config = new Zend_Config_Ini(APPLICATION_PATH . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "config.ini", APPLICATION_ENV);
        $message = ""
            . $config->emailRegistrationBody
            . $this->urlLinkButton("auth/login", "NHRL Proficiency Testing Programme:<br > Viral Load / EID log in")

            . "Kindly use below credentials to logo in.This is a one time password.Please change the password after you log in "
            . "<br><b>Username : $sendTo </b><br>"
            . "<b>Password : $password </b><br>";


        $message .= $this->createFooterWithLogo();
        $this->sendMail($sendTo, null, null, "NPHL Integrated EQA Login Credentials",
            $message, null, "VLEID ePT ");
    }

    public function createOutline($message)
    {
        $html = "<div style='min-height:100%;width:100%;background-color: rgba(186,173,198,0.93);padding-top: 5%'>"
            . $message

            . "</div>";
        return $html;

    }

    public function sendReadinessEmail($email, $subject, $deadline)
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "config.ini", APPLICATION_ENV);
        $message = "<div style='padding:4em;background-color:white;font-size: 14px;height: 100%;'> Dear User,<br>"
            . $config->vlSurveyReadinessMessage
            . $this->urlLinkButton("auth/login", "NHRL Proficiency Testing Programme:<br> Viral Load/EID readiness checklist");


        $toMail = Application_Service_Common::getConfig('admin_email');
        $message .= "Please complete by <b>" . ($deadline) . "</b>. Failure to comply will result in exclusion from the round <br><br>";
        $message .= $this->createFooterWithLogo();

        $message = $this->createOutline($message);
        $message .= "</div>";
        $this->sendMail($email, null, null, $subject,
            $message, null, "VLEID ePT ");

    }


    public function sendGeneralEmail($sendTo, $Message, $fullname = null)
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "config.ini", APPLICATION_ENV);
        $fullname = isset($fullname) ? $fullname : 'Participant';
        $message = "<div style='padding:4em;background-color:white;font-size: 14px;height: 100%;'>Dear $fullname,"
            . " <br> $Message <br>"

            . $this->createFooterWithLogo();
        $message = $this->createOutline($message);
        $message .= "</div>";
        $toMail = Application_Service_Common::getConfig('admin_email');
        $this->sendMail($sendTo, null, null, "NPHL Integrated Email", $message, null, "ePT Admin Mail");
    }

    public function generateRandomPassword($len)
    {

        $min_lenght = 0;
        $max_lenght = 100;
        $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $smallL = "abcdefghijklmnopqrstuvwxyz0123456789 & $@";
        $number = "0123456789 & $@";
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

    function generate_id()
    {
        $participantDb = new Application_Model_DbTable_Participants();
        $t = $participantDb->CountParticipants();

        $start_dig = 5;
        $num = $t;
        $num_dig = strlen($num);

        $id = $num;
        if ($num_dig <= $start_dig) {
            $num_zero = $start_dig - $num_dig;

            for ($i = 0; $i < $num_zero; $i++) {
                $id = '0' . $id;
            }
        }
        $id = 'P' . $id;
        return $id;
    }

    public static function getConfig($name)
    {
        $gc = new Application_Model_DbTable_GlobalConfig();
        return $gc->getValue($name);
    }

    public function contactForm($params)
    {
        print_r($params['platform']);
        exit;
    }

    public function checkDuplicate($params)
    {
        $session = new Zend_Session_Namespace('credo');
        $tableName = $params['tableName'];
        $fieldName = $params['fieldName'];
        $value = trim($params['value']);
        $fnct = $params['fnct'];
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        if ($fnct == '' || $fnct == 'null') {
            $sql = $db->select()->from($tableName)->where($fieldName . " = " . "'$value'");
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

    public function checkDuplicates($params)
    {
        $session = new Zend_Session_Namespace('credo');
        $tableName = $params['tableName'];
        $fieldName = $params['fieldName'];
        $fieldName1 = $params['fieldName1'];
        $value = trim($params['value']);
        $fnct = $params['fnct'];
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        if ($fnct == '' || $fnct == 'null') {
            $sql = $db->select()->from($tableName)->where($fieldName . "=" . "'$value'")->where($fieldName1 . "=" . "'$value'");
            $result = $db->fetchAll($sql);
            $data = count($result);
        } else {
            $table = explode("##", $fnct);
            // first trying $table[1] without quotes. If this does not work, then in catch we try with single quotes
            try {

                $sql = $db->select()->from($tableName)->where($fieldName . "=" . "'$value'")->where($fieldName1 . "=" . "'$value'")->where($table[0] . "!=" . $table[1]);
                $result = $db->fetchAll($sql);
                $data = count($result);
            } catch (Exception $e) {
                $sql = $db->select()->from($tableName)->where($fieldName . "=" . "'$value'")->where($fieldName1 . "=" . "'$value'")->where($table[0] . "!='" . $table[1] . "'");
                $result = $db->fetchAll($sql);
                $data = count($result);
            }
        }
        return $data;
    }

    public function removespecials($url)
    {
        $url = str_replace(" ", "-", $url);

        $url = preg_replace('/[^a-zA-Z0-9\-]/', '', $url);
        $url = preg_replace('/^[\-]+/', '', $url);
        $url = preg_replace('/[\-]+$/', '', $url);
        $url = preg_replace('/[\-]{2,}/', '', $url);

        return strtolower($url);
    }

    public function getCountriesList()
    {
        $countriesDb = new Application_Model_DbTable_Countries();
        return $countriesDb->getAllCountries();
    }

    public function getUnshippedDistributions()
    {
        $disrtibutionDb = new Application_Model_DbTable_Distribution();
        return $disrtibutionDb->getUnshippedDistributions();
    }

    public function getCountiesList()
    {
        $countriesDb = new Application_Model_DbTable_Counties();
        return $countriesDb->getAllCounties();
    }

    public function getPartnersList()
    {
        $countriesDb = new Application_Model_DbTable_Partners();
        return $countriesDb->fetchAllActivePartners();
    }

    public function getDepartmentList()
    {
        $countriesDb = new Application_Model_DbTable_Departments();
        return $countriesDb->getAllDepartments();
    }

    public function getFacilities()
    {
        $facilitiesDb = new Application_Model_DbTable_Facilities();
        return $facilitiesDb->getAllFacilities();
    }

    public function getPlatformList()
    {
        $countriesDb = new Application_Model_DbTable_Platforms();
        return $countriesDb->getAllPlatforms();
    }

    public function getSchemesList()
    {
        $countriesDb = new Application_Model_DbTable_Schemes();
        return $countriesDb->getAllSchemes();
    }

    public function getAllnetwork()
    {
        $networkDb = new Application_Model_DbTable_NetworkTires();
        return $networkDb->getAllnetwork();
    }

    public function getAllParticipantAffiliates()
    {
        $participantAffiliateDb = new Application_Model_DbTable_ParticipantAffiliates();
        return $participantAffiliateDb->getAllParticipantAffiliates();
    }

    public function getGlobalConfigDetails()
    {
        $db = new Application_Model_DbTable_GlobalConfig();
        return $db->getGlobalConfig();
    }

    public function updateConfig($params)
    {
        $db = new Application_Model_DbTable_GlobalConfig();
        $db->updateConfigDetails($params);
    }

    public function getEmailTemplate($purpose)
    {
        $db = new Application_Model_DbTable_MailTemplate();
        return $db->getEmailTemplateDetails($purpose);
    }

    public function updateTemplate($params)
    {
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

    public function insertTempMail($to, $cc, $bcc, $subject, $message, $fromMail = null, $fromName = null)
    {
        $db = new Application_Model_DbTable_TempMail();
        return $db->insertTempMailDetails($to, $cc, $bcc, $subject, $message, $fromMail, $fromName);
    }

    public function getAllModeOfReceipt()
    {
        $db = new Application_Model_DbTable_ModeOfReceipt();
        return $db->fetchAllModeOfReceipt();
    }

    public function updateHomeBanner($params)
    {
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

    public function getHomeBannerDetails()
    {
        $db = new Application_Model_DbTable_HomeBanner();
        return $db->fetchHomeBannerDetails();
    }

    public function getHomeBanner()
    {
        $db = new Application_Model_DbTable_HomeBanner();
        return $db->fetchHomeBanner();
    }

    public function getproviderList()
    {
        $providerDb = new Application_Model_DbTable_Providers();
        return $providerDb->getProviders();
    }

    public function getprogramList()
    {
        $programDb = new Application_Model_DbTable_Programs();
        return $programDb->getPrograms();
    }

    public function getperiodList()
    {
        $periodDb = new Application_Model_DbTable_Periods();
        return $periodDb->getPeriods();
    }

    public function getlabList()
    {
        $labsDb = new Application_Model_DbTable_Labs();
        return $labsDb->getLabs();
    }

    public function getRepositoryColumns()
    {
        $repDb = new Application_Model_DbTable_Importcsv();
        return $repDb->getAllColumns();
    }

}
