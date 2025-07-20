<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\GuruResource;
use App\Filament\Resources\SiswaResource;
use Filament\Actions;
use Filament\Actions\Action;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Buat Admin'),
            Action::make('create')
            ->label('Buat Siswa')
            ->url(SiswaResource::getUrl('create'))
            ->color('primary'),
            Action::make('create')
            ->label('Buat Guru')
            ->url(GuruResource::getUrl('create'))
            ->color('primary'),
        ];
    }
}
