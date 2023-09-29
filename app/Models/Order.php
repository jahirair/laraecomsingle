<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'user_name',
        'house_name',
        'road_name',
        'shipping_phone_number',
        'district',
        'country',
        'cart_id',
        'product_name',
        'price',
        'quantity',
        'total_price',
        
    ];
}
