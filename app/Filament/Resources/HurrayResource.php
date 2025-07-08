<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HurrayResource\Pages;
use App\Filament\Resources\HurrayResource\RelationManagers;
use App\Models\Hurray;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HurrayResource extends Resource
{
    protected static ?string $model = Hurray::class;

    protected static ?string $navigationIcon = null;
    protected static ?string $navigationGroup = 'Content Mgmt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    FileUpload::make('hurray_image')
                        ->multiple()
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->directory('images/hurray')
                        ->reorderable()
                        ->openable()
                        ->maxFiles(1)
                        ->maxSize(5120)
                        ->panelLayout('grid')

                ])
                    ->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('hurray_image')
                    ->label('Hurray Image')
                    ->square()
                    ->size(100),
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
            'index' => Pages\ListHurrays::route('/'),
            'create' => Pages\CreateHurray::route('/create'),
            'edit' => Pages\EditHurray::route('/{record}/edit'),
        ];
    }
}
