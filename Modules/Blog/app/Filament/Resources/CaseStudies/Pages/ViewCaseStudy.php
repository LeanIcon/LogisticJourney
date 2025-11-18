<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\CaseStudies\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Modules\Blog\Filament\Resources\CaseStudies\CaseStudyResource;

final class ViewCaseStudy extends ViewRecord
{
    protected static string $resource = CaseStudyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}