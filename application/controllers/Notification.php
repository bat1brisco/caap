<?php

	/**
	 *
	 *Notification Controller
	 *Fetch, Remove, Alter, Insert Notification and Notification Details.
	 */
	class Notification extends CI_Controller
	{

		function get_notification(){
			if (isset($_POST['userid'])) {
				$notification = $this->notification_model->Count_UserNotif($_POST['userid']);
				echo $notification;
			}
		}

		function get_all_notification(){
			if (isset($_POST['userid'])) {
				$notification = $this->notification_model->get_all_notification($_POST['userid']);
				$out = "";
				foreach ($notification->result_array() as $e) {
					$out.= '<a class="dropdown-item" href="#">'.$e['notification_message'].'
							<br>
			                	<span style="float: right">'. $e['notif_date'] .'</span>
			                </a>';
				}
				echo $out;
			}
		}
		function update_notification(){
			if (isset($_POST['userid'])) {
				$this->notification_model->update_notification($_POST['userid']);
				$out = "";
                echo $out;
			}
		}
	}

 ?>
