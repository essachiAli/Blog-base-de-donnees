<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    // Mass assignable attributes
    use HasFactory;

    // Status constants
    const STATUS_DRAFT = 'draft';
    const STATUS_PUBLISHED = 'published';

    protected $fillable = ['title', 'slug', 'content', 'user_id', 'status'];

    /**
     * Boot method to auto-generate slug from title
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = \Illuminate\Support\Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title') && empty($article->slug)) {
                $article->slug = \Illuminate\Support\Str::slug($article->title);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
        // Un article appartient à un utilisateur
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
        // Un article peut avoir plusieurs tags (et vice versa)
        // Laravel utilise automatiquement la table article_tag
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category');
        // Un article peut avoir plusieurs catégories (et vice versa)
    }
}
