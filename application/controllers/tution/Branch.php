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
require_once 'Auth.php';
class Branch extends Auth 
{
    public function __construct() {
        parent::__construct();   
    }
    
    public function index(){
        $this->data['branchs'] = $this->basic->selectByColumn('branch','tution_id',$_SESSION['user']['id']);
        $this->template->load('tution/Template','tution/branch/list', $this->data);
    }
    
    public function add(){
        $this->data['courses'] = json_encode($this->basic->selectByColumn('course','type',1));
        $this->template->load('tution/Template','tution/branch/add', $this->data);
    }
    
    public function addNewBranch(){
        $data = $this->input->post();
        $branch = array(
            "tution_id" => $_SESSION['user']['id'],
            "establishment_year" => $data['year'],
            "contact" => json_encode($data['contacts']),
            "email" => json_encode($data['emails']),
            "area" => $data['area'],
            "latitude" => $data['latitude'],
            "longitude" => $data['longitude'],
            "name" => $data['name'],
            "address" => $data['address'],
            
        );
        $result = $this->basic->insert("branch",$branch);
        if($result != 0){
            $branchCourse = array();
            foreach ($data['courses'] as $key => $value) {
                $branchCourse[$key]['course_id'] = $value;
                $branchCourse[$key]['branch_id'] = $result;
            }
            $branchCourseResult = $this->basic->insert_batch("course_branch",$branchCourse);
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
    
}
