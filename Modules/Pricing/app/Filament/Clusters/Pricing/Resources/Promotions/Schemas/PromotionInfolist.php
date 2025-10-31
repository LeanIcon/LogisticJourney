<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PromotionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Promotion Overview')
                    ->description('Basic promotion information')
                    ->schema([
                        TextEntry::make('title')
                            ->copyable()
                            ->icon('heroicon-o-tag'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'draft' => 'gray',
                                'active' => 'success',
                                'inactive' => 'warning',
                                'expired' => 'danger',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-flag'),
                    ])
                    ->columns(2),

                Section::make('Description')
                    ->description('Promotion details')
                    ->schema([
                        TextEntry::make('description')
                            ->placeholder('No description provided')
                            ->columnSpanFull(),
                    ]),

                Section::make('Discount Configuration')
                    ->description('Discount type and value')
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

                Section::make('Schedule')
                    ->description('Promotion validity period')
                    ->schema([
                        TextEntry::make('start_date')
                            ->dateTime()
                            ->icon('heroicon-o-calendar')
                            ->label('Start Date'),
                        TextEntry::make('end_date')
                            ->dateTime()
                            ->icon('heroicon-o-calendar')
                            ->label('End Date'),
                    ])
                    ->columns(2),

                Section::make('Applicable Plans')
                    ->description('Plans this promotion applies to')
                    ->schema([
                        TextEntry::make('applicable_plans')
                            ->badge()
                            ->separator(',')
                            ->placeholder('All plans')
                            ->columnSpanFull(),
                    ])
                    ->collapsed(),

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
