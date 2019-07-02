<?php 

	/**
	 * 
	 */
	class MessageController extends CI_Controller
	{
		
		public function index(){

			$this->load->view('templates/header');
			$this->load->view('message/index');
			$this->load->view('templates/partsfooter');
		}
		function get_message($id){
			$message = $this->MessageModel->get_messages($id);
			
			// var_dump($message);
			
			
			return $message;
		}

		function insert_message(){
			$message = array('from_user_id' => 1, 'to_user_id' => 1, 'chat_message' => 'This is a test insert', 'message_status' => 1 );

			$result = $this->MessageModel->insert_message($message);
		
			return $result;
		}
		function update_message(){

			$result = $this->MessageModel->update_message();

			return $result;
		}
	}