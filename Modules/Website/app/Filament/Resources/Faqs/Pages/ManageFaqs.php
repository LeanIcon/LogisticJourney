<?php

namespace Modules\Website\Filament\Resources\Faqs\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Modules\Website\Filament\Resources\Faqs\FaqResource;

class ManageFaqs extends ManageRecords
{
    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
