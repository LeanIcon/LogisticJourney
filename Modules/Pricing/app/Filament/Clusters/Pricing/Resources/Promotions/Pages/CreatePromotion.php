<?php

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\PromotionResource;

class CreatePromotion extends CreateRecord
{
    protected static string $resource = PromotionResource::class;
}
