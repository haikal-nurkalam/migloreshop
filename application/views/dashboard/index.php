  <div class="col-lg-9">

    <div id="carouselExampleIndicators" class="carousel shadow slide my-5" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid" src="<?= base_url('assets/') ?>img/foodshop2.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?= base_url('assets/') ?>img/bg1.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block img-fluid" src="<?= base_url('assets/') ?>img/bg2.png" alt="Third slide">
        </div>
      </div>
    </div>

    <div class="row">

      <?php if ($product->num_rows() == 0) : ?>
        <div class="alert alert-danger w-100 text-center p-3" role="alert">
          <h3>404 NOT FOUND</h3>
          <p>Product not yet available</p>
        </div>
      <?php endif; ?>

      <?php foreach ($product->result_array() as $key) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-70 shadow-sm">
            <a href="<?= base_url('product/view/') . $key['product_id'] ?>"><img class="card-img-top p-img-top" src="<?= base_url('assets/product/img/') . $key['product_img'] ?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title text-truncate">
                <a href="<?= base_url('product/view/') . $key['product_id'] ?>"><?= $key['product_name'] ?></a>
              </h4>
              <h5>Rp.<?= number_format($key['product_price'], 0, ',', '.'); ?></h5>
              <p class="card-text text-truncate"><?= $key['product_desc'] ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->