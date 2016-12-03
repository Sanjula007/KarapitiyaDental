<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * Nurse class.
     *
     * @extends CI_Controller
     */
    class Nurse extends CI_Controller {

        /**
         * __construct function.
         *
         * @access public
         * @return void
         */
        public function __construct() {

            parent::__construct();
            $this->load->library(array('session'));
            $this->load->helper(array('url'));
            $this->load->model('nurse_model');


        }


        public function index() {

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('header');
            $this->load->view('Nurse/register/register');
            $this->load->view('footer');


        }

        /**
         * register function.
         *
         * @access public
         * @return void
         */
        public function register() {

            // create the data object
            $data = new stdClass();

            // load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set validation rules
            $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[4]|is_unique[nurse.name]', array('is_unique' => 'This username already exists. Please choose another one.'));
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[nurse.email]');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('password_confirm', 'confirm Password', 'trim|required|min_length[6]|matches[password]');

            if ($this->form_validation->run() === false) {

                // validation not ok, send validation errors to the view
                //echo 'sjdhau';
                $this->load->view('header');
                $this->load->view('Nurse/register/register', $data);
                $this->load->view('footer');

            } else {

                // set variables from the form
                $name = $this->input->post('name');
                $email    = $this->input->post('email');
                $password = $this->input->post('password');

                //$this->load->model('user_model');

                if ($this->nurse_model->create_user($name, $email, $password)) {

                    // user creation ok

                    $this->load->view('Nurse/register/rergister_success');
                    $this->load->view('header');
                    $this->load->view('Nurse/login/login', $data);
                    $this->load->view('footer');

                } else {

                    // user creation failed, this should never happen
                    $data->error = 'There was a problem creating your new account. Please try again.';

                    // send error to the view
                    $this->load->view('header');
                    $this->load->view('Nurse/register/register', $data);
                    $this->load->view('footer');

                }

            }

        }

        /**
         * to view login
         *
         * @access public
         * @return void
         */
        public function loginView() {

            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->load->view('header');
            $this->load->view('Nurse/login/login');
            $this->load->view('footer');
        }
        /**
         * login function.
         *
         * @access public
         * @return void
         */
        public function login() {

            // create the data object
            $data = new stdClass();

            // load form helper and validation library
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set validation rules
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {

                // validation not ok, send validation errors to the view
                $this->load->view('header');
                $this->load->view('Nurse/login/login');
                $this->load->view('footer');

            } else {

                // set variables from the form
                $email = $this->input->post('email');
                $password = md5($this->input->post('password'));
                //echo $password;
                if ($this->nurse_model->resolve_user_login($email, $password)) {

                    $user_id = $this->nurse_model->get_user_id_from_email($email);
                    $user  = $this->nurse_model->get_user($user_id);

                    $session_data = array(
                        'id'    => $user->id,
                        'name'  => $user->name,
                        'email' => $user->email,
                        'type' => 'nurse',
                        'logged_in' => (bool)true,
                        //'type' => 'user',
                    );
                    $this->set_session($session_data);

                    // set session user datas
                    $_SESSION['user_id']      = (int)$user->id;
                    $_SESSION['name']     = (string)$user->name;
                    $_SESSION['logged_in']    = (bool)true;

                    //$nurse['posts'] = $this->nurse_model->get_username($user_id);
                    // user login ok
                    $this->load->view('header');

                    $this->load->view('Nurse/panel/panel', $data);
                    $this->load->view('footer');

                } else {

                    // login failed
                    $data->error = 'Invalid emailId or password.';

                    // send error to the view
                    $this->load->view('header');
                    $this->load->view('Nurse/login/login',$data);
                    $this->load->view('footer');

                }

            }

        }
        /**
         * getting session datas.
         *
         * @access public
         * @return void
         */

        public function set_session($session_data){

            $sess_data = array(
                'id' 	=> $session_data['id'],
                'name'  => $session_data['name'],
                'email' => $session_data['email'],
                'type'  => $session_data['type'],
                'logged_in' => 1,
                'ip_address'=> $_SERVER['REMOTE_ADDR'],
            );

            $this->session->set_userdata($sess_data);
            $this->nurse_model->user_session($sess_data);

        }

        /**
         * logout function.
         *
         * @access public
         * @return void
         */
        public function logout() {

            // create the data object
            // $data = new stdClass();

            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

                // remove session datas
                foreach ($_SESSION as $key => $value) {
                    unset($_SESSION[$key]);
                }

                // user logout ok
                redirect('Nurse/loginView');

            } else {

                // there user was not logged in, we cannot logged him out,
                // redirect him to site root
                redirect('/');

            }

        }

        public function cccc() {

            $this->load->model('Leave_model');
            $leaves['rows']= $this->Leave_model->get_all();
            $this->load->view('header');
            $this->load->view('Nurse/doctors_leave',$leaves);
            $this->load->view('footer');
        }


    }
?>