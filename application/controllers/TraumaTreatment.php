<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TraumaTreatment extends CI_Controller {

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
		$this->load->view('welcome_message');
	}
	
	/*
		*view from2
		*Dental TraumaAssessment Form
	*/
	public function form(){
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		
		
		$this->load->view('Header');
		$this->load->view('Patient/Form2/page1');
		$this->load->view('Footer');

	}
	public function formpage2(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('pid', 'Patient ID', 'required');
		$this->form_validation->set_rules('dot', 'Date of Trauma', 'required|max_length[50]');
		$this->form_validation->set_rules('tot', 'Time of Trauma', 'required');
		
		$this->form_validation->set_rules('causeot', 'cause of trauma', 'required');
		$this->form_validation->set_rules('othercause', 'cause of trauma', 'callback_check_other_cause');
		$this->form_validation->set_rules('causeoth', 'cause of trauma', 'callback_check_morterbike');
		$this->form_validation->set_rules('causeotsb', 'cause of trauma', 'callback_check_vehicle');
		
		$this->form_validation->set_rules('causeotdb', 'cause of trauma', 'required');
		
		$this->form_validation->set_rules('healthy', 'Healthy', 'required');
		$this->form_validation->set_rules('drug', 'Durg Allergies', 'required');
		$this->form_validation->set_rules('smoking', 'smoking status', 'required');
		
		$this->form_validation->set_rules('txthealthy', 'Healthy', 'callback_check_healthy');
		$this->form_validation->set_rules('txtda', 'Durg Allergies', 'callback_check_allergies');
		$this->form_validation->set_rules('smokingamt', 'smoking status', 'callback_check_smoking');
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->form();
		
		
		}else{
			$causedetails='';
			if($this->input->post('causeot')=='other'){
				$causedetails=$this->input->post('othercause');
				
			}else if($this->input->post('causeot')=='RTA:Motor bike'){
				$causedetails=$this->input->post('causeoth');
				
			}else if($this->input->post('causeot')=='RTA:Other vehicles'){
				$causedetails=$this->input->post('causeotsb');
				
			}
			$pieces = explode("p",$this->input->post('pid'));
			$id= intval($pieces[1]);
			$tdata=array(
				'pid'=>$id, 
				'tdate'=>$this->input->post('dot'), 
				'ttime'=>$this->input->post('tot'), 
				'cause'=>$this->input->post('causeot'), 
				'cause_details'=>$causedetails, 
				'date'=>date('Y-m-d'), 
				'bd'=>$this->input->post('causeotdb')
			);
			$mdata=array(
				'pid'=>$id, 
				'healthy'=>$this->input->post('healthy'),
				'healthy_details'=>$this->input->post('txthealthy'),
				'allergies'=>$this->input->post('drug'),
				'allergies_details'=>$this->input->post('txtda'), 
				'smoking'=>$this->input->post('smoking'), 
				'smoking_number'=>$this->input->post('smokingamt')
			);
			$this->load->model('Trauma_model');
			$this->Trauma_model->insert_trauma($tdata);
			$this->Trauma_model->insert_medical_trauma($mdata);
			
			$senddata['pid']=$this->input->post('pid');
			$this->load->view('Header');
			$this->load->view('Patient/Form2/page2',$senddata);
			$this->load->view('Footer');
			
		}
		
		
		
	}
	
	public  function check_healthy($value){

		if($this->input->post('healthy')=='no'&&$value==''){
			
			$this->form_validation->set_message('check_healthy', 'Please enter the why petient not healthy' );
		
			return false;
		}
		
		return true;
	
	}
	public  function check_smoking($value){

		if($this->input->post('smoking')=='yes'&&$value==''){
			
			$this->form_validation->set_message('check_smoking', 'Please enter the number of smokings per day' );
		
			return false;
		}
		
		return true;
	
	}
	public  function check_other_cause($value){

		if($this->input->post('causeot')=='other'&&$value==''){
			
			$this->form_validation->set_message('check_other_cause', 'Please enter the cause' );
		
			return false;
		}
		
		return true;
	
	}
	public  function check_allergies($value){
		
		if($this->input->post('drug')=='yes'&&$value==''){
			
			$this->form_validation->set_message('check_allergies', 'Plaese enter the Allergies' );
		
			return false;
		}
		
		return true;
	
	}
	public  function check_morterbike($value){
		
		if($this->input->post('causeot')=='RTA:Motor bike'&&$value==''){
			
			$this->form_validation->set_message('check_morterbike', 'Plaese select the Helmet worn' );
		
			return false;
		}
		
		return true;
	
	}
	public  function check_vehicle($value){
		
		if($this->input->post('causeot')=='RTA:Other vehicles'&&$value==''){
			
			$this->form_validation->set_message('check_vehicle', 'Plaese select the seat belt worn' );
		
			return false;
		}
		
		return true;
	
	}
	
}
