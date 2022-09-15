<?php

namespace App\Filament\Resources\SheikhResource\Pages;

use App\Filament\Resources\SheikhResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSheikh extends EditRecord
{
    protected static string $resource = SheikhResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
