<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

final class PricingPlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Pricing';
    }

    public function getId(): string
    {
        return 'pricing';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
