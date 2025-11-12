<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Section;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class FeaturesHeroBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block.
     */
    protected static string $name = 'FeaturesHero';

    /**
     * Icon for the builder palette.
     */
    protected static ?string $icon = 'heroicon-o-star';

    /**
     * Keep this block API-only (returned via the blocks API).
     */
    protected static bool $apiOnly = true;

    /**
     * Group label shown in the block builder UI.
     */
    protected static string $group = 'Features Page';

    /**
     * Sort index for dashboard ordering.
     */
    protected static int $sortIndex = 11;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Features Hero Section')
                    ->description('Header for features page: eyebrow tag, headline (with color highlight support), subheadline, and two CTA buttons')
                    ->schema([
                        TextInput::make('title')
                            ->label('Title')
                            ->default('Features')
                            ->maxLength(100)
                            ->helperText('Small tag above the headline, e.g. "Features"'),

                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Smarter Routes. Happier Clients. Lower Costs!')
                            ->required()
                            ->maxLength(500)
                            ->columnSpanFull()
                            ->helperText('Main headline. Wrap words in square brackets [word] to highlight them in blue, e.g., "Lower [Costs]!"'),

                        Textarea::make('subheadline')
                            ->label('Subheadline / Description')
                            ->default('Logistic Journey gives you real-time tracking, smart route planning, and advanced reporting – so you save money and deliver on time, every time.')
                            ->rows(3)
                            ->maxLength(1000)
                            ->columnSpanFull(),

                        Section::make('Primary Button')
                            ->schema([
                                TextInput::make('button_primary_text')
                                    ->label('Button text')
                                    ->default('Book a Demo')
                                    ->maxLength(100),
                            ])
                            ->columns(2),

                        Section::make('Secondary Button')
                            ->description('Optional outline/secondary button')
                            ->schema([
                                TextInput::make('button_secondary_text')
                                    ->label('Button text')
                                    ->default('Talk to Our Team')
                                    ->maxLength(100),
                            ])
                            ->columns(2)
                            ->collapsed(),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {
        // Parse headline to replace [word] with highlighted version
        $headline = $data['headline'] ?? '';
        $highlightedHeadline = self::parseHighlight($headline);

        return [
            'title' => $data['title'] ?? 'Features',
            'headline' => $headline,
            'headline_parsed' => $highlightedHeadline, // For frontend to render highlighted text
            'subheadline' => $data['subheadline'] ?? null,
            'buttons' => [
                'primary' => [
                    'text' => $data['button_primary_text'] ?? 'Book a Demo',
                ],
                'secondary' => [
                    'text' => $data['button_secondary_text'] ?? 'Talk to Our Team',
                ],
            ],
        ];
    }

    /**
     * Parse [word] syntax to create highlighted segments.
     * Returns an array of segments: [{ text: 'word', highlighted: true/false }, ...]
     */
    private static function parseHighlight(string $text): array
    {
        $segments = [];
        $pattern = '/\[([^\]]+)\]|([^\[]+)/';

        preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            if (!empty($match[1])) {
                // Highlighted text (inside brackets)
                $segments[] = [
                    'text' => $match[1],
                    'highlighted' => true,
                ];
            } elseif (!empty($match[2])) {
                // Normal text
                $segments[] = [
                    'text' => $match[2],
                    'highlighted' => false,
                ];
            }
        }

        return $segments;
    }
}
