<?php

namespace App\Filament\Resources\RewayaResource\Pages;

use App\Filament\Resources\RewayaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRewayas extends ListRecords
{
    protected static string $resource = RewayaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
