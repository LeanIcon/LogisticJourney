<?php

declare(strict_types=1);

namespace Modules\Blocks\Filament\Forms;

use Filament\Forms\Components\Builder;
use Modules\Blocks\Facades\Blocks;

final class BlockEditor
{
    public static function make(string $field = 'blocks'): Builder
    {
        // Keep the editor simple and reliable: use the registered block schemas
        // directly. We'll add richer code-editing features (open class file,
        // live-editing, previews) as a follow-up once the basics are stable.
        return Builder::make($field)
            ->blocks(Blocks::getSchemas())
            ->blockNumbers(false)
            ->collapsed()
            ->collapsible()
            ->cloneable()
            ->reorderable()
            ->addActionLabel('Add Block');
    }
}
