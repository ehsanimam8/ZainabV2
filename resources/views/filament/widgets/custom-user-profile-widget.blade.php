<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center gap-x-4">
            <x-filament-panels::avatar.user size="lg" :user="auth()->user()" />
            <div class="flex-1">
                <h2 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white" style="font-family: 'Playfair Display', serif;">
                    Welcome back, {{ auth()->user()->name }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ auth()->user()->email }} &bull; {{ auth()->user()->roles->pluck('name')->join(', ') }}
                </p>
            </div>
            <div>
                <!-- Assuming there is a profile edit route, normally Filament has personal plugins but we'll use a placeholder or safe link -->
                <x-filament::button href="/admin" tag="a" color="primary">
                    Dashboard Home
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
