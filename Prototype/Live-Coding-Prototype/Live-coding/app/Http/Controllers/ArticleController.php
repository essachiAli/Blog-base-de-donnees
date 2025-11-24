<?php

namespace App\Http\Controllers;

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
        $categoryId = $request->query('category');

        $articles = $this->articleService->getPaginatedArticles($categoryId);
        $categories = $this->articleService->getAllCategories();

        return view('articles.index', compact('articles', 'categories', 'categoryId'));
    }

    public function destroy($id)
    {
        $deleted = $this->articleService->deleteArticle($id);

        return redirect()->route('articles.index')
            ->with('success', $deleted ? 'Article supprimé avec succès !' : 'Erreur lors de la suppression.');
    }
}
