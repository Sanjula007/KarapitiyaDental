<?php
class Patient_model extends CI_Model
{
    public function _construct()
    {
		parent::_construct();
	}
	/*
		*insert patient data to patient table
	*/
	
	public function insert_patient($data){
		try{
		
		$this->load->database();
		$this->db->insert('patient', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return -1;
		}
	}
	
	public function getpatientdetails($id){
		$this->load->database();
		$this->db->from('patient');
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		return $query->result();
	}

	public function getPatientAlldetails(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('patient');

		$query = $this->db->get();
		return $query->result();

	}


	public function getselectedPatientDetails($pid){

		$this->load->database();
		$this->db->select('*');
		$this->db->from('patient');
		$this->db->where('id',$pid);
		
		$query = $this->db->get();
		return $query->result();


	}
	
	

	
	

}
?>