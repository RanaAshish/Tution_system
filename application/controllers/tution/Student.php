<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * All the functionality related to student that tution can manage
 *
 * @author Ashish
 */
require_once 'Auth.php';
class Student extends Auth
{
    public function __construct()
    {
        parent::__construct();   
        $this->load->model('Student_model');
    }
    
    /*
     * index method is used to display listing page of student 
     * 
     * Developed by "Ashish"
     */
    public function index()
    {
        $this->data['students'] = $this->Student_model->get_students_by_tution_id($_SESSION['user']['id']);
        $this->template->load('tution/Template','tution/student/list', $this->data);
    }
    
    /*
     * add method is used to display add form of student
     * 
     * Developed by "Ashish"
     */
    public function add()
    {
        
        $this->template->load('tution/Template','tution/student/add', $this->data);
    }


    /*
     * Developed by "Ashish"
     */
    public function add_student()
    {
        $data = $this->input->post();
        $student = array(
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
        );
        $student['contact'] = json_encode($data['contacts']);
        $student['email'] = json_encode($data['emails']);
        $result = $this->basic->insert("students",$student);
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
