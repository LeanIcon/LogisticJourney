<?php

declare(strict_types=1);

namespace App\Health;

use Illuminate\Foundation\Configuration\Health;
use Illuminate\Support\Facades\DB;
use Throwable;

final class DatabaseHealthCheck
{
    public function __invoke(Health $health): void
    {
        try {
            DB::select('select 1');
            $health->ok('database');
        } catch (Throwable $e) {
            $health->fail('database', 'Database connection failed');
        }
    }
}
