<?php

declare(strict_types=1);

namespace Modules\Website\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

final class FormNotificationService
{
    private string $mailFrom;

    private array $recipients;

    private string $recaptchaSecret;

    private string $localSavePath;

    public function __construct()
    {
        $this->mailFrom = config('services.form_notifications.mail_from');
        $this->recaptchaSecret = config('services.recaptcha.secret');
        $this->localSavePath = config('services.form_notifications.contacts_save_path');

        $recipients = config('services.form_notifications.recipients') ?? '';
        $this->recipients = array_filter(array_map('trim', explode(',', $recipients)));
    }

    public function verifyRecaptcha(?string $token): bool
    {
        if (! $token) {
            return false;
        }

        $response = file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify',
            false,
            stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query([
                        'secret' => $this->recaptchaSecret,
                        'response' => $token,
                    ]),
                ],
            ])
        );

        $data = json_decode($response, true);
        Log::info('reCAPTCHA response', $data ?? []);

        return ($data['success'] ?? false) === true;
    }

    public function saveContactData(array $data): void
    {
        file_put_contents(
            $this->localSavePath,
            implode('|', $data).PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

    public function sendNotification(
        string $subject,
        string $body,
        ?array $formData = null,
        ?array $metadata = null
    ): bool {
        try {
            if (empty($this->recipients)) {
                Log::warning('No recipients configured for form notifications');
                return false;
            }

            Log::info('Sending admin notification email', [
                'subject' => $subject,
                'recipients' => $this->recipients,
                'from' => $this->mailFrom,
                'form_slug' => $metadata['formSlug'] ?? 'unknown',
            ]);

            Mail::send('emails.admin-notification', [
                'formData' => $formData ?? [],
                'formName' => $metadata['formName'] ?? 'Form Submission',
                'formSlug' => $metadata['formSlug'] ?? 'unknown',
                'timestamp' => $metadata['timestamp'] ?? now()->format('Y-m-d H:i:s'),
            ], function ($message) use ($subject) {
                $message->subject($subject)
                    ->from($this->mailFrom)
                    ->to($this->recipients);
            });

            Log::info('Admin notification email sent successfully', [
                'recipients' => $this->recipients,
                'subject' => $subject,
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Admin notification email sending failed', [
                'error' => $e->getMessage(),
                'recipients' => $this->recipients,
                'subject' => $subject,
                'exception' => get_class($e),
            ]);

            return false;
        }
    }

    public function sendConfirmationToUser(string $email): bool
    {
        try {
            Log::info('Sending user confirmation email', [
                'to' => $email,
                'from' => $this->mailFrom,
            ]);

            Mail::send('emails.confirmation', [], function ($message) use ($email) {
                $message->subject('Thank you for contacting Logistic Journey')
                    ->from($this->mailFrom)
                    ->to($email);
            });

            Log::info('User confirmation email sent successfully', [
                'to' => $email,
                'subject' => 'Thank you for contacting Logistic Journey',
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('User confirmation email failed', [
                'to' => $email,
                'error' => $e->getMessage(),
                'exception' => get_class($e),
            ]);

            return false;
        }
    }

}
