<?php

namespace App\Filament\Resources\CheckinDepositResource\Pages;

use App\Filament\Resources\CheckinDepositResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCheckinDeposit extends EditRecord
{
    protected static string $resource = CheckinDepositResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
