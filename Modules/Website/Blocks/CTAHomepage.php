<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class CTAHomepageBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'CTAHomepage';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 20;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-device-phone-mobile';

    /**
     * Get the block's schema for Filament's form builder.
     */
    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Content')
                    ->description('Configure the headline and call to action')
                    ->schema([
                        Textarea::make('headline')
                            ->required()
                            ->maxLength(150)
                            ->default("Stop firefighting.\nStart delivering with confidence.")
                            ->helperText('Main headline (supports line breaks)')
                            ->columnSpanFull()
                            ->rows(3),

                        TextInput::make('button_text')
                            ->label('Button Text')
                            ->maxLength(50)
                            ->default('Book a Demo Now')
                            ->columnSpanFull(),
                    ]),

                Section::make('Right Side Image')
                    ->description('Image displayed on the right side of the CTA')
                    ->schema([
                        FileUpload::make('mobile_image')
                            ->image()
                            ->directory('cta-mobile-block-images')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->helperText('Image Size (max 2MB)'),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     */
    public static function mutateData(array $data): array
    {
        return [
            'headline' => $data['headline'] ?? null,
            'button' => [
                'text' => $data['button_text'] ?? 'Book a Demo Now',
            ],
            'image' => !empty($data['mobile_image']) ? url('storage/' . $data['mobile_image']) : null,
        ];
    }
}
