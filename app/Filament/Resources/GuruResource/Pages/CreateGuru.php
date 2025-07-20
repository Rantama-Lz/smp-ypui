<?php

namespace App\Filament\Resources\GuruResource\Pages;

use App\Models\Guru;
use App\Models\User;
use Filament\Actions;
use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\GuruResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateGuru extends CreateRecord
{
    protected static string $resource = GuruResource::class;
    
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Guru
    {
        
        $guru = Guru::create([
            'nama' => $data['nama'],
            'nip' => $data['nip'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tgl_lahir' => $data['tgl_lahir'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto'] ?? null,
        ]);

        $defaultPassword = 'password';
        
        $user = User::create([
            'name' => $guru->nama,
            'email' => $data['email'],
            'password' => Hash::make($defaultPassword),
        ]);

        $user->assignRole('guru');

        
        $guru->update(['user_id' => $user->id]);

        return $guru;
    }

    protected function beforeCreate(): void
    {
        $nis = $this->data['nip'] ?? null;
        if (guru::where('nip', $nis)->exists()) {
        Notification::make()
            ->title('NIP sudah terdaftar!')
            ->danger()
            ->send();
            $this->halt();
    }
        $email = $this->data['email'] ?? null;

        if (User::where('email', $email)->exists()) {
            Notification::make()
                ->title('Email sudah terdaftar.')
                ->danger()
                ->send();

            // Batalin proses create
            $this->halt();
        }
    }
}
