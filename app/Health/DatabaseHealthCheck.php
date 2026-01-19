<?php

declare(strict_types=1);

namespace App\Health;

use Illuminate\Support\Facades\DB;
use Throwable;

final class DatabaseHealthCheck
{
    /**
     * Check database connectivity.
     * Returns true if healthy, false if failed.
     */
    public function __invoke(): bool
    {
        try {
            DB::select('select 1');

            return true;
        } catch (Throwable $e) {
            return false;
        }
    }
}
