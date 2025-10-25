<?php

namespace Modules\Blocks\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Modules\Blocks\Interfaces\Block;

class Faqs extends Block
{
    protected static string $name = 'Faqs';
    protected static ?string $view = null;
    protected static bool $apiOnly = true;
    protected static ?string $icon = 'heroicon-o-cube-transparent';

    public static function schema(): BuilderBlock
    {
        return static::make()
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
                                Textarea::make('content')
                                    ->label('Content')
                                    ->required()
                                    ->reactive(),
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
                                        $content = $get('content') ?? 'Example Content';
                                        $code = "<?php\n\nreturn [\n    'type' => 'Faqs',\n    'data' => [\n        'title' => '{$title}',\n        'content' => '{$content}'\n    ]\n];";
                                        $set('code_preview', $code);
                                    }),
                            ]),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        // Manipulate block data before it's returned via API
        return $data;
    }
}
