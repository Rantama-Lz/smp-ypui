<?php

namespace App\Filament\Resources\SiswaResource\Pages;

use App\Models\User;
use App\Models\Siswa;
use Filament\Actions;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;
use App\Filament\Resources\SiswaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSiswa extends CreateRecord
{
    protected static string $resource = SiswaResource::class;
    
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    
     protected function handleRecordCreation(array $data): Siswa
    {
        
        $siswa = Siswa::create([
            'nama' => $data['nama'],
            'nis' => $data['nis'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tgl_lahir' => $data['tgl_lahir'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto'] ?? null,
        ]);

        $defaultPassword = 'password';
        
        $user = User::create([
            'name' => $siswa->nama,
            'email' => $data['email'],
            'password' => Hash::make($defaultPassword),
        ]);

        $user->assignRole('siswa');

        
        $siswa->update(['user_id' => $user->id]);

        return $siswa;
    }

    protected function beforeCreate(): void
    {
        $nis = $this->data['nis'] ?? null;
        if (Siswa::where('nis', $nis)->exists()) {
        Notification::make()
            ->title('NIS sudah terdaftar!')
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

    protected function mutateFormDataBeforeCreate(array $data): array
{
    // Kode sekolah statis
    $kodeSekolah = '42';

    // Ambil tahun dari tanggal sekarang / atau dari data form kalau kamu punya field tahun_masuk
    $tahunMasuk = now()->format('Y');

    // Hitung urutan terakhir berdasarkan tahun masuk
    $lastSiswa = \App\Models\Siswa::where('nis', 'like', $kodeSekolah . $tahunMasuk . '%')->orderBy('nis', 'desc')->first();

    // Ambil 4 digit terakhir (urutan)
    if ($lastSiswa) {
        $lastNoUrut = (int) substr($lastSiswa->nis, -4);
        $nextNoUrut = $lastNoUrut + 1;
    } else {
        $nextNoUrut = 1;
    }

    // Pad dengan nol jadi 4 digit
    $urutanFormatted = str_pad($nextNoUrut, 4, '0', STR_PAD_LEFT);

    // Gabungkan semua jadi NIS
    $data['nis'] = $kodeSekolah . $tahunMasuk . $urutanFormatted;

    return $data;
}
}
