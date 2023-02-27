<div class="page-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="page-title text-truncate text-dark font-weight-medium mb-1">Receipt</h1>

                        <button type="button" class="btn waves-effect waves-light btn-success" data-toggle="modal" data-target="#add-receipt-modal">Add receipt
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
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border border-primary">

                                    <?php
                                    if (isset($receipt)) {
                                        foreach ($receipt as $receipt_item) { ?>

                                            <tr style="background-color: <?php if ($receipt_item['b_Status'] == 2) {
                                                                    echo "rgb(255, 135, 135)";
                                                                } else if ($receipt_item['b_Status'] == 1) {
                                                                    echo "rgb(177, 230, 147)";
                                                                }?>
                                            ;color: black;">
                                                <td><?php echo $receipt_item['v_LastName'] . " " . $receipt_item['v_FirstName'] ?></td>
                                                <td><?php echo $receipt_item['v_Address'] ?></td>
                                                <td><?php echo $receipt_item['n_Phone'] ?></td>
                                                <td><?php if ($receipt_item['b_Status'] == 0) {
                                                        echo "Đang xử lý";
                                                    } else if ($receipt_item['b_Status'] == 1) {
                                                        echo "Đang vận chuyển";
                                                    } else {
                                                        echo "Hủy đơn";
                                                    } ?></td>
                                                <td>
                                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-success" onclick="window.location='/admin/receipt_detail/?id=<?php echo $receipt_item['n_ReceiptID']?>'">View
                                                    </button>
                                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" data-toggle="modal" data-target="#delete-receipt-modal-<?php echo $receipt_item['n_ReceiptID']?>">Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <h3>No Receipt</h3>

                                        <p>Unable to find any news for you.</p>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="/admin/receipt/add" method="POST">
            <div id="add-receipt-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-full-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="fullWidthModalLabel">New receipt</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-12 col-md-6 col-lg-10">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Họ</label>
                                                <input type="text" class="form-control" name="LName" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tên</label>
                                                <input type="text" class="form-control" name="FName" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" name="phone" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Thành phố</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="country" onchange="ChangeStatus()" style="color:black;" required>
                                                    <option value="TPHCM">Thành phố Hồ Chí Minh</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Ghi chú</label>
                                                <input type="text" class="form-control" name="comment" required>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->
            </div>
        </form>

    </div>

    <?php if (isset($receipt)) {
        foreach ($receipt as $receipt_item) { ?>
        <form action="/admin/receipt/delete" method="POST">

            <div id="delete-receipt-modal-<?php echo $receipt_item['n_ReceiptID']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-danger">
                            <h4 class="modal-title" id="danger-header-modalLabel">Delete receipt</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to delete <?php echo $receipt_item['v_LastName'] . " " . $receipt_item['v_FirstName'] ?> receipt ?</p>
                        </div>
                        <div class="modal-footer">

                            <input type="hidden" value="<?php echo $receipt_item['n_ReceiptID']?>" name="ID">

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

        </form>
    <?php }}?>    
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