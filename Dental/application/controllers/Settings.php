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

        }

        public function resetPassView(){

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('header');
            $this->load->view('Nurse/panel/resetpassword');
            $this->load->view('footer');

        }


    }
?>