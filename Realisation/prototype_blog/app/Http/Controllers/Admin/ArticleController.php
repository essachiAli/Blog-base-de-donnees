<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
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

    /**
     * Display a listing of articles with filters
     */
    public function index(Request $request)
    {
        $filters = [
            'search' => $request->query('search'),
            'category_id' => $request->query('category_id'),
            'status' => $request->query('status'),
        ];

        $articles = $this->articleService->getArticles($filters);
        $categories = $this->articleService->getAllCategories();

        return view('admin.articles.index', compact('articles', 'categories'));
    }

    /**
     * Show the form for creating a new article
     */
    public function create()
    {
        $categories = $this->articleService->getAllCategories();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created article in storage
     */
    public function store(StoreArticleRequest $request)
    {
        try {
            $this->articleService->createArticle($request->validated());
            return redirect()->route('admin.articles.index')
                ->with('success', 'Article créé avec succès.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Une erreur est survenue lors de la création de l\'article: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified article
     */
    public function edit($id)
    {
        $article = Article::with('categories')->findOrFail($id);
        $categories = $this->articleService->getAllCategories();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified article in storage
     */
    public function update(UpdateArticleRequest $request, $id)
    {
        try {
            $article = Article::findOrFail($id);
            $this->articleService->updateArticle($article, $request->validated());
            return redirect()->route('admin.articles.index')
                ->with('success', 'Article mis à jour avec succès.');
        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Une erreur est survenue lors de la mise à jour de l\'article.');
        }
    }

    /**
     * Remove the specified article from storage
     */
    public function destroy($id)
    {
        try {
            $article = Article::findOrFail($id);
            $this->articleService->deleteArticle($article);
            return response()->json([
                'success' => true,
                'message' => 'Article supprimé avec succès.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de la suppression.'
            ], 500);
        }
    }
}
