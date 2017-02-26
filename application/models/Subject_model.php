<?php
/**
 * Description of Subject_model
 *
 * @author siddharth
 */
class Subject_model extends CI_Model 
{
    /*
     * Count subject data
     * @return
     *      success : Number of subject data
    */
    public function count_subject_data($id)
    {
        $this->db->select('s.*');
        $this->db->from('subject s');
        $this->db->join('term t', 't.id = s.term_id');
        $this->db->join('branch_standard bs', 'bs.id = t.branch_standard_id');
        $this->db->join('branch b', 'b.id = bs.branch_id');
        $this->db->join('classes c', 'c.id = b.class_id and c.user_id = '.$id);
        return count($this->db->get()->result_array());
    }
    /*
     * Get all subject data
     * @param Integer $limit Number of records
     * @param Integer $start Offset for limit
     * @param String $field column which will be sorted
     * @param String $dir Sorting criteria
     * @param Array $likearr Searching criteria
     * @return
     *      success : Array of subject data
    */
    public function get_all_subject($limit, $start, $field = 'id', $dir = 'desc', $likearr, $id)
    {
        $this->db->select('s.*');
        $this->db->from('subject s');
        $this->db->join('term t', 't.id = s.term_id');
        $this->db->join('branch_standard bs', 'bs.id = t.branch_standard_id');
        $this->db->join('branch b', 'b.id = bs.branch_id');
        $this->db->join('classes c', 'c.id = b.class_id and c.user_id = '.$id);
        if(!empty($likearr))
        {
            $this->db->group_start();
            $this->db->or_like($likearr);
            $this->db->group_end();
        }
        $this->db->limit($start, $limit);
        $this->db->order_by($field, $dir);
        return $this->db->get()->result_array();
    }
    public function count_tution_by_search($str, $id)
    {
        $this->db->select('s.*');
        $this->db->from('subject s');
        $this->db->join('term t', 't.id = s.term_id');
        $this->db->join('branch_standard bs', 'bs.id = t.branch_standard_id');
        $this->db->join('branch b', 'b.id = bs.branch_id');
        $this->db->join('classes c', 'c.id = b.class_id and c.user_id = '.$id);
        if(!empty($likearr))
        {
            $this->db->group_start();
            $this->db->or_like($str);
            $this->db->group_end();
        }
        return count($this->db->get()->result_array());
    }
}
