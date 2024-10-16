<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'referance_no',
        'paid',
        'due',
        'quantity',
        'status',
        'attach_document',
        'supplier_id',
        'product_id',
        'wareshop_id',
        'user_id'
    ];


}
