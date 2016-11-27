<?php
class CleftLipPalate_model extends CI_Model
{
    public function _construct() {
        parent::_construct();
    }

    
    var $column_order = array('c.ref_patient_id', 'p.fname', 'p.lname','p.address','p.gender','c.date_recorded',null); //set column field database for datatable orderable
    var $column_search = array('c.ref_patient_id', 'p.fname', 'p.lname','p.address','p.gender'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('c.ref_patient_id' => 'desc'); // default order 
    /*
		*insert patient data to patient table
	*/
	
	public function insert_cleftlippalate($data){
		try{
		
		$this->load->database();
		$this->db->insert('cleft_lip_palate', $data);
		}catch(Exception $e){
			
			return -1;
		}
	}
        
        public function insert_cleftlippalateinvestigation($data){
		try{
		
		$this->load->database();
		$this->db->insert('cleft_lip_palate_investigation', $data);
		}catch(Exception $e){
			
			return -1;
		}
	}
        
        public function insert_cleftlippalatediagnosis($data){
		try{
		
		$this->load->database();
		$this->db->insert('cleft_lip_palate_diagnosis', $data);
		}catch(Exception $e){
			
			return -1;
		}
	}
        
        public function insert_cleftlippalatetreatmentplan($data){
		try{
		
		$this->load->database();
		$this->db->insert('cleft_lip_palate_treatment_plan', $data);
		}catch(Exception $e){
			
			return -1;
		}
	}
        
        public function insert_cleftlippalateteethpresent($data){
		try{
		
		$this->load->database();
		$this->db->insert('cleft_lip_teeth_present', $data);
		}catch(Exception $e){
			
			return -1;
		}
	}
        
        public function get_cleftLipData($id) {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('cleft_lip_palate');
        $this->db->where('ref_patient_id = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_cleftLipDataInvestigation($id) {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('cleft_lip_palate_investigation');
        $this->db->where('ref_patient_id = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_cleftLipDataDiagnosis($id) {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('cleft_lip_palate_diagnosis');
        $this->db->where('ref_patient_id = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_cleftLipDataTreatmentPlan($id) {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('cleft_lip_palate_treatment_plan');
        $this->db->where('ref_patient_id = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_cleftLipDataTeethPresent($id) {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('cleft_lip_teeth_present');
        $this->db->where('ref_patient_id = ' . $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_cleftlippalate($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('cleft_lip_palate', $data);
    }

    public function update_cleftlippalateinvestigation($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('cleft_lip_palate_investigation', $data);
    }

    public function update_cleftlippalatediagnosis($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('cleft_lip_palate_diagnosis', $data);
    }

    public function update_cleftlippalatetreatmentplan($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('cleft_lip_palate_treatment_plan', $data);
    }
    
    public function update_cleftlippalateteethpresent($id, $data) {
        $this->load->database();
        $this->db->where('id', $id);
        $this->db->update('cleft_lip_teeth_present', $data);
    }

    private function _get_datatables_query() {
        //$this->db->from($this->table);
        $this->db->select('c.ref_patient_id, p.fname, p.lname,p.address,p.gender,c.date_recorded');
        $this->db->from('cleft_lip_palate as c');
        $this->db->join('patient as p', 'p.id = c.ref_patient_id', 'left');

        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if ($_POST['search']['value']) { // if datatable send POST for search

                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        //$this->db->from($this->table);
        $this->db->from('cleft_lip_palate');
        return $this->db->count_all_results();
    }
    
    public function delete_by_id($id)
    {
        $this->db->where('ref_patient_id', $id);
        //$this->db->delete($this->table);
        $this->db->delete('cleft_lip_palate');
        
        $this->db->where('ref_patient_id', $id);
        $this->db->delete('cleft_lip_palate_diagnosis');
        $this->db->where('ref_patient_id', $id);
        $this->db->delete('cleft_lip_palate_investigation');
        $this->db->where('ref_patient_id', $id);
        $this->db->delete('cleft_lip_palate_treatment_plan');
        $this->db->where('ref_patient_id', $id);
        $this->db->delete('cleft_lip_teeth_present');
    }
	
	

	
	

}
?>

