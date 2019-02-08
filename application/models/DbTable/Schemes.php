<?php

class Application_Model_DbTable_Schemes extends Zend_Db_Table_Abstract
{

    protected $_name = 'schemes';
    
    public function getAllSchemes(){
		return $this->fetchAll($this->select());
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

    public function addScheme($params)
    {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'scheme_id' => $params['scheme_id'],
            'scheme_name' => $params['scheme_name'],
            'status' => 'active');
        return $this->insert($data);
    }

    public function updateScheme($params)
    {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'scheme_name' => $params['scheme_name'],
            'status' => $params['status']
        );
        return $this->update($data, "scheme_id='{$params['scheme_id']}'");
    }

}

