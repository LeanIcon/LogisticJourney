<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Website\Http\Controllers\PageController;
use Modules\Website\Http\Controllers\WebsiteController;
use Modules\Website\Http\Controllers\FormSubmissionController;
use Modules\Website\Http\Controllers\FormController;
use Modules\Website\Http\Controllers\PolicyController;
use Modules\Website\Http\Controllers\FaqController;

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
    // Forms API - frontend can fetch available forms and their fields
    Route::get('forms', [FormController::class, 'index'])->name('forms.index');
    Route::get('forms/{identifier}', [FormController::class, 'show'])->name('forms.show');

    // Policies API - public index and show
    Route::get('policies', [PolicyController::class, 'index'])->name('policies.index');
    Route::get('policies/{policy:slug}', [PolicyController::class, 'show'])->name('policies.show');

    // FAQs API - public index and show
    Route::get('faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('faqs/{faq}', [FaqController::class, 'show'])->name('faqs.show');
});

/*
|--------------------------------------------------------------------------
| Authenticated API Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('websites', WebsiteController::class)->names('website');
});
