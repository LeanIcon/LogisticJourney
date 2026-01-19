<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.custom-login')]
final class Documentation extends Component
{
    /**
     * Returns the correct URL for the documentation page.
     */
    public static function docsUrl(): string
    {
        return url('/docs');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.documentation');
    }
}
