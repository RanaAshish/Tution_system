<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of course_model
 *
 * @author Mikinj
 */
class Course_model extends CI_Model{
    //put your code here
    public function getCourseByBranch($branchId) {
        $this->db->select('c.*');
        $this->db->from('course_branch cb');
        $this->db->join('course c','cb.course_id = c.id');
        $this->db->where('cb.branch_id',$branchId);
        return $this->db->get()->result_array();
    }
}
