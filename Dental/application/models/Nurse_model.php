<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    /**
     * Nurse_model class.
     *
     * @extends CI_Model
     */
    class Nurse_model extends CI_Model {

        /**
         * __construct function.
         *
         * @access public
         * @return void
         */
        public function __construct() {

            parent::__construct();
            $this->load->database();
        }

        /**
         * create_user function.
         *
         * @access public
         * @param mixed $email
         * @param mixed $email
         * @param mixed $password
         * @return bool true on success, false on failure
         */
        public function create_user($name, $email, $password) {


            $data = array(
                'name'   => $name,
                'email'      => $email,
                'password'   => md5($password),
                'regdatetime' => date('Y-m-j H:i:s'),
            );

            return $this->db->insert('nurse', $data);

        }

        /**
         * resolve_user_login function.
         *
         * @access public
         * @param mixed $email
         * @param mixed $password
         * @return bool true on success, false on failure
         */
        public function resolve_user_login($email, $password) {

            $this->db->select('id');
            $this->db->from('nurse');
            $this->db->where('email', $email);
            $this->db->where('password', $password);

            return $this->db->get()->row('id');

        }

        /**
         * get_user_id_from_username function.
         *
         * @access public
         * @param mixed $email
         * @return int the user id
         */
        public function get_user_id_from_email($email) {

            $this->db->select('id');
            $this->db->from('nurse');
            $this->db->where('email', $email);

            return $this->db->get()->row('id');

        }

        /**
         * get_user function.
         *
         * @access public
         * @param mixed $user_id
         * @return object the user object
         */
        public function get_user($user_id) {

            $this->db->from('nurse');
            $this->db->where('id', $user_id);
            return $this->db->get()->row();

        }

        /**
         * get_user info.
         *
         * @access public
         * @param mixed $user_id
         * @return object the user object
         */
       /* public function get_username($user_id) {


            $query = $this -> db -> get_where('nurse',array('id'=> $user_id));//select all from table users where password equals to username
            return $query;
            /*$this->db->select('name');
            $this->db->from('nurse');
            $this->db->where('id', $user_id);
            return $this->db->get()->row();
        }
        /**
         * saving session into db.
         *
         * @access public
         * @param mixed $user_id
         * @return object the user object
         */

        public function user_session($sess_data)
        {
            $this->db->insert('cisession',$sess_data);

            if($this->db->affected_rows()>0)
            {
                return true;
            }
        }


        /**
         * get_user function.
         *
         * @access public
         * @param mixed $user_id
         * @return object the user object
         */
        public function edit_user($oName,$name) {

            $this->db->set('name', $name);
            $this->db->where('name' ,$oName);
            $this->db->update('nurse');
            return true;

        }

        /**
         * resset password function.
         *
         * @access public
         * @param mixed $user_id
         * @return object the user object
         */
        public function reset_password($id,$password) {

            $this->db->set('password', $password);
            $this->db->where('id' ,$id);
            $this->db->update('nurse');
            return true;

        }

        /**
         * resset password function.
         *
         * @access public
         * @param mixed $user_id
         * @return object the user object
         */

        public function isUsernameExist($oName) {
            $this->db->select('id');
            $this->db->where('name', $oName);
            $query = $this->db->get('nurse');

            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * resset password function.
         *
         * @access public
         * @param mixed $user_id
         * @return object the user object
         */

        public function isOldpassExist($oldPPass,$id) {
            $this->db->select('id');
            $this->db->where('password', $oldPPass);
            $this->db->where('id', $id);
            $query = $this->db->get('nurse');

            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
?>