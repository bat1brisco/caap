<?php

	class Car_comments extends CI_Controller {
		public function create($car_id) {
			$slug = $this->input->post('slug');
			$data['car'] = $this->carslisting_model->get_cars($slug);

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			//$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('body', 'Body', 'required');

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('carslisting/view', $data);
					$this->load->view('templates/footer');
				} else {
					$this->car_comment_model->create_comment($car_id);
					redirect('carslisting/' . $slug);
				}

		}
	}
