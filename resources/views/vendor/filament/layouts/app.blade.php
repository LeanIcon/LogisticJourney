@php
    use Filament\Facades\Filament;
    $user = Filament::auth()->user();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logistic Journey Admin</title>
    @vite('resources/css/app.css')
    @filamentStyles
    @livewireStyles
</head>
<body class="min-h-screen antialiased bg-gradient-to-br from-slate-50 to-white flex">
    <x-filament::sidebar />
    <main class="flex-1">
        {{ $slot }}
    </main>
    @filamentScripts
    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
