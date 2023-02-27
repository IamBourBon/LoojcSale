<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Orders list</h2>
                </div>

                <div class="cart-table clearfix">
                    <?php if (isset($receipt)) {
                        foreach ($receipt as $receipt_item) {
                    ?>


                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($receipt_detail)) {
                                        foreach ($receipt_detail as $receipt_detail_array) {
                                            foreach ($receipt_detail_array as $receipt_detail_item) {

                                                if ($receipt_item['n_ReceiptID'] == $receipt_detail_item['n_ReceiptID']) { ?>
                                                    <form action="" method="">
                                                        <tr>
                                                            <td class="cart_product_img">
                                                                <a href="#"><img src="<?php echo base_url('./upload/' . $receipt_detail_item['n_ItemCategoryID'] . "/" . $receipt_detail_item['v_ItemName'] . "/" . $receipt_detail_item['v_ItemImage']) ?>" alt="Product" width="100" height="100">
                                                                </a>
                                                            </td>
                                                            <td class="cart_product_desc">
                                                                <h5><?php echo $receipt_detail_item['v_ItemName'] ?></h5>
                                                            </td>
                                                            <td class="price">
                                                                <span><?php echo $receipt_detail_item['f_ItemPrice'] ?></span>
                                                            </td>
                                                            <td class="qty">
                                                                <div class="qty-btn d-flex">
                                                                    <p>Qty</p>
                                                                    <div class="quantity">
                                                                        <input type="number" readonly class="qty-text" step="1" min="1" max="300" name="quantity" value="<?php echo $receipt_detail_item['n_ItemQuantity'] ?>">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </form>
                                    <?php }
                                            }
                                        }
                                    } ?>
                                </tbody>
                            </table>
                            <span style="margin-left: 600px !important;">
                                <?php if ($receipt_item['b_Status'] == 0) {
                                    echo "Đang xử lý";
                                } else if ($receipt_item['b_Status'] == 1) {
                                    echo "Đang vận chuyển";
                                } else{
                                    echo "Đã hủy";
                                }
                                
                                ?>
                            </span>
                            <div style="display:inline-block;margin-left: 100px ; margin-bottom: 100px;">Total : <?php echo $receipt_item['f_Total'] ?></div>


                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
</div>