  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow">
      <div class="container">
          <a class="navbar-brand" href="<?= base_url() ?>">
              <img src="<?= base_url('assets/') ?>img/logoweb.png" alt="" width="50">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav mr-auto ml-lg-5">
                  <form class="form-inline my-2 my-lg-0" method="get" action="<?= base_url('dashboard/search/') ?>">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="keyword">
                      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                  </form>
              </ul>
          </div>
      </div>
  </nav>