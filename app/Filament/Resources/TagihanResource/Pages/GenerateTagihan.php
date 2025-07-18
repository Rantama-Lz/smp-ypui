<?php

namespace App\Filament\Resources\TagihanResource\Pages;

use App\Models\Spp;
use App\Models\Tagihan;
use App\Models\SiswaKelas;
use App\Models\TahunAjaran;
use Filament\Resources\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Notifications\Notification;
use App\Filament\Resources\TagihanResource;


class GenerateTagihan extends Page
{
    protected static string $resource = TagihanResource::class;
    protected static ?string $title = 'Buat Tagihan';
    protected static string $view = 'filament.resources.tagihan-resource.pages.generate-tagihan';

    public $tahunajaranId;
    public $bulan;

    

    public function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    Select::make('tahunajaranId')
                        ->columnSpan([
                        'sm' => 1,
                        'xl' => 1,
                        '2xl' => 1,
                        ])
                        ->label('Siswa Tahun Ajaran')
                        ->placeholder('Pilih Tahun Ajaran')
                        ->options(TahunAjaran::all()->pluck('nama_tahun', 'id'))
                        ->required(),

                        Select::make('bulan')
                        ->columnSpan([
                        'sm' => 1,
                        'xl' => 1,
                        '2xl' => 1,
                        ])
                        ->label('SPP Bulan')
                        ->placeholder('Pilih Bulan')
                        ->options([
                            'Januari' => 'Januari',
                            'Februari' => 'Februari',
                            'Maret' => 'Maret',
                            'April' => 'April',
                            'Mei' => 'Mei',
                            'Juni' => 'Juni',
                            'Juli' => 'Juli',
                            'Agustus' => 'Agustus',
                            'September' => 'September',
                            'Oktober' => 'Oktober',
                            'November' => 'November',
                            'Desember' => 'Desember',
                        ])
                        ->required(),
                ])
        ];
        
    }

     public function generate(): void
    {
        $siswaKelasList = SiswaKelas::where('tahun_ajaran_id', $this->tahunajaranId)
                        ->where('status', 'Aktif')
                        ->get();
        $spp = Spp::where('tahun_ajaran_id', $this->tahunajaranId)
                  ->where('bulan', $this->bulan)
                  ->first();
        
         if ($siswaKelasList->isEmpty()) {
            Notification::make()
                ->title('Tidak ada Siswa aktif pada Tahun Ajaran yang dipilih.')
                ->warning()
                ->persistent()
                ->send();
            return;
        }
        
        if (! $spp) {
            Notification::make()
                ->title("SPP untuk bulan {$this->bulan} belum tersedia.")
                ->danger()
                ->send();
            return;
        }

        $counter = 0;

        foreach ($siswaKelasList as $siswaKelas) {
            $created = Tagihan::updateOrCreate(
                [
                    'siswa_kelas_id' => $siswaKelas->id,
                    'spp_id' => $spp->id,
                ],
                [
                    'status' => 'belum bayar',
                ]
            );

            if ($created->wasRecentlyCreated) {
                $counter++;
            }
        }
        if ($counter === 0) {
        Notification::make()
            ->title("Semua Siswa sudah memiliki tagihan bulan {$this->bulan}.")
            ->info()
            ->send();
        return;
    }
        Notification::make()
            ->title("Berhasil membuat {$counter} tagihan bulan {$this->bulan}.")
            ->success()
            ->send();
            $this->redirect(TagihanResource::getUrl());
    }

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

