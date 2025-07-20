<?php

namespace App\Filament\Resources\NilaiResource\Pages;

use Livewire\Form;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\NilaiResource;

class EditNilai extends EditRecord
{
    protected static string $resource = NilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
{
    $data['nilai_akhir'] = round(
        ($data['nilai_harian'] ?? 0) * 0.3 +
        ($data['nilai_uts'] ?? 0) * 0.3 +
        ($data['nilai_uas'] ?? 0) * 0.4
    );

    return $data;
}
}
