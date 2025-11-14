<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

final class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        // Main Content Section (2/3 width)
                        Section::make('Post Content')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null
                                    ),

                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->helperText('URL-friendly version of the title'),

                                RichEditor::make('body')
                                    ->required()
                                    ->columnSpanFull()
                                    ->fileAttachmentsDirectory('blog/attachments'),

                                // SEO Fields
                                TextInput::make('meta_title')
                                    ->maxLength(255)
                                    ->helperText('SEO title (leave empty to use post title)'),

                                Textarea::make('meta_description')
                                    ->maxLength(160)
                                    ->rows(2)
                                    ->helperText('SEO description (max 160 characters)'),
                            ])
                            ->columnSpan(2),

                        // Sidebar Section (1/3 width)
                        Section::make('Publishing & Meta')
                            ->schema([
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                        'scheduled' => 'Scheduled',
                                    ])
                                    ->default('draft')
                                    ->required()
                                    ->reactive(),

                                DateTimePicker::make('published_at')
                                    ->label('Published Date')
                                    ->nullable()
                                    ->helperText('Leave empty for current date/time'),

                                DateTimePicker::make('scheduled_for')
                                    ->label('Schedule For')
                                    ->nullable()
                                    ->visible(fn (callable $get) => $get('status') === 'scheduled')
                                    ->helperText('Auto-publish at this date/time'),

                                Select::make('type')
                                    ->options([
                                        'blog' => 'Blog',
                                        'case study' => 'Case Study'
                                    ])
                                    ->default('blog')
                                    ->required(),

                                Toggle::make('is_featured')
                                    ->label('Featured Blog')
                                    ->helperText('Show on homepage/featured section'),

                                Select::make('author_id')
                                    ->relationship('author', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        TextInput::make('name')->required(),
                                        TextInput::make('slug')->required(),
                                        TextInput::make('email')->email(),
                                        Textarea::make('bio')->rows(3),
                                        TextInput::make('website')->url(),
                                    ]),

                                Select::make('categories')
                                    ->relationship('categories', 'name')
                                    ->multiple()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        TextInput::make('name')->required(),
                                        TextInput::make('slug')->required(),
                                        Textarea::make('description')->rows(2),
                                    ]),

                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->directory('blog/featured-images')
                                    ->maxSize(2048)
                                    ->helperText('Recommended: 1200x630px'),

                                FileUpload::make('banner')
                                    ->label('Banner Image')
                                    ->image()
                                    ->directory('blog/banners')
                                    ->maxSize(4096)
                                    ->helperText('Large banner for post header'),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
