<?php

namespace App\Filament\Resources\CheckinResource\Pages;

use App\Filament\Resources\CheckinResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckin extends EditRecord
{
    protected static string $resource = CheckinResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
