<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\transaction;
use App\Models\product;
use App\Models\User; 

class transactionComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = false;

    public function getModel()
    {
        return transaction::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['user_id', 'product_id', 'quantity', 'total_price', 'status'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['user_id', 'product_id', 'quantity', 'total_price', 'status'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'product_id' => 'select',
            // 'buyer_name' => 'text', // Jika Anda menggunakan nama pembeli
            // Atau jika menggunakan user_id:
            'user_id' => 'select',
            'quantity' => 'number',
            'total_price' => 'number',
            'status' =>'select',
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'product_id' => 'select',
            // 'buyer_name' => 'required|string', // Tambahkan aturan validasi untuk nama pembeli
            // Jika menggunakan user_id, ganti dengan berikut:
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' =>'select',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
