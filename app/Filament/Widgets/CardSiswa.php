<?php

namespace App\Filament\Widgets;

use App\Models\Siswa;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CardSiswa extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $siswaCount = Siswa::count();
        $siswalaki = Siswa::where('jenis_kelamin', 'Laki-laki')->count();
        $siswaperempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();
        // $guruCount = Guru::count();
        // $gurulaki = Guru::where('jenis_kelamin', 'Laki-laki')->count();
        // $guruperempuan = Guru::where('jenis_kelamin', 'Perempuan')->count();
        
        return [
            
            Stat::make('Jumlah Siswa', $siswaCount),
            Stat::make('Siswa Laki - Laki', $siswalaki),
            Stat::make('Siswa Perempuan', $siswaperempuan),

            // Stat::make('Jumlah Guru', $guruCount),
            // Stat::make('Guru Laki - Laki', $gurulaki),
            // Stat::make('Guru Perempuan', $guruperempuan),
            
        ];
    }
    protected ?string $heading = 'Statistik Siswa';
}

