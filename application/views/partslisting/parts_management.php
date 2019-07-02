<div class="container-fluid table-responsive" id="table-container1">
	
	<div class="row">
		<div class="col-md pl-0 admin-sidebar pt-5 pl-3">
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>admindashboard">My Dashboard</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/manage_account">Manage Registration</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Carslisting/manage_cars">Manage Car Posts</a>
			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url(); ?>Partslisting/manage_parts">Manage Parts Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/administer_accounts">Users List</a>
			<a class="nav-link rounded-0 mb-1" href="">Reports</a>
		</div>

		<div class="col-md-10 p-5">
			<table class="display table table-striped table-bordered text-center" id="parts-table"  style="width:100%">
				<thead>
					<tr>
						<th>Model Name</th>
						<th>Type</th>
						<th>Email</th>
						<th>Contact Number</th>
						<th>Start date</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					if ($parts->num_rows() > 0) {
						foreach ($parts->result() as $row) {
				?>
					<tr>
						<td><?php echo $row->model_name; ?></td>
						<td><?php echo $row->price; ?></td>
						<td><?php echo $row->category; ?></td>
						<td><?php echo $row->color; ?></td>
						<td>
							<a href="<?php echo base_url() . "Partslisting/parts_approve/" . $row->parts_id ?>" name="" id="" class="btn btn-success">Approved</a>
							<a href="<?php echo base_url() . "Partslisting/parts_decline/" . $row->parts_id ?>" name="" id="" class="btn btn-danger">Reject</a>	
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
	
