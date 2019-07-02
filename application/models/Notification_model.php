<?php

class Notification_Model extends CI_Model{
  //Count Notification Message.
  public function Count_UserNotif($id){
    $result = $this->db->get_where('notifications', array('user_id' => $id, 'status' => 'Unread'));
    return $result->num_rows();
  }
  //Insert all Notification Detials.
  public function notification_module($notif){
    $this->db->insert('notifications', $notif);
    return 1;
  }
  //Display all notification message and details.
  public function get_all_notification($id){
    $result = $this->db->get_where('notifications', array('user_id' => $id));
      return $result;
  }
  //Update Notification from Unread to unread.
  public function update_notification($id){

    $this->db->set('status', "Read");
    $this->db->where('user_id', $id);
    $this->db->update('notifications');
  }
}//end 