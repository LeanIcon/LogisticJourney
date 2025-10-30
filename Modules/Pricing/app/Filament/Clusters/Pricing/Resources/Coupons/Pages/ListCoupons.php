<?php

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\CouponResource;

class ListCoupons extends ListRecords
{
    protected static string $resource = CouponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
