<?php

namespace App\Filament\Resources\NilaiResource\Pages;

use App\Models\Nilai;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use App\Filament\Resources\NilaiResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListNilais extends ListRecords
{
    protected static string $resource = NilaiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            CreateAction::make('create')
            ->label('Input Nilai')
            ->url(NilaiResource::getUrl('create'))
            ->icon('heroicon-o-pencil-square')
            ->color('primary'),
        ];
    }
    
}
