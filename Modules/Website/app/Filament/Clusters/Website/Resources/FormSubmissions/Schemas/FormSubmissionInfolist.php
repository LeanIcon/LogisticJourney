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
                Section::make('Submission Overview')
                    ->description('Details about this form submission')
                    ->schema([
                        TextEntry::make('form.title')
                            ->label('Form')
                            ->icon('heroicon-o-document-text'),
                        TextEntry::make('submitted_at')
                            ->dateTime()
                            ->icon('heroicon-o-calendar'),
                        TextEntry::make('id')
                            ->label('Submission ID')
                            ->copyable()
                            ->icon('heroicon-o-hashtag'),
                    ])
                    ->columns(3),

                Section::make('Submitted Data')
                    ->description('Form fields and values submitted')
                    ->schema([
                        KeyValueEntry::make('data')
                            ->label('Form Data')
                            ->columnSpanFull(),
                    ]),

                Section::make('Technical Information')
                    ->description('IP address and browser information')
                    ->schema([
                        TextEntry::make('ip_address')
                            ->label('IP Address')
                            ->copyable()
                            ->icon('heroicon-o-computer-desktop'),
                        TextEntry::make('user_agent')
                            ->label('Browser/Device')
                            ->icon('heroicon-o-device-phone-mobile')
                            ->limit(100),
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
