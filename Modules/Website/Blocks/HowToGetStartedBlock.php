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

final class HowToGetStartedBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'GetStarted';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 22;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-arrow-path';

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
                        TextInput::make('tag')
                            ->label('Tag')
                            ->maxLength(50)
                            ->default('How it works')
                            ->helperText('Small tag above title'),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(100)
                            ->default('How To Get Started With Logistics Journey')
                            ->helperText('Main title')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->maxLength(300)
                            ->default('From setup to delivery, we make logistics simple, smart, and efficient. Get started in minutes and manage your entire operation with ease.')
                            ->helperText('Description text')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),

                Section::make('Steps Timeline')
                    ->description('Configure the 5 steps in the process')
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                TextInput::make('step_1_title')
                                    ->label('Step 1 Title')
                                    ->maxLength(50)
                                    ->default('Contact')
                                    ->columnSpanFull(),

                                Textarea::make('step_1_description')
                                    ->label('Step 1 Description')
                                    ->maxLength(200)
                                    ->default('Send us an email to show your interest.')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                TextInput::make('step_2_title')
                                    ->label('Step 2 Title')
                                    ->maxLength(50)
                                    ->default('Access')
                                    ->columnSpanFull(),

                                Textarea::make('step_2_description')
                                    ->label('Step 2 Description')
                                    ->maxLength(200)
                                    ->default('Gain access to your Logistic Journey account and dashboard.')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                TextInput::make('step_3_title')
                                    ->label('Step 3 Title')
                                    ->maxLength(50)
                                    ->default('Setup')
                                    ->columnSpanFull(),

                                Textarea::make('step_3_description')
                                    ->label('Step 3 Description')
                                    ->maxLength(200)
                                    ->default('Configure your fleet and team preferences to match your operations.')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                TextInput::make('step_4_title')
                                    ->label('Step 4 Title')
                                    ->maxLength(50)
                                    ->default('Orders')
                                    ->columnSpanFull(),

                                Textarea::make('step_4_description')
                                    ->label('Step 4 Description')
                                    ->maxLength(200)
                                    ->default('Start creating and managing delivery orders in the system.')
                                    ->rows(2)
                                    ->columnSpanFull(),

                                TextInput::make('step_5_title')
                                    ->label('Step 5 Title')
                                    ->maxLength(50)
                                    ->default('Delivery')
                                    ->columnSpanFull(),

                                Textarea::make('step_5_description')
                                    ->label('Step 5 Description')
                                    ->maxLength(200)
                                    ->default('Track deliveries in real-time and optimize your operations.')
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
        $steps = [];
        for ($i = 1; $i <= 5; $i++) {
            $titleKey = "step_{$i}_title";
            $descKey = "step_{$i}_description";
            if (!empty($data[$titleKey])) {
                $steps[] = [
                    'number' => $i,
                    'title' => $data[$titleKey],
                    'description' => $data[$descKey] ?? '',
                ];
            }
        }

        return [
            'tag' => $data['tag'] ?? 'How it works',
            'title' => $data['title'] ?? null,
            'description' => $data['description'] ?? null,
            'steps' => $steps
        ];
    }
}
