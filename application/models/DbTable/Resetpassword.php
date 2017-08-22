<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of resetpassword
 *
 * @author osoro
 */
class Application_Model_DbTable_Resetpassword extends Zend_Db_Table_Abstract {

    protected $_name = 'data_manager';

    public function __construct() {
//        sreturn $this->resetPassword($email);
    }

    public function resetPassword($email) {
        $db = Zend_Db_Table_Abstract::getAdapter();

        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $rResult = $db->fetchAll($db->select()->from('system_admin')->order('admin_id ASC')
                        ->where("primary_email ='" . $email . "' "));

//        $rResult = $this->getAdapter()->fetchAll($sQuery);
        $common = new Application_Service_Common();
        $password = $common->generateRandomPassword(8);
        if (count($rResult) == 1) {
            $where['primary_email'] = $email;

            $updatepassword['password'] = md5($password);
            $updatepassword['force_password_reset'] = 1;

            $db->update('system_admin', $updatepassword, "primary_email ='" . $email . "' ");
            $message = "Your password has been reset,please login and change the password<br><br> Email : ".$email."<br> Password : ".$password;
            $common->sendGeneralEmail($email, $message, 'User');
            return true;
        } else {
            return false;
        }
    }

}
