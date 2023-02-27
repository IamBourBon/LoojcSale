<!-- image handle -->
<!-- https:///stackoverflow.com/questions/3814231/loading-an-image-to-a-img-from-input-file -->

<div class="page-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="page-title text-truncate text-dark font-weight-medium mb-1">Product</h1>

                        <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#add-product-modal">Add product
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border border-primary">
                                    <?php if (!empty($product) && is_array($product)) : ?>

                                        <?php foreach ($product as $product_item) : ?>
                                            <tr>
                                                <td><?= esc($product_item['v_ProductName']) ?></td>
                                                <td><?= esc($product_item['n_ProductQuantity']) ?></td>
                                                <td><?= esc($product_item['f_ProductPrice']) ?></td>

                                                <td>
                                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" onclick="edit()" data-toggle="modal" data-target="#edit-product-modal-<?= $product_item['n_ProductID'] ?>">Edit
                                                    </button>
                                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" data-toggle="modal" data-target="#delete-product-modal-<?= $product_item['n_ProductID'] ?>">Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>

                                    <?php else : ?>

                                        <h3>No Product</h3>

                                        <p>Unable to find any news for you.</p>

                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="/admin/product/add" method="POST" enctype="multipart/form-data">
            <div id="add-product-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel" aria-hidden="true">

                <div class="modal-dialog modal-full-width">
                    <div class="modal-content none-border">
                        <div class="modal-header">
                            <h3 class="modal-title" id="fullWidthModalLabel">New Product</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body" style="background-color:rgb(8, 32, 50)">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-8">
                                    <div class="card  mt-4">
                                        <div class="card-body">
                                            <label class="mr-sm-2">Product Name</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="product_name">
                                            </div>


                                            <label class="mr-sm-2">Product Detail</label>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="10" placeholder="Product information here..." name="product_detail"></textarea>
                                            </div>

                                            <label class="mr-sm-2">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile04" onchange="onFileSelected(event,'productImage<?php echo $product_item['n_ProductID']?>')" name="product_image">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card  mt-4">
                                        <div class="card-body">

                                            <img id="productImage<?php echo $product_item['n_ProductID']?>" src="<?php echo base_url('/assets/images/users/5.jpg') ?>" alt="image" class="img-thumbnail" width="300">
                                            <p class="mt-3 mb-0">

                                                <label class="mr-sm-2">Product Quantity</label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="product_quantity">
                                            </div>

                                            <label class="mr-sm-2">Product Price</label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="product_price">
                                            </div>

                                            <div class="form-group mb-4">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="product_category">
                                                    <?php foreach ($category as $category_item) : ?>
                                                        <option class="dropdown-item" value="<?= esc($category_item['n_CategoryID']) ?>"><?= esc($category_item['v_CategoryName']) ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-color:rgb(8, 32, 50)">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->
            </div>
        </form>
    </div>

    <?php foreach ($product as $product_item) : ?>

        <form action="/admin/product/edit" method="POST" enctype="multipart/form-data">

            <div id="edit-product-modal-<?= $product_item['n_ProductID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-full-width">
                    <div class="modal-content none-border">
                        <div class="modal-header">
                            <h3 class="modal-title" id="fullWidthModalLabel">Edit Product</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body" style="background-color:rgb(8, 32, 50)">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-8 ">
                                    <div class="card  mt-4">
                                        <div class="card-body ">
                                            <label class="mr-sm-2">Product Name</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $product_item['v_ProductName'] ?>" name="product_name">
                                            </div>


                                            <label class="mr-sm-2">Product Quantity</label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" value="<?= $product_item['n_ProductQuantity'] ?>" name="product_quantity">
                                            </div>


                                            <label class="mr-sm-2">Product Price</label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" value="<?= $product_item['f_ProductPrice'] ?>" name="product_price">
                                            </div>


                                            <label class="mr-sm-2">Product Detail</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" value="<?= $product_item['v_ProductDetail'] ?>" name="product_detail">
                                            </div>


                                            <div class="form-group mb-4">
                                                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="product_category">
                                                    <?php foreach ($category as $category_item) {
                                                        if ($category_item['n_CategoryID'] == $product_item['n_CategoryID']) {
                                                    ?>
                                                            <option class="dropdown-item" selected="selected" value="<?php echo $category_item['n_CategoryID'] ?>">
                                                                <?php echo $category_item['v_CategoryName'] ?>
                                                            </option>
                                                        <?php
                                                        } else { ?>
                                                            <option class="dropdown-item" value="<?php echo $category_item['n_CategoryID'] ?>">
                                                                <?php echo $category_item['v_CategoryName'] ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>


                                            <label class="mr-sm-2">Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile04" onchange="onFileSelected(event,'productImage<?php echo $product_item['n_ProductID'] ?>')" name="product_image">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card  mt-4">
                                        <div class="card-body">
                                            <img id="productImage<?php echo $product_item['n_ProductID']?>" src="<?php echo base_url('/upload') . "/" . $product_item['n_CategoryID'] ."/". $product_item['v_ProductName'] ."/". $product_item['v_ProductImage']?>" alt="image" class="img-thumbnail" width="300">
                                            <p class="mt-3 mb-0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer " style="background-color:rgb(8, 32, 50)">
                            <input type="hidden" value="<?= $product_item['n_ProductID'] ?>" name="editID">
                            <input type="hidden" value="<?= $product_item['v_ProductImage'] ?>" name="oldImage">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div>
            </div>

        </form>


        <form action="/admin/product/delete" method="POST">

            <div id="delete-product-modal-<?= $product_item['n_ProductID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-danger">
                            <h4 class="modal-title" id="danger-header-modalLabel">Delete product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to delete this product ?</p>
                        </div>
                        <div class="modal-footer">

                            <input type="hidden" value="<?= esc($product_item['n_ProductID']) ?>" name="deleteID">
                            <input type="hidden" value="<?= esc($product_item['v_ProductName']) ?>" name="deleteName">
                            <input type="hidden" value="<?= esc($product_item['n_CategoryID']) ?>" name="deleteCategory">
                            <input type="hidden" value="<?= esc($product_item['v_ProductImage']) ?>" name="deleteImage">

                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        </form>
    <?php endforeach ?>
</div>

<footer class="footer text-center text-muted">
    All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
</footer>

</div>

</div>


<script>

    function onFileSelected(event ,id) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById(id);
        
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
        imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
    
</script>


<script src="<?php echo base_url('/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- apps -->
<!-- apps -->
<script src="<?php echo base_url('/dist/js/app-style-switcher.js') ?> "></script>
<script src="<?php echo base_url('/dist/js/feather.min.js') ?> "></script>
<script src="<?php echo base_url('/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') ?> ">
</script>
<script src="<?php echo base_url('/dist/js/sidebarmenu.js') ?> "></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url('/dist/js/custom.min.js') ?> "></script>
<!--This page JavaScript -->
<script src="<?php echo base_url('/assets/extra-libs/c3/d3.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/extra-libs/c3/c3.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/libs/chartist/dist/chartist.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>">
</script>
<script src="<?php echo base_url('/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') ?>"></script>
<script src="<?php echo base_url('/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') ?>"></script>
<script src="<?php echo base_url('/dist/js/pages/dashboards/dashboard1.min.js') ?>"></script>
</body>

</html>

