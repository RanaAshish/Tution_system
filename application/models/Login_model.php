<?php

class login_model extends CI_Model {

    public function checkLogin($username, $password) {
        $this->db->select("u.id,u.username,r.role_name");
        $this->db->from("users u");
        $this->db->join("role r", 'r.id = u.role_id', 'left');
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        return $this->db->get()->row_array();
    }
}

?>