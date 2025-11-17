<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\CaseStudies\Pages;

use Filament\Resources\Pages\EditRecord;
use Modules\Blog\Filament\Resources\CaseStudies\CaseStudyResource;

class EditCaseStudy extends EditRecord
{
    protected static string $resource = CaseStudyResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
