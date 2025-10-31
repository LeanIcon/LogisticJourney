<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\PlanResource;

final class CreatePlan extends CreateRecord
{
    protected static string $resource = PlanResource::class;
}
