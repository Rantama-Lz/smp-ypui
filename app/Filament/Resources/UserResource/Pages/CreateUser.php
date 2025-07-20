<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Models\Guru;
use App\Models\User;
use App\Models\Siswa;
use Filament\Actions;
use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\UserResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
    
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
