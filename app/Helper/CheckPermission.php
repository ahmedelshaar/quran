<?php

namespace App\Helper;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Model;

trait CheckPermission {

    private static function checkPermission($role): bool
    {
        if(Filament::auth()->user()->isSuperAdmin()){
            return true;
        }else{
            return Filament::auth()->user()->can(self::getNameTable() . $role);
        }
    }

    public static function canViewAny(): bool
    {
        return self::checkPermission('index');
    }

    public static function canEdit(Model $record): bool
    {
        return self::checkPermission('edit');
    }

    public static function canCreate(): bool
    {
        return self::checkPermission('create');
    }

    public static function canDeleteAny(): bool
    {
        return self::checkPermission('delete');
    }

    public static function canDelete(Model $record): bool
    {
        return self::checkPermission('delete');
    }

}
