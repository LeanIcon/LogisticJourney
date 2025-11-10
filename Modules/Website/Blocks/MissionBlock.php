<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class MissionBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'Mission';

    /**
     * Icon for the block in the builder.
     */
    protected static ?string $icon = 'heroicon-o-megaphone';

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
    protected static int $sortIndex = 4;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Value Proposition Section')
                    ->description('Two-column layout: text content on left, image on right')
                    ->schema([
                        TextInput::make('intro')
                            ->label('Intro Line')
                            ->default('But here is the truth:')
                            ->maxLength(150),

                        TextInput::make('headline')
                            ->label('Main Headline')
                            ->default('Technology alone doesn\'t change an industry. People do!')
                            ->required()
                            ->maxLength(300)
                            ->columnSpanFull(),

                        Repeater::make('paragraphs')
                            ->label('Content Paragraphs')
                            ->schema([
                                Textarea::make('text')
                                    ->rows(3)
                                    ->maxLength(1000),
                            ])
                            ->minItems(1)
                            ->maxItems(10)
                            ->defaultItems(1)
                            ->collapsed()
                            ->columnSpanFull(),

                        Section::make('Highlighted Quote')
                            ->description('Optional highlighted/emphasized quote section')
                            ->schema([
                                TextInput::make('quote_emoji')
                                    ->label('Emoji or Icon')
                                    ->default('💡')
                                    ->maxLength(10),

                                Textarea::make('quote_text')
                                    ->label('Quote Text')
                                    ->rows(2)
                                    ->maxLength(500),
                            ]),

                        Section::make('Right Side Image')
                            ->description('Image displayed on the right side of the section')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->directory('value-proposition')
                                    ->imageEditor()
                                    ->maxSize(3072)
                                    ->helperText('Recommended: tall/portrait orientation, ~600x800'),

                                TextInput::make('image_alt')
                                    ->label('Image Alt Text')
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $imagePath = $data['image'] ?? null;
        $imageUrl = $imagePath ? Storage::url($imagePath) : null;

        // Convert paragraphs repeater to simple array
        $paragraphs = [];
        if (!empty($data['paragraphs']) && is_array($data['paragraphs'])) {
            $paragraphs = array_map(function ($item) {
                return $item['text'] ?? null;
            }, $data['paragraphs']);
        }

        return [
            'intro' => $data['intro'] ?? null,
            'headline' => $data['headline'] ?? null,
            'paragraphs' => $paragraphs,
            'quote' => [
                'emoji' => $data['quote_emoji'] ?? '💡',
                'text' => $data['quote_text'] ?? null,
            ],
            'image' => [
                'path' => $imagePath,
                'url' => $imageUrl,
                'alt' => $data['image_alt'] ?? null,
            ],
        ];
    }
}
