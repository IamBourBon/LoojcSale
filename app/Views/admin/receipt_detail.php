<div class="page-wrapper">

    <div class="container-fluid">
        <?php if (isset($receipt)) { ?>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card" style="border: 3px solid <?php if ($receipt[0]['b_Status'] == 2) {
                                                                    echo "rgb(255, 135, 135);";
                                                                } else if ($receipt[0]['b_Status'] == 1) {
                                                                    echo "rgb(177, 230, 147);";
                                                                } else {
                                                                    echo "#5f76e8;";
                                                                } ?>
                ">
                        <div class="card-body">

                            <form action="/admin/receipt_detail/edit" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Họ</label>
                                                <input type="text" class="form-control" value="<?php echo $receipt[0]['v_LastName'] ?>" name="LName">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tên</label>
                                                <input type="text" class="form-control" value="<?php echo $receipt[0]['v_FirstName'] ?>" name="FName">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input type="text" class="form-control" value="<?php echo $receipt[0]['n_Phone'] ?>" name="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="<?php echo $receipt[0]['v_Email'] ?>" name="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Thành phố</label>
                                                <input type="text" class="form-control" value="<?php echo $receipt[0]['v_Country'] ?>" name="Country">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input type="text" class="form-control" value="<?php echo $receipt[0]['v_Address'] ?>" name="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Ghi chú</label>
                                                <input type="text" class="form-control" value="<?php echo $receipt[0]['v_Comment'] ?>" name="Comment">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Trạng thái</label>
                                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="Status" onchange="ChangeStatus()" style="color:black;"
                                                <?php if ($receipt[0]['b_Status'] == 2) {
                                                    echo "disabled";
                                                }?>>
                                                    <option value="0" <?php if ($receipt[0]['b_Status'] == 0) echo "selected" ?>>Đang xử lý</option>
                                                    <option value="1" <?php if ($receipt[0]['b_Status'] == 1) echo "selected" ?>>Đang vận chuyển</option>
                                                    <option value="2" <?php if ($receipt[0]['b_Status'] == 2) echo "selected" ?>>Hủy đơn</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $receipt[0]['n_ReceiptID'] ?>" name="ID">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn waves-effect waves-light btn-primary" data-toggle="modal" data-target="#add-receipt-modal">Add detail
                        </button>
                        <button type="button" style="margin-left: 30px !important;" class="btn waves-effect waves-light btn-success" onclick="ChangeForm()">Save change
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="border border-primary">

                            <?php
                            if (isset($receipt_detail)) {
                                foreach ($receipt_detail as $receipt_detail_item) { ?>

                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('/upload') . "/" . $receipt_detail_item['n_ItemCategoryID'] . "/" . $receipt_detail_item['v_ItemName'] . "/" . $receipt_detail_item['v_ItemImage'] ?>" alt="image" class="img-thumbnail" width="100" height="100">
                                        </td>
                                        <td><?php echo $receipt_detail_item['v_ItemName'] ?></td>
                                        <td><?php echo $receipt_detail_item['n_ItemQuantity'] ?></td>
                                        <td><?php echo $receipt_detail_item['f_ItemPrice'] ?> $</td>
                                        <td>
                                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-danger" data-toggle="modal" data-target="#delete-receipt-modal-<?php echo $receipt_detail_item['n_DetailReceiptID'] ?>">Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <h3>No Receipt</h3>

                                <p>Unable to find any news for you.</p>
                            <?php } ?>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    Total : <?php echo $receipt[0]['f_Total'] ?> $
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <div id="add-receipt-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-full-width">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="fullWidthModalLabel">Add products</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-6 col-lg-5">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle">Cateogries</h6>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="custom-select mr-sm-2">
                                                <?php if (isset($category)) {
                                                    foreach ($category as $categories) { ?>
                                                        <option value="<?php echo $categories['n_CategoryID'] ?>"><?php echo $categories['v_CategoryName'] ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php if (isset($product)) {
                                foreach ($product as $products) { ?>
                                    <div class="form-group">
                                        <form action="/admin/receipt_detail/add" method="POST">
                                            <img src="<?php echo base_url('/upload') . "/" . $products['n_CategoryID'] . "/" . $products['v_ProductName'] . "/" . $products['v_ProductImage'] ?>" alt="image" class="img-thumbnail" width="300" height="300" style="margin: 40px 0px 30px 80px !important;">
                                            </br>
                                            <span style="margin-left: 125px !important;"><?php echo $products['v_ProductName'] ?></span>
                                            </br>
                                            <input type="number" step="1" min="1" max="50" value="1" name="Quantity" style="margin-left: 97px !important;">
                                            <input type="hidden" value="<?php echo $products['n_ProductID'] ?>" name="ItemID">
                                            <input type="hidden" value="<?php echo $products['n_CategoryID'] ?>" name="ItemCategory">
                                            <input type="hidden" value="<?php echo $products['v_ProductName'] ?>" name="ItemName">
                                            <input type="hidden" value="<?php echo $products['v_ProductImage'] ?>" name="ItemImage">
                                            <input type="hidden" value="<?php echo $products['f_ProductPrice'] ?>" name="ItemPrice">
                                            <input type="hidden" value="<?php echo $receipt[0]['n_ReceiptID'] ?>" name="ReceiptID">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </form>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->
        </div>


    </div>

    <?php
    if (isset($receipt_detail)) {
        foreach ($receipt_detail as $receipt_detail_item) { ?>
            <form action="/admin/receipt_detail/delete" method="POST">

                <div id="delete-receipt-modal-<?php echo $receipt_detail_item['n_DetailReceiptID'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-danger">
                                <h4 class="modal-title" id="danger-header-modalLabel">Delete receipt</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                                <p>Do you want to delete <?php echo $receipt_detail_item['v_ItemName'] ?> product ?</p>
                            </div>
                            <div class="modal-footer">

                                <input type="hidden" value="<?php echo $receipt_detail_item['n_DetailReceiptID'] ?>" name="deleteID">
                                <input type="hidden" value="<?php echo $receipt[0]['n_ReceiptID'] ?>" name="ReceiptID">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

            </form>
    <?php }
    } ?>

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

<script>
    function ChangeForm() {
        document.forms[1].submit();
    }

    function ChangeStatus() {
        var select = document.getElementById('inlineFormCustomSelect');
        var card = document.getElementsByClassName('card')[0];
        if (select.selectedIndex == 1) {
            card.setAttribute('Style', 'border: 4px solid rgb(177, 230, 147)');
        } else if (select.selectedIndex == 2) {
            card.setAttribute('Style', 'border: 4px solid rgb(255, 135, 135)');
        } else {
            card.setAttribute('Style', 'border: 3px solid #5f76e8');
        }
    }
</script>
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