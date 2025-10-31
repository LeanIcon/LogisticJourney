<?php

declare(strict_types=1);

namespace Modules\Pricing\Filament\Clusters\Pricing\Resources\Plans\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Plan Information')
                    ->description('Basic plan details and pricing')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Plan name (e.g., Basic, Pro, Enterprise)'),

                        Select::make('billing_cycle')
                            ->options([
                                'monthly' => 'Monthly',
                                'annual' => 'Annual',
                                'quarterly' => 'Quarterly',
                                'lifetime' => 'Lifetime',
                            ])
                            ->default('monthly')
                            ->required(),

                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->helperText('Price in USD'),

                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'archived' => 'Archived',
                            ])
                            ->default('active')
                            ->required(),
                    ])
                    ->columns(4),

                Section::make('Description')
                    ->description('Plan description and benefits')
                    ->schema([
                        Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->helperText('Brief description of the plan'),
                    ]),

                Section::make('Features')
                    ->description('Plan features and capabilities')
                    ->schema([
                        KeyValue::make('features')
                            ->helperText('Plan features (key: value pairs)')
                            ->columnSpanFull(),
                    ])
                    ->collapsed(),
            ]);
    }
}
