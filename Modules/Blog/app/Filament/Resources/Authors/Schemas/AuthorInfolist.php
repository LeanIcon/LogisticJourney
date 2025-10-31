<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\Authors\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class AuthorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Author Profile')
                    ->description('Basic information about this author')
                    ->schema([
                        ImageEntry::make('avatar')
                            ->label('Profile Picture')
                            ->circular()
                            ->defaultImageUrl(url('/images/default-avatar.png'))
                            ->columnSpanFull(),
                        TextEntry::make('name')
                            ->copyable()
                            ->icon('heroicon-o-user'),
                        TextEntry::make('slug')
                            ->copyable()
                            ->icon('heroicon-o-link'),
                        TextEntry::make('email')
                            ->copyable()
                            ->icon('heroicon-o-envelope')
                            ->placeholder('No email provided'),
                    ])
                    ->columns(3),

                Section::make('Biography')
                    ->description('Author bio and background')
                    ->schema([
                        TextEntry::make('bio')
                            ->placeholder('No biography provided')
                            ->columnSpanFull(),
                    ]),

                Section::make('Links & Contact')
                    ->description('Website and social connections')
                    ->schema([
                        TextEntry::make('website')
                            ->url(fn ($record) => $record->website)
                            ->openUrlInNewTab()
                            ->icon('heroicon-o-globe-alt')
                            ->placeholder('No website provided'),
                        TextEntry::make('user.name')
                            ->label('Linked User Account')
                            ->icon('heroicon-o-user-circle')
                            ->placeholder('Not linked to a user account'),
                    ])
                    ->columns(2),

                Section::make('Author Details')
                    ->description('Additional information')
                    ->schema([
                        TextEntry::make('is_guest')
                            ->label('Author Type')
                            ->badge()
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Guest Author' : 'Regular Author')
                            ->color(fn (bool $state): string => $state ? 'warning' : 'success'),
                        TextEntry::make('posts_count')
                            ->label('Total Posts')
                            ->icon('heroicon-o-document-text')
                            ->formatStateUsing(fn ($record) => $record->posts()->count()),
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
