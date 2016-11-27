<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class MedicineData_model extends CI_Model
{
    var $table = 'medicine_data';
    var $column_order = array('med_name','med_generic_name','med_type','medicine_for','med_manufacturer','med_quantity',null); //set column field database for datatable orderable
    var $column_search = array('med_name','med_generic_name','med_type','medicine_for','med_manufacturer'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('id' => 'desc'); // default order 
    
    public function _construct()
    {
        parent::_construct();
        $this->load->database();
    }

    public function get_medicineType() {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('medicine_type');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_medicineFor() {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('medicine_for');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insert_medicineData($data) {
        try {

            $this->load->database();
            $this->db->insert('medicine_data', $data);
        } catch (Exception $e) {

            return -1;
        }
    }
    
    private function _get_datatables_query() {
        //$this->db->from($this->table);
        $this->db->from('medicine_data');
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
        $this->db->from('medicine_data');
        return $this->db->count_all_results();
    }
 
    public function get_by_id($id)
    {
        //$this->db->from($this->table);
        $this->db->from('medicine_data');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
 
    public function save($data)
    {
        //$this->db->insert($this->table, $data);
        $this->db->insert('medicine_data', $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        //$this->db->update($this->table, $data, $where);
        $this->db->update('medicine_data', $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        //$this->db->delete($this->table);
        $this->db->delete('medicine_data');
    }
    
    public function isNameAlreadyExists($var) {
        $this->db->from('medicine_data');
        $this->db->where('med_name',$var);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function isGenNameAlreadyExists($var) {
        $this->db->from('medicine_data');
        $this->db->where('med_generic_name',$var);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function insert_medicineFor($data) {
        try {

            $this->load->database();
            $this->db->insert('medicine_for', $data);
        } catch (Exception $e) {

            return -1;
        }
    }
    
    public function insert_medicineType($data) {
        try {

            $this->load->database();
            $this->db->insert('medicine_type', $data);
        } catch (Exception $e) {

            return -1;
        }
    }
    
    public function delete_by_type_id($id)
    {
        $this->db->where('med_id', $id);
        $this->db->delete('medicine_type');
    }
    
    public function delete_by_for_id($id)
    {
        $this->db->where('med_id', $id);
        $this->db->delete('medicine_for');
    }

    public function get_by_id_medicine_for($id)
    {
        $this->db->from('medicine_for');
        $this->db->where('med_id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
    
    public function get_by_id_medicine_type($id)
    {
        $this->db->from('medicine_type');
        $this->db->where('med_id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
    
    public function update_MedicineFor($where, $data)
    {
        $this->db->update('medicine_for', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_MedicineType($where, $data)
    {
        $this->db->update('medicine_type', $data, $where);
        return $this->db->affected_rows();
    }
    
    public function get_high_stock($hcount)
    {
        //$this->db->from($this->table);
        $this->db->from('medicine_data');
        $this->db->where('med_quantity >=',$hcount);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_low_stock($lcount)
    {
        //$this->db->from($this->table);
        $this->db->from('medicine_data');
        $this->db->where('med_quantity <=',$lcount);
        $query = $this->db->get();
        return $query->result();
    }
    
     public function get_by_id_highstock_count($id)
    {
        $this->db->from('medicine_settings');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
     public function get_by_id_lowstock_count($id)
    {
        $this->db->from('medicine_settings');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function get_medicineGraphSettings() {
        $this->load->database();
        $this->db->select("*");
        $this->db->from('medicine_settings');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_by_id_medicine_graph_data($id)
    {
        $this->db->from('medicine_settings');
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
    
    public function update_MedicineGraph($where, $data)
    {
        $this->db->update('medicine_settings', $data, $where);
        return $this->db->affected_rows();
    }
}
?>

