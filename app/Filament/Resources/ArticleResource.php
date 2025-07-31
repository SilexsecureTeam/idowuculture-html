<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = null;
    protected static ?string $navigationGroup = 'Content Mgmt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('title')
                        ->label('Article Title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    TextInput::make('slug')
                        ->required(),
                    TextInput::make('author')
                        ->label('Author'),
                ])
                    ->columnSpan(1),
                Section::make([
                    FileUpload::make('image')
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->directory('images/article')
                        ->openable()
                        ->maxFiles(1)
                        ->maxSize(5120)
                        ->panelLayout('grid')

                ])
                    ->columnSpan(1),

                Section::make([
                    RichEditor::make('content')
                        ->required()
                ])
                    ->columnSpan(2)->heading('Content'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('images')
                    ->label('Article Image')
                    ->circular(),
                TextColumn::make('title')
                    ->label('Title')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->formatStateUsing(fn($state) => strip_tags($state))
                    ->wrap(),
                TextColumn::make('content')
                    ->label('Content')
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
