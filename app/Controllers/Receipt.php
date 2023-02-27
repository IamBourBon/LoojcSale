<?php

namespace App\Controllers;

use App\Models\ReceiptModel;
use App\Models\Detail_ReceiptModel;
use App\Models\CategoryModel;
use App\Models\ProductModel;

class Receipt extends BaseController
{

    public function index()
    {
    $receipt = new ReceiptModel();

    $data['receipt'] = $receipt->getReceipt();
    
    return view('admin/include/header') . view('admin/include/sidebar') . view('admin/receipt',$data) ;
    }

    public function index_detail()
    {
        $receipt = new ReceiptModel();
        $receipt_detail = new Detail_ReceiptModel();  
        $category = new CategoryModel();  
        $product = new ProductModel();  
        $data['receipt'] = $receipt->getReceipt($_GET['id']);
        $data['receipt_detail'] = $receipt_detail->getReceiptDetail($_GET['id']);
        $data['category'] = $category->getCategory();
        $data['product'] = $product->getProduct();
        
        return view('admin/include/header') . view('admin/include/sidebar') . view('admin/receipt_detail',$data) ;
    }


    public function add_receipt_detail()
    {
        $receipt_detail = new Detail_ReceiptModel();
        $receipt = new ReceiptModel();  
        
        $receipt_detail->adminAddDetailReceipt();
        $items = $receipt_detail->getReceiptDetail($_POST['ReceiptID']);
        $total = 0 ; 
        foreach($items as $item){
            $total += $item['f_ItemPrice'] * $item['n_ItemQuantity'];
        }

        $receipt->updateTotal($total);
        
        return "<script>window.history.back()</script>";
    }

    public function delete_receipt_detail()
    {    
        $receipt_detail = new Detail_ReceiptModel();
        $receipt = new ReceiptModel(); 
       
        $receipt_detail->deleteDetail();

        $items = $receipt_detail->getReceiptDetail($_POST['ReceiptID']);
        $total = 0 ; 
        foreach($items as $item){
            $total += $item['f_ItemPrice'] * $item['n_ItemQuantity'];
        }

        $receipt->updateTotal($total);
        
        return "<script>window.history.back()</script>";
    }

    public function edit_receipt()
    {
        $receipt = new ReceiptModel();  
        $product = new ProductModel();  
        $receipt_detail = new Detail_ReceiptModel();
        $num = 0 ;

        $detail = $receipt_detail->getReceiptDetail($_POST['ID']);
        $receipt->editReceipt();      
        
            if($_POST['Status'] == 2){
                foreach($detail as $detail_item){
                    $item = $product->getProduct($detail_item['n_ItemID']);
                    $num = $item[0]['n_ProductQuantity'] + $detail_item['n_ItemQuantity'];
                    $product->updateProduct($detail_item['n_ItemID'],$num);
                }
            }
        return "<script>window.history.back()</script>";
    }

    public function add_receipt()
    {
        $session = session();

        $receipt = new ReceiptModel(); 

        if ($session->has('user_id')) {
            $receipt->addReceipt($session->get('user_id'));
        }
         
        return "<script>window.history.back()</script>";
    }

    public function delete_receipt(){
        $receipt = new ReceiptModel();
        $receipt->deleteCategory(2); //stt 2 = huy don hang
        return "<script>window.history.back()</script>";
    }
}