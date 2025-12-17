<?php

declare(strict_types=1);

use App\Livewire\Admin\Documentation;
use Illuminate\Support\Facades\Route;

// Register the admin documentation page route for Filament navigation
Route::get('/docs', Documentation::class)->name('docs');
