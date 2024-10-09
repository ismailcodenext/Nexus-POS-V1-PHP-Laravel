<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'sell_price',
        'date',
        'status',
        'code',
        'brand_id',
        'category_id',
        'unit_id',
        'suppliers_id',
        'user_id'
    ];
}
