<?php

namespace App\Filament\Resources\GuruResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\MapelMaster;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class GuruMapelRelationManager extends RelationManager
{
    protected static string $relationship = 'gurumapel';
    protected static ?string $title = 'Mata Pelajaran yang Diampu';
    protected static ?string $label = 'Mata Pelajaran yang Diampu';
    public function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('mapel_master_id')
                ->label('Mata Pelajaran')
                ->options(MapelMaster::pluck('nama_mapel', 'id'))
                ->searchable()
                ->required(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('mapel')
            ->columns([
                Tables\Columns\TextColumn::make('mapelmaster.nama_mapel')->label('Nama Mata Pelajaran'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->label('Tambah')
                ->modalHeading('Tambah Mapel yang Diampu')
                ->modalButton('Simpan') 
                    ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
