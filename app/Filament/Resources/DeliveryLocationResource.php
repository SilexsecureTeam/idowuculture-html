<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryLocationResource\Pages;
use App\Filament\Resources\DeliveryLocationResource\RelationManagers;
use App\Models\DeliveryLocation;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryLocationResource extends Resource
{
    protected static ?string $model = DeliveryLocation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                View::make('components.google-autocomplete'),
                TextInput::make('address')
                    ->label('Location')
                    ->id('autocomplete') // For JS targeting
                    ->required()
                    ->columnSpan(2),

                TextInput::make('fee')
                    ->numeric()
                    ->label('Delivery Fee')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('address')
                ->label('Location'),
                TextColumn::make('fee')
                ->label('Delivery Fee'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDeliveryLocations::route('/'),
            'create' => Pages\CreateDeliveryLocation::route('/create'),
            'edit' => Pages\EditDeliveryLocation::route('/{record}/edit'),
        ];
    }
}
