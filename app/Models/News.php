<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\Category;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'news_image',
        'news_image_url_path',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
