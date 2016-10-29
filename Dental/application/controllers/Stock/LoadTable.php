<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoadTable extends CI_Controller {



	public function getall(){
		
		$this->load->model('Ajax_select_where_model','Ajax');
		$select='ec.category,e.id, e.name, e.model, e.qut,e.description ';
		$table1 ='equipment e ,equipment_category ec';
		$where='ec.id= e.category_id and e.active=1';
		$column_order =array(' e.id','e.name', 'e.model', 'ec.category', 'e.qut','e.description'); 
		$column_order =array(' e.id','e.name', 'e.model', 'ec.category', 'e.qut','e.description'); 
		$column_search=array(' e.id','e.name', 'e.model', 'ec.category', 'e.qut','e.description'); ;
		$order=array('e.id'=>'desc');
		
		$list = $this->Ajax->get_datatables($table1,$select,$where,$column_order,$column_search,$order);
        $data = array();
       $no=0;
	 
	  // print_r($list);
        foreach ($list as $stock) {
            //$no++;
            $row = array();
            
            $row[] = $stock->id;
			$row[] = $stock->name;
			$row[] = $stock->model;
			$row[] = $stock->category;  
			$row[] = $stock->qut;  			
			$row[] = $stock->description;  			
			$row[] = '<a target="_blank" class="btn btn-success btn_block" href="'.base_url('index.php/Stock/Equipment/item/'). $stock->id.'">View</a>';  			
				
			
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