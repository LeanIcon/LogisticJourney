<?php

declare(strict_types=1);

namespace Modules\Blocks\Interfaces;

use Filament\Forms\Components\Builder\Block as BuilderBlock;
use Modules\Website\Models\Page;

use function array_key_exists;
use function class_basename;
use function constant;
use function defined;
use function get_class_vars;
use function is_string;
use function preg_replace;

trait Block
{
    // /**
    //  * Define the Filament builder schema for this block.
    //  */
    /**
     * Every Block must provide a Filament Builder schema.
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
        // Prefer NAME constant if defined
        if (defined(static::class.'::NAME')) {
            $const = constant(static::class.'::NAME');
            if (is_string($const) && $const !== '') {
                return $const;
            }
        }

        // Fall back to a static property if it exists (without directly referencing it)
        $vars = get_class_vars(static::class);
        if (array_key_exists('name', $vars) && is_string($vars['name']) && $vars['name'] !== '') {
            return $vars['name'];
        }

        // Sensible default: kebab-case of class basename without trailing 'Block'
        $short = class_basename(static::class);
        $short = preg_replace('/Block$/', '', $short) ?? $short;

        return (string) str($short)->kebab();
    }

    public static function getView(): ?string
    {
        // Support VIEW constant or property
        if (defined(static::class.'::VIEW')) {
            $const = constant(static::class.'::VIEW');
            if (is_string($const) && $const !== '') {
                return $const;
            }
        }

        $vars = get_class_vars(static::class);

        return array_key_exists('view', $vars) ? ($vars['view'] ?? null) : null;
    }

    public static function isApiOnly(): bool
    {
        if (defined(static::class.'::API_ONLY')) {
            return (bool) constant(static::class.'::API_ONLY');
        }

        $vars = get_class_vars(static::class);

        return array_key_exists('apiOnly', $vars) ? (bool) ($vars['apiOnly'] ?? false) : false;
    }

    public static function getIcon(): ?string
    {
        if (defined(static::class.'::ICON')) {
            $const = constant(static::class.'::ICON');
            if (is_string($const) && $const !== '') {
                return $const;
            }
        }

        $vars = get_class_vars(static::class);

        return array_key_exists('icon', $vars) ? ($vars['icon'] ?? null) : null;
    }

    /**
     * Base factory for Filament BuilderBlock.
     */
    protected static function make(): BuilderBlock
    {
        // Ensure we pass a plain string to the translator / label
        $label = (string) str(static::getName())->headline();

        return BuilderBlock::make(static::getName())
            ->icon(static::getIcon())
            ->label(__($label));
    }
}
