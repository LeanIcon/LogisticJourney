<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\CouponResource;

final class CreateCoupon extends CreateRecord
{
    protected static string $resource = CouponResource::class;
}
