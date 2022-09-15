<?php

namespace App\Filament\Resources\AlajazaResource\Pages;

use App\Filament\Resources\AlajazaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlajazas extends ListRecords
{
    protected static string $resource = AlajazaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
