@php
    $currentRoute = request()->route()->getName();
@endphp

<aside class="w-64 bg-[#052148] text-white flex flex-col py-8 px-6 shadow-lg min-h-screen">
    <div class="flex items-center gap-3 mb-10">
        <img src="{{ asset('images/LogisticsJourneyLogo.png') }}" alt="Logo" class="object-contain w-8 h-8">
        <span class="text-lg font-bold tracking-tight">Admin</span>
    </div>
    <nav class="flex-1">
        <ul class="space-y-2">
            <x-filament::sidebar-link
                :active="$currentRoute === 'filament.admin.pages.dashboard'"
                url="{{ route('filament.admin.pages.dashboard') }}"
                :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'#ff751f\' class=\'w-4 h-4\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6\'/></svg>'"
                label="Dashboard"
            />
            <!-- Add other sidebar links here as needed -->
            <x-filament::sidebar-link
                :active="$currentRoute === 'admin.docs'"
                url="{{ route('admin.docs') }}"
                :icon="'<svg xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'#ff751f\' class=\'w-4 h-4\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25\'/></svg>'"
                label="Docs"
            />
        </ul>
    </nav>
</aside>
