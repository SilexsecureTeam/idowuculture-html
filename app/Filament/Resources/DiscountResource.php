<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscountResource\Pages;
use App\Filament\Resources\DiscountResource\RelationManagers;
use App\Models\Discount;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('discount_name')
                    ->required()
                    ->maxLength(100),

                RichEditor::make('description')
                    ->label('Description')
                    ->disableToolbarButtons([
                        'attachFiles',
                    ])
                    ->maxLength(100),

                TextInput::make('percentage')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(100)
                    ->required(),

                Toggle::make('is_active')
                    ->label('Active')
                    ->helperText('Only one discount can be active at a time.')
                    ->default(false)
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set, $get, $record) {
                        if ($state) {
                            // Deactivate all other active discounts
                            Discount::where('id', '!=', optional($record)->id)->update(['is_active' => false]);
                        }
                    }),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('discount_name')->searchable()->sortable(),
                TextColumn::make('description')->html(),
                TextColumn::make('percentage')->suffix('%')->sortable(),
                ToggleColumn::make('is_active')->label('Active'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
