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
        $this->load->model('Class_model');
    }
    
    public function index($id){
        $this->data['classes'] = $this->Class_model->getClassesByBrnachId($id);
        $this->data['courses'] = $this->basic->select('course');
        $this->data['level1'] = $this->basic->selectByColumn('course','type',1);
        $this->data['branchId'] = $id;
        $this->template->load('tution/Template','tution/classes/list', $this->data);
    }
    
    public function getCourseByParent() {
        $id = $this->input->post('id');
        $result = $this->basic->selectByColumn('course','parent',$id);
        echo json_encode($result);
        die();
    }
    
    public function addClass() {
        $data = $this->input->post();
        $class['name'] = $data['name'];
        $class['branch_id'] = $data['branchId']; 
        $class['description'] = $data['description'];
        $class['course_id'] = empty($data['level3']) ? $data['level2']['id'] : $data['level3']['id'];
        $result = $this->basic->insert("classes",$class);
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
    
    public function getClassesByBranch(){
        $id = $this->input->post('id');
        $result = $this->Class_model->getClassesByBrnachId($id);
        echo json_encode($result);
        die();
    }
}
