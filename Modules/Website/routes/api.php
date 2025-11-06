<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Website\Http\Controllers\PageController;
use Modules\Website\Http\Controllers\WebsiteController;
use Modules\Website\Http\Controllers\FormSubmissionController;

/*
|--------------------------------------------------------------------------
| Public API Routes (No Authentication Required)
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    // Pages API - Public content pages (home, about, contact, etc.)
    Route::get('pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('pages/type/{type}', [PageController::class, 'byType'])->name('pages.byType');
    Route::get('pages/{identifier}', [PageController::class, 'show'])->name('pages.show');
    // Form submissions for pages (e.g. demo-request)
    Route::post('pages/{identifier}/submit', [FormSubmissionController::class, 'submit'])->name('pages.submit');
});

/*
|--------------------------------------------------------------------------
| Authenticated API Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('websites', WebsiteController::class)->names('website');
});
