<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class DeliveryConfidenceBlock
{
    use BlockTrait;

    protected static string $name = 'Delivery';
    protected static ?string $icon = 'heroicon-o-truck';
    protected static bool $apiOnly = true;
    protected static string $group = 'Features Page';
    protected static int $sortIndex = 14;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Delivery Confidence Section')
                    ->description('Left: headline and button. Right: image.')
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
                            ->maxLength(100),

                        FileUpload::make('image')
                            ->label('Right Side Image')
                            ->image()
                            ->directory('delivery-confidence')
                            ->imageEditor()
                            ->maxSize(4096)
                            ->helperText('Photo or illustration for the right side'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $imagePath = $data['image'] ?? null;
        $imageUrl = $imagePath ? Storage::url($imagePath) : null;

        return [
            'headline' => $data['headline'] ?? null,
            'button' => [
                'text' => $data['button_text'] ?? 'Book a Demo Now',
            ],
            'image' => [
                'path' => $imagePath,
                'url' => $imageUrl,
                'alt' => $data['image_alt'] ?? 'Delivery confidence photo',
            ],
        ];
    }
}
