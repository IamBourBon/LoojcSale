<?php

namespace App\Models;

use App\Controllers\Category;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'n_ProductID';
    protected $allowedFields = ['v_ProductName', 'n_ProductQuantity', 'f_ProductPrice', 'v_ProductDetail', 'n_CategoryID', 'v_ProductImage'];

    public function getProduct($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['n_ProductID' => $slug])->get()->getResult('array');
    }

    public function addProduct($file)
    {
        $imageName = null ;
                 
        if($file->isValid()){         
            $imageName = $file->getName();
            $file->move('./upload/'.$_POST['product_category']."/".$_POST['product_name'],$imageName);   
        }   
         
        $this->insert([
            'v_ProductName' => $_POST['product_name'],
            'n_ProductQuantity' => $_POST['product_quantity'],
            'f_ProductPrice' => $_POST['product_price'],
            'v_ProductDetail' => $_POST['product_detail'],
            'n_CategoryID' => $_POST['product_category'],
            'v_ProductImage' => $imageName
        ]);
    }

    public function deleteProduct()
    {   
        $dir_path = 'upload/' . $_POST['deleteCategory'] ."/". $_POST['deleteName'] ;
        if(is_dir($dir_path)){
            if(is_file($dir_path."/".$_POST['deleteImage'])){
                unlink($dir_path."/".$_POST['deleteImage']); // Delete files into the folder
            }
            if(is_file($dir_path."/"."index.html")){
                unlink($dir_path."/"."index.html"); // Delete files into the folder
            }
            rmdir($dir_path); // Delete the folder
        }
        $this->where(['n_ProductID' => $_POST['deleteID']])->delete();
    }

    public function editProduct($file)
    {
        $imageName = null ;

        if($file->isValid()){         
            if(file_exists('./upload/'.$_POST['product_category']."/".$_POST['product_name']."/".$_POST['oldImage'])){
                unlink('./upload/'.$_POST['product_category']."/".$_POST['product_name']."/".$_POST['oldImage']);
            }
           
            $imageName = $file->getName();
            $file->move('./upload/'.$_POST['product_category']."/".$_POST['product_name'],$imageName);      

        }else{
            $imageName = $_POST['oldImage'];    
        } 

        $data = [
            'v_ProductName' => $_POST['product_name'],
            'n_ProductQuantity' => $_POST['product_quantity'],
            'f_ProductPrice' => $_POST['product_price'],
            'v_ProductDetail' => $_POST['product_detail'],
            'v_ProductImage' => $imageName,
        ];
        $this->where(['n_ProductID' => $_POST['editID']])->set($data)->update();
    }

    public function updateProduct($id, $quantity){
        
        $data = [
            'n_ProductQuantity' => $quantity,
        ];
        $this->where(['n_ProductID' => $id])->set($data)->update();
    }
}