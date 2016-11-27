<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MedicineData extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods ont prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
        function __construct() {
            parent::__construct();
            $this->load->model('MedicineData_model');
            //$this->load->model('MedicineData_model','medicine_data');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            //$this->load->model('person_model','person');
        } 
    //test
        
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function addMedicine() {
            $this->load->library('form_validation');
            $this->load->helper('form');
            $data['medicineType'] = $this->MedicineData_model->get_medicineType();
            $data['medicineFor'] = $this->MedicineData_model->get_medicineFor();
            $this->load->view('Header');
            $this->load->view('MedicineData/addMedicine',$data);
            $this->load->view('Footer'); 
        }
        
        public function viewMedicine() {
            $this->load->library('form_validation');
            $this->load->helper('form');
            $this->load->view('Header');
            $data['medicineType'] = $this->MedicineData_model->get_medicineType();
            $data['medicineFor'] = $this->MedicineData_model->get_medicineFor();
            $hs = $this->MedicineData_model->get_by_id_highstock_count(1);
            $ls = $this->MedicineData_model->get_by_id_lowstock_count(2);
            $data['highstockgraphinfo'] = $this->highStockGraph($hs->quantity);
            $data['lowstockgraphinfo'] = $this->lowStockGraph($ls->quantity);
            $this->load->view('MedicineData/medicine_view',$data);
            $this->load->view('Footer'); 
        }
        
        public function addNewMedicine() {
            $data = array(
                    'med_name'=>$this->input->post('medicine_name'),
                    'med_generic_name'=>$this->input->post('medicine_gen_name'),
                    'med_type'=>$this->input->post('med_type'),
                    'medicine_for'=>$this->input->post('med_for'),
                    'med_manufacturer'=>$this->input->post('med_menufacturer'),
                    'med_quantity'=>$this->input->post('med_quantity'),
                );
            $this->MedicineData_model->insert_medicineData($data);
            $data['message'] = "Medicine Details Are Successfully Saved";
            $this->load->view('MedicineData/addMedicine',$data);
        }
        
        public function ajax_list()
    {
        $list = $this->MedicineData_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $medicine) {
            $no++;
            $row = array();
            $row[] = $medicine->med_name;
            $row[] = $medicine->med_generic_name;
            $row[] = $medicine->med_type;
            $row[] = $medicine->medicine_for;
            $row[] = $medicine->med_manufacturer;
            $row[] = $medicine->med_quantity;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_medicine('."'".$medicine->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_medicine('."'".$medicine->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->MedicineData_model->count_all(),
                        "recordsFiltered" => $this->MedicineData_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function medicine_edit($id)
    {
        $data = $this->MedicineData_model->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
    
    public function updateMedicine()
    {
        //$this->_validate();
        $data = array(
            'med_name' => $this->input->post('medicine_name'),
            'med_generic_name' => $this->input->post('medicine_gen_name'),
            'med_type' => $this->input->post('med_type'),
            'medicine_for' => $this->input->post('med_for'),
            'med_manufacturer' => $this->input->post('med_menufacturer'),
            'med_quantity' => $this->input->post('med_quantity'),
        );
        $this->MedicineData_model->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function medicine_delete($id)
    {
        $this->MedicineData_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
    
    public function checkName() {
        $medName = $this->input->post('medicine_name');
        $isMedNameCount = $this->MedicineData_model->isNameAlreadyExists($medName);
        if ($isMedNameCount >= 1) {
            //return false;
            echo '"This Name Already Exist. Please enter a different Name"';
        } else {
            echo "true";
        }
    }
    
    public function checkgenName() {
        $medName = $this->input->post('medicine_gen_name');
        $isMedNameCount = $this->MedicineData_model->isGenNameAlreadyExists($medName);
        if ($isMedNameCount >= 1) {
            //return false;
            echo '"This Generic Name Already Exist. Please enter a different Name"';
        } else {
            echo "true";
        }
    }
    public function checkNameEdit() {
        $medName = $this->input->post('medicine_name');
        $isMedNameCount = $this->MedicineData_model->isNameAlreadyExists($medName);
        if ($isMedNameCount > 0) {
            //return false;
            echo '"This Name Already Exist. Please enter a different Name"';
            //echo "true";
        } else {
            echo "true";
            //echo '"This Name Already Exist. Please enter a different Name"';
        }
    }
    
    public function checkgenNameEdit() {
        $medName = $this->input->post('medicine_gen_name');
        $isMedNameCount = $this->MedicineData_model->isGenNameAlreadyExists($medName);
        if ($isMedNameCount == 0) {
            //return false;
            //echo '"This Generic Name Already Exist. Please enter a different Name"';
            echo "true";
        } else {
            //echo "true";
            echo '"This Generic Name Already Exist. Please enter a different Name"';
        }
    }
    
    public function Settings() {
        $this->load->library('form_validation');
        $this->load->helper('form');
//        $data['medicineType'] = $this->MedicineData_model->get_medicineType();
        //$data['medicineFor'] = $this->MedicineData_model->get_medicineFor();
        $data['medicineGraph'] = $this->MedicineData_model->get_medicineGraphSettings();
        $this->load->view('Header');
        //$this->load->view('MedicineData/addMedicine', $data);
        $this->load->view('MedicineData/viewSettings',$data);
        $this->load->view('Footer');
    }
    
    public function getMedicineType() {
        $data['medicineType'] = $this->MedicineData_model->get_medicineType();
        $this->load->view('MedicineData/medicineTypeData',$data);
    }
    
    public function getMedicineFor() {
        $data['medicineFor'] = $this->MedicineData_model->get_medicineFor();
        $this->load->view('MedicineData/medicineForData',$data);
    }
    
    public function addMedicineFor() {
        $data = array(
            'med_for' => $this->input->post('medicine_for'),
        );
        $this->MedicineData_model->insert_medicineFor($data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function addMedicineType() {
        $data = array(
            'med_type' => $this->input->post('medicine_type'),
        );
        $this->MedicineData_model->insert_medicineType($data);
        echo json_encode(array("status" => TRUE));
    }

    public function deleteMedicineType($id)
    {
        $this->MedicineData_model->delete_by_type_id($id);
        echo json_encode(array("status" => TRUE));
    }
    
    public function deleteMedicinefor($id)
    {
        $this->MedicineData_model->delete_by_for_id($id);
        echo json_encode(array("status" => TRUE));
    }
    
    public function editMedicineFor($id)
    {
        $data = $this->MedicineData_model->get_by_id_medicine_for($id);
        echo json_encode($data);
    }
    
    public function updateMedicineFor()
    {
        $data = array(
            'med_for' => $this->input->post('medicine_for_update'),
        );
        $this->MedicineData_model->update_MedicineFor(array('med_id' => $this->input->post('id_for')), $data);
        echo json_encode(array("status" => TRUE));
    }
    
    public function editMedicineType($id)
    {
        $data = $this->MedicineData_model->get_by_id_medicine_type($id);
        echo json_encode($data);
    }
    
    public function updateMedicineType()
    {
        $data = array(
            'med_type' => $this->input->post('medicine_type_update'),
        );
        $this->MedicineData_model->update_MedicineType(array('med_id' => $this->input->post('id_type')), $data);
        echo json_encode(array("status" => TRUE));
    }
    
    function highStockGraph($hcount) {
        $highstockgraphinfo = array();
        $highStockData = $this->MedicineData_model->get_high_stock($hcount);
        $label = '';
        $dataset = "";
        foreach($highStockData as $stock){
            $label.="'".$stock->med_generic_name."',";
            $dataset .= $stock->med_quantity.",";
          }
      $highstockgraphinfo['label'] = rtrim($label, ',');
      $highstockgraphinfo['dataset'] = substr($dataset, 0, -1);
      return $highstockgraphinfo;
    }
    
    function lowStockGraph($lcount) {
        $lowstockgraphinfo = array();
        $lowStockData = $this->MedicineData_model->get_low_stock($lcount);
        $label = '';
        $dataset = "";
        foreach($lowStockData as $stock){
            $label.="'".$stock->med_generic_name."',";
            $dataset .= $stock->med_quantity.",";
          }
      $lowstockgraphinfo['label'] = rtrim($label, ',');
      $lowstockgraphinfo['dataset'] = substr($dataset, 0, -1);
      return $lowstockgraphinfo;
    }
    
    public function getSettingsData() {
        $data['medicineGraph'] = $this->MedicineData_model->get_medicineGraphSettings();
        $this->load->view('MedicineData/medicineTypeData',$data);
    }

    public function editMedicineGraphSettings($id)
    {
        $data = $this->MedicineData_model->get_by_id_medicine_graph_data($id);
        echo json_encode($data);
    }
    
    public function updateMedicineGraphSettings()
    {
        $data = array(
            'quantity' => $this->input->post('medicine_quantity'),
        );
        $this->MedicineData_model->update_MedicineGraph(array('id' => $this->input->post('id_graph')), $data);
        echo json_encode(array("status" => TRUE));
    }
}

