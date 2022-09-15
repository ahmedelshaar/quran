<?php

namespace App\Filament\Resources\RewayaResource\Pages;

use App\Filament\Resources\RewayaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRewaya extends EditRecord
{
    protected static string $resource = RewayaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
