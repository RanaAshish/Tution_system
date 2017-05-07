<?php
/**
 * This controller is use for manage role of tution class.
 *
 * @author Me
 */
class Auth extends My_Controller
{
    var $data;
    public function __construct() 
    {
        parent::__construct();
        if ($this->session->user) 
        {
            if ($this->session->user['role_name'] != 'tution') 
            {
                redirect('403'); //forbidden
            } 
            else 
            {
                $this->data['user'] = $this->session->user;
            }
        } 
        else 
        {
            redirect('login');
        }
    }
}
