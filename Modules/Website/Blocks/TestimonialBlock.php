<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class TestimonialBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'TestimonialBlock';

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-chat-bubble-left-ellipsis';

    /**
     * Get the block's schema for Filament's form builder.
     * ANOTHER COMPLETELY DIFFERENT structure - using repeaters!
     */
    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Section Settings')
                    ->schema([
                        TextInput::make('section_title')
                            ->label('Section Title')
                            ->default('What Our Customers Say')
                            ->maxLength(100),

                        RichEditor::make('section_description')
                            ->label('Section Description')
                            ->toolbarButtons(['bold', 'italic'])
                            ->maxLength(500),
                    ]),

                Section::make('Testimonials')
                    ->description('Add customer testimonials')
                    ->schema([
                        Repeater::make('testimonials')
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('customer_name')
                                            ->required()
                                            ->maxLength(100)
                                            ->helperText('Customer full name'),

                                        TextInput::make('customer_title')
                                            ->maxLength(150)
                                            ->helperText('Job title and company'),
                                    ]),

                                FileUpload::make('customer_avatar')
                                    ->image()
                                    ->avatar()
                                    ->directory('testimonials/avatars')
                                    ->maxSize(1024)
                                    ->helperText('Customer photo (optional)'),

                                Textarea::make('testimonial_text')
                                    ->required()
                                    ->rows(4)
                                    ->maxLength(500)
                                    ->helperText('The testimonial content'),

                                Grid::make(3)
                                    ->schema([
                                        Select::make('rating')
                                            ->options([
                                                '1' => '1 Star',
                                                '2' => '2 Stars',
                                                '3' => '3 Stars',
                                                '4' => '4 Stars',
                                                '5' => '5 Stars',
                                            ])
                                            ->default('5')
                                            ->helperText('Star rating'),

                                        TextInput::make('project_name')
                                            ->maxLength(100)
                                            ->helperText('Related project (optional)'),

                                        Select::make('testimonial_type')
                                            ->options([
                                                'general' => 'General',
                                                'product' => 'Product Review',
                                                'service' => 'Service Review',
                                                'support' => 'Support Experience',
                                            ])
                                            ->default('general'),
                                    ]),
                            ])
                            ->minItems(1)
                            ->maxItems(6)
                            ->defaultItems(2)
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['customer_name'] ?? 'New Testimonial')
                            ->addActionLabel('Add Testimonial')
                            ->columnSpanFull(),
                    ]),

                Section::make('Display Options')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                Select::make('layout')
                                    ->options([
                                        'carousel' => 'Carousel',
                                        'grid' => 'Grid Layout',
                                        'masonry' => 'Masonry',
                                    ])
                                    ->default('carousel'),

                                Select::make('items_per_row')
                                    ->label('Items Per Row')
                                    ->options([
                                        '1' => '1 Column',
                                        '2' => '2 Columns',
                                        '3' => '3 Columns',
                                    ])
                                    ->default('2')
                                    ->visible(fn ($get) => $get('layout') === 'grid'),

                                Toggle::make('show_ratings')
                                    ->label('Show Star Ratings')
                                    ->default(true),
                            ]),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     * ANOTHER COMPLETELY DIFFERENT structure!
     */
    public static function mutateData(array $data): array
    {
        return [
            'section' => [
                'title' => $data['section_title'] ?? 'What Our Customers Say',
                'description' => $data['section_description'] ?? null,
            ],
            'testimonials' => collect($data['testimonials'] ?? [])
                ->map(function ($testimonial) {
                    return [
                        'customer' => [
                            'name' => $testimonial['customer_name'] ?? null,
                            'title' => $testimonial['customer_title'] ?? null,
                            'avatar' => $testimonial['customer_avatar'] ?? null,
                        ],
                        'content' => $testimonial['testimonial_text'] ?? null,
                        'rating' => (int) ($testimonial['rating'] ?? 5),
                        'meta' => [
                            'project' => $testimonial['project_name'] ?? null,
                            'type' => $testimonial['testimonial_type'] ?? 'general',
                        ],
                    ];
                })
                ->toArray(),
            'display' => [
                'layout' => $data['layout'] ?? 'carousel',
                'items_per_row' => (int) ($data['items_per_row'] ?? 2),
                'show_ratings' => (bool) ($data['show_ratings'] ?? true),
            ],
        ];
    }
}
