<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public static function canEdit($record): bool
{
    if (auth()->user()->hasRole('admin')) {
        return !$record->hasRole('super_admin') && !$record->hasRole('admin');
    }

    return true;
}

    public function authorize($ability, $arguments = [])
    {
        $currentUser = auth()->user();
        $record = $this->getRecord();

        if ($currentUser->hasRole('admin')) {
            return !$record->hasRole('admin') && !$record->hasRole('super_admin');
        }

        return true;
    }
    protected function canAccessRecord($record): bool
{
    $currentUser = auth()->user();

    // Admin dilarang akses akun super_admin & admin
    if ($currentUser->hasRole('admin')) {
        return !$record->hasRole('super_admin') && !$record->hasRole('admin');
    }

    return true;
}
public function mount($record): void
{
    parent::mount($record);

    $currentUser = auth()->user();
    $record = $this->getRecord();

    if ($currentUser->hasRole('admin') && ($record->hasRole('admin') || $record->hasRole('super_admin'))) {
        abort(403);
    }
}

}
