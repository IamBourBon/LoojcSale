<!-- Product Details Area Start -->
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-50">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Furniture</a></li>
                        <li class="breadcrumb-item"><a href="#">Chairs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">white modern chair</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <?php foreach($product_detail as $product_item){ ?>
            
                <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url('/upload/<?php echo $product_item['n_CategoryID'] . "/" . $product_item['v_ProductName'] . "/" . $product_item['v_ProductImage'] ?>');">
                            </li>
                            <!-- <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(/UserCLient/img/product-img/pro-big-2.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(/UserCLient/img/product-img/pro-big-3.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(/UserCLient/img/product-img/pro-big-4.jpg);">
                            </li> -->
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="/upload/<?php echo $product_item['n_CategoryID'] . "/" . $product_item['v_ProductName'] . "/" . $product_item['v_ProductImage'] ?>">
                                    <img class="d-block w-100" src="/upload/<?php echo $product_item['n_CategoryID'] . "/" . $product_item['v_ProductName'] . "/" . $product_item['v_ProductImage'] ?>" alt="First slide">
                                </a>
                            </div>
                            <!-- <div class="carousel-item">
                                <a class="gallery_img" href="/UserCLient/img/product-img/pro-big-2.jpg">
                                    <img class="d-block w-100" src="/UserCLient/img/product-img/pro-big-2.jpg" alt="Second slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="/UserCLient/img/product-img/pro-big-3.jpg">
                                    <img class="d-block w-100" src="/UserCLient/img/product-img/pro-big-3.jpg" alt="Third slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="/UserCLient/img/product-img/pro-big-4.jpg">
                                    <img class="d-block w-100" src="/UserCLient/img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
                </div>
            
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">$<?php echo $product_item['f_ProductPrice']?></p>
                            <a href="product-details">
                                <h6><?php echo $product_item['v_ProductName']?></h6>
                            </a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="review">
                                    <a href="#">Write A Review</a>
                                </div>
                            </div>
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                        </div>

                        <div class="short_overview my-5">
                            <p><?php echo $product_item['v_ProductDetail']?></p>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" action="/cart/add" method="post">
                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) && qty > 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <input type="hidden" name="productID" value="<?php echo $product_item['n_ProductID']?>">
                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                </div>
           
            <?php } ?>
        </div>
    </div>
</div>
<!-- Product Details Area End -->
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