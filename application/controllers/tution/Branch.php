<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Me
 */
require_once 'auth.php';
class Branch extends auth 
{
    public function __construct() {
        parent::__construct();   
    }
    
    public function index(){
        $this->data['branchs'] = $this->basic->selectByColumn('branch','tution_id',$_SESSION['user']['id']);
        $this->template->load('tution/Template','tution/branch/list', $this->data);
    }
    
    public function add(){
        $this->template->load('tution/Template','tution/branch/add', $this->data);
    }
    
    public function addNewBranch(){
        $data = $this->input->post();
        $data['tution_id'] = $_SESSION['user']['id'];
        $data['establishment_year'] = $data['year'];
        $data['contact'] = json_encode($data['contacts']);
        $data['email'] = json_encode($data['emails']);
        unset($data['contacts']);
        unset($data['emails']);
        unset($data['year']);
        $result = $this->basic->insert("branch",$data);
        $responce = array();
        if($result != 0){
            $responce['status']='true';
            $responce['message']='';
        }else{
            $responce['status']='false';
            $responce['message']='';
        }
        echo json_encode($responce);
        die();
    }
    
}
