<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\PlanResource;

final class ListPlans extends ListRecords
{
    protected static string $resource = PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
