<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of class
 *
 * @author Mikinj
 */
require_once 'Auth.php';
class Classes extends Auth {
    public function __construct() {
        parent::__construct();   
    }
    
    public function index($id){
        $this->data['classes'] = $this->basic->selectByColumn('classes','branch_id',$id);
        $this->data['courses'] = $this->basic->select('course');
        $this->template->load('tution/Template','tution/classes/list', $this->data);
    }
    
}
