<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * Nurse class.
     *
     * @extends CI_Controller
     */
    class Settings extends CI_Controller {

        /**
         * __construct function.
         *
         * @access public
         * @return void
         */
        public function __construct() {

            parent::__construct();
            $this->load->helper(array('url'));
            $this->load->model('nurse_model');
            $this->load->helper('security');

        }
         /**
         * to view panel
         *
         * @access public
         * @return void
         */
        public function panelView(){

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('header');
            $this->load->view('Nurse/panel/panel');
            $this->load->view('footer');

        }
        /**
         * to view resetpassword
         *
         * @access public
         * @return void
         */
        public function resetView(){

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('header');
           // $this->load->view('Nurse/panel/email');
            $this->load->view('Nurse/panel/resetpassword');
            $this->load->view('footer');

        }
        /**
         *
         * to view edit
         *
         * @access public
         * @return void
         */

        public function editView(){

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('header');
            $this->load->view('Nurse/panel/personal');
            $this->load->view('footer');

        }

        public function edit()
        {
            // create the data object
            $data = new stdClass();

            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('oldname', 'oldname', 'trim|required|min_length[4]|callback_isUserNameExist', array('isUserNameExist' => ' Please enter a your old username correctly!.'));
            $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[4]|is_unique[nurse.name]', array('is_unique' => 'This username already exists. Please choose another one.'));

            if ($this->form_validation->run() === false) {

                $this->load->view('header');
                $this->load->view('Nurse/panel/personal',$data);
                $this->load->view('footer');
            }
            else{

                $name = $this->input->post('name');
                $oName  = $this->input->post('oldname');
                $result = $this->nurse_model->edit_user($oName,$name);


                if ($result == 1) {
                    $this->load->view('Nurse/panel/change_success');
                    $this->load->view('header');
                    $this->load->view('Nurse/panel/personal');
                    $this->load->view('footer');
                }
            }


        }

        public function isUserNameExist($oName) {

            $is_exist = $this->nurse_model->isUsernameExist($oName);

            if ($is_exist) {
               // $this->form_validation->set_message(
                    //'isUserNameExist', 'Please enter valid username! .'
                //);
               return true;
            } else {
                return false;
            }
        }
        /**
         *
         * change password funtion
         *
         * @access public
         * @return void
         */

        public function resetPassword(){

            session_start();
            $id = $_SESSION['id'];

            echo $id;
            $data = new stdClass();

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('password_old', 'old password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password', 'new password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'confirm Password', 'trim|required|min_length[6]|matches[password]');

            if ($this->form_validation->run() === false) {

                $this->load->view('header');
                $this->load->view('Nurse/panel/resetpassword',$data);
                $this->load->view('footer');
            }
            else{

                $password = md5($this->input->post('password'));
                $id = $this->input->post('id');
                //echo $password.$id;

                $result = $this->nurse_model->reset_password($id,$password);


                if ($result == 1) {
                    $this->load->view('Nurse/panel/change_password_success');
                    $this->load->view('header');
                    $this->load->view('Nurse/panel/resetpassword');
                    $this->load->view('footer');
                }
            }
        }
    }
?>