<?php

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\PlanResource;

class CreatePlan extends CreateRecord
{
    protected static string $resource = PlanResource::class;
}
