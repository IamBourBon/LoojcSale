<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{

    public function index()
    {
    $model = model(CategoryModel::class);

    $data['category'] = $model->getCategory();

    return view('admin/include/header') . view('admin/include/sidebar') . view('admin/category',$data) ;
    }


    public function add_category()
    {
        $model = model(CategoryModel::class);
        
        $model->addCategory();
        
        return "<script>window.location.assign('" . base_url(). "/admin/category')</script>";;
    }

    public function delete_category()
    {
        $model = model(CategoryModel::class);
        
        $model->deleteCategory();
        
        return "<script>window.location.assign('". base_url() ."/admin/category')</script>";
    }

    public function edit_category()
    {
        $model = model(CategoryModel::class);
        
        $model->editCategory();
        
        return "<script>window.location.assign('". base_url() ."/admin/category')</script>";
    }
}