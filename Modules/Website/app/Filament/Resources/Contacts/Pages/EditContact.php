<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Website\Filament\Resources\Contacts\ContactResource;

final class EditContact extends EditRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
