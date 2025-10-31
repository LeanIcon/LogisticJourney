<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\PlanResource;

final class EditPlan extends EditRecord
{
    protected static string $resource = PlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
