
  $(document).ready(function(){
    var dataTable = $('#user_data').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
                url:"acceptrejectuser/fetch_user",
                type:"POST"
            },

      "columnDefs":[
                      {
                         "targets":[0, 2, 3],
                         "orderable":false,
                      },
                   ],
    });

    $(document).on('click', '.delete', function() {
      var user_id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this?")) {
          $.ajax({
            url:"acceptrejectuser/delete_single_user",
            method:"POST",
            data:{user_id:user_id},
            success:function(data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
    });

    $(document).on('click', '.accept', function() {
      var user_id = $(this).attr("id");
        if(confirm("Are you sure you want to accept this?")) {
          $.ajax({
            url:"acceptrejectuser/accept_single_user",
            method:"POST",
            data:{user_id:user_id},
            success:function(data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
    });

    var dataTable = $('#car_data').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
                url:"acceptrejectcar/fetch_car",
                type:"POST"
            },

      "columnDefs":[
                      {
                         "targets":[0, 2, 3],
                         "orderable":false,
                      },
                   ],
    });

    $(document).on('click', '.deletecar', function() {
      var car_id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this?")) {
          $.ajax({
            url:"acceptrejectcar/delete_single_car",
            method:"POST",
            data:{car_id:car_id},
            success:function(data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
    });

    $(document).on('click', '.acceptcar', function() {
      var car_id = $(this).attr("id");
        if(confirm("Are you sure you want to accept this?")) {
          $.ajax({
            url:"acceptrejectcar/accept_single_car",
            method:"POST",
            data:{car_id:car_id},
            success:function(data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
    });

    var dataTable = $('#part_data').DataTable({
      "processing":true,
      "serverSide":true,
      "order":[],
      "ajax":{
                url:"acceptrejectpart/fetch_part",
                type:"POST"
            },

      "columnDefs":[
                      {
                         "targets":[0, 2, 3],
                         "orderable":false,
                      },
                   ],
    });

    $(document).on('click', '.deletepart', function() {
      var parts_id = $(this).attr("id");
        if(confirm("Are you sure you want to delete this?")) {
          $.ajax({
            url:"acceptrejectpart/delete_single_part",
            method:"POST",
            data:{parts_id:parts_id},
            success:function(data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
    });

    $(document).on('click', '.acceptpart', function() {
      var parts_id = $(this).attr("id");
        if(confirm("Are you sure you want to accept this?")) {
          $.ajax({
            url:"acceptrejectpart/accept_single_part",
            method:"POST",
            data:{parts_id:parts_id},
            success:function(data) {
              alert(data);
              dataTable.ajax.reload();
            }
          });
        } else {
          return false;
        }
    });
  });
