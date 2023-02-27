<div class="shop_sidebar_area">

    <!-- ##### Single Widget ##### -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Catagories</h6>

        <!--  Catagories  -->
        <div class="catagories-menu">
            <ul>
                <?php if (isset($category)) {
                    foreach ($category as $category_item) {
                ?>
                        <li class=""><a href="#"><?php echo $category_item['v_CategoryName'] ?></a></li>
                <?php
                    }
                } ?>
            </ul>
        </div>
    </div>

    <!-- ##### Single Widget ##### -->
    <div class="widget brands mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Brands</h6>

        <div class="widget-desc">
            <!-- Single Form Check -->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="amado">
                <label class="form-check-label" for="amado">Amado</label>
            </div>
        </div>
    </div>

    <!-- ##### Single Widget ##### -->
    <div class="widget price mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">Price</h6>

        <div class="widget-desc">
            <div class="slider-range">
                <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                </div>
                <div class="range-price">$10 - $1000</div>
            </div>
        </div>
    </div>
</div>

<div class="amado_product_area section-padding-100">
    <div class="container-fluid">

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pageSet = 5 * $page;

        $totalItem = count($product);
        $totalPage = ceil($totalItem / 5);
        ?>

        <div class="row">
            <div class="col-12">
                <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                    <!-- Total Products -->
                    <div class="total-products">
                        <p><?php 
                            if ($pageSet > $totalItem) {
                                $pageSet = $totalItem;
                            }
                            echo "Showing " . (($page - 1) * 5) + 1 . " - " . $pageSet . " 0f " . $totalItem ?></p>
                    </div>
                    <!-- Sorting -->
                    <div class="product-sorting d-flex">
                        <div class="sort-by-date d-flex align-items-center mr-15">
                            <p>Sort by</p>
                            <form action="#" method="get">
                                <select name="select" id="sortBydate">
                                    <option value="value">Date</option>
                                    <option value="value">Newest</option>
                                    <option value="value">Popular</option>
                                </select>
                            </form>
                        </div>
                        <!-- <div class="view-product d-flex align-items-center">
                            <p>View</p>
                            <form action="#" method="get">
                                <select name="select" id="viewProduct">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="48">48</option>
                                    <option value="96">96</option>
                                </select>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Product Area -->


            <?php for ($i = ($page - 1) * 5; $i < $pageSet && $i < $totalItem; $i++) { ?>

                <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="/upload/<?php echo $product[$i]['n_CategoryID'] . "/" . $product[$i]['v_ProductName'] . "/" . $product[$i]['v_ProductImage'] ?>" alt="">
                            <!-- Hover Thumb -->
                            <!-- <img class="hover-img" src="/UserCLient/img/product-img/product2.jpg" alt=""> -->
                        </div>

                        <!-- Product Description -->
                        <div class="product-description d-flex align-items-center justify-content-between">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">$<?php echo $product[$i]['f_ProductPrice'] ?></p>
                                <a href="/product-details?id=<?php echo $product[$i]['n_ProductID'] ?>">
                                    <h6><?php echo $product[$i]['v_ProductName'] ?></h6>
                                </a>
                            </div>
                            <!-- Ratings & Cart -->
                            <div class="ratings-cart text-right">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="cart">
                                    <a href="cart" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Pagination -->
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end mt-50">
                        <!-- <li class="page-item active"><a class="page-link" href="shop?page=1">01.</a></li>
                        <li class="page-item"><a class="page-link" href="shop?page=2">02.</a></li>
                        <li class="page-item"><a class="page-link" href="shop?page=3">03.</a></li>
                        <li class="page-item"><a class="page-link" href="shop?page=4">04.</a></li> -->
                        <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="shop?page=<?php echo $i ?>">0<?php echo $i ?>.</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>