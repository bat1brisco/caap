<?php

	class Partslisting extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('partslisting_model');
		}

		public function index() {
			$data['title'] = 'Recently Added Parts';

			$data['category_data'] = $this->partslisting_model->fetch_filter_type('category');
			$data['brand_data'] = $this->partslisting_model->fetch_filter_type('brand');
			$data['color_data'] = $this->partslisting_model->fetch_filter_type('color');
			$data['model_name_data'] = $this->partslisting_model->fetch_filter_type('model_name');

			$this->load->view('templates/header');
			$this->load->view('partslisting/index', $data);
			$this->load->view('templates/partsfooter');
		}

		public function view($slug = NULL) {
			$data['part'] = $this->partslisting_model->get_parts($slug);
			$parts_id = $data['parts']['parts_id'];
			$data['comments'] = $this->parts_comment_model->get_comments($parts_id);

				if (empty($data['part'])) {
					show_404();
				}

			$data['category'] = $data['part']['category'];

			$this->load->view('templates/header');
			$this->load->view('partslisting/view', $data);
			$this->load->view('templates/footer');
		}

		public function create() {
			$data['title'] = 'Post Your Product';

			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('brand', 'Brand', 'required');
			$this->form_validation->set_rules('color', 'Color', 'required');
			$this->form_validation->set_rules('model_name', 'Model', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			$this->form_validation->set_rules('parts_quantity', 'Part Quantity', 'required');

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('partslisting/create', $data);
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

					$q = $this->partslisting_model->create_parts_post($post_image);
					$user_data = $this->user_model->get_user($this->session->userdata('user_id'));
					$admins = $this->user_model->get_administrators();
					$date = date('F d, Y');
					if($q == 1){
						foreach ($admins->result() as $key) {
							$notif = array('notification_message' => $user_data . ' has posted a new car parts.', 
								'notif_date' => $date , 
								'status' => 'Unread', 
								'user_id' => $key['user_id']);
						
						$res = $this->notification_model->notification_module($notif);
						}
						if ($res == 1) {
							redirect('partslisting');
						
						}
						

					}
					redirect('partslisting');
				}
					//redirect('partslisting');

		}

		public function fetch_data() {
			$category = $this->input->post('category');
			$brand = $this->input->post('brand');
			$color = $this->input->post('color');
			$model_name = $this->input->post('model_name');

			$this->load->library('pagination');
			$config = array();
			$config['base_url'] = '#';
			$config['total_rows'] = $this->partslisting_model->count_all($category, $brand, $color, $model_name);
			$config['per_page'] = 4;
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
			//$config['attributes'] = array('class' => 'pagination-link');
			$this->pagination->initialize($config);
			$page = $this->uri->segment(3);
			$start = ($page - 1) * $config['per_page'];
			$output = array(
				'pagination_link' => $this->pagination->create_links(),
				'parts_list' => $this->partslisting_model->fetch_data($config["per_page"], $start, $category, $brand, $color, $model_name)
			);
			echo json_encode($output);
		}

		public function manage_parts(){
			$data['parts'] = $this->partslisting_model->get_pending_parts();
			$this->load->view('templates/header');
			$this->load->view('partslisting/parts_management', $data);
			$this->load->view('templates/footer');
		}
		//NOTIFICATION TRIGGER
		public function parts_approve($id){
			$result = $this->partslisting_model->parts_approve($id);
			
			$date = date('F d, Y');
			if($result == 1){
				$notif = array(
					'notification_message' =>'Your requested post has been approved.', 
					'notif_date' => $date, 
					'status' => 'Unread', 
					'user_id' => $result->row(0)->user_id);
				$res = $this->notification_model->notification_module($notif);
				if ($res == 1) {
					redirect('Partslisting/manage_parts');
				}
			}
			redirect('Partslisting/manage_parts');
		//-------------------- HERE
		}
		public function parts_decline($id){
			$result = $this->partslisting_model->parts_decline($id);

			$date = date('F d, Y');
			if($result == 1){
				$notif = array(
					'notification_message' =>'Your requested post has been declined.', 
					'notif_date' => $date, 
					'status' => 'Unread', 
					'user_id' => $result->row(0)->user_id);
				$res = $this->notification_model->notification_module($notif);
				if ($res == 1) {
					redirect('Partslisting/manage_parts');
				}
			}
			redirect('Partslisting/manage_parts');
		//-------------------- HERE	
		}
	}
