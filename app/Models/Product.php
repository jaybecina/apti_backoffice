<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_title',
        'name',
        'description',
        'image',
        'image_url_path',
        'is_featured',
        'price',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }
}
