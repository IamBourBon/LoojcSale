<?php

namespace App\Models;

use CodeIgniter\Model;

class Detail_ReceiptModel extends Model
{
    protected $table = 'detail_receipt';
    protected $primaryKey = 'n_DetailReceiptID';
    protected $allowedFields = ['n_ReceiptID','n_ItemID','n_ItemCategoryID','v_ItemName',
    'n_ItemQuantity','f_ItemPrice','v_ItemImage'];

    public function getReceiptDetail($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['n_ReceiptID' => $id])->get()->getResult('array');
    }
   
    public function addDetailReceipt($id)
    {
        for($i = 0 ; $i < count($_POST['NameItem']); $i++){
            
            $this->insert([
                'n_ReceiptID' => $id,
                'n_ItemID' => $_POST['IDItem'][$i],
                'n_ItemCategoryID' => $_POST['CategoryItem'][$i],
                'v_ItemName' => $_POST['NameItem'][$i],
                'n_ItemQuantity' => $_POST['QuantityItem'][$i],
                'f_ItemPrice' => $_POST['PriceItem'][$i],
                'v_ItemImage' => $_POST['ImageItem'][$i]
            ]) ;
        }  
    }

    public function adminAddDetailReceipt()
    {        
        $this->insert([
            'n_ReceiptID' => $_POST['ReceiptID'],
            'n_ItemID' => $_POST['ItemID'],
            'n_ItemCategoryID' => $_POST['ItemCategory'],
            'v_ItemName' => $_POST['ItemName'],
            'n_ItemQuantity' => $_POST['Quantity'],
            'f_ItemPrice' => $_POST['ItemPrice'],
            'v_ItemImage' => $_POST['ItemImage']
        ]); 


    }

    public function deleteDetail()
    {
        $this->where(['n_DetailReceiptID' => $_POST['deleteID']])->delete();
    }

}