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
use Filament\Tables\Actions\DeleteBulkAction;
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
                        ->relationship(
                            'roles',
                            'name',
                            fn ($query) => 
                                auth()->user()->hasRole('admin')
                                    ? $query->whereIn('name', ['siswa', 'guru'])
                                    : $query
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
                Tables\Actions\EditAction::make()
                ->visible(function ($record) {
                        $currentUser = auth()->user();

                        if ($currentUser->hasRole('admin')) {
                            return !$record->hasRole('super_admin') && !$record->hasRole('admin');
                        }

                        return true;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->visible(function ($record) {
                        $currentUser = auth()->user();

                        if ($currentUser->hasRole('admin')) {
                            return !$record->hasRole('super_admin') && !$record->hasRole('admin');
                        }

                        return true;
                    })
            ])
            ->bulkActions([
                DeleteBulkAction::make()
                ->action(function ($records) {
                    $currentUser = auth()->user();

                    if ($currentUser->hasRole('admin')) {
                        $diblokir = $records->filter(function ($record) {
                            return $record->hasRole('super_admin') || $record->hasRole('admin');
                        });

                                if ($diblokir->isNotEmpty()) {
                                    \Filament\Notifications\Notification::make()
                                        ->title('Beberapa akun tidak bisa dihapus karena memiliki role super_admin / admin.')
                                        ->danger()
                                        ->send();

                                    return;
                                }
                            }

                            $records->each->delete();
                        })
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
            'delete_any',
        ];
    }
}