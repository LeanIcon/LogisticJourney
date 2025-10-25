<?php

use Illuminate\Support\Facades\Route;
use Modules\Blocks\Http\Controllers\BlocksController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('blocks', BlocksController::class)->names('blocks');
});
