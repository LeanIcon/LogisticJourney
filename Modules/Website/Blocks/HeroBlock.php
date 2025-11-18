<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class HeroBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'Home Hero';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 16;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-photo';

    /**
     * Get the block's schema for Filament's form builder.
     * COMPLETELY DIFFERENT structure from other blocks!
     */
    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Hero Content')
                    ->description('Configure the main hero section')
                    ->schema([
                        Textarea::make('headline')
                            ->required()
                            ->maxLength(120)
                            ->default("Smarter Deliveries.\nHappier Customers.")
                            ->helperText('Main headline (max 120 chars)')
                            ->columnSpanFull()
                            ->rows(3),

                        TextInput::make('highlight_text')
                            ->label('Highlighted Text')
                            ->maxLength(100)
                            ->default('Lower Costs!')
                            ->helperText('Text to highlight in blue (e.g., "Lower Costs!")')
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('subheadline')
                                    ->maxLength(250)
                                    ->default('Logistic Journey gives you full control, real-time visibility, and reliable deliveries–without the chaos of paper and spreadsheets.')
                                    ->helperText('Supporting description text'),
                            ]),
                    ]),

                Section::make('Background & Media')
                    ->schema([
                        FileUpload::make('background_image')
                            ->image()
                            ->directory('hero-backgrounds')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->helperText('Background/hero image (max 2MB)'),
                    ]),

                Section::make('Call to Action Buttons')
                    ->schema([
                        Toggle::make('show_buttons')
                            ->label('Show CTA Buttons')
                            ->default(true)
                            ->live(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('primary_button_text')
                                    ->label('Primary Button Text')
                                    ->maxLength(50)
                                    ->default('Book a Demo')
                                    ->visible(fn ($get) => $get('show_buttons')),

                                TextInput::make('secondary_button_text')
                                    ->label('Secondary Button Text')
                                    ->maxLength(50)
                                    ->default('Talk to Our Team')
                                    ->visible(fn ($get) => $get('show_buttons')),
                            ]),
                    ]),

                Section::make('Statistics Display')
                    ->description('Show statistics badges below the headline')
                    ->schema([
                        Toggle::make('show_stats')
                            ->label('Show Statistics')
                            ->default(true)
                            ->live(),

                        Grid::make(4)
                            ->schema([
                                TextInput::make('stat_1_value')
                                    ->label('Stat 1 Value')
                                    ->placeholder('20')
                                    ->visible(fn ($get) => $get('show_stats')),

                                TextInput::make('stat_1_label')
                                    ->label('Stat 1 Label')
                                    ->placeholder('Cities')
                                    ->visible(fn ($get) => $get('show_stats')),

                                TextInput::make('stat_2_value')
                                    ->label('Stat 2 Value')
                                    ->placeholder('12 Packages')
                                    ->visible(fn ($get) => $get('show_stats')),

                                TextInput::make('stat_2_label')
                                    ->label('Stat 2 Label')
                                    ->placeholder('Daily')
                                    ->visible(fn ($get) => $get('show_stats')),

                                TextInput::make('stat_3_value')
                                    ->label('Stat 3 Value')
                                    ->placeholder('56 min')
                                    ->visible(fn ($get) => $get('show_stats')),

                                TextInput::make('stat_3_label')
                                    ->label('Stat 3 Label')
                                    ->placeholder('Avg Delivery')
                                    ->visible(fn ($get) => $get('show_stats')),

                                TextInput::make('stat_4_value')
                                    ->label('Stat 4 Value')
                                    ->placeholder('83%')
                                    ->visible(fn ($get) => $get('show_stats')),

                                TextInput::make('stat_4_label')
                                    ->label('Stat 4 Label')
                                    ->placeholder('Success Rate')
                                    ->visible(fn ($get) => $get('show_stats')),
                            ]),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     * COMPLETELY DIFFERENT structure from other blocks!
     */
    public static function mutateData(array $data): array
    {
        $stats = [];
        if ($data['show_stats'] ?? true) {
            $stats = [
                [
                    'value' => $data['stat_1_value'] ?? '20',
                    'label' => $data['stat_1_label'] ?? 'Cities',
                ],
                [
                    'value' => $data['stat_2_value'] ?? '12 Packages',
                    'label' => $data['stat_2_label'] ?? 'Daily',
                ],
                [
                    'value' => $data['stat_3_value'] ?? '56 min',
                    'label' => $data['stat_3_label'] ?? 'Avg Delivery',
                ],
                [
                    'value' => $data['stat_4_value'] ?? '83%',
                    'label' => $data['stat_4_label'] ?? 'Success Rate',
                ],
            ];
        }

        return [
            'headline' => $data['headline'] ?? null,
            'highlight_text' => $data['highlight_text'] ?? null,
            'subheadline' => $data['subheadline'] ?? null,
            'background' => [
                'image' => $data['background_image'] ?? null,
            ],
            'buttons' => ($data['show_buttons'] ?? true) ? [
                [
                    'text' => $data['primary_button_text'] ?? 'Book a Demo',
                ],
                [
                    'text' => $data['secondary_button_text'] ?? 'Talk to Our Team',
                ],
            ] : [],
            'stats' => $stats,
        ];
    }
}
