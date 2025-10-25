<?php

namespace Modules\Website\Filament\Clusters\Website\Resources\Pages;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Website\Filament\Clusters\Website\Resources\Pages\Pages\CreatePage;
use Modules\Website\Filament\Clusters\Website\Resources\Pages\Pages\EditPage;
use Modules\Website\Filament\Clusters\Website\Resources\Pages\Pages\ListPages;
use Modules\Website\Filament\Clusters\Website\Resources\Pages\Schemas\PageForm;
use Modules\Website\Filament\Clusters\Website\Resources\Pages\Tables\PagesTable;
use Modules\Website\Filament\Clusters\Website\WebsiteCluster;
use Modules\Website\Models\Page;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $cluster = WebsiteCluster::class;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PagesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getActions(): array
    {
        return [
            \Modules\Blocks\Filament\Actions\GenerateBlockAction::make(),
            \Modules\Blocks\Filament\Actions\EditBlockClassAction::make(),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
}
