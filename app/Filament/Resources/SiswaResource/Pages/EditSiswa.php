<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Models\Siswa;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\SiswaResource;

class EditSiswa extends EditRecord
{
    protected static string $resource = SiswaResource::class;

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
        if (Siswa::where('nis', $data['nis'])->where('id', '!=', $this->record->id)->exists()) {
            Notification::make()
                ->title('NIS sudah terdaftar')
                ->danger()
                ->persistent()
                ->send();

            // Batalkan update
            $this->halt();
        }

        return $data;
    }
    
}
