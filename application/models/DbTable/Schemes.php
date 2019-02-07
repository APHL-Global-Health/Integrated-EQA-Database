<?php

class Application_Model_DbTable_Schemes extends Zend_Db_Table_Abstract
{

    protected $_name = 'schemes';
    
    public function getAllSchemes(){
		$schemes = $this->select();
		return $this->fetchAll($schemes);
	}

    public function countEnrollmentSchemes()
    {
        $result = array();
        $schemes = $this->fetchAll($this->select()->where("status='active'"));

        foreach ($schemes as $scheme) {
            $result[strtoupper($scheme['scheme_id'])] = 1; //TODO: get correct count

        }

        return $result;
    }

}

