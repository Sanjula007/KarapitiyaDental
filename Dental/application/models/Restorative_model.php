<?php

class Restorative_model extends CI_Model{

	public function get_history(){
		$query->this->db->get('medical_history');
		return $query->result();
	}

	public function insert_history($data){
		try{
		
		$this->load->database();
		$this->db->insert('medical_history', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
		
		
		}catch(Exception $e){
			
			return $e->getMessage();
		}
	}

	public function update_history($data){
		$id = 1;
		$this->db->where('id',$id);
		$this->db->update('medical_history','$data');
	}

	public function delete_history($id){
		$this->db->where('id',$this->uri->segment(3));
	}

	public function insert_examination($data){
		try{
		
			$this->load->database();
			$this->db->insert('examination', $data);
			$insert_id = $this->db->insert_id();

			return  $insert_id;
		
		
		}catch(Exception $e){
			
			return $e->getMessage();
		}
	}

	public function getRestorativeDetails($id){
		$this->load->database();
		$this->db->from('patient');
		$this->db->where('id',$id);
		
		$query = $this->db->get();
		return $query->result();
	}

	public function getExaminationDetails($id){
		$this->load->database();
		$this->db->from('medical_history');
		$this->db->where('id',$id);

		$query = $this->db->get();
		return $query->result();
	}
}