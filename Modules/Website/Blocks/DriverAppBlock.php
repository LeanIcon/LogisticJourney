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

final class DriverAppBlock
{
    use BlockTrait;

    protected static string $name = 'DriverApp';
    protected static ?string $icon = 'heroicon-o-device-phone-mobile';
    protected static bool $apiOnly = true;
    protected static string $group = 'Features Page';
    protected static int $sortIndex = 15;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Driver App Section')
                    ->description('Left: app image. Right: headline, description, features.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('App Image')
                            ->image()
                            ->directory('driver-app')
                            ->imageEditor()
                            ->maxSize(4096)
                            ->helperText('Screenshot or illustration of the mobile app'),

                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Empower Drivers On the Go')
                            ->required()
                            ->maxLength(300)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->default('With the Logistic Journey mobile app, drivers stay connected, informed, and efficient — every step of the way.')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Repeater::make('features')
                            ->label('Features')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Feature Title')
                                    ->placeholder('e.g., Smart Scheduling')
                                    ->maxLength(255)
                                    ->required(),

                                Textarea::make('description')
                                    ->label('Feature Description')
                                    ->placeholder('e.g., Drivers see upcoming and in-progress journeys right from their dashboard.')
                                    ->rows(2)
                                    ->maxLength(500),
                            ])
                            ->defaultItems(4)
                            ->columnSpanFull(),
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
            'features' => array_map(function ($feature) {
                return [
                    'title' => $feature['title'] ?? null,
                    'description' => $feature['description'] ?? null,
                ];
            }, $data['features'] ?? []),
            'image' => [
                'path' => $imagePath,
                'url' => $imageUrl,
                'alt' => $data['image_alt'] ?? 'Driver app screenshot',
            ],
        ];
    }
}
