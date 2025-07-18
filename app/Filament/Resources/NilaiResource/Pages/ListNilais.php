<?php

namespace App\Filament\Resources\NilaiResource\Pages;

use Filament\Actions;

use Filament\Actions\Action;
use App\Filament\Resources\NilaiResource;
use Filament\Resources\Pages\ListRecords;

class ListNilais extends ListRecords
{
    protected static string $resource = NilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            Action::make('input_nilai')
            ->label('Input Nilai')
            ->url(NilaiResource::getUrl('input-nilai'))
            ->icon('heroicon-o-pencil-square')
            ->color('primary'),
        ];
    }
}
