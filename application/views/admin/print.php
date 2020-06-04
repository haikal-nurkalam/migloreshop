<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <center>
        <table border="1">
            <tr>
                <th>Order Id</th>
                <th><?= $order['order_id'] ?></th>
            </tr>
            <tr>
                <th>Nama Produk</th>
                <th><?= $order['product_name'] ?></th>
            </tr>
            <tr>
                <th>Harga Produk</th>
                <th>Rp.<?= $order['product_price'] ?></th>
            </tr>
            <tr>
                <th>Jumlah Beli</th>
                <th><?= $order['order_product_purchased'] ?></th>
            </tr>
            <tr>
                <th>Biaya Ongkir</th>
                <th><?= $order['order_product_ongkir'] ?></th>
            </tr>
            <tr>
                <th>Total Harga</th>
                <th><?= $order['order_product_total'] ?></th>
            </tr>
            <tr>
                <th>No Hp</th>
                <th><?= $address['address_phone'] ?></th>
            </tr>
            <tr>
                <th>Alamat</th>
                <th><?= $address['address_name'] ?>,Provinsi <?= $address['address_provinsi'] ?> <?= $address['address_kota'] ?> <?= $address['address_alamat'] ?>, Kode Pos <?= $address['address_zip_code'] ?></th>
            </tr>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>