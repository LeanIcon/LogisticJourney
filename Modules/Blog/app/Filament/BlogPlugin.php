<?php

declare(strict_types=1);

namespace Modules\Blog\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

final class BlogPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Blog';
    }

    public function getId(): string
    {
        return 'blog';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
