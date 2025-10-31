<?php

declare(strict_types=1);

namespace Modules\Blocks\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Modules\Blocks\Interfaces\BlockRegistry;

final class MakeBlockCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'make:block {name}
        {--module= : The module name (optional)}
        {--view : Also create a Blade view for this block}';

    /**
     * The console command description.
     */
    protected $description = 'Create a new Block class (optionally inside a module or with a view)';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int {
        $name = Str::studly($this->argument('name'));
        $module = $this->option('module');
        $createView = $this->option('view');

        // Determine base path and namespace
        $basePath = $module
            ? base_path("Modules/{$module}/Blocks")
            : app_path('Blocks');

        $namespace = $module
            ? "Modules\\{$module}\\Blocks"
            : "App\\Blocks";

        File::ensureDirectoryExists($basePath);

        // Choose correct stub
        $stubPath = module_path('Blocks', 'Stubs/' . ($createView ? 'block-with-view.stub' : 'block.stub'));
        $stub = File::get($stubPath);

        // Prepare replacements
        $replacements = [
            '{{ namespace }}' => $namespace,
            '{{ class }}' => $name,
            '{{ name }}' => $name,
            '{{ view }}' => Str::kebab($name),
        ];

        $contents = str_replace(array_keys($replacements), array_values($replacements), $stub);
        $filePath = "{$basePath}/{$name}.php";

        if (File::exists($filePath)) {
            $this->error("❌ Block {$name} already exists!");
            return self::FAILURE;
        }

        File::put($filePath, $contents);
        $this->info("✅ Block created: {$filePath}");

        // Create view if requested
        if ($createView) {
            $viewDir = $module
                ? base_path("Modules/{$module}/resources/views/blocks")
                : resource_path('views/blocks');

            File::ensureDirectoryExists($viewDir);

            $viewPath = "{$viewDir}/" . Str::kebab($name) . ".blade.php";
            File::put($viewPath, '<div>{{ $data["title"] ?? "Default Title" }}</div>');
            $this->info("🖼️ View created: {$viewPath}");
        }

        // Always refresh manifest after block creation
        app('blocks')->autoDiscover(true);
        $this->info("📦 Blocks manifest refreshed.");

        return self::SUCCESS;
    }


    /**
     * Get the console command arguments.
     */
    // ...existing code...
}
