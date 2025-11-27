<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class pivoteArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagsId= Tag::pluck('id');

        Article::all()->each(function($article) use($tagsId){
            $article->tags()->sync($tagsId->random(rand(1, 4))->all());
        });
    }
};