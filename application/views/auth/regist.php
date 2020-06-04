<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/login.css">
     <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec" style="min-height: 600px;">
                    <a href="<?= base_url() ?>">
                        <img class="mx-auto d-block mb-5" src="<?= base_url('assets/') ?>img/logoweb.png" alt="" width="100">
                    </a>
                    <!-- <h2 class="text-center">Login Now</h2> -->
                    <form class="login-form" method="post" action="<?= base_url('auth/register_validator') ?>">
                        <div class="form-group">
                            <label for="fullname" class="text-uppercase">Full Name</label>
                            <input type="text" class="form-control" placeholder="" name="fullname" required value="<?= set_value('fullname') ?>">
                            <small><?= form_error('fullname'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-uppercase">Email Address</label>
                            <input type="email" class="form-control" placeholder="" name="email" required value="<?= set_value('email') ?>">
                            <small><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="username" class="text-uppercase">Username</label>
                            <input type="text" class="form-control" placeholder="" name="username" required value="<?= set_value('username') ?>">
                            <small><?= form_error('username'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-uppercase">Password</label>
                            <input type="password" class="form-control" placeholder="" name="password" required>
                            <small><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-uppercase">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="" name="password2" required>
                            <small><?= form_error('password2'); ?></small>
                        </div>
                        <div class="form-check">
                            <button type="submit" class="btn btn-primary w-100" style="margin-left:-3% !important;">Register</button>
                        </div>
                    </form>
                    <div class="copy-text">Already have an account ? <a href="<?= base_url('auth/login') ?>">Log In</a></div>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="<?= base_url('assets/') ?>img/bg1.png" alt="First slide" style="min-height: 700px;">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2 class="text-shadow">Ini Toko Makanan</h2>
                                        <p>Ini toko yang menjual makanan dan minuman ke seluruh Indonesia</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?= base_url('assets/') ?>img/mie.png" alt="First slide" style="min-height: 700px;">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Miglore</h2>
                                        <p>Nama miglore terinspirasi dari singkatan Mie goreng pake telor</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="<?= base_url('assets/') ?>img/bg2.png" alt="First slide" style="min-height: 700px;">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Silakan Menikmati</h2>
                                        <p>Silakan menikati makanan dan minuman yang kami sediakan, dan jangan lupa feedback yaa :)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/') ?>js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/ajax/admin.js"></script>
</body>

</html>