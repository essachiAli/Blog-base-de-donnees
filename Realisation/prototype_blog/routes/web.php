<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;


// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('articles', AdminArticleController::class);
});

// Public Routes (existing)
// Public Routes
Route::get('/', [App\Http\Controllers\Public\BlogController::class, 'index'])->name('home');
Route::get('/articles', [App\Http\Controllers\Public\BlogController::class, 'articles'])->name('articles.index');
Route::get('/articles/{slug}', [App\Http\Controllers\Public\BlogController::class, 'show'])->name('articles.show');
Route::get('/categories/{slug}', [App\Http\Controllers\Public\BlogController::class, 'category'])->name('categories.show');
Route::get('/search', [App\Http\Controllers\Public\BlogController::class, 'search'])->name('search');

// Route pour la suppression via AJAX (existing)
Route::delete('articles/{article}', [ArticleController::class, 'destroy'])
    ->name('articles.destroy');
