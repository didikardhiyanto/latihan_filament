<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CheckinDepositResource\Pages;
use App\Filament\Resources\CheckinDepositResource\RelationManagers;
use App\Models\CheckinDeposit;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CheckinDepositResource extends Resource
{
    protected static ?string $model = CheckinDeposit::class;

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
            'index' => Pages\ListCheckinDeposits::route('/'),
            'create' => Pages\CreateCheckinDeposit::route('/create'),
            'edit' => Pages\EditCheckinDeposit::route('/{record}/edit'),
        ];
    }    
}
