<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Product extends BaseController
{

    public function index()
    {
    $product = model(ProductModel::class);
    $category = model(CategoryModel::class);

    $data['product'] = $product->getProduct();
    $data['category'] = $category->getCategory();

    return view('admin/include/header') . view('admin/include/sidebar') . view('admin/product',$data) ;
    }


    public function add_product()
    {
        $model = model(ProductModel::class);
        

        $img = $this->request->getFile('product_image');    
        $model->addProduct($img);
        
        return "<script>window.location.assign('" . base_url() . "/admin/product')</script>";;
    }

    public function delete_product()
    {    
        $model = model(ProductModel::class);
        
        $model->deleteProduct();
        
        return "<script>window.location.assign('". base_url() ."/admin/product')</script>";
    }

    public function edit_product()
    {
        $model = model(ProductModel::class);
        

        $img = $this->request->getFile('product_image');    
        $model->editProduct($img);
        
        return "<script>window.location.assign('". base_url() ."/admin/product')</script>";
    }
}