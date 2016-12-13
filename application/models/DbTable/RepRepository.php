<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RepRepository
 *
 * @author osoro
 */
class Application_Model_DbTable_RepRepository extends Zend_Db_Table_Abstract {

    protected $tablename;

    public function __construct($tablename = array()) {
        $this->tablename = $tablename;
//       parent::__construct($config);
    }

    public function getAllRepWhere($where = array()) {
        try {
            if (isset($where)) {
                
            } else {
                $sql = $this->select();
                return $this->fetchAll($sql);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

}
