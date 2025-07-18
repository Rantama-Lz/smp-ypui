<?php

namespace App\Filament\Resources\SiswaKelasResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SiswaKelasResource;

class ListSiswaKelas extends ListRecords
{
    protected static string $resource = SiswaKelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
             Action::make('createSiswaKelas')
                ->label('Tambah ke Kelas')
                ->url(SiswaKelasResource::getUrl('buat'))
                ->color('primary'),
            Action::make('naik_kelas')
            ->label('Naik Kelas')
            ->url(SiswaKelasResource::getUrl('naik-kelas'))
            ->icon('heroicon-o-arrow-up')
            ->color('success'),
        ];
    }
}
