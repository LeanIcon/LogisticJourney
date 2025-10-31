<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\Pages\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Website\Filament\Clusters\Website\Resources\Pages\PageResource;

final class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    // JSON column approach - no need for block mutation

}
