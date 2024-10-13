<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supriler extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'company',
        'mobile',
        'address',
        'email',
        'img_url',
        'status',
        'user_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'suppliers_id');
    }

}
