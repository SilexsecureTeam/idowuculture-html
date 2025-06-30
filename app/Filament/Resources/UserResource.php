<?php

namespace App\Filament\Resources;

use App\Enums\UserRole;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Branch;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = null;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('firstname')
                    ->label('First Name')->required(),
                TextInput::make('lastname')
                    ->label('Last Name')->required(),
                TextInput::make('email')
                    ->label('Email')->required(),
                TextInput::make('phone')
                    ->label('Phone')->required(),
                TextInput::make('password')
                    ->label('Password')
                    ->nullable()
                    ->dehydrated(fn($state) => filled($state))
                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                    ->revealable()
                    ->password(),


                Select::make('role')
                    ->required()
                    ->options([
                        UserRole::PRODUCTION->value => 'Production Role',
                        UserRole::USER->value => 'User Role',
                    ])
                    ->hidden(fn() => Auth::user()->role != UserRole::ADMIN)
                    ->placeholder('Select a role'),
                Select::make('branch_id')
                    ->required()
                    ->options(Branch::all()->pluck('name', 'id'))
                    ->hidden(fn() => Auth::user()->role != UserRole::ADMIN)
                    ->label('Branch')
                    ->default(fn() => Auth::user()->role != UserRole::ADMIN ? Auth::user()->branch->id : ''),

                Hidden::make('branch_id')
                    ->hidden(fn() => Auth::user()->role === UserRole::ADMIN)
                    ->default(fn() => Auth::user()->role != UserRole::ADMIN ? Auth::user()->branch->id : ''),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('firstname')
                    ->searchable(),
                TextColumn::make('lastname')
                    ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('branch.name')
                    ->label('Branch')
                    ->badge()
                    ->hidden(fn() => Auth::user()->role != UserRole::ADMIN),
                TextColumn::make('phone'),
                TextColumn::make('role')
                    ->badge()
                    ->hidden(fn() => Auth::user()->role != UserRole::ADMIN),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
