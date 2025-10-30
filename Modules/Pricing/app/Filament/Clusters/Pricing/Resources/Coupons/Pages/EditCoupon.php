<?php

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\CouponResource;

class EditCoupon extends EditRecord
{
    protected static string $resource = CouponResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
