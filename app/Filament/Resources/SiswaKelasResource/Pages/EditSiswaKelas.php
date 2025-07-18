<?php

namespace App\Filament\Resources\SiswaKelasResource\Pages;

use App\Filament\Resources\SiswaKelasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSiswaKelas extends EditRecord
{
    protected static string $resource = SiswaKelasResource::class;

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

}
