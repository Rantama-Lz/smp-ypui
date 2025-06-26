<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Guru;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GuruResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GuruResource\RelationManagers;
use Filament\Forms\Components\Textarea;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;
    protected static ?int $navigationSort = 2; 
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->label('Nama Lengkap')
                ->autocapitalize('words'),
                TextInput::make('nip')
                ->label('Nomor Induk Pegawai'),
                // ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\EditRecord), untuk disable edit
                Select::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ]),
                DatePicker::make('tgl_lahir')
                ->label('Tanggal Lahir'),
                Textarea::make('alamat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                ->sortable()
                ->searchable()
                ->label('Nama Lengkap'),
                TextColumn::make('nip')
                ->label('Nomor Induk Pegawai'),
                TextColumn::make('jenis_kelamin')
                ->label('Jenis Kelamin'),
                TextColumn::make('tgl_lahir')
                ->label('Tanggal Lahir'),
                TextColumn::make('alamat'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->defaultSort('nama', 'asc')
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
