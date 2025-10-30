<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Schema;

final class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            ]);
    }
}
