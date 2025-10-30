<?php

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\PromotionResource;

class ListPromotions extends ListRecords
{
    protected static string $resource = PromotionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
