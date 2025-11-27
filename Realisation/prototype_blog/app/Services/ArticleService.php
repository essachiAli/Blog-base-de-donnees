<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ArticleService
{
    /**
     * Get filtered and paginated articles
     * 
     * @param array $filters
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getArticles($filters = [])
    {
        $query = Article::with(['categories', 'user'])
            ->orderBy('created_at', 'desc');

        // Apply search filter
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Apply category filter
        if (!empty($filters['category_id'])) {
            $query->whereHas('categories', function ($q) use ($filters) {
                $q->where('categories.id', $filters['category_id']);
            });
        }

        // Apply status filter
        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        return $query->paginate($filters['per_page'] ?? 10);
    }

    /**
     * Create new article with admin user assignment
     * 
     * @param array $data
     * @return Article
     */
    public function createArticle(array $data)
    {
        DB::beginTransaction();
        try {
            // Get admin user
            $admin = User::where('role', 'admin')->first();
            
            if (!$admin) {
                throw new \Exception('Admin user not found. Please create an admin user first.');
            }

            // Create article
            $article = Article::create([
                'title' => $data['title'],
                'content' => $data['content'],
                'status' => $data['status'] ?? Article::STATUS_DRAFT,
                'user_id' => $admin->id,
            ]);

            // Sync categories
            if (isset($data['categories']) && is_array($data['categories'])) {
                $article->categories()->sync($data['categories']);
            }

            DB::commit();
            return $article;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Update article with category sync
     * 
     * @param Article $article
     * @param array $data
     * @return Article
     */
    public function updateArticle(Article $article, array $data)
    {
        DB::beginTransaction();
        try {
            // Update article fields
            $updateData = [
                'title' => $data['title'],
                'content' => $data['content'],
            ];

            if (isset($data['status'])) {
                $updateData['status'] = $data['status'];
            }

            $article->update($updateData);

            // Sync categories
            if (isset($data['categories']) && is_array($data['categories'])) {
                $article->categories()->sync($data['categories']);
            }

            DB::commit();
            return $article;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Delete article
     * 
     * @param Article $article
     * @return bool
     */
    public function deleteArticle(Article $article): bool
    {
        return $article->delete();
    }

    /**
     * Get published articles with pagination
     * 
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPublishedArticles($perPage = 6)
    {
        return Article::with(['categories', 'user'])
            ->where('status', Article::STATUS_PUBLISHED)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get single published article by slug
     * 
     * @param string $slug
     * @return Article
     */
    public function getArticleBySlug($slug)
    {
        return Article::with(['categories', 'user'])
            ->where('status', Article::STATUS_PUBLISHED)
            ->where('slug', $slug)
            ->firstOrFail();
    }

    /**
     * Get published articles by category slug
     * 
     * @param string $slug
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getArticlesByCategory($slug, $perPage = 9)
    {
        return Article::with(['categories', 'user'])
            ->where('status', Article::STATUS_PUBLISHED)
            ->whereHas('categories', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Search published articles
     * 
     * @param string $keyword
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function searchArticles($keyword, $perPage = 9)
    {
        return Article::with(['categories', 'user'])
            ->where('status', Article::STATUS_PUBLISHED)
            ->where(function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%")
                      ->orWhere('content', 'like', "%{$keyword}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Get all categories
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories()
    {
        return Category::orderBy('name')->get();
    }

    // Legacy methods for backward compatibility with existing code
    public function getFilteredArticles($category = null, $perPage = 10)
    {
        $filters = [];
        if ($category) {
            $cat = Category::where('name', $category)->first();
            if ($cat) {
                $filters['category_id'] = $cat->id;
            }
        }
        $filters['per_page'] = $perPage;
        return $this->getArticles($filters);
    }
}
