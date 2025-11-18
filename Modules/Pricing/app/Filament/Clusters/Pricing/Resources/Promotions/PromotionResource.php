<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Pricing\Filament\Clusters\Pricing\PricingCluster;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Pages\CreatePromotion;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Pages\EditPromotion;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Pages\ListPromotions;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Pages\ViewPromotion;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Schemas\PromotionForm;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Schemas\PromotionInfolist;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Tables\PromotionsTable;
use Modules\Pricing\Models\Promotion;
use UnitEnum;

final class PromotionResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    // protected static string|UnitEnum|null $navigationGroup = 'Pricing';

    protected static ?string $recordTitleAttribute = 'title';
    
    protected static bool $shouldRegisterNavigation = false;
    
    public static function form(Schema $schema): Schema
    {
        return PromotionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PromotionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PromotionsTable::configure($table);
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
            'index' => ListPromotions::route('/'),
            'create' => CreatePromotion::route('/create'),
            'view' => ViewPromotion::route('/{record}'),
            'edit' => EditPromotion::route('/{record}/edit'),
        ];
    }
}
