<?php
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // SMTP settings from your .env
    $mail->isSMTP();
    $mail->Host = 'mail.logisticjourney.com'; // SMTP_HOST
    $mail->SMTPAuth = true;
    $mail->Username = 'sales@logisticjourney.com'; // SMTP_USERNAME
    $mail->Password = 'xWr[ML3u0.'; // SMTP_PASSWORD
    $mail->SMTPSecure = 'tls'; // SMTP_SECURE
    $mail->Port = 587; // SMTP_PORT

    $mail->setFrom('sales@logisticjourney.com', 'Logistic Journey'); // MAIL_FROM
    $mail->addAddress('sales@logisticjourney.com'); // MAIL_RECIPIENTS

    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = 'This is a test email sent using PHPMailer.';

    $mail->send();
    echo "Test email sent successfully!\n";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}\n";
}
