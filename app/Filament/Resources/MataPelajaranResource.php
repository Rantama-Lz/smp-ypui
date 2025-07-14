<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\MataPelajaran;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MataPelajaranResource\Pages;
use App\Filament\Resources\MataPelajaranResource\RelationManagers;

class MataPelajaranResource extends Resource
{
    protected static ?string $model = MataPelajaran::class;
    protected static ?string $navigationGroup = 'Manajemen Akademik';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tingkat_kelas_id')
                ->required()
                ->placeholder('Pilih Kelas')
                ->label('Kelas')
                ->relationship('tingkatkelas','kelas'),
                Select::make('mapel_master_id')
                ->required()
                ->label('Nama Mata Pelajaran')
                ->placeholder('Pilih Mata Pelajaran')
                ->relationship('master','nama_mapel'),
                Select::make('guru_id')
                ->required()
                ->label('Guru Pengajar')
                ->relationship('guru','nama'),
                Select::make('tahun_ajaran_id')
                ->required()
                ->label('Tahun Ajaran')
                ->relationship('tahunajaran','nama_tahun'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('master.nama_mapel')
                ->label('Nama Mata Pelajaran')
                ->searchable(),
                TextColumn::make('tingkatkelas.kelas')
                ->searchable()
                ->label('Kelas'),
                TextColumn::make('guru.nama')
                ->searchable()
                ->label('Guru Pengajar')
                ->numeric()
                ->sortable(),
                TextColumn::make('tahunajaran.nama_tahun')
                ->label('Tahun Ajaran')
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
                //
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
            'index' => Pages\ListMataPelajarans::route('/'),
            'create' => Pages\CreateMataPelajaran::route('/create'),
            'edit' => Pages\EditMataPelajaran::route('/{record}/edit'),
        ];
    }
}
