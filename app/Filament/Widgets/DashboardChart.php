<?php

namespace App\Filament\Widgets;

use App\Models\Siswa;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\PieChartWidget;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class DashboardChart extends ChartWidget
{   
    use HasWidgetShield;
    public static function getSort(): int
{
    $user = auth()->user();
    if(!$user) {
        return 2;
    }
    if ($user->hasRole('guru')) {
        return 4;
    }

    if ($user->hasRole('siswa')) {
        return 4;
    }

    return 2; // fallback untuk role lain
}
    protected int | string | array $columnSpan = 'full';
    protected static ?string $maxHeight = '250px';

    protected function getData(): array
    {
        $laki = Siswa::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();

        return [
            
            'datasets' => [
                [
                'data' => [$perempuan, $laki],
                'backgroundColor' => ['rgba(255, 99, 132)', 'rgba(54, 162, 235)'],
                ],  
            ],
            
            'labels' => ['Perempuan', 'Laki-Laki'],

            'options' => [
                
                'scales' => [
                    'x' => [
                        'grid' => [
                            'display' => false,
                        ],
                        'ticks' => ['display' => false],
                    ],
                    'y' => [
                        'grid' => [
                            'display' => false,
                        ],
                        'ticks' => ['display' => false],
                    ],
                ],
        ],
        ];

        

    }

    protected function getType(): string
    {
        return 'pie';
    }

    public function getDescription(): ?string
    {
        return 'Grafik Siswa Laki-laki & Perempuan';
    }
    
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
             'scales' => [
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => ['display' => false],
                ],
                'y' => [
                    'grid' => [
                        'display' => false,
                    ],
                    'ticks' => ['display' => false],
                ],
            ],
        ];
    }

    
    
}
