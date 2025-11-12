<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class OurStoryBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'OurStory';

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
    protected static int $sortIndex = 2;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Our Story Section')
                    ->description('Content for the About / Our Story section')
                    ->schema([
                        TextInput::make('heading')
                            ->label('Heading Next To Eye Icon')
                            ->default('Our Story')
                            ->maxLength(80),

                        TextInput::make('subheading')
                            ->label('Subheading / Supporting Text')
                            ->default('Logistic Journey')
                            ->required()
                            ->maxLength(250)
                            ->columnSpanFull(),

                        Repeater::make('paragraphs')
                            ->label('Paragraphs')
                            ->schema([
                                Textarea::make('text')->rows(4)->maxLength(2000),
                            ])
                            ->minItems(0)
                            ->maxItems(10)
                            ->collapsed(),

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
        $imagePath = $data['image'] ?? null;
        $imageUrl = $imagePath ? Storage::url($imagePath) : null;

        // Convert repeater structure to simple paragraphs array if present
        $paragraphs = null;
        if (!empty($data['paragraphs']) && is_array($data['paragraphs'])) {
            $paragraphs = array_map(function ($item) {
                return $item['text'] ?? null;
            }, $data['paragraphs']);
        }

        return [
            'heading' => $data['heading'] ?? 'Our Story',

            'section' => [
                'headline' => $data['headline'] ?? null,
                'subheadline' => $data['subheadline'] ?? null,
            ],

            'image' => [
                'path' => $imagePath,
                'url' => $imageUrl,
                'alt' => $data['image_alt'] ?? null,
            ],

            'paragraphs' => $paragraphs,
        ];
    }
}