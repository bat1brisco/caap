<?php

	class Parts_comments extends CI_Controller {
		public function create($parts_id) {
			$slug = $this->input->post('slug');
			$data['part'] = $this->partslisting_model->get_parts($slug);

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			//$this->form_validation->set_rules('email', 'Email', 'valid_email');
			$this->form_validation->set_rules('body', 'Body', 'required');

				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('partslisting/view', $data);
					$this->load->view('templates/footer');
				} else {
					$this->part_comment_model->create_comment($parts_id);
					redirect('partslisting/' . $slug);
				}

		}
	}
