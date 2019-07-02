<h4><?= $title; ?></h4>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('carslisting/create'); ?>
  <div class="form-group">
    <label for="inputmake" class="col-sm-2 control-label">Make</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputMake" name="make" placeholder="Car make (e.g. Toyota, Honda, Suzuki.......)" value="<?php echo isset($_POST["make"]) ? $_POST["make"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputmodel" class="col-sm-2 control-label">Model</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputModel" name="model" placeholder="Car model (e.g. Jazz, Civic, Camry.......)" value="<?php echo isset($_POST["model"]) ? $_POST["model"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputyear" class="col-sm-2 control-label">Year</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputYear" name="year" placeholder="" value="<?php echo isset($_POST["year"]) ? $_POST["year"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputprice" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPrice" name="price" placeholder="" value="<?php echo isset($_POST["price"]) ? $_POST["price"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputransmission" class="col-sm-2 control-label">Transmission</label>
    <div class="col-sm-10">
      <!-- <input type="text" class="form-control" id="inputMake" placeholder=""> -->
      <select class="form-control" name="transmission">
			  <option value="Manual">Manual</option>
			  <option value="Automatic">Automatic</option>
			</select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputbody" class="col-sm-2 control-label">Body Style</label>
    <div class="col-sm-10">
      <select class="form-control" name="body_style">
			  <option value="Sedan">Sedan</option>
			  <option value="Pickup">Pick Up</option>
			  <option value="Coupe">Coupe</option>
			  <option value="SUV">SUV</option>
			  <option value="Hatchback">Hatchback</option>
			  <option value="Van">Van</option>
			  <option value="Minivan">Minivan</option>
			</select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputmileage" class="col-sm-2 control-label">Mileage</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputMileage" name="mileage" placeholder="" value="<?php echo isset($_POST["mileage"]) ? $_POST["mileage"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputengine" class="col-sm-2 control-label">Engine</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEngine" name="cylinder_engine" placeholder="e.g. 1.5 Liter Inline 4" value="<?php echo isset($_POST["cylinder_engine"]) ? $_POST["cylinder_engine"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdrive" class="col-sm-2 control-label">Drive Type</label>
    <div class="col-sm-10">
      <select class="form-control" name="drive_type">
			  <option value="AWD">AWD</option>
			  <option value="4WD">4WD</option>
			  <option value="FWD">FWD</option>
			  <option value="RWD">RWD</option>
			</select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputfuel" class="col-sm-2 control-label">Fuel Type</label>
    <div class="col-sm-10">
      <select class="form-control" name="fuel_type">
			  <option value="Gasoline">Gasoline</option>
			  <option value="Diesel">Diesel</option>
			  <option value="LPG">LPG</option>
			  <option value="Ethanol">Ethanol</option>
			  <option value="Bio-diesel">Bio-diesel</option>
			</select>
    </div>
  </div>

	<div class="form-group">
    <label for="inputcapacity" class="col-sm-2 control-label">Seating Capacity</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputMake" name="seating_capacity" placeholder="" value="<?php echo isset($_POST["seating_capacity"]) ? $_POST["seating_capacity"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdoors" class="col-sm-2 control-label">Doors</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputMake" name="door" placeholder="" value="<?php echo isset($_POST["door"]) ? $_POST["door"] : ''; ?>">
    </div>
  </div>

	<div class="form-group">
    <label for="inputcolor" class="col-sm-2 control-label">Color</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputMake" name="color" placeholder="" value="<?php echo isset($_POST["color"]) ? $_POST["color"] : ''; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="description" value="<?php echo isset($_POST["description"]) ? $_POST["description"] : ''; ?>"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputrfs" class="col-sm-2 control-label">Reason for Selling</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="rfs" value="<?php echo isset($_POST["rfs"]) ? $_POST["rfs"] : ''; ?>"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="">Upload Image</label>
    <input type="file" name="userfile" value="Upload Images">
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-ccap">Post</button>
    </div>
  </div>
</form>
