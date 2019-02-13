<?php

class Application_Model_DbTable_Scheme extends Zend_Db_Table_Abstract
{

    protected $_name = 'schemes';
    
    protected $_referenceMap    = array(
        'Assay' => array(
            'columns'           => array('assay_id'),
            'refTableClass'     => 'Application_Model_DbTable_Assay',
            'refColumns'        => array('id')
        )
    );

    public function getAllSchemes($onlyActiveScemes = false){

        $query = $this->select();
        if($onlyActiveScemes) $query->where("status = 'active'");

		$schemes = $this->fetchAll($query);

        return $schemes;
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
            'assay_id' => $params['assay_id'],
            'status' => 'active');
        return $this->insert($data);
    }

    public function updateScheme($params)
    {
        $authNameSpace = new Zend_Session_Namespace('administrators');
        $data = array(
            'scheme_name' => $params['scheme_name'],
            'assay_id' => $params['assay_id'],
            'status' => $params['status']
        );
        return $this->update($data, "scheme_id='{$params['scheme_id']}'");
    }

}

