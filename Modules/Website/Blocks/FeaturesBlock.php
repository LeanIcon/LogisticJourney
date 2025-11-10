<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class FeaturesBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'Features';

    /**
     * Icon for the block in the builder.
     */
    protected static ?string $icon = 'heroicon-o-squares-2x2';

    /**
     * Keep this block API-only (returned via the blocks API).
     */
    protected static bool $apiOnly = true;

    /**
     * Optional group label to organize blocks in the builder UI.
     */
    protected static string $group = 'About Us';

    /**
     * Sort index for dashboard ordering (lower appears first).
     */
    protected static int $sortIndex = 3;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Features Section')
                    ->description('Showcase key features or benefits with icons, titles, and descriptions')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('So we built Logistics Journey')
                            ->required()
                            ->maxLength(250)
                            ->columnSpanFull(),

                        Select::make('background_color')
                            ->label('Background Color')
                            ->options([
                                'light' => 'Light (Light gray/blue)',
                                'white' => 'White',
                                'dark' => 'Dark',
                            ])
                            ->default('light'),

                        Repeater::make('features')
                            ->label('Feature Items')
                            ->schema([
                                TextInput::make('icon')
                                    ->label('Icon (Heroicon name or URL)')
                                    ->helperText('e.g., heroicon-o-cube or path to SVG/image')
                                    ->maxLength(255),

                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->maxLength(100),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->rows(2)
                                    ->maxLength(500),
                            ])
                            ->minItems(1)
                            ->maxItems(12)
                            ->defaultItems(4)
                            ->collapsible()
                            ->reorderable(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $features = [];

        if (!empty($data['features']) && is_array($data['features'])) {
            $features = array_map(function ($item) {
                return [
                    'icon' => $item['icon'] ?? null,
                    'title' => $item['title'] ?? null,
                    'description' => $item['description'] ?? null,
                ];
            }, $data['features']);
        }

        return [
            'headline' => $data['headline'] ?? null,
            'background_color' => $data['background_color'] ?? 'light',
            'features' => $features,
        ];
    }
}
