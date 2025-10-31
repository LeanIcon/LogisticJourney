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
        $this->info('🔍 Discovering all blocks...');
        $registry = app('blocks');
        $registry->autoDiscover(true);
        $count = count($registry->all());
        $this->info("✅ Discovered {$count} blocks. Manifest updated at: storage/app/blocks_manifest.json");

        return self::SUCCESS;
    }

    /**
     * Get the console command arguments.
     */
    // ...existing code...
}
