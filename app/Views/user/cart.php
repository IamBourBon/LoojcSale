<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cart-title mt-50">
                    <h2>Shopping Cart</h2>
                </div>

                <div class="cart-table clearfix">

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
                            <?php if(isset($items)){
                                foreach ($items as $item) { ?>
                                <form action="/cart/remove" method="post">
                                    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src="<?php echo base_url('./upload/' . $item['Category'] . "/" . $item['Name'] . "/" . $item['Image']) ?>" alt="Product"></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $item['Name'] ?></h5>
                                        </td>
                                        <td class="price">
                                            <span><?php echo $item['Price'] ?></span>
                                        </td>
                                        <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="minus(<?php echo $item['ID'] ?>)"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="number" class="qty-text" onchange="changeQuantity(<?php echo $item['ID'] ?>)" id="qty3<?php echo $item['ID'] ?>" step="1" min="1" max="300" name="quantity" value="<?php echo $item['Quantity'] ?>">
                                                    <span class="qty-plus" onclick="plus(<?php echo $item['ID'] ?>)"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="hidden" value="<?php echo $item['ID'] ?>" id="<?php echo $item['ID'] ?>" name="productID">
                                            <button type="submit" class="btn amado-btn" style="min-width: 55px !important;">X</a>
                                        </td>
                                    </tr>
                                </form>
                            <?php } } ?>
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <?php if(isset($total)){?>
                        <li><span>subtotal:</span> <span id="subtotal"><?php echo $total ?></span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span id="total"><?php echo $total ?></span></li>
                        <?php }?>
                    </ul>
                    <div class="cart-btn mt-100">
                        <a href="/checkout"  class="btn amado-btn w-100">Checkout</a>
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

<script>
    function minus(id){
        var effect = document.getElementById('qty3'+id); 
        var id = document.getElementById(id).value;
        var qty = effect.value; //Biến số lượng đặt hang
        
        if( !isNaN( qty ) && qty > 1 ) {
            effect.value--;
            qty--;
           
            $.ajax({
                url: "<?php echo base_url(). "/cart/update_quantity" ?>",
                method: "POST",
                data:{quantity:qty, ID:id},
                success:function(res){
                    $('#subtotal').text(res);
                   $('#total').text(res);
                }
            })
        }
            
        return false;
    }
    
    function plus(id){
        var effect = document.getElementById('qty3'+id); 
        var id = document.getElementById(id).value;
        var qty = effect.value; //Biến số lượng đặt hang
       
        if( !isNaN( qty )){ 
            effect.value++;
            qty++;
            
            $.ajax({
                url: "<?php echo base_url(). "/cart/update_quantity" ?>",
                method: "POST",
                data:{quantity:qty, ID:id},
                success:function(res){
                   $('#subtotal').text(res);
                   $('#total').text(res);
                }
            })
        }
            
        return false;
    }
    
    function changeQuantity(id){
        var effect = document.getElementById('qty3'+id); 
        var id = document.getElementById(id).value;
        var qty = effect.value; //Biến số lượng đặt hang
       
        if( !isNaN(qty)){ 
            
            $.ajax({
                url: "<?php echo base_url(). "/cart/update_quantity" ?>",
                method: "POST",
                data:{quantity:qty, ID:id},
                success:function(res){
                   $('#subtotal').text(res);
                   $('#total').text(res);
                }
            })
        }
            
        return false;
    }
</script>