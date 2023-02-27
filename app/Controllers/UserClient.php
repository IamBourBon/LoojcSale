<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\Detail_ReceiptModel;
use App\Models\ReceiptModel;

class UserClient extends BaseController
{
  public function index()
  {
    $session = session();

    $product = new ProductModel();
    $data['product'] = $product->getProduct();

    if ($session->has('count')) {
      $data['count'] = session('count');
      return view('user/include/header', $data) . view('user/index') . view('user/include/footer');
    }

    return view('user/include/header') . view('user/index', $data) . view('user/include/footer');
  }

  public function shop()
  {
    $session = session();

    $category = new CategoryModel();
    $product = new ProductModel();
    $data['category'] = $category->getCategory();
    $data['product'] = $product->getProduct();

    if ($session->has('count')) {
      $data['count'] = session('count');
      return view('user/include/header', $data) . view('user/shop') . view('user/include/footer');
    }

    return view('user/include/header') . view('user/shop', $data) . view('user/include/footer');
  }

  public function product_details()
  {
    $session = session();

    $category = new CategoryModel();
    $product = new ProductModel();

    $data['category'] = $category->getCategory();
    $data['product_detail'] = $product->getProduct($_GET['id']);

    if ($session->has('count')) {
      $data['count'] = session('count');
      return view('user/include/header', $data) . view('user/product-details') . view('user/include/footer');
    }

    return view('user/include/header') . view('user/product-details', $data) . view('user/include/footer');
  }

  public function cart()
  {
    $session = session();

    $user = new UserModel();

    if ($session->has('user_id')) {
      $user_info = $user->getUser($session->get('user_id'));
    }

    if (!empty($user_info[0]['t_UserCart'])) {

      $user_cart = json_decode($user_info[0]['t_UserCart'], true);

      $data['items'] = $user_cart;
      $data['total'] = $this->total();
      $data['count'] = session('count');

      return view('user/include/header', $data) . view('user/cart') . view('user/include/footer');
    }

    return view('user/include/header') . view('user/cart') . view('user/include/footer');
  }

  public function cart_add()
  {
    $session = session();

    $product = new ProductModel();
    $user = new UserModel();
    $data = $product->find($_POST['productID']);

    if ($session->has('user_id')) {
      $user_info = $user->getUser($session->get('user_id'));
    }

    $item = array(
      'ID' => $data['n_ProductID'],
      'Name' => $data['v_ProductName'],
      'Price' => $data['f_ProductPrice'],
      'Category' => $data['n_CategoryID'],
      'Quantity' => $_POST['quantity'],
      'Image' => $data['v_ProductImage']
    );

    if ($session->has('user_account')) {

      if (!empty($user_info[0]['t_UserCart'])) {

        $cart = json_decode($user_info[0]['t_UserCart'], true);
        $count = count($cart);
        $index = $this->exists($_POST['productID']);

        if ($index == -1){
          array_push($cart, $item);
          $count++;
        } 
        else{
          $cart[$index]['Quantity'] += $_POST['quantity'];
        }

        $user->editCart($session->get('user_id'), json_encode($cart));
        $session->set('count', $count);
      } 
      else {
        $cart = array($item);
        $user->editCart($session->get('user_id'), json_encode($cart));
        $count = 1;
        $session->set('count', $count);
      }

      return "<script>window.history.back()</script>";
    } else {
      $session->destroy();

      return "<script>window.location.assign('" . base_url() . "/login')</script>";
    }
  }

  public function update_quantity()
  {

    $session = session();
    $user = new UserModel();

    if ($session->has('user_id')) {
      $user_info = $user->getUser($session->get('user_id'));
    }

    $cart = json_decode($user_info[0]['t_UserCart'], true);
    for ($i = 0; $i < count($cart); $i++) {

      if ($cart[$i]['ID'] == $_POST['ID']){
        
        $cart[$i]['Quantity'] = $_POST['quantity'];
        $json = json_encode($cart);     
      }
    }

    $user->editCart($session->get('user_id'),$json);
    
    $total = $this->total();
    echo $total;
  }

  private function exists($id)
  {

    $session = session();
    $user = new UserModel();

    if ($session->has('user_id')) {
      $user_info = $user->getUser($session->get('user_id'));
    }

    $items = json_decode($user_info[0]['t_UserCart'], true);

    for ($i = 0; $i < count($items); $i++) {
      if ($items[$i]['ID'] == $id) {
        return $i;
      }
    }

    return -1;
  }

