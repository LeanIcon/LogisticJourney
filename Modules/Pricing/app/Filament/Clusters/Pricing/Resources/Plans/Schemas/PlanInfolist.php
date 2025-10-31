<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Schemas;

use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PlanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Plan Overview')
                    ->description('Basic plan information')
                    ->schema([
                        TextEntry::make('name')
                            ->copyable()
                            ->icon('heroicon-o-tag'),
                        TextEntry::make('billing_cycle')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'monthly' => 'info',
                                'annual' => 'success',
                                'quarterly' => 'warning',
                                'lifetime' => 'purple',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-calendar'),
                        TextEntry::make('price')
                            ->money('USD')
                            ->icon('heroicon-o-currency-dollar'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'active' => 'success',
                                'inactive' => 'gray',
                                'archived' => 'danger',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-flag'),
                    ])
                    ->columns(4),

                Section::make('Description')
                    ->description('Plan details and benefits')
                    ->schema([
                        TextEntry::make('description')
                            ->placeholder('No description provided')
                            ->columnSpanFull(),
                    ]),

                Section::make('Features')
                    ->description('Plan features and capabilities')
                    ->schema([
                        KeyValueEntry::make('features')
                            ->label('Included Features')
                            ->columnSpanFull(),
                    ]),

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
