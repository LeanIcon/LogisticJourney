<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

// Development-only debug routes - DO NOT ENABLE IN PRODUCTION
if (app()->environment(['local', 'staging'])) {
    Route::get('/test-403', function () {
        return response()->json([
            'auth' => [
                'check' => auth()->check(),
                'id' => auth()->id(),
                'user' => auth()->user(),
            ],
            'session' => [
                'id' => session()->getId(),
                'token' => csrf_token(),
                'all' => session()->all(),
            ],
            'request' => [
                'secure' => request()->secure(),
                'host' => request()->getHost(),
                'userAgent' => request()->userAgent(),
                'headers' => request()->headers->all(),
                'server' => array_filter($_SERVER, function($key) {
                    return in_array($key, [
                        'HTTP_X_FORWARDED_FOR',
                        'HTTP_X_FORWARDED_PROTO',
                        'HTTP_X_FORWARDED_HOST',
                        'REMOTE_ADDR',
                        'SERVER_PROTOCOL',
                        'SERVER_NAME',
                        'HTTP_HOST',
                        'HTTP_USER_AGENT',
                        'REQUEST_SCHEME',
                        'HTTPS'
                    ]);
                }, ARRAY_FILTER_USE_KEY),
            ],
            'env' => [
                'app_env' => config('app.env'),
                'app_url' => config('app.url'),
                'session_driver' => config('session.driver'),
                'session_domain' => config('session.domain'),
                'session_secure' => config('session.secure'),
                'session_same_site' => config('session.same_site'),
                'trusted_proxy_headers' => request()->getTrustedHeaderSet(),
                'app_debug' => config('app.debug'),
            ],
        ], 200, [], JSON_PRETTY_PRINT);
    })->name('debug.test-403');
}