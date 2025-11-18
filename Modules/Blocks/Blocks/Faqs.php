<?php

declare(strict_types=1);

namespace Modules\Blocks\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class Faqs
{
    use BlockTrait;

    protected static string $name = 'Faqs';

    protected static ?string $view = null;

    protected static bool $apiOnly = true;

    protected static ?string $icon = 'heroicon-o-cube-transparent';

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->label('Faqs Block')
            ->schema([
                Tabs::make('BlockTabs')
                    ->tabs([
                        Tab::make('Content')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Title')
                                    ->required()
                                    ->reactive()
                                    ->columnSpanFull(),

                                Repeater::make('faqs')
                                    ->label('FAQ items')
                                    ->schema([
                                        TextInput::make('question')
                                            ->label('Question')
                                            ->required()
                                            ->maxLength(300),

                                        RichEditor::make('answer')
                                            ->label('Answer')
                                            ->required()
                                            ->toolbarButtons(['bold', 'italic', 'link'])
                                            ->disableToolbarButtons(['attachFiles']),
                                    ])
                                    ->minItems(1)
                                    ->defaultItems(3)
                                    ->columnSpanFull()
                                    ->grid(1)
                                    ->itemLabel(fn (array $state): ?string => $state['question'] ?? null),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        $faqs = collect($data['faqs'] ?? [])->map(function ($faq) {
            return [
                'question' => $faq['question'] ?? null,
                'answer' => $faq['answer'] ?? null,
            ];
        })->toArray();

        return [
            'title' => $data['title'] ?? null,
            'faqs' => $faqs,
        ];
    }
}