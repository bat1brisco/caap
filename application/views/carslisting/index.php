<div class="container">
	<div class="row">
		<div class="col-md">
			
		</div>

		<div class="col-md-7">
		<?php if($this->session->userdata('logged_in')) : ?>
		<ul class="navbar-nav float-left sub-nav">
	  <li class="nav-item filternav">
			<a class="nav-link" href="#" id="navbarDropdown" role="button">
	      <i class="fas fa-sliders-h" style="font-size: 1.5em;"></i>
	    </a>
	  </li>
	</ul>
<?php endif; ?>
			<form class="form-inline my-2 my-lg-0 ml-5">
	  <input class="form-control mr-sm-2 top-navbar-custom ml-auto" type="search" placeholder="Search" aria-label="Search">
	  <button class="btn btn-ccap my-2 my-sm-0 mr-auto" type="submit">Search</button>  	
	</form>
	
		</div>

		<div class="col-md">
			
		</div>
	</div>
</div>
<div class="container carfilter" style="display:none">
	<div class="row row-filter">
		<div class="col-md">
			<div class="list-group">
				<h6>Make</h6>
				<?php  
					foreach ($make_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector make" value="<?php echo $row['make']?>">
								<?php echo $row['make']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Model</h6>
				<?php  
					foreach ($model_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector model" value="<?php echo $row['model']?>">
								<?php echo $row['model']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Year</h6>
				<?php  
					foreach ($year_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector year" value="<?php echo $row['year']?>">
								<?php echo $row['year']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Transmission</h6>
				<?php  
					foreach ($transmission_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector transmission" value="<?php echo $row['transmission']?>">
								<?php echo $row['transmission']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Seating Capacity</h6>
				<?php  
					foreach ($capacity_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector seating_capacity" value="<?php echo $row['seating_capacity']?>">
								<?php echo $row['seating_capacity']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>	

	<div class="row row-filter">
		<div class="col-md">
			<div class="list-group">
				<h6>Body</h6>
				<?php  
					foreach ($body_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector body_style" value="<?php echo $row['body_style']?>">
								<?php echo $row['body_style']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Drivetrain</h6>
				<?php  
					foreach ($drivetype_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector drive_type" value="<?php echo $row['drive_type']?>">
								<?php echo $row['drive_type']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Fuel Type</h6>
				<?php  
					foreach ($fueltype_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector fuel_type" value="<?php echo $row['fuel_type']?>">
								<?php echo $row['fuel_type']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Color</h6>
				<?php  
					foreach ($color_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector color" value="<?php echo $row['color']?>">
								<?php echo $row['color']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Engine</h6>
				<?php  
					foreach ($cylinder_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector cylinder_engine" value="<?php echo $row['cylinder_engine']?>">
								<?php echo $row['cylinder_engine']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>


<!-- 		<div class="col-md-2 p-0">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link active rounded-0" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
			  <a class="nav-link rounded-0" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cars</a>
			  <a class="nav-link rounded-0" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Parts</a>
			  <a class="nav-link rounded-0" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Chat</a>
			</div>
    </div> -->
			<!-- <div class="container-fluid main-container">
				
			</div> -->

			<div class="container">

				<?php if($this->session->flashdata('post_updated')): ?>
  					<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
				<?php endif; ?>

				<!-- <div class="row">
					<div class="col-md-2">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						  <a class="nav-link active rounded-0" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">My Dashboard</a>
						  <a class="nav-link rounded-0" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cars</a>
						  <a class="nav-link rounded-0" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Parts</a>
						  <a class="nav-link rounded-0" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
						</div>
					</div>

					<div class="col-md-10">
						
					</div>
				</div> -->
				<div class="row mb-3">
							<h2><?= $title ?></h2>
						</div>
						<div class="row mb-3">
							<?php if($this->session->userdata('logged_in')) : ?>
							<a class="btn btn-ccap" href="<?php echo base_url(); ?>carslisting/create">Sell Car</a>
							<?php endif; ?>

						</div>

						<div class="row filter_data">
							
						</div>

						<div class="row pagination-row">
							<div class="ml-auto mr-auto" id="pagination_link">
								
							</div>
						</div>

			</div>
				
		