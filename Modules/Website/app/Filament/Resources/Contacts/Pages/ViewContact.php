<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Modules\Website\Filament\Resources\Contacts\ContactResource;

final class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
