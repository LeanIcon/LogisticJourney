<?php

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\FormSubmissionResource;

class ViewFormSubmission extends ViewRecord
{
    protected static string $resource = FormSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
