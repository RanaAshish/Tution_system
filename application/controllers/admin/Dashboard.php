<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

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
    }

    public function index() 
    {
        $this->template->load('admin/Template', 'index', $this->data);
    }

    public function manage_profile()
    {
        if($this->input->post())
        {
            $this->load->library('crop', [
                    isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null,
                    isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null,
                    isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null
                ]);
            $response = array(
              'state'  => 200,
              'message' => $this->crop-> getMsg(),
              'result' => $this->crop-> getResult()
            );
            $row = $this->session->user;
            $row['profile_image'] = $this->crop->getFilename();
            $this->session->set_userdata('user', $row);
            $this->basic->update('users', ['profile_image' => $this->crop->getFilename()], ['id' => $this->session->user['id']]);
            echo json_encode($response);
            die;
        }
        $this->template->load('admin/Template', 'admin/profile', $this->data);
    }
    // Check entered password has been correct or not
    public function checkPassword()
    {
        if($this->input->post('password') != $this->session->user['password'])
            echo json_encode(['status' => 200, 'result' => false, 'error' => 'You have enterd wrong current password.']);
        else
            echo json_encode(['status' => 200, 'result' => true ,'error' => '']);
        die;
    }
    // Change user password
    public function change_password()
    {
        $this->basic->update('users', ['password' => $this->input->post('conf')], ['id' => $this->session->user['id']]);
        $row = $this->session->user;
        $row['password'] = $this->input->post('conf');
        $this->session->set_userdata('user', $row);
        echo json_encode(['status' => 200, 'result' => true, 'msg' => 'Your password has been changed successfully.']);
        die;
    }
    
}
