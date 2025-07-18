<x-filament-panels::page>
    
<form wire:submit.prevent="submit" class="space-y-4">
        {{ $this->form }}

        <x-filament::button type="submit" color="primary">
            Simpan
        </x-filament::button>
        <x-filament::button 
        tag="a"
        style="margin-left: 8px"
        href="{{ route('filament.dashboard.resources.nilais.index') }}"
        color="gray">
        Batal
        </x-filament::button>
</x-filament-panels::page>
