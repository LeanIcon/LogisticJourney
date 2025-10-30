<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Modules\Pricing\Filament\Clusters\Pricing\PricingCluster;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Pages\CreatePlan;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Pages\EditPlan;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Pages\ListPlans;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Schemas\PlanForm;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Tables\PlansTable;
use Modules\Pricing\Models\Plan;

final class PlanResource extends Resource
{
    protected static ?string $model = Plan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $cluster = PricingCluster::class;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PlansTable::configure($table);
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
            'index' => ListPlans::route('/'),
            'create' => CreatePlan::route('/create'),
            'edit' => EditPlan::route('/{record}/edit'),
        ];
    }
}
