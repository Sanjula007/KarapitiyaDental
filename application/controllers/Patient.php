<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

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
		*view registration from
		*
	*/
	public  function registration(){
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		
		
		$this->load->view('Header');
		$this->load->view('Patient/Registration');
		$this->load->view('Footer');
		
	}
	/*
		*validate registration from
		*
	*/
	public function treatment(){
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('firstname', 'First Name', 'required|max_length[50]|alpha');
		$this->form_validation->set_rules('lastname', ' Last Name', 'required|max_length[50]|alpha');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|max_length[50]');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('occupation', 'Occupation', 'required|max_length[30]');
		$this->form_validation->set_rules('phone', 'Phone number', 'required|max_length[10]');
		$this->form_validation->set_rules('address', 'Address', 'required|max_length[100]');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->registration();
		
		
		} 
		else{
			
			$data= array(
				'fname'=>$this->input->post('firstname'),
				'lname'=>$this->input->post('lastname'),
				'title'=>$this->input->post('title'),
				'dob'=>$this->input->post('dob'),
				'gender'=>$this->input->post('gender'),
				'occupation'=>$this->input->post('occupation'),
				'address'=>$this->input->post('address'),
				'email'=>$this->input->post('email'),
				'phone'=>$this->input->post('phone')
			);
			
			$this->load->model('patient_model');
			$id=$this->patient_model->insert_patient($data);
			//$showid='P';
			$id=str_pad($id, 6, '0', STR_PAD_LEFT);
			echo 'P'.$id;
			//echo $id;
		
		}
		
		
	}
	

	public function periodicalExaminationChart(){

		$this->load->helper('url');
		$this->load->view('Header');
		$this->load->view('Patient/periodical_exam');
		$this->load->view('Footer');
		$this->load->model('patient_model');

		 $form_data = $this->input->post();
		 $data = array(
		 'tooth' =>	$this->input->post('form_tooth'),
		 'jaw'	=> $this->input->post("form_jaw"),
		 'vitality' => $this->input->post("form_vitality"),
		 'recesson'  => $this->input->post("form_recesson"),
		 'fucation'  =>$this->input->post("form_fucation"),
 		 'mobility'  =>$this->input->post("form_mobility"),	
		 'pocketDepth'  => $this->input->post("form_pocketDepth")
		 );

		 $this->patient_model->save_pExamChart($data);
	}


	public function viewperiodical_exam(){


		$data   = array();
		$this->load->model('patient_model');
		$data['patient'] = $this->patient_model->getPeriodicalChart();

		$this->load->view('Header');
		$this->load->view('Patient/viewperiodical_exam',$data);
		$this->load->view('Footer');


	}


	public function viewPatientList(){

		$data   = array();

		$this->load->model('patient_model');
		$data['result'] = $this->patient_model->getPatientAlldetails();

		$this->load->helper('url');
		$this->load->view('Header');
		$this->load->view('Patient/patientsList',$data);
		$this->load->view('Footer');
	}

	public function test(){

		$this->load->helper('url');
		$this->load->view('Header');
		$this->load->view('Patient/examination_chart');
		$this->load->view('Footer');

	}
	


	public function viewDetails(){

		 $this->load->helper('url');
		$pid = $this->uri->segment(3);
		$data   = array();
		
		$this->load->model('patient_model');
		$data['patient']=$this->patient_model->getselectedPatientDetails($pid);

			$this->load->view('Header');
			$this->load->view('Patient/viewDetails',$data);
			$this->load->view('Footer');
		


	}
	
	
	public function ajaxPatientDetails(){
		
		$this->load->model('patient_model');
		$data['patient']=$this->patient_model->getpatientdetails($this->input->post('postid'));
		//echo $this->input->post('postid');
		if(count($data['patient'])==1){
			$this->load->view('Patient/Form2/patient_details',$data);
		}
		else{
			echo '<label > <span style="color:#d9534f;">No result found</span></label>';
		}
		
	}
	
	
	

}
