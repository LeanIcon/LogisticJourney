<?php

declare(strict_types=1);

namespace App\Health;

use Illuminate\Support\Facades\Cache;

final class QueueHeartbeatHealthCheck
{
    private const MAX_STALE_SECONDS = 120;

    /**
     * Check queue heartbeat status.
     * Returns true if healthy, false if stale or missing.
     */
    public function __invoke(): bool
    {
        if (config('queue.default') === 'sync') {
            return true;
        }

        $lastBeat = Cache::get('queue:heartbeat');

        if (! $lastBeat) {
            return false;
        }

        $lastBeatTime = is_numeric($lastBeat) ? (int) $lastBeat : 0;

        return (time() - $lastBeatTime) <= self::MAX_STALE_SECONDS;
    }
}
