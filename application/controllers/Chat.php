<?php
	class Chat extends CI_Controller {
		public function index() {
			$data['title'] = 'CCAP Chat Application';


			$this->load->view('templates/header');
			$this->load->view('chat/index', $data);
			$this->load->view('templates/footer');

		}

		public function fetch_admin() {
      $this->load->model("chat_model");
      $fetch_data = $this->chat_model->make_datatables();
      $data = array();
        foreach($fetch_data as $row) {
          $sub_array = array();
          $sub_array[] = $row->fname;
          $sub_array[] = $row->lname;
          $sub_array[] = '<a href="chat/messages/'.$row->user_id.'"><button type="button" name="start-accept" data-touserid="'.$row->user_id.'" data-tofname="'.$row->fname.'" class="btn btn-warning btn-xs start-chat">Start Chat</button></a>';

          $data[] = $sub_array;
        }

      $output = array(
        "draw"                =>     intval($_POST["draw"]),
        "recordsTotal"        =>     $this->chat_model->get_all_data(),
        "recordsFiltered"     =>     $this->chat_model->get_filtered_data(),
        "data"                =>     $data
      );
      echo json_encode($output);
    }

	}