<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Nurse class.
 *
 * @extends CI_Controller
 */
class Leave extends CI_Controller
{

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('nurse_model');
    }

    /**
     * view leave form.
     *
     * @access public
     * @return void
     */
    public function viewLeaveForm() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('header');
        $this->load->view('Doctors/leave');
        $this->load->view('footer');
    }
    /**
     * add leave function.
     *
     * @access public
     * @return void
     */
    public function requestLeave() {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('did', 'Doctor ID', 'required');
        $this->form_validation->set_rules('causeot', 'Leave type', 'required');
        $this->form_validation->set_rules('reason', 'reason', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('header');
            $this->load->view('Doctors/leave');
            $this->load->view('footer');

        }else{

            if($this->input->post('causeot')=='Half Day'){

                   $data=array(
                    'doctor_id'=>$this->input->post('did'),
                    'startdate'=>$this->input->post('dt1'),
                    'leave_type'=>'Half day',
                    'reason'=>$this->input->post('reason')
               );
           }
            else if($this->input->post('causeot')=='Full Day'){

                $data=array(
                    'doctor_id'=>$this->input->post('did'),
                    'startdate'=>$this->input->post('dt2'),
                    'leave_type'=>'Full day',
                    'reason'=>$this->input->post('reason')
                );


            }

            else if($this->input->post('causeot')=='Short Leave'){

                $data=array(
                    'doctor_id'=>$this->input->post('did'),
                    'startdate'=>$this->input->post('dt3'),
                    'enddate'=>$this->input->post('dt4'),
                    'leave_type'=>'Short leave',
                    'reason'=>$this->input->post('reason')
                );


            }
            $this->load->model('Leave_model');
            $result = $this->Leave_model->addLeave($data);

                if($result){
                    $this->load->view('Doctors/leave_success');
                    $this->load->view('header');
                    $this->load->view('Doctors/leave', $data);
                    $this->load->view('footer');
                }
        }



    }

    /**
     * Show the product list screen to the user.
     *
     * @return Response
     */
    public function listView()
    {

        $id = '12345';
        $this->load->model('Leave_model');
       // $number['num'] = $this->Leave_model->get_halfday_leaves($id);
       // $fullDays['fullDay'] = $this->Leave_model->get_halfday_leaves($id);

       /* $number = array(
            'num' => $this->Leave_model->get_halfday_leaves($id),
            'fullDay' => $this->Leave_model->get_halfday_leaves($id),
        );*/

        $data1 = $this->Leave_model->get_halfday_leaves($id);
        $data2 = $this->Leave_model->get_fullDay_leaves($id);
        $data3 = $this->Leave_model->get_short_leaves($id);
        $data4 = $id;

        $this->load->view('header');
        $this->load->view('Doctors/leave_summary',compact('data1', 'data2','data3','data4'));
        $this->load->view('footer');

    }

    /**
     * Return products json list to view
     *
     * @return Response
     */
    public function jsonList( )
    {
        $id = '12345';
        $this->load->model('Leave_model');
        $dat['posts']= $this->Leave_model->get_leaves($id);


            echo $row->id;


       $this->load->view('header');
        $this->load->view('Doctors/leave_summary',$dat);
        $this->load->view('footer');
       // if($dat){
            /*foreach ($dat as $key => $data) {
                $tmp = [];
                array_push($tmp,  $data->id);
                array_push($tmp,  $data->leave_type);
                array_push($tmp,  $data->startdate);
                array_push($tmp,  $data->enddate);
                array_push($tmp,  $data->reason);
                array_push($jsonArr, $tmp);*/

           // }
       // }
        //echo  Response::json(['data'=>$jsonArr]);
    }

    public function get_half_days(){
          $id = '12345';
          $this->load->model('Leave_model');
          echo $this->Leave_model->get_halfday_leaves($id);
    }


}

