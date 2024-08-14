<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\transaction;
use App\Models\product;
use App\Models\User; 

class TransactionComponent implements CRUDComponent
{
    public $create = true;
    public $delete = true;
    public $update = true;

    public $with_user_id = false;

    public function getModel()
    {
        return transaction::class;
    }

    public function fields()
    {
        return ['user_id', 'product_id', 'quantity', 'total_price', 'status'];
    }

    public function searchable()
    {
        return ['user_id', 'product_id', 'quantity', 'total_price', 'status'];
    }

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

    public function storePaths()
    {
        return [];
    }
}
