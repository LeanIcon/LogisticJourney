<?php

declare(strict_types=1);

namespace Modules\Blocks\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Blocks\Interfaces\BlockRegistry;
use Modules\Blocks\Models\Block;

trait HasBlocks
{
    /**
     * Polymorphic relationship for blocks.
     */
    public function blocks(): MorphMany
    {
        return $this->morphMany(Block::class, 'blockable')->orderBy('order');
    }

    /**
     * Get resolved block data through the BlockRegistry.
     */
    public function resolvedBlocks(): array
    {
        return app('blocks')->resolveBlocks(
            $this->blocks->map(fn ($b) => [
                'type' => $b->type,
                'data' => $b->data,
            ])->toArray()
        );
    }

    /**
     * Helper for fetching raw blocks (without resolving).
     */
    public function getBlocks(): array
    {
        return $this->blocks->map(fn ($b) => [
            'type' => $b->type,
            'data' => $b->data,
            'order' => $b->order,
        ])->toArray();
    }

    /**
     * Helper for adding new blocks easily.
     */
    public function addBlock(string $type, array $data = [], int $order = 0): Block
    {
        return $this->blocks()->create([
            'type' => $type,
            'data' => $data,
            'order' => $order,
        ]);
    }
}
