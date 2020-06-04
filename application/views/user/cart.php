<div class="col-lg-9 mt-5">
    <div class="card p-5">
        <h2 class="mb-4">Daftar Belanja</h2>
        <ul class="nav nav-tabs " id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Semua</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="sending-tab" data-toggle="tab" href="#sending" role="tab" aria-controls="sending" aria-selected="false">Pengiriman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="acc-tab" data-toggle="tab" href="#acc" role="tab" aria-controls="acc" aria-selected="false">Diterima</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- All Order -->
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <?php foreach ($all_order->result_array() as $key) : ?>
                    <div class="media my-5">
                        <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                            <img src="<?= base_url('assets/product/img/') . $key['product_img'] ?>" class="mr-3" width="80">
                        </a>
                        <div class="media-body">
                            <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                                <h5 class="mt-0"><?= $key['order_product_name'] ?></h5>
                            </a>
                            <?php if ($key['order_status'] == 1) : ?>
                                <p>No Invoice : <b></b></p>
                                <p>No Resi : <b></b></p>
                                <span class="btn btn-warning btn-sm"> <i class="fas fa-history"></i> Pending</span>
                            <?php elseif ($key['order_status'] == 2) : ?>
                                <p>No Invoice : <b></b></p>
                                <p>No Resi : <b></b></p>
                                <span class="btn btn-info btn-sm"><i class="fas fa-shipping-fast"></i> Sending</span>
                            <?php elseif ($key['order_status'] == 3 || $key['order_status'] == 4) : ?>
                                <p>No Invoice : <b></b></p>
                                <p>No Resi : <b></b></p>
                                <span class="btn btn-success btn-sm"><i class="fas fa-clipboard-check"></i> Accepted</span>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Pending Order -->
            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <?php foreach ($pending_order->result_array() as $key) : ?>
                    <?php if ($key['order_status'] == 1) : ?>
                        <div class="media my-5">
                            <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                                <img src="<?= base_url('assets/product/img/') . $key['product_img'] ?>" class="mr-3" width="80">
                            </a>
                            <div class="media-body">
                                <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                                    <h5 class="mt-0"><?= $key['order_product_name'] ?></h5>
                                </a>
                                <p>No Invoice : <b></b></p>
                                <p>No Resi : <b></b></p>
                                <span class="btn btn-warning btn-sm"> <i class="fas fa-history"></i> Pending</span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!-- Sending Order -->
            <div class="tab-pane fade" id="sending" role="tabpanel" aria-labelledby="sending-tab">
                <?php foreach ($sending_order->result_array() as $key) : ?>
                    <?php if ($key['order_status'] == 2) : ?>
                        <div class="media my-5">
                            <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                                <img src="<?= base_url('assets/product/img/') . $key['product_img'] ?>" class="mr-3" width="80">
                            </a>
                            <div class="media-body">
                                <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                                    <h5 class="mt-0"><?= $key['order_product_name'] ?></h5>
                                </a>
                                <p>No Invoice : <b></b></p>
                                <p>No Resi : <b></b></p>
                                <span class="btn btn-info btn-sm"><i class="fas fa-shipping-fast"></i> Sending</span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <!-- Accepted Order -->
            <div class="tab-pane fade" id="acc" role="tabpanel" aria-labelledby="acc-tab">
                <?php foreach ($accepted_order->result_array() as $key) : ?>
                    <?php if ($key['order_status'] == 3 || $key['order_status'] == 4) : ?>
                        <div class="media my-5">
                            <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                                <img src="<?= base_url('assets/product/img/') . $key['product_img'] ?>" class="mr-3" width="80">
                            </a>
                            <div class="media-body">
                                <a href="<?= base_url('user/invoice/') . $key['order_id'] ?>">
                                    <h5 class="mt-0"><?= $key['order_product_name'] ?></h5>
                                </a>
                                <p>No Invoice : <b></b></p>
                                <p>No Resi : <b></b></p>
                                <span class="btn btn-success btn-sm"><i class="fas fa-clipboard-check"></i> Accepted</span>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Wishlist -->
    <div class="card p-5 mt-5">
        <h2 class="mb-4">Wishlist</h2>
        <?php foreach ($wishlist as $key) : ?>
            <div class="media my-3">
                <a href="<?= base_url('product/view/') . $key['product_id'] ?>">
                    <img class="align-self-center mr-3" src="<?= base_url('assets/product/img/') . $key['product_img'] ?>" width="80">
                </a>
                <div class="media-body">
                    <a href="<?= base_url('product/view/') . $key['product_id'] ?>">
                        <h5 class="mt-0 text-truncate"><?= $key['product_name'] ?></h5>
                    </a>
                    <p>Harga : Rp.<?= number_format($key['product_price'], 0, ',', '.'); ?></p>
                    <button class="btn btn-info btn-sm m-0">Buy Now</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- /.col-lg-9 -->