<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactController
 *
 * @author osoro
 */
class ContactController extends Zend_Controller_Action{
    //put your code here
    public function init()
    {
        /* Initialize action controller here */
//        $this->_helper->layout()->setLayout('home');
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('index', 'html')
            ->initContext();
    }
    public function indexAction(){
        
    }
}
