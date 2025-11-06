<?php

declare(strict_types=1);

namespace Modules\Blocks\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\Blocks\Console\DiscoverBlocksCommand;
use Modules\Blocks\Console\MakeBlockCommand;
use Modules\Blocks\Interfaces\BlockRegistry;
use Nwidart\Modules\Traits\PathNamespace;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

final class BlocksServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'Blocks';

    protected string $nameLower = 'blocks';

    /**
     * Boot the module.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();

        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));

        // 🧩 Auto-discover all blocks on boot
        $registry = app('blocks');
        
        if (app()->environment('production')) {
            $registry->loadManifest();
            
            // If manifest didn't load any blocks, fall back to auto-discovery
            if (empty($registry->all())) {
                \Log::warning('Block manifest was empty or missing, running auto-discovery');
                $registry->autoDiscover();
            }
        } else {
            $registry->autoDiscover();
        }
    }

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);

        // Register BlockRegistry as a singleton
        $this->app->singleton('blocks.registry', function () {
            return new BlockRegistry();
        });

        // Register facade accessor
        $this->app->bind('blocks', function ($app) {
            return $app['blocks.registry'];
        });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);
        $moduleLangPath = module_path($this->name, 'lang');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom($moduleLangPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($moduleLangPath);
        }
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes(
            [$sourcePath => $viewPath],
            ['views', $this->nameLower.'-module-views']
        );

        $this->loadViewsFrom(
            array_merge($this->getPublishableViewPaths(), [$sourcePath]),
            $this->nameLower
        );

        // Use explicit Modules namespace for components
        $moduleNamespace = 'Modules\\'.$this->name.'\\View\\Components';
        Blade::componentNamespace($moduleNamespace, $this->nameLower);
    }

    /**
     * Provided services.
     */
    public function provides(): array
    {
        return [];
    }

    /**
     * Register CLI commands.
     */
    private function registerCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeBlockCommand::class,
                DiscoverBlocksCommand::class,
            ]);
        }
    }

    /**
     * Register command schedules (optional).
     */
    private function registerCommandSchedules(): void
    {
        // Example: $schedule->command('inspire')->hourly();
    }

    /**
     * Register config files recursively.
     */
    private function registerConfig(): void
    {
        $configPath = module_path($this->name, 'config');

        if (! is_dir($configPath)) {
            return;
        }

        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $config = str_replace($configPath.DIRECTORY_SEPARATOR, '', $file->getPathname());
                $configKey = str_replace([DIRECTORY_SEPARATOR, '.php'], ['.', ''], $config);
                $segments = explode('.', $this->nameLower.'.'.$configKey);

                $normalized = [];
                foreach ($segments as $segment) {
                    if (end($normalized) !== $segment) {
                        $normalized[] = $segment;
                    }
                }

                $key = ($config === 'config.php')
                    ? $this->nameLower
                    : implode('.', $normalized);

                $this->publishes([$file->getPathname() => config_path($config)], 'config');
                $this->mergeConfigFromRecursive($file->getPathname(), $key);
            }
        }
    }

    /**
     * Recursive config merging helper.
     */
    private function mergeConfigFromRecursive(string $path, string $key): void
    {
        $existing = config($key, []);
        $moduleConfig = require $path;

        config([$key => array_replace_recursive($existing, $moduleConfig)]);
    }

    /**
     * Get publishable view paths.
     */
    private function getPublishableViewPaths(): array
    {
        $paths = [];

        foreach (config('view.paths') as $path) {
            $moduleViewPath = $path.'/modules/'.$this->nameLower;
            if (is_dir($moduleViewPath)) {
                $paths[] = $moduleViewPath;
            }
        }

        return $paths;
    }
}
