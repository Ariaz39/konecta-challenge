<?php

namespace App\Models;

use Carbon\Carbon;
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
        'status',
        'created_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value)->locale('es-co');
        return $value->diffForHumans();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }

    public function getReferenceAttribute($value)
    {
        return strtoupper($value);
    }
}
