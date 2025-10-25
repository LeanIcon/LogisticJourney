<?php

namespace Modules\Blocks\Interfaces;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Filament\Forms\Components\Builder;


class BlockRegistry
{
    /**
     * All discovered block classes.
     */
    protected array $blocks = [];

    /**
     * Manually register a block class.
     */
    public function register(string $class): void
    {
        if (is_subclass_of($class, Block::class)) {
            $name = $class::getName();
            $this->blocks[$name] = $class;
        }
    }

    /**
     * Return all registered blocks.
     */
    public function all(): array
    {
        if (empty($this->blocks)) {
            $this->autoDiscover();
        }

        return $this->blocks;
    }

    /**
     * Return Filament Builder-compatible schemas.
     */
    public function getSchemas(): array
    {
        return collect($this->blocks)
            ->map(fn ($class) => $class::schema())
            ->values()
            ->toArray();
    }

    /**
     * Resolve block data with type-bound mutations.
     */
    public function resolveBlocks(array $rawBlocks): array
    {
        return collect($rawBlocks)
            ->map(function ($block) {
                $class = $this->blocks[$block['type']] ?? null;

                if (! $class) {
                    return $block;
                }

                $block['data'] = $class::mutateData($block['data'] ?? []);
                return $block;
            })
            ->all();
    }

    /**
     * Automatically discover blocks across all modules.
     */
    public function autoDiscover(bool $writeManifest = false): void
    {
        // Collect all potential block locations
        $paths = collect([
            // Root application blocks
            app_path('Blocks'),

            // Module blocks in standard location
            ...collect(File::directories(base_path('Modules')))
                ->map(fn ($dir) => $dir . '/Blocks')
                ->all(),

            // Module blocks in src/Blocks
            ...collect(File::directories(base_path('Modules')))
                ->map(fn ($dir) => $dir . '/src/Blocks')
                ->all(),

            // Module blocks in resources/blocks
            ...collect(File::directories(base_path('Modules')))
                ->map(fn ($dir) => $dir . '/resources/blocks')
                ->all(),
        ])
        ->filter(fn ($dir) => is_dir($dir))
        ->unique()
        ->toArray();

        $discovered = [];

        foreach ($paths as $path) {
            foreach (File::allFiles($path) as $file) {
                $class = self::classFromPath($file->getPathname());

                if (! $class) {
                    continue;
                }

                // If the class isn't autoloadable by Composer, try requiring the file
                if (! class_exists($class)) {
                    try {
                        require_once $file->getPathname();
                    } catch (\Throwable $e) {
                        // If including the file fails silently continue to next
                        continue;
                    }
                }

                if (is_subclass_of($class, Block::class)) {
                    // Register the block
                    $this->register($class);

                    // Call boot method if exists
                    if (method_exists($class, 'boot')) {
                        $class::boot();
                    }

                    // Record discovery information
                    $discovered[$class] = [
                        'name' => $class::getName(),
                        'path' => $file->getPathname(),
                        'module' => self::determineModuleFromPath($path),
                    ];
                }
            }
        }

        if ($writeManifest && !empty($discovered)) {
            File::ensureDirectoryExists(storage_path('app'));
            File::put(
                storage_path('app/blocks_manifest.json'),
                json_encode($discovered, JSON_PRETTY_PRINT)
            );
        }
    }

    /**
     * Load registered blocks from manifest cache.
     */
    public function loadManifest(): void
    {
        $manifest = storage_path('app/blocks_manifest.json');

        if (! File::exists($manifest)) {
            return;
        }

        $data = json_decode(File::get($manifest), true) ?? [];

        foreach (array_keys($data) as $class) {
            if (class_exists($class)) {
                $this->register($class);
            }
        }
    }

    /**
     * Derive class name from file contents.
     */
    protected static function classFromPath(string $path): ?string
    {
        $contents = file_get_contents($path);

        if (!preg_match('/namespace\s+([^;]+);/', $contents, $ns)) return null;
        if (!preg_match('/class\s+(\w+)/', $contents, $cls)) return null;

        return $ns[1] . '\\' . $cls[1];
    }

    /**
     * Determine the module name from a path.
     */
    protected static function determineModuleFromPath(string $path): string
    {
        // Check if path is in app/Blocks
        if (str_starts_with($path, app_path('Blocks'))) {
            return 'App';
        }

        // Extract module name from Modules directory path
        $modulesPath = base_path('Modules');
        if (str_starts_with($path, $modulesPath)) {
            $relativePath = Str::after($path, $modulesPath . '/');
            return explode('/', $relativePath)[0];
        }

        return 'Unknown';
    }
}
