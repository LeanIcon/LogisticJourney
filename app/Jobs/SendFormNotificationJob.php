<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Modules\Website\Services\FormNotificationService;

final class SendFormNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 30;

    public string $subject;

    public string $body;

    /** @var array<string, mixed>|null */
    public ?array $formData = null;

    /** @var array<string, mixed>|null */
    public ?array $metadata = null;

    /**
     * @param  array<string, mixed>|null  $formData
     * @param  array<string, mixed>|null  $metadata
     *
     * @phpstan-param array<string, mixed>|null $formData
     * @phpstan-param array<string, mixed>|null $metadata
     */
    public function __construct(
        string $subject,
        string $body,
        ?array $formData = null,
        ?array $metadata = null
    ) {
        $this->subject = $subject;
        $this->body = $body;
        /** @var array<string, mixed>|null $formData */
        $this->formData = $formData;
        /** @var array<string, mixed>|null $metadata */
        $this->metadata = $metadata;
    }

    /** @return array<int> */
    public function backoff(): array
    {
        return [10, 30, 60];
    }

    public function handle(FormNotificationService $notificationService): void
    {
        // Update heartbeat (every job execution)
        Cache::put('queue:heartbeat', now()->timestamp, now()->addMinutes(5));

        $notificationService->sendNotification(
            $this->subject,
            $this->body,
            $this->formData,
            $this->metadata
        );
    }
}
