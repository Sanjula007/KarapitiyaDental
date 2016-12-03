<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Leave_model class.
 *
 * @extends CI_Model
 */
class Leave_model extends CI_Model {

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->database();
    }

    /**
     * create_user function.
     *
     * @access public
     * @param mixed $email
     * @param mixed $email
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function addLeave($data) {


        $this->db->insert('leave_management',$data);

        if($this->db->affected_rows()>0)
        {
            return true;
        }

    }


    public function get_leaves($id) {

        $this->db->from('leave_management');
        $this->db->where('id', $id);
        return $this->db->get()->row();

    }

    public function get_halfday_leaves($id) {


        $this->db->from('leave_management');
        $this->db->where('doctor_id', $id);
        $this->db->where('leave_type', 'Half day');
       return $this->db->count_all_results();

    }

    public function get_fullDay_leaves($id) {

        $this->db->from('leave_management');
        $this->db->where('doctor_id', $id);
        $this->db->where('leave_type', 'Full day');
        return $this->db->count_all_results();

    }
    public function get_short_leaves($id) {


        $this->db->from('leave_management');
        $this->db->where('doctor_id', $id);
        $this->db->where('leave_type', 'Short leave');
        return $this->db->count_all_results();

    }

    public function get_all(){
        $query = $this->db->get('leave_management');
        return $query;

    }

}
?>