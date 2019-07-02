var id = <?php echo $this->session->userdata('user_id'); ?>;
	$(document).ready(function(){
		$("#badge_notif").click(function(){
			$.ajax({  
				url:"http://localhost/ccap/Notification/update_notification",
				method:"POST",
				data:{userid: id},  
				success:function(data){ 
					$('#notif_count').html(data);
				}
  			}); 
		});
	});

	//SET INTERVAL WITH SERVER SIDE DATA USING AJAX
	$.ajax({  
		url:"http://localhost/ccap/Notification/get_notification",
		method:"POST",
		data:{userid: id},  
		success:function(data){  
		    if (data != 0) {
		    	console.log("Done");
       			$('#notif_count').html(data);
       		}
		}  
  	}); 

  	$.ajax({  
		url:"http://localhost/ccap/Notification/get_all_notification",
		method:"POST",
		data:{userid: id},  
		success:function(data){  
		    if (data != 0) {
       			$('#notif_message').html(data);
       		}
		}  
  	}); 

		setInterval(function(){
			$.ajax({  
		       url:"http://localhost/ccap/Notification/get_notification",  
		       method:"POST",
		       data:{userid: id},
		       success:function(data){  
		       	console.log(data);
		       		if (data != 0) {
		       			$('#notif_count').html(data);
		       		}
		       }  
		  	});
	  	  	$.ajax({  
				url:"http://localhost/ccap/Notification/get_all_notification",
				method:"POST",
				data:{userid: id},  
				success:function(data){  
				    if (data != 0) {
		       			$('#notif_message').html(data);
		       		}
				}  
		  	}); 
 
		}, 1000);