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
        'title', 'slug', 'content', 'author_id', 'status', 'image'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'user_id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PUBLISHED = 'published';
}
