<div class="container-fluid">
</div>
<div class="container login mt-3">
	<div class="row">
		<div class="col-7 pr-0">

			<div class="banner-reg-log">
				<h1><span class="blue">CEBU</span></h1>
			<h1><span class="orange">CARS AND PARTS</span></h1>
			<p><em>Your Cars and Car Parts Online Portal. Buy and Sell used cars and parts online.</em></p>
			</div>

			
		</div>

		<div class="col-5 p-3 login">
			
		
			<!-- <?php echo validation_errors(); ?> -->
		

		<?php echo form_open('users/login'); ?>
		
				
					<h4 class="text-center"><?= $title; ?></h4>

					<div class="container-fluid">
					  <?php if($this->session->flashdata('login_failed')) : ?>
					    <?php echo '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>' . $this->session->flashdata('login_failed') . '</div>'; ?>
					  <?php endif; ?>
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
					</div>

					<span class="text-danger">
						<?php echo form_error('email'); ?>
					</span>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
					</div>

					<span class="text-danger">
						<?php echo form_error('password'); ?>
					</span>

					<button type="submit" class="btn btn-primary float-right">Submit</button>
				
			
		<?php echo form_close(); ?>
		</div>
	</div>
</div>