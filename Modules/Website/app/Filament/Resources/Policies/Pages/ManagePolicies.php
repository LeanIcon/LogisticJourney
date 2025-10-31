<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Policies\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Modules\Website\Filament\Resources\Policies\PolicyResource;

final class ManagePolicies extends ManageRecords
{
    protected static string $resource = PolicyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
