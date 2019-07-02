<?php
	class Admindashboard extends CI_Controller {
		public function index() {
			$data['title'] = 'My Dashboard';

			if($this->session->userdata('logged_in') && $this->session->userdata('user_type') == "admin" ) {
				$this->load->view('templates/header');
				$this->load->view('admindashboard/index', $data);
				$this->load->view('templates/admindashfooter');
			}
		}
	}