<?php
	class Carslisting extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('carslisting_model');
		}

		public function index() {
			$data['title'] = 'Recently Added Cars';

			$data['make_data'] = $this->carslisting_model->fetch_filter_type('make');
			$data['model_data'] = $this->carslisting_model->fetch_filter_type('model');
			$data['year_data'] = $this->carslisting_model->fetch_filter_type('year');
			$data['transmission_data'] = $this->carslisting_model->fetch_filter_type('transmission');
			$data['capacity_data'] = $this->carslisting_model->fetch_filter_type('seating_capacity');
			$data['body_data'] = $this->carslisting_model->fetch_filter_type('body_style');
			$data['drivetype_data'] = $this->carslisting_model->fetch_filter_type('drive_type');
			$data['fueltype_data'] = $this->carslisting_model->fetch_filter_type('fuel_type');
			$data['color_data'] = $this->carslisting_model->fetch_filter_type('color');
			$data['cylinder_data'] = $this->carslisting_model->fetch_filter_type('cylinder_engine');

			$this->load->view('templates/header');
			$this->load->view('carslisting/index', $data);
			$this->load->view('templates/carsfooter');
		}

		public function view($slug = NULL) {
			$data['car'] = $this->carslisting_model->get_cars($slug);
			$car_id = $data['car']['car_id'];
			$data['comments'] = $this->car_comment_model->get_comments($car_id);

				if (empty($data['car'])) {
					show_404();
				}

			$data['make'] = $data['car']['make'];

			$this->load->view('templates/header');
			$this->load->view('carslisting/view', $data);
			$this->load->view('templates/footer');
		}

		public function create() {
			$data['title'] = 'Post Your Product';

			$this->form_validation->set_rules('make', 'Make', 'required');
			$this->form_validation->set_rules('model', 'Model', 'required');
			$this->form_validation->set_rules('year', 'Year', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			$this->form_validation->set_rules('transmission', 'Transmission', 'required');
			$this->form_validation->set_rules('body_style', 'Body Style', 'required');
			$this->form_validation->set_rules('mileage', 'Mileage', 'required');
			$this->form_validation->set_rules('cylinder_engine', 'Engine', 'required');
			$this->form_validation->set_rules('drive_type', 'Drive Type', 'required');
			$this->form_validation->set_rules('fuel_type', 'Fuel Type', 'required');
			$this->form_validation->set_rules('seating_capacity', 'Seating Capacity', 'required');
			$this->form_validation->set_rules('door', 'Doors', 'required');
			$this->form_validation->set_rules('color', 'Color', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
			$this->form_validation->set_rules('rfs', 'Reason For Selling', 'required');

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('carslisting/create', $data);
					$this->load->view('templates/footer');
				} else {
					$config['upload_path'] = './assets/images/posts';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';

					$this->load->library('upload', $config);

						if (!$this->upload->do_upload()) {
							$errors = array('error' => $this->upload->display_errors());
							$post_image = 'noimage.png';
						} else {
							$data = array('upload_data' => $this->upload->data());
							$post_image = $_FILES['userfile']['name'];
						}

							$q = $this->carslisting_model->create_car_post($post_image);
							$user_data = $this->user_model->get_user($this->session->userdata('user_id'));
							$admins = $this->user_model->get_administrators();
								
							$date = date('F d, Y');
								if($q == 1){
									foreach ($admins->result() as $key) {
										$notif = array(
										'notification_message' => $user_data . ' has posted a new car.',
										'notif_date' => $date,
										'status' => 'Unread',
										'user_id' => $key->user_id);

									$res = $this->notification_model->notification_module($notif);
										}
										if ($res == 1) {
											redirect('carslisting');
										}
									}			
						
					}

								//redirect('carslisting');
				
		}

		public function edit($slug) {
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['car'] = $this->carslisting_model->get_cars($slug);

			// Check user
			if($this->session->userdata('user_id') != $this->carslisting_model->get_cars($slug)['user_id']){
				redirect('carslisting');
			}

			//$data['categories'] = $this->post_model->get_categories();

			// if(empty($data['car'])){
			// 	show_404();
			// }

			$data['title'] = 'Edit Post';

			$this->load->view('templates/header');
			$this->load->view('carslisting/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->carslisting_model->update_post();

			// Set message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');

			redirect('carslisting');
		}

		public function delete($car_id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->carslisting_model->delete_post($car_id);

			// Set message
			$this->session->set_flashdata('post_deleted', 'Your post has been deleted');

			redirect('carslisting');
		}

		public function fetch_data() {
			$make = $this->input->post('make');
			$model = $this->input->post('model');
			$year = $this->input->post('year');
			$transmission = $this->input->post('transmission');
			$seating_capacity = $this->input->post('seating_capacity');
			$body_style = $this->input->post('body_style');
			$drive_type = $this->input->post('drive_type');
			$fuel_type = $this->input->post('fuel_type');
			$color = $this->input->post('color');
			$cylinder_engine = $this->input->post('cylinder_engine');

			$this->load->library('pagination');
			$config = array();
			$config['base_url'] = '#';
			$config['total_rows'] = $this->carslisting_model->count_all($make, $model, $year, $transmission, $seating_capacity, $body_style, $drive_type, $fuel_type, $color, $cylinder_engine);
			$config['per_page'] = 12;
			$config['uri_segment'] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = '&gt;';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_link'] = '&lt;';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='active'><a href='#'>";
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['num_links'] = 3;
			$config['attributes'] = array('class' => 'pagination');
			$this->pagination->initialize($config);
			$page = $this->uri->segment(3);
			$start = ($page - 1) * $config['per_page'];
			$output = array(
				'pagination_link' => $this->pagination->create_links(),
				'car_list' => $this->carslisting_model->fetch_data($config["per_page"], $start, $make, $model, $year, $transmission, $seating_capacity, $body_style, $drive_type, $fuel_type, $color, $cylinder_engine)
			);
			echo json_encode($output);
		}

		public function manage_cars() {
			$data['cars'] = $this->carslisting_model->get_pending_cars();
			$this->load->view('templates/header');
			$this->load->view('carslisting/cars_management', $data);
			$this->load->view('templates/footer');
		}
		//NOTIFICATION TRIGGER
		public function cars_approve($id) {
			$result = $this->carslisting_model->cars_approve($id);
			
			$date = date('F d, Y');
			if($result == 1){
				$notif = array(
					'notification_message' =>'Your requested post has been approved.', 
					'notif_date' => $date, 
					'status' => 'Unread', 
					'user_id' => $result->row(0)->user_id);
				$res = $this->notification_model->notification_module($notif);
				if ($res == 1) {
					redirect('Carslisting/manage_cars');
				}
			}
			redirect('Carslisting/manage_cars');
		//-------------------- HERE
		}
		public function cars_decline($id) {
			$result = $this->carslisting_model->cars_decline($id);

			$date = date('F d, Y');
			if($result == 1){
				$notif = array(
					'notification_message' =>'Your requested post has been declined.', 
					'notif_date' => $date, 
					'status' => 'Unread', 
					'user_id' => $result->row(0)->user_id);
				$res = $this->notification_model->notification_module($notif);
				if ($res == 1) {
					redirect('Carslisting/manage_cars');
				}
			}
			redirect('Carslisting/manage_cars');
		//-------------------- HERE	
		}
	}
