<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Coupons\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CouponForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Coupon Information')
                    ->description('Basic coupon details')
                    ->schema([
                        TextInput::make('code')
                            ->required()
                            ->maxLength(50)
                            ->unique(ignoreRecord: true)
                            ->helperText('Unique coupon code (e.g., SAVE20)'),

                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'expired' => 'Expired',
                            ])
                            ->default('active')
                            ->required(),

                        Textarea::make('description')
                            ->rows(2)
                            ->columnSpanFull()
                            ->helperText('Internal description'),
                    ])
                    ->columns(2),

                Section::make('Discount Settings')
                    ->description('Configure discount type and value')
                    ->schema([
                        Select::make('discount_type')
                            ->options([
                                'percentage' => 'Percentage',
                                'fixed' => 'Fixed Amount',
                            ])
                            ->default('percentage')
                            ->required()
                            ->reactive(),

                        TextInput::make('discount_value')
                            ->required()
                            ->numeric()
                            ->helperText('Percentage (1-100) or fixed dollar amount'),
                    ])
                    ->columns(2),

                Section::make('Usage & Expiration')
                    ->description('Set usage limits and expiration date')
                    ->schema([
                        DateTimePicker::make('expires_at')
                            ->label('Expiration Date')
                            ->nullable()
                            ->helperText('Leave empty for no expiration'),

                        TextInput::make('usage_limit')
                            ->numeric()
                            ->nullable()
                            ->helperText('Maximum uses (empty = unlimited)'),

                        TextInput::make('used_count')
                            ->numeric()
                            ->default(0)
                            ->disabled()
                            ->helperText('Automatically tracked'),
                    ])
                    ->columns(3),
            ]);
    }
}
