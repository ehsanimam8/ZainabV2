<x-filament-panels::page>
    <form wire:submit="sendCampaign">
        {{ $this->form }}

        <div class="mt-4 flex justify-end">
            <x-filament::button type="submit" size="lg">
                Dispatch Campaign
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
