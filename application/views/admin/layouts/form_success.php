<html>

<head>
    <title>Form Success</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- <script src="sweetalert2.all.min.js"></script> -->
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
     <link href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<center>
<h2>Klik OK untuk melanjutkan</h2>
<a href="<?= base_url('admin/product'); ?>"><button class="btn btn-primary">OK</button></a>
</center>

    <script>
        // let timerInterval
        // Swal.fire({
        //     title: 'Add Product Success',
        //     type: 'success',
        //     html: 'click OK to continue',
        //     timer: 10,
        //     onClose: () => {
        //         window.location.replace("<?= base_url() ?>");
        //     }
        // });
    </script>
</body>

</html>