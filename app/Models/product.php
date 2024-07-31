<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class product extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'products';

    protected $fillable = [
        'product_name',
        'price',
        'amount',
        'category_id',
        'image'
    ];
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
}
