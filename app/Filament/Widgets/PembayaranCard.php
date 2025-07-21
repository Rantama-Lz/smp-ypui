<?php

namespace App\Filament\Widgets;

use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class PembayaranCard extends BaseWidget
{
    use HasWidgetShield;
    protected ?string $heading = 'Keuangan';
    public static function getSort(): int
{
    $user = auth()->user();

    if ($user->hasRole('guru')) {
        return 10;
    }

    if ($user->hasRole('siswa')) {
        return 3;
    }

    return 10; // fallback untuk role lain
}
    protected function getCards(): array
    {
        $siswaId = Auth::user()->siswa?->id;

        if (!$siswaId) {
            return [];
        }

        // Ambil semua tagihan milik siswa
        $tagihan = Tagihan::whereHas('siswaKelas', function ($query) use ($siswaId) {
            $query->where('siswa_id', $siswaId);
        })->get();

        $jumlahTagihan = $tagihan->count();
        $sudahLunas = $tagihan->where('status', 'Sudah Bayar')->count();
        $belumLunas = $tagihan->where('status', 'Belum Bayar')->count();

        // Ambil total pembayaran yang sudah divalidasi
        $tagihanIds = $tagihan->pluck('id');
        $totalDibayar = Pembayaran::whereIn('tagihan_id', $tagihanIds)
            ->where('status', 'Sudah Validasi')
            ->sum('jumlah_bayar');

        return [
            Card::make('Total Tagihan', $jumlahTagihan . ' Bulan')
                ->icon('heroicon-o-clipboard-document-list')
                ->color('gray'),

            Card::make('Sudah Lunas', $sudahLunas . ' Bulan')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Card::make('Sisa Tagihan', $belumLunas . ' Bulan')
                ->icon('heroicon-o-x-circle')
                ->color($belumLunas > 0 ? 'warning' : 'success'),

            Card::make('Total Sudah Dibayar', 'Rp ' . number_format($totalDibayar, 0, ',', '.'))
                ->icon('heroicon-o-banknotes')
                ->color('info'),
        ];
    }

    public static function canView(): bool
    {
        return Auth::user()?->hasRole('siswa');
    }
}
