<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class FeaturesToolsBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'FeaturesTools';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 21;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-wrench-screwdriver';

    /**
     * Get the block's schema for Filament's form builder.
     */
    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Section Header')
                    ->description('Configure the section title and description')
                    ->schema([
                        TextInput::make('tag')
                            ->label('Tag')
                            ->maxLength(50)
                            ->default('Features')
                            ->helperText('Small tag above title'),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(100)
                            ->default('All the Tools You Need, in One Platform.')
                            ->helperText('Main title')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->maxLength(300)
                            ->default('Logistic Journey is designed to streamline logistics operations, enhance efficiency, and provide real-time visibility into fleet movements.')
                            ->helperText('Description text')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),

                Section::make('Feature Cards - First Row')
                    ->description('First 4 feature cards')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextInput::make('feature_1_icon')
                                    ->label('Feature 1 Icon')
                                    ->maxLength(100)
                                    ->placeholder('truck')
                                    ->helperText('Icon name/identifier')
                                    ->columnSpanFull(),

                                TextInput::make('feature_1_title')
                                    ->label('Feature 1 Title')
                                    ->maxLength(50)
                                    ->default('Fleet Management')
                                    ->columnSpanFull(),

                                Textarea::make('feature_1_description')
                                    ->label('Feature 1 Description')
                                    ->maxLength(200)
                                    ->default('Keep track of all your vehicles, monitor their conditions, and schedule maintenance to prevent breakdowns.')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TextInput::make('feature_2_icon')
                                    ->label('Feature 2 Icon')
                                    ->maxLength(100)
                                    ->placeholder('clipboard-list')
                                    ->helperText('Icon name/identifier')
                                    ->columnSpanFull(),

                                TextInput::make('feature_2_title')
                                    ->label('Feature 2 Title')
                                    ->maxLength(50)
                                    ->default('Order Creation')
                                    ->columnSpanFull(),

                                Textarea::make('feature_2_description')
                                    ->label('Feature 2 Description')
                                    ->maxLength(200)
                                    ->default('Create and manage transportation requests with ease, ensuring efficient deliveries.')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TextInput::make('feature_3_icon')
                                    ->label('Feature 3 Icon')
                                    ->maxLength(100)
                                    ->placeholder('map-pin')
                                    ->helperText('Icon name/identifier')
                                    ->columnSpanFull(),

                                TextInput::make('feature_3_title')
                                    ->label('Feature 3 Title')
                                    ->maxLength(50)
                                    ->default('Live Tracking')
                                    ->columnSpanFull(),

                                Textarea::make('feature_3_description')
                                    ->label('Feature 3 Description')
                                    ->maxLength(200)
                                    ->default('Get real-time updates on vehicle locations, estimated arrival times, and route efficiency.')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TextInput::make('feature_4_icon')
                                    ->label('Feature 4 Icon')
                                    ->maxLength(100)
                                    ->placeholder('user-circle')
                                    ->helperText('Icon name/identifier')
                                    ->columnSpanFull(),

                                TextInput::make('feature_4_title')
                                    ->label('Feature 4 Title')
                                    ->maxLength(50)
                                    ->default('Driver Management')
                                    ->columnSpanFull(),

                                Textarea::make('feature_4_description')
                                    ->label('Feature 4 Description')
                                    ->maxLength(200)
                                    ->default('Assign drivers, track their performance, and ensure compliance with safety regulations.')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                    ]),

                Section::make('Feature Cards - Second Row')
                    ->description('Last 3 feature cards')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextInput::make('feature_5_icon')
                                    ->label('Feature 5 Icon')
                                    ->maxLength(100)
                                    ->placeholder('chart-bar')
                                    ->helperText('Icon name/identifier')
                                    ->columnSpanFull(),

                                TextInput::make('feature_5_title')
                                    ->label('Feature 5 Title')
                                    ->maxLength(50)
                                    ->default('Advanced Reporting')
                                    ->columnSpanFull(),

                                Textarea::make('feature_5_description')
                                    ->label('Feature 5 Description')
                                    ->maxLength(200)
                                    ->default('Generate detailed reports on fleet usage, driver performance, and operational efficiency.')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TextInput::make('feature_6_icon')
                                    ->label('Feature 6 Icon')
                                    ->maxLength(100)
                                    ->placeholder('route')
                                    ->helperText('Icon name/identifier')
                                    ->columnSpanFull(),

                                TextInput::make('feature_6_title')
                                    ->label('Feature 6 Title')
                                    ->maxLength(50)
                                    ->default('Optimised Route Pla...')
                                    ->columnSpanFull(),

                                Textarea::make('feature_6_description')
                                    ->label('Feature 6 Description')
                                    ->maxLength(200)
                                    ->default('Plan the most efficient routes to reduce travel time and costs.')
                                    ->rows(3)
                                    ->columnSpanFull(),

                                TextInput::make('feature_7_icon')
                                    ->label('Feature 7 Icon')
                                    ->maxLength(100)
                                    ->placeholder('clock-rotate-left')
                                    ->helperText('Icon name/identifier')
                                    ->columnSpanFull(),

                                TextInput::make('feature_7_title')
                                    ->label('Feature 7 Title')
                                    ->maxLength(50)
                                    ->default('Vehicle Replay')
                                    ->columnSpanFull(),

                                Textarea::make('feature_7_description')
                                    ->label('Feature 7 Description')
                                    ->maxLength(200)
                                    ->default('Review past journeys to analyze and improve fleet performance.')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     */
    public static function mutateData(array $data): array
    {
        $features = [];
        for ($i = 1; $i <= 7; $i++) {
            $iconKey = "feature_{$i}_icon";
            $titleKey = "feature_{$i}_title";
            $descKey = "feature_{$i}_description";
            if (!empty($data[$titleKey])) {
                $features[] = [
                    'icon' => $data[$iconKey] ?? null,
                    'title' => $data[$titleKey],
                    'description' => $data[$descKey] ?? '',
                ];
            }
        }

        return [
            'tag' => $data['tag'] ?? 'Features',
            'title' => $data['title'] ?? null,
            'description' => $data['description'] ?? null,
            'features' => $features,
        ];
    }
}