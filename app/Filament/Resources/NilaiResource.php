<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Nilai;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use PhpParser\Node\Stmt\Label;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NilaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NilaiResource\RelationManagers;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;
    protected static ?string $navigationGroup = 'Manajemen Akademik';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

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
                ->relationship('siswaKelas','id')
                ->options(function () {
                return \App\Models\SiswaKelas::with(['siswa', 'kelas'])
                    ->get()
                    ->sortBy(fn ($record) => $record->siswa->nama)
                    ->mapWithKeys(function ($record) {
                        return [
                            $record->id => $record->siswa->nama . ' - ' . $record->siswa->nis . ' - ' . $record->kelas->nama_kelas . ' - ' . $record->tahunajaran->nama_tahun
                        ];
                    });
                })
                // ->getOptionLabelFromRecordUsing(fn ($record) =>
                //     $record->siswa->nama . ' - '. $record->siswa->nis .' - ' . $record->kelas->nama_kelas
                // )
                ->reactive()
                
                ->afterStateUpdated(function ($state, callable $set) {
                    $siswa = \App\Models\Siswa::find($state);
                    $set('nis', $siswa?->nis);
                }),
                
                Select::make('mata_pelajaran_id')
                ->required()
                ->placeholder('Pilih Mata Pelajaran')
                ->label('Mata Pelajaran')
                ->relationship('mapel.master','nama_mapel'),
                
                Select::make('semester')
                ->placeholder('Pilih Semester')
                ->required()
                ->label('Semester')
                ->options([
                    'Ganjil' => 'Ganjil',
                    'Genap' => 'Genap',
                ]),
                TextInput::make('nilai_harian')
                ->label('Nilai Harian')
                ->maxValue('100')
                ->minValue('10')
                ->numeric(),
                TextInput::make('nilai_uts')
                ->label('Nilai Ujian Tengah Semester')
                ->maxValue('100')
                ->minValue('10')
                ->numeric(),
                TextInput::make('nilai_uas')
                ->label('Nilai Ujian Akhir Semester')
                ->maxValue('100')
                ->minValue('10')
                ->numeric(),
                // TextInput::make('nilai_akhir')
                // ->maxValue('100')
                // ->live()
                // ->readonly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswaKelas.siswa.nama')
                ->label('Nama Siswa')
                ->sortable(),
                TextColumn::make('siswaKelas.siswa.nis')
                ->label('NIS')
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('siswaKelas.kelas.nama_kelas')
                ->searchable()
                ->label('Kelas')
                ->sortable(),
                TextColumn::make('mapel.master.nama_mapel')
                ->searchable()
                ->label('Mata Pelajaran')
                ->sortable(),
                TextColumn::make('siswaKelas.tahunajaran.nama_tahun')
                ->label('Tahun Ajaran')
                ->toggleable(isToggledHiddenByDefault: true)
                ->sortable(),
                TextColumn::make('semester')
                ->searchable(),
                TextColumn::make('nilai_harian')
                ->label('Nilai Harian')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_uts')
                ->label('Nilai UTS')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_uas')
                ->label('Nilai UAS')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_akhir')
                ->label('Nilai Akhir')
                ->numeric()
                ->sortable(),
                TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('siswa_kelas_id')
                ->label('Kelas')
                ->relationship('siswaKelas.kelas.tingkatkelas', 'kelas'),
                SelectFilter::make('tahun_ajaran_id')
                ->label('Tahun Ajaran')
                ->relationship('siswaKelas.tahunajaran', 'nama_tahun'),
                SelectFilter::make('mata_pelajaran_id')
                ->label('Mata Pelajaran')
                ->relationship('mapel.master', 'nama_mapel'),
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
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
