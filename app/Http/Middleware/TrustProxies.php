<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

final class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * On Render (and behind Cloudflare) it's safe to trust the forwarded headers
     * so Laravel correctly detects the scheme (HTTPS) and client IP.
     *
     * @var array|string|null
     */
    protected $proxies = '*';

    /**
     * The headers that should be used to detect proxies.
     *
     * Use the explicit X-Forwarded_* flags so Cloudflare / Render forwarded
     * headers are honored for scheme and client IP detection.
     *
     * @var int|null
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO |
        Request::HEADER_X_FORWARDED_PREFIX;
}
