	
	<div class="footer">
	
		<div class="container-fluid">
			<div class="row">
				<div class="col-md">
				<h4 class="text-center footer-text"><span class="blue">CEBU</span> <span class="orange">CARS AND PARTS</span></h4>

					<h6 class="mt-4">About Us</h6>
					<!-- <hr class="border-white"> -->
					<p class="text-justify mt-3">
						Cebu Cars and Parts is an online web portal dedicated to Cebu buyers and sellers of cars and parts. Its main objective is to provide a user-friendly, secure, and interactive platform that enables buying and selling easier for its users, buyers and sellers alike. 
					</p>
				</div>

				<div class="col-md pt-1">
					<h6 class="mt-5 pt-4">Contact Us</h6>
					<hr class="border-white">
					<h6>Email</h6>
					<p>cebucarsandparts@gmail.com</p>

					<h6>Contact Number</h6>
					<p>(032) 244 - 9000</p>
					<p>0917 - 855 - 4752</p>

				</div>

				<div class="col-md pt-1">
					<p class="mt-5 pt-4">CARS</p>
					<p>PARTS</p>
					<p>BLOG</p>
					<p>REVIEWS</p>

					<h5>FOLLOW US ON SOCIAL MEDIA</h5>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md"><i class="fab fa-facebook fa-2x"></i></div>
							<div class="col-md"><i class="fab fa-instagram fa-2x"></i></div>
							<div class="col-md"><i class="fab fa-twitter fa-2x"></i></div>
							<div class="col-md"><i class="fab fa-youtube fa-2x"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<p class="text-center mt-5 pt-1">&copy; 2019 CEBU CARS AND PARTS</p>
	</div>

	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/DataTables/DataTables1/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/DataTables/DataTables1/js/dataTables.bootstrap4.min.js"></script>
	
	<script src="<?php echo base_url(); ?>assets/js/effects.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/chat.js"></script>
	
	<script>
		$('#cars-table').DataTable({
			"autoWidth": false,
			"pageLength": 10,
			"filter": true,
			"deferRender": true
		});

		$('#users-table').DataTable({
			"autoWidth": false,
			"pageLength": 10,
			"filter": true,
			"deferRender": true
		});

		$('#parts-table').DataTable({
			"autoWidth": false,
			"pageLength": 10,
			"filter": true,
			"deferRender": true
		});
	</script>
</body>
</html>