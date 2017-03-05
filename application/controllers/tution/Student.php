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
}
