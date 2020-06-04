<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Order</li>
    </ol>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Order</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Jumlah Beli</th>
                            <th>Biaya Ongkir</th>
                            <th>Total Harga</th>
                            <th>Status Order</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($all_order->result_array() as $key) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $key['order_product_name'] ?></td>
                                <td><?= $key['order_product_price'] ?></td>
                                <td><?= $key['order_product_purchased'] ?></td>
                                <td><?= $key['order_product_ongkir'] ?></td>
                                <td><?= $key['order_product_total'] ?></td>
                                <?php if ($key['order_status'] == 1) : ?>
                                    <td><span class="btn btn-warning btn-sm"> <i class="fas fa-history"></i> Pending</span></td>
                                <?php elseif ($key['order_status'] == 2) : ?>
                                    <td><span class="btn btn-info btn-sm"> <i class="fas fa-shipping-fast"></i> Sending</span></td>
                                <?php elseif ($key['order_status'] == 3 || $key['order_status'] == 4) : ?>
                                    <td><span class="btn btn-success btn-sm"> <i class="fas fa-clipboard-check"></i> Accepted</span></td>
                                <?php endif; ?>
                                <td>
                                    <?php if ($key['order_status'] == 1) : ?>
                                        <a class="btn btn-primary" href="<?= base_url('admin/sending/') . $key['order_id'] ?>" data-toggle="tooltip" data-placement="top" title="Change Sending Status"><i class="fas fa-shipping-fast"></i></a>
                                    <?php else : ?>
                                        <a class="btn btn-primary disabled" data-toggle="tooltip" data-placement="top" title="Change Sending Status"><i class="fas fa-shipping-fast"></i></a>
                                    <?php endif; ?>
                                    <a class="btn btn-primary" href="<?= base_url('admin/print/') . $key['order_id'] ?>" target="_BLANK" data-toggle="tooltip" data-placement="top" title="Print Invoice"><i class="fas fa-print"></i></a>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>