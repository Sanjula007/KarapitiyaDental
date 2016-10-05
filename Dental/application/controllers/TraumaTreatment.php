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

	public function trauma_profile($id){

		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->load->view('Header');
		$this->load->model('patient_model');
		$this->load->model('Trauma_model');
		$data['patient']=$this->patient_model->getpatientdetails($id);
		$data['trauma_details']=$this->Trauma_model->trauma_details($id);
		$data['trauma_medical_details']=$this->Trauma_model->trauma_medical_details($id);
		$data['trauma_teeth_details']=$this->Trauma_model->trauma_teeth_details($id);
		$data['trauma_examination']=$this->Trauma_model->trauma_examination($id);

		$this->load->view('Patient/t_profile',$data);
		$this->load->view('Footer');


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

	/*
		*view from2 page 2
		*validate the page 1
		*Dental TraumaAssessment Form
	*/
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
			
			$_SESSION['pid']=$this->input->post('pid');
			$this->viewpage2();
		}
	}
	/*
		*view from2 page 2
		
		*Dental TraumaAssessment Form
	*/
	public function viewpage2(){
			$senddata['pid']=$_SESSION['pid'];
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->load->view('Header');
			$this->load->view('Patient/Form2/page2',$senddata);
			$this->load->view('Footer');
	}
	/*
		*view from2 page 3
		*validate the page 2
		*Dental TraumaAssessment Form
	*/
	public function formpage3(){
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		$this->form_validation->set_rules('pid', 'Patient ID', 'required');
		$this->form_validation->set_rules('avulsedteeeth', 'Avulsed Teeth', 'required');
		$this->form_validation->set_rules('foundteeth', 'teeth found', 'required');
		$this->form_validation->set_rules('drityteeth', 'drity teeth', 'required');
		$this->form_validation->set_rules('storagemedium', 'Storage medium', 'required');
		$this->form_validation->set_rules('drytimehrs', 'Extra oral dry time', 'required');
		$this->form_validation->set_rules('drytimemin', 'Extra oral dry time', 'required');
		$this->form_validation->set_rules('replanted', 'replanted', 'required');
		$this->form_validation->set_rules('imagediscription', 'Face Description', 'required');
		$this->form_validation->set_rules('oralhygiene', 'oral hygiene', 'required');
		$this->form_validation->set_rules('periodontald', 'Actice periodontal disease', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->viewpage2();
		
		
		}else{
			$pieces = explode("p",$this->input->post('pid'));
			$id= intval($pieces[1]);
			$config['upload_path']          = './uploads/patientimages/';
            $config['allowed_types']        = '*';
            $config['file_name']             = 'face'.$id;
            $config['overwrite']            = true;
            // $config['max_height']           = 768;
            print_r($_FILES);
            $this->load->library('upload', $config);
			
			$data= array(
				'pid'=>$id, 
				'ateeth'=>$this->input->post('avulsedteeeth'),
				'found'=>$this->input->post('foundteeth'), 
				'smedium'=>$this->input->post('storagemedium'),
				'dirty'=>$this->input->post('drityteeth'), 
				'drytime'=>$this->input->post('drytimehrs').':'.$this->input->post('drytimemin'), 
				'repanted'=>$this->input->post('replanted'), 
				'image'=>$this->input->post('file'), 
				'imgdescription'=>$this->input->post('imagediscription'),
				'oralhygiene'=>$this->input->post('oralhygiene'), 
				'apdisease'=>$this->input->post('periodontald'), 
				'teeth'=>$this->input->post('teeth'), 
				'madication'=>$this->input->post('Medications')
			);
			if ( ! $this->upload->do_upload('pic')){
            		//$senddata['extrafile']='none';
            }
            else{
            	$datafile = array('pic' => $this->upload->data());
            	$data['pic'] = $datafile['pic']['orig_name'] ;
            }

			$this->load->model('Trauma_model');
			$this->Trauma_model->insert_trauma_teeth($data);
			
			$this-> viewpage3();
		}
		
	}

	public function vaildatepage3(){
				$this->load->library('form_validation');
		$this->load->helper('form');
		$data=array('success'=>false,'messages'=>array());

		$this->form_validation->set_rules('pid', 'Patient ID', 'required');
		$this->form_validation->set_rules('plan', 'Plan', 'required|max_length[200]');
		$this->form_validation->set_rules('finding', 'Finding', 'required|max_length[200]');
		$this->form_validation->set_rules('diagnosis', 'Diagnosis', 'required|max_length[200]');
		//$this->form_validation->set_rules('prognosis', 'Prognosis', 'required');
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
		if ($this->form_validation->run() == FALSE) {
			//print_r($_POST);
			foreach($_POST as $key =>$value){
				$data['messages'][$key]=form_error($key);
		}
		}
		else{	
			$pieces = explode("p",$this->input->post('pid'));
			$id= intval($pieces[1]);
			$config['upload_path']          = './uploads/patientimages/';
            $config['allowed_types']        = '*';
            $config['file_name']             = 'truamaxray'.$id;
            $config['overwrite']            = true;
            // $config['max_height']           = 768;
            //print_r($_FILES);
            $this->load->library('upload', $config);

			$teeth=	explode(",",$this->input->post('teeth'));
			//print_r($teeth);
			//echo $this->input->post('xrayissues');
			$senddata=array(
					'pid'=>$id, 
					'xrayiamge'=>$this->input->post('pid'),
					'finding'=>$this->input->post('finding'),
					'diagnosis'=>$this->input->post('diagnosis'),
					'prognosis'=>$this->input->post('prognosis'),
					'plan'=>$this->input->post('plan'),
					'xrayissues'=>implode(",",$this->input->post('xrayissues')),
					't11'=>$teeth[4],
					't12'=>$teeth[3],
					't13'=>$teeth[2], 
					't14'=>$teeth[1], 
					't15'=>$teeth[0], 
					't21'=>$teeth[5], 
					't22'=>$teeth[6], 
					't23'=>$teeth[7], 
					't24'=>$teeth[8], 
					't25'=>$teeth[9], 
					't31'=>$teeth[15], 
					't32'=>$teeth[16], 
					't33'=>$teeth[17], 
					't34'=>$teeth[18], 
					't35'=>$teeth[19], 
					't41'=>$teeth[14], 
					't42'=>$teeth[13], 
					't43'=>$teeth[12], 
					't44'=>$teeth[11], 
					't45'=>$teeth[10]
				);
			if ( ! $this->upload->do_upload('pic')){
            		//$senddata['extrafile']='none';
            }
            else{
            	$datafile = array('pic' => $this->upload->data());
            	$senddata['xrayiamge'] = $datafile['pic']['orig_name'] ;
            }
			//print_r($senddata);
			$data['success']=true;
			$this->load->model('Trauma_model');
			$send=$this->Trauma_model->insert_trauma_teeth_xray($senddata);
			if($send=='-1'){$data['success']=false;}
		}

		echo json_encode($data);


	}

	public function update(){
		
		
	}
	

	public function viewpage3(){

		$senddata['pid']=$_SESSION['pid'];
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->view('Header');
		$this->load->view('Patient/Form2/page3',$senddata);
		$this->load->view('Footer');
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
