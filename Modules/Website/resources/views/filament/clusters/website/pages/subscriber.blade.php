<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Stats Section --}}
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <x-filament::section>
                <div class="text-center">
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ \Modules\Website\Models\Subscriber::where('status', 'active')->count() }}
                    </div>
                    <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Active Subscribers
                    </div>
                </div>
            </x-filament::section>

            <x-filament::section>
                <div class="text-center">
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ \Modules\Website\Models\Subscriber::where('is_verified', true)->count() }}
                    </div>
                    <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Verified Subscribers
                    </div>
                </div>
            </x-filament::section>

            <x-filament::section>
                <div class="text-center">
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ \Modules\Website\Models\Subscriber::where('status', 'pending')->count() }}
                    </div>
                    <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Pending Verification
                    </div>
                </div>
            </x-filament::section>

            <x-filament::section>
                <div class="text-center">
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">
                        {{ \Modules\Website\Models\Subscriber::whereDate('subscribed_at', '>=', now()->subDays(30))->count() }}
                    </div>
                    <div class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Last 30 Days
                    </div>
                </div>
            </x-filament::section>
        </div>

        {{-- Table Section --}}
        <x-filament::section>
            {{ $this->table }}
        </x-filament::section>
    </div>
</x-filament-panels::page>

