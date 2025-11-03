<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
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
    protected static string $name = 'HeroBlock';

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
                        TextInput::make('headline')
                            ->required()
                            ->maxLength(120)
                            ->helperText('Main headline (max 120 chars)')
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('subheadline')
                                    ->maxLength(200)
                                    ->helperText('Supporting text'),

                                Select::make('text_alignment')
                                    ->options([
                                        'left' => 'Left',
                                        'center' => 'Center',
                                        'right' => 'Right',
                                    ])
                                    ->default('center'),
                            ]),
                    ]),

                Section::make('Background & Media')
                    ->schema([
                        FileUpload::make('background_image')
                            ->image()
                            ->directory('hero-backgrounds')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->helperText('Background image (max 2MB)'),

                        Grid::make(3)
                            ->schema([
                                Select::make('background_overlay')
                                    ->options([
                                        'none' => 'None',
                                        'dark' => 'Dark Overlay',
                                        'light' => 'Light Overlay',
                                        'gradient' => 'Gradient',
                                    ])
                                    ->default('dark'),

                                TextInput::make('background_color')
                                    ->type('color')
                                    ->helperText('Fallback color'),

                                Select::make('height')
                                    ->options([
                                        'small' => 'Small (400px)',
                                        'medium' => 'Medium (600px)',
                                        'large' => 'Large (800px)',
                                        'fullscreen' => 'Full Screen',
                                    ])
                                    ->default('large'),
                            ]),
                    ]),

                Section::make('Call to Action')
                    ->schema([
                        Toggle::make('show_cta')
                            ->label('Show Call to Action Button')
                            ->default(true)
                            ->live(),

                        Grid::make(2)
                            ->schema([
                                TextInput::make('cta_text')
                                    ->label('Button Text')
                                    ->maxLength(50)
                                    ->default('Get Started')
                                    ->visible(fn ($get) => $get('show_cta')),

                                TextInput::make('cta_url')
                                    ->label('Button URL')
                                    ->url()
                                    ->visible(fn ($get) => $get('show_cta')),
                            ]),

                        Select::make('cta_style')
                            ->label('Button Style')
                            ->options([
                                'primary' => 'Primary',
                                'secondary' => 'Secondary',
                                'outline' => 'Outline',
                            ])
                            ->default('primary')
                            ->visible(fn ($get) => $get('show_cta')),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     * COMPLETELY DIFFERENT structure from other blocks!
     */
    public static function mutateData(array $data): array
    {
        return [
            'headline' => $data['headline'] ?? null,
            'subheadline' => $data['subheadline'] ?? null,
            'text_alignment' => $data['text_alignment'] ?? 'center',
            'background' => [
                'image' => $data['background_image'] ?? null,
                'overlay' => $data['background_overlay'] ?? 'dark',
                'color' => $data['background_color'] ?? '#000000',
            ],
            'dimensions' => [
                'height' => $data['height'] ?? 'large',
            ],
            'cta' => $data['show_cta'] ? [
                'text' => $data['cta_text'] ?? 'Get Started',
                'url' => $data['cta_url'] ?? '#',
                'style' => $data['cta_style'] ?? 'primary',
            ] : null,
        ];
    }
}
