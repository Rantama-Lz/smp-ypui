<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\GuruMapel;
use App\Models\SiswaKelas;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CardSiswa extends BaseWidget
{
    use HasWidgetShield;

    public static function getSort(): int
{
    $user = auth()->user();
    if(!$user) {
        return 1;
    }
    if ($user->hasRole('guru')) {
        return 3;
    }

    if ($user->hasRole('siswa')) {
        return 3;
    }

    return 1; // fallback untuk role lain
}
    
   protected function getStats(): array
{
    $siswalaki = \App\Models\Siswa::where('jenis_kelamin', 'Laki-laki')
        ->whereHas('siswaKelas', function ($query) {
            $query->where('status', 'Aktif');
        })->count();

    $siswaperempuan = \App\Models\Siswa::where('jenis_kelamin', 'Perempuan')
        ->whereHas('siswaKelas', function ($query) {
            $query->where('status', 'Aktif');
        })->count();

    $SiswaAktif = SiswaKelas::where('status', 'Aktif')->count();

    return [
        Stat::make('Jumlah Siswa Aktif', $SiswaAktif)->icon('heroicon-o-user-group'),
        Stat::make('Siswa Laki-laki', $siswalaki)->icon('heroicon-s-user'),
        Stat::make('Siswa Perempuan', $siswaperempuan)->icon('heroicon-o-user'),
    ];
}
    protected ?string $heading = 'Statistik Siswa';
}

