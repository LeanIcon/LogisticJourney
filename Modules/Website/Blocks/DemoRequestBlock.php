<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class DemoRequestBlock
{
    use BlockTrait;

    /**
     * Unique block name used in the block registry and in page `blocks`.
     */
    protected static string $name = 'DemoRequest';

    protected static ?string $icon = 'heroicon-o-phone';

    protected static bool $apiOnly = true;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Demo Request Contact')
                    ->schema([
                        TextInput::make('title')->required()->default('Request a Demo'),
                        TextInput::make('subtitle')->default('Get a personal walkthrough of Logistic Journey with one of our product experts')->maxLength(255),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('phone')->label('Phone')->maxLength(50),
                                TextInput::make('email')->label('Email')->email()->maxLength(255),
                            ]),
                        Textarea::make('address')->rows(3),
                        Repeater::make('social_links')
                            ->schema([
                                TextInput::make('type')->label('Type')->maxLength(50),
                                TextInput::make('url')->label('URL')->url()->maxLength(500),
                            ])
                            ->minItems(0)
                            ->columnSpanFull(),
                        Toggle::make('show_background')->label('Show background pattern')->default(true),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        return [
            'title' => $data['title'] ?? 'Request a Demo',
            'subtitle' => $data['subtitle'] ?? null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'address' => $data['address'] ?? null,
            'social_links' => $data['social_links'] ?? [],
            'show_background' => (bool) ($data['show_background'] ?? true),
        ];
    }
}
