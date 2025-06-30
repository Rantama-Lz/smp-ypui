<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Nilai;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
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
                TextInput::make('siswa_id')
                ->required()
                ->numeric(),
                TextInput::make('mata_pelajaran_id')
                ->required()
                ->numeric(),
                TextInput::make('tahun_ajaran_id')
                ->required()
                ->numeric(),
                TextInput::make('semester')
                ->required()
                ->maxLength(255),
                TextInput::make('nilai_uts')
                ->numeric(),
                TextInput::make('nilai_uas')
                ->numeric(),
                TextInput::make('nilai_akhir')
                ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa_id')
                ->numeric()
                ->sortable(),
                TextColumn::make('mata_pelajaran_id')
                ->numeric()
                ->sortable(),
                TextColumn::make('tahun_ajaran_id')
                ->numeric()
                ->sortable(),
                TextColumn::make('semester')
                ->searchable(),
                TextColumn::make('nilai_uts')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_uas')
                ->numeric()
                ->sortable(),
                TextColumn::make('nilai_akhir')
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
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
