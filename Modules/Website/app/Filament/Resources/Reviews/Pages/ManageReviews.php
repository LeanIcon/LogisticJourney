<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Reviews\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Modules\Website\Filament\Resources\Reviews\ReviewResource;

final class ManageReviews extends ManageRecords
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
