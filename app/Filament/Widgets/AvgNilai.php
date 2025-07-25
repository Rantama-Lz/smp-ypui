<?php

namespace App\Filament\Widgets;

use App\Models\Nilai;
use App\Models\GuruMapel;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AvgNilai extends BaseWidget
{
    use HasWidgetShield;
    public static function getSort(): int
{
    $user = auth()->user();

    if ($user->hasRole('guru')) {
        return 2;
    }

    if ($user->hasRole('siswa')) {
        return 1;
    }

    return 10; // fallback untuk role lain
}
   
    protected function getCards(): array
    {
        $user = Auth::user();

        if (!$user->hasRole('guru')) {
            return [];
        }

        $guruId = $user->guru?->id;

        $mapelDiampu = GuruMapel::with('mapelMaster')
            ->where('guru_id', $guruId)
            ->get();

        $cards = [];

        foreach ($mapelDiampu as $guruMapel) {
            $mapelId = $guruMapel->mapel_master_id;
            $namaMapel = $guruMapel->mapelMaster->nama_mapel ?? 'Mapel Tidak Diketahui';

            $rataRata = Nilai::where('mapel_master_id', $mapelId)
                ->whereHas('siswaKelas.siswa', function ($query) {
                    $query->where('status', 'aktif');
                })
                ->avg('nilai_akhir');

            if (!is_null($rataRata)) {
                $cards[] = Card::make("{$namaMapel}", number_format($rataRata, 0))
                    ->icon('heroicon-o-chart-bar')
                    ->color('info');
            }
        }

        return $cards;
    }

    public static function canView(): bool
    {
        return Auth::user()?->hasRole('guru');
    }

     protected ?string $heading = 'Rata-rata Nilai Siswa';
}
