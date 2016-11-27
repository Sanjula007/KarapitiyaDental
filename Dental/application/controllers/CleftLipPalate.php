<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CleftLipPalate extends CI_Controller {

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
            $this->load->model('CleftLipPalate_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
        } 
    
        
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public  function viewFormCleftLip($patient_id){
                $patient =$this->CleftLipPalate_model->get_cleftLipData($patient_id);
                if(count($patient)>0){
                    $this->viewPatientsCleftLip($patient_id);
                }else{
                    $data['patient_id'] = $patient_id;
                    $this->load->library('form_validation');
                    $this->load->helper('form');
                    $this->load->view('Header');
                    $this->load->view('CleftLipPalate/FormView',$data);
                    $this->load->view('Footer'); 
                }
	}
        public  function viewForm(){
                
                //$this->load->library('form_validation');
		//$this->load->helper('form');
                $this->load->view('Header2');
		$this->load->view('CleftLipPalate/sample');
		//$this->load->view('Footer');

	}
        
        public function SaveCleftLipPalate() {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">','</div>');
            $this->form_validation->set_rules('medication', 'Medication', 'required|regex_match[/^[a-z .,\-]+$/i]');
            $this->form_validation->set_rules('father', 'Father Name', 'required|regex_match[/^[a-z .,\-]+$/i]');
            $this->form_validation->set_rules('mother', 'Mother Name', 'required|regex_match[/^[a-z .,\-]+$/i]');
            $this->form_validation->set_rules('stissues', 'Soft Tissues', 'regex_match[/^[a-z .,\-]+$/i]');
            $this->form_validation->set_rules('htissues', 'Hard Tissues', 'regex_match[/^[a-z .,\-]+$/i]');
            if ($this->form_validation->run() == FALSE) {
                        $this->load->view('CleftLipPalate/cleftLipForm');
            }
            else{
                echo('yes'); 
                if($_POST['cleftLip'] == 'on')
                {
                    $cl = 1;
                }  else {
                    $cl = 0;
                }
                if($_POST['cleftPlate'] == 'on')
                {
                    $cp = 1;
                }  else {
                    $cp = 0;
                }
                if($_POST['unliateral'] == 'on')
                {
                    $ul = 1;
                }  else {
                    $ul = 0;
                }
                if($_POST['bilateral'] == 'on')
                {
                    $bl = 1;
                }  else {
                    $bl = 0;
                }
                if($_POST['allergy'] == 'on')
                {
                    $al = 1;
                }  else {
                    $al = 0;
                }
                if($_POST['bleeding'] == 'on')
                {
                    $blg = 1;
                }  else {
                    $blg = 0;
                }
                if($_POST['cvs'] == 'on')
                {
                    $cvs = 1;
                }  else {
                    $cvs = 0;
                }if($_POST['diabetes'] == 'on')
                {
                    $db = 1;
                }  else {
                    $db = 0;
                }if($_POST['others'] == 'on')
                {
                    $ot = 1;
                }  else {
                    $ot = 0;
                }if($_POST['nightFeeding'] == 'on')
                {
                    $nf = 1;
                }  else {
                    $nf = 0;
                }if($_POST['inBrushing'] == 'on')
                {
                    $ib = 1;
                }  else {
                    $ib = 0;
                }if($_POST['highSugarTake'] == 'on')
                {
                    $hst = 1;
                }  else {
                    $hst = 0;
                }
                
                
                
                $data = array(
                    'ref_patient_id' => $this->input->post('patient_id'),
                    'date_recorded' => date("Y-m-d H:i:s"),
                    'cleftLip'=>$cl,
                    'cleftPlate'=>$cp,
                    'unliateral'=>$ul,
                    'bilateral'=>$bl,
                    'allergy'=>$al,
                    'bleeding'=>$blg,
                    'cvs'=>$cvs,
                    'diabetes'=>$db,
                    'others'=>$ot,
                    'medication'=>$this->input->post('medication'),
                    'nightFeeding'=>$nf,
                    'inBrushing'=>$ib,
                    'highSugarTake'=>$hst,
                    'father'=>$this->input->post('father'),
                    'mother'=>$this->input->post('mother'),
                    'stissues'=>$this->input->post('stissues'),
                    'htissues'=>$this->input->post('htissues'),
                );
                
                $this->CleftLipPalate_model->insert_cleftlippalate($data);
                $data['message'] = "Patient Cleft Lip Palate Details Are Successfully Saved";
                $this->load->view('CleftLipPalate/cleftLipForm',$data);
            }
        }
        
        public function SaveCleftLipInvestigation() 
        {

            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('investigation', 'Investigation Details', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('CleftLipPalate/investForm');
            }
            else{
                $data = array(
                    'ref_patient_id' => $this->input->post('patient_id'),
                    'date_recorded' => date("Y-m-d H:i:s"),
                    'investigation' => $this->input->post('investigation')
                );
                $this->CleftLipPalate_model->insert_cleftlippalateinvestigation($data);
                $data['message'] = "Patient Investigation Details Are Successfully Saved";
                $this->load->view('CleftLipPalate/investForm',$data);
            }
        }
        
        public function SaveCleftLipDiagnosis() 
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('diagnosis', 'Diagnosis Details', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('CleftLipPalate/diagnoseForm');
            }
            else{
                $data = array(
                    'ref_patient_id' => $this->input->post('patient_id'),
                    'recorded_date' => date("Y-m-d H:i:s"),
                    'diagnosis' => $this->input->post('diagnosis')
                );
                $this->CleftLipPalate_model->insert_cleftlippalatediagnosis($data);
                $data['message'] = "Patient Diagnosis Details Are Successfully Saved";
                $this->load->view('CleftLipPalate/diagnoseForm',$data);
            }
        }
        
        public function saveCleftLipTreatmentPlan()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('treatplan', 'Treatment Plan Details', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('CleftLipPalate/tratmentPlanForm');
            }
            else{
                $data = array(
                    'ref_patient_id' => $this->input->post('patient_id'),
                    'recorded_date' => date("Y-m-d H:i:s"),
                    'treat_plan' => $this->input->post('treatplan')
                );
                $this->CleftLipPalate_model->insert_cleftlippalatetreatmentplan($data);
                $data['message'] = "Patient Treatment Plan Details Are Successfully Saved";
                $this->load->view('CleftLipPalate/tratmentPlanForm',$data);
            }
        }
        
        public function saveCleftLipTeethPresent() {
            $data = array(
                'ref_patient_id' => $this->input->post('patient_id'),
                'date_recorded' => date("Y-m-d H:i:s"),
                'enamel_up'=> $this->input->post('enamelup'),
                'enamel_down'=> $this->input->post('enameldown'),
                'dentinal_up'=> $this->input->post('dentinalup'),
                'dentinal_down'=> $this->input->post('dentinaldown'),
                'pulp_exposed_up'=> $this->input->post('pulpup'),
                'pulp_exposed_down'=> $this->input->post('pulpdown'),
                'grossly_up'=> $this->input->post('brokencrwnup'),
                'grossly_down'=> $this->input->post('brokencrwndown'),
                'septic_root_up'=> $this->input->post('srootup'),
                'septic_root_down'=> $this->input->post('srootdown'),
                'missing_teeth_up'=> $this->input->post('mteethup'),
                'missing_teeth_down'=> $this->input->post('mteethdown'),
                'dev_anamolies_up'=> $this->input->post('devanaup'),
                'dev_anamolies_down'=> $this->input->post('devanadown'),
                'plaque_up'=> $this->input->post('plaqueup'),
                'plaque_down'=> $this->input->post('plaquedown'),
                'calculi_up'=> $this->input->post('calculiup'),
                'calculi_down'=> $this->input->post('calculidown'),
                'gingiva_up'=> $this->input->post('gingivaup'),
                'gingiva_down'=> $this->input->post('gingivadown'),
            );
            $this->CleftLipPalate_model->insert_cleftlippalateteethpresent($data);
        }

    public  function viewPatientsCleftLip($id){

        //$id = 14;
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->view('Header');
        $data['cleftlipdata'] = $this->CleftLipPalate_model->get_cleftLipData($id);
        $data['investigation'] = $this->CleftLipPalate_model->get_cleftLipDataInvestigation($id);
        $data['diagnosis'] = $this->CleftLipPalate_model->get_cleftLipDataDiagnosis($id);
        $data['treatmentplan'] = $this->CleftLipPalate_model->get_cleftLipDataTreatmentPlan($id);
        $data['teethpresent'] = $this->CleftLipPalate_model->get_cleftLipDataTeethPresent($id);
        $this->load->view('CleftLipPalate/viewPatientCleftLipData',$data);
        $this->load->view('Footer');

    }
    
    public function UpdateCleftLipPalate() {
        $id = $this->input->post('rec_id');
        if($_POST['cleftLip'] == 'on')
                {
                    $cl = 1;
                }  else {
                    $cl = 0;
                }
                if($_POST['cleftPlate'] == 'on')
                {
                    $cp = 1;
                }  else {
                    $cp = 0;
                }
                if($_POST['unliateral'] == 'on')
                {
                    $ul = 1;
                }  else {
                    $ul = 0;
                }
                if($_POST['bilateral'] == 'on')
                {
                    $bl = 1;
                }  else {
                    $bl = 0;
                }
                if($_POST['allergy'] == 'on')
                {
                    $al = 1;
                }  else {
                    $al = 0;
                }
                if($_POST['bleeding'] == 'on')
                {
                    $blg = 1;
                }  else {
                    $blg = 0;
                }
                if($_POST['cvs'] == 'on')
                {
                    $cvs = 1;
                }  else {
                    $cvs = 0;
                }if($_POST['diabetes'] == 'on')
                {
                    $db = 1;
                }  else {
                    $db = 0;
                }if($_POST['others'] == 'on')
                {
                    $ot = 1;
                }  else {
                    $ot = 0;
                }if($_POST['nightFeeding'] == 'on')
                {
                    $nf = 1;
                }  else {
                    $nf = 0;
                }if($_POST['inBrushing'] == 'on')
                {
                    $ib = 1;
                }  else {
                    $ib = 0;
                }if($_POST['highSugarTake'] == 'on')
                {
                    $hst = 1;
                }  else {
                    $hst = 0;
                }
                
                
                
                $data = array(
                    'ref_patient_id' => $this->input->post('ref_patient_id'),
                    'date_recorded' => date("Y-m-d H:i:s"),
                    'cleftLip'=>$cl,
                    'cleftPlate'=>$cp,
                    'unliateral'=>$ul,
                    'bilateral'=>$bl,
                    'allergy'=>$al,
                    'bleeding'=>$blg,
                    'cvs'=>$cvs,
                    'diabetes'=>$db,
                    'others'=>$ot,
                    'medication'=>$this->input->post('medication'),
                    'nightFeeding'=>$nf,
                    'inBrushing'=>$ib,
                    'highSugarTake'=>$hst,
                    'father'=>$this->input->post('father'),
                    'mother'=>$this->input->post('mother'),
                    'stissues'=>$this->input->post('stissues'),
                    'htissues'=>$this->input->post('htissues'),
                );
                
                $this->CleftLipPalate_model->update_cleftlippalate($id,$data);
                $data['message'] = "Patient Cleft Lip Palate Details Are Successfully Saved";
                $this->load->view('CleftLipPalate/cleftLipForm',$data);
    }
    
    public function UpdateCleftLipInvestigation() {
        $i_id = $this->input->post('rec_invest');
        $data = array(
            'ref_patient_id'=>$this->input->post('ref_patient_id'),
            'date_recorded'=>date("Y-m-d H:i:s"),
            'investigation'=>$this->input->post('update_investigation'),
        );
        $this->CleftLipPalate_model->update_cleftlippalateinvestigation($i_id,$data);
        $data['message'] = "Patient Cleft Lip Palate Details Are Successfully Saved";
        $this->load->view('CleftLipPalate/cleftLipForm',$data);
    }
    
    public function UpdateCleftLipDiagnosis() {
        $d_id = $this->input->post('rec_diagnose');
        $data = array(
            'ref_patient_id'=>$this->input->post('ref_patient_id'),
            'recorded_date'=>date("Y-m-d H:i:s"),
            'diagnosis'=>$this->input->post('update_diagnosis'),
        );
        $this->CleftLipPalate_model->update_cleftlippalatediagnosis($d_id,$data);
        $data['message'] = "Patient Cleft Lip Palate Details Are Successfully Saved";
        $this->load->view('CleftLipPalate/cleftLipForm',$data);
    }
    
    public function UpdateCleftLipTreatmentPlan() {
        $t_id = $this->input->post('rec_treatplan');
        $data = array(
            'ref_patient_id'=>$this->input->post('ref_patient_id'),
            'recorded_date'=>date("Y-m-d H:i:s"),
            'treat_plan'=>$this->input->post('update_treat_plan'),
        );
        $this->CleftLipPalate_model->update_cleftlippalatetreatmentplan($t_id,$data);
        $data['message'] = "Patient Cleft Lip Palate Details Are Successfully Saved";
        $this->load->view('CleftLipPalate/cleftLipForm',$data);
    }
    
    
    public function UpdateCleftLipTeethPresent() {
        $id = $this->input->post('recTeethPresent_id');
        $data = array(
            'ref_patient_id'=>$this->input->post('ref_patient_id'),
            'date_recorded'=>date("Y-m-d H:i:s"),
            'enamel_up'=> $this->input->post('enamelup'),
                'enamel_down'=> $this->input->post('enameldown'),
                'dentinal_up'=> $this->input->post('dentinalup'),
                'dentinal_down'=> $this->input->post('dentinaldown'),
                'pulp_exposed_up'=> $this->input->post('pulpup'),
                'pulp_exposed_down'=> $this->input->post('pulpdown'),
                'grossly_up'=> $this->input->post('brokencrwnup'),
                'grossly_down'=> $this->input->post('brokencrwndown'),
                'septic_root_up'=> $this->input->post('srootup'),
                'septic_root_down'=> $this->input->post('srootdown'),
                'missing_teeth_up'=> $this->input->post('mteethup'),
                'missing_teeth_down'=> $this->input->post('mteethdown'),
                'dev_anamolies_up'=> $this->input->post('devanaup'),
                'dev_anamolies_down'=> $this->input->post('devanadown'),
                'plaque_up'=> $this->input->post('plaqueup'),
                'plaque_down'=> $this->input->post('plaquedown'),
                'calculi_up'=> $this->input->post('calculiup'),
                'calculi_down'=> $this->input->post('calculidown'),
                'gingiva_up'=> $this->input->post('gingivaup'),
                'gingiva_down'=> $this->input->post('gingivadown'),
        );
        $this->CleftLipPalate_model->update_cleftlippalateteethpresent($id,$data);
        $data['message'] = "Patient Cleft Lip Palate Details Are Successfully Saved";
        $this->load->view('CleftLipPalate/cleftLipForm',$data);
    }
    
    public function viweAllCleftLipPatients() {
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->view('Header');
        $this->load->view('CleftLipPalate/cleftlipAllPatients');
        $this->load->view('Footer');
    }
    
    public function ajax_list()
    {
        $list = $this->CleftLipPalate_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $patientDetails) {
            $no++;
            $row = array();
            $row[] = $patientDetails->ref_patient_id;
            $row[] = $patientDetails->fname;
            $row[] = $patientDetails->lname;
            $row[] = $patientDetails->address;
            $row[] = $patientDetails->gender;
            $row[] = $patientDetails->date_recorded;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="View" onclick="view_patientCleftLip('."'".$patientDetails->ref_patient_id."'".')"><i class="glyphicon glyphicon-check"></i></a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_patientCleftLip('."'".$patientDetails->ref_patient_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->CleftLipPalate_model->count_all(),
                        "recordsFiltered" => $this->CleftLipPalate_model->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
    
    public function cleftlipPatientDelete($id)
    {
        $this->CleftLipPalate_model->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

}
