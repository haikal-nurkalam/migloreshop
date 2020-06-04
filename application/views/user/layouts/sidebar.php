  <!-- Page Content -->
  <div class="container">

      <div class="row">

          <!-- Kolom Samping Kiri -->
          <div class="col-lg-3">

              <!-- Cek Login Status -->
              <?php if ($this->session->userdata('logged_in')) : ?>
                  <div class="card mt-5 p-5">
                      <img src="<?= base_url('assets/product/user/') . $this->session->userdata('cover_img') ?>" alt="Profile" class="w-100">
                      <h4 class="text-center my-3 text-truncate"><b> <?= $this->session->userdata('user_name') ?></b></h4>
                      <?php if ($this->session->userdata('role') == 1) : ?>
                          <a href="<?= base_url('admin') ?>" class="btn btn-outline-info">Admin</a>
                      <?php else : ?>
                          <a href="<?= base_url('user/profile') ?>" class="btn btn-outline-info">Profile</a>
                          <div class="divinder my-2"></div>
                          <a href="<?= base_url('user/cart') ?>" class="btn btn-outline-info">Shopping Cart</a>
                      <?php endif; ?>
                      <div class="divinder my-2"></div>
                      <a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-danger">Logout</a>
                  </div>
              <?php else : ?>
                  <div class="card mt-5 p-5">
                      <h4 class="text-center mb-4"><b> Login to continue</b></h4>
                      <a href="<?= base_url('auth/login') ?>" class="btn btn-outline-info">Login</a>
                      <div class="divinder my-2"></div>
                      <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-info">Register</a>
                  </div>
              <?php endif; ?>

              <ul class="list-group shadow mt-5">
                  <li href="#" class="list-group-item ">
                      <h4><b>Category</b></h4>
                  </li>
                  <?php foreach ($category as $key) : ?>
                      <a href="<?= base_url('dashboard/category/') . $key['category_id'] ?>" class="list-group-item"><?= $key['category_name'] ?></a>
                  <?php endforeach; ?>
              </ul>


          </div>
          <!-- /.col-lg-3 -->