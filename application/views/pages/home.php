<!-- <h2><?= $title ?></h2> -->
<!-- <?php echo "<pre>";
print_r($this->session); // or print_r($_SESSION);
echo "</pre>"; ?> -->
<div class="container-fluid">
  <?php if($this->session->flashdata('user_pending')) : ?>
    <?php echo '<div class="alert alert-warning" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>' . $this->session->flashdata('user_pending') . '</div>'; ?>
  <?php endif; ?>
</div>

<div class="ccap-carousel">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo base_url(); ?>assets/images/10.jpg" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>CEBU CARS AND PARTS</h5>
          <p>BUY AND SELL USED CARS AND PARTS ONLINE.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url(); ?>assets/images/11.jpg" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>CEBU CARS AND PARTS</h5>
          <p>BUYING AND SELLING CARS AND PARTS SIMPLIFIED.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?php echo base_url(); ?>assets/images/12.jpg" class="d-block w-100 h-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>CEBU CARS AND PARTS</h5>
          <p>YOUR ONLINE PORTAL FOR USED CARS AND PARTS.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div class="container search-box-container mt-4">
	<input class="form-control search-box ml-auto mr-auto" type="text" placeholder="SEARCH FOR CARS OR PARTS">
</div>

<div class="container button-container text-center">
	<button type="button" class="btn btn-ccap ml-auto mr-auto">SEARCH</button>
</div>

<div class="container-fluid text-center mt-5">
  <div class="row">
    <div class="col-md">
      <div class="card bg-dark text-white rounded-0 border-0">
      <img class="card-img h-100" src="<?php echo base_url(); ?>assets/images/20.jpg" alt="Card image">
        <div class="card-img-overlay">
          <h5 class="card-title pt-5">Buy used cars and parts</h5>
          <p class="card-text">Find the greatest deals online for your choice.</p>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card bg-dark text-white rounded-0 border-0">
        <img class="card-img h-100" src="<?php echo base_url(); ?>assets/images/21.jpg" alt="Card image">
        <div class="card-img-overlay">
          <h5 class="card-title pt-5">Sell used cars and parts</h5>
          <p class="card-text">Sell your old cars or car parts online with the help of this website.</p>
        </div>
      </div>
    </div>

    <div class="col-md">
      <div class="card bg-dark text-white rounded-0 border-0">
        <img class="card-img h-100" src="<?php echo base_url(); ?>assets/images/22.jpg" alt="Card image">
        <div class="card-img-overlay">
          <h5 class="card-title pt-5">Post online</h5>
          <p class="card-text">Buy and sell used cars and parts and let the middlemen do the job.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt-5">
<h2 class="text-center">Recent Cars Listing</h2>
<hr>
  <div class="row mt-4">


<?php  
  $data = $this->db->query("SELECT * FROM `cars` WHERE `status` = 'Approved' ORDER BY `car_id` DESC LIMIT 8");

    if ($data->num_rows() > 0): ?>
    <?php foreach ($data->result_array() as $row): ?>
    <div class="col-md-3 text-center mb-4">
      
      <div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>

        <h4 align="center"><?php echo $row['make']; ?></h4>
        <h5 style="text-align:center;"><?php echo $row['model']; ?></h5>
        <img class="post-thumbnail img-thumbnail" src="assets/images/posts/<?php echo $row['post_image']; ?>">
        <a class="btn btn-ccap mt-2 mb-2" href="/ccap/carslisting/<?php echo $row['slug']; ?>">View Details</a>

      </div>    

    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>

</div>

<div class="container-fluid mt-5">
<h2 class="text-center">Recent Parts Listing</h2>
<hr>
  <div class="row mt-4">


<?php  
  $data = $this->db->query("SELECT * FROM `parts` WHERE `status` = 'Approved' ORDER BY `parts_id` LIMIT 8");

    if ($data->num_rows() > 0): ?>
    <?php foreach ($data->result_array() as $row): ?>
    <div class="col-md-3 text-center mb-4">
      
      <div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>

        <h4 align="center"><?php echo $row['brand']; ?></h4>
        <h5 style="text-align:center;"><?php echo $row['model_name']; ?></h5>
        <img class="post-thumbnail img-thumbnail" src="assets/images/posts/<?php echo $row['post_image']; ?>">
        <a class="btn btn-ccap mt-2 mb-2" href="/ccap/partslisting/<?php echo $row['slug']; ?>">View Details</a>

      </div>    

    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>

</div>
