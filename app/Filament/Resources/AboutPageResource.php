<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Filament\Resources\AboutPageResource\RelationManagers;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = null;
    protected static ?string $navigationGroup = 'Content Mgmt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    FileUpload::make('images')
                    ->hint('NOTE:Upload five(5) images(below 2 mb max) required - image 1(portrait), image 2(landscape), image3(square), image 4(square), image5(landscape)')
                        ->multiple()
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->directory('images/about')
                        ->reorderable()
                        ->openable()
                        ->maxFiles(5)
                        ->maxSize(2048)
                        ->panelLayout('grid')

                ])
                    ->columnSpanFull(),

                Section::make([
                    RichEditor::make('our_story')
                        ->required()
                ])
                    ->columnSpan(1)->heading('Our Story'),

                Section::make([
                    RichEditor::make('delivery')
                        ->required()
                ])
                    ->columnSpan(1)->heading('Our Delivery'),

                Section::make([
                    RichEditor::make('statement')
                        ->required()
                ])
                    ->columnSpan(1)->heading('Statement'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('our_story')
                    ->label('Our Story')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('delivery')
                    ->label('Delivery')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('statement')
                    ->label('Statement')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                
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
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
