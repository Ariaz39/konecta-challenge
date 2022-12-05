<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'kone_categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'name',
        'description',
        'state',
        'status',
        'created_at',
    ];

    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value)->locale('es-co');
        return $value->diffForHumans();
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(strtolower($value));
    }
}
