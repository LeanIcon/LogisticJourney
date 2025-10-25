<?php

namespace Modules\Blocks\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Blocks\Interfaces\BlockRegistry;

/**
 * @method static array all()
 * @method static array getSchemas()
 * @method static void register(string $class)
 * @method static array resolveBlocks(array $rawBlocks)
 * @method static void autoDiscover(bool $writeManifest = false)
 * @method static void loadManifest()
 *
 * @see \Modules\Blocks\Interfaces\BlockRegistry
 */
class Blocks extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'blocks';
    }
}
