<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\BlogController;

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('blogs', BlogController::class)->names('blog');
// });

Route::prefix('v1')->group(function () {
    // Public posts endpoints
    Route::get('posts', [Modules\Blog\Http\Controllers\Api\V1\PostController::class, 'index']);
    Route::get('posts/{post:slug}', [Modules\Blog\Http\Controllers\Api\V1\PostController::class, 'show']);

    // Categories and posts under a category
    Route::get('categories', [Modules\Blog\Http\Controllers\Api\V1\CategoryController::class, 'index']);
    Route::get('categories/{category:slug}/posts', [Modules\Blog\Http\Controllers\Api\V1\CategoryController::class, 'posts']);
});
