<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     protected $fillable = [
        'product_name',
        'product_short_desc',
        'product_long_desc',
        'price',
        'category_name',
        'category_id',
        'subcategory_name',
        'subcategory_id',
        'total_product',
        'product_image',
        'slug',
    ];    
    

}
