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
	  <a class="navbar-brand" href="<?php echo base_url(); ?>"><h5 class="navlogo"><span class="blue">CEBU</span> <span class="orange">CARS AND PARTS</span></h5></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <!-- <ul class="navbar-nav mr-5">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Link</a>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Dropdown
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	      </li>
	    </ul> -->
	    <ul class="navbar-nav ml-auto mr-0">
	      	<li class="nav-item filternav">
						<a class="nav-link" href="#" id="navbarDropdown" role="button">
	         	<i class="fas fa-sliders-h" style="font-size: 1.5em;"></i>
	        </a>
	        <!-- <div class="dropdown-menu dropdown-custom-width" aria-labelledby="navbarDropdown">
	          <form class="px-4 py-3">
					    <div class="form-row">

						    <div class="form-group form-check col-md-4">
						    	
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carMake">
						      <label for="inputMake">Make</label>
      						<input type="text" class="form-control" id="inputMake">
						    
						    </div>

						    <div class="form-group form-check col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carModel">
						      <label for="inputModel">Model</label>
						      <input type="text" class="form-control" id="inputModel">
						    </div>

						    <div class="form-group form-check col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carYear">
						      <label for="inputYear">Year</label>
						      <input type="text" class="form-control" id="inputYear">
						    </div>

						  </div>

						  <div class="dropdown-divider"></div>

						  <div class="form-row">

						    <div class="form-group col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carTransmission">
						      <label for="inputTransmission">Transmission</label>
						      <select id="inputTransmission" class="form-control">
						        <option selected>Choose...</option>
						        <option>...</option>
						      </select>
						    </div>

						    <div class="form-group col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carCapacity">
						      <label for="inputCapacity">Seating Capacity</label>
						      <select id="inputCapacity" class="form-control">
						        <option selected>Choose...</option>
						        <option>...</option>
						      </select>
						    </div>

						    <div class="form-group col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carBody">
						      <label for="inputBody">Body Style</label>
						      <select id="inputBody" class="form-control">
						        <option selected>Choose...</option>
						        <option>...</option>
						      </select>
						    </div>

						  </div>

						  <div class="dropdown-divider"></div>

						  <div class="form-row">

						    <div class="form-group col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carFuel">
						      <label for="inputFuel">Fuel Type</label>
						      <select id="inputFuel" class="form-control">
						        <option selected>Choose...</option>
						        <option>...</option>
						      </select>
						    </div>

						    <div class="form-group col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carEngine">
						      <label for="inputEngine">Engine</label>
						      <select id="inputEngine" class="form-control">
						        <option selected>Choose...</option>
						        <option>...</option>
						      </select>
						    </div>

						    <div class="form-group col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carTrain">
						      <label for="inputDrivetrain">Drive Train</label>
						      <select id="inputDrivetrain" class="form-control">
						        <option selected>Choose...</option>
						        <option>...</option>
						      </select>
						    </div>

						  </div>

						  <div class="dropdown-divider"></div>

						  <div class="form-row justify-content-md-center">

						    <div class="form-group col-md-4">
						    	<input type="checkbox" class="form-check-input position-static ml-1" id="carColor">
						      <label for="inputColor">Color</label>
						      <input type="text" class="form-control" id="inputColor">
						    </div>

						  </div>
					  </form>

					  <div class="dropdown-divider"></div>
					  	<div class="row justify-content-end">
					  		<a class="btn btn-primary mr-4" href="#">Search</a>
					  	</div>
	        </div> -->
	        </li>
	      </ul>
	    <form class="form-inline my-2 my-lg-0 mr-auto">
	      <input class="form-control mr-sm-2 top-navbar-custom" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	      	
	    </form>
	    		
	      <ul class="navbar-nav mr-0">
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
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      	</li>
	      </ul>
	  </div>
	</nav>