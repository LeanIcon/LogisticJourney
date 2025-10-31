<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post Overview')
                    ->description('Key information about this blog post')
                    ->schema([
                        ImageEntry::make('featured_image')
                            ->label('Featured Image')
                            ->columnSpanFull(),
                        TextEntry::make('title')
                            ->copyable()
                            ->icon('heroicon-o-document-text'),
                        TextEntry::make('slug')
                            ->copyable()
                            ->icon('heroicon-o-link'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'published' => 'success',
                                'draft' => 'gray',
                                'scheduled' => 'warning',
                                default => 'gray',
                            }),
                        TextEntry::make('type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'article' => 'info',
                                'news' => 'warning',
                                'tutorial' => 'success',
                                default => 'gray',
                            }),
                        TextEntry::make('is_featured')
                            ->label('Featured')
                            ->badge()
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Yes' : 'No')
                            ->color(fn (bool $state): string => $state ? 'success' : 'gray'),
                    ])
                    ->columns(3),

                Section::make('Content')
                    ->description('The main content of this post')
                    ->schema([
                        TextEntry::make('excerpt')
                            ->columnSpanFull(),
                        TextEntry::make('body')
                            ->html()
                            ->columnSpanFull(),
                    ]),

                Section::make('Author & Categories')
                    ->description('Authorship and categorization')
                    ->schema([
                        TextEntry::make('author.name')
                            ->label('Author')
                            ->icon('heroicon-o-user'),
                        TextEntry::make('categories.name')
                            ->label('Categories')
                            ->badge()
                            ->separator(','),
                    ])
                    ->columns(2),

                Section::make('Publishing Information')
                    ->description('When this post was or will be published')
                    ->schema([
                        TextEntry::make('published_at')
                            ->dateTime()
                            ->icon('heroicon-o-calendar'),
                        TextEntry::make('scheduled_for')
                            ->dateTime()
                            ->icon('heroicon-o-clock')
                            ->placeholder('Not scheduled'),
                    ])
                    ->columns(2)
                    ->collapsed(),

                Section::make('SEO Information')
                    ->description('Search engine optimization metadata')
                    ->schema([
                        TextEntry::make('meta_title')
                            ->placeholder('Using post title'),
                        TextEntry::make('meta_description')
                            ->placeholder('Using excerpt'),
                    ])
                    ->columns(2)
                    ->collapsed(),

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
