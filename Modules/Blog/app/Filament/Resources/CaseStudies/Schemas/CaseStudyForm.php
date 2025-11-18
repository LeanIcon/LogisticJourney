<?php

declare(strict_types=1);

namespace Modules\Blog\Filament\Resources\CaseStudies\Schemas;

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

final class CaseStudyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->columnSpanFull()
                    ->columns(3)
                    ->schema([
                        Section::make('Case Study Content')
                            ->schema([
                                RichEditor::make('introduction')
                                    ->label('Introduction')
                                    ->columnSpanFull()
                                    ->helperText('Brief introduction about the client and their business'),
                                RichEditor::make('the_problem')
                                    ->label('The Problem')
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText('Detailed description of the challenges faced'),
                                RichEditor::make('the_solution')
                                    ->label('What We Did to Solve It')
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText('How your solution addressed the problems'),
                                RichEditor::make('the_result')
                                    ->label('The Result')
                                    ->required()
                                    ->columnSpanFull()
                                    ->helperText('Outcomes and impact of the solution'),
                                RichEditor::make('the_road_ahead')
                                    ->label('The Road Ahead')
                                    ->columnSpanFull()
                                    ->helperText('Future plans or next steps (optional)'),
                            ])
                            ->columnSpan(2),
                        Section::make('Publishing & Details')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (string $operation, $state, callable $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                    ->helperText('Example: How Logistic Journey Helped Turn Paper Chaos into Digital Clarity'),
                                TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true)
                                    ->helperText('URL-friendly version of the title'),
                                TextInput::make('client_name')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Example: Park Avenue Stationers'),
                                Textarea::make('excerpt')
                                    ->required()
                                    ->maxLength(500)
                                    ->rows(3)
                                    ->helperText('Short quote or description shown on the homepage card (max 500 characters)'),
                                TextInput::make('quote_author')
                                    ->maxLength(255)
                                    ->helperText('Example: Devon Miles'),
                                TextInput::make('quote_author_title')
                                    ->maxLength(255)
                                    ->helperText('Example: Operations Manager, Park Avenue Stationers'),
                                Select::make('status')
                                    ->options([
                                        'draft' => 'Draft',
                                        'published' => 'Published',
                                    ])
                                    ->default('draft')
                                    ->required(),
                                DateTimePicker::make('published_at')
                                    ->label('Published Date')
                                    ->nullable()
                                    ->helperText('Leave empty for current date/time'),
                                Toggle::make('is_featured')
                                    ->label('Featured on Homepage')
                                    ->helperText('Show this case study on the homepage')
                                    ->default(false),
                                FileUpload::make('client_logo')
                                    ->label('Client Logo')
                                    ->image()
                                    ->directory('case-studies/logos')
                                    ->maxSize(1024)
                                    ->helperText('Client company logo for the card'),
                                FileUpload::make('featured_image')
                                    ->label('Featured Image')
                                    ->image()
                                    ->directory('case-studies/featured-images')
                                    ->maxSize(2048)
                                    ->helperText('Main image shown on homepage and detail page'),
                                TextInput::make('industry')
                                    ->maxLength(255)
                                    ->helperText('Example: Office Supplies & Distributions'),
                                TextInput::make('location')
                                    ->maxLength(255)
                                    ->helperText('Example: South Africa'),
                                TextInput::make('engagement_type')
                                    ->label('Engagement Type')
                                    ->maxLength(255)
                                    ->helperText('Example: Beta Testing Product'),
                                TextInput::make('implementation_period')
                                    ->maxLength(255)
                                    ->helperText('Example: 3 - 4 weeks'),
                                TextInput::make('solution')
                                    ->maxLength(255)
                                    ->helperText('Example: Logistic Journey delivery management platform'),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
