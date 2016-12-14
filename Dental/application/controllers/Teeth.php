<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teeth extends CI_Controller{

	public function index(){
		$this->load->view('Header');
		$this->load->view('graph');
		$this->load->view('Footer');
	}

	public function patient_id(){
		$data=$this->input->post();
		print_r($data);
	}


}