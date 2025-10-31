<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Promotions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PromotionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->description('Promotion title and description')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2)
                            ->helperText('Promotion title (e.g., Black Friday Sale)'),

                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'expired' => 'Expired',
                            ])
                            ->default('draft')
                            ->required(),

                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText('Full promotion details'),
                    ])
                    ->columns(3),

                Section::make('Discount Configuration')
                    ->description('Set discount type and amount')
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

                Section::make('Schedule')
                    ->description('Promotion start and end dates')
                    ->schema([
                        DateTimePicker::make('start_date')
                            ->required()
                            ->helperText('When promotion begins'),

                        DateTimePicker::make('end_date')
                            ->required()
                            ->helperText('When promotion ends'),
                    ])
                    ->columns(2),

                Section::make('Applicable Plans')
                    ->description('Select which plans this promotion applies to')
                    ->schema([
                        Select::make('applicable_plans')
                            ->multiple()
                            ->relationship('plans', 'name')
                            ->helperText('Select plans this promotion applies to')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
