<div class="col-lg-9 mt-4">
    <div class="card mt-4">
        <img class="card-img-top img-fluid" src="<?= base_url('assets/product/img/') . $product['product_img'] ?>" alt="">
        <div class="card-body">
            <h3 class="card-title"><?= $product['product_name'] ?></h3>
            <h4>Rp.<?= number_format($product['product_price'], 0, ',', '.'); ?></h4>
      
            <p class="card-text my-5"><?= $product['product_desc'] ?></p>
            <div class="btn-group w-100" role="group" aria-label="Basic example">
                <a href="<?= base_url('transaction/chat/') . $product['product_name'] ?>" target="_blank" class="btn btn-info">Chat</a>
                <a href="<?= base_url('transaction/addWish/') . $product['product_id'] ?>" class="btn btn-primary mx-2">Wishlist</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#buy" id="buy-btn">Buy</button>
            </div>

        </div>
    </div>
    <!-- /.card -->

    <div class="card card-outline-secondary my-4">
        <div class="card-header">
            Product Reviews
        </div>
        <div class="card-body">
            <?php if ($review->num_rows() != 0) : ?>
                <?php foreach ($review->result_array() as $key) : ?>
                    <p><?= $key['ulasan_text'] ?></p>
                    <small class="text-muted">Posted by Anonymous on <?= $key['created_at'] ?></small>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

    <!-- Buy Modal -->
    <div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="buyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyLabel">Info Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('transaction/buy') ?>">
                    <div class="modal-body">
                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                        <div class="form-group">
                            <label for="product_name">Nama Produk</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product['product_name'] ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="product_price">Harga Produk</label>
                            <input type="text" class="form-control" id="product_price" name="product_price" value="Rp.<?= number_format($product['product_price'], 0, ',', '.'); ?>" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="product_purchased">Jumlah Beli</label>
                            <input type="text" class="form-control" id="product_purchased" name="product_purchased" required>
                        </div>
                        <div class="form-group after_purchased">
                            <label for="product_ongkir">Biaya Ongkir</label>
                            <input type="text" class="form-control" id="product_ongkir" name="product_ongkir" value="Rp.<?= number_format(15000, 0, ',', '.'); ?>" readonly required>
                        </div>
                        <div class="form-group after_purchased">
                            <label for="product_total">Total Harga</label>
                            <input type="text" class="form-control" id="product_total" name="product_total" readonly required>
                        </div>
                        <?php if ($address->num_rows() != 0) : ?>
                            <div class="form-group after_purchased">
                                <label for="address">Alamat</label>
                                <select class="form-control" id="address" name="address" required>
                                    <option selected disabled>-- Pilih Alamat --</option>
                                    <?php foreach ($address->result_array() as $key) : ?>
                                        <option value="<?= $key['address_id'] ?>"><?= $key['address_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php else : ?>
                            <div class="alert alert-danger" role="alert">
                                Anda belum menambahkan alamat. Silahkan tambah alamat anda <a href="<?= base_url('user/profile') ?>" class="alert-link">disini</a>.
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <?php if ($address->num_rows() != 0) : ?>
                            <button type="submit" class="btn btn-primary">Order</button>
                        <?php else : ?>
                            <span class="btn btn-primary disabled">Order</span>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>