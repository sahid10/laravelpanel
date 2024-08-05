<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;


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
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            if ($product->image) {
                Storage::delete($product->image);
            }
        });
    }
}
