<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

final class CouponsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                TextColumn::make('discount_type')
                    ->badge()
                    ->colors([
                        'success' => 'percentage',
                        'primary' => 'fixed',
                    ])
                    ->formatStateUsing(fn ($state) => ucfirst($state)),

                TextColumn::make('discount_value')
                    ->label('Discount')
                    ->formatStateUsing(fn ($state, $record) => $record->discount_type === 'percentage' ? $state.'%' : '$'.$state
                    )
                    ->sortable(),

                TextColumn::make('usage_limit')
                    ->label('Limit')
                    ->placeholder('Unlimited')
                    ->toggleable(),

                TextColumn::make('used_count')
                    ->label('Used')
                    ->badge()
                    ->color(fn ($state, $record) => $record->usage_limit && $state >= $record->usage_limit ? 'danger' : 'primary'
                    )
                    ->sortable(),

                TextColumn::make('expires_at')
                    ->dateTime('M j, Y')
                    ->placeholder('No expiration')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'success' => 'active',
                        'gray' => 'inactive',
                        'danger' => 'expired',
                    ])
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('discount_type')
                    ->options([
                        'percentage' => 'Percentage',
                        'fixed' => 'Fixed Amount',
                    ]),

                SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'expired' => 'Expired',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
