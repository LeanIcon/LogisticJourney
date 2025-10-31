<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\Pages\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Website\Filament\Clusters\Website\Resources\Pages\PageResource;

final class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    // JSON column approach - no need for block mutation

}
