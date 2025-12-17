<?php

declare(strict_types=1);
use App\Http\Controllers\HealthController;
use App\Livewire\Admin\CustomLogin;
use App\Livewire\Admin\Documentation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', CustomLogin::class)->name('login');

Route::get('/docs', Documentation::class)->name('app.docs');

// Health check endpoint
Route::get('/up', [HealthController::class, 'up']);

// Common route redirects for better UX
Route::get('/welcome', fn (): RedirectResponse => redirect('/'));
Route::get('/home', fn (): RedirectResponse => redirect('/'));
Route::get('/dashboard', fn (): RedirectResponse => redirect('/app'));
Route::get('/admin', fn (): RedirectResponse => redirect('/app'));
