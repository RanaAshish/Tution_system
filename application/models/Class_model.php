<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Class_model
 *
 * @author Mikinj
 */
class Class_model extends CI_Model{
    //put your code here
    public function getClassesByBrnachId($id){
        $this->db->select('c.*,l3.text as level3,l2.text as level2');
        $this->db->from('classes c');
        $this->db->join('course l3','c.course_id = l3.id');
        $this->db->join('course l2','l3.parent = l2.id');
        $this->db->where('c.branch_id',$id);
        return $this->db->get()->result_array();
    }
    
    
    /*
     * get_classes_by_tution_id is used to fetch classes of particular tution
     * 
     * @params  int     $tution_id      specify id of the tution
     * 
     * Developed by "Ashish"
     */
    public function get_classes_by_tution_id($tution_id)
    {
        
    }
}
