<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    // protected static ?string $navigationGroup = 'Resources';
    // protected static ?string $navigationLabel = 'My Category';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Category Title')
                    ->required()
                    ->unique(ignoreRecord: true)
                    // ->columnSpanFull()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Hidden::make('slug')
                    ->label('Category Slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Toggle::make('is_sub')
                    ->label('Sub Category')
                    ->default(false)
                    ->reactive(),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->directory('images/categories'),

                Select::make('parent_id')
                    ->label('Categories')
                    ->options(Category::all()->pluck('title', 'id'))
                    ->hidden(fn(Get $get) => $get('is_sub') == false),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->circular(),
                TextColumn::make('title')
                    ->searchable(),
                IconColumn::make('parent_id')
                    ->label('Sub Category')
                    ->state(fn($record) => isset($record->parent_id))
                    ->icon(fn($state) => $state ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle')
                    ->alignCenter(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('reset')
                        ->label('Remove Sub Category')
                        ->icon('heroicon-o-arrow-path')
                        ->hidden(fn($record) => !$record->parent_id)
                        ->requiresConfirmation()
                        ->action(function (Category $record) {
                            $record->parent_id = null;
                            $record->save();
                            
                            Notification::make()
                            ->title('Save Successfully')
                            ->success()
                            ->send();
                        }),
                ]),

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
            'index' => Pages\ListCategories::route('/'),
            // 'create' => Pages\CreateCategory::route('/create'),
            // 'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
