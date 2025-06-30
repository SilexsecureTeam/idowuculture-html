<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\ClothCollection;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Infolists;
use Filament\Infolists\Components\ColorEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Section::make([
                            TextInput::make('sku')
                                ->default('SKU' . strtoupper(Str::random(8)))
                                ->label('SKU (Stock Keeping Unit)')
                                ->readOnly()
                                ->required()
                                ->unique(ignoreRecord: true),

                            Toggle::make('is_featured')
                                ->default(false)
                                ->helperText('If turned on product will be featured in the welcome page'),

                            TextInput::make('title')
                                ->label('Product Title')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                            Hidden::make('slug')
                                ->label('Product Slug')
                                ->required(),

                            Select::make('cloth_collection_id')
                                ->label('Collection')
                                ->options(ClothCollection::all()->pluck('title', 'id')),
                                
                            Select::make('category_id')
                                ->label('Category')
                                ->options(Category::all()->pluck('title', 'id')),

                            TextInput::make('price')
                                ->required()
                                ->numeric()
                                ->step('any'),

                            TextInput::make('stock')
                                ->required()
                                ->numeric()
                                ->helperText('This is the total quantity of this product that is available')

                        ])
                            ->columnSpan(1)->heading('Basic Information'),

                        Section::make([
                            RichEditor::make('description')
                                ->required()
                        ])
                            ->columnSpan(1)->heading('Product Description'),

                        Section::make([
                            Repeater::make('colors')
                                ->schema([
                                    ColorPicker::make('color')->rgb()->required(),
                                    TextInput::make('quantity')->numeric()->required()->default(0)
                                ])->columns()
                        ])
                            ->columnSpan(1),

                        Section::make([
                            Repeater::make('sizes')
                                ->schema([
                                    Select::make('size')->options([
                                        'xs' => 'Extra Small',
                                        'sm' => 'Small',
                                        'md' => 'Medium',
                                        'lg' => 'Large',
                                        'xl' => 'Extra Large',
                                        'xxl' => 'Extra Extra Large',
                                    ])->required(),
                                    TextInput::make('quantity')->numeric()->required()->default(0)
                                ])->columns()
                        ])
                            ->columnSpan(1),

                        Section::make([
                            Checkbox::make('has_fabric')
                                ->helperText('When checked, it means this product can be sold as fabric and full attire'),
                            FileUpload::make('images')
                                ->multiple()
                                ->required()
                                ->image()
                                ->imageEditor()
                                ->directory('images/products')
                                ->reorderable()
                                ->openable()
                                ->maxFiles(10)
                                ->maxSize(5120)
                                ->panelLayout('grid')

                        ])
                            ->columnSpanFull(),
                    ])->columns()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sku')
                    ->searchable(),
                IconColumn::make('is_featured')
                ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('price')
                    ->sortable()
                    ->money('NGN'),
                TextColumn::make('cloth_collection.title')
                    ->label('Collection'),
                TextColumn::make('category.title')
                    ->label('Category'),
                IconColumn::make('has_fabric')
                    ->alignCenter(),
                TextColumn::make('stock')
                    ->sortable(),
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
                TernaryFilter::make('is_featured'),
                TernaryFilter::make('has_fabric'),
                SelectFilter::make('category')
                    ->relationship('category', 'title'),
                SelectFilter::make('collection')
                    ->relationship('cloth_collection', 'title'),

            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
            'view' => Pages\ViewProduct::route('/{record}'),
        ];
    }

    public static function infoList(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                InfoLists\Components\Section::make([
                    TextEntry::make('sku'),
                    TextEntry::make('title'),
                    TextEntry::make('price')->money('NGN'),
                    TextEntry::make('stock')->numeric(),
                    TextEntry::make('category.title')->label('Category'),
                    IconEntry::make('has_fabric'),
                    TextEntry::make('created_at')->dateTime(),
                    TextEntry::make('updated_at')->dateTime(),
                ])->columnSpan(1)->columns(),

                InfoLists\Components\Section::make([
                    TextEntry::make('description')->html(),
                ])->columnSpan(1),

                InfoLists\Components\Section::make([
                    RepeatableEntry::make('colors')
                        ->schema([
                            ColorEntry::make('color'),
                            TextEntry::make('quantity'),
                        ])
                        ->columns(),
                ])->columnSpan(1),

                InfoLists\Components\Section::make([
                    RepeatableEntry::make('sizes')
                        ->schema([
                            TextEntry::make('size'),
                            TextEntry::make('quantity'),
                        ])
                        ->columns(),
                ])->columnSpan(1),

                InfoLists\Components\Section::make([
                    ImageEntry::make('images')
                        ->square()
                        ->simpleLightbox(),
                ])->columnSpanFull(),

            ]);
    }
}
