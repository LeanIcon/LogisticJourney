<?php

declare(strict_types=1);

namespace Modules\Website\Filament\Resources\Forms\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

final class FormForm
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Form Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),

                        Select::make('slug')
                            ->required()
                            ->options([
                                'demo-request' => 'Request Demo (demo-request)',
                                'contact-form' => 'Contact Form (contact-form)',
                                'newsletter-signup' => 'Newsletter Signup (newsletter-signup)',
                            ])
                            ->helperText('Used in API/URL paths. Choose one of the canonical form slugs.'),

                        Textarea::make('description')
                            ->rows(2)
                            ->maxLength(500)
                            ->helperText('Internal description'),

                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpan(1),

                Section::make('Form Settings')
                    ->schema([
                        TextInput::make('settings.submit_button_text')
                            ->default('Submit')
                            ->helperText('Button text'),
                        
                        Textarea::make('settings.success_message')
                            ->rows(2)
                            ->default('Thank you! Your submission has been received.')
                            ->helperText('Message shown after successful submission'),
                        
                        TextInput::make('settings.redirect_url')
                            ->url()
                            ->helperText('Optional redirect after submission'),
                        
                        TextInput::make('settings.admin_email')
                            ->email()
                            ->helperText('Email for notifications'),
                    ])
                    ->columns(2)
                    ->columnSpan(1),

                Section::make('Form Fields')
                    ->schema([
                        Repeater::make('fields')
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->helperText('Field identifier (e.g., email, phone)'),

                                TextInput::make('label')
                                    ->required()
                                    ->helperText('Display label'),

                                Select::make('type')
                                    ->options([
                                        'text' => 'Text',
                                        'email' => 'Email',
                                        'tel' => 'Phone',
                                        'number' => 'Number',
                                        'textarea' => 'Textarea',
                                        'select' => 'Select Dropdown',
                                        'checkbox' => 'Checkbox',
                                        'checkbox_group' => 'Checkbox Group',
                                        'radio' => 'Radio Buttons',
                                        'date' => 'Date',
                                        'time' => 'Time',
                                        'file' => 'File Upload',
                                    ])
                                    ->required(),

                                TextInput::make('placeholder')
                                    ->helperText('Optional placeholder text'),

                                Toggle::make('required')
                                    ->default(false),

                                TextInput::make('rows')
                                    ->numeric()
                                    ->default(3)
                                    ->helperText('For textarea fields'),

                                KeyValue::make('options')
                                    ->helperText('For select/checkbox/radio fields (key: value pairs)'),

                                KeyValue::make('validation')
                                    ->helperText('Laravel validation rules'),
                            ])
                            ->columns(2)
                            ->collapsible()
                            ->collapsed()
                            ->itemLabel(fn (array $state): ?string => $state['label'] ?? null)
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}