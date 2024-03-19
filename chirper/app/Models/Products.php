<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'product_name',
        'product_qty',
        'product_price',
        'product_description',
        'created_at',
        'updated_at'
    ];
}
