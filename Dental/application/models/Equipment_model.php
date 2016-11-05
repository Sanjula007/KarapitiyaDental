<?php
class Equipment_model extends CI_Model
{
    public function _construct()
    {
		parent::_construct();
	}
	/*
		*insert patient data to patient table
	*/
	
	public function insert_equipment($data){
		try{
		
		$this->load->database();
		$this->db->insert('equipment', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return -1;
		}
	}

	public function insert_equipment_log($data){
		try{
		
		$this->load->database();
		$this->db->insert('equipment_log', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return -1;
		}
	}
	
	public function categories(){
		$this->load->database();
		$this->db->from('equipment_category');
		$this->db->order_by('category','asc');
		
		$query = $this->db->get();
		return $query->result();
		
		
	}

	public function getequipment($id){

		$this->load->database();
		$this->db->from('equipment');
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		return $query->result();
	}

	public function update_equipment($id,$data){

		$this->load->database();
		$this->db->where('id',$id);
		$this->db->update('equipment',$data);
		
		

	}
	
	

	
	

}
?>