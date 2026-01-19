<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;

final class HealthController
{
    public function up(): Response
    {
        $results = [];
        $status = 200;

        // Database check
        try {
            DB::select('select 1');
            $results['database'] = ['ok' => true];
        } catch (Throwable $e) {
            $results['database'] = ['ok' => false, 'error' => 'Database connection failed'];
            $status = 500;
        }

        // Queue heartbeat check
        if (config('queue.default') === 'sync') {
            $results['queue'] = ['ok' => true, 'note' => 'Queue disabled (sync)'];
        } else {
            $lastBeat = Cache::get('queue:heartbeat');
            if (! $lastBeat) {
                $results['queue'] = ['ok' => false, 'error' => 'No heartbeat recorded'];
                $status = 500;
            } elseif (is_numeric($lastBeat) && (time() - (int) $lastBeat) > 120) {
                $results['queue'] = ['ok' => false, 'error' => 'Worker heartbeat stale'];
                $status = 500;
            } else {
                $results['queue'] = ['ok' => true];
            }
        }

        return response($results, $status);
    }
}
