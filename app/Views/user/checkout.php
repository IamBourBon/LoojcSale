
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <?php
                            $session = session(); 
                            if($session->has('enough')){?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $session->get('enough')['enough']?>
                            </div>
                        <?php }?>
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Thanh Toán</h2>
                            </div>

                            <form action="/checkout/call" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" placeholder="Họ" name="LName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" placeholder="Tên" name="FName" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="Email">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="country" name="country">
                                            <option value="TPHCM">Thành phố Hồ Chí Minh</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" placeholder="Địa chỉ" name="address" required>
                                    </div>  
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="phone_number" min="0" placeholder="Số điện thoại" name="phone" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Ghi chú thêm" name="note"></textarea>
                                    </div>
                                    <?php if(isset($items)){
                                        for($i = 0; $i < count($items); $i++){ ?>
                                        <input type="hidden" name="NameItem[]" value="<?php echo $items[$i]['Name']?>">
                                        <input type="hidden" name="IDItem[]" value="<?php echo $items[$i]['ID']?>">
                                        <input type="hidden" name="QuantityItem[]" value="<?php echo $items[$i]['Quantity']?>">
                                        <input type="hidden" name="PriceItem[]" value="<?php echo $items[$i]['Price']?>">
                                        <input type="hidden" name="ImageItem[]" value="<?php echo $items[$i]['Image']?>">
                                        <input type="hidden" name="CategoryItem[]" value="<?php echo $items[$i]['Category']?>">
                                    <?php } } ?>        
                                </div>
                                <button style="display: none;" type="submit" id="submitform"></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <?php if(isset($items)){ 
                                      foreach($items as $item){ ?>
                                <li><span><?php echo $item['Name']?></span><span> | </span><span><?php echo $item['Quantity']?></span></li>
                                <?php }} ?>
                                <?php if(isset($total)){?>
                                <li><span>Tổng:</span> <span><?php echo $total ?></span></li>
                                <li><span>Phí vận chuyển:</span><span>Miễn phí</span></li>
                                <li><span>Tổng cộng:</span> <span><?php echo $total ?></span></li>
                                <?php }?>
                            </ul>

                            <div class="payment-method">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                
                            </div>

                            <div class="cart-btn mt-100">
                                <button onclick="document.getElementById('submitform').click()" class="btn amado-btn w-100">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->