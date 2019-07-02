<div class="container">
	<div class="row">
		<h4>Product Details</h4>
	</div>

  <?php echo form_open('carslisting/update'); ?>
  <input type="hidden" name="car_id" value="<?php echo $car['car_id']; ?>">
  <input type="hidden" name="slug" value="<?php echo $car['slug']; ?>">
    <div class="row">
      <div class="col-md pl-0">
        <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $car['post_image']; ?>" alt="" class="img-thumbnail">
      </div>

      <div class="col-md pt-5 pb-5 car-price">
        <h1 class="ml-3">Year: <input type="text" class="form-control" name="year" value="<?php echo $car['year']; ?>">Make: <input type="text" class="form-control" name="make" value="<?php echo $car['make']; ?>">Model: <input type="text" class="form-control" name="model" value="<?php echo $car['model']; ?>"> </h1>
        <h3 class="ml-3">Price: Php. <span><input type="text" class="form-control" name="price" value="<?php echo $car['price']; ?>"></span></h3>
        <h5 class="ml-3">Description:</h5>
        <h5 class="ml-3"><input type="text" class="form-control" name="description" value="<?php echo $car['description']; ?>"> </h5>
        <?php if($this->session->userdata('logged_in')) : ?>
        <div class="row">
          <div class="col-md text-center">
            <a class="btn btn-ccap btn-lg mt-5" href="<?php echo base_url(); ?>chat">Talk to a Middleman</a>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="row text-center mt-4">
      <div class="col-md text-center">
        <h4>Product Specifications</h4>
      </div>
    </div>

    <div class="row mt-4 text-center">
      <div class="col-md spec-panel-1 ml-1 mr-1 pt-3">
        <div class="row">
          <div class="col-md-6">
            <p>Make</p>
            <p>Model</p>
            <p>Year</p>
            <p>Body Style</p>
          </div>
          <div class="col-md-1">
            <p>:</p>
            <p>:</p>
            <p>:</p>
            <p>:</p>
          </div>
          <div class="col-md-5">
            <p><input type="text" class="form-control" name="make" value="<?php echo $car['make']; ?>"></p>
            <p><input type="text" class="form-control" name="model" value="<?php echo $car['model']; ?>"></p>
            <p><input type="text" class="form-control" name="year" value="<?php echo $car['year']; ?>"></p>
            <p><input type="text" class="form-control" name="body_style" value="<?php echo $car['body_style']; ?>"></p>
          </div>
        </div>
      </div>

      <div class="col-md spec-panel-1 ml-1 mr-1 pt-3">
        <div class="row">
          <div class="col-md-6">
            <p>Seating Capacity</p>
            <p>No. of Doors</p>
            <p>Color</p>
            <p>Transmission</p>
          </div>
          <div class="col-md-1">
            <p>:</p>
            <p>:</p>
            <p>:</p>
            <p>:</p>
          </div>
          <div class="col-md-5">
            <p><input type="text" class="form-control" name="seating_capacity" value="<?php echo $car['seating_capacity']; ?>"></p>
            <p><input type="text" class="form-control" name="door" value="<?php echo $car['door']; ?>"></p>
            <p><input type="text" class="form-control" name="color" value="<?php echo $car['color']; ?>"></p>
            <p><input type="text" class="form-control" name="transmission" value="<?php echo $car['transmission']; ?>"></p>
          </div>
        </div>
      </div>

      <div class="col-md spec-panel-1 ml-1 mr-1 pt-3">
        <div class="row">
          <div class="col-md-6">
            <p>Fuel Type</p>
            <p>Drive Type</p>
            <p>Mileage</p>
            <p>Reason for Selling</p>
          </div>
          <div class="col-md-1">
            <p>:</p>
            <p>:</p>
            <p>:</p>
            <p>:</p>
          </div>
          <div class="col-md-5">
            <p><input type="text" class="form-control" name="fuel_type" value="<?php echo $car['fuel_type']; ?>"></p>
            <p><input type="text" class="form-control" name="drive_type" value="<?php echo $car['drive_type']; ?>"></p>
            <p><input type="text" class="form-control" name="mileage" value="<?php echo $car['mileage']; ?>"></p>
            <p><input type="text" class="form-control" name="rfs" value="<?php echo $car['rfs']; ?>"></p>
          </div>
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>

	</form>
</div>
