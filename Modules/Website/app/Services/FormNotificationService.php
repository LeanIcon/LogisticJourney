<?php

declare(strict_types=1);

namespace Modules\Website\Services;

use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

final class FormNotificationService
{
    private PHPMailer $mailer;

    private string $smtpHost;

    private string $smtpUsername;

    private string $smtpPassword;

    private int $smtpPort;

    private string $smtpSecure;

    private string $mailFrom;

    private array $recipients;

    private string $recaptchaSecret;

    private string $localSavePath;

    public function __construct()
    {
        $this->smtpHost = config('services.form_notifications.smtp_host');
        $this->smtpUsername = config('services.form_notifications.smtp_username');
        $this->smtpPassword = config('services.form_notifications.smtp_password');
        $this->smtpPort = (int) config('services.form_notifications.smtp_port');
        $this->smtpSecure = config('services.form_notifications.smtp_secure');
        $this->mailFrom = config('services.form_notifications.mail_from');
        $this->recaptchaSecret = config('services.recaptcha.secret');
        $this->localSavePath = config('services.form_notifications.contacts_save_path');

        $recipients = config('services.form_notifications.recipients') ?? '';
        $this->recipients = array_filter(array_map('trim', explode(',', $recipients)));

        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->Host = $this->smtpHost;
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->smtpUsername;
        $this->mailer->Password = $this->smtpPassword;
        $this->mailer->SMTPSecure = $this->smtpSecure;
        $this->mailer->Port = $this->smtpPort;
        $this->mailer->setFrom($this->mailFrom);

        foreach ($this->recipients as $recipient) {
            $this->mailer->addAddress($recipient);
        }
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
            $this->mailer->Subject = $subject;
            $this->mailer->isHTML(true);

            if ($formData) {
                $this->mailer->Body = $this->renderAdminNotificationTemplate($formData, $metadata);
                $this->mailer->AltBody = $body;
            } else {
                $this->mailer->Body = nl2br($body);
                $this->mailer->AltBody = $body;
            }

            $this->mailer->send();

            return true;
        } catch (Exception $e) {
            Log::error('Email sending failed', ['error' => $e->getMessage()]);

            return false;
        }
    }

    public function sendConfirmationToUser(string $email): bool
    {
        try {
            $mail = clone $this->mailer;
            $mail->clearAddresses();
            $mail->addAddress($email);
            $mail->Subject = 'Thank you for contacting Logistic Journey';
            $mail->Body = $this->getConfirmationHtmlBody();
            $mail->AltBody = 'Thank you for reaching out to us.';
            $mail->send();

            return true;
        } catch (Exception $e) {
            Log::error('Confirmation email failed', ['error' => $e->getMessage()]);

            return false;
        }
    }

    private function renderAdminNotificationTemplate(array $formData, ?array $metadata): string
    {
        return $this->generateBasicHtml($formData, $metadata ?? []);
    }

    private function generateBasicHtml(array $formData, array $data): string
    {
        $html = '';
        foreach ($formData as $key => $value) {
            $html .= '<p><strong>'.ucfirst($key).':</strong> '.e((string) $value).'</p>';
        }

        return "<html><body>{$html}</body></html>";
    }

    private function getConfirmationHtmlBody(): string
    {
        return 'Thank you for reaching out to us. We will respond shortly.';
    }
}
