<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->bootModelsDefaults();

        // Force HTTPS detection when in production or when explicitly requested.
        // This makes Laravel treat requests as secure (so secure cookies are sent)
        // even when behind Cloudflare / Render which terminate TLS externally.
        if ($this->app->environment('production') || config('app.force_https', false)) {
            URL::forceScheme('https');
        }
    }

    private function bootModelsDefaults(): void
    {
        Model::unguard();
    }
}
