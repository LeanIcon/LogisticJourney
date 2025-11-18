<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages\CreateFormSubmission;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages\EditFormSubmission;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages\ListFormSubmissions;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Pages\ViewFormSubmission;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Schemas\FormSubmissionForm;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Schemas\FormSubmissionInfolist;
use Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Tables\FormSubmissionsTable;
use Modules\Website\Filament\Clusters\Website\WebsiteCluster;
use Modules\Website\Models\FormSubmission;
use UnitEnum;

final class FormSubmissionResource extends Resource
{
    protected static ?string $model = FormSubmission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Website Management';

    public static function form(Schema $schema): Schema
    {
        return FormSubmissionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FormSubmissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormSubmissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFormSubmissions::route('/'),
            'create' => CreateFormSubmission::route('/create'),
            'view' => ViewFormSubmission::route('/{record}'),
            'edit' => EditFormSubmission::route('/{record}/edit'),
        ];
    }
}
