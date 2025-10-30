<?php

namespace Modules\Website\Filament\Resources\Contacts\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Website\Filament\Resources\Contacts\ContactResource;

class CreateContact extends CreateRecord
{
    protected static string $resource = ContactResource::class;
}
