<div class="container-fluid table-responsive" id="table-container1">
  <div class="row">
    <div class="col-md pl-0 admin-sidebar pt-5 pl-3">
      <a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>admindashboard">My Dashboard</a>
			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url();?>users/manage_account">Manage Registration</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Carslisting/manage_cars">Manage Car Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Partslisting/manage_parts">Manage Parts Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/administer_accounts">Users List</a>
			<a class="nav-link rounded-0 mb-1" href="">Reports</a>
    </div>

    <div class="col-md-10 p-5">
      <table id="users-table" class="display table table-striped table-bordered text-center" style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          if ($users->num_rows() > 0) {
            foreach ($users->result() as $row) {
        ?>
          <tr>
            <td><?php echo $row->fname . " " . $row->mname . " " .$row->lname; ?></td>
            <td><?php echo $row->address; ?></td>
            <td><?php echo $row->email; ?></td>
            <td>
              <a href="<?php echo base_url() . "users/user_approve/" . $row->user_id ?>" name="" id="" class="btn btn-success">Activate</a>
              <a href="<?php echo base_url() . "users/user_decline/" . $row->user_id ?>" name="" id="" class="btn btn-danger">Deactivate</a>	
            </td>
                        
          </tr>
        <?php               
            }
          }
        ?>
                    
        </tbody>
      </table>
    </div>
  </div>
</div>