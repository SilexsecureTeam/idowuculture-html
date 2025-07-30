<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IdowucouturePolicyResource\Pages;
use App\Filament\Resources\IdowucouturePolicyResource\RelationManagers;
use App\Models\Policy;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IdowucouturePolicyResource extends Resource
{
    protected static ?string $model = Policy::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('shipping_policy')
                    ->label('Shipping Policy'),
                RichEditor::make('refund_policy')
                    ->label('Refund Policy'),
                RichEditor::make('terms_and_conditions')
                    ->label('Terms and Conditions'),
                RichEditor::make('privacy_policy')
                    ->label('Privacy Policy'),

                Section::make([
                    FileUpload::make('policy_image')
                    ->label('Policy (Required Dimension - 1723 x 635)')
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->directory('images/policy')
                        ->openable()
                        ->maxFiles(1)
                        ->maxSize(5120)
                        ->panelLayout('grid'),

                    FileUpload::make('terms_image')
                    ->label('Terms and Conditions (Required Dimension - 1723 x 635)')
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->directory('images/terms')
                        ->openable()
                        ->maxFiles(1)
                        ->maxSize(5120)
                        ->panelLayout('grid')

                ])
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('shipping_policy')
                    ->label('Shipping Policy')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('refund_policy')
                    ->label('Refund Policy')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('terms_and_conditions')
                    ->label('Terms and Conditions')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('privacy_policy')
                    ->label('Privacy Policy')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                ImageColumn::make('policy_image')
                    ->label('Policy Image')
                    ->square()
                    ->size(100),
                ImageColumn::make('terms_image')
                    ->label('Terms Image')
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
            'index' => Pages\ListIdowucouturePolicies::route('/'),
            'create' => Pages\CreateIdowucouturePolicy::route('/create'),
            'edit' => Pages\EditIdowucouturePolicy::route('/{record}/edit'),
        ];
    }
}
