<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

    public function index()
    {
    $model = model(UserModel::class);

    $data['user'] = $model->getUser();

    return view('admin/include/header') . view('admin/include/sidebar') . view('admin/user',$data) ;
    }


    public function add_user()
    {
        $model = model(UserModel::class);
        
        $model->addUser();
        
        return "<script>window.location.assign('" . base_url(). "/admin/user')</script>";;
    }

    public function delete_user()
    {
        $model = model(UserModel::class);
        
        $model->deleteUser();
        
        return "<script>window.location.assign('". base_url() ."/admin/user')</script>";
    }

    public function edit_user()
    {
        $model = model(UserModel::class);
        
        $model->editUser();
        
        return "<script>window.location.assign('". base_url() ."/admin/user')</script>";
    }

}