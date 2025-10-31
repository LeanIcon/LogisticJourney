<?php

declare(strict_types=1);

arch()->preset()->php();
arch()->preset()->security();

// Custom strict rules - excluding Filament framework patterns
arch('strict types')
    ->expect('App')
    ->toUseStrictTypes()
    ->and('Modules')
    ->toUseStrictTypes();

arch('final classes')
    ->expect('App')
    ->classes()
    ->not->toBeAbstract()
    ->not->toBeInterface()
    ->toBeFinal()
    ->and('Modules')
    ->classes()
    ->not->toBeAbstract()
    ->not->toBeInterface()
    ->ignoring('Modules\*\Filament\Actions\*')  // Filament Actions use protected setUp()
    ->ignoring('Modules\*\Filament\Resources\*\Pages\*')  // Filament Pages may use protected
    ->toBeFinal();

arch('controllers')
    ->expect('App\Http\Controllers')
    ->not->toBeUsed();

//
