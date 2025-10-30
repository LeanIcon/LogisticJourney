<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Forms;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Website\Filament\Resources\Forms\Pages\CreateForm;
use Modules\Website\Filament\Resources\Forms\Pages\EditForm;
use Modules\Website\Filament\Resources\Forms\Pages\ListForms;
use Modules\Website\Filament\Resources\Forms\Schemas\FormForm;
use Modules\Website\Filament\Resources\Forms\Tables\FormsTable;
use Modules\Website\Models\Form;

final class FormResource extends Resource
{
    protected static ?string $model = Form::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FormForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FormsTable::configure($table);
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
            'index' => ListForms::route('/'),
            'create' => CreateForm::route('/create'),
            'edit' => EditForm::route('/{record}/edit'),
        ];
    }
}
