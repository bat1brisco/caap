$('#form-users').submit(function(e) {
	e.preventDefault();

	var me = $(this);
	var status = false;

	$.ajax({
		url:me.attr('action'),
		type: 'POST',
		data: me.serialize(),
		dataType: 'json',
		success: function(response) {
			if (response.success == true) {
				// $('#the-message').append('<div class="alert alert-warning">' + 'User Account pending for approval' + '</div>');
				$('.col-md').removeClass('is-invalid').removeClass('is-valid');
				$('.text-danger').remove();

				me[0].reset();

				// $('.alert-warning').delay(500).show(10, function() {
				// 	$(this).delay(3000).hide(10, function() {
				// 		$(this).remove();
				// 	})
				// });
				
				var modal_content = '<div class="user_dialog" title="Cebu Cars and Parts">';
				
				
				modal_content += '<div class="modal-body">';
				modal_content += '<p>User account pending for approval</p>';
				modal_content += '</div>';
				
				
				modal_content += '</div>';

				$('#the-message').html(modal_content);

				$(".user_dialog").dialog({
        	autoOpen:false,
        	width:500
      	});

      	$(".user_dialog").dialog('open');

      	status = true;
      	
			} else {
				$.each(response.messages, function(key, value) {
					var element = $('#' + key);
					element.closest('div.col-md').removeClass('is-invalid').addClass(value.length > 0 ? 'is-invalid' : 'is-valid').find('.text-danger').remove();
					element.after(value);
				});

				status = false;
			}
		}
	});

	if (status == true) {
		window.location.href = '/';
	}
});