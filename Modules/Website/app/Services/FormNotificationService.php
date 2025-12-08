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
        $this->smtpHost = env('SMTP_HOST');
        $this->smtpUsername = env('SMTP_USERNAME');
        $this->smtpPassword = env('SMTP_PASSWORD');
        $this->smtpPort = env('SMTP_PORT');
        $this->smtpSecure = env('SMTP_SECURE');
        $this->mailFrom = env('MAIL_FROM');
        $recipients = env('MAIL_RECIPIENTS');
        $this->recipients = array_map('trim', explode(',', $recipients));
        $this->recaptchaSecret = env('RECAPTCHA_SECRET');
        $this->localSavePath = env('CONTACTS_SAVE_PATH');

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
        \Log::info('reCAPTCHA response', ['result' => $result, 'response' => $response]);
        return isset($response['success']) && $response['success'] === true;
    }

    public function saveContactData($data)
    {
        $line = implode("|", $data) . "\n";
        file_put_contents($this->localSavePath, $line, FILE_APPEND | LOCK_EX);
    }

    public function sendNotification($subject, $body, $formData = null, $metadata = null)
    {
        try {
            $this->mailer->Subject = $subject;
            $this->mailer->isHTML(true);
            
            // If formData is provided, use the template
            if ($formData && is_array($formData)) {
                $this->mailer->Body = $this->renderAdminNotificationTemplate($formData, $metadata);
                $this->mailer->AltBody = $body; // Plain text fallback
            } else {
                $this->mailer->Body = nl2br($body);
                $this->mailer->AltBody = $body;
            }
            
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            \Log::error('Email sending failed', ['error' => $e->getMessage()]);
            return false;
        }
    }

    private function renderAdminNotificationTemplate($formData, $metadata = null)
    {
        $data = [
            'formName' => $metadata['form_name'] ?? 'Form Submission',
            'formSlug' => $metadata['form_slug'] ?? 'unknown',
            'formData' => $formData,
            'ipAddress' => $metadata['ip_address'] ?? 'Unknown',
            'userAgent' => $metadata['user_agent'] ?? 'Unknown',
            'timestamp' => $metadata['timestamp'] ?? now()->format('M d, Y h:i A'),
            'dashboardUrl' => $metadata['dashboard_url'] ?? null,
        ];
        
        // Try to use Laravel view if available
        $viewPath = 'emails.admin-notification';
        if (function_exists('view') && view()->exists($viewPath)) {
            return view($viewPath, $data)->render();
        }
        
        // Fallback to file-based template
        $templatePath = base_path('resources/views/emails/admin-notification.blade.php');
        if (file_exists($templatePath)) {
            return $this->renderBladeTemplate($templatePath, $data);
        }
        
        // If no template found, return basic HTML
        return $this->generateBasicHtml($formData, $data);
    }
    
    private function renderBladeTemplate($path, $data)
    {
        extract($data);
        ob_start();
        include $path;
        return ob_get_clean();
    }
    
    private function generateBasicHtml($formData, $data)
    {
        $fieldsHtml = '';
        foreach ($formData as $key => $value) {
            $label = ucwords(str_replace(['_', '-'], ' ', $key));
            $displayValue = $this->formatFieldValue($value);
            $fieldsHtml .= "<p><strong>{$label}:</strong> {$displayValue}</p>";
        }
        
        return "
        <html>
        <body>
            <h2>New Form Submission: {$data['formName']}</h2>
            {$fieldsHtml}
            <hr>
            <p><strong>Form:</strong> {$data['formSlug']}</p>
            <p><strong>Time:</strong> {$data['timestamp']}</p>
            <p><strong>IP:</strong> {$data['ipAddress']}</p>
        </body>
        </html>";
    }
    
    private function formatFieldValue($value)
    {
        if (is_array($value)) {
            return htmlspecialchars(implode(', ', $value));
        }
        
        if (is_bool($value)) {
            return $value ? 'Yes' : 'No';
        }
        
        if (is_null($value)) {
            return '<em style="color: #a0aec0;">Not provided</em>';
        }
        
        if (strlen($value) > 100) {
            return nl2br(htmlspecialchars($value));
        }
        
        return htmlspecialchars($value);
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
            \Log::error('Confirmation email failed', ['error' => $e->getMessage()]);
            return false;
        }
    }

    private function getConfirmationHtmlBody()
    {
        $greeting = "Hello,";
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

    public function getRecaptchaSecret()
    {
        return $this->recaptchaSecret;
    }
}
