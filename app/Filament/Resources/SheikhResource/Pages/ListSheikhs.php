<?php

namespace App\Filament\Resources\SheikhResource\Pages;

use App\Filament\Resources\SheikhResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSheikhs extends ListRecords
{
    protected static string $resource = SheikhResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
