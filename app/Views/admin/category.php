
        <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="page-title text-truncate text-dark font-weight-medium mb-1">Category</h1>

                                <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#add-category-modal">Add category
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="border border-primary">
                                            <?php if (!empty($category) && is_array($category)) : ?>

                                                <?php foreach ($category as $category_item) : ?>
                                                    <tr>
                                                        <td><?= esc($category_item['v_CategoryName']) ?></td>
                                                        <td>
                                                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" data-toggle="modal" data-target="#edit-category-modal-<?= $category_item['n_CategoryID'] ?>">Edit
                                                            </button>
                                                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" data-toggle="modal" data-target="#delete-category-modal-<?= $category_item['n_CategoryID'] ?>">Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>

                                            <?php else : ?>

                                                <h3>No Category</h3>

                                                <p>Unable to find any news for you.</p>

                                            <?php endif ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <form action="/admin/category/add" method="POST">
                    <div id="add-category-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-full-width">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="fullWidthModalLabel">New Category</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12 col-md-6 col-lg-10">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle">Category Name</h6>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="category_name">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div><!-- /.modal-content -->

                        </div><!-- /.modal-dialog -->
                    </div>
                </form>

            </div>

            <?php foreach ($category as $category_item) : ?>

                <form action="/admin/category/edit" method="POST">
                    
                    <div id="edit-category-modal-<?= $category_item['n_CategoryID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-full-width">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="fullWidthModalLabel">Edit Product</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12 col-md-6 col-lg-10">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle">Category Name</h6>

                                                <div class="form-group">
                                                    <input type="text" class="form-control" value="<?= $category_item['v_CategoryName'] ?>" name="category_name">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="<?= $category_item['n_CategoryID'] ?>" name="editID">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>

                </form>


                <form action="/admin/category/delete" method="POST">

                    <div id="delete-category-modal-<?= $category_item['n_CategoryID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-colored-header bg-danger">
                                    <h4 class="modal-title" id="danger-header-modalLabel">Delete category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to delete this category ?</p>
                                </div>
                                <div class="modal-footer">

                                    <input type="hidden" value="<?= esc($category_item['n_CategoryID']) ?>" name="deleteID">

                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>

                </form>
            <?php endforeach ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center text-muted">
            All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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