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
	public function insert_trauma_teeth($data){
		try{
		
		$this->load->database();
		$this->db->replace('trauma_examination', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return -1;
		}
	}

		public function insert_trauma_teeth_xray($data){
		try{
		
		$this->load->database();
		$this->db->replace('trauma_teeth_details', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return -1;
		}
	}


	public function trauma_details($id){
		$this->load->database();
		$this->db->from('trauma_details');
		$this->db->where('pid',$id);
		
		$query = $this->db->get();
		return $query->result();
		
		
	}

	public function trauma_examination($id){
		$this->load->database();
		$this->db->from('trauma_examination');
		$this->db->where('pid',$id);
		
		$query = $this->db->get();
		return $query->result();
		
		
	}

	public function trauma_medical_details($id){
		$this->load->database();
		$this->db->from('trauma_medical_details');
		$this->db->where('pid',$id);
		
		$query = $this->db->get();
		return $query->result();
		
		
	}

	public function update_trauma_teeth_details($id,$data){
			$this->load->database();
			$this->db->where('pid',$id);
			$this->db->update('trauma_teeth_details',$data);
			

	}
	public function update_trauma_medical_details($id,$data){
			$this->load->database();
			$this->db->where('pid',$id);
			$this->db->update('trauma_medical_details',$data);
			

	}
	public function trauma_teeth_details($id){
		$this->load->database();
		$this->db->from('trauma_teeth_details');
		$this->db->where('pid',$id);
		
		$query = $this->db->get();
		return $query->result();
		
		
	}

	
	
	

	
	

}
?>