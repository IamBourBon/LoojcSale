<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'n_CategoryID';
    protected $allowedFields = ['v_CategoryName'];

    public function getCategory($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['n_CategoryID' => $slug])->first();
    }

    public function addCategory()
    {
        $this->insert([
            'v_CategoryName' => $_POST['category_name']
        ]) ;
    }

    public function deleteCategory()
    {
        $this->where(['n_CategoryID' => $_POST['deleteID']])->delete();
    }

    public function editCategory()
    {
        $data = [
            'v_CategoryName' => $_POST['category_name']
        ];
        $this->where(['n_CategoryID' => $_POST['editID']])->set($data)->update();
    }
}