<div class="container-fluid table-responsive" id="table-container1">
	
	<div class="row">
		<div class="col-md pl-0 admin-sidebar pt-5 pl-3">

			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>admindashboard">My Dashboard</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/manage_account">Manage Registration</a>
			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url(); ?>Carslisting/manage_cars">Manage Car Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Partslisting/manage_parts">Manage Parts Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/administer_accounts">Users List</a>
			<a class="nav-link rounded-0 mb-1" href="">Reports</a>

		</div>

		<div class="col-md-10 p-5">
			<table class="display table table-striped table-bordered text-center" id="cars-table"  style="width:100%">
		
				<thead>
					<tr>
						<th>Make Model Year</th>
						<th>Price</th>
						<th>Body Style</th>
						<th>Contact Number</th>
						<th>Transmission</th>
					</tr>
				</thead>

				<tbody>
				<?php 
					if ($cars->num_rows() > 0) {
						foreach ($cars->result() as $row) {
				?>
					<tr>
						<td><?php echo $row->make . " " . $row->model . " " .$row->year; ?></td>
						<td><?php echo $row->price; ?></td>
						<td><?php echo $row->body_style; ?></td>
						<td><?php echo $row->transmission; ?></td>
						<td>
							<a href="<?php echo base_url() . "Carslisting/cars_approve/" . $row->car_id ?>" name="" id="" class="btn btn-success">Approved</a>
							<a href="<?php echo base_url() . "Carslisting/cars_decline/" . $row->car_id ?>" name="" id="" class="btn btn-danger">Reject</a>	
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




