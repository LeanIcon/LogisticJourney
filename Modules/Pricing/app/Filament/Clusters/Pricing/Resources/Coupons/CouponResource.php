<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Pricing\Filament\Clusters\Pricing\PricingCluster;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages\CreateCoupon;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages\EditCoupon;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages\ListCoupons;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages\ViewCoupon;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Schemas\CouponForm;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Schemas\CouponInfolist;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Tables\CouponsTable;
use Modules\Pricing\Models\Coupon;
use UnitEnum;

final class CouponResource extends Resource
{
    protected static ?string $model = Coupon::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    
    // protected static string|UnitEnum|null $navigationGroup = 'Pricing';

    protected static ?string $recordTitleAttribute = 'code';
    
    protected static bool $shouldRegisterNavigation = false;
    
    public static function form(Schema $schema): Schema
    {
        return CouponForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CouponInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CouponsTable::configure($table);
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
            'index' => ListCoupons::route('/'),
            'create' => CreateCoupon::route('/create'),
            'view' => ViewCoupon::route('/{record}'),
            'edit' => EditCoupon::route('/{record}/edit'),
        ];
    }
}
