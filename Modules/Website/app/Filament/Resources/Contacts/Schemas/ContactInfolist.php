<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ContactInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact Information')
                    ->description('Basic contact details')
                    ->schema([
                        TextEntry::make('name')
                            ->copyable()
                            ->icon('heroicon-o-user'),
                        TextEntry::make('email')
                            ->copyable()
                            ->icon('heroicon-o-envelope'),
                        TextEntry::make('phone')
                            ->copyable()
                            ->icon('heroicon-o-phone')
                            ->placeholder('No phone provided'),
                    ])
                    ->columns(3),

                Section::make('Lead Details')
                    ->description('Source and status information')
                    ->schema([
                        TextEntry::make('source')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'referral' => 'success',
                                'social_media' => 'info',
                                'advertisement' => 'warning',
                                'event' => 'purple',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-arrow-trending-up'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'new' => 'gray',
                                'contacted' => 'info',
                                'qualified' => 'warning',
                                'converted' => 'success',
                                'closed' => 'danger',
                                default => 'gray',
                            })
                            ->icon('heroicon-o-flag'),
                        TextEntry::make('assignedUser.name')
                            ->label('Assigned To')
                            ->icon('heroicon-o-user-circle')
                            ->placeholder('Unassigned'),
                    ])
                    ->columns(3),

                Section::make('Message')
                    ->description('Lead inquiry or notes')
                    ->schema([
                        TextEntry::make('message')
                            ->placeholder('No message provided')
                            ->columnSpanFull(),
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
