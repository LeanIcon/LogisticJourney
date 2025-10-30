<?php

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\FormSubmissionResource;

class ListFormSubmissions extends ListRecords
{
    protected static string $resource = FormSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
