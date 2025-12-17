<?php

declare(strict_types=1);

namespace App\Health;

use Illuminate\Foundation\Configuration\Health;
use Illuminate\Support\Facades\Cache;

final class QueueHeartbeatHealthCheck
{
    private const MAX_STALE_SECONDS = 120;

    public function __invoke(Health $health): void
    {
        if (config('queue.default') === 'sync') {
            $health->ok('queue', 'Queue disabled (sync)');

            return;
        }

        $lastBeat = Cache::get('queue:heartbeat');

        if (! $lastBeat) {
            $health->fail('queue', 'No heartbeat recorded');

            return;
        }

        if ((time() - (int) $lastBeat) > self::MAX_STALE_SECONDS) {
            $health->fail('queue', 'Worker heartbeat stale');

            return;
        }

        $health->ok('queue');
    }
}
