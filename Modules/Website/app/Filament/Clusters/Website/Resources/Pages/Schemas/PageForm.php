<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        Section::make('Blocks & Content')
                            ->schema([
                                \Modules\Blocks\Filament\Forms\BlockEditor::make('blocks')
                                    ->label('Page Blocks')
                                    ->collapsed(),
                                RichEditor::make('content')->label('Legacy Content')->nullable(),
                            ])->columnSpan(2),
                        Section::make('Page Details')
                            ->schema([
                                TextInput::make('title')->required(),
                                Select::make('slug')
                                    ->required()
                                    ->options([
                                        'demo-request' => 'Request Demo Page (demo-request)',
                                        'contact-us' => 'Contact Us Page (contact-us)',
                                        'about-us' => 'About Page (about-us)',
                                    ])
                                    ->helperText('Used in API/URL paths. Choose one of the canonical slugs.'),
                                TextInput::make('meta_title'),
                                Textarea::make('meta_description')->rows(2),
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                    ])
                                    ->default('draft'),
                                Select::make('parent_id')
                                    ->relationship('parent', 'title')
                                    ->label('Parent Page')
                                    ->nullable(),
                            ])->columnSpan(1),
                    ]),
            ]);

    }
}
