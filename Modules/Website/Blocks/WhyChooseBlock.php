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

final class WhyChooseBlock
{
    use BlockTrait;

    /**
     * The block's unique identifier.
     */
    protected static string $name = 'WhyChoose';

    /**
     * The block's group.
     */
    protected static string $group = 'Homepage';

    /**
     * The block's sort index.
     */
    protected static int $sortIndex = 19;

    /**
     * Whether this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = true;

    /**
     * Icon for this block type.
     */
    protected static ?string $icon = 'heroicon-o-check-circle';

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
                            ->default('Why Choose Logistic Journey')
                            ->helperText('Main title')
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->maxLength(300)
                            ->default('Discover how Logistic Journey can help optimize your fleet management and improve business operations.')
                            ->helperText('Subtitle/description text')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),

                Section::make('Feature Image')
                    ->description('Dashboard/application screenshot')
                    ->schema([
                        FileUpload::make('feature_image')
                            ->image()
                            ->directory('why-choose-block-images')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->helperText('Feature image showing the dashboard (max 2MB)'),
                    ]),

                Section::make('Benefits - Top Row')
                    ->description('First two benefit items')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('benefit_1_title')
                                    ->label('Benefit 1 Title')
                                    ->maxLength(100)
                                    ->default('Reduce wasted trips and costs'),

                                TextInput::make('benefit_2_title')
                                    ->label('Benefit 2 Title')
                                    ->maxLength(100)
                                    ->default('Delight Customers with reliable service'),
                            ]),
                    ]),

                Section::make('Benefits - Bottom Row')
                    ->description('Second two benefit items')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('benefit_3_title')
                                    ->label('Benefit 3 Title')
                                    ->maxLength(100)
                                    ->default('Give managers real time control'),

                                TextInput::make('benefit_4_title')
                                    ->label('Benefit 4 Title')
                                    ->maxLength(100)
                                    ->default('Replace chaos with streamlined workflow'),
                            ]),
                    ]),
            ]);
    }

    /**
     * Transform block data before API response.
     */
    public static function mutateData(array $data): array
    {
        $benefits = [];
        for ($i = 1; $i <= 4; $i++) {
            $titleKey = "benefit_{$i}_title";
            if (!empty($data[$titleKey])) {
                $benefits[] = [
                    'title' => $data[$titleKey],
                ];
            }
        }

        return [
            'title' => $data['title'] ?? null,
            'description' => $data['description'] ?? null,
            'feature_image' => !empty($data['feature_image']) ? url('storage/' . $data['feature_image']) : null,
            'benefits' => $benefits,
        ];
    }
}
