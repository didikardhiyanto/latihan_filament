<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CheckinResource\Pages;
use App\Filament\Resources\CheckinResource\RelationManagers;
use App\Models\Checkin;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CheckinResource extends Resource
{
    protected static ?string $model = Checkin::class;

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
            'index' => Pages\ListCheckins::route('/'),
            'create' => Pages\CreateCheckin::route('/create'),
            'edit' => Pages\EditCheckin::route('/{record}/edit'),
        ];
    }    
}
