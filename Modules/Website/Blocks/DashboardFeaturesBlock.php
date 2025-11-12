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

final class DashboardFeaturesBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'Dashboard';

    /**
     * Icon for the builder palette.
     */
    protected static ?string $icon = 'heroicon-o-rectangle-stack';

    /**
     * Keep this block API-only (returned via the blocks API).
     */
    protected static bool $apiOnly = true;

    /**
     * Group label shown in the block builder UI.
     */
    protected static string $group = 'Features Page';

    /**
     * Sort index for dashboard ordering.
     */
    protected static int $sortIndex = 12;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Dashboard Features Section')
                    ->description('Two-column layout: left (map + table images), right (feature highlights)')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('A Dashboard That Powers Your Fleet')
                            ->required()
                            ->maxLength(300)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Description')
                            ->default('Get full visibility of your logistics operations in one place. Logistic Journey\'s dashboard helps you track vehicles, drivers, and deliveries in real-time – so you can reduce costs, prevent delays, and deliver on time, every time.')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Section::make('Left Column - Dashboard Images')
                            ->schema([
                                FileUpload::make('map_image')
                                    ->label('Map/Tracking Image')
                                    ->image()
                                    ->directory('dashboard')
                                    ->imageEditor()
                                    ->maxSize(3072)
                                    ->helperText('Map view with vehicle pins'),
                            ])
                            ->columns(2),

                        Section::make('Right Column - Feature Highlights')
                            ->description('List of key features with titles and descriptions')
                            ->schema([
                                Repeater::make('features')
                                    ->label('Features')
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Feature Title')
                                            ->placeholder('e.g., Real-Time Vehicle Tracking')
                                            ->maxLength(255)
                                            ->required(),

                                        Textarea::make('description')
                                            ->label('Feature Description')
                                            ->placeholder('e.g., Monitor every vehicles location, route, speed.')
                                            ->rows(2)
                                            ->maxLength(500),
                                    ])
                                    ->defaultItems(4)
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $mapImagePath = $data['map_image'] ?? null;
        $mapImageUrl = $mapImagePath ? Storage::url($mapImagePath) : null;

        $tableImagePath = $data['table_image'] ?? null;
        $tableImageUrl = $tableImagePath ? Storage::url($tableImagePath) : null;

        return [
            'headline' => $data['headline'] ?? null,
            'description' => $data['description'] ?? null,
            'left_column' => [
                'map' => [
                    'path' => $mapImagePath,
                    'url' => $mapImageUrl,
                    'alt' => $data['map_image_alt'] ?? 'Fleet tracking map',
                ],
            ],
            'right_column' => [
                'features' => array_map(function ($feature) {
                    return [
                        'title' => $feature['title'] ?? null,
                        'description' => $feature['description'] ?? null,
                    ];
                }, $data['features'] ?? []),
            ],
        ];
    }
}
