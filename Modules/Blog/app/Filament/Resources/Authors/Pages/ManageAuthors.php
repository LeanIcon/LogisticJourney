<?php

namespace Modules\Blog\Filament\Resources\Authors\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Modules\Blog\Filament\Resources\Authors\AuthorResource;

class ManageAuthors extends ManageRecords
{
    protected static string $resource = AuthorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
