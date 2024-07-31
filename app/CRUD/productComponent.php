<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\product;
use App\Models\category;
use EasyPanel\Parsers\Fields\Field;


class productComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return product::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ['product_name'=> Field::title('Product Name'), 'price', 'amount', 'category_id', 'image'];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['product_name', 'price', 'amount', 'category_id', 'image'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [
            'product_name'=>'text',
            'price'=>'number',
            'amount'=>'number',
            'category_id'=>'select',
            'image'=>'file'
            
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'product_name'=>'required',
            'price'=>'required',
            'amount'=>'required',
            'category_id'=>'required',
            'image'=>'image|max:1024',
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [
            'image' => 'public/products'
        ];
    }
}
