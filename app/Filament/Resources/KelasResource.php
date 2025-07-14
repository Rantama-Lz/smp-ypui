<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kelas;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KelasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KelasResource\RelationManagers;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;
    protected static ?string $navigationGroup = 'Manajemen Akademik';
    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tingkat_kelas_id')
                ->required()
                ->placeholder('Pilih Kelas')
                ->label('Tingkat Kelas')
                ->relationship('tingkatkelas','kelas'),
                TextInput::make('nama_kelas')
                ->required()
                ->placeholder('VII A / VIII B / IX C')
                ->label('Nama Kelas'),
                Select::make('guru_id')
                ->required()
                ->placeholder('Pilih Walikelas')
                ->label('Walikelas')
                ->relationship('guru','nama'),
                Select::make('tahun_ajaran_id')
                ->required()
                ->placeholder('Pilih Tahun Ajaran')
                ->label('Tahun Ajaran')
                ->relationship('tahunajaran','nama_tahun'),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tingkatkelas.kelas')
                ->searchable()
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Kelas'),
                TextColumn::make('nama_kelas')
                ->searchable()
                ->label('Nama Kelas'),
                TextColumn::make('guru.nama')
                ->searchable()
                ->label('Nama Walikelas'),
                TextColumn::make('tahunajaran.nama_tahun')
                ->searchable()
                ->sortable()
                ->label('Tahun Ajaran'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dibuat pada')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Diperbarui pada')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->defaultSort('id', 'asc')
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}
