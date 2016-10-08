<?php
class Trauma_model extends CI_Model
{
    public function _construct()
    {
		parent::_construct();
	}
	/*
		*insert patient data to patient table
	*/
	
	public function insert_trauma($data){
		try{
		
		$this->load->database();
		$this->db->replace('trauma_details', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return -1;
		}
	}
	
	public function insert_medical_trauma($data){
		try{
		
		$this->load->database();
		$this->db->replace('trauma_medical_details', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return -1;
		}
	}
	
	
	

	
	

}
?>