<?php

declare(strict_types=1);
use App\Http\Controllers\HealthController;
use App\Livewire\Admin\CustomLogin;
use App\Livewire\Admin\Documentation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', CustomLogin::class)->name('login');

Route::get('/docs', Documentation::class)->name('app.docs');

// Local README viewer (renders project README.md)
Route::get('/docs/readme', function () {
    $path = base_path('README.md');
    if (! file_exists($path)) {
        abort(404);
    }
    $markdown = Illuminate\Support\Str::markdown(file_get_contents($path));

    return view('docs.readme', ['content' => $markdown]);
})->name('docs.readme');

// Health check endpoint
Route::get('/up', [HealthController::class, 'up']);

// Common route redirects for better UX
Route::get('/welcome', fn (): RedirectResponse => redirect('/'));
Route::get('/home', fn (): RedirectResponse => redirect('/'));
Route::get('/dashboard', fn (): RedirectResponse => redirect('/app'));
Route::get('/admin', fn (): RedirectResponse => redirect('/app'));
