<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class UserResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = User::class;
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Manajemen Pengguna';
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $label = 'Data Akun';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data User')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),

                        TextInput::make('password')
                            ->password()
                            ->revealable()
                            ->required(fn (string $context): bool => $context === 'create')
                            ->dehydrateStateUsing(fn ($state) => !empty($state) ? Hash::make($state) : null)
                            ->label('Kata Sandi')
                            ->hint(fn (string $operation): string => $operation === 'edit' 
                                ? 'Untuk merubah Kata Sandi.' 
                                : '')
                                ->helperText(fn (string $operation): string => $operation === 'edit' 
                                ? 'Bisa dikosongkan jika tidak ingin merubah.' 
                                : '')
                            ->minLength(6)
                            ->maxLength(25)
                            ->dehydrated(fn ($state) => filled($state)),
                    ])->columns(2),

                Section::make('Pilih Role')
                    ->schema([
                        Select::make('roles')
                            ->label('Nama Role')
                            ->relationship('roles', 'name',
                                fn ($query) => $query->whereIn('name', ['super_admin', 'admin'])
                            )
                            ->multiple()
                            ->placeholder('Pilih Role')
                            ->preload()
                            ->searchable()
                            ->required()
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                BadgeColumn::make('roles.name')
                    ->label('Roles')
                    ->colors(['primary']),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
        ];
    }
}