<div class="container">
	<div class="row">
		<h4>Product Details</h4>
	</div>

	<div class="row">
		<div class="col-md pl-0">
			<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $part['post_image']; ?>" alt="" class="img-thumbnail">
		</div>

		<div class="col-md pt-5 pb-5 car-price">
			<h1 class="ml-3"><?php echo $part['brand']; ?> <?php echo $part['model_name']; ?></h1>
			<h3 class="ml-3">Price: Php. <span><?php echo $part['price']; ?></span></h3>
			<h5 class="ml-3">Description:</h5>
			<h5 class="ml-3"><?php echo $part['description']; ?></h5>
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
					<p>Brand</p>
					<p>Model</p>
					<p>Quantity</p>
					<p>Color</p>
					<p>Reason For Selling</p>
				</div>
				<div class="col-md-1">
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</div>
				<div class="col-md-5">
					<p><?php echo $part['brand']; ?></p>
					<p><?php echo $part['model_name']; ?></p>
					<p><?php echo $part['parts_quantity']; ?></p>
					<p><?php echo $part['color']; ?></p>
					<p><?php echo $part['rfs']; ?></p>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="container mt-5">
	<h3>Comments</h3>
	<?php if($comments) : ?>
		<?php foreach($comments as $comment) : ?>
			<div class="well">
				<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No comments to display</p>
	<?php endif; ?>
	<hr>

	<h3>Add Comment</h3>

	<?php echo validation_errors(); ?>

	<?php echo form_open('parts_comments/create/' . $part['parts_id']); ?>
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control">
		</div>

		<div class="form-group">
			<label>Body</label>
			<textarea name="body" class="form-control"></textarea>
		</div>
		<input type="hidden" name="slug" value="<?php echo $part['slug']; ?>">
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
