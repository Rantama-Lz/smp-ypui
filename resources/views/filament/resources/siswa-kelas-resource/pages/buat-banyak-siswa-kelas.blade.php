<x-filament-panels::page>
    
        <form wire:submit.prevent="createSiswaKelas" class="space-y-4">
        {{ $this->form }}

        <x-filament::button type="submit" color="primary">
            Buat
        </x-filament::button>
        <x-filament::button 
        tag="a"
        style="margin-left: 8px"
        href="{{ route('filament.dashboard.resources.siswa-kelas.index') }}"
        color="gray">
        Batal
        </x-filament::button>
    </form>
</x-filament-panels::page>
