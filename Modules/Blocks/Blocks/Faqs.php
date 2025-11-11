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
                                            ->reactive(),

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
                                            ->columnSpanFull(),
                            ]),
                        Tab::make('Preview')
                            ->schema([
                                CodeEditor::make('code_preview')
                                    ->label('Block Preview')
                                    ->language(Language::Php)
                                    ->dehydrated(false)
                                    ->default('Loading preview...')
                                    ->reactive()
                                    ->afterStateHydrated(function (CodeEditor $component, $state, callable $set, callable $get) {
                                        $title = $get('title') ?? 'Example Title';
                                        $faqs = $get('faqs') ?? [['question' => 'What is X?', 'answer' => 'X is ...']];
                                        $faqsExport = var_export($faqs, true);
                                        $code = "<?php\n\nreturn [\n    'type' => 'Faqs',\n    'data' => [\n        'title' => '{$title}',\n        'faqs' => {$faqsExport},\n    ]\n];";
                                        $set('code_preview', $code);
                                    }),
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
