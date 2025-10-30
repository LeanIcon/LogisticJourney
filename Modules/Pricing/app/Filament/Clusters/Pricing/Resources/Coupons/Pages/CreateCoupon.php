<?php

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\CouponResource;

class CreateCoupon extends CreateRecord
{
    protected static string $resource = CouponResource::class;
}
