<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\CaseStudies\Pages;

use Filament\Resources\Pages\ListRecords;
use Modules\Blog\Filament\Resources\CaseStudies\CaseStudyResource;
use Filament\Actions\CreateAction;

class ListCaseStudies extends ListRecords
{
    protected static string $resource = CaseStudyResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
