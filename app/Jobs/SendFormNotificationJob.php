<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Modules\Website\Services\FormNotificationService;

final class SendFormNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $timeout = 30;

    public string $subject;

    public string $body;

    public ?array $formData;

    public ?array $metadata;

    public function __construct(
        string $subject,
        string $body,
        ?array $formData = null,
        ?array $metadata = null
    ) {
        $this->subject = $subject;
        $this->body = $body;
        $this->formData = $formData;
        $this->metadata = $metadata;
    }

    public function backoff(): array
    {
        return [10, 30, 60];
    }

    public function handle(FormNotificationService $notificationService): void
    {
        // Update heartbeat (every job execution)
        Cache::put('queue:heartbeat', now()->timestamp, now()->addMinutes(5));

        Log::info('Processing SendFormNotificationJob', [
            'subject' => $this->subject,
            'has_form_data' => ! empty($this->formData),
            'has_metadata' => ! empty($this->metadata),
        ]);

        $result = $notificationService->sendNotification(
            $this->subject,
            $this->body,
            $this->formData,
            $this->metadata
        );

        Log::info('SendFormNotificationJob completed', [
            'subject' => $this->subject,
            'success' => $result,
        ]);
    }
}
