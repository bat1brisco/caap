<h4><?= $title; ?></h4>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('partslisting/create'); ?>
  <div class="form-group">
    <label for="inputcategory" class="col-sm-2 control-label">Category</label>
    <div class="col-sm-10">
      <select class="form-control" name="category">
			  <option value="Wheels">Wheels</option>
			  <option value="Tires">Tires</option>
			  <option value="Internal Accesories">Internal Accessories</option>
			  <option value="Suspension">Suspension</option>
			  <option value="Transmission">Transmission</option>
        <option value="Drive Shafts">Drive Shafts</option>
        <option value="Brakes">Brakes</option>
        <option value="Engine">Engine</option>
        <option value="External Accessories">External Accessories</option>
			</select>
    </div>
  </div>

	<div class="form-group">
    <label for="inputcapacity" class="col-sm-2 control-label">Brand</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputBrand" name="brand" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdoors" class="col-sm-2 control-label">Model Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputModelName" name="model_name" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdoors" class="col-sm-2 control-label">Quantity</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="inputModelName" name="parts_quantity" step="1" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdoors" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputModelName" name="price" placeholder="">
    </div>
  </div>

	<div class="form-group">
    <label for="inputcolor" class="col-sm-2 control-label">Color</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputMake" name="color" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="inputdescription" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="description"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputrfs" class="col-sm-2 control-label">Reason for Selling</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="3" name="rfs"></textarea>
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