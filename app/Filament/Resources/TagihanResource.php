<?php

namespace App\Filament\Resources;

use App\Models\Spp;
use Filament\Forms;
use Filament\Tables;
use App\Models\Tagihan;
use Filament\Forms\Form;
use App\Models\SiswaKelas;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Pages\Actions\Action;
use function Laravel\Prompts\select;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\TagihanResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TagihanResource\RelationManagers;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class TagihanResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Tagihan::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    public static function getNavigationSort(): ?int
{
    if (auth()->check() && auth()->user()->hasRole('siswa')) {
        return 1;
    }
    return 2;
}
    public static function getNavigationGroup(): ?string
{
    if (auth()->check() && auth()->user()->hasRole('siswa')) {
        return 'Keuangan';
    }

    return 'Manajemen Keuangan'; // default untuk admin
}
    public static function getNavigationLabel(): string
{
    if (Auth::check() && Auth::user()->hasRole('siswa')) {
        return 'Tagihan SPP';
    }

    return 'Tagihan';
}

    public static function form(Form $form): Form
    {
        return $form
             
            ->schema([
                Select::make('siswa_kelas_id')
                ->searchable()
                ->preload()
                ->required()
                ->label('Nama Siswa')
                ->placeholder('Nama Siswa - NIS - Kelas - Tahun Ajaran')
                ->options(SiswaKelas::with(['siswa', 'kelas', 'tahunajaran'])->get()->mapWithKeys(function ($item) {
                return [
                $item->id => $item->siswa->nama . ' - ' . $item->siswa->nis . ' - ' . $item->kelas->nama_kelas . ' - ' . $item->tahunajaran->nama_tahun,
                ];
                }))
                
                ->reactive()
                ->afterStateUpdated(function ($state, $set) {
                $siswaKelas = \App\Models\SiswaKelas::find($state);
                if ($siswaKelas) {
                    $set('tahun_ajaran_id', $siswaKelas->tahun_ajaran_id);
                    }
                })
                ->afterStateUpdated(function ($state, callable $set) {
                    $siswa = \App\Models\Siswa::find($state);
                    $set('nis', $siswa?->nis);
                })
                ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\EditRecord),

                Select::make('spp_id')
                ->placeholder('Bulan - Nominal - Tahun Ajaran')
                ->label('SPP')
                ->relationship('spp', 'bulan')
                ->getOptionLabelFromRecordUsing(fn ($record) => $record->bulan.' - Rp '.number_format($record->nominal, 0, ',', '.'). ' - ' . ($record->tahunajaran->nama_tahun ?? ''))
                ->searchable()
                ->preload()
                ->required()
                ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\EditRecord),
                
                Select::make('status')
                ->label('Status')
                ->required()
                ->options([
                    'Belum Bayar' => 'Belum Bayar',
                    'Sudah Bayar' => 'Sudah Bayar',
                    ])
                ->default('Belum Bayar')
                ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\CreateRecord),
                ]);   
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                
                TextColumn::make('siswaKelas.siswa.nama')
                ->label('Nama Siswa')
                ->searchable()
                ->sortable(),
                TextColumn::make('siswaKelas.siswa.nis')
                ->label('NIS')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('spp.bulan')
                ->label('Bulan'),
                TextColumn::make('spp.nominal')
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                ->label('Nominal'),
                TextColumn::make('siswaKelas.tahunajaran.nama_tahun')
                ->label('Tahun Ajaran'),
                BadgeColumn::make('status')->colors([
                    'danger' => 'Belum Bayar',
                    'warning' => 'Menunggu Validasi',
                    'success' => 'Sudah Bayar',
                ])->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('tahun_ajaran_id')->relationship('siswaKelas.tahunajaran', 'nama_tahun'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTagihans::route('/'),
            // 'create' => Pages\CreateTagihan::route('/create'),
            'edit' => Pages\EditTagihan::route('/{record}/edit'),
            'create' => Pages\GenerateTagihan::route('/create'),
        ];
    }

public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    // Cek apakah user adalah siswa
    if (Auth::user()->hasRole('siswa')) {
        // Ambil siswa_id dari user
        $siswaId = Auth::user()->siswa?->id;

        // Filter berdasarkan siswa_id yang terkait dengan siswa_kelas
        $query->whereHas('siswaKelas', function ($q) use ($siswaId) {
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
