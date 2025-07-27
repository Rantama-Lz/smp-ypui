<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembayaran;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembayaranResource\Pages;
use App\Filament\Resources\PembayaranResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class PembayaranResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Pembayaran::class;
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    public static function getNavigationSort(): ?int
{
    if (auth()->check() && auth()->user()->hasRole('siswa')) {
        return 2;
    }
    return 3;
}
    public static function getNavigationGroup(): ?string
{
    if (auth()->check() && auth()->user()->hasRole('siswa')) {
        return 'Keuangan';
    }

    return 'Manajemen Keuangan'; 
}
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tagihan_id')
                ->placeholder('Nama Siswa - Tahun Ajaran - Bulan - Nominal')
                ->label('Tagihan')
                ->options(function () {
    $user = Auth::user();

    $query = \App\Models\Tagihan::with(['siswaKelas.siswa', 'siswaKelas.tahunajaran', 'spp'])
        ->where('status', 'Belum Bayar');

    if ($user->hasRole('siswa')) {
        $siswaId = $user->siswa?->id;

        if (!$siswaId) {
            return [];
        }

        $query->whereHas('siswaKelas', function ($q) use ($siswaId) {
            $q->where('siswa_id', $siswaId);
        });
    }

    return $query->get()
        ->mapWithKeys(function ($tagihan) {
            $nama = $tagihan->siswaKelas->siswa->nama ?? '-';
            $tahunajaran = $tagihan->siswaKelas->tahunajaran->nama_tahun ?? '-';
            $bulan = $tagihan->spp->bulan ?? '-'; 
            $nominal = 'Rp ' . number_format($tagihan->spp->nominal ?? 0, 0, ',', '.');

            return [$tagihan->id => "$nama - $tahunajaran - $bulan - $nominal"];
        });
})
                ->searchable(['siswaKelas.nama'])
                ->preload()
                ->required(),
                DatePicker::make('tanggal_bayar')
                ->label('Tanggal Pembayaran')
                ->required(),
                TextInput::make('jumlah_bayar')
                ->label('Nominal Pembayaran')
                ->placeholder('250000')
                ->numeric()
                ->required()
                ->maxLength(255),
                 Select::make('metode_bayar')
                 ->placeholder('Pilih Metode Pembayaran')
                ->label('Metode Pembayaran')
                ->required()
                ->options([
                    'Tunai' => 'Tunai',
                    'Transfer' => 'Transfer'
                ]),
                FileUpload::make('buktibayar')
                    ->label('Bukti Pembayaran')
                    ->image()
                    ->maxSize(2048)
                    ->directory('buktibayar')
                    ->disabled(fn ($record) => $record?->status === 'Sudah Validasi')
                    ->required(),
                Select::make('status')
                ->label('Status Pembayaran')
                ->options([
                    'Menunggu Validasi' => 'Menunggu Validasi',
                    'Sudah Validasi' => 'Sudah Validasi',
                    'Ditolak' => 'Ditolak'
                ])
                ->default('Menunggu Validasi')
                ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord)
                ->visible(fn () => !Auth::user()->hasRole('siswa'))
                ->required(),
                
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tagihan.siswaKelas.siswa.nama')
                ->label('Nama Siswa')
                ->searchable()
                ->sortable(),
                TextColumn::make('tagihan.siswaKelas.siswa.nis')
                ->label('NIS')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tagihan.siswaKelas.tahunajaran.nama_tahun')
                ->label('Tahun Ajaran')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('tagihan.spp.bulan')
                ->searchable()
                ->label('Bulan'),
                TextColumn::make('tagihan.spp.nominal')->label('Nominal')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('tanggal_bayar')
                ->date()
                ->label('Tanggal')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('metode_bayar')
                ->label('Metode Pembayaran')
                ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('buktibayar')
                ->label('Bukti Pembayaran')
                ->width(80),
                BadgeColumn::make('status')
                ->searchable()
                ->colors([
                    'warning' => 'Menunggu Validasi',
                    'success' => 'Sudah Validasi',
                    'danger' => 'Ditolak',
                ]),
                TextColumn::make('created_at')
                ->dateTime()
                ->label('Dibuat pada')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->label('Diperbarui pada')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('created_at' , 'desc')
            ->filters([
                SelectFilter::make('tahun_ajaran_id')
                ->relationship('tagihan.siswaKelas.tahunajaran', 'nama_tahun')
                ->label('Tahun Ajaran'),
            ])
            ->actions([
                Tables\Actions\Action::make('validasi')
                    ->label('Validasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(function ($record) {
                        $user = Auth::user();
                        return $record->status === 'Menunggu Validasi' &&
                            ($user->hasRole('admin') || $user->hasRole('super_admin'));
                    })
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'Sudah Validasi',
                        ]);

                        $record->tagihan->update([
                            'status' => 'Sudah Bayar',
                        ]);

                        Notification::make()
                            ->title('Berhasil Memvalidasi Pembayaran')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\Action::make('tolak')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(function ($record) {
                        $user = Auth::user();
                        return $record->status === 'Menunggu Validasi' &&
                            ($user->hasRole('admin') || $user->hasRole('super_admin'));
                    })
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'Ditolak',

                        ]);

                        Notification::make()
                            ->title('Pembayaran telah di Tolak')
                            ->danger()
                            ->send();
                    }),
                Tables\Actions\Action::make('lihat_bukti')
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->url(fn ($record) => asset('storage/' . $record->buktibayar))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => $record->buktibayar)
            ])
            ->bulkActions([
                    DeleteBulkAction::make()
                    ->action(function ($records, $data) {
                        $tidakBisaDihapus = $records->filter(function ($record) {
                            return $record->status === 'Sudah Validasi';
                        });

                        if ($tidakBisaDihapus->isNotEmpty()) {
                            Notification::make()
                                ->title('Ada data yang tidak bisa dihapus karena sudah divalidasi.')
                                ->danger()
                                ->send();

                            // Batalkan proses hapus
                            return;
                        }

                        // Kalau semua aman, baru hapus
                        $records->each->delete();

                        Notification::make()
                            ->title('Data berhasil dihapus.')
                            ->success()
                            ->send();
                        })
                    ]);
    }

    public static function getRelations(): array
    {
        return [
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembayarans::route('/'),
            'create' => Pages\CreatePembayaran::route('/create'),
            'edit' => Pages\EditPembayaran::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    // Cek jika yang login adalah siswa
    if (Auth::check() && Auth::user()->hasRole('siswa')) {
        $siswaId = Auth::user()->siswa?->id;

        // Ambil pembayaran yang terkait dengan siswa ini lewat relasi tagihan
        $query->whereHas('tagihan.siswaKelas', function ($q) use ($siswaId) {
            $q->where('siswa_id', $siswaId);
        });
    }

    return $query;
}
    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }
}
