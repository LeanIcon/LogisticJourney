<?php

namespace Modules\Website\Filament\Resources\Forms\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Website\Filament\Resources\Forms\FormResource;

class EditForm extends EditRecord
{
    protected static string $resource = FormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
