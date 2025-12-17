<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Livewire\Component;

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
        // Use the custom-login layout for consistent styling and to avoid layout errors
        return view('livewire.admin.documentation')
            ->layout('layouts.custom-login');
    }
}
