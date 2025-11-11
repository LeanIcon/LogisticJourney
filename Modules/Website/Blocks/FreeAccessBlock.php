<?php

declare(strict_types=1);

namespace Modules\Website\Blocks;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;
use Modules\Blocks\Interfaces\Block as BlockTrait;

final class FreeAccessBlock
{
    use BlockTrait;

    /**
     * Unique identifier for the block (short name used in the builder).
     */
    protected static string $name = 'FreeAccess';

    /**
     * Icon for the builder palette.
     */
    protected static ?string $icon = 'heroicon-o-envelope';

    /**
     * Keep this block API-only (returned via the blocks API).
     */
    protected static bool $apiOnly = true;

    /**
     * Group label shown in the block builder UI.
     */
    protected static string $group = 'Request a demo';

    /**
     * Sort index for dashboard ordering (lower appears first).
     */
    protected static int $sortIndex = 9;

    public static function schema(): BuilderBlock
    {
        return self::make()
            ->schema([
                Section::make('Request a demo')
                    ->description('Compact demo request CTA with email capture and a single button')
                    ->schema([
                        TextInput::make('headline')
                            ->label('Headline')
                            ->default('Not ready for demo? Get access to free account')
                            ->required()
                            ->maxLength(300)
                            ->columnSpanFull(),

                        Textarea::make('subheadline')
                            ->label('Subheadline / Description')
                            ->helperText('Short explanatory text shown under the headline')
                            ->rows(2)
                            ->maxLength(500),

                        TextInput::make('button_text')
                            ->label('Link button text')
                            ->default('support@logisticjourney.com')
                            ->maxLength(100),
                    ]),
            ]);
    }

    public static function mutateData(array $data): array
    {

        return [
            'headline' => $data['headline'] ?? null,
            'subheadline' => $data['subheadline'] ?? null,
            'button_text' => $data['button_text'] ?? 'support@logisticjourney.com',
        ];
    }
}
