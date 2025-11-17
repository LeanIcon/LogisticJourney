<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\CaseStudies\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Blog\Filament\Resources\CaseStudies\CaseStudyResource;

class CreateCaseStudy extends CreateRecord
{
    protected static string $resource = CaseStudyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['creator_id'] = auth()->id();
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
