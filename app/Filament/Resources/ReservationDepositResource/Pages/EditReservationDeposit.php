<?php

namespace App\Filament\Resources\ReservationDepositResource\Pages;

use App\Filament\Resources\ReservationDepositResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReservationDeposit extends EditRecord
{
    protected static string $resource = ReservationDepositResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
