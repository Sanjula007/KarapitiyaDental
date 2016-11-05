<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restorative extends CI_Controller {

    public function history(){
    	$this->load->view('Header');
    	$this->load->view('Restorative/history');
    	$this->load->view('Footer');
    }

    public function saveHistory(){
    
    	$data = array(
            'pid'=>'1',
            'complaint'=>$this->input->get('complaint'),
            'hoc'=> $this->input->get('hoc'),
            'pmh'=>$this->input->get('pmh'),
            'allergy'=>$this->input->get('allergy'),
            'medications'=>$this->input->get('medication'),
            'pdh'=>$this->input->get('pdh'),
            'habbit'=>$this->input->get('habit'),
        );

        $this->load->model('Restorative_model');
        $id=$this->Restorative_model->insert_history($data);

    }

    public function examination(){
        $this->load->view('Header');
        $this->load->view('Restorative/examination');
        $this->load->view('Footer');
    }

    public function saveExamination(){
        $data = array(
            'pid'=>'1',
            'general'=>$this->input->get('general'),
            'extra'=>$this->input->get('extraOral'),
            'intra'=> $this->input->get('intraOral'),
            'mucosa'=>$this->input->get('oralMucosa'),
            'gingiva'=>$this->input->get('gingiva'),
            'palaque_index'=>$this->input->get('plaqueIndex'),
            'nor'=>$this->input->get('nor'),
        );

        $this->load->model('Restorative_model');
        $id=$this->Restorative_model->insert_examination($data);
    }

}
