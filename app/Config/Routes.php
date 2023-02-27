<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

//$routes->get('(:any)', 'Pages::view/$1');
//$routes->get('/admin/Product', 'Product::index');
//$routes->get('/admin/viewProduct/(:any)', 'Product::view/$1');

//---------------------USER CLIENT----------------------
$routes->get('/', 'UserClient::index');
$routes->get('/profile', 'UserClient::userProfile');

//----------------------USER LOGIN-----------------------
$routes->get('/login', 'UserClient::login');
$routes->get('/logout', 'UserClient::logout');
$routes->post('/loginHandle', 'UserClient::handle_login');

//----------------------SHOP-----------------------
$routes->get('/shop', 'UserClient::shop');
$routes->get('/product-details?(:any)', 'UserClient::product_details');

//----------------------CART-----------------------
$routes->get('/cart', 'UserClient::cart');
$routes->post('/cart/add', 'UserClient::cart_add');
$routes->post('/cart/remove', 'UserClient::cart_remove');
$routes->post('/cart/update_quantity', 'UserClient::update_quantity');

//----------------------CHECKOUT-----------------------
$routes->get('/checkout', 'UserClient::checkout');
$routes->post('/checkout/call', 'UserClient::add_receipt');

//----------------------ORDERS-----------------------
$routes->get('/order', 'UserClient::order');


//----------------------ADMIN----------------------------
//----------------------DASHBOARD-----------------------
$routes->get('/admin', 'Admin::index');

//----------------------PRODUCTS-----------------------
$routes->get('/admin/product', 'Product::index');
$routes->post('/admin/product/add', 'Product::add_product');
$routes->post('/admin/product/delete', 'Product::delete_product');
$routes->post('/admin/product/edit', 'Product::edit_product');

//----------------------USER-----------------------
$routes->get('/admin/user', 'User::index');
$routes->post('/admin/user/add', 'User::add_user');
$routes->post('/admin/user/edit', 'User::edit_user');
$routes->post('/admin/user/delete', 'User::delete_user');

//----------------------CATEGORY-----------------------
$routes->get('/admin/category', 'Category::index');
$routes->post('/admin/category/add', 'Category::add_category');
$routes->post('/admin/category/edit', 'Category::edit_category');
$routes->post('/admin/category/delete', 'Category::delete_category');

//----------------------RECEIPT------------------------
$routes->get('/admin/receipt', 'Receipt::index');
$routes->post('admin/receipt/delete', 'Receipt::delete_receipt');
$routes->post('admin/receipt/add', 'Receipt::add_receipt');

//----------------------RECEIPT DETAIL------------------------
$routes->get('/admin/receipt_detail', 'Receipt::index_detail');
$routes->post('/admin/receipt_detail/delete', 'Receipt::delete_receipt_detail');
$routes->post('/admin/receipt_detail/edit', 'Receipt::edit_receipt');
$routes->post('/admin/receipt_detail/add', 'Receipt::add_receipt_detail');

//----------------------ADMIN LOGIN-----------------------
$routes->get('/admin/login', 'Admin::loginform');
$routes->post('/admin/login/login_action', 'Admin::login');

/*
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
