<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\FormSubmissionResource;

final class EditFormSubmission extends EditRecord
{
    protected static string $resource = FormSubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
