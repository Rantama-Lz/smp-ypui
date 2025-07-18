<?php

namespace App\Filament\Resources\MapelMasterResource\Pages;

use App\Filament\Resources\MapelMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMapelMasters extends ListRecords
{
    protected static string $resource = MapelMasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
