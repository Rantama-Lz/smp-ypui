<?php

namespace App\Filament\Resources;

use stdClass;
use Filament\Forms;
use App\Models\Guru;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GuruResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GuruResource\RelationManagers;

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
                ->required()
                ->label('Nama Lengkap')
                ->autocapitalize('words'),
                TextInput::make('nip')
                ->required()
                ->label('Nomor Induk Pegawai'),
                // ->disabled(fn ($livewire) => $livewire instanceof \Filament\Resources\Pages\EditRecord), untuk disable edit
                Select::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->required()
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ]),
                DatePicker::make('tgl_lahir')
                ->required()
                ->label('Tanggal Lahir'),
                Textarea::make('alamat')
                ->required(),
                FileUpload::make('foto')
                ->directory('guru'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor')->state(
                static function (HasTable $livewire, stdClass $rowLoop): string {
                return (string) (
                $rowLoop->iteration +
                ($livewire->getTableRecordsPerPage() * (
                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                TextColumn::make('nama')
                ->sortable()
                ->searchable()
                ->label('Nama Lengkap'),
                TextColumn::make('nip')
                ->label('Nomor Induk Pegawai')
                ->searchable(),
                TextColumn::make('jenis_kelamin')
                ->label('Jenis Kelamin'),
                TextColumn::make('tgl_lahir')
                ->label('Tanggal Lahir'),
                TextColumn::make('alamat')
                ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('foto'),
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
