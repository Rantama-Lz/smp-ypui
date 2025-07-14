<?php

namespace App\Filament\Resources\TagihanResource\Pages;

use App\Filament\Resources\TagihanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTagihan extends CreateRecord
{
    protected static string $resource = TagihanResource::class;
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
