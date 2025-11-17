<?php
namespace Modules\Website\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class FormNotificationService
{
    private $mailer;
    private $smtpHost;
    private $smtpUsername;
    private $smtpPassword;
    private $smtpPort;
    private $smtpSecure;
    private $mailFrom;
    private $recipients;
    private $recaptchaSecret;
    private $localSavePath;

    public function __construct()
    {
        $this->smtpHost = env('SMTP_HOST', 'mail.logisticjourney.com');
        $this->smtpUsername = env('SMTP_USERNAME', 'sales@logisticjourney.com');
        $this->smtpPassword = env('SMTP_PASSWORD', 'xWr[ML3u0.');
        $this->smtpPort = env('SMTP_PORT', 587);
        $this->smtpSecure = env('SMTP_SECURE', 'tls');
        $this->mailFrom = env('MAIL_FROM', 'sales@logisticjourney.com');
        $recipients = env('MAIL_RECIPIENTS', 'sales@logisticjourney.com');
        $this->recipients = array_map('trim', explode(',', $recipients));
        $this->recaptchaSecret = env('RECAPTCHA_SECRET', '6LcnxwwrAAAAANc9VvWS99KSrzKp0KR78AR1ASOH');
        $this->localSavePath = env('CONTACTS_SAVE_PATH', '/home/logists9x5y7/secure-data/contacts.txt');

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

    public function verifyRecaptcha($token)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $this->recaptchaSecret,
            'response' => $token
        ];
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result, true);
        return isset($response['success']) && $response['success'] === true;
    }

    public function saveContactData($data)
    {
        $line = implode("|", $data) . "\n";
        file_put_contents($this->localSavePath, $line, FILE_APPEND | LOCK_EX);
    }

    public function sendNotification($subject, $body)
    {
        try {
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

        public function sendConfirmationToUser($userEmail)
        {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = $this->smtpHost;
                $mail->SMTPAuth = true;
                $mail->Username = $this->smtpUsername;
                $mail->Password = $this->smtpPassword;
                $mail->SMTPSecure = $this->smtpSecure;
                $mail->Port = $this->smtpPort;
                $mail->setFrom($this->mailFrom, 'Logistic Journey');
                $mail->addAddress($userEmail);
                $mail->Subject = 'Thank you for contacting Logistic Journey';
                $mail->isHTML(true);
                $mail->Body = $this->getConfirmationHtmlBody();
                $mail->AltBody = "Thank you for reaching out to us. We appreciate your interest and will get back to you shortly.";
                $mail->send();
                return true;
            } catch (Exception $e) {
                return false;
            }
        }

        private function getConfirmationHtmlBody()
        {
            $greeting = "Hello,";
            // Use Laravel view rendering if available, otherwise fallback to file_get_contents
            $viewPath = base_path('resources/views/emails/confirmation.blade.php');
            if (function_exists('view')) {
                return view('emails.confirmation', compact('greeting'))->render();
            } elseif (file_exists($viewPath)) {
                $template = file_get_contents($viewPath);
                return str_replace('{{ greeting }}', $greeting, $template);
            } else {
                return "$greeting<br>Thank you for reaching out to us. We appreciate your interest and will get back to you shortly.";
            }
        }
}
