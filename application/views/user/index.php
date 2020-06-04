<div class="col-lg-9 mt-5">
    <div class="card p-5">
        <h2 class="mb-4">Profile User</h2>
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Daftar Alamat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Pengaturan Akun</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- Profile Page -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-lg-4">
                        <img class="w-100 img-thumbnail" src="<?= base_url('assets/product/user/') . $profile['user_img'] ?>" alt="">
                        <?= form_open_multipart('user/editImg'); ?>
                        <div class="form-group">
                            <input type="hidden" value="<?= $profile['user_id'] ?>" name="user_id">
                            <input type="file" class="form-control-file" id="image-profile" name="cover" required>
                            <button type="submit" class="btn btn-warning btn-sm w-100">Ubah Foto</button>
                        </div>
                        </form>
                    </div>
                    <div class="col-lg-8">
                        <h5 class="mb-4">Biodata Diri</h5>

                        <p>Nama : </p>
                        <p class="font-weight-bold"> <?= $profile['user_full_name'] ?> </p>

                        <p>Tanggal Lahir : </p>
                        <p class="font-weight-bold"> <?= $profile['user_birth_date'] ?> </p>

                        <p>Jenis Kelamin : </p>
                        <p class="font-weight-bold"> <?= $profile['user_gender'] ?> </p>

                        <button class="btn btn-warning mt-3" data-toggle="modal" data-target="#bio">Edit Biodata</button>
                    </div>
                </div>
            </div>
            <!-- End Profile Page -->
            <!-- Address Page -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#address">
                    Tambah Alamat
                </button>

                <div id="accordion">
                    <?php foreach ($address->result_array() as $key) : ?>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $key['address_id'] ?>" aria-expanded="false" aria-controls="collapseOne">
                                        <?= $key['address_name'] ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse<?= $key['address_id'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <p class="font-weight-bold">Provinsi : </p>
                                    <p> <?= $key['address_provinsi'] ?> </p>

                                    <p class="font-weight-bold">Kota : </p>
                                    <p> <?= $key['address_kota'] ?> </p>

                                    <p class="font-weight-bold">Kode Pos : </p>
                                    <p> <?= $key['address_zip_code'] ?> </p>

                                    <p class="font-weight-bold">Alamat : </p>
                                    <p> <?= $key['address_alamat'] ?> </p>

                                    <p class="font-weight-bold">No Hp : </p>
                                    <p> <?= $key['address_phone'] ?> </p>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!-- End Address Page -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>
</div>
<!-- /.col-lg-9 -->

<!-- Add Address -->
<div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="addressLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addressLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/addAddress') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" value="<?= $profile['user_address_id'] ?>" name="user_address">
                    <div class="form-group">
                        <label for="accepter">Nama Penerima</label>
                        <input type="text" class="form-control" id="accepter" name="accepter" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Hp</label>
                        <input type="text" class="form-control" id="phone" name="phone" maxlength="15" required>
                    </div>

                    <div class="form-group">
                        <label for="prov">Provinsi</label>
                        <select class="form-control" id="prov" name="prov" required>
                            <option selected disabled>-- Pilih Provinsi --</option>
                            <?php foreach ($prov as $key) : ?>
                                <option value="<?= $key['nama'] ?>" data-id="<?= $key['id_prov'] ?>"><?= $key['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group detail">
                        <label for="kota">Kota</label>
                        <select class="form-control" id="kota" name="kota" required>
                            <option selected disabled>-- Pilih Kota --</option>
                        </select>
                    </div>

                    <div class="form-group detail">
                        <label for="zip_code">Kode Pos</label>
                        <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                    </div>

                    <div class="form-group detail">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="3" placeholder="Kecamatan, Kelurahan, alamat rumah..." name="address" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Biodata -->
<div class="modal fade" id="bio" tabindex="-1" role="dialog" aria-labelledby="bioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bioLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('user/editBio') ?>">
                <div class="modal-body">
                    <input type="hidden" value="<?= $profile['user_id'] ?>" name="user_id">
                    <div class="form-group">
                        <label for="fullname" class="text-uppercase">Full Name</label>
                        <input type="text" class="form-control" placeholder="" name="fullname" required value="<?= $profile['user_full_name'] ?>">
                        <small><?= form_error('fullname'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="date_birth" class="text-uppercase">Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="" name="date_birth" required value="<?= $profile['user_birth_date'] ?>">
                        <small><?= form_error('date_birth'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="text-uppercase">Tanggal Lahir</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>