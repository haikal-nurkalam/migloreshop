<div class="container">

    <div class="card p-4 mb-5 shadow-sm">
        <form class="card card-sm" method="get" action="<?= base_url('admin/search') ?>">
            <div class="card-body row no-gutters align-items-center">
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless search-keyword" type="search" name="keyword" placeholder="Search product ...">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success search-btn" type="submit">Search</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg mb-5" data-toggle="modal" data-target="#exampleModal">
        Add Product
    </button>


    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('admin/addProduct'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cover">Cover Image</label>
                        <input type="file" class="form-control-file" id="cover" name="cover" required>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="product_name" value="<?= set_value('product_name') ?>" required>
                        <small><?= form_error('product_name') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="category">Product Category</label>
                        <select class="form-control" id="category" name="product_category">
                            <option value="1">Drinks</option>
                            <option value="2">Food</option>
                            <option value="3">At Home Coffee</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control" name="product_price" value="<?= set_value('product_price') ?>" required>
                        <small><?= form_error('product_price') ?></small>
                    </div>
                    <div class="form-group">
                        <label>Product Stok</label>
                        <input type="text" class="form-control" name="product_stock" value="<?= set_value('product_stock') ?>" required>
                        <small><?= form_error('product_stock') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea class="form-control" id="desc" rows="3" name="product_desc" required><?= set_value('product_desc') ?></textarea>
                        <small><?= form_error('product_desc') ?></small>
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

    <!-- Product -->
    <div class="row product">

        <?php if ($product->num_rows() == 0) : ?>
        <div class="container">
            <div class="alert alert-danger w-100 text-center p-3" role="alert">
                <h3>404 NOT FOUND</h3>
                <p>Product not yet available</p>
            </div>
        </div>
        <?php endif; ?>

        <?php foreach ($product->result_array() as $key) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-70 shadow-sm">
                    <a href="<?= base_url('product/view/') . $key['product_id'] ?>"><img class="card-img-top" src="<?= base_url('assets/product/img/') . $key['product_img'] ?>" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title text-truncate">
                            <a href="<?= base_url('product/view/') . $key['product_id'] ?>"><?= $key['product_name'] ?></a>
                        </h4>
                        <h5>Rp.<?= number_format($key['product_price'], 0, ',', '.'); ?></h5>
                        <p class="card-text text-truncate"><?= $key['product_desc'] ?></p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#edit" data-id="<?= $key['product_id'] ?>">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="<?= $key['product_id'] ?>">Delete</button>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <!-- /.row -->
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/addProduct', 'class="form-edit"'); ?>
            <div class="loader align-items-center px-4 my-5">
                <strong>Loading...</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <img id="cover_edit" class="img-fluid img-thumbnail" src="" alt="">
                    <label for="cover_edit">Cover Image</label>
                    <input type="file" class="form-control-file" id="cover_edit" name="cover">
                </div>
                <div class="form-group">
                    <label for="name_edit">Product Name</label>
                    <input type="text" class="form-control" id="name_edit" name="product_name" value="<?= set_value('product_name') ?>" required>
                    <small><?= form_error('product_name') ?></small>
                </div>
                <div class="form-group">
                    <label for="category_edit">Product Category</label>
                    <select class="form-control" id="category_edit" name="product_category">
                        <option value="1">Drinks</option>
                        <option value="2">Food</option>
                        <option value="3">At Home Coffee</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price_edit">Product Price</label>
                    <input type="text" class="form-control" id="price_edit" name="product_price" value="<?= set_value('product_price') ?>" required>
                    <small><?= form_error('product_price') ?></small>
                </div>
                <div class="form-group">
                    <label for="stok_edit">Product Stok</label>
                    <input type="text" class="form-control" id="stok_edit" name="product_stock" value="<?= set_value('product_stock') ?>" required>
                    <small><?= form_error('product_stock') ?></small>
                </div>
                <div class="form-group">
                    <label for="desc_edit">Description</label>
                    <textarea class="form-control" id="desc_edit" rows="3" name="product_desc" required><?= set_value('product_desc') ?></textarea>
                    <small><?= form_error('product_desc') ?></small>
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