<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceiptModel extends Model
{
    protected $table = 'receipt';
    protected $primaryKey = 'n_ReceiptID';
    protected $allowedFields = ['n_UserID','v_LastName','v_FirstName','v_Email','v_Country',
    'v_Address','n_Phone','v_Comment','b_Status','f_Total'];

    public function getReceipt($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->where(['n_ReceiptID' => $id])->get()->getResult('array');
    }

    public function getUserReceipt($id)
    {
        return $this->where(['n_UserID' => $id])->get()->getResult('array');
    }

    public function addReceipt($user_id , $total = false)
    {
        if ($total === false) {
            $total = 0;
        }
        $this->insert([
            'n_UserID' => $user_id,
            'v_LastName' => $_POST['LName'],
            'v_FirstName' => $_POST['FName'],
            'v_Email' => $_POST['Email'],
            'v_Country' => $_POST['country'],
            'v_Address' => $_POST['address'],
            'n_Phone' => $_POST['phone'],
            'v_Comment' => $_POST['comment'],
            'b_Status' => 0,
            'f_Total' => $total
        ]) ;
        
        return $this->db->insertID();
    }

    public function deleteCategory($status)
    {
        $data = [
            'b_Status' => $status
        ];
        $this->where(['n_ReceiptID' => $_POST['ID']])->set($data)->update();
        //$this->where(['n_CategoryID' => $_POST['deleteID']])->delete();
    }

    public function editReceipt()
    {
        $data = [
            'v_LastName' => $_POST['LName'],
            'v_FirstName' => $_POST['FName'],
            'v_Email' => $_POST['Email'],
            'v_Country' => $_POST['Country'],
            'v_Address' => $_POST['Address'],
            'n_Phone' => $_POST['Phone'],
            'v_Comment' => $_POST['Comment'],
            'b_Status' => $_POST['Status']
        ];
        $this->where(['n_ReceiptID' => $_POST['ID']])->set($data)->update();
    }

    public function updateTotal($total)
    {
        $data = [
            'f_Total' => $total,
        ];
        $this->where(['n_ReceiptID' => $_POST['ReceiptID']])->set($data)->update();
    }
}