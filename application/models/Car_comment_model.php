<?php

	class Car_comment_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function create_comment($car_id) {
			$data = array(
				'car_id' => $car_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body')
			);

			return $this->db->insert('car_comments', $data);
		}

		public function get_comments($car_id) {
			$query = $this->db->get_where('car_comments', array('car_id' => $car_id));
			return $query->result_array();
		}
	}
