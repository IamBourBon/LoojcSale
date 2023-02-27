<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'n_UserID';
    protected $allowedFields = ['v_UserName', 'v_UserPassword', 'v_UserRole', 't_UserCart'];

    public function getUser($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['n_UserID' => $slug])->get()->getResult('array');
    }

    public function addUser()
    {
        $this->insert([
            'v_UserName' => $_POST['user_name'],
            'v_UserPassword' => $_POST['user_pass'],
            'v_UserRole' => $_POST['user_role']
        ]) ;
    }

    public function deleteUser()
    {
        $this->where(['n_UserID' => $_POST['deleteID']])->delete();
    }

    public function editUser()
    {
        
        $data = [
            'v_UserName' => $_POST['user_name'],
            'v_UserPassword' => $_POST['user_pass'],
            'v_UserRole' => $_POST['user_role']
        ];
        $this->where(['n_UserID' => $_POST['editID']])->set($data)->update();
    }

    public function editCart($id, $cart = false){
        
        $data = [
            't_UserCart' => $cart
        ];
        $this->where(['n_UserID' => $id])->set($data)->update();
    
    }
}