<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PatientA extends CI_Controller {



	public function getpatient(){
		
		$this->load->model('Ajax_select_where_model','Ajax');
		$select=' id, title, fname, lname, address, email, phone, gender, dob, regdatetime';
		$table1 ='patient';
		$where='id=id';
		$column_order =array(' id','CONCAT(fnamelname)', 'address', 'email', 'phone',' gender', 'dob', 'regdatetime'); 
		$column_search=array(' id','CONCAT(fname,lname)', 'address', 'email', 'phone', 'gender', 'dob', 'regdatetime'); ;
		$order=array('regdatetime'=>'desc');
		
		$list = $this->Ajax->get_datatables($table1,$select,$where,$column_order,$column_search,$order);
        $data = array();
       $no=0;
	 
	  // print_r($list);
        foreach ($list as $patient) {
            //$no++;
            $row = array();
            
            $row[] = $patient->id;
            $row[] = $patient->title.'.'.$patient->fname.' '.$patient->lname;
			$row[] = $patient->address;
			$row[] = $patient->email;
			$row[] = $patient->phone;  
			$row[] = $patient->dob;  			
			$row[] = $patient->regdatetime;  			
			
			
			
											
			
			
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Ajax->count_all($table1,$select,$where,$column_order,$column_search,$order),
                        "recordsFiltered" => $this->Ajax->count_filtered($table1,$select,$where,$column_order,$column_search,$order),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
		
	}
	

	




}