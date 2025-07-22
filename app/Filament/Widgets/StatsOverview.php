<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\MapelMaster;
use App\Models\TahunAjaran;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected ?string $heading = 'Statistik Akademik';
    use HasWidgetShield;
    public static function getSort(): int
{
    $user = auth()->user();

    if ($user->hasRole('guru')) {
        return 4;
    }

    if ($user->hasRole('siswa')) {
        return 4;
    }

    return 3; // fallback untuk role lain
}
    protected function getStats(): array
    {

        $mapelCount = MapelMaster::count();
        $kelasCount = Kelas::count();
        $tahunajaranAktif = TahunAjaran::where('active', true)->first();
        return [
            Stat::make('Tahun Ajaran Aktif', $tahunajaranAktif->nama_tahun)->icon('heroicon-o-calendar'),
            Stat::make('Jumlah Kelas', $kelasCount)->icon('heroicon-o-building-library'),
            Stat::make('Jumlah Mata Pelajaran', $mapelCount)->icon('heroicon-o-book-open'),
        ];
        
        
    }
}
