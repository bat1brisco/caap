$(document).ready(function() {

  var dataTable = $('#admin').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
                url:"chat/fetch_admin",
                type:"POST"
            },

      "columnDefs":[
                      {
                         "targets":[0, 2],
                         "orderable":false,
                      },
                   ],
  });

  function make_chat_dialog_box(to_user_id, to_fname) {

    var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_fname+'">';
    modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
    //modal_content += fetch_user_chat_history(to_user_id);
    modal_content += '</div>';
    modal_content += '<div class="form-group">';
    modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
    modal_content += '</div><div class="form-group" align="right">';
    modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
    $('#user_modal_details').html(modal_content);
  }

  $(document).on('click', '.start-chat', function() {
    
    var to_user_id = $(this).data('touserid');
    var to_f_name = $(this).data('tofname');
    make_chat_dialog_box(to_user_id, to_fname);

      $("#user_dialog_"+to_user_id).dialog({
        autoOpen:false,
        width:400
      });
      $('#user_dialog_'+to_user_id).dialog('open');
  
  });

  $(document).on('click', '.ui-button-icon', function() {
    $('.user_dialog').dialog('destroy').remove();
  });

});