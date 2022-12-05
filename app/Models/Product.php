<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'kone_products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name',
        'reference',
        'price',
        'weight',
        'category_id',
        'stock',
        'state',
        'created_at',
    ];
}
