<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\CaseStudies;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Blog\Filament\Resources\CaseStudies\Pages\CreateCaseStudy;
use Modules\Blog\Filament\Resources\CaseStudies\Pages\EditCaseStudy;
use Modules\Blog\Filament\Resources\CaseStudies\Pages\ListCaseStudies;
use Modules\Blog\Filament\Resources\CaseStudies\Schemas\CaseStudyForm;
use Modules\Blog\Filament\Resources\CaseStudies\Tables\CaseStudyTable;
use Modules\Blog\Models\CaseStudy;
use UnitEnum;

final class CaseStudyResource extends Resource
{
    protected static ?string $model = CaseStudy::class;
    protected static string|UnitEnum|null $navigationGroup = 'Content';
    protected static ?int $navigationSort = 20;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CaseStudyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseStudyTable::configure($table);
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
            'index' => ListCaseStudies::route('/'),
            'create' => CreateCaseStudy::route('/create'),
            'edit' => EditCaseStudy::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
