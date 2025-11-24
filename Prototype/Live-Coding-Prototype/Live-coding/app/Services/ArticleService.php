<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleService
{
    public function getPaginatedArticles(?int $categoryId = null, int $perPage = 15): LengthAwarePaginator
    {
        $query = Article::query()
            ->with(['category', 'author'])
            ->when($categoryId, function ($q) use ($categoryId) {
                return $q->where('category_id', $categoryId);
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at');

        return $query->paginate($perPage)->withQueryString();
    }

    public function getAllCategories()
    {
        return \App\Models\Category::orderBy('name')->get();
    }

    public function deleteArticle(int $articleId): bool
    {
        $article = Article::findOrFail($articleId);
        return $article->delete();
    }
}
