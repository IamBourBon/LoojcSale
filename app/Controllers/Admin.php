<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
  public function index()
  {
    return view('admin/include/header'). view('admin/include/sidebar') . view('admin/index');
  }

  public function loginform()
  {
    $session = session();
    $session->destroy();
    
    return view('admin/login');
  }

  public function login()
  {
    $session = session();
    $user = new UserModel();

    $rs = $user->where('v_UserName',$this->request->getPost('username'))
               ->where('v_UserPassword',$this->request->getPost('password'))->first();

    if($rs){
      $session->set('s_username',$rs['v_UserName']);
      $session->set('s_userpass',$rs['v_UserPassword']);
      
      $data['data_session'] = $session->get('s_username'); 
    
      return "<script>window.location.assign('". base_url() ."/admin')</script>";
      
    }else{
      echo "Login not success";
    }
    
  }

}
