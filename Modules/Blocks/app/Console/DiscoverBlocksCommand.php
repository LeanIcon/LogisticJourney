<?php

declare(strict_types=1);

namespace Modules\Blocks\Console;

use Illuminate\Console\Command;

final class DiscoverBlocksCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'blocks:discover';

    /**
     * The console command description.
     */
    protected $description = 'Discover all available blocks and regenerate the manifest cache';

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
    public function handle(): int
    {
        $registry = app('blocks');
        
        $this->info('Discovering blocks...');
        
        // Pass true to write the manifest
        $registry->autoDiscover(writeManifest: true);
        
        $blocks = $registry->all();
        
        $this->info('Discovered ' . count($blocks) . ' blocks:');
        
        foreach ($blocks as $name => $class) {
            $this->line("  - {$name} ({$class})");
        }
        
        $this->info('Manifest written to: ' . storage_path('app/blocks_manifest.json'));
        
        return self::SUCCESS;
    }

    /**
     * Get the console command arguments.
     */
    // ...existing code...
}
