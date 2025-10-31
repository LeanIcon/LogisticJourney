<?php

declare(strict_types=1);

namespace Modules\Website\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

final class WebsitePlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Website';
    }

    public function getId(): string
    {
        return 'website';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
