<?php

namespace App\Filament\Resources\ReservationDepositResource\Pages;

use App\Filament\Resources\ReservationDepositResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReservationDeposits extends ListRecords
{
    protected static string $resource = ReservationDepositResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
