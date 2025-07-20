<?php

namespace App\Filament\Resources\TagihanResource\Pages;

use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\TagihanResource;

class ListTagihans extends ListRecords
{
    protected static string $resource = TagihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
            CreateAction::make('create')
                ->label('Buat')
                ->url(TagihanResource::getUrl('create'))
                ->color('primary'),
        ];
    }
}
