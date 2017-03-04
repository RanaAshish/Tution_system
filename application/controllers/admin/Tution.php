<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tution extends CI_Controller {

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
        $this->load->model('tution_model', 'tution');
        $this->load->model('login_model', 'login');
        
    }

    /* index method list out all the tution available in the system */

    public function index() {
        $this->template->load('admin/Template', 'admin/tution/registration', $this->data);
    }

    // Manage tuition 
    public function manage_tution($type = '', $param1 = '', $param2 = '') {
        // Add tution
        if ($type == 'add') {
            if ($this->input->post()) 
            {
                $password = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(8 / strlen($x)))), 1, 8);
                // Insert tution class
                $login_user = array(
                    'username' => $this->input->post('username'),
                    'password' => $password,
                    'role_id' => 2
                );
                if ($login_id = $this->basic->insert('users', $login_user)) 
                {
                    // Insert class
                    $class = array(
                        'user_id' => $login_id,
                        'tution_name' => $this->input->post('class_name')
                    );
                    if ($class_id = $this->basic->insert('tutions', $class)) 
                    {
                        // Insert branch
                        $branch_arr = array(
                            'tution_id' => $class_id,
                            'address' => $this->input->post('address'),
                            'establishment_year' => $this->input->post('established_year'),
                            'contact' => json_encode($this->input->post('contacts')),
                            'email' => json_encode($this->input->post('emails')),
                            'is_primary' => '1'
                        );
                        $branch_id = $this->basic->insert('branch', $branch_arr); 
//                        $this->session->set_flashdata('succ', 'Tution successfully added with us.');
                        echo json_encode(['status' => 'true']);
                        die;
                    }
                }
//                redirect('/admin/tutions');
            }
            else 
            {
                // Load page for adding tution
                $this->template->load('admin/Template', 'admin/tution/registration', $this->data);
            }
        }
        else if($type == 'edit'){
            if($this->input->post())
            {
              //  var_dump($this->input->post());die;
                // Update operation
                $login_user = array(
                    'username' => $this->input->post('username'),
                );
                if ($this->basic->update('users', $login_user,["id"=>$this->input->post('login_id')])) 
                {
                    // Insert class
                    $class = array(
                        'tution_name' => $this->input->post('class_name')
                    );
                    if ($this->basic->update('tutions', $class,["id" => $param1])) 
                    {
                        // Insert branch
                        $branch_arr = array(
                            'address' => $this->input->post('address'),
                            'establishment_year' => $this->input->post('established_year'),
                            'contact' => json_encode([$this->input->post('contact_number')]),
                            'email' => json_encode([$this->input->post('email')])
                        );
                        $this->basic->update('branch', $branch_arr,["id"=>$this->input->post('branch_id')]);
                        $this->session->set_flashdata('succ', 'Record updated successfully.');
                    }
                }
                redirect('/admin/tutions/edit/'.$param1);
            }
            else
            {
                // Display edit form
                $this->data['tution_info'] = $this->tution->get_tution_info_by_id($param1);
                // Load page for adding tution
                $this->template->load('admin/Template', 'admin/tution/edit_tution', $this->data);
            }
        }
        else if ($type == 'get') 
        {
            $col = [
                'tution_name',
                'username',
                ''
            ];
            $dir = $this->input->post('order[0][dir]');
            $field = $col[$this->input->post('order[0][column]')];
            $cnt = $this->tution->count_class_data();
            $start = $this->input->post('start');
            $end = $this->input->post('length');
            $likearr = [];
            $ser = $this->input->post('search[value]');
            $sercnt = 0;
            if (!empty($ser)) {
                $likearr['username'] = $likearr['tution_name'] = $ser;
                $sercnt = $this->tution->count_tution_by_search($ser);
            }
            $result = $this->tution->get_all_class($end, $start, $field, $dir, $likearr);
            $data['recordsTotal'] = !empty($ser) ? $sercnt : $cnt;
            $data['recordsFiltered'] = !empty($ser) ? count($result) : $cnt;
            $data['data'] = [];
            foreach ($result as $row) {
                $data['data'][] = [
                    $row['tution_name'],
                    $row['username'],
                    '<a href="admin/tutions/edit/' . $row['id'] . '" ><i class="fa fa-pencil-square-o"></i></a>&nbsp;'.
                    '<a href="admin/tutions/delete/' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to Delete?\')"><i class="fa fa-remove"></i></a>&nbsp;' .
                    '<a href="admin/tutions/branch/'.$row['id'].'" id="' . $row['id'] . '" class="branch_view" title="view branches"><i class="fa fa-building-o"></i></a>'
                ];
            }
            echo json_encode($data);
            die;
        } 
        else if($type == 'checkusername')
        {
            $result = $this->basic->selectByColumn('users', 'username', $this->input->post('uname'));
            if(count($result) >= 1)
                echo json_encode(['status'=>true]);
            else
                echo json_encode(['status'=>false]);
            die;
        }
        else if ($type == 'delete') 
        {
            $this->basic->delete('tutions', ['id' => $param1]);
            redirect('admin/tutions');
            die;
        }
        else if ($type == 'branch') 
        {
            $this->data['tution'] = $this->tution->get_branch_detial_by_class_id($param1);
            $this->template->load('admin/Template', 'admin/tution/branchlist', $this->data);
            return;
        }
        else if ($type == 'standard') 
        {
            $this->data['standard'] = $this->tution->get_standard_by_branch_id($param1);
            $this->template->load('admin/Template', 'admin/tution/standardlist', $this->data);
            return;
        }
        else if ($type == 'term')
        {
            $this->data['term'] = $this->tution->get_term_by_branch_standard_id($param1);
            $this->template->load('admin/Template', 'admin/tution/termlist', $this->data);
            return;
        }
        else if($type == 'shift')
        {
            $this->data['shift'] = $this->tution->get_shift_by_term_id($param1);
            $this->template->load('admin/Template', 'admin/tution/shiftlist', $this->data);
            return;
        }
        else if($type == 'student')
        {
            $this->data['student'] = $this->tution->get_student_by_shift_id($param1);
            $this->template->load('admin/Template', 'admin/tution/studentlist', $this->data);
            return;
        }
        else
        {
            $this->data['title'] = 'Tuitions';
            $this->template->load('admin/Template', 'admin/tution/tuitionlist', $this->data);
        }
    }
}