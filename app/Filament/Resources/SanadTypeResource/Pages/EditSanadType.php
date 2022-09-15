<?php

namespace App\Filament\Resources\SanadTypeResource\Pages;

use App\Filament\Resources\SanadTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSanadType extends EditRecord
{
    protected static string $resource = SanadTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
