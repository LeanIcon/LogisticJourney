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

final class JourneyPlannerBlock
{
    use BlockTrait;

    protected static string $name = 'Journey';
    protected static ?string $icon = 'heroicon-o-map';
    protected static bool $apiOnly = true;
    protected static string $group = 'Features Page';
    protected static int $sortIndex = 13;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Journey Planner Section')
                    ->description('Left: headline, description, features. Right: single image.')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Plan Every Journey With Ease')
                            ->required()
                            ->maxLength(300)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->default('Simplify complex logistics planning. With Logistic Journey, you can create, assign, and track delivery routes in minutes — reducing dispatcher stress and keeping drivers on schedule.')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Repeater::make('features')
                            ->label('Features')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Feature Title')
                                    ->placeholder('e.g., Customizable Journey Setup')
                                    ->maxLength(255)
                                    ->required(),

                                Textarea::make('description')
                                    ->label('Feature Description')
                                    ->placeholder('e.g., Define routes, assign drivers, and set delivery dates with just a few clicks.')
                                    ->rows(2)
                                    ->maxLength(500),
                            ])
                            ->defaultItems(4)
                            ->columnSpanFull(),

                        FileUpload::make('image')
                            ->label('Right Side Image')
                            ->image()
                            ->directory('journey-planner')
                            ->imageEditor()
                            ->maxSize(4096)
                            ->helperText('Screenshot or illustration for the right side'),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $imagePath = $data['image'] ?? null;
        $imageUrl = $imagePath ? url('storage/' . $imagePath) : null;

        return [
            'headline' => $data['headline'] ?? null,
            'description' => $data['description'] ?? null,
            'features' => array_map(function ($feature) {
                $featureImagePath = $feature['image'] ?? null;
                $featureImageUrl = $featureImagePath ? url('storage/' . $featureImagePath) : null;

                return [
                    'title' => $feature['title'] ?? null,
                    'description' => $feature['description'] ?? null,
                ];
            }, $data['features'] ?? []),
            'image' => $imageUrl,
        ];
    }
}