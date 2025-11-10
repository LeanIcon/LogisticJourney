<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class CTABlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'Cta';

    /**
     * Icon for the block in the builder.
     */
    protected static ?string $icon = 'heroicon-o-paper-airplane';

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
    protected static int $sortIndex = 6;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Call-to-Action Section')
                    ->description('Two-column CTA: text + button on left (colored background), image on right')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Stop firefighting. Start delivering with confidence.')
                            ->required()
                            ->maxLength(300)
                            ->columnSpanFull(),

                        TextInput::make('button_text')
                            ->label('Button Text')
                            ->default('Book a Demo Now')
                            ->required()
                            ->maxLength(100),

                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->directory('cta')
                            ->imageEditor()
                            ->maxSize(3072)
                            ->helperText('Recommended: wide/landscape orientation, ~600x400'),

                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $imagePath = $data['image'] ?? null;
        $imageUrl = $imagePath ? Storage::url($imagePath) : null;

        return [
            'headline' => $data['headline'] ?? null,
            'description' => $data['description'] ?? null,
            'button' => [
                'text' => $data['button_text'] ?? 'Book a Demo Now',
                'url' => $data['button_url'] ?? '#',
                'style' => $data['button_style'] ?? 'primary',
            ],
            'background_color' => $data['background_color'] ?? 'blue',
            'image' => [
                'path' => $imagePath,
                'url' => $imageUrl,
                'alt' => $data['image_alt'] ?? null,
            ],
        ];
    }
}
