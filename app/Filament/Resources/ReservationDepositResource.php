<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationDepositResource\Pages;
use App\Filament\Resources\ReservationDepositResource\RelationManagers;
use App\Models\ReservationDeposit;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationDepositResource extends Resource
{
    protected static ?string $model = ReservationDeposit::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Front Office';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservationDeposits::route('/'),
            'create' => Pages\CreateReservationDeposit::route('/create'),
            'edit' => Pages\EditReservationDeposit::route('/{record}/edit'),
        ];
    }    
}
