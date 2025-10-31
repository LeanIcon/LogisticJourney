<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Forms\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Website\Filament\Resources\Forms\FormResource;

final class CreateForm extends CreateRecord
{
    protected static string $resource = FormResource::class;
}
