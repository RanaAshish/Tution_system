<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
}
