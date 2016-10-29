<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipment extends CI_Controller {

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
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('Header');
		$this->load->view('Stock/All_stock');
		//$this->load->view('Footer');
	}

	public function new_item(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('Equipment_model');
		$data['cat']=$this->Equipment_model->categories();
		$this->load->view('Header');
		$this->load->view('Stock/New_item',$data);
		$this->load->view('Footer');
	}

	public function add(){
		$this->load->database();
			
		$data=array('success'=>false,'messages'=>array());
		$this->load->helper('form');
		$this->load->library("form_validation");
		
		$this->form_validation->set_rules('description','description','max_length[500]');
		$this->form_validation->set_rules('model','Model','required');
		$this->form_validation->set_rules('name','Item name','required|max_length[100]');
		$this->form_validation->set_rules('qnt','Quentity','required|integer');
		$this->form_validation->set_rules('category','Category','required');

		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

		
		if ($this->form_validation->run() == FALSE) {
			//print_r($_POST);
			foreach($_POST as $key =>$value){
				$data['messages'][$key]=form_error($key);
			}
		}
		else{

			$senddata = array(
				'name'=>$this->input->post('name'),
				'category_id'=>$this->input->post('category'),
				'model'=>$this->input->post('model'), 
				'qut'=>$this->input->post('qnt'), 
				'description' =>$this->input->post('description')
				  );

			$this->load->model('Equipment_model');
			$eq_id=$this->Equipment_model->insert_equipment($senddata);
			if($eq_id>=0){
				$logdata = array(
					'eq_id' => $eq_id,
					'description'=>'Item added',
					'qnt'=>$this->input->post('qnt'), 
					'date'=>date('Y-m-d')
				 );
				$this->Equipment_model->insert_equipment_log($logdata);
			}

        	
			$data['success']=true;

		}

		echo json_encode($data);


	}
}
