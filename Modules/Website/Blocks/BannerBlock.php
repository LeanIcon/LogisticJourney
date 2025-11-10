<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class BannerBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'Banner';

    /**
     * Icon for the block in the builder.
     */
    protected static ?string $icon = 'heroicon-o-information-circle';

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
    protected static int $sortIndex = 1;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('About Section')
                    ->description('Top section for the About page: large heading, supporting text, and an image')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Everyday, millions of deliveries are set in motion. Each one is a promise')
                            ->required()
                            ->maxLength(250)
                            ->columnSpanFull(),

                        Textarea::make('subheadline')
                            ->label('Supporting text / Quote')
                            ->rows(2)
                            ->helperText('Short quote or supporting line under the headline')
                            ->default("\"We'll get it to you\"")
                            ->columnSpanFull(),

                        Grid::make(2)
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->directory('about')
                                    ->imageEditor()
                                    ->maxSize(3072)
                                    ->helperText('Main image for the section (recommended: wide, ~1200x400)'),

                                TextInput::make('image_alt')
                                    ->label('Image alt text')
                                    ->maxLength(255)
                                    ->helperText('Accessibility alt text for the image'),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            'section' => [
                'headline' => $data['headline'] ?? null,
                'subheadline' => $data['subheadline'] ?? null,
            ],
            'image' => [
                'path' => $data['image'] ?? null,
                'alt' => $data['image_alt'] ?? null,
            ],
        ];
    }
}
