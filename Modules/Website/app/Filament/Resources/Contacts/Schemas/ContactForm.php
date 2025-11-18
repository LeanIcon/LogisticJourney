<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact Information')
                    ->description('Basic contact details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(20)
                            ->helperText('Contact phone number'),
                    ])
                    ->columns(3),

                Section::make('Lead Details')
                    ->description('Lead source and status information')
                    ->schema([
                        Select::make('source')
                            ->options([
                                'website' => 'Website',
                                'referral' => 'Referral',
                                'social_media' => 'Social Media',
                                'advertisement' => 'Advertisement',
                                'event' => 'Event',
                                'direct' => 'Direct Contact',
                                'other' => 'Other',
                            ])
                            ->default('website')
                            ->helperText('How did they find us?'),

                        Select::make('status')
                            ->options([
                                'new' => 'New',
                                'contacted' => 'Contacted',
                                'qualified' => 'Qualified',
                                'converted' => 'Converted',
                                'closed' => 'Closed',
                            ])
                            ->default('new')
                            ->required(),

                        Select::make('assigned_to')
                            ->relationship('assignedUser', 'name')
                            ->label('Assigned To')
                            ->searchable()
                            ->nullable()
                            ->helperText('Assign to team member'),
                    ])
                    ->columns(3),

                Section::make('Message')
                    ->description('Lead notes or inquiry details')
                    ->schema([
                        Textarea::make('message')
                            ->rows(4)
                            ->columnSpanFull()
                            ->helperText('Lead notes or inquiry details'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}