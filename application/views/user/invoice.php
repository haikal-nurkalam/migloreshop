<link rel="stylesheet" href="<?= base_url('assets/css/range.css') ?>">
<div class="col-lg-9 mt-5">
    <div class="card p-5">
        <div class="row">
            <div class="col-lg-5">
                <img class="w-100" src="<?= base_url('assets/product/img/') . $invoice['product_img'] ?>" alt="">
            </div>
            <div class="col-lg-7">
                <h5 class="mb-4">Detail Pesanan</h5>

                <p>Nomor Invoice : </p>
                <p class="font-weight-bold"> <?= $invoice['order_id'] ?> </p>

                <p>Status : </p>
                <?php if ($invoice['order_status'] == 1) : ?>
                    <span class="btn btn-warning btn-sm mb-3"> <i class="fas fa-history"></i> Pending</span>
                <?php elseif ($invoice['order_status'] == 2) : ?>
                    <span class="btn btn-info btn-sm mb-3"><i class="fas fa-shipping-fast"></i> Sending</span>
                <?php elseif ($invoice['order_status'] == 3) : ?>
                    <span class="btn btn-success btn-sm mb-3"><i class="fas fa-clipboard-check"></i> Accepted</span>
                <?php endif; ?>

                <p>Tanggal Pembelian : </p>
                <p class="font-weight-bold"> <?= $invoice['created_at'] ?> </p>

                <?php if ($invoice['order_status'] == 2) : ?>
                    <a href="<?= base_url('transaction/success/') . $invoice['order_id'] ?>" class="btn btn-success my-3 w-100">Konfirmasi Barang Sampai</a>
                <?php elseif ($invoice['order_status'] == 3) : ?>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success w-100 my-3" data-toggle="modal" data-target="#review">
                        Beri Ulasan
                    </button>
                <?php endif; ?>

                <div class="btn-group w-100" role="group" aria-label="Basic example">
                    <a href="<?= base_url('transaction/chat/') . $invoice['product_name'] ?>" target="_blank" class="btn btn-outline-primary w-50">Chat</a>
                    <a href="<?= base_url('product/view/') . $invoice['product_id'] ?>" class="btn btn-primary w-50">Beli Lagi</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="reviewLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewLabel">Ulasan Produk Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaction/review/') . $invoice['product_id'] ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" value="<?= $invoice['order_id'] ?>" name="order_id">
                    <div class="form-group">
                        <label for="range">Kualitas Produk ini</label>
                        <div class="range range-success">
                            <input type="range" name="range" min="1" max="100" value="50" onchange="rangeSuccess.value=value">
                            <output id="rangeSuccess">50</output>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ulasan">Tulis Ulasan Anda</label>
                        <textarea class="form-control" id="ulasan" rows="3" name="ulasan" placeholder="Ulasan anda ..."></textarea>
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