<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'article_id';

    protected $fillable = [
        'title', 'slug', 'content', 'image', 'views',
        'author_id', 'category_id', 'status', 'is_moderated', 'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_moderated' => 'boolean',
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'user_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
