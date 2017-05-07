<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->user) 
        {
            if ($this->session->user['role_name'] == 'admin') 
            {
                redirect('admin');
            }
            else if ($this->session->user['role_name'] == 'tution') 
            {
                redirect('tution');
            }
            else 
            {
                $this->data['user'] = $this->session->user;
            }
        } 
        $this->load->model("login_model");
    }

    public function index() 
    {
        $this->load->helper('cookie');

        setcookie('name','Ashish',time()+60*60*24*30);

        // var_dump(get_cookie('name'));
        // var_dump($_COOKIE);die;
        $this->load->view("login");
    }

    public function chklogin() {
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        $data = $this->login_model->checkLogin($username, $password);

        if (!empty($data)) {
            $this->session->set_userdata("user", $data);
            if ($data['role_name'] == 'admin') {
                redirect('admin');
            }
            else if ($data['role_name'] == 'tution') 
            {
                $this->load->model('Tution_model');
                $this->session->set_userdata("tution",$this->Tution_model->get_tution_info_by_user_id($this->session->user['id']));
                redirect('tution');
            }
            else {
                redirect("login");
            }
        } else {
            redirect("login");
        }
    }
    
    
}
?>