<?php  
	class Users extends CI_Controller {
		public function register() {
			$data['title'] = 'Register';

			$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
			$this->form_validation->set_rules('mname', 'Middle Name', 'required|alpha');
			$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'matches[password]');

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('users/register', $data);
					$this->load->view('templates/footer');
				} else {
					$enc_password = md5($this->input->post('password'));
					$this->user_model->register($enc_password);
					$this->session->set_flashdata('user_pending', 'Your account is still pending for approval');

					// $date = date('F d, Y');
					// $notif = array(
					// 		'notification_message' => 'Account Pending Request.', 
					// 		'notif_date' => $date, 
					// 		'status' => 'Unread', 
					// 		'user_id' => 1);

					// 	$res = $this->notification_model->notification_module($notif);
					$q = $this->user_model->register($enc_password);
					$user_data = $this->user_model->get_user($this->session->userdata('user_id'));
					$admins = $this->user_model->get_administrators();
					$date = date('F d, Y');
					if($q == 1){
						foreach ($admins->result() as $key) {
							$notif = array(
							'notification_message' => $user_data . ' is registering for a new account.', 
							'notif_date' => $date, 
							'status' => 'Unread', 
							'user_id' => $key->user_id);
						$res = $this->notification_model->notification_module($notif);
						}
						if ($res == 1) {
							$this->load->view('templates/header');
							$this->load->view('pages/home');
							$this->load->view('templates/footer');
						}
					}


				
				}
		}

		public function login() {
			$data['title'] = 'Sign In';

			
			$this->form_validation->set_rules('email', 'Email', 'required');
			
			$this->form_validation->set_rules('password', 'Password', 'required');
			

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('users/login', $data);
					$this->load->view('templates/footer');
				} else {
					// Get email
					$email = $this->input->post('email');
					// Get and ecrypt the password
					$password = md5($this->input->post('password'));
					// Login user
					$user_id = $this->user_model->login($email, $password);

						if ($user_id) {
							// Create session
							$fname = $this->user_model->get_session_fname($user_id);
							$mname = $this->user_model->get_session_mname($user_id);
							$lname = $this->user_model->get_session_lname($user_id);
							$user_type = $this->user_model->get_session_usertype($user_id);

							$user_data = array(
								'user_id' => $user_id,
								'email' => $email,
								'fname' => $fname,
								'mname' => $mname,
								'lname' => $lname,
								'user_type' => $user_type,
								'logged_in' => true
							);

							$this->session->set_userdata($user_data);

							$this->load->view('templates/header');
							$this->load->view('pages/home');
							$this->load->view('templates/footer');
						} else {
							$this->session->set_flashdata('login_failed', 'Invalid log in credentials. Please check you email and password');

							//redirect('users/login');

							$this->load->view('templates/header');
							$this->load->view('users/login', $data);
							$this->load->view('templates/footer');
						}
						
				}
				
		}

		public function logout() {
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('email');


			redirect('/');
		}

		public function check_email_exists($email) {
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');

				if ($this->user_model->check_email_exists($email)) {
					return true;
				} else {
					return false;
				}
			
		}

		public function manage_account(){
			$data['users'] = $this->user_model->get_pending_users();
			$this->load->view('templates/header');
			$this->load->view('users/manage_account', $data);
			$this->load->view('templates/footer');
		}

		public function administer_accounts(){
			$data['users'] = $this->user_model->get_approved_users();
			$this->load->view('templates/header');
			$this->load->view('users/administer_accounts', $data);
			$this->load->view('templates/footer');
		}

		public function user_approve($id){
			$result = $this->user_model->user_approve($id);
			redirect('users/manage_account');
		}

		public function user_decline($id){
			$result = $this->user_model->user_decline($id);
			redirect('users/manage_account');
		}
		
		public function get_adminstrators(){
			return $this->user_model->get_adminstrators();
		}
	}