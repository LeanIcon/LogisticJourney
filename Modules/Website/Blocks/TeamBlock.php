<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class TeamBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'Team';

    /**
     * Icon for the block in the builder.
     */
    protected static ?string $icon = 'heroicon-o-users';

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
    protected static int $sortIndex = 5;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Team Section')
                    ->description('Display team members with their images, names, and roles')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Introduce the Team')
                            ->required()
                            ->maxLength(200)
                            ->columnSpanFull(),

                        Repeater::make('members')
                            ->label('Team Members')
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Member Photo')
                                    ->image()
                                    ->directory('team')
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->helperText('Square image recommended for circular display'),

                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->maxLength(150),

                                TextInput::make('title')
                                    ->label('Title / Role')
                                    ->maxLength(150)
                                    ->helperText('e.g., CEO, Africa Region'),

                                TextInput::make('link')
                                    ->label('Profile Link (optional)')
                                    ->url()
                                    ->maxLength(500),
                            ])
                            ->minItems(1)
                            ->maxItems(12)
                            ->defaultItems(2)
                            ->collapsible()
                            ->reorderable(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $members = [];

        if (!empty($data['members']) && is_array($data['members'])) {
            $members = array_map(function ($item) {
                $imagePath = $item['image'] ?? null;
                $imageUrl = $imagePath ? Storage::url($imagePath) : null;

                return [
                    'image' => [
                        'path' => $imagePath,
                        'url' => $imageUrl,
                    ],
                    'name' => $item['name'] ?? null,
                    'title' => $item['title'] ?? null,
                    'link' => $item['link'] ?? null,
                ];
            }, $data['members']);
        }

        return [
            'headline' => $data['headline'] ?? null,
            'members' => $members,
        ];
    }
}
