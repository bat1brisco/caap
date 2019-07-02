<div class="container">
	<div class="row">
		<div class="col-md">
			
		</div>

		<div class="col-md-7">
		<?php if($this->session->userdata('logged_in')) : ?>
		<ul class="navbar-nav float-left ml-5">
	  <li class="nav-item filternav">
			<a class="nav-link" href="#" id="navbarDropdown" role="button">
	      <i class="fas fa-sliders-h" style="font-size: 1.5em;"></i>
	    </a>
	  </li>
	</ul>
<?php endif; ?>
			<form class="form-inline my-2 my-lg-0 ml-5">
	  <input class="form-control mr-sm-2 top-navbar-custom ml-3" type="search" placeholder="Search" aria-label="Search">
	  <button class="btn btn-ccap my-2 my-sm-0" type="submit">Search</button>  	
	</form>
	
		</div>

		<div class="col-md">
			
		</div>
	</div>
</div>

<div class="container-fluid partsfilter" style="display:none">
	<div class="row row-filter">
		<div class="col-md">
			<div class="list-group">
				<h6>Category</h6>
				<?php  
					foreach ($category_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector category" value="<?php echo $row['category']?>">
								<?php echo $row['category']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="col-md">
			<div class="list-group">
				<h6>Brand</h6>
				<?php  
					foreach ($brand_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector brand" value="<?php echo $row['brand']?>">
								<?php echo $row['brand']; ?>
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
				<h6>Model Name</h6>
				<?php  
					foreach ($model_name_data->result_array() as $row) {
				?>
						<div class="list-group-item checkbox">
							<label class="filter">
								<input type="checkbox" class="common_selector model_name" value="<?php echo $row['model_name']?>">
								<?php echo $row['model_name']; ?>
							</label>
						</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>	
</div>

<div class="container">
				<div class="row mb-3">
					<h2><?= $title ?></h2>
				</div>
				<div class="row mb-3">
					<?php if($this->session->userdata('logged_in')) : ?>
					<a class="btn btn-ccap" href="<?php echo base_url(); ?>partslisting/create">Sell Car</a>
					<?php endif; ?>

				</div>

				<div class="row filter_data">
					
				</div>

				<div class="row pagination-row">
					<div class="ml-auto mr-auto" id="pagination_link">
						
					</div>
				</div>

			</div>