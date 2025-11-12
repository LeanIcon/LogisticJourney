<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class ProblemBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'Problem';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 17;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-exclamation-triangle';

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
                            ->default('The Problem with Deliveries Today')
                            ->helperText('Main title')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->maxLength(300)
                            ->default("Without real-time visibility, your fleet becomes a silent money drain.\nHere's what it's costing you today")
                            ->helperText('Description text (supports line breaks)')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),

                Section::make('Problem Items')
                    ->description('Add up to 4 problem items with icon, title and description')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('problem_1_title')
                                    ->label('Problem 1 Title')
                                    ->maxLength(50)
                                    ->default('Failed Deliveries'),

                                Textarea::make('problem_1_description')
                                    ->label('Problem 1 Description')
                                    ->maxLength(150)
                                    ->default('Wasted trips and unhappy customers')
                                    ->rows(2),

                                TextInput::make('problem_2_title')
                                    ->label('Problem 2 Title')
                                    ->maxLength(50)
                                    ->default('Lack of Visibility'),

                                Textarea::make('problem_2_description')
                                    ->label('Problem 2 Description')
                                    ->maxLength(150)
                                    ->default('Blind once drivers leave depot')
                                    ->rows(2),

                                TextInput::make('problem_3_title')
                                    ->label('Problem 3 Title')
                                    ->maxLength(50)
                                    ->default('Manual Chaos'),

                                Textarea::make('problem_3_description')
                                    ->label('Problem 3 Description')
                                    ->maxLength(150)
                                    ->default('Paper, Excel and errors everywhere')
                                    ->rows(2),

                                TextInput::make('problem_4_title')
                                    ->label('Problem 4 Title')
                                    ->maxLength(50)
                                    ->default('Fuel Cost'),

                                Textarea::make('problem_4_description')
                                    ->label('Problem 4 Description')
                                    ->maxLength(150)
                                    ->default('Inefficient routes burn 20-30% more fuel.')
                                    ->rows(2),
                            ]),
                    ]),

                Section::make('Side Image')
                    ->schema([
                        FileUpload::make('side_image')
                            ->image()
                            ->directory('problem-block-images')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->helperText('Image to display on the left side (max 2MB)'),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     */
    public static function mutateData(array $data): array
    {
        $problems = [];
        for ($i = 1; $i <= 4; $i++) {
            $titleKey = "problem_{$i}_title";
            $descKey = "problem_{$i}_description";
            if (!empty($data[$titleKey])) {
                $problems[] = [
                    'title' => $data[$titleKey],
                    'description' => $data[$descKey] ?? '',
                ];
            }
        }

        return [
            'title' => $data['title'] ?? null,
            'description' => $data['description'] ?? null,
            'problems' => $problems,
            'side_image' => $data['side_image'] ?? null,
        ];
    }
}
