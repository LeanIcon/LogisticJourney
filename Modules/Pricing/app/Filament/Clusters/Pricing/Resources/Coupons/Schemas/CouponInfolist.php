<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CouponInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Coupon Information')
                    ->description('Basic coupon details')
                    ->schema([
                        TextEntry::make('code')
                            ->copyable()
                            ->icon('heroicon-o-ticket')
                            ->label('Coupon Code'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'active' => 'success',
                                'inactive' => 'gray',
                                'expired' => 'danger',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-flag'),
                    ])
                    ->columns(2),

                Section::make('Description')
                    ->description('Coupon details and purpose')
                    ->schema([
                        TextEntry::make('description')
                            ->placeholder('No description provided')
                            ->columnSpanFull(),
                    ]),

                Section::make('Discount Settings')
                    ->description('Discount configuration')
                    ->schema([
                        TextEntry::make('discount_type')
                            ->label('Discount Type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'percentage' => 'success',
                                'fixed' => 'info',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-percent-badge'),
                        TextEntry::make('discount_value')
                            ->label('Discount Value')
                            ->formatStateUsing(fn ($record) => $record->discount_type === 'percentage'
                                    ? "{$record->discount_value}%"
                                    : "\${$record->discount_value}"
                            )
                            ->icon('heroicon-o-currency-dollar'),
                    ])
                    ->columns(2),

                Section::make('Usage & Expiration')
                    ->description('Usage tracking and limits')
                    ->schema([
                        TextEntry::make('expires_at')
                            ->label('Expiration Date')
                            ->dateTime()
                            ->icon('heroicon-o-calendar')
                            ->placeholder('No expiration'),
                        TextEntry::make('usage_limit')
                            ->label('Usage Limit')
                            ->icon('heroicon-o-hashtag')
                            ->placeholder('Unlimited'),
                        TextEntry::make('used_count')
                            ->label('Times Used')
                            ->icon('heroicon-o-chart-bar')
                            ->badge()
                            ->color(fn ($record) => $record->usage_limit && $record->used_count >= $record->usage_limit
                                    ? 'danger'
                                    : 'success'
                            ),
                    ])
                    ->columns(3),

                Section::make('Timestamps')
                    ->description('Record creation and modification dates')
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->icon('heroicon-o-plus-circle'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->icon('heroicon-o-pencil-square'),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }
}
