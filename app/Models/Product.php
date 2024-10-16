<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_url',
        'name',
        'price',
        'quantity',
        'sell_price',
        'date',
        'status',
        'code',
        'brand_id',
        'category_id',
        'unit_id',
        'user_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // Relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    // Relationship with Supplier
    public function supplier()
    {
        return $this->belongsTo(Supriler::class, 'suppliers_id');
    }
}
