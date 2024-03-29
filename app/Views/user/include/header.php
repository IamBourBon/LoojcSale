<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="/UserCLient/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="/UserCLient/css/core-style.css">
    <link rel="stylesheet" href="/UserCLient/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="/UserCLient/img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="/UserCLient/img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="/"><img src="/UserCLient/img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="/">Trang chủ</a></li>
                    <li><a href="shop">Sản phẩm</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">Discount</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart" class="cart-nav"><img src="/UserCLient/img/core-img/cart.png" alt=""> Cart <span><?php if (isset($count)) {
                                                                                                                    echo "(".$count.")";
                                                                                                                } else {
                                                                                                                    echo "(0)";
                                                                                                                } ?></span></a>
                <a href="/order" class="fav-nav"><img src="/UserCLient/img/core-img/favorites.png" alt=""> Orders</a>
                <a href="#" class="search-nav"><img src="/UserCLient/img/core-img/search.png" alt=""> Search</a>
                <a href="<?php $session = session();
                            
                            if($session->has('user_account'))
                                $username = $session->get('user_account');
                            
                            if (isset($username)) {
                                echo "profile";
                            } else {
                                echo "login";
                            } ?>"><img src="/UserCLient/img/core-img/search.png" alt=""> <?php
                                                                                            if (isset($username)) {
                                                                                                echo $username;
                                                                                            } else {
                                                                                                echo "Login";
                                                                                            } ?></a>
            <a href="logout" style="display:<?php 
                            if (isset($username)) {
                                echo "block";
                            } else {
                                echo "none";
                            }  ?>"><img src="/UserCLient/img/core-img/search.png" alt=""> Log out</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->