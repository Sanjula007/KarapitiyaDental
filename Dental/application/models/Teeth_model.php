<?php 

class Teeth_model extends CI_model{
	public function _construct(){
		parent::_construct();
	}

	public function getTeethData($id){

		$this->load->database();
		$this->db->from('teeth_graph');
		$this->db->where('patient_id',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function updateTeethData($id){
		$this->load->database();
		$this->db->where('patient_id',$id);
		$this->db->update('teeth_graph',$data);
	}

	public function insertTeethData($data){
		try{
			$this->load->database();
			$this->db->insert('teeth_graph',$data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
		}catch(Exception $e){
			return -1;
		}
	}

}