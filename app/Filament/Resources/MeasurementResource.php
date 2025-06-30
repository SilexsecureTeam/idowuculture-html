<?php

namespace App\Filament\Resources;

use App\Enums\MeasurementStatus;
use App\Enums\UserRole;
use App\Filament\Resources\MeasurementResource\Pages;
use App\Filament\Resources\MeasurementResource\RelationManagers;
use App\Models\Measurement;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MeasurementResource extends Resource
{
    protected static ?string $model = Measurement::class;

    protected static ?string $navigationIcon = 'heroicon-o-scissors';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Customer')
                    ->options(
                        User::where('role', UserRole::USER)->get()->mapWithKeys(function ($user) {
                            return [$user->id => $user->firstname . ' ' . $user->lastname];
                        })->toArray()
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options(MeasurementStatus::class)
                    ->default(MeasurementStatus::PENDING),
                Forms\Components\TextInput::make('neck')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('chest')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('waist')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('hip')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('shoulder')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('sleeve_length')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('top_length')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('trouser_length')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('thigh')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('knee')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('ankle')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('amount')
                    ->numeric()
                    ->default(null),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
                Forms\Components\Hidden::make('measured_by')
                    ->required()
                    ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('measured_by')
                    ->formatStateUsing(fn($record) => "{$record->measuredBy->firstname} {$record->measuredBy->lastname}")
                    ->searchable()
                    ->label('Measured By'),
                Tables\Columns\TextColumn::make('user_id')
                    ->formatStateUsing(fn($record) => "{$record->customer->firstname} {$record->customer->lastname}")
                    ->searchable()
                    ->label('Customer Name'),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()->slideOver(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListMeasurements::route('/'),
            'create' => Pages\CreateMeasurement::route('/create'),
            'edit' => Pages\EditMeasurement::route('/{record}/edit'),
        ];
    }
}
