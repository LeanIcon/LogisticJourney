<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Blocks\Http\Controllers\BlocksController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('blocks', BlocksController::class)->names('blocks');
});
