<?php

namespace App\Filament\Resources\MapelMasterResource\Pages;

use App\Filament\Resources\MapelMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMapelMaster extends CreateRecord
{
    protected static string $resource = MapelMasterResource::class;

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
