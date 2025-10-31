<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\FormSubmissionResource;

final class CreateFormSubmission extends CreateRecord
{
    protected static string $resource = FormSubmissionResource::class;
}
