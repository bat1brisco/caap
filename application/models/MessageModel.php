<?php

	/**
	 * 
	 */
	class MessageModel extends CI_Model
	{
		function get_messages($id){
			
			$result = $this->db->get_where('messages', array('message_id' => $id));
	    	
	    	return $result->result();
		}

		function insert_message($chat_info){
			$result = $this->db->insert('messages', $chat_info);
			return $result;
		}

		function update_message(){
			
		}
	}