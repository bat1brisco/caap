<div class="container register">
	<div class="row">
		<!-- <div class="col-7 pr-0">

			<div class="banner-reg-log">
				<h1><span class="blue">CEBU</span></h1>
			<h1><span class="orange">CARS AND PARTS</span></h1>
			<p><em>Your Cars and Car Parts Online Portal. Buy and Sell used cars and parts online.</em></p>
			</div>


		</div> -->

		<div class="col-12 p-3">

		<?php echo form_open('users/register', array('id' => 'form-users')); ?>
			<h4 class="text-center">Register</h4>
			<div class="row mt-5 mb-4">
				<div class="col-md">
					<label for="">First Name</label>
						<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>">
						<span class="text-danger">
						<?php echo form_error('fname'); ?>
					</span>
				</div>

				

				<div class="col-md">
					<label for="">Middle Name</label>
						<input type="text" class="form-control" name="mname" id="mname" placeholder="Middle Name" value="<?php echo isset($_POST["mname"]) ? $_POST["mname"] : ''; ?>">
<span class="text-danger">
						<?php echo form_error('mname'); ?>
					</span>
				</div>

				

				<div class="col-md">
					<label for="">Last Name</label>
						<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>">
						<span class="text-danger">
						<?php echo form_error('lname'); ?>
					</span>
				</div>

				
			</div>

			<div class="row mb-4">
				<div class="col-md">
					<label for="">Address</label>
						<input type="text" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>">
							<span class="text-danger">
						<?php echo form_error('address'); ?>
					</span>
				</div>

			

				<div class="col-md">
					<label for="">Contact</label>
						<input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" value="<?php echo isset($_POST["contact"]) ? $_POST["contact"] : ''; ?>">
							<span class="text-danger">
						<?php echo form_error('contact'); ?>
					</span>
				</div>

			

				<div class="col-md">
					<label for="">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
						<span class="text-danger">
						<?php echo form_error('email'); ?>
					</span>
				</div>

				
			</div>

			<div class="row mb-4">
				<div class="col-md">
					<label for="">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
						<span class="text-danger">
						<?php echo form_error('password'); ?>
					</span>
				</div>

				

				<div class="col-md">
					<label for="">Confirm Password</label>
						<input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Password">
						<span class="text-danger">
						<?php echo form_error('password_confirm'); ?>
					</span>
				</div>

				
			</div>
					

					

					<button type="submit" class="btn btn-primary float-right">Submit</button>


		<?php echo form_close(); ?>

		</div>
	</div>
</div>

