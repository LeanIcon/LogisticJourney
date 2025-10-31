<?php

declare(strict_types=1);


namespace Modules\Blog\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

final class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null
                            ),

                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('URL-friendly version of the name'),

                        Textarea::make('description')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Brief description of this category'),

                        Select::make('parent_id')
                            ->relationship('parent', 'name')
                            ->label('Parent Category')
                            ->nullable()
                            ->searchable()
                            ->helperText('Create category hierarchy'),

                        TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Display order (lower numbers appear first)'),
                    ])
                    ->columns(2),
            ]);
    }
}
