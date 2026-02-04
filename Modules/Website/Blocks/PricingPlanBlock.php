<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class PricingPlanBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'PricingPlan';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 23;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-currency-dollar';

    /**
     * Get the block's schema for Filament's form builder.
     */
    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Section Header')
                    ->description('Configure the pricing section title and description')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(100)
                            ->default('Pricing Plan')
                            ->helperText('Main title')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->maxLength(300)
                            ->default('Simple, transparent pricing for your fleet management needs.')
                            ->helperText('Description text')
                            ->columnSpanFull()
                            ->rows(2),
                    ]),

                Section::make('Value Propositions')
                    ->description('Configure the three key value propositions')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                FileUpload::make('value_1_icon')
                                    ->label('Value Proposition 1 Icon')
                                    ->image()
                                    ->directory('pricing-value-icons')
                                    ->imageEditor()
                                    ->maxSize(512)
                                    ->helperText('Icon for value proposition 1 (max 512KB)')
                                    ->columnSpanFull(),

                                TextInput::make('value_1_title')
                                    ->label('Value Proposition 1 Title')
                                    ->maxLength(100)
                                    ->default('Simple, Transparent Pricing')
                                    ->columnSpanFull(),

                                Textarea::make('value_1_description')
                                    ->label('Value Proposition 1 Description')
                                    ->maxLength(300)
                                    ->default('No hidden fees or complicated tiers. Pay a flat rate per vehicle per month and unlock all the tools you need to manage your fleet.')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                FileUpload::make('value_2_icon')
                                    ->label('Value Proposition 2 Icon')
                                    ->image()
                                    ->directory('pricing-value-icons')
                                    ->imageEditor()
                                    ->maxSize(512)
                                    ->helperText('Icon for value proposition 2 (max 512KB)')
                                    ->columnSpanFull(),

                                TextInput::make('value_2_title')
                                    ->label('Value Proposition 2 Title')
                                    ->maxLength(100)
                                    ->default('Scalable for Any Fleet Size')
                                    ->columnSpanFull(),

                                Textarea::make('value_2_description')
                                    ->label('Value Proposition 2 Description')
                                    ->maxLength(300)
                                    ->default('Whether you run a small delivery team or a nationwide fleet, our flexible pricing grows with you—without additional overhead.')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                FileUpload::make('value_3_icon')
                                    ->label('Value Proposition 3 Icon')
                                    ->image()
                                    ->directory('pricing-value-icons')
                                    ->imageEditor()
                                    ->maxSize(512)
                                    ->helperText('Icon for value proposition 3 (max 512KB)')
                                    ->columnSpanFull(),

                                TextInput::make('value_3_title')
                                    ->label('Value Proposition 3 Title')
                                    ->maxLength(100)
                                    ->default('Built for Efficiency & Growth')
                                    ->columnSpanFull(),

                                Textarea::make('value_3_description')
                                    ->label('Value Proposition 3 Description')
                                    ->maxLength(300)
                                    ->default('No hidden fees or complicated tiers. Pay a flat rate per vehicle per month and unlock all the tools you need to manage your fleet.')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('Pricing Plan Details')
                    ->description('Configure the pricing plan card')
                    ->schema([
                        TextInput::make('plan_name')
                            ->label('Plan Name')
                            ->maxLength(50)
                            ->default('Basic plan')
                            ->columnSpanFull(),

                        TextInput::make('plan_subtitle')
                            ->label('Plan Subtitle')
                            ->maxLength(100)
                            ->default('Perfect for logistics teams')
                            ->columnSpanFull(),

                        TextInput::make('price')
                            ->label('Price')
                            ->maxLength(20)
                            ->default('R129')
                            ->helperText('Price amount (e.g., R129, $99)')
                            ->columnSpan(1),

                        TextInput::make('price_period')
                            ->label('Price Period')
                            ->maxLength(20)
                            ->default('/mo')
                            ->helperText('Price period (e.g., /mo, /month, /year)')
                            ->columnSpan(1),

                        TextInput::make('cta_text')
                            ->label('Call to Action Button Text')
                            ->maxLength(50)
                            ->default('Get Started')
                            ->columnSpanFull(),

                        Repeater::make('features')
                            ->label('Plan Features')
                            ->schema([
                                TextInput::make('feature')
                                    ->label('Feature')
                                    ->maxLength(100)
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->defaultItems(8)
                            ->default([
                                ['feature' => 'Unlimited Trip Sheet Creation'],
                                ['feature' => 'Unlimited Dispatchers'],
                                ['feature' => 'Unlimited Driver Allocation'],
                                ['feature' => 'Unlimited Trip Creation'],
                                ['feature' => 'Business Analytics'],
                                ['feature' => 'Reports'],
                                ['feature' => 'Multi-Tier Organisation Structure'],
                                ['feature' => 'Free Organisation Setup (Companies & Drivers)'],
                            ])
                            ->columnSpanFull()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['feature'] ?? null)
                            ->addActionLabel('Add Feature')
                            ->reorderable()
                            ->grid(2),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     */
    public static function mutateData(array $data): array
    {
        $valuePropositions = [];
        
        for ($i = 1; $i <= 3; $i++) {
            $iconKey = "value_{$i}_icon";
            $titleKey = "value_{$i}_title";
            $descKey = "value_{$i}_description";
            
            if (!empty($data[$titleKey])) {
                $valuePropositions[] = [
                    'icon' => !empty($data[$iconKey]) ? url('storage/' . $data[$iconKey]) : null,
                    'title' => $data[$titleKey],
                    'description' => $data[$descKey] ?? '',
                ];
            }
        }

        return [
            'title' => $data['title'] ?? 'Pricing Plan',
            'description' => $data['description'] ?? '',
            'valuePropositions' => $valuePropositions,
            'plan' => [
                'name' => $data['plan_name'] ?? 'Basic plan',
                'subtitle' => $data['plan_subtitle'] ?? '',
                'price' => $data['price'] ?? 'R129',
                'pricePeriod' => $data['price_period'] ?? '/mo',
                'ctaText' => $data['cta_text'] ?? 'Get Started',
                'features' => array_map(
                    fn($item) => $item['feature'] ?? '',
                    $data['features'] ?? []
                ),
            ],
        ];
    }
}