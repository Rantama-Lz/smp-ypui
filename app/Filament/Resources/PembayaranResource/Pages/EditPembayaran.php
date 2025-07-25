<?php

namespace App\Filament\Resources\PembayaranResource\Pages;

use Filament\Actions;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PembayaranResource;

class EditPembayaran extends EditRecord
{
    protected static string $resource = PembayaranResource::class;

    protected function getHeaderActions(): array
{
    return [
        DeleteAction::make()
            ->visible(function ($record) {
                $user = auth()->user();

                // Jika status Sudah Validasi, hanya super_admin yang bisa lihat tombol hapus
                if ($record->status === 'Sudah Validasi') {
                    return $user->hasRole('super_admin');
                }

                // Kalau belum validasi, siapa pun bisa lihat tombol hapus
                return true;
            })
            ->before(function ($record) {
                if ($record->status === 'Sudah Validasi' && !auth()->user()->hasRole('super_admin')) {
                    Notification::make()
                        ->title('Gagal Menghapus Data!')
                        ->body('Data yang sudah divalidasi hanya bisa dihapus oleh Super Admin.')
                        ->danger()
                        ->send();

                    return false;
                }
            }),
    ];
}
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
   

    public function mount($record): void
{
    parent::mount($record);

    $record = $this->getRecord(); 
    if (Auth::user()->hasRole('siswa') && $record->status === 'Ditolak') {
        Notification::make()
            ->title('Pembayaran Ditolak')
            ->body(' Silahkan buat Pembayaran baru.')
            ->warning()
            ->send();

        $this->redirect(static::getResource()::getUrl());
    }

    if (Auth::user()->hasRole('siswa') && $record->status === 'Sudah Validasi') {
        Notification::make()
            ->title('Pembayaran Sudah Validasi')
            ->body('Tidak dapat diubah.')
            ->warning()
            ->send();

        $this->redirect(static::getResource()::getUrl());
    }
}
}
