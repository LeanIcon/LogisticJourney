<?php

declare(strict_types=1);


namespace Modules\Blog\Filament\Resources\Categories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CategoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Information')
                    ->description('Basic details about this category')
                    ->schema([
                        TextEntry::make('name')
                            ->copyable()
                            ->icon('heroicon-o-tag'),
                        TextEntry::make('slug')
                            ->copyable()
                            ->icon('heroicon-o-link'),
                        TextEntry::make('order')
                            ->label('Display Order')
                            ->icon('heroicon-o-bars-3'),
                    ])
                    ->columns(3),

                Section::make('Description')
                    ->description('Category description and purpose')
                    ->schema([
                        TextEntry::make('description')
                            ->placeholder('No description provided')
                            ->columnSpanFull(),
                    ]),

                Section::make('Hierarchy')
                    ->description('Parent and child categories')
                    ->schema([
                        TextEntry::make('parent.name')
                            ->label('Parent Category')
                            ->icon('heroicon-o-folder')
                            ->placeholder('Top-level category'),
                    ]),

                Section::make('Posts')
                    ->description('Posts in this category')
                    ->schema([
                        TextEntry::make('posts_count')
                            ->label('Total Posts')
                            ->icon('heroicon-o-document-text')
                            ->formatStateUsing(fn ($record) => $record->posts()->count()),
                    ]),

                Section::make('Timestamps')
                    ->description('Record creation and modification dates')
                    ->schema([
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->icon('heroicon-o-plus-circle'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->icon('heroicon-o-pencil-square'),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }
}
