<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $primaryKey = 'category_id';

    protected $fillable = ['name', 'slug'];
    public $timestamps = true;

    // A category can belong to multiple articles (Many-To-Many)
    public function articles(){
        return $this->belongsToMany(Article::class, 'article_category', 'category_id', 'article_id');
    }
}
