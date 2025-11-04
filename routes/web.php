<?php

declare(strict_types=1);

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - LogisticJourney CMS
|--------------------------------------------------------------------------
|
| This application uses Filament as the primary interface for content
| management. All web routes redirect to the Filament admin panel for
| streamlined user experience and centralized management.
|
| Admin Panel: /app (Filament)
| API Endpoints: /api/v1/* (RESTful API for frontend consumption)
|
*/

// Primary route: Redirect to Filament admin login
Route::get('/', fn (): RedirectResponse => redirect('/app/login'));

// Common route redirects for better UX
Route::get('/welcome', fn (): RedirectResponse => redirect('/app/login'));
Route::get('/home', fn (): RedirectResponse => redirect('/app/login'));
Route::get('/dashboard', fn (): RedirectResponse => redirect('/app/login'));
