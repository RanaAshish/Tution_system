<?php
/**
 * Description of Student_model
 *
 * @author Ashish
 */
class Student_model extends CI_Model
{
    /*
     * get_students_by_tution_id is used to fetch students data by tution id
     * 
     * @params  int         $tution_id      specify id of tution
     * 
     * @return  array[][]   two dimensional array with students records
     *          boolean     false, if error occurs
     * 
     * Developed by "Ashish"
     */
    public function get_students_by_tution_id($tution_id)
    {
        try
        {
            $this->db->select('s.id,s.first_name,s.middle_name,s.last_name,s.primary_phone,s.contact,s.email,b.id as branch_id,b.name as branch_name,c.name as class_name, co.text as course_name');

            $this->db->join('branch b','b.tution_id = '.$tution_id);
            $this->db->join('classes c','c.branch_id = b.id');
            $this->db->join('course co','co.id = c.course_id');
            $this->db->join('class_students cs','cs.class_id = c.id and cs.student_id = s.id and cs.is_current = "1"');
            
            $this->db->get('students s')->result_array();
        }
        catch(Exception $e)
        {
            return false;
        }
    }
}
