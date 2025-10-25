<?php

namespace Modules\Blocks\Interfaces;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Modules\Website\Models\Page;

abstract class Block
{
    /**
     * The unique identifier for the block (slug-like name).
     */
    protected static string $name = '';

    /**
     * Optional Blade view name for front-end rendering.
     */
    protected static ?string $view = null;

    /**
     * Indicates if this block is API-only (no Blade view).
     */
    protected static bool $apiOnly = false;

    /**
     * Optional icon for Filament builder display.
     */
    protected static ?string $icon = null;

    /**
     * Base factory for Filament BuilderBlock.
     */
    protected static function make(): BuilderBlock
    {
        // Ensure we pass a plain string to the translator / label
        $label = (string) str(static::getName())->headline();

        return BuilderBlock::make(static::getName())
            ->icon(static::$icon)
            ->label(__($label));
    }

    /**
     * Define the Filament builder schema for this block.
     */
    abstract public static function schema(): BuilderBlock;

    /**
     * Mutate block data before rendering or API response.
     */
    public static function mutateData(array $data): array
    {
        return $data;
    }

    /**
     * Optionally preload related data for multiple blocks of this type.
     */
    public static function preloadRelatedData(Page $page, array &$blocks): void
    {
        // e.g., eager-load related models, etc.
    }

    /**
     * Helpers.
     */
    public static function getName(): string
    {
        return static::$name;
    }

    public static function getView(): ?string
    {
        return static::$view;
    }

    public static function isApiOnly(): bool
    {
        return static::$apiOnly;
    }

    public static function getIcon(): ?string
    {
        return static::$icon;
    }
}