  private function total()
  {
    $session = session();
    $user = new UserModel();

    if ($session->has('user_id')) {
      $user_info = $user->getUser($session->get('user_id'));
    }

    $total = 0;
    $items = json_decode($user_info[0]['t_UserCart'], true);

    foreach ($items as $item) {
      $total += $item['Price'] * $item['Quantity'];
    }

    return $total;
  }

  public function cart_remove()
  {
    $session = session();
    $user = new UserModel();

    if ($session->has('user_id')) {
      $user_info = $user->getUser($session->get('user_id'));
    }

    $cart = json_decode($user_info[0]['t_UserCart'], true);

    $index = $this->exists($_POST['productID']);
    
    array_splice($cart,$index,1);
    $count = $session->get('count');
    
    $json = json_encode($cart);
    
    if ($count > 0)
      $count--;
    
    $user->editCart($session->get('user_id'),$json);  
    $session->set('count', $count);

    return "<script>window.location.assign('" . base_url() . "/cart')</script>";
  }

  public function checkout()
  {
    $session = session();
    $user = new UserModel;
    if ($session->has('user_id')) {
      $info = $user->getUser($session->get('user_id'));
    }
    if (!empty($info[0]['t_UserCart'])) {

      $data['items'] = json_decode($info[0]['t_UserCart'], true);
      $data['total'] = $this->total();
      $data['count'] = session('count');

      return view('user/include/header', $data) . view('user/checkout') . view('user/include/footer');
    }

    return view('user/include/header') . view('user/checkout') . view('user/include/footer');
  }

  public function add_receipt()
  {
    $session = session();
    $receipt_detail = new Detail_ReceiptModel();
    $receipt = new ReceiptModel();
    $product = new ProductModel();

    $num = 0 ;

    for ($i = 0; $i < count($_POST['NameItem']); $i++) {
      
      $product_info =  $product->getProduct($_POST['IDItem'][$i]);
      if ($product_info[0]['n_ProductQuantity'] < $_POST['QuantityItem'][$i]) {
        $data['enough'] = $product_info[0]['v_ProductName'] . " chỉ còn " . $product_info[0]['n_ProductQuantity'] . " sản phẩm";

        return redirect()->back()->with('enough', $data);
      }
    }

    $id = $receipt->addReceipt($session->get('user_id'),$this->total());
    $receipt_detail->addDetailReceipt($id);

  
    for($i = 0; $i < count($_POST['NameItem']); $i++){
      $item = $product->getProduct($_POST['IDItem'][$i]);
      $num = $item[0]['n_ProductQuantity'] - $_POST['QuantityItem'][$i];
      $product->updateProduct($_POST['IDItem'][$i],$num);
    }

    return "<script>window.location.assign('" . base_url() . "/order')</script>";
  }

  public function login()
  {
    return view('/user/login');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return "<script>window.history.back()</script>";
  }

  public function handle_login()
  {
    $session = session();
    $user = new UserModel();

    $rs = $user->where('v_UserName', $this->request->getPost('username'))
      ->where('v_UserPassword', $this->request->getPost('password'))->first();

    if ($rs) {
      $session->set('user_account', $rs['v_UserName']);
      $session->set('user_id', $rs['n_UserID']);

      $user_info = $user->getUser($rs['n_UserID']);
      $user_cart = json_decode($user_info[0]['t_UserCart'], true);
      if(!empty($user_cart)){
        $session->set('count', count($user_cart));
      }
      
      return "<script>window.history.go(-2)</script>";
    } else {
      echo "Login not success";
    }

    if ($session->has('user_id')) {
    }
  }

  public function userProfile()
  {
    return view('/user/include/header') . view('/user/profile');
  }

  public function order()
  {
    
    $session = session();
    if ($session->has('count'))
      $cart['count'] = session('count');
    else
      return view('/user/login');

    $receipt = new ReceiptModel();
    $receipt_detail = new Detail_ReceiptModel();  
    $category = new CategoryModel();  
    $product = new ProductModel();  
   
    $data['receipt'] = $receipt->getUserReceipt($session->get('user_id')); 
    $data['receipt_detail'] = array();

    for($i = 0 ;$i < count($data['receipt']); $i++){
      $array = $receipt_detail->getReceiptDetail($data['receipt'][$i]['n_ReceiptID']);     
      array_push($data['receipt_detail'],$array);
    }
    
    $data['category'] = $category->getCategory();
    $data['product'] = $product->getProduct();
    
    return view('user/include/header',$cart) . view('user/order',$data) . view('user/include/footer');
  }
}
