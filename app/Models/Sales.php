<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'kone_sales';
    protected $primaryKey = 'sale_id';

    protected $fillable = [
        'product_id',
        'amount',
        'created_at',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }

    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value)->locale('es-co');
        return $value->diffForHumans();
    }
}
