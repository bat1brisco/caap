<?php

	class Carslisting_model extends CI_Model {
		public function __construct() {
			
			$this->load->database();
		}

		public function get_cars($slug = FALSE) {

			if ($slug === FALSE) {
				$query = $this->db->get('cars');
				return $query->result_array();
			}

			$query = $this->db->get_where('cars', array('slug' => $slug));

			return $query->row_array();
		}

		public function create_car_post($post_image) {
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
			// Output: 54esmdr0qf
			$slug = url_title($this->input->post('make').substr(str_shuffle($permitted_chars), 0, 10));

			$data = array(
				'user_id' => $this->session->userdata('user_id'),
				'make' => $this->input->post('make'),
				'slug' => $slug,
				'model' => $this->input->post('model'),
				'year' => $this->input->post('year'),
				'price' => $this->input->post('price'),
				'transmission' => $this->input->post('transmission'),
				'car_status' => 'available',
				'body_style' => $this->input->post('body_style'),
				'mileage' => $this->input->post('mileage'),
				'cylinder_engine' => $this->input->post('cylinder_engine'),
				'drive_type' => $this->input->post('drive_type'),
				'fuel_type' => $this->input->post('fuel_type'),
				'seating_capacity' => $this->input->post('seating_capacity'),
				'door' => $this->input->post('door'),
				'color' => $this->input->post('color'),
				'description' => $this->input->post('description'),
				'rfs' => $this->input->post('rfs'),
				'notification_listing' => false,
				'post_image' => $post_image,
				'status' => 'Pending'
			);
//April 10, 2019 Notification module and partial trigger
			$q = $this->db->insert('cars', $data);
			return 1;
		}

		function fetch_filter_type($type) {
			$this->db->distinct();
			$this->db->select($type);
			$this->db->from('cars');
			$this->db->where('status', 'Approved');

			return $this->db->get();
		}

		function make_query($make, $model, $year, $transmission, $seating_capacity, $body_style, $drive_type, $fuel_type, $color, $cylinder_engine) {
				$query = "
				SELECT * FROM cars 
				WHERE status = 'Approved'
				";

					if (isset($make)) {
						$make_filter = implode("','", $make);
						$query .= " AND make IN('" . $make_filter . "')";
					}

					if (isset($model)) {
						$model_filter = implode("','", $model);
						$query .= " AND model IN('" . $model_filter . "')";
					}

					if (isset($year)) {
						$year_filter = implode("','", $year);
						$query .= " AND `year` IN('" . $year_filter . "')";
					}

					if (isset($transmission)) {
						$transmission_filter = implode("','", $transmission);
						$query .= " AND transmission IN('" . $transmission_filter . "')";
					}

					if (isset($seating_capacity)) {
						$seatingcapacity_filter = implode("','", $seating_capacity);
						$query .= " AND seating_capacity IN('" . $seatingcapacity_filter . "')";
					}

					if (isset($body_style)) {
						$bodystyle_filter = implode("','", $body_style);
						$query .= " AND body_style IN('" . $bodystyle_filter . "')";
					}

					if (isset($drive_type)) {
						$drivetype_filter = implode("','", $drive_type);
						$query .= " AND drive_type IN('" . $drivetype_filter . "')";
					}

					if (isset($fuel_type)) {
						$fueltype_filter = implode("','", $fuel_type);
						$query .= " AND fuel_type IN('" . $fueltype_filter . "')";
					}

					if (isset($color)) {
						$color_filter = implode("','", $color);
						$query .= " AND color IN('" . $color_filter . "')";
					}

					if (isset($cylinder_engine)) {
						$cylinderengine_filter = implode("','", $cylinder_engine);
						$query .= " AND cylinder_engine IN('" . $cylinderengine_filter . "')";
					}

					return $query;
		}

		function count_all($make, $model, $year, $transmission, $seating_capacity, $body_style, $drive_type, $fuel_type, $color, $cylinder_engine) {
				$query = $this->make_query($make, $model, $year, $transmission, $seating_capacity, $body_style, $drive_type, $fuel_type, $color, $cylinder_engine);
				$data = $this->db->query($query);

				return $data->num_rows();
		}

		function fetch_data($limit, $start, $make, $model, $year, $transmission, $seating_capacity, $body_style, $drive_type, $fuel_type, $color, $cylinder_engine) {
			$query = $this->make_query($make, $model, $year, $transmission, $seating_capacity, $body_style, $drive_type, $fuel_type, $color, $cylinder_engine);

			$query .= ' LIMIT ' . $start . ', ' . $limit;

			$data = $this->db->query($query);

			$output = '';

				if ($data->num_rows() > 0) {
					foreach($data->result_array() as $row) {
						$output .= '
						
							<div class="col-md-3 text-center mb-4">
								<div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>
									<h3 align="center"><strong>' . $row['make'] .'</strong></h3>
									<h4 style="text-align:center;">'. $row['model'] .'</h4>
									<img class="post-thumbnail img-thumbnail" src="assets/images/posts/'. $row['post_image'].'">
									<a class="btn btn-ccap mt-2 mb-2" href="/ccap/carslisting/' .$row['slug'] . '">View Details</a>
								</div>			
							</div>
						
						';
					}
				} else {
					$output = '<h3>No Data Found</h3>';
				}
				return $output;
		}
		public function get_pending_cars(){
			$result  = $this->db->get_where('cars', array('status' => 'Pending'));
			return $result;
		}

		public function get_recent_cars() {
			$data = $this->db->query("SELECT * FROM cars WHERE status = 'Approved' LIMIT 8");

			return $data;
		}

		public function cars_approve($id){
			$this->db->set('status', "Approved");
			$this->db->where('car_id', $id);
			$this->db->update('cars');
			$result = $this->db->get_where('cars', array('car_id' => $id));
			return $result;
		}
		public function cars_decline($id){
			$this->db->set('status', "Declined");
			$this->db->where('car_id', $id);
			$this->db->update('cars');
			$result = $this->db->get_where('cars', array('car_id' => $id));
			return $result;
		}

		public function update_post(){
			$slug = url_title($this->input->post('slug'));

			$data = array(
				'make' => $this->input->post('make'),
				'slug' => $slug,
				'model' => $this->input->post('model'),
				'year' => $this->input->post('year'),
				'price' => $this->input->post('price'),
				'transmission' => $this->input->post('transmission'),
				'body_style' => $this->input->post('body_style'),
				'mileage' => $this->input->post('mileage'),
				'cylinder_engine' => $this->input->post('cylinder_engine'),
				'drive_type' => $this->input->post('drive_type'),
				'fuel_type' => $this->input->post('fuel_type'),
				'seating_capacity' => $this->input->post('seating_capacity'),
				'door' => $this->input->post('door'),
				'color' => $this->input->post('color'),
				'description' => $this->input->post('description'),
				'rfs' => $this->input->post('rfs')
			);

			$this->db->where('car_id', $this->input->post('car_id'));
			return $this->db->update('cars', $data);
		}

		public function delete_post($car_id){
			$this->db->where('car_id', $car_id);
			$this->db->delete('cars');
			return true;
		}

	}