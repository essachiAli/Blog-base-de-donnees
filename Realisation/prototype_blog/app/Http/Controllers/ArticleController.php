<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index(Request $request)
    {
        $category = $request->query('category');
        $articles = $this->articleService->getFilteredArticles($category);
        $categories = $this->articleService->getAllCategories();

        return view('articles.index', compact('articles', 'categories', 'category'));
    }

    public function edit(Article $article)
    {
        $categories = $this->articleService->getAllCategories();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'created_at' => 'nullable|date',
            'tags' => 'array',
        ]);

        try {
            $this->articleService->updateArticle($article, $validated);
            return redirect()->route('articles.index')
                ->with('success', 'Article mis à jour avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue lors de la mise à jour de l\'article.');
        }
    }

    public function destroy(Article $article)
    {
        try {
            $this->articleService->deleteArticle($article);
            return response()->json(['success' => true, 'message' => 'Article supprimé avec succès.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Une erreur est survenue lors de la suppression.'], 500);
        }
    }
}
