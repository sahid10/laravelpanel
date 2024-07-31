<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class transaction extends Model
{
    use HasFactory;
    use HasApiTokens;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status'
    ];
    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 2, ',', '.');
    }
}
