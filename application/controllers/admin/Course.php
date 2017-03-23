<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {
	var $data;
	public function __construct() {
        parent::__construct();
        if ($this->session->user) {
            if ($this->session->user['role_name'] != 'admin') {
                redirect('403'); // forbidden
            } else {
                $this->data['user'] = $this->session->user;
            }
        } else {
            redirect('login');
        }
        $this->load->model('basic_model', 'basic');
    }
    public function index()
    {
    	$this->data['courses'] = $this->basic->select('course');
    	$this->template->load('admin/Template', 'admin/Course/manage-course', $this->data);
    }

    // Add new course
    public function add()
    {
        $this->basic->insert('course', $this->input->post());
        $this->session->set_flashdata('succ', 'Course added successfully.');
        redirect('admin/courses');
    }
}