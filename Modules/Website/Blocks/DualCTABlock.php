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

final class DualCTABlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'DualCta';

    /**
     * Icon for the block in the builder.
     */
    protected static ?string $icon = 'heroicon-o-paper-airplane';

    /**
     * Keep this block API-only (returned via the blocks API).
     */
    protected static bool $apiOnly = true;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Dual CTA Section')
                    ->description('Two-button CTA with headline and full-width background image')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Ready to Transform Your Deliveries?')
                            ->required()
                            ->maxLength(300)
                            ->columnSpanFull(),

                        TextInput::make('button_primary_text')
                            ->label('First Button Text')
                            ->default('Book a Demo')
                            ->required()
                            ->maxLength(100),

                        TextInput::make('button_secondary_text')
                            ->label('Second Button Text')
                            ->default('Talk to Our Team')
                            ->maxLength(100),

                        Section::make('Background Image')
                            ->description('Full-width background image')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Background Image')
                                    ->image()
                                    ->directory('dual-cta')
                                    ->imageEditor()
                                    ->maxSize(5120)
                                    ->helperText('Wide/landscape image recommended, ~1200x500'),

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

        return [
            'headline' => $data['headline'] ?? null,
            'description' => $data['description'] ?? null,
            'buttons' => [
                'primary' => [
                    'text' => $data['button_primary_text'] ?? 'Book a Demo',
                    'url' => $data['button_primary_url'] ?? '#',
                    'style' => $data['button_primary_style'] ?? 'primary',
                ],
                'secondary' => [
                    'text' => $data['button_secondary_text'] ?? 'Talk to Our Team',
                    'url' => $data['button_secondary_url'] ?? '#',
                    'style' => $data['button_secondary_style'] ?? 'outline',
                ],
            ],
            'image' => [
                'path' => $imagePath,
                'url' => $imageUrl,
                'alt' => $data['image_alt'] ?? null,
            ],
        ];
    }
}
