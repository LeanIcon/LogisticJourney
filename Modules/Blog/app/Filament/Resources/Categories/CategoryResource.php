<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\Categories;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Blog\Filament\Resources\Categories\Pages\CreateCategory;
use Modules\Blog\Filament\Resources\Categories\Pages\EditCategory;
use Modules\Blog\Filament\Resources\Categories\Pages\ListCategories;
use Modules\Blog\Filament\Resources\Categories\Schemas\CategoryForm;
use Modules\Blog\Filament\Resources\Categories\Tables\CategoriesTable;
use Modules\Blog\Models\Category;
use UnitEnum;

final class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 20;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoriesTable::configure($table);
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
            'index' => ListCategories::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit' => EditCategory::route('/{record}/edit'),
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
