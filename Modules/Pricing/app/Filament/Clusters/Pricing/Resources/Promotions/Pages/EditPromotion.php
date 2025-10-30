<?php

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Pages;

use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\PromotionResource;

class EditPromotion extends EditRecord
{
    protected static string $resource = PromotionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
