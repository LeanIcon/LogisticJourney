<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Form Notification Service (PHPMailer)
    |--------------------------------------------------------------------------
    */
    'form_notifications' => [
        'smtp_host' => env('SMTP_HOST'),
        'smtp_username' => env('SMTP_USERNAME'),
        'smtp_password' => env('SMTP_PASSWORD'),
        'smtp_port' => env('SMTP_PORT', 587),
        'smtp_secure' => env('SMTP_SECURE', 'tls'),
        'mail_from' => env('MAIL_FROM'),
        'recipients' => env('MAIL_RECIPIENTS'),
        'contacts_save_path' => env('CONTACTS_SAVE_PATH'),
    ],

    'recaptcha' => [
        'secret' => env('RECAPTCHA_SECRET'),
    ],

];
