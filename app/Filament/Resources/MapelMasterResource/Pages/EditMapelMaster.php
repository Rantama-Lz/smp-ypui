<?php

namespace App\Filament\Resources\MapelMasterResource\Pages;

use App\Filament\Resources\MapelMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMapelMaster extends EditRecord
{
    protected static string $resource = MapelMasterResource::class;

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
