<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cebu Cars and Parts</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/brands.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/solid.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	</head>

	<body>
		
	<nav class="navbar navbar-expand-lg navbar-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand" href="<?php echo base_url(); ?>"><h5 class="navlogo mr-5"><span class="blue">CEBU</span> <span class="orange">CARS AND PARTS</span></h5></a>
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Products
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="<?php echo base_url(); ?>carslisting">Cars</a>
	          <a class="dropdown-item" href="<?php echo base_url(); ?>partslisting">Parts</a>
	        </div>
	      </li>
	    </ul>
	    <?php if($this->session->userdata('logged_in')) : ?>
	    		
	      <ul class="navbar-nav home-header">
	      	<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         	<i class="fas fa-envelope" style="font-size: 1.5em;"><span class="badge badge-pill badge-light">5</span></i>
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	        </li>
					
					<li class="nav-item dropdown">
	      	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         	<i class="fas fa-bell" style="font-size: 1.5em;"><span class="badge badge-pill badge-light">8</span></i>
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	        </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         	<i class="fas fa-user-circle" style="font-size: 1.5em;"></i>
	        </a>
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Log Out</a>
	        </div>
	      	</li>
	      </ul>
	    <?php endif; ?>
	    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
	    <?php if(!$this->session->userdata('logged_in')) : ?>
	      <li class="nav-item">
	        <a class="nav-link rightnav" href="<?php echo base_url(); ?>users/login">LOG IN</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link rightnav" href="<?php echo base_url(); ?>users/register">REGISTER</a>
	      </li>
	    <?php endif; ?>
	    </ul>
	    
	  </div>
	</nav>