<?php
	class User_model extends CI_Model {
		public function register($enc_password) {
			// User data array
			$data = array(
				'fname' => $this->input->post('fname'),
				'mname' => $this->input->post('mname'),
				'lname' => $this->input->post('lname'),
				'address' => $this->input->post('address'),
				'contact' => $this->input->post('contact'),
				'email' => $this->input->post('email'),
				'password' => $enc_password,
				'user_type' => 'user',
				'status' => 'Pending'
			);

			// Insert user
			return $this->db->insert('users', $data);
		}

		public function login($email, $password) {
			// Validate
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$this->db->where('status', true);

			$result = $this->db->get('users');

				if ($result->num_rows() == 1) {
					return $result->row(0)->user_id;
				} else {
					return false;
				}

		}

		public function get_session_fname($user_id) {
			$this->db->where('user_id', $user_id);
			$result = $this->db->get('users');

				if ($result->num_rows() == 1) {
					return $result->row(0)->fname;
				} else {
					return false;
				}
		}

		public function get_session_mname($user_id) {
			$this->db->where('user_id', $user_id);
			$result = $this->db->get('users');

				if ($result->num_rows() == 1) {
					return $result->row(0)->mname;
				} else {
					return false;
				}
		}

		public function get_session_lname($user_id) {
			$this->db->where('user_id', $user_id);
			$result = $this->db->get('users');

				if ($result->num_rows() == 1) {
					return $result->row(0)->lname;
				} else {
					return false;
				}
		}

		public function get_session_usertype($user_id) {
			$this->db->where('user_id', $user_id);
			$result = $this->db->get('users');

				if ($result->num_rows() == 1) {
					return $result->row(0)->user_type;
				} else {
					return false;
				}
		}

		public function check_email_exists($email) {
			$query = $this->db->get_where('users', array('email' => $email));

				if (empty($query->row_array())) {
					return true;
				} else {
					return false;
				}

		}

		public function check_user_password($password) {
			$query = $this->db->query("SELECT email FROM users WHERE password = '$password'");

				if (empty($query->row_array())) {
					return true;
				} else {
					return false;
				}

		}

		public function get_user($uid){
			$result  = $this->db->get_where('users', array('user_id' => $uid));
			if ($result->num_rows() == 1) {
				$user_data = $result->row(0)->fname . " " . $result->row(0)->lname; 
			} else {
				$user_data = false;
			}
			return $user_data;
		}

		public function get_pending_users(){
			$result  = $this->db->get_where('users', array('status' => 'Pending'));
			return $result;
		}


		public function get_approved_users(){
			$result  = $this->db->get_where('users', array('status' => 'Approved'));
			return $result;
		}

		public function user_approve($id){
			$this->db->set('status', "Approved");
			$this->db->where('user_id', $id);
			$this->db->update('users');

			return 1;
		}
		public function user_decline($id){
			$this->db->set('status', "Declined");
			$this->db->where('user_id', $id);
			$this->db->update('users');

			return 1;
		}
//April 14, 2019
		public function get_administrators(){
			$result = $this->db->get_where('users', array('user_type' => 'admin'));		
			return $result;
		}
	}
