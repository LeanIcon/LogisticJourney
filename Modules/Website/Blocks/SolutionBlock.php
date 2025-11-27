<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class SolutionBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'Solution';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 18;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-light-bulb';

    /**
     * Get the block's schema for Filament's form builder.
     */
    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Section Header')
                    ->description('Configure the section title and description')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(100)
                            ->default('The Logistic Journey Solution')
                            ->helperText('Main title')
                            ->columnSpanFull(),

                        TextInput::make('subtitle')
                            ->maxLength(200)
                            ->default('From failed deliveries to full control — here\'s how we help teams move smarter.')
                            ->helperText('Subtitle/description text')
                            ->columnSpanFull(),
                    ]),

                Section::make('Solution Cards')
                    ->description('Add up to 3 solution cards with image, title, and description')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                FileUpload::make('card_1_image')
                                    ->label('Card 1 Image')
                                    ->image()
                                    ->directory('solution-card-images')
                                    ->imageEditor()
                                    ->maxSize(1024)
                                    ->helperText('Card 1 image (max 1MB)')
                                    ->columnSpanFull(),

                                TextInput::make('card_1_title')
                                    ->label('Card 1 Title')
                                    ->maxLength(80)
                                    ->default('Route optimisation, customer ETA\'s, instant proof of delivery')
                                    ->columnSpanFull(),

                                Textarea::make('card_1_description')
                                    ->label('Card 1 Description')
                                    ->maxLength(150)
                                    ->default('More first time success, fewer wasted trips')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                FileUpload::make('card_2_image')
                                    ->label('Card 2 Image')
                                    ->image()
                                    ->directory('solution-card-images')
                                    ->imageEditor()
                                    ->maxSize(1024)
                                    ->helperText('Card 2 image (max 1MB)')
                                    ->columnSpanFull(),

                                TextInput::make('card_2_title')
                                    ->label('Card 2 Title')
                                    ->maxLength(80)
                                    ->default('Live tracking, digital trip sheets, real-time reporting')
                                    ->columnSpanFull(),

                                Textarea::make('card_2_description')
                                    ->label('Card 2 Description')
                                    ->maxLength(150)
                                    ->default('Complete visibility from depot to destination')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                FileUpload::make('card_3_image')
                                    ->label('Card 3 Image')
                                    ->image()
                                    ->directory('solution-card-images')
                                    ->imageEditor()
                                    ->maxSize(1024)
                                    ->helperText('Card 3 image (max 1MB)')
                                    ->columnSpanFull(),

                                TextInput::make('card_3_title')
                                    ->label('Card 3 Title')
                                    ->maxLength(80)
                                    ->default('Digital orders, automated planning, instant PODs, analytics')
                                    ->columnSpanFull(),

                                Textarea::make('card_3_description')
                                    ->label('Card 3 Description')
                                    ->maxLength(150)
                                    ->default('Fewer errors, faster decisions, efficient operations')
                                    ->rows(2)
                                    ->columnSpanFull(),
                            ]),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     */
    public static function mutateData(array $data): array
    {
        $cards = [];
        for ($i = 1; $i <= 3; $i++) {
            $imageKey = "card_{$i}_image";
            $titleKey = "card_{$i}_title";
            $descKey = "card_{$i}_description";
            if (!empty($data[$titleKey])) {
                $cards[] = [
                    'icon' => !empty($data[$imageKey]) ? url('storage/' . $data[$imageKey]) : null,
                    'title' => $data[$titleKey],
                    'description' => $data[$descKey] ?? '',
                ];
            }
        }

        return [
            'title' => $data['title'] ?? null,
            'subtitle' => $data['subtitle'] ?? null,
            'cards' => $cards,
        ];
    }
}