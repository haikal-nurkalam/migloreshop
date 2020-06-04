$(document).ready(function(){
    const URL = 'http://localhost/migloreshop/';
    const ASSETS = URL+'assets/';
    $('.btn-delete').click(function () {

        const id_product = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                ).then((result) => {
                    _delete(id_product);
                });
            }
        });
    });

    function _delete(id) {
        $.get(URL +'admin/delete/' + id, function () {
            location.reload(true);
        });
    }

    $('.loader').hide();
    $('.btn-edit').click(function(){
        $('.loader').show();
        $('#cover_edit').attr("src", '');
        const id_product = $(this).data('id');
        $('.form-edit').attr('action', URL +'admin/edit/'+id_product);
        $.get(URL + 'admin/getEdit/' + id_product, function (data) {
            const produk = JSON.parse(data);
            $('.loader').hide();
            $('#cover_edit').attr("src", ASSETS + "product/img/" + produk.product_img);
            $('#cover_edit').val(produk.product_img);
            $('#name_edit').val(produk.product_name);
            $('#category_edit').val(produk.product_category);
            $('#price_edit').val(produk.product_price);
            $('#stok_edit').val(produk.product_stock);
            $('#desc_edit').val(produk.product_desc);
        });
    });


});


