<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class SupportBlock
{
    use BlockTrait;

    protected static string $name = 'SupportBlock';

    protected static ?string $icon = 'heroicon-o-phone';

    protected static bool $apiOnly = true;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Support Section')
                    ->schema([
                        TextInput::make('section_title')
                            ->label('Title')
                            ->default('Support')
                            ->maxLength(255),

                        Textarea::make('section_subtitle')
                            ->label('Subtitle')
                            ->rows(2)
                            ->helperText('Short description under the title'),

                        Repeater::make('items')
                            ->label('Support Items')
                            ->schema([
                                Select::make('type')
                                    ->label('Type')
                                    ->options([
                                        'phone' => 'Phone Support',
                                        'email' => 'Email Support',
                                        'address' => 'Physical Address',
                                    ])
                                    ->required(),

                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('content')
                                    ->rows(3)
                                    ->helperText('Details, phone number, email or address'),

                                TextInput::make('link')
                                    ->label('Optional link')
                                    ->maxLength(500),
                            ])
                            ->minItems(1)
                            ->defaultItems(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $items = collect($data['items'] ?? [])->map(function ($item) {
            return [
                'type' => $item['type'] ?? null,
                'title' => $item['title'] ?? null,
                'content' => $item['content'] ?? null,
                'link' => $item['link'] ?? null,
            ];
        })->toArray();

        return [
            'section' => [
                'title' => $data['section_title'] ?? 'Support',
                'subtitle' => $data['section_subtitle'] ?? null,
            ],
            'items' => $items,
        ];
    }
}
