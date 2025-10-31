<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Schemas;

use Filament\Schemas\Schema;

final class FormSubmissionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
            ]);
    }
}
