<?php

namespace App\Filament\Resources\PembayaranResource\Pages;

use Filament\Actions;
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
            Actions\DeleteAction::make(),
        ];
    }
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
   

    public function mount($record): void
{
    parent::mount($record);

    $record = $this->getRecord(); // Ambil instance model dari ID
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
