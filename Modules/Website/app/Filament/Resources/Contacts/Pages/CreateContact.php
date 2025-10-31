<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Website\Filament\Resources\Contacts\ContactResource;

final class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;
}
