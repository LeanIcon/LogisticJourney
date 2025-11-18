<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Clusters\Website\Resources\FormSubmissions\Schemas;

use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class FormSubmissionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Submitted Data')
                    ->description('Form fields and values submitted')
                    ->schema([
                        KeyValueEntry::make('data')
                            ->label('Form Data')
                            ->columnSpanFull(),
                    ]),

                Section::make('Technical Information')
                    ->description('IP address, browser information, and timestamps')
                    ->schema([
                        TextEntry::make('ip_address')
                            ->label('IP Address')
                            ->copyable()
                            ->icon('heroicon-o-computer-desktop'),
                        TextEntry::make('user_agent')
                            ->label('Browser/Device')
                            ->icon('heroicon-o-device-phone-mobile')
                            ->limit(100)
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->label('Submitted At')
                            ->dateTime()
                            ->icon('heroicon-o-plus-circle'),
                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime()
                            ->icon('heroicon-o-pencil-square'),
                    ])
                    ->columns(2),
            ]);
    }
}